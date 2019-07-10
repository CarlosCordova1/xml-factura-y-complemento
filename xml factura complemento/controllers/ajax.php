<?php 

class Funciones 
{     public function validaAlgo($algo)
    {
        return $this->Algo($algo) ;
    }
     private function Algo($algo)
    {
        return 'Funciones esta validando  : ' . $algo ;
    }

}//termina clase Funciones




class Login extends Funciones
{ private $post;
	//utlizo la misma url
	private $urlUpdateTables='http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lps&sql=cnvUp&app=lpsOra&prm=';

	// url test
     //private $urlAPIAGK_login='http://aguakan.com/git/api/apiagk.php?';

// url produccion
   private $urlAPIAGK_login='http://aguakan.com/Intranet/Modulos/api/apiagk.php?';

     public function init($post,$accion)
    {
    	$this->post=$post;
       
    	switch ($accion) {
    		case 'existeUsuario':
    			echo $this->validaSiexiste();
    			break;
    		case 'lgr':
    			echo $this->cargarPlantillaregistrado();
    			break;
    			case 'permisos':
    			return $this->permisos();
    			break;
    			case 'logout':
    			echo $this->logout();
    			break;
    		default:
    			echo json_encode( array('status' =>"No hay accion"));
    			break;
    	}
    }
   
     private function validaSiexiste()
    {
    	session_start();
    	//$cifrar=Funciones::cifrar($this->post["p"]);
    	//$Descifrado=Funciones::descifrar($cifrar);
    	$cifrar=md5($this->post["p"]);
    	//$Descifrado=Funciones::descifrar($cifrar);
    	$usuario=$this->post["u"];
    	$passw=$this->post["p"];


$acce= json_decode($this->apiAGK_login('login',array('mail'=>$usuario,'pass'=>$passw)));
	$status=0;$msg="";


	if (isset($acce[0]->status)&& $acce[0]->status==1) {
	$status=1;
	$msg ="El usuario existe";

	if($acce[0]->servicios->cvn->admin==1 || $acce[0]->servicios->cvn->invitado==1 ){
		$_SESSION['usuarioLogueado']=true;
	$_SESSION['DatosusuarioLogueado']=$acce;
	}
	else{
		$status=0;
	$msg ="El usuario existe pero no tiene permisos";
	}

	
}else{
	$msg= "El usuario no Existe";
	$status=0;
}
	//se delcara a qui para que pase directo
$_SESSION['usuarioLogueado']=true;
$_SESSION['DatosusuarioLogueado']=$acce;

$status=1;
	$msg ="El usuario existe";

	return  json_encode( array('status'=>$status,'msg'=>$msg,'data' =>$acce));
        
    }
private function apiAGK_login($action,  $data){
 $get='urlget=';
 		$build=array();
 switch ($action) {
 	case 'login':
 	$get.='lgn/1.0/lgn/';
 	$build = array('action' => $action,'login' => $data['mail'],'pass'=>$data['pass']  );
 		break;
 		default:
 		# code...
 		break;
 }
 $urlLogin=$this->urlAPIAGK_login.$get;
   $postdata = http_build_query($build);
$opts = array('http' => array( 'method'  => 'POST', 'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata  ));
$context  = stream_context_create($opts);
return file_get_contents($urlLogin,false,$context);
   
}


private function permisos(){
session_start();
$status=0;
$msg="";
$respuesta=0;
if (isset($_SESSION['usuarioLogueado'])) {
	$msg="permisos del usuario";
	$status=1;
	$respuesta=$_SESSION['DatosusuarioLogueado'];
}else{
	$msg="usuario no registrado o sesion caducada";
}
return  json_encode( array('status'=>$status,'msg'=>$msg,'permisos' =>$respuesta));
}

    private function cargarPlantillaregistrado(){
$details=true;
$dat=json_decode($this->permisos());

$Acceso= json_decode($this->apiAGK2('showSPEI3',array("min"=>1,"max"=>99)));

//var_dump($Acceso);
//exit();
include_once("../views/ajax/views.php");
    }
    private function logout(){
session_start();
session_destroy();
return  json_encode( array('logout'=>1));
    }

    private function apiAGK2($action,  $data){
 $get='urlget=';
 $get.='spe/1.0/spe';
 		$build=array();
 switch ($action) {
  		case 'verstatus': 		
 	$build = array('action' => $action);
 		break;
 
 		case 'showSPEI3': 		
 	//$build = array('action' => $action,'auth'=>' ');
 	$build = array('switch'=>'', 'action' => $action,'auth'=>' ','min'=>$data['min'],'max'=>$data['max']);
 		break;
 		 
   	
 	default:
 		# code...
 		break;
 }
 //URL test
 //$urlLogin='https://www.aguakan.com/git/api/apiweb.php?'.$get;
//URL produccion
 $urlLogin='https://www.aguakan.com/api/web.php?'.$get;

  $curl = curl_init($urlLogin);			 
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,5);
			curl_setopt($curl, CURLOPT_POST,true);  
			curl_setopt($curl, CURLOPT_POSTFIELDS, $build); 
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec ($curl);  
			curl_close($curl);	
			return $response; 

   
}

    
}//termina clase Login


class Ajax extends Login
{
private $post;
private $action;
private $contrato;//="200834";
private $fechaConvenio;//="2016/11/23";
private $regimenFiscal;//=1;
private $dataJson;
/*/
private $jCliente;//=200852;
private $jNombre;//="nombre";
private $jDomiciliocliente;//="";
private $jDomiciliofiscal;//="";
private $jNombrecomercial;//="";
private $jResponsable;//="";
private $jCodigoresolucion;//="";
private $jUso;//="";
private $jAreac;//="";
private $jLpsdotacion;//="";
private $jDotacionasignada;//="";
private $jDescuento;//="";
private $jViviendas;//="";

/*/
private $mensajeError="La aplicacion esta desabilitada por el administrador de sistema, favor de ponerse en contacto con el departamento de TI para mas informacion";
/*/private $mensajePermisos="No tiene suficientes permisos para realizar esta accion, pongase en contacto con el administrador del sistema";
private $urlAPIBuscarfolio="http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lps&sql=cnvSf&app=lpsOra&prm=";
private $urlAPIcrearConvenio="http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lps&sql=cnvIs&app=lpsOra&prm=";
private $urlAPIInsertarEnTables="http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lps&sql=cnvIt&app=lpsOra&prm=";
 private $urlEstatusApp="http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lps&sql=cnvapli&prm=1&app=lpsOra";
private $urlUpdateTables="http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lps&sql=cnvUp&app=lpsOra&prm=";


private $tables = array('LPS_testigo','LPS_obligadoSolidario',	'LPS_clausula',	'LPS_institucionBancaria','LPS_cuota');

/*/

