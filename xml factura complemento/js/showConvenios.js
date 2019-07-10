function format2(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}

//------------------------------------------------------------------
function ShowConvenios(){
  
  $.ajax({
    
    url : AjaxURL(),
 
   data : { action : "showSPEI", },
 
    type : 'POST',
 
    dataType : 'JSON',
 
    success : function(json) {
      console.log(json);
     // console.log(JSON.parse(json.data));
if (json.status=="1") {
    var tr="";


   
      $.each(json,function(index, value){
              
 if (index=="data") {
  tr+=parseaJson(json.data,json.dir);
 }
 if (index=="data2") {
  tr+=parseaJson(json.data2,json.dir);
 }
 if (index=="data3") {
  tr+=parseaJson(json.data3,json.dir);
 }
 if (index=="data4") {
  tr+=parseaJson(json.data4,json.dir);
 }
 if (index=="data5") {
  tr+=parseaJson(json.data5,json.dir);
 }
 if (index=="data6") {
  tr+=parseaJson(json.data6,json.dir);
 }
 if (index=="data7") {
  tr+=parseaJson(json.data7,json.dir);
 }
 if (index=="data8") {
  tr+=parseaJson(json.data8,json.dir);
 }
 if (index=="data9") {
  tr+=parseaJson(json.data9,json.dir);
 }
 if (index=="data10") {
  tr+=parseaJson(json.data10,json.dir);
 }
 if (index=="data11") {
  tr+=parseaJson(json.data11,json.dir);
 }
 //-------------------------------------------


   
});


       
          
      var tabla='<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-hover" id="example1"><thead>'+
              '<tr >'+
              '<th style="text-align: center;"><i data-toggle="tooltip" title="Indice" class="fa fa-sort-numeric-desc" aria-hidden="true"></i></th>'+
              '<th style="text-align: center;"><i data-toggle="tooltip" title="Referencia" class="fa fa-slack" aria-hidden="true"></i></th>'+
              '<th style="text-align: center;"> <i data-toggle="tooltip" title="Fecha Operacion" class="fa fa-calendar" aria-hidden="true"></i></th>'+
                
                 '<th style="text-align: center;"><i data-toggle="tooltip" title="Monto Pago" class="fa fa-usd" aria-hidden="true"></i></th>'+
                '<th style="text-align: center;"><i  data-toggle="tooltip" title="Cuenta ordenante" class="fa fa-gavel" aria-hidden="true"></i></th>'+
               '<th style="text-align: center;"><i data-toggle="tooltip" title="RFC emisor" class="fa fa-user" aria-hidden="true"></i></th>'+
                '<th style="text-align: center;"><i data-toggle="tooltip" title="RFC Emisor" class="fa fa-address-card" aria-hidden="true"></i></th>'+
                           
                
                '<!--<th  style="text-align: center;">'+ '<span data-toggle="tooltip" title="Estatus" >Estatus <i class="fa fa-check-square-o" aria-hidden="true"></i></span></th>-->'+
                '<th  style="text-align: center;">'+
                '<span data-toggle="tooltip" title="Centro Operacional" >Centro Operacional</span></th>'+
                //'<td><span data-toggle="tooltip" title="Mas detalles"><i class="fa fa-table" aria-hidden="true"></i></span></td>'+
             // '</tr>'+
            '</thead>'+
            '<tbody>'+tr+'</tbody></table>';
//console.log(tabla);
//var url='<script src="assets/Admin-Theme-3-master/vendors/datatables/dataTables.bootstrap.js"></script>';
 // $("#urlTable").html(url); 

  $(".listTable").html(tabla);    
  $('.listTable').find('table').dataTable({
        "order": [[ 0, "asc" ]]
    });
  $('[data-toggle="tooltip"]').tooltip();
}
else{
  console.log("hubo un error al cargar los SPEI");

}



   
       
    },
 
    error : function(xhr, status) {
      // alert('Disculpe, existió un problema al mostrar los convenios');
       console.log(status);
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//------------------------------------------------------------------

function parseaJson(data,dir){
  tr="";
   var cont=0;
   $.each(JSON.parse(data),function(indice, valor){
    cont++;
    // console.log('My array has at position ' + indice + ', this value: ' + valor);
    // console.log(cont);
var estatus="";
var estatustext="";

if (valor.estado!=0) {
  estatus='   <span class="label label-success"> ok  <i class="fa fa-check-square-o" aria-hidden="true"></i></span> ';
estatustext="ok";
}
else{
estatus='   <span class="label label-warning">   <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></span> ';
estatustext="Pendiente";
}

 tr+='  <tr class="odd gradeX">'+
                //'<td > <span data-toggle="tooltip" title="Indice">'+cont+' </span></td>'+//numero
                 '<td >'+valor.id+'</td>'+//numero
                '<td><span data-toggle="tooltip" title="Referencia"> '+valor.referencia+'  </span>  <a data-toggle="tooltip" title="Ver documento" target="_blank" href="'+dir+valor.referencia+'.xml" > <i class="fa fa-link" aria-hidden="true"></i> </a>'+ 
                '</td>'+//folio
                '<td class="center" ><span data-toggle="tooltip" title="Fecha Operacion">'+valor.fecha+'</span></td>'+//folio documento
                 '<td><span data-toggle="tooltip" title="Monto Pago">'+format2(valor.monto,"$")+'</span></td>'+//fecha de creacion
                
                '<td class="center"><span data-toggle="tooltip" title="Cuenta ordenante ">'+valor.ctaordenante+'</span></td>'+//cliente
                '<td ><span data-toggle="tooltip" title="Banco emisor">'+valor.emisornombre+'</span></td>'+//contrato
                '<td class="center"><span data-toggle="tooltip" title="RFC emisor">'+
                ''+valor.emisorrfc+'    </span></td>'+//fatura
                             
                '<!--<td class="center">'+' <span data-toggle="tooltip" title="'+estatustext+'"> '+estatus+' </span></td>-->'+//documentos
                 '<td class="center">'+
                 ' <span data-toggle="tooltip" title="'+valor.lib+'" > '+valor.lib+' </span></td>'+//documentos
                 //'<td><span data-toggle="tooltip" title="Mas detalles"><i class="fa fa-calculator" aria-hidden="true"></i></span></td>'+
              '</tr>';

});

   return tr;
}



function ShowConveniosSoloLectura(){
 //console.log(argument);
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "showConvenios", },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'JSON',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(json) {
     //console.log(json);
     // console.log(JSON.parse(json.data));
if (json.status=="1") {
    var tr="";
    var cont=0;
      $.each(json,function(index, value){
              
 if (index=="data") {
   $.each(JSON.parse(json.data),function(indice, valor){
    cont++;
    // console.log('My array has at position ' + indice + ', this value: ' + valor);
     //console.log(valor.id);
   
var estatus="";
if(valor.edicion==1){estatus="Editando";}
else if(valor.validacion==1){estatus="Validando";}
else if(valor.firmado==1){estatus="Firmado";}
else if(valor.anulado==1){estatus="Cancelado";}

     tr+='  <tr class="odd gradeX">'+
                '<td class="center">'+cont+'</td>'+//numero
                '<td>'+valor.folio+'</td>'+//folio
               '<td class="center">'+valor.rdocumento+'</td>'+//folio documento
                '<td>'+valor.contrato+'</td>'+//contrato
                
                '<td class="center">'+valor.cliente+'</td>'+//cliente
                 '<td class="center"><a target="_blank" href="http://webserver.aguakan.mx/CFDI/descarga/visorPdf.php?CFD=1&tFac=C&idFactura='+valor.factura+'" > '+(valor.factura!== null ? valor.factura : "") +' </td>'+//fatura
                '<td class="center">'+(valor.conveniox7!== null ? valor.conveniox7 : "") +'</td>'+//conveniox7
                 '<td class="center">'+valor.fechaConvenio+'</td>'+//inicio de convenio
                '<td class="center">'+valor.fechaCreacion+'</td>'+//fecha de creacion
                '<td class="center">'+valor.fechaFin+'</td>'+//ultima modificacion
                '<td class="center">'+valor.version+'</td>'+// version plantilla
                '<!--<td class="center">'+estatus+'</td>-->'+//estatus
                '<td class="center">'+valor.nombre+'</td>'+//usuario
                '<td class="center" style="text-align: center;" ><a target="_blank" href="http://aguakan.com/git/reportesPdf/reportes/?print=LPS&f='+valor.folio+'" ><i class="fa fa-cloud-download" aria-hidden="true" data-toggle="tooltip" title="Descargar" ></i></a></td>'+//
                
              '</tr>';

});


 }

   
});
  $("#showContentConvenios").html(tr);    
  $('#example').dataTable();
}
else{
  console.log("hubo un error al cargar los convenios");

}



   
       
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al mostrar los convenios');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}


function verFolio(){
 //console.log(argument);
  $.ajax({
    // la URL para la petición
    url : AjaxURL(),
 
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
   data : { action : "verfolio", },
 
    // especifica si será una petición POST o GET
    type : 'POST',
 
    // el tipo de información que se espera de respuesta
    dataType : 'JSON',
 
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función

    success : function(json) {
     // console.log(JSON.parse(json.data));
if (json.status=="1") {
    var tr="";
    var cont=0;
   /*/   $.each(json,function(index, value){
              
 if (index=="data") {
   $.each(JSON.parse(json.data),function(indice, valor){
    cont++;
    // console.log('My array has at position ' + indice + ', this value: ' + valor);
     //console.log(valor.id);
var estatus="";
if(valor.estatus==0){estatus="Editando";}
else if(valor.estatus==1){estatus="Valindando";}
else if(valor.estatus==2){estatus="Firmado";}
else if(valor.estatus==2){estatus="Cancelado";}

     tr+='  <tr class="odd gradeX">'+
                '<td>'+cont+'</td>'+//numero
                '<td>'+valor.folio+'</td>'+//folio
                '<td>'+valor.idContrato+'</td>'+//contrato
                '<td class="center">'+valor.idCliente+'</td>'+//cliente
                '<td class="center">'+(valor.idFact!== null ? valor.idFact : "") +'</td>'+//fatura
                '<td>'+valor.fechaConvenio+'</td>'+//inicio de convenio
                '<td>'+valor.fechaCreacion+'</td>'+//fecha de creacion
                '<td>'+valor.fechaFin+'</td>'+//ultima modificacion
                '<td class="center">'+valor.regimenFiscal+'</td>'+// version plantilla
                '<td class="center">'+estatus+'</td>'+//estatus
                '<td class="center">!</td>'+//usuario
                '<td class="center">'+valor.nota+'</td>'+//nota
                '<td class="center"><a href="#" data-toggle="modal" data-folio="'+valor.folio+'" data-target="#myModalver" class="verConvenios" >Ver</a> <a href="#">Descargar</a></td>'+//nota
                '<td class="center"><a href="#" data-toggle="modal" data-target="#myModalMasdetalles"  class="masDetalles">Mas detalles</a></td>'+//nota
              '</tr>';

});


 }

   
});/*/


}
else{
  console.log("hubo un error al mostrar el convenio");

}



   
       
    },
 
    error : function(xhr, status) {
       alert('Disculpe, existió un problema al mostrar el folio');
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//------------------------------------------------------------------
function Showxml_factura_complemento(receptor){
  
  $.ajax({
    
    url : AjaxURL(),
 
   data : { action : "showSPEI2", receptor:receptor},
 
    type : 'POST',
 
    dataType : 'html',
      beforeSend : function(xhr, status) {
     $(".listTable2").html(gifLoad());
    //  alert("Datos buscado");
  
    },
 
    success : function(json) {
       console.log('Showxml_factura_complemento');
      console.log(json);
 $(".listTable2").html(json);
}
  ,
 
    error : function(xhr, status) {
      // alert('Disculpe, existió un problema al mostrar los convenios');
       console.log(status);
      
    },
 
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        //alert('Petición realizada');
    }
});

}
//------------------------------------------------------------------