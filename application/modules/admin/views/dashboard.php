<?php
$calendar   = array();
$incomes    = $this->db->get('income')->result_array();
$sales      = $this->db->get('sale')->result_array();
$expenses   = $this->db->get('expense')->result_array();
$purchases  = $this->db->get('purchase')->result_array();

if(!empty($incomes))
    foreach($incomes as $row)
        array_push($calendar, array('id' => $row['income_id'], 'date' => $row['date'],
            'title' => $row['title'], 'type' => 'income'));
        
if(!empty($sales))
    foreach($sales as $row)
        array_push($calendar, array('id' => $row['sale_id'], 'date' => $row['due_date'],
            'title' => lang_key('sale_code') . ' : ' . $row['sale_code'], 'type' => 'sale'));

if(!empty($expenses))
    foreach($expenses as $row)
        array_push($calendar, array('id' => $row['expense_id'], 'date' => $row['date'],
            'title' => $row['title'], 'type' => 'expense'));
        
if(!empty($purchases))
    foreach($purchases as $row)
        array_push($calendar, array('id' => $row['purchase_id'], 'date' => $row['due_date'],
            'title' => lang_key('purchase_code') . ' : ' . $row['purchase_code'], 'type' => 'purchase'));

?>

<br>

<div class="row">
    <div class="col-sm-3">
        <a href="<?php echo site_url('/admin/admins'); ?>">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa-chevron-circle-right" style="padding-bottom: 25px;"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $this->db->get('user')->num_rows(); ?>"
                    data-duration="1500" data-delay="0">0</div>
                <h3>Sistema de seguridad</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="<?php echo site_url('/contact/contacts/customer'); ?>">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa-chevron-circle-right" style="padding-bottom: 25px;"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $this->db->get('contact')->num_rows(); ?>" 
                    data-duration="1500" data-delay="0">0</div>
                <h3>Clientes</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="#">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa-chevron-circle-right"></i></div>
                <div class="num" style="color:#fff">-</div>
                <h3>Funecredit</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="#">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa fa-chevron-circle-right" style="padding-bottom: 40px;"></i></div>
                <div class="num" style="color:#fff">-</div>
                <h3>Rutas</h3>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-sm-3">
        <a href="<?php echo site_url('/servicio/servicios/funerarios'); ?>">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa-chevron-circle-right" style="padding-bottom: 25px;"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $this->db->get_where('service', array( 'type' => 'funerarios' ))->num_rows(); ?>"
                    data-duration="1500" data-delay="0">0</div>
                <h3>Servicios funerarios</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="<?php echo site_url('/servicio/servicios/realizados'); ?>">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa-chevron-circle-right" style="padding-bottom: 25px;"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $this->db->get_where('service', array( 'type' => 'realizados' ))->num_rows(); ?>" 
                    data-duration="1500" data-delay="0">0</div>
                <h3>Servicios Realizados</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="<?php echo site_url('/servicio/servicios/apartados'); ?>">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa-chevron-circle-right"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $this->db->get_where('service', array( 'type' => 'apartados' ))->num_rows(); ?>" 
                    data-duration="1500" data-delay="0">0</div>
                <h3>Apartados</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="<?php echo site_url('impresion/impresiones/index'); ?>">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa-chevron-circle-right" style="padding-bottom: 40px;"></i></div>
                <div class="num" style="color:#fff">-</div>
                <h3>Impresion de recibos</h3>
            </div>
        </a>
    </div>
</div>

<div class="row">
    <!--<div class="col-sm-3">
        <a href="#">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa-chevron-circle-right" style="padding-bottom: 25px;"></i></div>
                <div class="num" style="color:#fff">-</div>
                <h3>Aplicar Pagos</h3>
            </div>
        </a>
    </div>-->
<!-- 
    <div class="col-sm-3">
        <a href="#">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa-chevron-circle-right" style="padding-bottom: 25px;"></i></div>
                <div class="num" style="color:#fff">-</div>
                <h3>Sistema de Seguridad</h3>
            </div>
        </a>
    </div>
 -->
    <div class="col-sm-3">
        <a href="#">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa-chevron-circle-right"></i></div>
                <div class="num" style="color:#fff">-</div>
                <h3>Avisos</h3>
            </div>
        </a>
    </div>

    <div class="col-sm-3">
        <a href="#">
            <div class="tile-stats tile-white">
                <div class="icon"><i class="fa fa-chevron-circle-right" style="padding-bottom: 40px;"></i></div>
                <div class="num" style="color:#fff">-</div>
                <h3>Reportes</h3>
            </div>
        </a>
    </div>
</div>


