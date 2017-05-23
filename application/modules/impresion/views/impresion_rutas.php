<div class="row">
    <div class="col-md-2">
        <select class="selectboxit" id="route">
            <option value="">Seleccione ruta</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
        </select>
    </div>
    <div class="col-md-3">
        <a href="#" class="btn btn-primary print"><i class="entypo-plus-circled"></i>Imprimir</a>
    </div>
</div>


<br><br><br>
<?php
$sql = "SELECT s.service_id, CONCAT(c.first_name, c.last_name) AS name, c.id_card, s.contract_id, c.route FROM bk_service AS s INNER JOIN bk_contact AS c ON c.contact_id = s.contact_id WHERE MONTH(s.print_date) = ? AND YEAR(s.print_date) = ?";
$services = $this->db->query( $sql, array( date('n'), date('Y') ) )->result_array();

if(empty($services)){ ?>
    <div class="alert alert-info">
        <?php
        echo 'No se encontraron imrepsiones recientes';
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
                <th>Ruta</th>
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
                    <td><?php echo $row['route']; ?></td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                <?php echo lang_key('actions') ?> <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                <li>
                                    <a href="<?php echo site_url('servicio/service_details/' . $row['service_id']); ?>">
                                        <i class="entypo-eye"></i>
                                        <?php echo lang_key('view_details');?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
<?php } ?>

<div class="print_container"></div>

<!--  DATA TABLE EXPORT CONFIGURATIONS -->                      
<script type="text/javascript">
    jQuery(document).ready(function($)
    {   
        var base_url = "<?php echo base_url() . 'index.php/';?>";
        var datatable = $("#table_export").dataTable({
            "sPaginationType"   : "bootstrap"
        });

        $(".main-content select").select2({
            minimumResultsForSearch: -1
        });

        var thisRoute = /\?ruta=(\d+)/.exec(window.location.search),
            $routeSelect = $('#route');


        $routeSelect.on('change', function(){
            var val = $(this).val();

            if(!val) return;

            // datatable.data().filter(function(value){
            //     return value == val;
            // });
        });

        if(thisRoute){
            $routeSelect.val(thisRoute[1]).trigger('change');
        }

        $('.print').on('click', function(e){
            e.preventDefault();
            var route = $routeSelect.val(),
                $print_container = $('.print_container');

            if(!route) return;

            $.ajax({
                url: base_url + 'impresion/recibos/ruta/' + route
            }).
            done(function(response){
                $print_container.html(response);

                if( $print_container.find('.page_print').length ){
                    $print_container.find('.format-currency').formatCurrency({
                        symbol: '₡ '
                    });
                    
                    window.print();
                    $.ajax({
                        url: base_url + 'impresion/actualizar_fecha_impresion_ruta/' + route
                    }).
                    done(function(){
                        var newLocaion = window.location.href.replace( window.location.search, '' );
                        window.location.href = newLocaion + '?ruta=' + route;
                    });
                }
                else{
                    window.location.href = window.location.href;
                }
            });
        });
    });
		
</script>