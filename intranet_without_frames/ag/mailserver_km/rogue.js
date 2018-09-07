
function changevisb(elem,stat='of')
	{
		if (stat=='on')
			document.getElementById(elem).style.display='block';
		else
		  document.getElementById(elem).style.display='none';
   
    if (elem=='composebox')
      {
       //console.log('hello');
       stat=(stat=='of')?'none':'block';
    Ajax_Send('GET','phpcomposestat.php','stat='+stat,ajaxdeal2)
      }
	}

  function reply_ready(rec,sub)
  {
    //Ajax_Send('GET','ajaxdebugger.php','sto=Entered reply ready with rec:'+rec+' and sub:'+sub,ajaxdeal2);
    changevisb('composebox','on');
    document.getElementById('rp').value=rec;
    document.getElementById('sub').value=sub;
  }

function ajaxdeal2(resp)
 {
 // alert('This is the response:'+resp);
 }

 function conveyer(resp)
 {
 alert(resp.trim());
// return resp;
 }
function ajaxdeal1(resp)

  {

    if((resp.trim())=='ok') alert ('Ajax responded on the affirmative');
    else alert('Fatal Error:This is the response:'+resp.trim());
  }


function sentcont(senter='km')

	{
		var con=document.getElementById('textar').value;
    con=con.replace(/\n/g,'zhinyat');
    //console.log(con);
		var rec=document.getElementById('rp').value;
		var sub=document.getElementById('sub').value;
    var atta=document.getElementById('atta_inv').value;
    var sen=senter;
    rec=rec.trim();
    var params='rec='+rec+'&con='+con+'&sub='+sub+'&sen='+sen+'&atta='+atta+'&senn=yes';
		Ajax_Send('GET','phpfuncs.php',params,ajaxdeal1);
	}

function saveAsDraft(senter='km')

  {
    var con=document.getElementById('textar').value;
    var rec=document.getElementById('rp').value;
    var sub=document.getElementById('sub').value;
    var atta=document.getElementById('atta_inv').value;
    var sen=senter;
    var params='rec='+rec+'&con='+con+'&sub='+sub+'&sen='+sen+'&atta='+atta+'&dra=yes';
    Ajax_Send('GET','phpfuncs.php',params,ajaxdeal1);
  }
function logout()
{ 
  Ajax_Send('GET','phpfuncs.php','lout=yes',conveyer);
  window.location.href='login.php';
  
}

/*
function markr(typ,num)
  {
    Ajax_Send('GET','phpfuncs.php','typ='+typ'&i='+num+'&changesta=yes',conveyer);
  }
*/

//   AJAX FUNCTIONALITY
function Ajax_Send(GP,URL,PARAMETERS,RESPONSEFUNCTION='none')
  {     
    var xmlhttp  = new XMLHttpRequest();;
    xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState == 4){
      if (RESPONSEFUNCTION=="") return false;
      //console.log('hello'+RESPONSEFUNCTION);
      if (RESPONSEFUNCTION=='none')
        return xmlhttp.responseText;
        else
      eval(RESPONSEFUNCTION(xmlhttp.responseText));
                    }
                       }

      if (GP=="GET")
            {
            URL+="?"+PARAMETERS;
            xmlhttp.open("GET",URL,true);
            xmlhttp.send(null);
            }

      if (GP=="POST")
            {
           return false;
            }
  }

//   AJAX FUNCTIONALITY

function delsel_old()
  {
    var boxes=document.getElementsByClassName('cb');
    for (i=0;i<boxes.length;i++)
      { if (boxes[i].checked==true)
        {
        
        var sen2bdel=document.getElementById('senter'+i).innerHTML;
        var sub2bdel=document.getElementById('subject'+i).innerHTML;
        /*
        alert(sen2bdel+' and '+sub2bdel+' will be deleted');
        */
        resp='ok';
        if (confirm(sen2bdel+' and '+sub2bdel+' will be deleted'))
        Ajax_Send('GET','phpfuncs.php','delsen='+sen2bdel+'&i='+i,conveyer);
        if (resp!='ok')
          {
          alert('There is a problem, return communication:'+resp);
          break;
          }


        }
      }
  }


  function delsel(typ='ibox')
  {
    var boxes=document.getElementsByClassName('cb');
    var sen2bdel='dummy';//document.getElementById('senter'+0).innerHTML;
    var sub2bdel='dummy';//document.getElementById('subject'+0).innerHTML;
    var indicesList=[];
    for (i=0;i<boxes.length;i++)
      { if (boxes[i].checked==true)
        {      
        indicesList.push(i);
        }
      }
      //alert('The following indices:'+indicesList);
    if (confirm('selected items will be deleted'))
        Ajax_Send('GET','phpfuncs.php','delsen='+sen2bdel+'&i='+indicesList+'&typ='+typ,conveyer);
    var para_del='';
    if(typ=='ibox') para_del='inbox';
    else if (typ=='sentii') para_del='sent';
    else if (typ=='dra') para_del='draft';
    window.location.href='index.php?sid='+para_del;
  }

