<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-files-o"></i> Recherche</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Accueil</a></li>
              <li><i class="fa fa-users"></i>Client</li>
              <li><i class="fa fa-search"></i>Recherche</li>
            </ol>
          </div>
        </div>
    

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
              </header>
              <div class="panel-body">
                <form class="form-inline" role="form"  method="post">
                  <div class="form-group">
                    <label class="sr-only" for="lienfb"></label>
                    <input type="text" class="form-control search_input" id="recherche" placeholder="Entre mot cle" name="recherche">
                  </div>
                <button type="submit" class="btn btn-primary">Recherche</button>
                <div class="form-inline">   
                </form>

              </div>
            </section>

          </div>
        </div>


<div class="row">
          <div class="col-lg-12 resultat">
           
          </div>
        </div>
           
      </section>
    </section>
<script type="text/javascript"> 
$(document).ready(function(){
$(".search_input").focus();
$(".search_input").keyup(function() 
{
var search_input = $(this).val();
var keyword= encodeURIComponent(search_input);
var yt_url='http://api.search.live.net/json.aspx?JsonType=callback&JsonCallback=?&Appid=642636B8B26344A69F5FA5C22A629A163752DC6B&query='+keyword+'&sources=web'; 
 
$.ajax({
type: "GET",
url: yt_url,
dataType:"jsonp",
success: function(response)
{
 
$("#result").html('');
if(response.SearchResponse.Web.Results.length)
{
 
 
 
$.each(response.SearchResponse.Web.Results, function(i,data)
{
var title=data.Title;
var dis=data.Description;
var url=data.Url;
 
var final="<div class='webresult'><div class='title'><a href='"+url+"' target='_blank'>"+title+"</a></div><div class='desc'>"+dis+"</div><div class='url'>"+url+"</div></div>";
$("#result").append(final);
 
});
 
}
else
{
$("#result").html("<div id='no'>No results</div>");
}
}
 
});
 
});
});
 
</script>