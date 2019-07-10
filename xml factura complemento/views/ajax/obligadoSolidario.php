<?php 
if($data1){
?>	
     <div class="panel-heading"> <?php echo (isset($data->folio) ?"<h3> Folio:".$data->folio."</h3>":"")?></div>
     <?php 
$a="";
$b="";
foreach ($oSolidario as $key => $value) {  $a=$value;} $oSolidario=$a;
foreach ($dataconvenio as $key => $value) {  $b=$value;} $dataconvenio=$b;
    
//echo "<h1>regimen fiscal  ".$dataconvenio->regimenfiscal."</h1>";
//var_dump($oSolidario);
?>
                        <div class="panel-body">
                       <div class="row">
                       <?php //echo ($dataconvenio->regimenfiscal==0 ? '<div class="alert alert-warning"><label  class="col-form-label">No aplica para el regimen de persona moral</label></div>':"")?>
                       
                      <div class="col-xs-4">
                      <label for="nombreDeObliado" class="col-form-label">Nombre</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control"  maxlength="45" type="text" value="<?php echo ($oSolidario->nombre!=null || $oSolidario->nombre!="" ? $oSolidario->nombre :"")?>" id="nombreDeObliado" name="osDomicilio" placeholder="Ingresa Nombre del Obligado Solidario">
                      </div>
                      </div>
                      <br>

                      <div class="row">
                     
                      <div class="col-xs-4">
                      <label for="osLocalidad" class="col-form-label">Originario/Localidad</label>
                      </div>
                      <div class="col-xs-8">
                       <select class="form-control" id="osLocalidad"  name="osLocalidad">
                        <option value="">----------</option>
                        <option value="noaplica" <?php echo ($oSolidario->localidad=="noaplica" ? 'selected="selected"':"")?>>No Aplica</option>
                        <option value="Quintana Roo" <?php echo ($oSolidario->localidad=="Quintana Roo" ? 'selected="selected"':"")?>>Quintana Roo</option>
                        <option value="Merida" <?php echo ($oSolidario->localidad=="Merida" ? 'selected="selected"':"")?>>Merida</option>
                        <option value="Tabasco" <?php echo ($oSolidario->localidad=="Tabasco" ? 'selected="selected"':"")?>>Tabasco</option>
                         <option value="Veracruz" <?php echo ($oSolidario->localidad=="Veracruz" ? 'selected="selected"':"")?>>Veracruz</option>
                      </select>
                      </div>
                      </div>
                        <br>
                      <div class="row">
                      <div class="col-xs-4">
                      <label for="osDomicilio" class="col-form-label">Domicilio</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" maxlength="45"  type="text" value="<?php echo ($oSolidario->domicilio!=null || $oSolidario->domicilio!="" ? $oSolidario->domicilio :"")?>" id="osDomicilio" name="osDomicilio" placeholder="Ingresa Domicilio">
                      </div>
                      </div>
                      <br>
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="osNombreIdentificacion" class="col-form-label">Nombre de Identificacion</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text" maxlength="45"  value="<?php echo ($oSolidario->identificacion!=null || $oSolidario->identificacion!="" ? $oSolidario->identificacion :"")?>" id="osNombreIdentificacion" name="osNombreIdentificacion"  placeholder="Ingresa Nombre de Identificacion">
                      </div>
                      </div>
                      <br>
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="osNumeroIdentificacion" maxlength="45" class="col-form-label">Numero de Identificacion</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text"    maxlength="45" value="<?php echo ($oSolidario->numero!=null || $oSolidario->numero!="" ? $oSolidario->numero :"")?>" id="osNumeroIdentificacion" name="osNumeroIdentificacion" placeholder="Ingresa Numero de Identificacion">
                      </div>
                      </div>
                      <br>
                        <div class="row">
                      <div class="col-xs-4">
                      <label for="osQuienExpide" class="col-form-label">Quien Expide Identificacion</label>
                      </div>
                      <div class="col-xs-8">
                      <input class="form-control" type="text"  maxlength="45" value="<?php echo ($oSolidario->expedidaPor!=null || $oSolidario->expedidaPor!="" ? $oSolidario->expedidaPor :"")?>" id="osQuienExpide" name="osQuienExpide" placeholder="Ingresa Quien Expide Identificacion">
                      </div>
                      </div>


                        </div>
                 


<script type="text/javascript">
	$(document).ready(function($) {
	
  <?php 
 /* if($dataconvenio->regimenfiscal==0){
?>
$("#BtnGuardarObliSolidEdit").attr('disabled','disabled');
 
              $("#BtnObliSoliSiguiente").removeAttr('disabled').removeClass('disabled');
               $("#BtnObliSoliSiguiente").click(function(event) {
                var json='{"folio":"<?php echo $data->folio ?>","status":1}';
                json=JSON.parse(json);
                console.log(json);
                loadTemplateInstitucionBancaria(json);
               });

            $("#BtnGuardarObliSolid").attr('disabled',"disabled").addClass('disabled'); 

<?php
}*/
?> 




var dateToday = new Date();
$('#dpFecha').datepicker({
    format: 'dd/mm/yyyy',
  todayBtn: "linked",
    language: "es",
    //startDate: '-3d',
    //minDate: 1,
     autoclose: true,
    todayHighlight: true
   
});


	$("#FormobligadoSolidario").on( 'click', function () {
     $('#FormobligadoSolidario').bootstrapValidator('validate');

    });

$('#FormobligadoSolidario').bootstrapValidator({
    //  live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok has-success has-feedback',
            invalid: 'glyphicon glyphicon-remove has-error has-feedback',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            osLocalidad: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },
            osDomicilio: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
              osNombreIdentificacion: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
            osNumeroIdentificacion: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
             osQuienExpide: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            }, 
            nombreDeObliado: {
                group: '.col-xs-8',
                validators: {
                    notEmpty: {
                        message: ' '
                    }
                }
            },                
        }
    });



$('#FormobligadoSolidario').submit(function(event){

  // prevent default browser behaviour
  event.preventDefault();

  //do stuff with your form here

});
$( "#FormobligadoSolidario" ).keypress(function(e) {
  if(e.which == 13) {
        event.preventDefault();
    }
});

	});//termina document.ready

function datosObligadoSolidario(){
  //alert("esta es la funcion ya definida del obligado solidario");
  
  
  var nombreDeObliado=$("#nombreDeObliado").val().trim();
var osLocalidad=$("#osLocalidad").val().trim();
var osDomicilio=$("#osDomicilio").val().trim();
var osNombreIdentificacion=$("#osNombreIdentificacion").val().trim();
var osNumeroIdentificacion=$("#osNumeroIdentificacion").val().trim();
var osQuienExpide=$("#osQuienExpide").val().trim();


var folio="<?php echo (isset($data->folio)? $data->folio:$folio)?>";

  var datos = {
    "folio":folio,
    "nombreDeObliado":nombreDeObliado,
    "osLocalidad":osLocalidad,
    "osDomicilio":osDomicilio,
    "osNombreIdentificacion":osNombreIdentificacion,
    "osNumeroIdentificacion":osNumeroIdentificacion,
    "osQuienExpide":osQuienExpide,
   };


//si es true los datos no estan vacios
var vandera=true;
for(value in datos ){
if(datos[value]==""){
  vandera=false;
}
}

return { "estatus":vandera, "datos":datos};

}




</script>


<?php 
}
else{
	echo "Acceso no permitido...";
}
?>	