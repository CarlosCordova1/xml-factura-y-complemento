function loadTemplateObligadoSolidario(argument) {
	//alert("cargo la plantilla para el ObligadoSolidario");
	//console.log(argument);
	templateObliSoli(argument);
}
function templateObliSoli(argument) {
	//alert("plantilla");
	//$("#antecedentesTEST").append("<h3>Folio: "+argument.folio+"</h3>");
	obligadoSolidarioPlantilla(argument);
}
function obligadoSolidarioPlantilla(argument){
 
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "ObligadoSolidarioPlantilla",
   			 data:JSON.stringify(argument) },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'html',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(html) {
      //console.log(html);
     // alert(html);
      $("#obligadoSolidarioAJAX").html(html);
   
       
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar la plantilla de obligado solidario');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function guardarObliadoSolidario(argument){
// console.log(argument);
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "gos",
         //data:JSON.stringify(argument) },
         data:argument.datos },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'JSON',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(json) {
      console.log(json);
     // alert(JSON);
      //$("#antecedentesAjax").html(JSON);
            if(json.status==1){
            	alertify.success("Datos guardados");
              //alertify.success("Haz click en Siguiente");
             loadTemplateInstitucionBancaria(json);
              $("#BtnObliSoliSiguiente").removeAttr('disabled').removeClass('disabled');
            $("#BtnGuardarObliSolid").attr('disabled',"disabled").addClass('disabled'); 
            }
            else{
               alertify.alert("Hubo error al actualizar dato se obligado Solidario");
            }      
        //segun la accion activo o desactivo los botones
      

       
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al guardar datos del obligado solidario');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}