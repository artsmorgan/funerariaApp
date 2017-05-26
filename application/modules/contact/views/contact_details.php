<?php
$contact_details    = $this->db->get_where('contact', array('contact_id' => $contact_id))->result_array();
$contact_type       = get_db_field_by_id('contact', 'type', $contact_id);
if($contact_type == 'customer') {
    $invoice_type = 'sale';
    $this->db->order_by('creation_date', 'desc');
    $invoices = $this->db->get_where('sale', array('customer_id' => $contact_id))->result_array();
} else {
    $invoice_type = 'purchase';
    $this->db->order_by('creation_date', 'desc');
    $invoices = $this->db->get_where('purchase', array('supplier_id' => $contact_id))->result_array();
}
?>
<hr style="margin-bottom: 0px;">
<ol class="breadcrumb bc-3 pull-right" style="margin-bottom: 0px;">
    <li><a href="<?php echo base_url(); ?>"><?php echo lang_key('home'); ?></a></li>
    <li><a href="<?php echo site_url('contact/contacts/' . $contact_type); ?>"><?php echo lang_key($contact_type . 's'); ?></a></li>
    <li class="active"><?php echo lang_key($contact_type) . ' ' . lang_key('details'); ?></li>
</ol>

<div class="row">

    <div class="col-md-12">

        <ul class="nav nav-tabs">
            <li class="<?php if($active_tab == 'summary') echo 'active'; ?>">
                <a href="#summary" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-home"></i></span>
                    <span class="hidden-xs"><?php echo lang_key('summary');?></span>
                </a>
            </li>
            <!--<li>
                <a href="#invoice" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-user"></i></span>
                    <span class="hidden-xs">
                        <?php
                        if($contact_type == 'customer')
                            echo lang_key('sales_history');
                        if($contact_type == 'supplier')
                            echo lang_key('purchase_history'); ?>
                    </span>
                </a>
            </li>-->
            <li class="<?php if($active_tab == 'email') echo 'active'; ?>">
                <a href="#email" data-toggle="tab">
                    <span class="visible-xs"><i class="entypo-home"></i></span>
                    <span class="hidden-xs"><?php echo lang_key('email');?></span>
                </a>
            </li>
        </ul>
        
        <div class="tab-content">
            
            <div class="tab-pane <?php if($active_tab == 'summary') echo 'active'; ?>" id="summary">
                <br>
                <?php
                foreach($contact_details as $row) { ?>
                    <div class="profile-env">
                        
                        <section class="profile-info-tabs">
                            
                            <div class="row">
                                <div class="col-md-12">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('first_name'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="first_name" disabled value="<?php echo $row['first_name']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12">Primer apellido</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="last_name" disabled  value="<?php echo $row['last_name']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12">Segundo apellido</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="last_name2" disabled  value="<?php echo $row['last_name2']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('identification_card'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control col-sm-12" name="id_card" disabled value="<?php echo $row['id_card']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('email'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="email" class="form-control" name="email" disabled value="<?php echo $row['email']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                            </div>
                                            <!-- first row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('address'); ?></label>
                                                        <div class="col-sm-4">
                                                            <select class="selectboxit" id="provincias" name="province" disabled>
                                                                <option value="">Provincia</option>
                                                                <?php echo '<option value="' . $row['province'] . '" selected >' . $row['province'] . '</option>'; ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4" id="lvl-container-2">
                                                                <select class="selectboxit selectaux" id="cantones" name="canton" disabled>
                                                                    <option value="">Cantón</option>
                                                                    <?php echo '<option value="' . $row['canton'] . '" selected >' . $row['canton'] . '</option>'; ?>
                                                                </select>
                                                        </div>
                                                        <div class="col-sm-4" id="lvl-container-3">
                                                            <select class="selectboxit" id="distritos" name="district" disabled>
                                                                <option value="">Distrito</option>
                                                                <?php echo '<option value="' . $row['district'] . '" selected >' . $row['district'] . '</option>'; ?>
                                                            </select>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('phone'); ?></label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="phone" disabled value="<?php echo $row['phone']; ?>" />
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="phone2" disabled value="<?php echo $row['phone2']; ?>" />
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="phone3" disabled value="<?php echo $row['phone3']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                            </div>
                                            <!-- second row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('other_signs'); ?></label>
                                                        <div class="col-sm-12">
                                                            <textarea name="address" disabled class="form-control" rows="5"><?php echo $row['address']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('agent'); ?></label>
                                                                <div class="col-sm-12">
                                                                    <select name="agent" disabled class="selectboxit" >
                                                                        <option value="2">uno</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!-- form-group -->
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('route'); ?></label>
                                                                <div class="col-sm-12">
                                                                    <input type="number" name="route" disabled class="form-control" value="<?php echo $row['route']; ?>" >
                                                                </div>
                                                            </div>
                                                            <!-- form-group -->
                                                        </div>
                                                    </div>
                                                    <!-- inner row -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="col-sm-12 control-label">Monto del contrato</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control format-currency" disabled value="<?php echo $row['amount']; ?>">
                                                                </div>
                                                            </div>
                                                            <!-- form-group -->
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('balance_'); ?></label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" name="balance" disabled class="form-control format-currency" value="<?php echo $row['balance']; ?>">
                                                                </div>
                                                            </div>
                                                            <!-- form-group -->
                                                        </div>
                                                    </div>
                                                    <!-- inner row -->
                                                </div>
                                                <!-- col -->
                                            </div>
                                            <!-- third row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('localization'); ?></label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="localization1" disabled value="<?php echo $row['localization1']; ?>" />
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="localization2" disabled value="<?php echo $row['localization2']; ?>" />
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="localization3" disabled value="<?php echo $row['localization3']; ?>"  />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('fee'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control format-currency" name="fee" disabled  value="<?php echo $row['fee']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('month_payment'); ?></label>
                                                        <div class="col-sm-6">
                                                            <select  class="selectboxit" name="month_payment" disabled >
                                                                <?php echo '<option value="' . $row['month_payment'] . '" selected >' . $row['month_payment'] . '</option>'; ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="number" class="form-control" name="year_payment" disabled value="<?php echo $row['year_payment']; ?>"  />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                            </div>
                                            <!-- fourth row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-1" class="col-sm-12 control-label"><?php echo lang_key('incorporation_date'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" name="incorporation_date" disabled class="form-control datepicker" value="<?php echo $row['incorporation_date']; ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('category'); ?></label>
                                                        <div class="col-sm-12">
                                                            <div class="rating block">
                                                                <?php 
                                                                    $starts = 5;
                                                                    $rating = $starts - $row['category'];
                                                                ?>

                                                                <?php for( $i = 0; $i < $starts; $i++ ): ?>
                                                                    <?php echo '<span ' . ( $i ==  $rating ? 'class="active"' : '' ) . ' >☆</span>' ?>
                                                                <?php endfor; ?>
                                                            </div>
                                                            <input type="hidden" class="form-control col-sm-12" name="category" disabled  value="<?php echo $row['category']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label col-sm-12"><?php echo lang_key('advance_payment'); ?></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control format-currency" name="advance_payment" disabled value="<?php echo $row['advance_payment']; ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- col -->
                                            </div>
                                            <!-- fith row -->
                                        </div>
                                        <!--panel-body-->
                                    </div>
                                </div>
                            	
                        </section>
                        
                    </div>
                <?php } ?>
            </div>
            
            <div class="tab-pane" id="invoice">
                <?php
                if(empty($invoices)) { ?>
                    <div class="alert alert-info">
                        <?php echo lang_key('no_' . $invoice_type . 's'); ?>
                    </div>
                <?php } else { ?>
                    <table class="table table-bordered responsive datatable" id="table_export">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo lang_key($invoice_type) . ' ' . lang_key('code'); ?>
                                </th>
                                <th><?php echo lang_key($contact_type); ?></th>
                                <th><?php echo lang_key('creation_date'); ?></th>
                                <th><?php echo lang_key('amount'); ?></th>
                                <th><?php echo lang_key('options'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 1;
                            foreach($invoices as $row): ?>
                                <tr>
                                    <td><?php echo $count++ ?></td>
                                    <td><?php echo $row[$invoice_type . '_code']; ?></td>
                                    <td>
                                        <?php $contact = $this->db->get_where('contact', array('contact_id' => $row[$contact_type . '_id']))->row();
                                        echo $contact->first_name . ' ' . $contact->last_name;
                                        ?>
                                    </td>
                                    <td><?php echo date('d/m/Y', $row['creation_date']); ?></td>
                                    <td><?php echo show_price($row['amount']); ?></td>
                                    <td>
                                        <a href="<?php echo site_url('inventory/' . $invoice_type . '_invoice/' . $row[$invoice_type . '_id']); ?>"
                                            class="btn btn-default btn-sm btn-icon icon-left">
                                            <i class="entypo-eye"></i>
                                            <?php echo lang_key('view_' . $invoice_type . '_invoice'); ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
            
            <div class="tab-pane <?php if($active_tab == 'email') echo 'active'; ?>" id="email">
                <div class="panel panel-primary" data-collapsed="0">
                    <div class="panel-body">

                        <?php echo form_open(site_url('contact/contact_details/send_email'), array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('to'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email" disabled readonly
                                    value="<?php echo get_db_field_by_id('contact', 'email', $contact_id) ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('subject'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="subject" disabled required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('message'); ?></label>

                            <div class="col-sm-9">
                                <textarea class="form-control email_template_editors" rows="10" name="message" disabled
                                    data-stylesheet-url="<?php echo base_url(); ?>assets/css/wysihtml5-color.css" required></textarea>
                            </div>
                        </div>
                        
                        <input type="hidden" name="contact_id" disabled value="<?php echo $contact_id; ?>" />

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info">
                                    <?php echo lang_key('send_email'); ?>
                                </button>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-----  DATA TABLE EXPORT CONFIGURATIONS ---->                      
<script type="text/javascript">

    jQuery(document).ready(function($)
    {
        var datatable = $("#table_export").dataTable({
            "sPaginationType"   : "bootstrap"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });

        $('.format-currency').formatCurrency({
            symbol: '₡ '
        });
    });
		
</script>