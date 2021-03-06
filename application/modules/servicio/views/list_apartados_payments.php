<?php
	$sql = "select * from bk_transaccion where servicio_tipo = 'apartado' and servicio_id = ? order by fecha_pago asc;";
	$services = $this->db->query( $sql, array( $param3  ) )->result_array();

    $sql_contrato = "select * from bk_apartados where id = ?";
    $sql_account = "select * from bk_apartados_account where contract_number = ?";

	// echo $param3;
	$row = $this->db->query( $sql_contrato, array( $param3) )->row_array();

	$acc = $this->db->query( $sql_account, array($param3 ) )->row_array();

?>
<div class="row">
	
	<div class="col-md-6">
		<strong>Monto Total: </strong> ₡ <?php echo  number_format(htmlentities( $acc['monto_total']), 2, '.', ','); ?>
	</div>
	<div class="col-md-6">
		<strong>Saldo Pendiente: </strong> ₡ <?php echo  number_format(htmlentities( $acc['saldo']), 2, '.', ','); ?>
	</div>
</div>
<br>
<br>
<div class="row">
	<table class="table  table-bordered responsive datatable">
	<thead>
		<tr>
			<th>Id</th>
			<th>Fecha de Pago</th>
			<th>Monto</th>
			<th>Detalle</th>
			<th>Forma de Pago</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($services as $row): ?> 
			<tr>
				<td><?php echo $row['id'] ?></td>
				<td><?php echo $row['fecha_pago'] ?></td>
				<td >
					 ₡ <?php echo  number_format(htmlentities( $row['monto']), 2, '.', ','); ?>
				</td>
				<td><?php echo $row['descripcion'] ?></td>
				<td><?php echo $row['metodo_pago'] ?></td>
				<td>
					<?php
						  $service_url = site_url('admin/modal/popup/impresion/recibo_dinero_contrato_readonly/' . $row['id'] );
					?>
					<a href="javascript:;" class="btn btn-primary"  onclick="showAjaxModal('<?php echo $service_url ?>')">
						Ver Recibo
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	</table>
</div>	

