$(document).ready(function(){
	listcat();
	setInterval(listcat,1000);
	function listcat(){
	$.post('../Page/fonction/fonctionCathegory.php',function(data){
        $('.tableCat').empty().append(data);
	});
    }

    $('#cathegory').on('click',function(event){
         event.preventDefault();
        var designation=$('#designation').val();
  $.post('../Page/fonction/fonctionAjoutCathegory.php',{designation:designation},function(data){
         console.log(data.message);      
     },'json');
   });
   

});