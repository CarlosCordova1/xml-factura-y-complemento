<?php
if (isset($details)) {
	?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $details["title"];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
<!--<link href="assets/jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">-->
    <!--<link href="assets/Admin-Theme-3-master/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
  <link href="assets/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <!-- styles -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="assets/Admin-Theme-3-master/css/styles.css" rel="stylesheet">
<!--<link href="assets/Admin-Theme-3-master/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">-->

<!-- Datatables -->
    <link href="assets/gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/gentelella-master/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


   <link href="assets/icheck-1.x/skins/square/blue.css" rel="stylesheet">
<link rel="stylesheet" href="assets/alertify.js-0.3.11/themes/alertify.core.css" />
	<link rel="stylesheet" href="assets/alertify.js-0.3.11/themes/alertify.default.css" id="toggleCSS" />
	<link rel="stylesheet" href="assets/bootstrapvalidator-master/dist/css/bootstrapValidator.min.css"/>
	<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="header row">
	     <div class="container" style="text-align: left; float: left;">
	        <div class="row " >
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a><?php echo $details["title"]." <span id='soloLectura'>(".$details["usuario"].")</span>";?></a></h1>
	              </div>
	           </div>
	         
	           <div class="col-md-2">
	          	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content" id="pageContentRegistrado">
	
<div class="row">
  <div class="col-sm-12">
  	 <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading"><h4></h4>

<div class="navbar" role="banner">
 
	                  <nav class="navbar-right" role="navigation">
	                 

      <div class="btn-group">
    
    <div class="btn-group">
     <button type="button"  class="btn btn-info disabled" disabled="disabled">
                <span data-toggle="tooltip" title="Crear nuevo convenio" >Nuevo </span><i class="fa fa-file-o" aria-hidden="true"></i>
              </button>
      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Configuracion <i class="fa fa-cogs" aria-hidden="true"></i> <span class="caret"></span></button>
      <ul class="dropdown-menu" role="menu">
        <li><a href="#" data-toggle="modal" data-target="#myModalLogin" >Iniciar Sesion <i class="fa fa-unlock"></i></a></li>
        <?php /*?><li><a href="#" id="logout">Cerrar Sesion <i class="fa fa-lock" aria-hidden="true"></i></a></li><?php */?>
      </ul>
    </div>
  </div>
	                    </nav>
	              </div>

    


      </div>


      <div class="panel-body">
     <!--<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example">

						<thead>
							<tr >
							<th  class="center"  >N</th>
								<th class="center" >Folio</th>
                <th class="center" >Folio Reporte</th>
								<th class="center" >Contrato</th>
								<th class="center" >Cliente</th>
								<th class="center" >Factura</th>
                <th class="center" >Convenio X7</th>

								<th class="center" >Fecha de inicio del convenio</th>
								<th class="center" >Fecha de creacion</th>
								<th class="center" >Fecha ultima modificacion</th>
								<th class="center" >Version de plantilla</th>
								<th class="center" >Estatus</th>
								<th class="center" >Usuario</th>
									<th  class="center" >Descargar</th>
								
							</tr>
						</thead>
						<tbody id="showContentConvenios"></tbody>
					</table>-->
  				

      </div>
    </div>  
  </div>
  </div>
</div>



</div><!-- end page content-->

  
<?php /*?>
    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright <?php echo date("Y");?> <a href='#'>Aguakan</a>
            </div>
            
         </div>
      </footer>
      <?php */?>

   

  </body>



  <!-- Trigger the modal with a button -->
  <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalver">Open Modal</button>-->

 <!-- Modal -->
  <div class="modal fade" id="myModalfileadjunto" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90% !important;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <!-- <h4 class="modal-title">Archivos adjuntos. Folio: <b><span class="fileModalF" ></span></b></h4>-->
           <h4 class="modal-title">Agregar XML - Factura - Complemento</h4>
        </div>
        <div class="modal-body contentfileAttached">


          


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModalver" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90% !important;">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ver folio: <b><span class="verModalF" ></span></b></h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>

  <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalver">Open Modal</button>-->

  <!-- Modal -->
  <div class="modal fade" id="myModalEditar" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90% !important;">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header" >

          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Editar folio: <b><span class="EditarModalF" > </span> <span class="msgEditfolio"></span></b></h4>
        </div>
        <div class="modal-body contenidoEditar">
     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar Sin Guardar</button>
        </div>
      </div>
      
    </div>
  </div>

 <!-- Modal -->
  <div class="modal fade" id="myModalreportes" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90% !important;">
    
      <!-- Modal content-->
      <div class="modal-content" >
        <div class="modal-header" >

          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Reportes<b><span class="EditarModalFx" > </span> <span class="msgEditfoliox"></span></b></h4>
        </div>
        <div class="modal-body contenidoReporte">
     
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>



 <!-- Modal -->
  <div class="modal fade" id="myModalLogin" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ingresar a la aplicación</h4>
        </div>
        <div class="modal-body">
        
                   <div class="logo"></div>
<div class="login-block">
    <h1>Acceso</h1>
    <h5>usuario solo Puede Crear Convenio</h5>
    <h5>usuario: Demo@Demo.com</h5>
    <h5>Contraseña: Demo</h5>
    <div class="row">
    <div class="col-sm-12">
       <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-user-o" aria-hidden="true"></i></span>
    <input type="text" class="form-control" value="" maxlength="60" placeholder="E-mail" id="username" >
    </div>
    </div>
    </div><br>
    <div class="row">
    <div class="col-sm-12">
      <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-unlock-alt fa-2" aria-hidden="true"></i></span>
    <input type="password" class="form-control" value="" maxlength="60" placeholder="Contraseña" id="password">
    </div>
    </div>
    </div><br>
 <div class="row">
     <div class="col-sm-12">
      <button type="submit" id="loginLPS" class="btn btn-primary" >Acceder</button>
    </div> 
    </div>   
</div>
        

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Continuar solo lectura</button>
        </div>
      </div>
      
    </div>
  </div>

<!-- 
Modal hide
-->
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" style="width: 90% !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Agregar nuevo convenio LPS</h3>
        </div>
        <div class="modal-body">
         <!-- <p>This is a large modal.</p>-->

	<div class="row">
		                                <div class="col-md-12">
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li id="tabs" role="presentation" class="active"><a href="#convenio" aria-controls="convenio" role="tab" data-toggle="tab">Crear Convenio LPS</a></li>
                                        <li id="tabs1" role="presentation" class="disabled"><a>Antecedentes</a></li>
                                        <li id="tabs2" role="presentation" class="disabled"><a class="disabled">Desarrollador</a></li>
                                       
                                        <!--<li role="presentation" class="disabled"><a class="disabled">Propietario</a></li>-->

                                       
                                        <li id="tabs3" role="presentation" class="disabled"><a class="disabled">Obligado Solidario</a></li>
                                         <li id="tabs4" role="presentation" class="disabled"><a class="disabled" >Institucion Bancaria</a></li>
                                          <li id="tabs5" role="presentation" class="disabled"><a class="disabled">Testigo</a></li>
                                    
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                    
                                        <div role="tabpanel" class="tab-pane active" id="convenio">
                                        <form  id="FormConvenio">
											<div class="panel panel-default">
											  <div class="panel-heading"></div>
											  <div class="panel-body">
											  	
												<!--<div class="form-group row">-->
											<!--</div>-->
											<div class="row">
												
											<div class="col-xs-4">
  										<label for="inputNContrato" class="col-form-label">N# Contrato</label>
  										</div>

  										<div class="col-xs-8">

    									<input class="form-control" type="number" name="cvnContrato" maxlength="10" value="" id="inputNContrato" placeholder="Ingresa Numero de contrato" required >


  										</div>

											</div>

												<br>
											<div class="row">
  										<div class="col-xs-4">
  										<label for="fechainicioconvenio" class="col-form-label">Fecha de inicio</label>
  										</div>
  										<div class="col-xs-8">
		    									<div class="input-group date">
											    <input id="fechainicioconvenio" name="fechaConv" type="text" class="form-control" value="">
											    <div class="input-group-addon" style="cursor: default;" >
											        <label for="fechainicioconvenio" style="cursor: pointer;"><span class="glyphicon glyphicon-th"></span></label>
											    </div>
												</div>
  										</div>
										</div>

										<br>
											<div class="row">
  										<div class="col-xs-4">
  										<label for="input-regimenF" class="col-form-label">Regimen Fiscal</label>
  										</div>
  										<div class="col-xs-8">
											

		    								  <div class="regimen-list">
		    								  <div class="col-sm-4"><input tabindex="3" type="radio" id="input-regimenF" name="regimen-radio" value="1">
              									<label for="input-regimenF"><span>Persona Fisica</span></label>
             								 	</div>
		    								  <div class="col-sm-4">	
		    								  <input tabindex="4" type="radio" id="input-regimenM" value="0" name="regimen-radio" >
              								<label for="input-regimenM"><span>Persona Moral</span></label>
		    								  </div>             
           
        								  </div>	
  										</div>
										</div><br>
											<div class="row">
  										<div class="col-xs-4">
  										<label for="versionPlantilla" class="col-form-label">Version de la Plantilla</label>
  										</div>
  										<div class="col-xs-4">
		    									 <select class="form-control versionPlantilla" id="versionPlantilla1" name="versionPlantilla">
										    <option value="0">----------</option>
										    
										  </select>
  										</div>
  										<div class="col-xs-4">
  										<div id="notaPlantilla"></div>
		    									
  										</div>
										</div>

										<br>
																	


											  </div>
											</div>

										<div class="row">
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	
										<button type="submit" id="crearConvenio" class="btn btn-primary" >Guardar</button>
										</div>
										
										<div class="col-sm-2">
											<button type="button" id="btnConvenio" disabled="disabled" class="btn btn-info btnNext disabled"  href="#antecedentes" aria-controls="antecedentes" role="tab" data-toggle="tab">Siguiente</button>	
											</div>			


										</div>			
											</form>
                                        </div><!-- termina tabpanel convenio-->
                                        
                                        <div role="tabpanel" class="tab-pane" id="antecedentes">
                                       		<form  id="FormAntecedentes">
                                       		<div class="panel panel-default" id="antecedentesAjax">

											</div>
											
											<div class="row">
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	
										<button type="button" class="btn btn-primary" id="BtnGuardar" >Guardar</button>
										</div>
										
										<div class="col-sm-2">
											<button type="button" id="BtnSigAntecedente" class="btn btn-info btnNext disabled" disabled="disabled" href="#desarrollador" aria-controls="desarollador" id="BtnSigAntecedente" role="tab" data-toggle="tab">Siguiente</button>	
											</div>			


										</div>	
											</form>

                                        </div><!-- termina tabpanel -->


                                        <div role="tabpanel" class="tab-pane" id="desarrollador">
											<form  id="FormDesarrollador">
                                        	<div class="panel panel-default" id="desarrolladorAjax">
											
											</div><!-- end class="panel panel-default" id="desarrolladorAjax"-->
											
											<div class="row">
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	
										<button type="button" class="btn btn-primary"  id="BtnGuardarDesarrollador" >Guardar</button>
										</div>
										
										<div class="col-sm-2">
											<button type="button" id="BtnSigDesarrollador" class="btn btn-info btnNext disabled" disabled="disabled" href="#obligadoSolidario" aria-controls="obligadoSolidario" role="tab" data-toggle="tab">Siguiente</button>	
											</div>			


										</div>
										</form>
                                        </div>

										
									 <div role="tabpanel" class="tab-pane" id="obligadoSolidario">
                                        <form  id="FormobligadoSolidario">
                                        <div class="panel panel-default" id="obligadoSolidarioAJAX">
											
											</div><!-- end id obligadoSolidarioAJAX-->
											
											<div class="row">
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	
										<button type="button" class="btn btn-primary" id="BtnGuardarObliSolid" >Guardar</button>
										</div>
										
										<div class="col-sm-2">
											<button type="button" class="btn btn-info btnNext disabled" href="#institucionBancaria" aria-controls="institucionBancaria" disabled="disabled" role="tab" id="BtnObliSoliSiguiente" data-toggle="tab">Siguiente</button>	
											</div>			


										</div>
										</form>
                                        </div>


                                         <div role="tabpanel" class="tab-pane" id="institucionBancaria">
												<form  id="FormInstitucionBancaria">
                                        		<div class="panel panel-default" id="institucionBancariaAJAX" >
										
											</div><!-- end id institucionBancariaAJAX-->
											
											<div class="row">
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	
										<button type="button" class="btn btn-primary" id="BtnGuardarInsBancaria" >Guardar</button>
										</div>
										
										<div class="col-sm-2">
											<button type="button" class="btn btn-info btnNext disabled" disabled="disabled" href="#testigo" id="BtnSiguienteInsBancaria" aria-controls="testigo" role="tab" data-toggle="tab">Siguiente</button>	
											</div>	
										

										</div>
											</form>
                                        </div>




                                         <div role="tabpanel" class="tab-pane" id="testigo">
                                        	<form  id="FormTestigo">	
                                        		<div class="panel panel-default" id="testigoAJAX">
											  
											</div>
											
											<div class="row">
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	</div>
										<div class="col-sm-2">	
										<button type="button" class="btn btn-primary"  id="BtnGuardarTestigo" >Guardar</button>
										</div>
										
										<div class="col-sm-2">
											<!--<button type="button" class="btn btn-info disabled"  disabled="disabled" >Well Done!</button>	-->
											</div>			


										</div>
											</form>
                                        </div>






                                    </div>
</div>
                                </div>
	</div>
<style type="text/css">
	.nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #666; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
        .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px}

