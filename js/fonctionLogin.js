$(document).ready(function(){
$('#user').on('focus',function(){
	 $('.error').empty().append();   
});
$('#pass').on('focus',function(){
	 $('.error').empty().append();   
});
	$('.btn-block').on('click',function(event){
		event.preventDefault();
		var user=$('#user').val();
		var pass=$('#pass').val();
	if(user==""){
      $('.error').empty().append('Mot de passe incorrecte ou non d\'utilisateur incorrect!');     
	}else if(pass==""){
	  $('.error').empty().append('Mot de passe incorrecte ou non d\'utilisateur incorrect!');
	}else{
	$.post('page/fonction/fonctionLogin.php',{user:user,pass:pass},function(data){
             if(data.error===false){
             	if(data.statut=="Administrateur"){
             		window.location.replace("page/Accueil.php");
             	}else if(data.statut=="user"){
             		window.location.replace("livraison/Page/Accueil.php");
             	}
               
             }else{
             $('.error').empty().append('Mot de passe incorrecte ou non d\'utilisateur incorrect!');
             }
		},'json');
          
	}	
	});
});