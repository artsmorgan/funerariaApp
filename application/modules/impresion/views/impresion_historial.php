<?php
$sql = "SELECT s.service_id, CONCAT(c.first_name, ' ', c.last_name, ' ', c.last_name2) AS name, c.id_card, s.contract_id
 FROM bk_service AS s INNER JOIN bk_contact AS c ON c.contact_id = s.contact_id";

$services = $this->db->query( $sql )->result_array();

if(empty($services)){ ?>
    <div class="alert alert-info">
        <?php
        echo 'No se encontraron servicios ' . $service_type;
        ?>
    </div>
<?php } else { ?>

    <table class="table table-bordered responsive datatable" id="table_export">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Cédula</th>
                <th>Contrato</th>
                <th><?php echo lang_key('options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($services as $row): ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['id_card']; ?></td>
                    <td><?php echo $row['contract_id']; ?></td>
                    <td>
                        <button type="button" class="btn btn-default" onclick="showAjaxModal('<?php echo site_url('admin/modal/popup/impresion/recibo_dinero/' . $row['service_id'] ); ?>');">
                            Imprimir recibo
                        </button>
                        <a type="button" class="btn btn-default" href="<?php echo site_url('/impresion/impresiones/apartados?tipo=contrato?id='+$count); ?>");">
                            Ver Historial de pagos
                        </a>
                        <a type="button" class="btn btn-default" href="<?php echo site_url('/impresion/impresiones/apartados?tipo=contrato?id='+$count); ?>");">
                            Aplicar Pagos Pendientes
                        </a>
                        <a type="button" class="btn btn-danger" ); href="<?php echo site_url('/impresion/impresiones/revertir?tipo=contrato?id='+$count); ?>");">
                            Revertir Pagos
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<div class="print_container">
    <div class="page_print">
        <p class="print_name"><strong>Nombre: </strong> <span></span></p>
        <p class="print_date"><strong>Fecha: </strong> <span></span></p>
        <p class="print_amount"><strong>Monto del contrato: </strong> <span></span></p>
        <p class="print_concepto"><strong>Concepto: </strong> <span></span></p>
        <p class="print_tipo_pago"><strong>Tipo de pago: </strong> <span></span></p>
        <p class="print_saldo_anterior"><strong>Saldo anterior: </strong> <span></span></p>
        <p class="print_abono"><strong>Abono: </strong> <span></span></p>
        <p class="print_interes"><strong>Interes: </strong> <span></span></p>
        <p class="print_amortizacion"><strong>Amortización: </strong> <span></span></p>
        <p class="print_saldo_actual"><strong>Saldo actual: </strong> <span></span></p>
    </div>
</div>
<?php } ?>