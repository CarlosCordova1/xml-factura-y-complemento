function URLbuscarContrato(ncontrato){//busca el contrato
  //return 'http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lpsora&sql=ctr&prm='+ncontrato+'&app=lpsOra';
  return'http://aguakan.com/git/api/apiagk.php?urlget=cvn/1.0/convenio-lps/';
}
function URLbuscarContratoEnconvenios(ncontrato){//busca si existe el contrato entre los convenios
  return 'http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lps&sql=cnvb&prm='+ncontrato+'&app=lpsOra';
  
}
function URLcargarplantilla(select){
  return 'http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lps&sql=cnvf&prm='+select+'&app=lpsOra';
}
function URLcargarplantilla_api(select){
  return 'http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lps&sql=cnvf&prm='+select+'&app=lpsOra';
}
function APIAGK(){
  return 'http://aguakan.com/git/api/apiagk.php?urlget=cvn/1.0/convenio-lps/';
}
function AjaxURL(){
  return 'controllers/ajax.php';
}
 function gifLoad(){
  return '<img class="img-responsive center-block" src="assets/img/load.gif" alt="Load" height="112" width="112">';
 }



function guardar(){
  // cuando crea nuevo convenifirmarConvenioo limpiar los input y habilidar el boton de guardar
  //alert("Se guardo");
   //alertify.success("Datos");
//$("#btnConvenio").removeAttr('disabled').removeClass('disabled');
var contrato=$("#inputNContrato").val().trim();
if(validacamposCrearConvenios()){buscarContratoEnconvenios(contrato);}else{
   alertify.alert("Favor de no dejar campos vacios");
    alertify.error("Accion Cancelada");
}
//buscarContratoEnconvenios(contrato);

//buscarContrato(contrato);

}
function buscarContrato(ncontrato){
  
  $.ajax({
    // la URL para la petición
    //url :URLbuscarContrato(ncontrato) ,
    url:APIAGK(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
    data : { action : 'datoscontrato',contrato: ncontrato},
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'json',
     beforeSend : function(xhr, status) {
       //alertify.alert(gifLoad());     
    }, 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función
    success : function(json) {
        //$('<h1/>').text(json.title).appendTo('body');
        //$('<div class="content"/>')
          //  .html(json.html).appendTo('body');
          //console.log('buscar contrato en oracle');
         console.log(json);
          if (json.error) {
            alertify.alert(String(json.msg));
             alertify.error("Accion Cancelada");
          }

          else{
             //alertify.alert("se encontro contrato");
//try {
              if (typeof  (json[0])!='undefined') {
                 if( json[0].status==0){
              if (json[0].msg===undefined) {
                      alertify.alert("Mensaje: "+json[0].message +" Descripcion: "+json[0].description);
                  }else{
                    alertify.alert("Error: "+json[0].code+": Mensaje:"+json[0].msg);
                  }
                 }else{
                   if (json[0].msg===undefined) {
                      alertify.alert("Mensaje: "+json[0].message +" Descripcion: "+json[0].description);
                  }else{
                    alertify.alert("Error: "+json[0].code+": Mensaje:"+json[0].msg);
                  }

                 }
                                
                  
             alertify.error("Accion Cancelada");
             }
                else{
                  var tr='';
             var suma=0;
            $.each(json,function(index, value){
              if (value!==null) {
                if (value!="") {
                  suma++;
                   tr+='<tr> <th>' + suma + '</th> <th>' + index + '</th>        <td>' + value + '</td>      </tr>    <tr>';
                }
                
              }
    //console.log('My array has at position ' + index + ', this value: ' + value);
   
});
            var tablita='<table class="table table-bordered">    <tbody> '+tr+'  </tbody>  </table>';
            
              alertify.confirm("<h3>Se encontraron los siguientes datos asociados al contrato</h3>"+tablita+"<br> <h4><br><div class='alert alert-warning'>Si desea cambiar estos datos, por favor pongase en contacto con el administrador de X7</div></h4><h3> ¿Deseas crear el convenio con estos datos?</h3>", function (e) {
        if (e) {
           crearNuevoConvenio(json);
           
        } else {

          alertify.error("Accion Cancelada");
        }
      
      return false;
    }); 
                }



          

            
          }
         
    },
 
      error : function(xhr, status) {
           alertify.alert("El servicio no se encuentra disponible");
    },
 
   complete : function(xhr, status) {
     }
});
}
function buscarContratoEnconvenios(ncontrato){
  
  $.ajax({
    // la URL para la petición
    //url : URLbuscarContratoEnconvenios(ncontrato),
  url : APIAGK(),
    //type : 'GET',
    type : 'POST',
    data:{
      'action':'buscarContrato','contrato':ncontrato
    },
    dataType : 'json',
    success : function(json) {
     // console.log(json);
            //if ($.isEmptyObject(json)) {
         if(json.status==1 && json.total==0){
            buscarContrato(ncontrato);
         
             
          }
          else{
             alertify.alert("Ya existe  un convenio para este contrato");
             alertify.error("Accion Cancelada");
         
      return false;
          }
         
    },

    error : function(xhr, status) {

       alertify.alert("Hubo error al buscar");
    },
    complete : function(xhr, status) {
         }
});
}

function cargarplantilla(select){
   
  $.ajax({
    // la URL para la petición
   // url : URLcargarplantilla(select),

       url :APIAGK(),
       type : 'POST',
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : 'showplantillaFormulario',regimenfiscal:select},
    
 
    // el tipo de información que se espera de respuesta
    dataType : 'json',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función
    success : function(json) {
        //$('<h1/>').text(json.title).appendTo('body');
        //$('<div class="content"/>')
          //  .html(json.html).appendTo('body');
          //console.log(json);
         
          if ($.isEmptyObject(json)) {
            alertify.alert("no hay plantilla definida");
           // buscarContrato(ncontrato);
             $( ".versionPlantilla option" ).remove();
             $( ".versionPlantilla" ).append('<option value="">-------</option>');
          }
          else{
            // alertify.alert("Si hay plantilla");
             $( ".versionPlantilla option" ).remove();
             $( ".versionPlantilla" ).append('<option value="">-------</option>');

                for (i in json) { 
             // console.log("msgForIn" + json[i].nota + ' - '); 
               $( ".versionPlantilla" ).append('<option value="'+ json[i].idFormulario + '(0)'+ json[i].nota + '">'+ json[i].version + '</option>');
          }

          }
         
    },
 
    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
       // alert('Disculpe, existió un problema');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function validacamposCrearConvenios(){
  
  var bool=false;
  var inputNContrato=$("#inputNContrato").val().trim();
  var fechainicioconvenio=$("#fechainicioconvenio").val().trim();
  var versionPlantilla=$(".versionPlantilla").val();
 

if(inputNContrato!="" && fechainicioconvenio!="" && versionPlantilla!="" && versionPlantilla!="0"){
 bool=[inputNContrato, fechainicioconvenio, versionPlantilla];
}
 return bool;
}
function crearNuevoConvenio(json){
  //alert(" aqui crearNuevoConvenio");
  var valor=validacamposCrearConvenios();
//console.log(valor);
var arr=valor[2].split("(0)");
  var vp=arr[0];

  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "c",
   contrato:valor[0],
   date:valor[1],
   vp:vp,
   data:JSON.stringify(json) },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'JSON',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(json) {
      console.log(json);
            if(json.status==1){
              $("#btnConvenio").removeAttr('disabled').removeClass('disabled');
            $("#crearConvenio").attr('disabled',"disabled").addClass('disabled');

        //alert(json);
       // console.log(json);
        alertify.success("Haz click en Siguiente");
        loadTemplateAntecedentes(json);
            }
            else{
               alertify.alert("Hubo error"+"<br><b>Error</b><br>"+json.error);
            }      
        //segun la accion activo o desactivo los botones
      


         
    },
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al crear el convenio');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}

function login(datos){


  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "login",  u:datos.username, p:datos.password },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'JSON',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(json) {
     console.log(json);
            if(json.status==1){
            alertify.success("Acceso permitido");
            cargarplantillaParaUsuariosRegistrados();
            $("#myModalLogin").modal("hide");
            }
            else{
               alertify.error("Acceso denegado");
            }      
        //segun la accion activo o desactivo los botones
         
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al validar Usuario');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function validarDatosLogin(){
  var estatus=0;
var username=$("#username").val().trim();
var password=$("#password").val().trim();
if (username!="" && password!="") {
  estatus=1;
}
 var datos = {
    "status":estatus,

    "username":username,
    "password":password,
   
   };

  return datos;
}
function cargarplantillaParaUsuariosRegistrados(){


  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "lgr" },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'html',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(html) {
    $("#pageContentRegistrado").html(html);
    $("#soloLectura").html("");
    
      },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar usuario registrado');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function logout(){


  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "logout" },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'JSON',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(JSON) {
      //console.log();
    //$("#pageContentRegistrado").html(html);
    //$("#soloLectura").html("");
    location.reload();
     },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cerrar sesion');
      // alertify.alert("Hubo error al buscar");
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function cargarplantillaParaCargarArchivos(folio){


  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
   data : { action : "loadFile",folio:folio },
 
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'html',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(html) {
     $(".contentfileAttached").html(html);
  
    },

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar la plantilla de archivos');
     
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}