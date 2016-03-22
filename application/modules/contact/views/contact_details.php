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
            <li>
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
            </li>
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
                                <div class="col-sm-12">
                                    <b style="font-size: 20px; color: #333333;">
                                        <?php echo $row['first_name'] . ' ' . $row['last_name']; ?></b>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <br>
                                    <table class="table table-bordered">

                                        <?php if ($row['company_name'] != ''): ?>
                                            <tr>
                                                <td><?php echo lang_key('company_name'); ?></td>
                                                <td><b><?php echo $row['company_name']; ?></b></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if ($row['email'] != ''): ?>
                                            <tr>
                                                <td><?php echo lang_key('email'); ?></td>
                                                <td><b><?php echo $row['email']; ?></b></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if ($row['phone'] != ''): ?>
                                            <tr>
                                                <td><?php echo lang_key('phone'); ?></td>
                                                <td><b><?php echo $row['phone']; ?></b></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if ($row['mobile'] != ''): ?>
                                            <tr>
                                                <td><?php echo lang_key('mobile'); ?></td>
                                                <td><b><?php echo $row['mobile']; ?></b></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if ($row['website'] != ''): ?>
                                            <tr>
                                                <td><?php echo lang_key('website'); ?></td>
                                                <td><b><?php echo $row['website']; ?></b></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if ($row['skype_id'] != ''): ?>
                                            <tr>
                                                <td><?php echo lang_key('skype_id'); ?></td>
                                                <td><b><?php echo $row['skype_id']; ?></b></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if ($row['address'] != ''): ?>
                                            <tr>
                                                <td><?php echo lang_key('address'); ?></td>
                                                <td><b><?php echo $row['address']; ?></b></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if ($row['country'] != ''): ?>
                                            <tr>
                                                <td><?php echo lang_key('country'); ?></td>
                                                <td><b><?php echo $row['country']; ?></b></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if ($row['city'] != ''): ?>
                                            <tr>
                                                <td><?php echo lang_key('city'); ?></td>
                                                <td><b><?php echo $row['city']; ?></b></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if ($row['state'] != ''): ?>
                                            <tr>
                                                <td><?php echo lang_key('state'); ?></td>
                                                <td><b><?php echo $row['state']; ?></b></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if ($row['zip_code'] != ''): ?>
                                            <tr>
                                                <td><?php echo lang_key('zip_code'); ?></td>
                                                <td><b><?php echo $row['zip_code']; ?></b></td>
                                            </tr>
                                        <?php endif; ?>

                                        <?php if ($row['bank_account'] != ''): ?>
                                            <tr>
                                                <td><?php echo lang_key('bank_account'); ?></td>
                                                <td><b><?php echo $row['bank_account']; ?></b></td>
                                            </tr>
                                        <?php endif; ?>
                                    </table>
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
                                <input type="text" class="form-control" name="email" readonly
                                    value="<?php echo get_db_field_by_id('contact', 'email', $contact_id) ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('subject'); ?></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="subject" required />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo lang_key('message'); ?></label>

                            <div class="col-sm-9">
                                <textarea class="form-control email_template_editors" rows="10" name="message"
                                    data-stylesheet-url="<?php echo base_url(); ?>assets/css/wysihtml5-color.css" required></textarea>
                            </div>
                        </div>
                        
                        <input type="hidden" name="contact_id" value="<?php echo $contact_id; ?>" />

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
    });
		
</script>