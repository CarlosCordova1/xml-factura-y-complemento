<?php
if (isset($details)) {
	?>


    <div class="page-content">
	<div class="row">
  <div class="col-sm-12">
  	 <div class="panel-group">
    <div class="panel panel-default">
     
      <div class="panel-heading">
      <div class="row">
      <div class="col-sm-12">
      <nav class="navbar-right" role="navigation"> 
    <div class="btn-group">
<!--<button type="button" class="btn btn-success  pull-right disabled " data-toggle="tooltip" title="Usuario Logueado" > 
<span class="badge  badge-info" style="    color: #5cb85c !important;  background-color: #fff !important;"><i class="fa fa-user-o" aria-hidden="true"></i></span> <?php echo '-- --'//$dat->permisos[0]->display_name;?> </button>
-->
       </div>
        </nav>
</div>
</div><br>

               



<div class="navbar" role="banner">
 
	                  <nav class="navbar-right" role="navigation">
	                 

      <div class="btn-group">
    
    <div class="btn-group">
     <button type="button" id="mymodalNewConvenio"  data-folio="1"     class="btn btn-info fileAttachment" data-toggle="modal" data-target="#myModalfileadjunto" >
                <span data-toggle="tooltip" title="Agregar XML" >Agregar </span><i class="fa fa-file-code-o" aria-hidden="true"></i>
              </button>
     
      <?php /*?> <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Configuracion <i class="fa fa-cogs" aria-hidden="true"></i> <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
      <?php /*?>  <li><a href="#" data-toggle="modal" data-target="#myModalLogin" >Iniciar Sesion <i class="fa fa-unlock"></i></a></li>
      <?php */?>
       <?php /*?>
     <!-- <li><a href="#" data-toggle="modal" data-target="#myModalreportes"  id="reporteTabla">Reporte <i class="fa fa-th" aria-hidden="true"></i></a></li>-->
        <li><a href="#" id="logout">Cerrar Sesion <i class="fa fa-lock" aria-hidden="true"></i></a></li>
      </ul>  <?php */?>
    </div>
  </div>
	                    </nav>
	              </div>

    


      </div>
        <div class="panel-body">
        <div class="pull-right panel-options">
                <a href="#" data-rel="collapse" id="refreshTable" data-toggle="tooltip" title="Actualizar tabla"><i class="glyphicon glyphicon-refresh"></i></a>
                
              </div>

 <div class="row">
   <div class="col-sm-3"> </div>
    <div class="col-sm-6"> 
  
       <div class="form-group">
                        <label for="Receptor" class="control-label col-md-4 col-sm-4 col-xs-12">Receptor</label>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                         <select id="Receptor" class="form-control has-feedback-left" required>
                          <option     value="0">Todo</option>
                          <?php
                          foreach ($Acceso as $key => $value) {  
                           
                         ?>
                           <option     value="<?php echo $value->RFC_RECEP?>"><?php echo $value->RFC_RECEP?></option>
                                 <?php }
                
                                 ?>                       
                          </select>

                      </div>
                        </div>
                        
                         </div>
 

 
     
         <div class="form-group">
    <div class="input-group">
     <button type="submit" id="generabtnbuscar" class="btn btn-primary" >Buscar</button>
    </div>
                     
</div>
 
 
 
   </div>
   <div class="col-sm-2"> </div>
 </div>


              <div class="listTable2"></div>
            <div class="listTable"></div>
          
          

      </div>


    
    </div>  
  </div>
  </div>


</div>
<script type="text/javascript">
var permisosJSON=JSON.parse('<?php echo $this->permisos();?>');
var permisosApp=permisosJSON.permisos;

  $(document).ready(function($) {
 // ShowConvenios();
 
      $('[data-toggle="tooltip"]').tooltip();
  });



$("#generabtnbuscar").click(function(event) {
 
var monto =$("#Receptor").val().trim();
 
console.log(monto); 
  Showxml_factura_complemento(monto);

 });




//validar documento
$("#pageContentRegistrado").on("click", ".validarstatusConv", function(){
    var folio=$(this).data("folio");
//console.log(permisosApp[0].servicios.cvn.admin);
if(permisosApp[0].servicios.cvn.admin==1){
  alertify.confirm("¿Quieres cambiar el estatus a validar?", function (e) {
        if (e) {
          //alertify.success("El convenio estara en estatus validar");
           estatusValidar(folio,"validar");
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;

}
else{
  alertify.alert("No tienes permisos para realizar esta acción");
}
    
});

$("#pageContentRegistrado").on("click", ".editarConvenioBack", function(){//regresar a la opcion de editar convenio
    var folio=$(this).data("folio");

//if(permisosApp[0].puedeEditar==1){
  if(permisosApp[0].servicios.cvn.admin==1){
  alertify.confirm("¿Volver a editar el convenio?", function (e) {
        if (e) {
          //alertify.success("El convenio estara en estatus validar");
           estatusValidar(folio,"editarOtraVez");
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;

}
else{
  alertify.alert("No tienes permisos para realizar esta acción");
}
    
});

$("#pageContentRegistrado").on("click", "#reporteTabla", function(){//regresar a la opcion de editar convenio
   // var folio=$(this).data("folio");

   loadPlantillareportes();
});



$("#pageContentRegistrado").on("click", ".firmarConvenio", function(){//firma el convenio y genera factura
    var folio=$(this).data("folio");

//if(permisosApp[0].PuedeFirmar==1){
  if(permisosApp[0].servicios.cvn.admin==1){
  alertify.confirm("Firmar el convenio? <br> <b>Esta accion genera la factura para los pagos</b>", function (e) {
        if (e) {
          //alertify.success("El convenio estara en estatus validar");
           estatusfirmarConvenio(folio);
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;

}
else{
  alertify.alert("No tienes permisos para realizar esta acción");
}
    
});
$("#pageContentRegistrado").on("click", ".cancelarConvenio", function(){//cancelar el convenio
    var folio=$(this).data("folio");

//if(permisosApp[0].puedeAnular==1){
  if(permisosApp[0].servicios.cvn.admin==1){
  alertify.confirm("¿Cancelar convenio?", function (e) {
        if (e) {
          estatusCancelarConvenio(folio);
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;

}
else{
  alertify.alert("No tienes permisos para realizar esta acción");
}
    
});

$("#pageContentRegistrado").on("click", ".nuevoConvenioApartirDeEste", function(){//nuevo apartir de este convenio
    var folio=$(this).data("folio");

if(permisosApp[0].puedeEditar==1){
  alertify.confirm("Crear nuevo apartir de este convenio?", function (e) {
        if (e) {
         alertify.alert("Acción no habillitada");
         alertify.error("Accion Cancelada");
        } else {
          alertify.error("Accion Cancelada");
        }
      });
      return false;

}
else{
  alertify.alert("No tienes permisos para realizar esta acción");
}
    
});


function estatusValidar(folio,accion){

  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "estatusValidar",folio:folio,accion:accion },

    type : 'POST',

    dataType : 'JSON',

    success : function(JSON) {
      //console.log(JSON);
      if (JSON.status==1) {
        alertify.success("El convenio cambio de estatus");
        $("#refreshTable").click();
      }
      else{
        alertify.alert(JSON.msg);
      }
    },

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cambiar el estatus a validar');
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function estatusfirmarConvenio(folio){

  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "estatusfirmarC",folio:folio },

    type : 'POST',

    dataType : 'JSON',

    success : function(JSON) {
      console.log(JSON);
      if (JSON.status==1) {
        alertify.success("El convenio se ha firmado");
        $("#refreshTable").click();
      }
      else{
        alertify.alert(JSON.msg);
      }
    },

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al firmar el convenio');
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function estatusCancelarConvenio(folio){

  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "estatusCancelarC",folio:folio },

    type : 'POST',

    dataType : 'JSON',

    success : function(JSON) {
      //console.log(JSON);
      if (JSON.status==1) {
        alertify.success("El convenio se ha cancelado");
        $("#refreshTable").click();
      }
      else{
        alertify.alert(JSON.msg);
      }
    },

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cancelar el convenio');
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
function loadPlantillareportes(){

  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
   data : { action : "LoadReportes" },

    type : 'POST',

    dataType : 'HTML',
  beforeSend : function(xhr, status) {
       //alertify.alert(gifLoad());     
    }, 
    success : function(hmtl) {
    $(".contenidoReporte").html(hmtl);
      
    },

    error : function(xhr, status) {
       alert('Disculpe, existió un problema al cargar reportes');
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
</script>


</div><!-- end page content-->
<?php
}else{echo "Accesso no permitido";}
	?>
