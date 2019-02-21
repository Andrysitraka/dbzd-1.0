 $(document).ready(function(){
  $.post('fonction/fonctiondropdown.php',function(data){
      $('.relancedrop li:last-child').prev().append(data);      
      });
  $.post('fonction/fonctionbadgerelance.php',function(data){
       $('.bg-important').empty().append(data.badge);
   },'json');

 
 $(".suppr").on('click',function(){   
      $(this).parent().parent().remove();;
    });
 $(".qt").on('change',function(){
    var quantite=$(this).val();
    var priproduit=$('.contprix .prix').text();
    var total=quantite*priproduit;
    $('.total .conttotal').empty().append(total+" Ar");
    var table=$(this).parent().parent();
    

   });
 $('.cherche').on('focusout',function(){
  var cherche=$(this).val();
  $.post('fonction/fonctionrechercheClientvente.php',{cherche:cherche},function(data){
    var client=data.client;
    if(client!=""){
      $('.select option').each(function(){
        var option =$(this).val().split(" ");
       if( option[0]==client){
           $(this).attr("selected","selected");
         }
        });
    }
         console.log(data.client);
   },'json');
 });
  function fonctiondel(){
    $('.suppr').on('click',function(){
        $(this).parent().parent().remove();
       totaltab();
    });
function totaltab(){
var sum = 0; 
$('.tot').each(function() { 
sum += parseInt($(this).html()); 
}); 
   var aff=$('.total').empty().append(sum+' MGA');
   return (aff);
  } 

    $('.Qua').on('change',function(){
      if ($(this).val()<1){
        alert('Le nombre de produit ne doit pas être inférieur a 1');
        $(this).val('1');

      }
      var content=$(this).parent();
      var total=content.next();
      var quantite=$(this).val();  
      var prix=content.parent().find('th').eq(2).html(); 
      var Qt=prix.split(",");
      var number = Qt[0].replace(".","");
      total.empty().append(parseInt(number)*quantite);
      totaltab();
    });
  }
  $(".validproduit").on('click',function(event){
     event.preventDefault();
     if( typeof($('.prod').html())=='undefined'){
      detailproduit();

     }else{
      var prod=$('.prod');
      var table=new Array();
      prod.each(function(){
         table.push($(this).html());
      });
      var codeproduit=$('#recherche').val();
      var produitcode= codeproduit.split("/");
     if ($.inArray(produitcode[0],table)!=-1) { 
        alert('Ce produit existe déjà dans votre bon de commande. Veuillez modifier la quantité pour ajouter une commande.');
      }else{
       detailproduit();
      } 
     }
    });

function detailproduit(){
  var cat=$('.selectProduit').val();
  var code=$('#recherche').val();
  var tri=code.split("/");
  var codeproduit=tri[0];
  if (codeproduit!=""){
  $.post('fonction/fonctionProduit.php',{codeproduit:codeproduit,cat:cat},function(data){ 
        if (data.error===false) {    
      $('.table>tbody:last').append('<tr><th class="prod">'+ data.codeproduit+'</th>'+ data.designation+'<th class="prix">'+ data.prix+'</th><th class="quant"><input style="width:50px;text-align:center;" type="number" class="Qua" value="1"></th><th class="tot">'+data.prix+'</th>'+data.photoproduit +'<th>'+'<button class="btn btn-danger suppr"><i class="icon_close_alt2"></i></button>'+'</th></tr>'); 
      var sum = 0; 
   $('.tot').each(function() { 
   var Qt=$(this).html();
   var prix=Qt.split(",");
   var number = prix[0].replace(".","")
   sum += parseInt(number);
   }); 
   $('.total').empty().append(sum+' MGA');
      fonctiondel(); 
      $('#recherche').val("");
    }else{alert("Ce produit n'exist pas");}},'json');   
  }else{ alert('Vous deviez choisir un produit');}
     }

  $('.btn-test').on('click',function(event){
        event.preventDefault();
        var produit=new Array();
        var quantite=new Array();
        var i=0;
        var t=0;
        var client=$('.select-client').val();
        var datecommande=$('.datecommande').val();
        var date=$('.datelivre').val();
        var Debut=$('.Debut').val();
        var Fin=$('.Fin').val();
        var ville=$('.ville').val();
        var quartier=$('.quartier').val();
        var lieulivre=$('.lieulivre').val();
        var remarque=$('.comment').val();
        
        $('.prod').each(function(){

          produit[i]=$(this).html(); 
          i++;   
        });
        $('.quant').each(function(){ 
           quantite[t]=$(this).find('.Qua').val();  
           t++;   
        });
if(date<datecommande){
      alert("La date de commande ne doit pas dépassée la date delivraison ");
    }else if(Debut>Fin || Debut==Fin){  
        alert("Tranche d'heure de livraison incorrect,veuiilez entrer tranche d'heure valide");
     }else if(Debut==""){
          alert('Veuillez remplir tous les champs avant de valider votre transaction.');
      }else if(Fin==""){
             alert('Veuillez remplir tous les champs avant de valider votre transaction.');
       }else if(client==""){
               alert('Veuillez remplir tous les champs avant de valider votre transaction.');
        }else if(ville==""){
                 alert('Veuillez remplir tous les champs avant de valider votre transaction.');
          }else if(quartier==""){
                    alert('Veuillez remplir tous les champs avant de valider votre transaction.');
            }else if(lieulivre==""){
                      alert('Veuillez remplir tous les champs avant de valider votre transaction.');
             }else if(produit[0]==undefined){
                        alert("Veuillez entre un produit");
                 }else{
          $.post('fonction/fonctionFacture.php',function(data){
            var fact=data.codefact;
            for (var p=0; p < quantite.length ; p++) {
              var quantiter=quantite[p]
              var produitr=produit[p]

               $.post('fonction/fonctionengestrementcomande.php',{fact:fact,date:date,Debut:Debut,Fin:Fin,ville:ville,quartier:quartier,lieulivre:lieulivre,remarque:remarque,quantiter:quantiter,produitr:produitr,datecommande:datecommande,client:client},function(data){
               });   
            }
          },'json'); 
        $('.tbody tr').remove();
        $('.select-client').val("");
        $('.image').empty().append("");
        $('.datecommande').val("");
        $('.datelivre').val("");
        $('.Debut').val("");
        $('.Fin').val("");
        $('.ville').val("");
        $('.quartier').val("");
        $('.lieulivre').val("");
        $('.comment').val("");
        $('.total').empty().append();
        }
        
    
     });
  $('.selectProduit').on('change',function(){
    $('#recherche').val("");
  });

  $('.print').on('click',function(event){
    event.preventDefault();
    $("table").print();
    return false;
    });
});