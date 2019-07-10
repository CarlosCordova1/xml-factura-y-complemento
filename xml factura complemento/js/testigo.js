function loadTemplateTestigo(argument) {
	//alert("cargo la plantilla para de Testigo");
	//console.log(argument);
	templateTestigo(argument);
}
function templateTestigo(argument) {
	//alert("plantilla");
	//$("#antecedentesTEST").append("<h3>Folio: "+argument.folio+"</h3>");
	TestigoPlantilla(argument);
}
function TestigoPlantilla(argument){
 
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "TestigoPlantilla",
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
      $("#testigoAJAX").html(html);
   
       
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar la plantilla de testigo');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function guardarTestigo(argument){
 //console.log(argument);
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "gt",
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
              //alertify.success("Bien hecho!!!");
             //loadTemplate de algo mas.... (json);
             //$("#BtnSiguienteInsBancaria").removeAttr('disabled').removeClass('disabled');
            $("#BtnGuardarTestigo").attr('disabled',"disabled").addClass('disabled');  
            }
            else{
               alertify.alert("Hubo error al actualizar dato de testigo");
            }      
        //segun la accion activo o desactivo los botones
      

       
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al guardar datos de testigo');
      // alertify.alert("Hubo error al buscar");
     // console.log(xhr);
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}