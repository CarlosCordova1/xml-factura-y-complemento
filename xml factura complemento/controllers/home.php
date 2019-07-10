<?php

class Home //extends AnotherClass
{
	
	function __construct()
	{
		# code...
	}
	public function init(){
		session_start();

		$inicio=true;
		$sesion="";
		if(isset($_SESSION['datosUsuario'])){
			$inicio=false;
			$sesion=$_SESSION['datosUsuario'];
		}
		else{
		$_SESSION['datosUsuario']=true;
		$sesion=$_SESSION['datosUsuario'];
		}

		//$url="http://aguakan.com/git/RNX/controlador/CnxOra.php?con=lps&sql=cnvapli&prm=1&app=lpsOra";
			
		$details=array("title"=>"XML -> Factura - Complemento" , "sesion"=>$sesion,"usuario"=>"Invitado","validainicio"=>$inicio);
		// $Acceso=$this->CallAPI("",$url,"");

       /* if($Acceso[0]->estatusAplicacion==1){ $this->viewsLectura($details);
        }
        else{
            echo "La aplicacion Ha sido desactivada por el administrador del sistema";
        }
        */


        	$_SESSION['usuarioLogueado']=true;
        	 $this->viewsLectura($details);

       //$Acceso= json_decode($this->apiAGK('verstatus',array()));

       //var_dump($Acceso);
        /*/      
        if(isset($Acceso[0]->estatusAplicacion)){
					 if($Acceso[0]->estatusAplicacion==1){
				            $this->viewsLectura($details);

				        }
				        else{
				        	
				            echo "La aplicacion Ha sido desactivada por el administrador del sistema";
				        }
	 	}
	 	else{
	 			echo '<h3>'.$Acceso[0]->msg.'</h3>';

	 	}/*/

        
	}
	private function viewsLectura($details){		
		include_once("views/index.php");
	}

	private function CallAPI($method, $url, $data){
        return json_decode(file_get_contents($url));  
}
private function apiAGK($action,  $data){
 $get='urlget=';
 		$build=array();
 switch ($action) {
  		case 'verstatus':
 		$get.='cvn/1.0/convenio-lps/';
 	$build = array('action' => $action);
 		break;
 	
 	default:
 		# code...
 		break;
 }
 // url produccion
 $urlLogin='http://aguakan.com/Intranet/Modulos/api/apiagk.php?'.$get;
 //URL test
 //$urlLogin='http://aguakan.com/git/api/apiagk.php?'.$get;
   $postdata = http_build_query($build);
$opts = array('http' => array( 'method'  => 'POST', 'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata  ));
$context  = stream_context_create($opts);
return file_get_contents($urlLogin,false,$context);
   
}


}

?>
