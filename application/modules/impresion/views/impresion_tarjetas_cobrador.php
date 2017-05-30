<?php
$sql = "SELECT CONCAT(c.first_name, ' ', c.last_name, ' ', c.last_name2) AS name, c.id_card, s.contract_id,
s.amount, 
CONCAT( c.province, ' / ', c.canton, ' / ', c.district , '<br>', c.address ) AS direction,
CONCAT( c.phone, '_', c.phone2, '_', c.phone3  ) AS phones
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
                        <button type="button" class="btn btn-default" 
                        data-name="<?php echo $row['name']; ?>"
                        data-contract-id="<?php echo $row['contract_id']; ?>"
                        data-direction="<?php echo $row['direction']; ?>"
                        data-phones="<?php echo $row['phones']; ?>"
                        data-id-card="<?php echo $row['id_card']; ?>"
                        data-amount="<?php echo $row['amount']; ?>">
                            Imprimir tarjeta
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<div class="print_container">
    <div class="page_print">
        <p class="print_name"><strong>Nombre: </strong> <span></span></p>
        <p class="print_direction"><strong>Dirección: </strong> <span></span></p>
        <p class="print_contract_id"><strong>N Contrato: </strong> <span></span></p>
        <p class="print_phones"><strong>Teléfonos: </strong> <span></span></p>
        <p class="print_id_card"><strong>Cédula: </strong> <span></span></p>
        <p class="print_amount format-currency"><strong>Monto del contrato: </strong> <span></span></p>
        <p class="print_cuota"><strong>Cuota: </strong> <span>TBP</span></p>
    </div>
</div>
<?php } ?>

<script>
    $(function(){
        var $print_container = $('.print_container');

        $('#table_export').on('click', '.btn', function(e){
            e.preventDefault();
            var name = $(this).data('name'),
                direction = $(this).data('direction'),
                contract_id = $(this).data('contract-id'),
                phones = $(this).data('phones').split('_').filter(function(p){
                   return $.trim(p);
                }).join(' / '),
                id_card = $(this).data('id-card'),
                amount = $(this).data('amount');

            $print_container.find('.print_name span').text(name);
            $print_container.find('.print_direction span').html(direction);
            $print_container.find('.print_contract_id span').text(contract_id);
            $print_container.find('.print_phones span').text(phones);
            $print_container.find('.print_id_card span').text(id_card);
            $print_container.find('.print_amount span').text(amount);

            $('.format-currency span').formatCurrency({
                symbol: '₡ '
            });

            window.print();
        });
    });
</script>