	function __construct($argument)
	{


  $this->post=$argument;//toda la entrada de datos por $_POST
$this->action=$this->post["action"];
if ($this->post["action"]=="c") {
	

$this->contrato=$this->post["contrato"];
$this->fechaConvenio=str_replace("/","-",$this->post["date"]);//formato db
$this->regimenFiscal=$this->post["vp"];
$this->dataJson=$this->post["data"];
 $valjson=json_decode($this->post["data"]);
/*
$this->jCliente=$valjson->cliente;
$this->jNombre=$valjson->nombre;
$this->jDomiciliocliente=$valjson->domiciliocliente;
$this->jDomiciliofiscal=$valjson->domiciliofiscal;
$this->jNombrecomercial=$valjson->nombrecomercial;
$this->jResponsable=$valjson->responsable;
$this->jCodigoresolucion=$valjson->codigoresolucion;
$this->jUso=$valjson->uso;
$this->jAreac=$valjson->areac;
$this->jLpsdotacion=$valjson->lpsdotacion;
$this->jDotacionasignada=$valjson->dotacionasignada;
$this->jDescuento=$valjson->descuento;
$this->jViviendas=$valjson->viviendas;
*/
}
else{

}

	}

private function validaStatusApp(){
		$estatus=false;
		  $Acceso= json_decode($this->apiAGK('verstatus',array()));
        if(isset($Acceso[0]->estatusAplicacion)){
	 			if($Acceso[0]->estatusAplicacion==1){
             $estatus=true;
        }
        else{
        	
           $estatus=false;
        }
	 	}
	 	else{
	 			$estatus=false;
	 	}
             return $estatus; 
	}
	

	private function CallAPI($method, $url, $data)
{
        return json_decode(file_get_contents($url));

    
}

	public function init (){
		$this->accion();
	}

