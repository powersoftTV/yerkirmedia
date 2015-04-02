var AjaxArr;
var error;
/* STANDART */
function defineKey(e) {
	var keynum;
	
	if(window.event) // IE
	  {
	  keynum = e.keyCode;
	  }
	else if(e.which) // Netscape/Firefox/Opera
	  {
	  keynum = e.which;
	  }
	
	  if (keynum == 13) {
		  alert('ok');
	  	return false;
	  } else {
	  	return String.fromCharCode(keynum);
	  }
}

function checkMail(address) {
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   if(reg.test(address) == false) {
   	return false;
   }
   return true;
}

function addToFavorite(){
	if(document.all)window.external.AddFavorite(location.href,document.title);
	else if(window.sidebar)window.sidebar.addPanel(document.title,location.href,'');
}


function dopoll() {
	var poll_a_checked='0';
	for (var i=0; i < document.pollform.poll_a.length; i++)
   {
   if (document.pollform.poll_a[i].checked)
      {
      var poll_a_checked = document.pollform.poll_a[i].value;
      }
   }
   //alert(poll_a_checked);

   if(poll_a_checked>0){

	   $('#poll').html("<img src='s/i/loading.gif' alt='' style='margin:30px 116px;'/>");

   JsHttpRequest.query(
      'ajax.php?x='+Math.random(), 
      {
       'pa_id':  poll_a_checked
	  },
		   function(result, errors) {
		if(errors){
		//$('regForm').innerHTML=errors; 
		alert(errors);
		}
		if(result){
			//alert("exav");
			$('#poll').html(result);
		   }
	   }

	);
   }

}




//Show/Hide text from inptu on focus/blur
var defVal = Array();
var defType = Array();
function hideDef(e,t){
	if(!defVal[e]){
		defVal[e]=$(e).val();
		defType[e]=$(e).attr('type');
	}
	if($(e).val()==defVal[e]){
		if(t){
			$(e).css('display','none');
			$(t).css('display','inline');
			$(t).focus()
		}
		else{
			$(e).val('');
		}
	}
	if(t){
		$(t).blur(function(){
			if($(this).val()==''){
				$(e).css('display','inline');
				$(t).css('display','none');
			}
		});
	}
	else{
		$(e).blur(function(){
			if($(this).val()=='')$(this).val(defVal[e]);
		});
	}
}

function toAjax(arr,ajaxAdr){
	if(!ajaxAdr)ajaxAdr='ajax.php';
	JsHttpRequest.query(	siteAdr+ajaxAdr+'?x=c'+Math.random(), AjaxArr,
		function(result, errors) {
			if(errors)alert(errors);
			else{
				if(result['error'] && result['error']!='')alert(result['error']);
				if(result['callback'] && result['callback']!='')eval(result['callback']);
			}
		}
	);
}

//To center
jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
    return this;
}

function showHide(ClassName){
	if($('ul.older.'+ClassName).css('display')=='none'){
		$('ul.older.'+ClassName).show('slow');
		$('.more.m'+ClassName).addClass('active');
	}
	else{
		$('ul.older.'+ClassName).hide('slow');
		$('.more.m'+ClassName).removeClass('active');
	}
}





function getScreen(el, url, size )
{
  if(url === null){ return ""; }

  size = (size === null) ? "big" : size;
  var vid;
  var results;

  results = url.match("[\\?&]v=([^&#]*)");

  vid = ( results === null ) ? url : results[1];

  if(size == "small"){
    el.src =  "http://img.youtube.com/vi/"+vid+"/2.jpg";
  }else {
    el.src = "http://img.youtube.com/vi/"+vid+"/0.jpg";
  }
}





$(document).ready(function(){
	$("#news_feed").carousel( {dispItems: 12, loop: true, loop: true,direction: "vertical" });

	$('.video_screenshots').carousel( {dispItems: 3, loop: true, loop: true,direction: "horizontal" });

	$('.more').each(function(){
		$(this).click(function(){
		className=$(this).attr('class');
		className=className.split('mc');
		className=className[1].split(' ');
		className=className[0];
			showHide('c'+className);
		});
	});

	$('#crawl').html('<marquee scrollamount="3">'+$('#crawl').html()+'</marquee>');

});

function hideInp(obj,text){
	if($(obj).val()==text){
		$(obj).val('');
		$(obj).unbind('blur');
		$(obj).blur(function(){
			if($(obj).val()==''){
				$(obj).val(text);
			}
		});
	}
}


function com_activ(){
	if($('#c_com').val() == "Թողնել մեկնաբանություն"){
		$('#c_com').val("");
	}
	$('.hid_div_author').css("display","inline");
	$('#c_buttons').css("display","inline");
}

function com_cansel(){
			$('#c_com').val("Թողնել մեկնաբանություն");
			$('.hid_div_author').css("display","none");
}

function unborder(vthis){
$("#"+vthis).css("border", "1px solid gray");
}


function com_submit() {
	var comenter_name = $('#c_name_id').val();
	var comenter_email = $('#c_email_id').val();
	var comenter_com = $('#c_com').val();
	var com_post_id = $('#com_post_id').val();

	if(comenter_name.length > 2){

		if(comenter_email.length > 5 && comenter_email.indexOf("@")!=-1 && comenter_email.indexOf(".")!=-1 ){
		 
			if(comenter_com.length > 1){

				$('#author_comment').html("<img src='s/i/loading.gif' alt='' style='margin:12px 60px;'/>");

				JsHttpRequest.query(
				  'ajax.php?x='+Math.random(), 
				  {
				   'post_id':  com_post_id,
				   'com_name':  comenter_name,
				   'com_email':  comenter_email,
				   'com_comm':  comenter_com
				  },
				  function(result, errors) {
					if(errors){
					//$('regForm').innerHTML=errors; 
					alert(errors);
					}
					if(result){
						$('#author_comment').html(result);
					   }
				   }

				);
			
			}
			else { $('#c_com').css("border", "1px solid red");}

		}
		else { $('#c_email_id').css("border", "1px solid red");}
	
	}
	else { $('#c_name_id').css("border", "1px solid red");}
	
}