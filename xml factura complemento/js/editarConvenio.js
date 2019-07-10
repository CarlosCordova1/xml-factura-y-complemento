function cargarPlatillaEditarConvenio(folio){
 //console.log(folio);
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "EditarConvenios",folio:folio },
    type : 'POST',
    dataType : 'html',
     beforeSend : function(xhr, status) {
       $(".contenidoEditar").html(gifLoad());     
    },
    success : function(html) {
     // console.log(html);  
      $(".contenidoEditar").html(html);     
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar la plantilla para editar Convenio');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
      }
});

}
function actualizarConvenio(folio,fecha,versionPlantilla,reportefolio){
    $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "actualizarConvenio",folio:folio,fecha:fecha,
   versionPlantilla:versionPlantilla,reportefolio:reportefolio },
    type : 'POST',
    dataType : 'JSON',
    success : function(json) {
     console.log(json);  
     // $(".contenidoEditar").html(html); 
     if(json.status==1){
alertify.success("Datos modificados"); 
     }
     else{
      alertify.alert(json.msg);
      alertify.error("action cancelada");  
     }
        
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al editar Convenio');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
      }
});
}
function cargarPlatillaEditarAntecedentes(folio){
 //console.log(folio);
 
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "AntecedentesPlantilla",data:folio },
    type : 'POST',
    dataType : 'html',
     beforeSend : function(xhr, status) {
       $(".antecedentesAjaxEditar").html(gifLoad());     
    },
    success : function(AntecedentesPlantilla) {
     //console.log(html);  
      $(".antecedentesAjaxEditar").html(html);     
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar la plantilla para editar el antecedente');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
      }
});

}





function cargarPlatillaEditarDesarrollador(folio){
 //console.log(folio);
 
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "DesarrolladorPlantilla",data:folio },
    type : 'POST',
    dataType : 'html',
     beforeSend : function(xhr, status) {
       $(".desarrolladorAjaxEdit").html(gifLoad());  
      
    },
    success : function(html) {
     //console.log(html);  
      $(".desarrolladorAjaxEdit").html(html);     
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar la plantilla para editar el Desarrollador');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
      }
});

}
function cargarPlatillaEditarObligadoSolidario(folio){
 //console.log(folio);
 
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "ObligadoSolidarioPlantilla",data:folio },
    type : 'POST',
    dataType : 'html',
     beforeSend : function(xhr, status) {
       $(".obligadoSolidarioAJAXEdit").html(gifLoad());     
    },
    success : function(html) {
     //console.log(html);  
      $(".obligadoSolidarioAJAXEdit").html(html);     
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar la plantilla para editar el Obligado Solidario');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
      }
});

}
function cargarPlatillaEditarInstitucionBancaria(folio){
 //console.log(folio);
 
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "InstitucionBancariaPlantilla",data:folio },
    type : 'POST',
    dataType : 'html',
     beforeSend : function(xhr, status) {
       $(".institucionBancariaAJAXEdit").html(gifLoad());     
    },
    success : function(html) {
     //console.log(html);  
      $(".institucionBancariaAJAXEdit").html(html);     
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar la plantilla para editar La Institucion Bancaria');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
      }
});

}
function cargarPlatillaEditarTestigo(folio){
 //console.log(folio);
 
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "TestigoPlantilla",data:folio },
    type : 'POST',
    dataType : 'html',
     beforeSend : function(xhr, status) {
       $(".testigoAJAXEdit").html(gifLoad());     
    },
    success : function(html) {
     //console.log(html);  
      $(".testigoAJAXEdit").html(html);     
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar la plantilla para editar Testigo');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
      }
});

}