.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
body{ background: #EDECEC; padding:50px}
.form-control-feedback {
        right: 18px !important;}


.navbar-right {
   
    margin-right: 0 !important;
}

</style>

<style>

.login-block {
    width: 350px;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #337ab7;
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
     padding: 0 20px 0 50px;
    outline: none;
}

.login-block input#username {
    /*/background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;/*/
    background-size: 16px 80px;
}

.login-block input#username:focus {
    /*/background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;/*/
    background-size: 16px 80px;
}

.login-block input#password {
    /*/background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;/*/
    background-size: 16px 80px;
}

.login-block input#password:focus {
    /*/background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;/*/
    background-size: 16px 80px;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #5f97c7;
}

.login-block button {
    width: 100%;
    height: 40px;
    background: #337ab7;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #337ab7;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 14px;
    
    outline: none;
    cursor: pointer;
}

.login-block button:hover {
    background: #5f97c7;
}

</style>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar Sin Guardar</button>
        </div>
      </div>
    </div>
  </div>
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
  
<script src="assets/jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
   <!-- <script src="https://code.jquery.com/jquery.js"></script>-->
    <!--<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
   <!-- <script src="assets/jquery-ui-1.12.1.custom/jquery-ui.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="assets/Admin-Theme-3-master/bootstrap/js/bootstrap.min.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="assets/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/Admin-Theme-3-master/js/custom.js"></script>