	private function accion (){
				switch ($this->action) {
			
						case 'login'://valido acceso a la aplicacion
							Login::init($this->post,"existeUsuario");

					/*/if($this->validaStatusApp()){
					Login::init($this->post,"existeUsuario");
				}else{
					echo json_encode(array("status"=>0,"msg"=>$this->mensajeError));
				}/*/
				break;
					case 'lgr'://valido acceso a la aplicacion
					Login::init($this->post,"lgr");
				/*/	if($this->validaStatusApp()){
					Login::init($this->post,"lgr");
				}else{
					echo json_encode(array("status"=>0,"msg"=>$this->mensajeError));
				}/*/
				break;
				case 'logout'://valido acceso a la aplicacion
				Login::init($this->post,"logout");
					/*/if($this->validaStatusApp()){
					Login::init($this->post,"logout");
				}else{
					echo json_encode(array("status"=>0,"msg"=>$this->mensajeError));
				}/*/
				break;
				


			case 'c':
			//$dato=Login::init("","permisos");
			//$permisos= json_decode($dato );
					if($this->validaStatusApp()){
						$permisos= json_decode( Login::init($this->post,"permisos"));
						//$var=$permisos->permisos;
						//if($permisos->status==1 && $var[0]->soloLectura==1){
						if($permisos->permisos[0]->servicios->cvn->admin==1){
							$this->insertarConvenio($permisos);
						
							
						}else{
							echo json_encode(array("status"=>0,"msg"=>$permisos->msg,"permisos"=>$permisos->permisos[0]->servicios->cvn));
						}
				
				}else{
					echo json_encode(array("status"=>0,"msg"=>$this->mensajeError));
				}
				
				
				//echo json_encode(array("status"=>0,"msg"=>$this->mensajeError,"permisos"=>$permisos->permisos));
				break;
				case 'loadFile'://carga plantilla de cargar archivos
					$this->loadtemplateAddFile();
					break;
					case 'fileupload'://carga archivo 
					//var_dump($_FILES);
					$this->fileupload($_FILES);
					break;
					case 'mostrarFileFolio'://muestra archivo 
					//var_dump($_FILES);
				 $this->showFileUpload();
					break;
					case 'eliminarFileFolio'://muestra archivo 
					//var_dump($_FILES);
				 $this->eliminarFileFolio();
					break;
					case 'LoadReportes'://muestra archivo 
					//var_dump($_FILES);
					$permisos= json_decode( Login::init($this->post,"permisos"));
				 $this->loadtemplateReportes($permisos);
					break;		



					case 'showSPEI'://cargo tabla que muestra los convenios creados
					$this->showSPEI();
					/*/if($this->validaStatusApp()){
						$this->showConvenios();
					}/*/
					break;
					case 'showSPEI2'://cargo tabla que muestra los convenios creados
					$this->showSPEI2();
					/*/if($this->validaStatusApp()){
						$this->showConvenios();
					}/*/
					break;





				default:
				echo "No hay accion";
				break;
		}

		
	}

private function apiAGK($action,  $data){
 $get='urlget=';
 $get.='spe/1.0/spe';
 		$build=array();
 switch ($action) {
  		case 'verstatus': 		
 	$build = array('action' => $action);
 		break;
 		case 'showSPEI': 		
 	//$build = array('action' => $action,'auth'=>' ');
 	$build = array('switch'=>'', 'action' => $action,'auth'=>' ','min'=>$data['min'],'max'=>$data['max']);
 		break;
 		case 'showSPEI2': 		
 	//$build = array('action' => $action,'auth'=>' ');
 	$build = array('switch'=>'', 'action' => $action,'auth'=>' ','min'=>$data['min'],'max'=>$data['max'],'receptor'=>$data['receptor']);
 		break;
 		case 'showSPEI3': 		
 	//$build = array('action' => $action,'auth'=>' ');
 	$build = array('switch'=>'', 'action' => $action,'auth'=>' ','min'=>$data['min'],'max'=>$data['max']);
 		break;
 		//case 'buscarAgregarSPEI': 		
 	//$build = array('action' => $action,'auth'=>' ','ref'=>$data["ref"],'data'=>$data["data"]);
 	//	break;
 			case 'buscarAgregar_fac_compl': 		
 	$build = array('action' => $action,'auth'=>' ','ref'=>$data["ref"],'data2'=>$data["data2"]);
 		break;
   	
 	default:
 		# code...
 		break;
 }
 //URL test
 //$urlLogin='https://www.aguakan.com/git/api/apiweb.php?'.$get;
//URL produccion
 $urlLogin='https://www.aguakan.com/api/web.php?'.$get;

  $curl = curl_init($urlLogin);			 
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,5);
			curl_setopt($curl, CURLOPT_POST,true);  
			curl_setopt($curl, CURLOPT_POSTFIELDS, $build); 
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec ($curl);  
			curl_close($curl);	
			return $response; 

   
}


private function estatusValidar($token){ 
	$folio=$this->post["folio"];

$doStatus='';
if($this->post["accion"]=='validar'){
	$doStatus='validacion';
}else{
	$doStatus='edicion';
}
$do= json_decode($this->apiAGK('estadoValidacion',array('folio'=>$folio,'status'=>$doStatus,'oratkn'=>$token)));

echo json_encode(array("status"=>$do[0]->status,"msg"=>$do[0]->msg,"folio"=>$folio));
	}

	private function generaFolio(){
$cadena["tb"]="tcfolio";
$parametro=urlencode(json_encode($cadena));
$folio= json_decode(file_get_contents($this->urlUpdateTables.$parametro));

	$status=0;
	$msg="";
if ($folio) {
	$msg ="Folio Creado";
	$status=1;
	
}else{
	$msg= "Error al crear folio";
	$status=0;
}

$a="";
foreach ($folio as $value){
$a=$value->id+1;
}

$cadernaFolio="LPS-".$a;

return array("msg"=>$msg,"status"=>$status,"folio"=>$cadernaFolio);
//echo json_encode(array("folio"=>$folio,"msg"=>$msg,"status"=>$status));
}
	
