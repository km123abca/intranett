
<?php



//ALIEN CONTENT ADDED BY KM to extract client ip
function get_client_ip() 
    {
      $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
      else
        $ipaddress = 'UNKNOWN';

      return $ipaddress;
    }

//ALIEN CONTENT ADDED BY KM ends here


//The three functions added on  16-July-2018 for scaling
function getstat($typ='inbox')
  {$kin=0;
    foreach (readdb('active_db.txt') as $line)
    {
      if (explode('_',$line)[0]==$typ)
      {
        $kin=explode('_',$line)[1];
        break;
      }
    }
   if($kin==0) return $typ.'.txt';
   return $typ.$kin.'.txt';
  }

function getstatplus($typ='inbox')
  {   $count=0;
    foreach (readdb(getstat($typ)) as $line)
      $count+=1;
    if ($count>5)
      upgradde($typ);
    return getstat($typ);
  }

function upgradde($typ='inbox')
  {
  $kin=0;
  $nkin=0;
  $ind=-1;
    foreach (readdb('active_db.txt') as $line)
    {$ind+=1;
      if (explode('_',$line)[0]==$typ)
      {
        $kin=explode('_',$line)[1];
        break;
      }
    }
   if($kin==0) $nkin=1;
   else $nkin=$kin+1; 

  sanitizedb($typ.$nkin.'.txt');
  $full_file=readdb('active_db.txt');
  $full_file[$ind]=$typ.'_'.$nkin;
  store3db($full_file,'active_db.txt');
    

  }

  //new addition to find stat
function find_staz()
{
  foreach (readdb('statstore.txt') as $line)
  {
    if(explode('#v#',$line)[0]==current_user())
      return explode('#v#',$line)[1];
  }

}

function update_staz($cond)
  {
    $full_file=readdb('statstore.txt');
    $count=-1;
    $fndflg=False;
    foreach ($full_file as  $line)
    {
      $count+=1;
      if (explode('#v#',$line)[0]==current_user())
        {$fndflg=True;
         break;
        }

    }
    if ($fndflg)
    {
      $full_file[$count]=current_user().'#v#'.$cond;
      store3db($full_file,'statstore.txt');
      return True;
    }
    $full_file[]=current_user().'#v#'.$cond;
    store3db($full_file,'statstore.txt');
    return False;
  }

  //new a t f s

  //The three functions added on  16-July-2018 for scaling

function current_user()
  {
    foreach (readdb('loas.txt') as $line)
      {
    $senter_us='km';
    $localIP = md5(get_client_ip());
    if (explode('##v##',$line)[1]==$localIP)
        { 
    $senter_us=explode('##v##',$line)[0];
    break;
        }

      }
    return $senter_us;
  }
function store3db($onlineusers_file,$fil='inbox.txt')
  {
  $fil='boxes/'.$fil;
  $file_save=fopen($fil,"w+");
  flock($file_save,LOCK_EX);
  for($line=0;$line<count($onlineusers_file);$line++)
    {

    fputs($file_save,$onlineusers_file[$line]."\n");
    };
  flock($file_save,LOCK_UN);
  fclose($file_save);
  }

function sanitizedb($fil="inbox.txt")
  {
  $fil='boxes/'.$fil;
  $file_save=fopen($fil,"w+");
  flock($file_save,LOCK_EX);
  fputs($file_save,"");
  
  flock($file_save,LOCK_UN);
  fclose($file_save);
  }
function store2db($contentt,$fil="inbox.txt")
  {
  $fil='boxes/'.$fil;
  $file_save=fopen($fil,"a+");
  flock($file_save,LOCK_EX);
  fputs($file_save,$contentt."\n");
  
  flock($file_save,LOCK_UN);
  fclose($file_save);
  }


