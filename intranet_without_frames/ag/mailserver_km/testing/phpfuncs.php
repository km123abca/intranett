
<?php
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
    if ($count>1)
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

  //The three functions added on  16-July-2018 for scaling

function current_user()
  {
    foreach (readdb('loas.txt') as $line)
      {
    $senter_us='km';
    $localIP = md5(getHostByName(getHostName()));
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
  $file_save=fopen($fil,"w+");
  flock($file_save,LOCK_EX);
  fputs($file_save,"");
  
  flock($file_save,LOCK_UN);
  fclose($file_save);
  }
function store2db($contentt,$fil="inbox.txt")
  {
  $file_save=fopen($fil,"a+");
  flock($file_save,LOCK_EX);
  fputs($file_save,$contentt."\n");
  
  flock($file_save,LOCK_UN);
  fclose($file_save);
  }


function readdb($fil="inbox.txt")
  {
    $entire_file=file($fil,FILE_IGNORE_NEW_LINES);
    return $entire_file;
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
  { $localIP = md5(getHostByName(getHostName()));
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
    $localIP = md5(getHostByName(getHostName()));
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
  function removee($elem)
    {
      $entire_file=readdb('loas.txt');
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
      store3db($entire_file,'loas.txt');
      return True;
          }
      return False;
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

    $recfil='';
    $senfil='';
    $confil='';
    $subfil='';

    if (isset($_REQUEST['rec']))  $rec=($_REQUEST['rec']);
    if (isset($_REQUEST['sen']))  $sen=($_REQUEST['sen']);
    if (isset($_REQUEST['sub']))  $sub=($_REQUEST['sub']);
    if (isset($_REQUEST['con']))  $con=($_REQUEST['con']);

    $recfil=str_replace(' ','',$rec);
    $senfil=str_replace(' ','',$sen);
    $confil=str_replace(' ','',$con);
    $subfil=str_replace(' ','',$sub);

    if (($rec=='noone') or ($sen=='noone')) die('fatal1');
    if (($recfil=='') or ($senfil=='') ) die('fatal2');


    $raw_content=$rec.'#v#'.$sen.'#v#'.$sub.'#v#'.$con;
    store2db($raw_content);

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

    $recfil=str_replace(' ','',$rec);
    $senfil=str_replace(' ','',$sen);
    $confil=str_replace(' ','',$con);
    $subfil=str_replace(' ','',$sub);

    if (($rec=='noone') or ($sen=='noone')) die('fatal1');
    if (($recfil=='') or ($senfil=='') ) die('fatal2');


    $raw_content=$rec.'#v#'.$sen.'#v#'.$sub.'#v#'.$con;
    store2db($raw_content,'drafts.txt');

    echo 'ok';
  }
  if (isset($_REQUEST['delsen']))
      {
        $senter=$_REQUEST['delsen'];
        //store2db('Entered delfunction with senter:'.$senter)
        $i=$_REQUEST['i'];
        $typ=$_REQUEST['typ'];
        $cnt=0;

        switch ($typ) 
          {
          case 'ibox':
            $ind2search=0;
            $filnm='inbox.txt';
            break;
          case 'sentii':
            $ind2search=1;
            $filnm='inbox.txt';
            break;
          case 'dra':
            $ind2search=1;
            $filnm='drafts.txt';
            break;
          
          default:
            $ind2search=0;
            $filnm='inbox.txt';
            break;
          }
        $entire_file=readdb($filnm);
        $fullcount=-1;
        $arr2del=array();
        foreach($entire_file as $line)
        { $fullcount+=1;
          $elems=explode('#v#',$line);
          if($elems[$ind2search]!=current_user()) continue;
          if(in_array($cnt, explode(',',$i)) ) $arr2del[]=$cnt;
          $cnt+=1;
        }
        $offsett=0;
        foreach($arr2del as $ind2del)            
          {array_splice($entire_file,$ind2del-$offsett,1);
           $offsett+=1;
          }
        store3db($entire_file,$filnm);
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

  if (isset ($_REQUEST['filz']))
  		{$dat=$_REQUEST['filz'];
  			echo "<script>";
            echo "alert('the file is $dat');";
  			echo "</script>";
  			//RedirectToURL('file_upload.html');
  		}
  ?>