	private function crearStringConvenio ($permisos){

return array("fechaConvenio"=>$this->fechaConvenio,"contrato"=>$this->contrato,'regimenFiscal'=>$this->regimenFiscal);
	}


private function insertarConvenio ($permisos){
$cadena=$this->crearStringConvenio($permisos);
//$parametro=urlencode($cadena["sql"]);

//echo "<br> cadena ".$this->urlAPIcrearConvenio.$parametro;
//$respuesta=file_get_contents($this->urlAPIcrearConvenio.$parametro);
	$status=0;
	$folio='';
	$msg="";
/*/if (!true) {
	$msj ="El convenio se ha creado";
	$status=1;
//habilidar Mysql
//	$cadena2["tb"]="tT";
//$parametro2=urlencode(json_encode($cadena2));
//$respuesta2=file_get_contents($this->urlUpdateTables.$parametro2);

	$statusTables=null;//$this->insertFolioOnTables($folio);
	
}else{
	$msj= "Error al crear el convenio";
	$status=0;
}/*/



$do= json_decode($this->apiAGK('insertaConvenio',
	array('info'=>'convenio',
		'oratkn'=>$permisos->permisos[0]->oratkn,
		'fechaconvenio'=>$cadena['fechaConvenio'],
		'contrato'=>$cadena['contrato'],
		'regimenfiscal'=>$cadena['regimenFiscal'],
		)));

if (isset($do[0]->status) && $do[0]->status==1) {
	//$msg ="El antecedente se ha actualizado.";
	$msg=$do[0]->msg;
	$status=1;
	$folio=$do[0]->folio;
	//$this->ultimaModifacionConvenio($folio);
	
}else{
	//$msg= "Error al actualizar antecedente.";
	$msg=$do[0]->msg;
	$status=0;
}


echo json_encode(array("status"=>$status,"msg"=>$msg,"folio"=>$folio,"statusTables"=>true,"do"=>$do));


}



//cargar plantilla para agregar archivos
private function loadtemplateAddFile(){
	$data1=true;

include_once("../views/ajax/loadFile.php");
}
private function showSPEI(){
/*$Acceso= $this->apiAGK('showSPEI',array());
$otro_dir=$_SERVER['HTTP_REFERER']."documentos/";
echo json_encode(array("msg"=>'datos spei',"status"=>1,"data"=>$Acceso,"dir"=>$otro_dir));
*/
$Acceso= $this->apiAGK('showSPEI',array("min"=>1,"max"=>99));
/*$Acceso2= $this->apiAGK('showSPEI',array("min"=>100,"max"=>199));
$Acceso3= $this->apiAGK('showSPEI',array("min"=>200,"max"=>299));
$Acceso4= $this->apiAGK('showSPEI',array("min"=>300,"max"=>399));
$Acceso5= $this->apiAGK('showSPEI',array("min"=>400,"max"=>499));
$Acceso6= $this->apiAGK('showSPEI',array("min"=>500,"max"=>599));

$Acceso7= $this->apiAGK('showSPEI',array("min"=>600,"max"=>699));
$Acceso8= $this->apiAGK('showSPEI',array("min"=>700,"max"=>799));
$Acceso9= $this->apiAGK('showSPEI',array("min"=>800,"max"=>899));
$Acceso10= $this->apiAGK('showSPEI',array("min"=>900,"max"=>999));
$Acceso11= $this->apiAGK('showSPEI',array("min"=>1000,"max"=>1099));
$Acceso12= $this->apiAGK('showSPEI',array("min"=>1100,"max"=>1199));

*/

$otro_dir=$_SERVER['HTTP_REFERER']."documentos/";
echo json_encode(array("msg"=>'datos spei',"status"=>1,
	"data"=>$Acceso,
	"data2"=>$Acceso2,
	"data3"=>$Acceso3,
	"data4"=>$Acceso4,
	"data5"=>$Acceso5,
	"data6"=>$Acceso6,
	"data7"=>$Acceso7,
	"data8"=>$Acceso8,
	"data9"=>$Acceso9,
	"data10"=>$Acceso10,
	"data11"=>$Acceso11,
	"data12"=>$Acceso12,
	"dir"=>$otro_dir));
}

private function showSPEI2(){
/*$Acceso= $this->apiAGK('showSPEI',array());
$otro_dir=$_SERVER['HTTP_REFERER']."documentos/";
echo json_encode(array("msg"=>'datos spei',"status"=>1,"data"=>$Acceso,"dir"=>$otro_dir));
*/
$receptor=$this->post["receptor"];
 $Acceso= json_decode($this->apiAGK('showSPEI2',array("min"=>1,"max"=>99,"receptor"=>$receptor)));

//$Acceso= json_decode($this->apiAGK('showSPEI3',array("min"=>1,"max"=>99)));
/*

$otro_dir=$_SERVER['HTTP_REFERER']."documentos/";
 json_encode(array("msg"=>'datos spei',"status"=>1,
	"data"=>$Acceso,
	"data2"=>$Acceso2,
	"data3"=>$Acceso3,
	"data4"=>$Acceso4,
	"data5"=>$Acceso5,
	"data6"=>$Acceso6,
	"data7"=>$Acceso7,
	"data8"=>$Acceso8,
	"data9"=>$Acceso9,
	"data10"=>$Acceso10,
	"data11"=>$Acceso11,
	"data12"=>$Acceso12,
	"dir"=>$otro_dir));*/
$data1=true;
include("reporte.php");

}

//-------------validar si existe archivo en el directorio o si ya ha sido agreado a oracle-----------------------
private function existe_fact($referencia,$data){
	$retorno=array();
$result= $this->apiAGK('buscarAgregar_fac_compl',array("ref"=>$referencia,"data2"=>json_encode($data)));
//echo json_encode(array("msg"=>'Buscar - Agregar - SPEI',"status"=>1,"data"=>$result));
$valida=json_decode($result);
$retorno["result"]=$result;

if (isset($valida[0]->status)) {
	if( $valida[0]->status==1){
$retorno["estatus"]=true;
	 $retorno["msg"]=$valida[0]->msg;
	  return $retorno;
		 
	}else{
		$retorno["estatus"]=false;
	 $retorno["msg"]=$valida[0]->msg;
	 $retorno["estatusref"]=true;
	 return $retorno;
	}
}else{
	 $retorno["estatus"]=false;
	 $retorno["result"]=$result;
	
	 $retorno["msg"]="Ocurrio un error al solicitar api";
	 return $retorno;
}
//echo $result;


}


private function fileupload($file){
	$folio=$this->post["folio"];
//$dir_subida = str_replace("controllers", "documentos/", dirname(__FILE__)).$folio."/" ;
$dir_subida = str_replace("controllers", "documentos/", dirname(__FILE__))."/" ;

$fichero_subido =  basename($file['archivo']['name']);
$a= simplexml_load_file($file['archivo']['tmp_name']);
$ns = $a->getNamespaces(true);
$a->registerXPathNamespace('cfdi', $ns['cfdi']);
$a->registerXPathNamespace('tfd', $ns['tfd']);
$a->registerXPathNamespace('pago10', $ns['pago10']);
$datos=array();	
$referencia="";
$nuevareferencia="";


 //$e= file_get_contents($file['archivo']['tmp_name']);


 //$datos["valxml"]=  htmlspecialchars(json_encode($a);
 
 //echo '-------------------'.;

 //var_dump($datos["valxml"]);

	if ($a) {
		//str_replace($healthy, $yummy, $phrase);
    			//$datajson= json_encode($a);
    			//var_dump($a["Hora"]);
    			//var_dump($a["FechaOperacion"]);
    			//var_dump($a[0]->Beneficiario["Concepto"]);

  //  $hora = (isset($a["Hora"])) ? str_replace(":","",$a["Hora"]) : 0;
    //$hora=substr($hora, 0, -2);
    $TipoDeComprobante=(string)$a["TipoDeComprobante"]; //P,I
    $datos["fechaemision"]=(string)$a["Fecha"];
     $datos["Folio"]=(string)$a["Folio"];
     $datos["Total"]=(string)$a["Total"];
      $datos["TipoDeComprobante"]=(string)$a["TipoDeComprobante"];

      // cuando es factura tipo P
      // FormaPago , MetodoPago y UsoCFDI se toman de aqui
         $datos["FormaDePagoP"] = (string)$a["FormaPago"]; 
         	  $datos["MetodoDePagoDR"] = (string)$a["MetodoPago"]; 

   //echo "<br>".  $datos["RFCReceptor"] = (isset($a[0]->Receptor["Rfc"])) ?  trim($a[0]->Receptor["Rfc"]) : 0;
   //echo "<br>".  $datos["RFCemisor"] = (isset($a[0]->Emisor["Rfc"])) ?  trim($a[0]->Emisor["Rfc"]) : 0;
    /*$fecha = (isset($a["FechaOperacion"])) ? str_replace("-","",$a["FechaOperacion"]) : 0;
    $concepto = (isset($a[0]->Beneficiario["Concepto"])) ? $a[0]->Beneficiario["Concepto"] : 0;
    $referencia = ($fecha+$hora+$concepto!=0) ?   $concepto ."-". $fecha."-".$hora : 0;
	$nuevareferencia = ($concepto!=0) ?   $concepto : 0;
	*/

 foreach ($a->xpath('//cfdi:Receptor') as $Receptor){ 
 	   $datos["RFCReceptor"] = (string)$Receptor["Rfc"];
 	   $datos["UsoCFDIReceptor"] = (string)$Receptor["UsoCFDI"];
 }
  foreach ($a->xpath('//cfdi:Emisor') as $Emisor){ 
 	   $datos["RFCemisor"] = (string)$Emisor["Rfc"];
 	    $datos["NombreCemisor"] = (string)$Emisor["Nombre"];
 }
  	foreach ($a->xpath('//cfdi:Comprobante//cfdi:Complemento//tfd:TimbreFiscalDigital') as $TimbreFiscalDigital){
  	//	var_dump($TimbreFiscalDigital);
 	   $datos["uuid"] = (string)$TimbreFiscalDigital["UUID"];
 	    $datos["fechatim"] =(string) $TimbreFiscalDigital["FechaTimbrado"];
 }


	foreach ($a->xpath('//cfdi:Comprobante//cfdi:Complemento//pago10:Pagos//pago10:Pago') as $Pago){
 	       $datos["FechaPago"] = (string)$Pago["FechaPago"];
 	        $datos["FormaDePagoP"] = (string)$Pago["FormaDePagoP"]; 	   
 	  
 }

 	foreach ($a->xpath('//cfdi:Comprobante//cfdi:Complemento//pago10:Pagos//pago10:Pago//pago10:DoctoRelacionado') as $DoctoRelacionado){
  	//	var_dump($TimbreFiscalDigital);
 	   $datos["uuid_rela"] = (string)$DoctoRelacionado["IdDocumento"];
 	   $datos["uuid_rela2"][] = (string)$DoctoRelacionado["IdDocumento"];
 	     $datos["ImpPagado"] = (string)$DoctoRelacionado["ImpPagado"];
 	      $datos["ImpPagado2"][] = (string)$DoctoRelacionado["ImpPagado"];

 	      $datos["MetodoDePagoDR"] = (string)$DoctoRelacionado["MetodoDePagoDR"];
 	      $datos["MetodoDePagoDR2"][] = (string)$DoctoRelacionado["MetodoDePagoDR"];

 }
 
 

	//var_dump($a[0]->Receptor[0]);
 
    if ($TipoDeComprobante!="P" && $TipoDeComprobante!="I") {
    	
    	echo $spei="TipoDeComprobantenovalido";
    	exit();
    }
    /*  else{
    	 	$datos["sello"] =  (isset($a["sello"])) ?  trim($a["sello"]) : 0;
    	$datos["numeroCertificado"]=(isset($a["numeroCertificado"])) ?  trim($a["numeroCertificado"]) : 0;
    	$datos["cadenaCDA"]=(isset($a["cadenaCDA"])) ?  trim($a["cadenaCDA"]) : 0;
    	$datos["FechaOperacion"]=(isset($a["FechaOperacion"])) ?  trim($a["FechaOperacion"]) : 0;

    	
    	$datos["BancoReceptor"] = (isset($a[0]->Beneficiario["BancoReceptor"])) ?  trim($a[0]->Beneficiario["BancoReceptor"]) : 0;
    	$datos["CuentaReceptor"] = (isset($a[0]->Beneficiario["Cuenta"])) ?  trim($a[0]->Beneficiario["Cuenta"]) : 0;
    	$datos["montoReceptor"] = (isset($a[0]->Beneficiario["MontoPago"])) ?  trim($a[0]->Beneficiario["MontoPago"]) : 0;
    	$datos["RFCReceptor"] = (isset($a[0]->Beneficiario["RFC"])) ?  trim($a[0]->Beneficiario["RFC"]) : 0;

    	$datos["tipoCuentaReceptor"] = (isset($a[0]->Beneficiario["TipoCuenta"])) ?  trim($a[0]->Beneficiario["TipoCuenta"]) : 0;



    	$datos["RFCemisor"] = (isset($a[0]->Ordenante["RFC"])) ?  trim($a[0]->Ordenante["RFC"]) : 0;
    	$datos["BancoEmisor"] = (isset($a[0]->Ordenante["BancoEmisor"])) ?  trim($a[0]->Ordenante["BancoEmisor"]) : 0;
    	$datos["CuentaEmisor"] = (isset($a[0]->Ordenante["Cuenta"])) ?  trim($a[0]->Ordenante["Cuenta"]) : 0;
    	// echo $referencia; si la referencia es valida. sigue el flujo de la aplicacion

    }
    */
    			
    	
    }else{
    	echo $spei="ArchivoNOvalido";
    	exit();
    }



    //echo json_encode($a);
 $spei=false;
 /*
if (file_exists($dir_subida.$referencia.".xml")) {
    $spei =true;
}  
*/  
    if ($spei) {
    	echo $spei="ArchivoYaexiste";
    	exit();

        }
        else{
    	 //echo $spei="ArchivoNoexiste"; si el archivo no existe sigue el flujo de la aplicacion
    	 //exit();
        	//busco en oracle
        	//$estado=$this->existeSPEI($referencia,$datos);
			$estado=$this->existe_fact($nuevareferencia,$datos);
        	if ($estado["estatus"]==true) {
        		//echo "Se agrego la referencia <strong>". $referencia.' </strong> ';
				
				
				echo "Se agrego el documento xml  <strong><b>". $fichero_subido.' </b></strong> ';
				//echo "Se agrego el documento XML";
        		        	}
        	else{
        		
        		if (isset($estado["estatusref"]) && $estado["estatusref"]==true) {
        			//echo "ArchivoYaexiste";//existe en oracle
        			echo '<div class="alert alert-warning">El archivo ya existe, no se agrego  <strong><b>'. $fichero_subido.' </b></strong> '.json_encode($estado).'</div> ';
        		//	echo '<div class="alert alert-warning">UUID   '.json_encode($nuevareferencia).'</div> ';
        		//echo '<div class="alert alert-warning"> datos   '.json_encode($datos).'</div> ';

        		 
        			exit();
        		}else{
        				 
        				echo '<div class="alert alert-danger"><strong>'.json_encode($estado).'</strong></div>';
        				//var_dump(json_encode($datos));
        				//var_dump($estado);
        				//var_dump($datos["valxml"]);
        				exit();
        		}
        		
        		
    	exit();
        	}


    }




$fichero_subido = $dir_subida . $referencia.".xml";
/*
if (is_dir($dir_subida)) {
	if (move_uploaded_file($file['archivo']['tmp_name'], $fichero_subido)) {
    echo " El fichero <strong>".$file['archivo']['name']."</strong> es válido y se subió con éxito.\n";
    // echo "<br>".$spei;
	//	$a= simplexml_load_file($fichero_subido);
    //echo json_encode($a);
   
} else {
    echo "Erroralcargarficheros";
    exit();
      }

}
*/



}
private function eliminarFileFolio(){

$folio= $this->post["folio"];
$file= $this->post["file"];
$status=0;
$msg="";
$directorio = str_replace("controllers", "documentos/", dirname(__FILE__)).$folio."/" .$file ;
 //$otro_dir="http://aguakan.com/git/test/ConveniosLPS_db_ORACLE/documentos/".$folio."/".$file;
 $otro_dir=$_SERVER['HTTP_REFERER']."documentos/".$folio."/".$file;

/*/if (file_exists($directorio)) {
	$msg.="  existe el archivo<br>";
}
/*/
if(unlink($directorio)){
$status=1;
$msg.="Archivo eliminado";
}
else{
$msg.="Error al intentar eliminar archivo";
}
echo json_encode(array("status"=>$status,"msg"=>$msg,"directorio"=>$otro_dir));

}


private function showFileUpload(){

        
$folio= $this->post["folio"];
//$directorio = str_replace("controllers", "documentos/", dirname(__FILE__)).$folio."/" ;
//$otro_dir=$_SERVER['HTTP_REFERER']."documentos/".$folio."/";

$directorio = str_replace("controllers", "documentos/", dirname(__FILE__)).date("d-m-Y")."/" ;
$otro_dir=$_SERVER['HTTP_REFERER']."documentos/".date("d-m-Y")."/";



 //$otro_dir="http://aguakan.com/git/test/ConveniosLPS_db_ORACLE/documentos/".$folio."/";
 $archivos = '';
if (is_dir($directorio)) {
   $gestor_dir = opendir($directorio);
  

 $permisos= json_decode( Login::init($this->post,"permisos"));
            $var=$permisos->permisos;
            //var_dump($permisos);
            //if($permisos->status==1 && $var[0]->PuedeEliminarArchivo==1){
            	if($permisos->permisos[0]->servicios->cvn->admin==1){
            	 while (false !== ($nombre_fichero = readdir($gestor_dir))) {
      $ficheros[] = $nombre_fichero;
      $rutaArchivo = $otro_dir.''.$nombre_fichero;
      //$archivos .='<br><a target="_blank" href="'.$rutaArchivo.'" >'.$nombre_fichero.'</a>';
      if($nombre_fichero!="." && $nombre_fichero!=".."){
         $archivos .='<div class="well well-sm">
         <div class="row">
  <div class="col-sm-8"><a title="ver archivo" href="'.$rutaArchivo.'" target="_blank">'.$nombre_fichero.'</a></div>
  <div class="col-sm-4">
  <button type="button" data-file="'.$nombre_fichero.'" class="btn btn-danger pull-right eliminarFiliUpload">Eliminar <span class="badge"><i class="fa fa-trash-o" aria-hidden="true"></i></span></button></div>
</div> </div>';
      }
     
  }
            }else{
            	 while (false !== ($nombre_fichero = readdir($gestor_dir))) {
      $ficheros[] = $nombre_fichero;
      $rutaArchivo = $otro_dir.''.$nombre_fichero;
      //$archivos .='<br><a target="_blank" href="'.$rutaArchivo.'" >'.$nombre_fichero.'</a>';
      if($nombre_fichero!="." && $nombre_fichero!=".."){
      		$a= simplexml_load_file($directorio.$nombre_fichero);
    //echo json_encode($a);
         $archivos .='<div class="well well-sm">
         <div class="row">
  <div class="col-sm-8"><a title="ver archivo" href="'.$rutaArchivo.'" target="_blank">'.$nombre_fichero.'</a></div>
  <div class="col-sm-4">
  <button type="button" disabled="disabled" class="btn btn-danger pull-right disabled">Eliminar <span class="badge"><i class="fa fa-trash-o" aria-hidden="true"></i></span></button></div>
</div> <br>
    <div class="row">
  <div class="col-sm-12"> <pre>'. json_encode($a).' </pre></div>
  </div> 

</div>';
      }
     
  }
            }
              


 
 
//echo $archivos;
?>
			<?php if($archivos!=""){

					?>
					 <div class="js-upload-finished">
            <h3>Archivos cargados</h3>
            <div class="list-group">
              <?php echo $archivos; ?>
              </div>
          </div>
					<?php	}
else{
  ?>
  <div class="js-upload-finished">
           
            <div class="list-group">
             <div class="alert alert-warning">
    <strong>No hay archivos!</strong> 
  </div>
              </div>
          </div>
  <?php
}
					?>
         

<?php
}
else{
  ?>
  <div class="js-upload-finished">
           
            <div class="list-group">
             <div class="alert alert-warning">
    <strong>No hay archivos!</strong> 
  </div>
              </div>
          </div>
  <?php
}
 
      
}




//cargar plantilla antecedentes
private function loadtemplateReportes($data2){




//$antecedente=json_decode($this->apiAGK('buscarFolio',array('folio'=>$folio,'info'=>'antecedente','oratkn'=>$data2->permisos[0]->oratkn)));

//$dataconvenio=json_decode($this->apiAGK('buscarFolio',array('folio'=>$folio,'info'=>'convenio','oratkn'=>$data2->permisos[0]->oratkn)));
	//var_dump($antecedente);
	$data1=true;

include_once("../views/ajax/loadReportes.php");
}





//cargar plantilla para editar convenios
private function loadtemplateEditarConvenio($data){
		
	$folio=$this->post["folio"];
	
	//$valores=array("case"=>4,"folio"=>$folio);
	//$parametro=urlencode(json_encode($valores));
	//$Ediconvenio=json_decode(file_get_contents($this->urlAPIBuscarfolio.$parametro));

	$Ediconvenio=json_decode($this->apiAGK('buscarFolio',array('folio'=>$folio,'info'=>'convenio','oratkn'=>$data->permisos[0]->oratkn)));
//var_dump($Ediconvenio);
	if($Ediconvenio){
		//var_dump(file_get_contents($this->urlAPIBuscarfolio.$parametro));
	include_once("../views/ajax/editarConvenio.php");
	}
	else{
		echo "No se encontro resultados ...";
	}

}
private function actualizarConvenio($permisos){
	  $val=$permisos->permisos;
$a="";
foreach ($val as $key => $value) {  
     $a= $value;
    }
   $val=$a;


	
//if($val->puedeEditar=="1"){
	if($permisos->permisos[0]->servicios->cvn->admin==1){
		/*$cadena["folio"]=$this->post["folio"];
		$folio=$cadena["folio"];
	$cadena["fecha"]=$this->post["fecha"];
	$cadena["versionPlantilla"]=$this->post["versionPlantilla"];
//$cadena["data"]=json_decode($this->post["data"]);
$cadena["tb"]="aCnio";
$cadena["tus"]=$val->id;
$parametro=urlencode(json_encode($cadena));
$respuesta=file_get_contents($this->urlUpdateTables.$parametro);*/
	$status=0;
	
$do= json_decode($this->apiAGK('editarConvenio',
	array('folio'=>$this->post["folio"],
		'info'=>'convenio',
		'oratkn'=>$permisos->permisos[0]->oratkn,
		'versionPlantilla'=>$this->post["versionPlantilla"],
		'fecha'=>$this->post["fecha"],
		'reportefolio'=>$this->post["reportefolio"],
		)));

	//$msg=$do[0]->msg;
if (isset($do[0]->status) && $do[0]->status==1) {
	//$msg ="El Convenio se ha actualizado";
	$msg=$do[0]->msg;
	$status=1;
	
}else{
	//$msg= "Error al actualizar Convenio";
	$status=0;
	$msg=$do[0]->msg;
}
}else{
	$status=0;
	$msg=$do[0]->msg;
	//$msg= "Error al actualizar Convenio, el usuario no tiene permisos para realizar esta accion";
}



//echo json_encode(array("url"=>$this->urlUpdateTables.$parametro,"folio"=>$folio,"msg"=>$msg,"status"=>$status));
//echo json_encode(array("folio"=>$folio,"msg"=>$msg,"status"=>$status,"fecha"=>$fecha,"formulario"=>$formulario,"usuario"=>$usuario));
echo json_encode(array("folio"=>$this->post["folio"],"msg"=>$msg,"status"=>$status,'do'=>$do));
}




}//end Class ajax



if(
   !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
   strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
){
   # Ejecuta si la petición es a través de AJAX.

$imprime= new Ajax($_POST);
$imprime->init();

}else{

	if (isset($_GET["folio"]) && $_GET["folio"]!="") {
		$valida=true;
		$data=0;

		//include_once("../views/pdf/convenio.php");
		//require_once('../tools/TCPDF-master/tcpdf.php');//incluye la libreria pdf

//forzar las descarga
		// header("Content-Type: application/octet-stream");
 //header("Content-Disposition: attachment; filename=ejemplo.pdf");
 //header("Content-Transfer-Encoding: binary");

	}else
	{
		echo "Accion no permitida";
	}

   
  
}


?>