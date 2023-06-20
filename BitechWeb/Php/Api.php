<?php 
require_once '../libs/apitools.php';
ApiTools::init(__FILE__);

ApiTools::asignaMetodo(function() {
    $tabla = ApiTools::getModel('Apis');
    $id=ApiTools::getParam('Id');
    $aplicacionID=ApiTools::getParam('aplicacionID');
	if( $tabla->ObtenerDatos($id,$aplicacionID)){
		ApiTools::asignaRespuesta(200,'datos entregados' . $tabla->Mensaje,true,$tabla->Dataset,$tabla->Mensaje2);
	} else {
		ApiTools::asignaRespuesta(201,'No se pudo Obtener Datos: ' . $tabla->Mensaje ,true,null,$tabla->Mensaje2);
	}
},'GET');


ApiTools::asignaMetodo(function() {
    $tabla = ApiTools::getModel('Apis'); // abrir la tabla
	
    if( $tabla->InsertaRegreso(ApiTools::$datosCliente))   //
    {
        ApiTools::asignaRespuesta(200,'datos creados'.$tabla->mensaje ,true,$tabla->Dataset,$tabla->Mensaje2);
    }
    else{
        ApiTools::asignaRespuesta(201,'No se pudo crear: '.$tabla->mensaje ,true,null,$tabla->Mensaje2);
    }
},'POST');

ApiTools::processRequest();

ApiTools::respuestaApi();?>