<?php 
if($data1){
?>  
     <div class="panel panel-default">
    <div class="panel-heading">RELACION DE LOS COBROS REALIZADOS POR DOTACION DE LITROS POR SEGUNDO (LPS)  POR APORTACION PARA OBRAS DE CABECERA DE MARZO DE 2016</div>
    <div class="panel-body">Contenido</div>
    <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
  </div>
     


   

<script type="text/javascript">
	$(document).ready(function(e) {


$(".showFilieUpload").on("click", ".eliminarFiliUpload", function(){
     var folio='<?php echo $this->post["folio"]?>'
      var file=$(this).data("file");
      var evento=$(this);
        alertify.confirm("¿Eliminar archivo?", function (e) {
        if (e) {
           eliminarFileUpload(file,evento);//
         //cargarPlatillaEditarConvenio(folio);
      
       
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;
     
});


  });// end document. ready

 
function getArchivos() {
    $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "mostrarFileFolio", folio:'<?php echo $this->post["folio"]?>' },
    type : 'POST',
    dataType : 'html',
     beforeSend : function(xhr, status) {
      $(".showFilieUpload").html(gifLoad());     
    },
    success : function(html) {
     // console.log(html);  
     $(".showFilieUpload").html(html);     
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al mostrar los documentos adjuntos');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
      }
});
}
function eliminarFileUpload(file, evento) {
    $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "eliminarFileFolio", folio:'<?php echo $this->post["folio"]?>',file:file },
    type : 'POST',
    dataType : 'JSON',
     beforeSend : function(xhr, status) {
      //$(".showFilieUpload").html(gifLoad());     
    },
    success : function(json) {
      console.log(json);
      if(json.status==1)
      {
        alertify.success(json.msg);
         evento.parent('div').parent('div').parent('div').hide("slow"); 
      }
      else{
         alertify.error(json.msg);
      }
     
     //$(".showFilieUpload").html(html);     
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al eliminar el documento adjunto');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
      }
});
}


</script>


<?php 

}
else{
	echo "Acceso no permitido...";
}
?>	