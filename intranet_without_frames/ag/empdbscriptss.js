function dbwenn(d2,d1)
	        		{
	        			var dd2=new Date();
	        			var dd1=new Date();
	        			dd2=d2;
	        			dd1=d1;
                		var oneDay=1000*60*60*24;
	        			return (Math.round(((dd1.getTime() - dd2.getTime())/(oneDay))));
	        		}
		 			function stringToDate(str)
	 				{
    				var date = str.split("/"),
        			d = date[0],
            		m = date[1],
            		y = date[2];
            		//console.log(m+" "+d+" "+y);
           			return (new Date(y + "-" + m + "-" + d));//.toUTCString();
            		}
	 				function countdsays()
	 				{
	 				var fd=document.getElementById("fd").value;
	 				var td=document.getElementById("td").value;
	 				fd=stringToDate(fd);
	 				td=stringToDate(td);
	 				//console.log(dbwenn(fds,tds));
	 		 		document.getElementById("days").value=dbwenn(fd,td);
	 		
	 				}
  
					function hidee()
	     			{
	     			document.getElementById("ack").style.visibility="hidden";
	     			document.getElementById("ack").style.position="absolute";
	        		document.getElementById("ack").style.float="left";
	     			}
             
                     
					function listmonths()
						{   
						str=document.getElementById("empname").value;
						if (str.length!=0)
							{
						var xmlhttp = new XMLHttpRequest();
						xmlhttp.onreadystatechange = function()
									{
									if (this.readyState == 4 && this.status == 200)
										{    
									document.getElementById("month").innerHTML=this.responseText;
										}
									};
						xmlhttp.open("GET", "getmonths.php?q=" + str, true);
		        		xmlhttp.send();
							}
						}

					function openPage(pageName,elmnt,color) 
						{
    				var i, tabcontent, tablinks;
    				tabcontent = document.getElementsByClassName("tabcontent");
    				for (i = 0; i < tabcontent.length; i++) 
    						{
        			tabcontent[i].style.display = "none";
    						}
    				tablinks = document.getElementsByClassName("tablink");
    				for (i = 0; i < tablinks.length; i++) 
    						{
        			tablinks[i].style.backgroundColor = "";
    						}
    				document.getElementById(pageName).style.display = "block";
    				elmnt.style.backgroundColor = color;
						}

	        
					function myfunc()
						{
					alert('done');
						}
            		function altervis(toshow,tohide)
			    		{
			    	var showdoc=document.getElementById(toshow).style;
			    	var hidedoc=document.getElementById(tohide).style;
                	//console.log("entered altervis with toshow="+toshow);
                	//console.log('enterd altervis with tohide='+tohide);
			    	showdoc.position='relative';
			    	showdoc.float='left';
			    	showdoc.visibility='visible';
			    	//showdoc.width=70%;

			    	hidedoc.position='absolute';
			    	hidedoc.float='left';
			    	hidedoc.visibility='hidden';

			    		}

					function makelistt(rltn,typ,dest,rlget,typget)
						{
					if (rlget!='0')
					rltn=document.getElementById(rlget).value;
					if (typget!='0')
					typ=document.getElementById(typget).value;
					if (rltn.length!=0)
					{
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function()
						{
					if (this.readyState == 4 && this.status == 200)
							{    //console.log('The resposeText received is this '+this.responseText);
					document.getElementById(dest).innerHTML=this.responseText;
							}
						};
					xmlhttp.open("GET", "makelistt.php?q=" + rltn+"&r="+ typ, true);
		    	 	xmlhttp.send();
					}
						}

					function vallist(col,elem,opto='no',sellist='n')
						{
							//if (sellist=='y')
								//console.log(' col:'+col+' elem:'+elem);
						var xmlhttp = new XMLHttpRequest();
						xmlhttp.onreadystatechange = function()
						{
						if (this.readyState == 4 && this.status == 200)
							{    //console.log('The resposeText received is this '+this.responseText);
						//if (sellist=='y')
								//console.log(' resptex:'+this.responseText);
					document.getElementById(elem).innerHTML=this.responseText;
							}
						};
					if ((opto!='desc')&&(sellist=='n'))
					xmlhttp.open("GET", "vallist.php?q=" + col, true);
				    else if(sellist=='y')
				    xmlhttp.open("GET", "vallist2.php?q=" + col, true);	
			    	else
			    	xmlhttp.open("GET", "vallist.php?q=" + col+"&b="+'desc', true);
		    	 	xmlhttp.send();
						}

					function clrdets()
						{
					for( var ind in document.getElementsByClassName("inp"))
					document.getElementsByClassName("inp")[ind].value="";
						}

					function allrfilled()
						{
					for( var ind in document.getElementsByClassName("inp"))
						$chqflg=true;
					if((document.getElementsByClassName("inp")[ind].value==""))
						$chqflg=false;
					return $chqflg;
						}

                    function hidetabz()
						{
					document.getElementById("offbutton02").click();
					document.getElementById("offbutton2").click();
					document.getElementById("offbutton22").click();
						}
					function showtabz(tab,loginus='none',curruse='none')
					    {
					    	//console.log('present:'+loginus+' and curr:'+curruse);
					if (tab==1)
							{
							hidetabz();
							document.getElementById("offbutton0").click();
							}
					else if (tab==2)
							{
							hidetabz();
							document.getElementById("offbutton").click();
							}
					else if(loginus==curruse)
						    {
							hidetabz();
							document.getElementById("offbutton3").click();
							}
					    }
					    function blockandshrink(blo,siz)
					    {
					    	 for( var ind in document.getElementsByClassName("tablink"))
					    	 	if (typeof( document.getElementsByClassName("tablink")[ind].style)!='undefined')
					     document.getElementsByClassName("tablink")[ind].style.width=siz;
					    	document.getElementById(blo).style.display="none";
					    }
					    
					    function fixname(name)
					    {
					    var contentt="<option value='" + name + "'>";
					    //console.log(contentt);
                        document.getElementById("namlist").innerHTML=contentt;
                        document.getElementById("name").value=name;
                        }
	                

	               