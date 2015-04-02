$(document).ready(function(){
	$('#cpanel .inModeration').click(function() {
		showModeration(1);
		return false;
	});
	$('#cpanel .spam').click(function() {
		showModeration(2);
		return false;
	});
});

function adminEdit(id){
	AjaxArr = {action: 'editShow',pageAdr:pageAdr, id:id, sessID:sessID}
	toAjax(AjaxArr,'adminAjax.php');
}

function afterAdminEdit(val){
	$('#forAdmin').html(val);
	$('#forAdmin').center();
	$('#forAdmin').css('display','block');
}

var post=Array();
var category=Array();
function editSave(id){
	post=Array();
	category=Array();
	post['id']=id;
	post['author']=$('#author').val();
	post['date']=$('#date').val();
	post['text']=$('#text').val();
	post['raiting']=$('#raiting').val();
	post['slug']=$('#slug').val();
	i=0;
	$('#forAdmin input:checkbox').each(function(index) {
		if($(this).attr('checked')){
			category[i]=$(this).val();
			i++;
		}
	});
	//checking
	if(i==0){
		alert("Select category.");
		return false;
	}
	if($('#text').val()==''){
		alert("Enter text.");
		return false;
	}
	post['category']=category;

	$('#forAdmin input:radio').each(function(index) {
		if($(this).attr('checked')){
			post['moderation']=$(this).val();
		}
	});

	AjaxArr = {action: 'editSave',pageAdr:pageAdr, id:id, post:post, sessID:sessID}
	toAjax(AjaxArr,'adminAjax.php');

}

function afterAdminSave(adr){
	if(confirm('Want to see post?'))location.href=adr;
	$('#forAdmin').css('display','none');
}

function closeAdminBoard(){
	$('#forAdmin').css('display','none');
}

function showModeration(type){
	$('#cpanel').css('background','#aaa');
	$('#cpanel').css('cursor','wait');
	$('#cpanel a').css('cursor','wait');
	AjaxArr = {action: 'moderationShow',pageAdr:pageAdr, type:type, sessID:sessID}
	toAjax(AjaxArr,'adminAjax.php');
}

function afterShowModeration(text){
	$('#forAdmin').html(text);
	$('#forAdmin').center();
	$('#forAdmin').css('display','block');
	
	$('#cpanel').css('background','#fff');
	$('#cpanel').css('cursor','auto');
	$('#cpanel a').css('cursor','pointer');
}