function readdb($fil="inbox.txt")
	{ $fil='boxes/'.$fil;
		$entire_file=file($fil,FILE_IGNORE_NEW_LINES);
		return $entire_file;
	}

  function readtex($fil='inbox.txt')
  {
    $handover='';
    $user_start=False;
    foreach (readdb($fil) as $line) 
      {
    if($user_start)
    if((explode('#v#',$line)[0]=='user!@#$') and (explode('#v#',$line)[1]!=current_user())) 
    return $handover;
    if ($user_start) $handover.=$line.' ';
    if(!($user_start))
    if((explode('#v#',$line)[0]=='user!@#$') and (explode('#v#',$line)[1]==current_user())) 
        {
    $user_start=True;
    continue;
        }

    
      }    
    return $handover;
  }


function special_clean($fil='inbox.txt')
  {
    $handover='';
    $user_start=False;
    $arr=[];
    foreach (readdb($fil) as $line) 
      {
    if($user_start)
    if((explode('#v#',$line)[0]=='user!@#$') and (explode('#v#',$line)[1]!=current_user())) 
    break;
    
    if(!($user_start))
    if((explode('#v#',$line)[0]=='user!@#$') and (explode('#v#',$line)[1]==current_user())) 
        {
    $user_start=True;
    
        }
    if ($user_start) $arr[]=$line;

    
      }
    foreach($arr as  $line)
    removee($line,$fil);    
    return True;
  }
function RedirectToURL($url)
    {
        header("Location: $url");
        exit;
    }
function Recordlogin($user)
  {
    store2db($user,'loas.txt');
  }
function checkloginn()
  { $localIP = md5(get_client_ip());
    foreach(readdb('logindets.txt') as $line)
    {
      $u=explode('#v#',$line)[0].'##v##'.$localIP;
      foreach(readdb('loas.txt') as $line2)
      {
        if($line2==$u) return True;
      }

    }
    return False;
  }
  function logout()
    {
    $localIP = md5(get_client_ip());
    foreach(readdb('logindets.txt') as $line)
        {
    $u=explode('#v#',$line)[0].'##v##'.$localIP;
    foreach(readdb('loas.txt') as $line2)
            {
    if($line2==$u) 
              {
                

                return removee($line2);;
              }
            }

        }
    return False;
    }
  function removee($elem,$fil='loas.txt')
    {
      $entire_file=readdb($fil);
      $cnt=-1;
      $fndflg=False;
      foreach($entire_file as $line)
      { $cnt+=1;
      if($line==$elem)
            {
      $fndflg=True;
      break;
            }
      }
      if ($fndflg)
          {
      array_splice($entire_file,$cnt,1);
      store3db($entire_file,$fil);
      return True;
          }
      return False;
    }

  function gpv($val)
    {
      if (isset($_REQUEST[$val])) return htmlentities($_REQUEST[$val]);
      return '';
    }
if (isset($_REQUEST['lout']))
    {
    if(logout())
    {
    echo 'logged out successfully,you shall now be redirected to the login page';
    sanitizedb('statstore.txt');
    store2db('none','statstore.txt');
    }
    else
      echo 'You are out';
    }
if (isset($_REQUEST['senn'])) 
  {
    $rec='noone';
    $sen='noone';
    $con='noone';
    $sub='noone';
    $atta='#';

    $recfil='';
    $senfil='';
    $confil='';
    $subfil='';

    if (isset($_REQUEST['rec']))  $rec=($_REQUEST['rec']);
    if (isset($_REQUEST['sen']))  $sen=($_REQUEST['sen']);
    if (isset($_REQUEST['sub']))  $sub=($_REQUEST['sub']);
    if (isset($_REQUEST['con']))  $con=($_REQUEST['con']);
    if (isset($_REQUEST['atta']))  $atta=($_REQUEST['atta']);

    //store2db('entered sen with con:'.$con,'debugind.txt');

    $recfil=str_replace(' ','',$rec);
    $senfil=str_replace(' ','',$sen);
    $confil=str_replace(' ','',$con);
    $subfil=str_replace(' ','',$sub);

    if (($rec=='noone') or ($sen=='noone')) die('fatal1');
    if (($recfil=='') or ($senfil=='') ) die('fatal2');


    $raw_content=$rec.'#v#'.$sen.'#v#'.$sub.'#v#'.$con.'#v#'.$atta.'#v#'.'unread';
    store2db($raw_content,getstatplus('inbox'));

    echo 'ok';
  }