<!-- Datatables -->
    <script src="assets/gentelella-master/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="assets/gentelella-master/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="assets/gentelella-master/vendors/jszip/dist/jszip.min.js"></script>
    <script src="assets/gentelella-master/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="assets/gentelella-master/vendors/pdfmake/build/vfs_fonts.js"></script>


<!--
    <script src="assets/Admin-Theme-3-master/vendors/datatables/js/jquery.dataTables.js"></script>
    <script src="assets/Admin-Theme-3-master/vendors/datatables/dataTables.bootstrap.js"></script>
    <script src="assets/Admin-Theme-3-master/js/tables.js"></script>-->
    <script src="assets/dropzone/dropzone.js"></script>
<script src="assets/icheck-1.x/icheck.js"></script>
<script src="assets/alertify.js-0.3.11/lib/alertify.min.js"></script>
<script type="text/javascript" src="assets/bootstrapvalidator-master/dist/js/bootstrapValidator.min.js"></script>
<script src="assets/number-format/number-format.js"></script>
<script src="assets/js/antecedentes.js"></script>
<script src="assets/js/desarrollador.js"></script>
<script src="assets/js/obligadoSolidario.js"></script>
<script src="assets/js/institucionBancaria.js"></script>
<script src="assets/js/testigo.js"></script>
<script src="assets/js/editarConvenio.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/showConvenios.js"></script>

<script src="assets/js/init.js"></script>
<?php if(isset($_SESSION['usuarioLogueado'])){ ?>
  <script type="text/javascript">
  $(document).ready(function($) {
     cargarplantillaParaUsuariosRegistrados();
  });

</script>
<?php
}
?>


<?php if ($details["validainicio"]) {
  ?>
<script type="text/javascript">
  $(document).ready(function($) {
    //$("#myModalLogin").modal("show");
  });

</script>
<?php } ?>
</html>
<?php
}else{echo "Accesso no permitido";}
	?>
