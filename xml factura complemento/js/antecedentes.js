function loadTemplateAntecedentes(argument) {
	//alert("cargo la plantilla para antendedentes");
	//console.log(argument);
	templateAnt(argument);
}
function templateAnt(argument) {
	//alert("plantilla");
	//$("#antecedentesTEST").append("<h3>Folio: "+argument.folio+"</h3>");
	antendedentesPlantilla(argument);
}
function antendedentesPlantilla(argument){
 
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "AntecedentesPlantilla",
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
      $("#antecedentesAjax").html(html);
      /*      if(json.status==1){
              $("#btnConvenio").removeAttr('disabled').removeClass('disabled');
            $("#crearConvenio").attr('disabled',"disabled").addClass('disabled');

        //alert(json);
       // console.log(json);
        alertify.success("Haz click en Siguiente");
        loadTemplateAntecedentes(json);
            }
            else{
               alertify.alert("Hubo error al actualizar tablas");
            }      
        //segun la accion activo o desactivo los botones
      
*/
       
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar la plantilla');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function guardarAntecedentes(argument){
 console.log(argument);
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "ga",
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
              //alertify.success("Haz click en Siguiente");
              alertify.success("Datos Guardados");
              loadTemplateDesarrollador(json);
              $("#BtnSigAntecedente").removeAttr('disabled').removeClass('disabled');
            $("#BtnGuardar").attr('disabled',"disabled").addClass('disabled');
            }
            else{
               alertify.alert("Hubo error al actualizar antecendentes");
            }      
        //segun la accion activo o desactivo los botones
      

       
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al guardar antecedentes');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