if (isset($_REQUEST['dra'])) 
  {
    $rec='noone';
    $sen='noone';
    $con='noone';
    $sub='noone';

    $recfil='';
    $senfil='';
    $confil='';
    $subfil='';

    if (isset($_REQUEST['rec']))  $rec=($_REQUEST['rec']);
    if (isset($_REQUEST['sen']))  $sen=($_REQUEST['sen']);
    if (isset($_REQUEST['sub']))  $sub=($_REQUEST['sub']);
    if (isset($_REQUEST['con']))  $con=($_REQUEST['con']);
    if (isset($_REQUEST['atta']))  $atta=($_REQUEST['atta']);

    $recfil=str_replace(' ','',$rec);
    $senfil=str_replace(' ','',$sen);
    $confil=str_replace(' ','',$con);
    $subfil=str_replace(' ','',$sub);

    if (($rec=='noone') or ($sen=='noone')) die('fatal1');
    if (($recfil=='') or ($senfil=='') ) die('fatal2');


    $raw_content=$rec.'#v#'.$sen.'#v#'.$sub.'#v#'.$con.'#v#'.$atta.'#v#'.'unread';;
    store2db($raw_content,getstatplus('drafts'));

    echo 'ok';
  }
  if (isset($_REQUEST['delsen']))
      {
        $senter=$_REQUEST['delsen'];
        $i=$_REQUEST['i'];
        $typ=$_REQUEST['typ'];
        $cnt=0;
        
        //store2db('column:'.$i.' of '.current_user().'\'s '.$typ.'about to be deleted      ','debugind.txt');
        
        switch ($typ) 
          {
          case 'ibox':
            $ind2search=0;
            $filnm='inbox';
            break;
          case 'sentii':
            $ind2search=1;
            $filnm='inbox';
            break;
          case 'dra':
            $ind2search=1;
            $filnm='drafts';
            break;
          
          default:
            $ind2search=0;
            $filnm='inbox';
            break;
          }

        //store2db('The Search Parameters, index:'.$ind2search.' and file name:'.$filnm.'    ','debugind.txt');
        
        $filseries=getstat($filnm);
        
        //store2db('Current active file:'.$filseries.'    ','debugind.txt');
        
        $bflg=True;
        $checcker=-1;
        while($bflg)
        {
          $fullcount=-1;
          $arr2del=array();
          $checcker+=1;
          if($checcker>100) $bflg=False;
          $loc_filseries=$filnm.$checcker.'.txt';

          if ($loc_filseries=='inbox0.txt') $loc_filseries='inbox.txt';
          if ($loc_filseries=='drafts0.txt') $loc_filseries='drafts.txt';
          
          //store2db('Tester file:'.$loc_filseries.'    ','debugind.txt');
          
          if ($filseries==$loc_filseries) 
            {  
          $bflg=False;
              
          //store2db('Since tester and active are equal ,will stop here'.'       ','debugind.txt');
            
            }
          $entire_file=readdb($loc_filseries);
          $locnt=-1;
          
          foreach($entire_file as $line)
            { 
          $locnt+=1;
          $fullcount+=1;
          $elems=explode('#v#',$line);
          if($elems[$ind2search]!=current_user()) continue;
          
          //store2db($elems[$ind2search].' found and current count:'.$cnt.'         ','debugind.txt');
          
          if(in_array($cnt, explode(',',$i)) ) 
             {
          
              //store2db('Now reached count no:'.$cnt.' which is located at '.$locnt.' of '.$loc_filseries.'       ','debugind.txt');
          
              $arr2del[]=$locnt;

             }
              $cnt+=1;
            }
          $offsett=0;
          foreach($arr2del as $ind2del)            
              {
             array_splice($entire_file,$ind2del-$offsett,1);
            $offsett+=1;
              }
          store3db($entire_file,$loc_filseries);
          
        }
        if ($fullcount==-1) echo $senter.' was not deleted';
           else
        echo 'ok';
      }

  if (isset($_REQUEST['testin']))
  {
    $i=$_REQUEST['i'];
    $cnt=0;
    foreach(explode(',',$i) as $elem) $cnt+=1;
    echo $cnt;

  }





  if (isset($_REQUEST['dra'])) 
  {
    $rec='noone';
    $sen='noone';
    $con='noone';
    $sub='noone';

    $recfil='';
    $senfil='';
    $confil='';
    $subfil='';

    if (isset($_REQUEST['rec']))  $rec=($_REQUEST['rec']);
    if (isset($_REQUEST['sen']))  $sen=($_REQUEST['sen']);
    if (isset($_REQUEST['sub']))  $sub=($_REQUEST['sub']);
    if (isset($_REQUEST['con']))  $con=($_REQUEST['con']);
    if (isset($_REQUEST['atta']))  $atta=($_REQUEST['atta']);

    $recfil=str_replace(' ','',$rec);
    $senfil=str_replace(' ','',$sen);
    $confil=str_replace(' ','',$con);
    $subfil=str_replace(' ','',$sub);

    if (($rec=='noone') or ($sen=='noone')) die('fatal1');
    if (($recfil=='') or ($senfil=='') ) die('fatal2');


    $raw_content=$rec.'#v#'.$sen.'#v#'.$sub.'#v#'.$con.'#v#'.$atta;;
    store2db($raw_content,getstatplus('drafts'));

    echo 'ok';
  }



  function changesta($typee,$ii)
        {
          //$senter=$_REQUEST['delsen'];
          $i=$ii;
          $typ=$typee;
          $cnt=0;
          $i-=1;
        
          store2db('column:'.$i.' of '.current_user().'\'s '.$typ.'about to be searched  ','debugind.txt');
        
          switch ($typ) 
            {
            case 'ibox':
            $ind2search=0;
            $filnm='inbox';
            break;
            case 'senti':
            $ind2search=1;
            $filnm='inbox';
            break;
            case 'draf':
            $ind2search=1;
            $filnm='drafts';
            break;
          
            default:
            $ind2search=0;
            $filnm='inbox';
            break;
            }

        store2db('The Search Parameters, index:'.$ind2search.' and file name:'.$filnm.'    ','debugind.txt');
        
            $filseries=getstat($filnm);
        
        store2db('Current active file:'.$filseries.'    ','debugind.txt');
        
            $bflg=True;
            $checcker=-1;
            $ffnd=False;
            while($bflg)
              {
              $fullcount=-1;
              $checcker+=1;
              if($checcker>100) $bflg=False;
              $loc_filseries=$filnm.$checcker.'.txt';

              if ($loc_filseries=='inbox0.txt') $loc_filseries='inbox.txt';
              if ($loc_filseries=='drafts0.txt') $loc_filseries='drafts.txt';
          
              store2db('Tester file:'.$loc_filseries.'    ','debugind.txt');
          
              if ($filseries==$loc_filseries) 
                {  
              $bflg=False;
              
              store2db('Since tester and active are equal ,will stop here'.'       ','debugind.txt');
                 }
              $entire_file=readdb($loc_filseries);
              $locnt=-1;
          
              foreach($entire_file as $line)
                { 
              $locnt+=1;
              $fullcount+=1;
              $elems=explode('#v#',$line);
              if($elems[$ind2search]!=current_user()) continue;
          
              store2db($elems[$ind2search].' found and current count:'.$cnt.'         ','debugind.txt');
          
              if($cnt==$i) 
                {
          
              store2db('Now reached count no:'.$cnt.' which is located at '.$locnt.' of '.$loc_filseries.'       ','debugind.txt');
          
              $ffnd=True;
              $bflg=False;
              break;
              //RESUME FROM HEREEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
                }
              $cnt+=1;
                }
              if (!($bflg) and $ffnd)
                  {
               $cont2process=$entire_file[$locnt];
               $cont2process_array=explode('#v#',$cont2process);
               $cont2process_array[5]='read';
               $entire_file[$locnt]=implode('#v#',$cont2process_array);
               store3db($entire_file,$loc_filseries);
                  }
          
          
              }
              //if ($fullcount==-1) echo $senter.' was not deleted';
              //else
              //cho 'ok';
          }
  ?>