$(document).ready(function(){
	listcat();
	function listcat(){
	$.post('../Page/fonction/fonctionCathegory.php',function(data){
        $('.tableCat').empty().append(data);
	});
    }
    $('.tableCatgory').DataTable();
    $('#cathegory').on('click',function(event){
         event.preventDefault();
         var famille=$('.famille').val();
         var groupe=$('.groupe').val();
        var designation=$('#designation').val();
  $.post('../Page/fonction/fonctionAjoutCathegory.php',{groupe:groupe,famille:famille},function(data){
          listcat();
         alert(data.message);      
     },'json');
   });
   

});