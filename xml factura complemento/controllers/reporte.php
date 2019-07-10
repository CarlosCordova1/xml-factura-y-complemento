<?php 
if($data1){
      ?>   
<!--<table   class="table table-striped table-bordered dt-responsive nowrap datatable-responsive" cellspacing="0" width="100%">-->
   <table id="example1" class="table table-striped table-bordered datatable-buttons" width="100%">
                      <thead>
                        <tr>
                          <th>No</th> 
                          <th>Fecha de Carga</th>
                          <th>RFC <br>Receptor</th>                     
                          <th>RFC<br> Emisor</th>
                          
                          <th>Fecha<br>Emision</th>
                          <th>Nombre del Proveedor</th>
                          <th>Total</th>
                          <th>Folio<br>interno</th>
                          <th>UIDD Factura</th>
                            <th>Uso del CFDI</th>
                           <th>Metodo de Pago</th>
                          <th>Forma de Pago</th>
                          <th>Fecha<br>Timbrado</th>

                            <th> - </th>
                              
                           <th>Fecha<br>Emision</th>
                          <th>Total</th>
                          <th>Folio<br>interno</th>
                          <th>UIDD Complemento</th>
                          <th>Fecha<br>Timbrado</th>
                        
                          <th>UIDD Relacionado Factura Origen</th>
                          <th>Uso del CFDI</th>
                          <th>Metodo de Pago</th>
                          <th>Forma de Pago</th>
                          <th>Fecha de Pago</th>
                    
                          </tr>
                      </thead>
                      <tbody>
                          <?php 
                          $uno=1;
           foreach ($Acceso as $key => $value) {  
?>

                          <tr class="enlace">
                           <th><?php echo $uno++;?></th> 
                            <th><?php echo $value->FECHAIN?></th>                       
                         <th><?php echo $value->RFC_RECEP?></th> 
                          <th><?php echo $value->RFC_EMISOR?></th>
                          
                         <th><?php echo   $value->FCHAEMISION?></th>
                         <th><?php echo $value->NOMBREPROVE?></th> 
                         <th><?php echo  number_format($value->TOTAL,2)?></th> 
                          <th><?php echo $value->FOLIOINT?></th> 
                         <th><?php echo $value->UIDD_ORIGEN?></th> 
                        <th><?php echo $value->USOCFDI1?></th> 
                          <th><?php echo $value->MTDOPAGO1?></th> 
                          <th><?php echo $value->FOMAPAGO1?></th> 
                         <th><?php echo $value->FCHATIMBRADO?></th>

                            <th> - </th>
                             
                            <th><?php echo   $value->FCHAEMISION2?></th> 
                         <th><?php echo $e= ($value->TOTAL2!="" ? number_format($value->TOTAL2,2):null ) ?></th> 
                          <th><?php echo $value->FOLIOINT2?></th> 
                         <th><?php echo $value->UIDD_ORIGEN2?></th> 
                         <th><?php echo $value->FCHATIMBRADO2?></th>

                         <th><?php echo $value->UIDD_RELACIONADO?></th> 
                       <th><?php echo $value->USOCFDI?></th> 
                          <th><?php echo $value->MTDOPAGO?></th> 
                          <th><?php echo $value->FOMAPAGO?></th> 
                           <th><?php echo $value->FCHAPAGO?></th> 
                           
                           </tr>
                             <?php }  ?>
                      </tbody>
                    </table>


       <script src="assets/gentelella-master/build/js/custom.js"></script> 
 <!--<script src="assets/gentelella-master/build/js/custom_other.js"></script>-->

 <script  type="text/javascript" >
$(document).ready(function(ev) {
    $('.example1').DataTable( {

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv'
        ]
    } );
} );
 </script>
 </script>
<?php 
}
else{
  echo "Acceso no permitido...";
}
?>  