<!-- <div class="row">
    
    <div class="col-sm-3">
        <a href="<?php echo site_url('inventory/purchase'); ?>">
            <div class="tile-stats tile-cyan">
                <div class="icon" style="padding-bottom: 10px;"><i class="entypo-tag"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $this->db->get('purchase')->num_rows(); ?>"
                    data-duration="1500" data-delay="0">0</div>
                <h3><?php echo lang_key('purchases'); ?></h3>
            </div>
        </a>
    </div>
    
    <div class="col-sm-3">
        <a href="<?php echo site_url('inventory/sale'); ?>">
            <div class="tile-stats tile-orange">
                <div class="icon"><i class="entypo-basket"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $this->db->get('sale')->num_rows(); ?>"
                    data-duration="1500" data-delay="0">0</div>
                <h3><?php echo lang_key('sales'); ?></h3>
            </div>
        </a>
    </div>
    
    <?php
    $income_amount      = 0;
    $expense_amount     = 0;
    $timestamp_start    = strtotime('-29 days', time());
    $timestamp_end      = strtotime(date("m/d/Y"));
    $incomes            = $this->db->get('income')->result_array();
    $sales              = $this->db->get('sale')->result_array();
    $expenses           = $this->db->get('expense')->result_array();
    $purchases          = $this->db->get('purchase')->result_array();

    if(!empty($incomes))
        foreach($incomes as $row)
            if($row['date'] >= $timestamp_start && $row['date'] <= $timestamp_end)
                $income_amount += $row['amount'];

    if(!empty($sales))
        foreach($sales as $row)
            if($row['due_date'] >= $timestamp_start && $row['due_date'] <= $timestamp_end)
                $income_amount += $row['amount'];
            
    if(!empty($expenses))
        foreach($expenses as $row)
            if($row['date'] >= $timestamp_start && $row['date'] <= $timestamp_end)
                $expense_amount += $row['amount'];

    if(!empty($purchases))
        foreach($purchases as $row)
            if($row['due_date'] >= $timestamp_start && $row['due_date'] <= $timestamp_end)
                $expense_amount += $row['amount'];
    ?>
    
    <div class="col-sm-3">
        <a href="<?php echo site_url('reporting/income_report'); ?>">
            <div class="tile-stats tile-pink">
                <div class="icon"><i class="fa fa-money" style="padding-bottom: 40px;"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $income_amount; ?>"
                    data-duration="1500" data-delay="0">0</div>
                <h3><?php echo lang_key('income') . ' (' . lang_key('last_30_days') . ')'; ?></h3>
            </div>
        </a>
    </div>
    
    <div class="col-sm-3">
        <a href="<?php echo site_url('reporting/expense_report'); ?>">
            <div class="tile-stats tile-purple">
                <div class="icon"><i class="fa fa-dollar" style="padding-bottom: 40px;"></i></div>
                <div class="num" data-start="0" data-end="<?php echo $expense_amount; ?>"
                    data-duration="1500" data-delay="0">0</div>
                <h3><?php echo lang_key('expense') . ' (' . lang_key('last_30_days') . ')'; ?></h3>
            </div>
        </a>
    </div>
</div> -->

<br>

<div class="row hidden">
    <div class="col-md-12 col-xs-12">    
        <div class="panel panel-primary " data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <i class="entypo-calendar"></i>
                    <?php echo lang_key('income_expense_calendar'); ?>
                </div>
            </div>
            <div class="panel-body" style="padding:0px;">
                <div class="calendar-env">
                    <div class="calendar-body" style="width: 100%; float: none;">
                        <div id="salon_appointment_calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function()
    {
        $('#salon_appointment_calendar').fullCalendar
        ({
            header:
            {
                left    : 'title',
                right   : 'month,agendaWeek,agendaDay today prev,next'
            },
            
            //defaultView : 'agendaDay',

            //defaultView: 'basicWeek',

            editable    : false,
            firstDay    : 1,
            height      : 400,
            droppable   : false,

            events      :
            [
                <?php
                foreach ($calendar as $row) : ?>
                {
                    title   :   "<?php echo ' ' . lang_key($row['type']) . ' - ' . $row['title']; ?>",
                    start   :   new Date(<?php echo date('Y', $row['date']); ?>, 
                                    <?php echo date('m', $row['date']) - 1; ?>, 
                                    <?php echo date('d', $row['date']); ?>),
                    allDay  :   true,
                    id      :   "<?php echo $row['id'];?>",
                    color   :   "<?php
                        if($row['type'] == 'income' || $row['type'] == 'sale')
                            echo 'green';
                        else
                            echo 'red'; ?>",
                    type    :   '<?php echo $row['type']; ?>'
                },
                <?php endforeach; ?>
            ],
            
            eventClick  : function(calEvent, jsEvent, view) {
                var event_id    = calEvent.id;
                var type        = calEvent.type;
                showAjaxModal('<?php echo base_url();?>index.php/admin/modal/popup/admin/calendar_event_details/' + event_id + '/' + type);
            }
        });
    });
    

</script>