<?php $event_data = $this->db->get_where($param4, array($param4 . '_id' => $param3))->result_array(); 
foreach($event_data as $row) { ?>
<h3><?php echo lang_key($param4) . ' ' . lang_key('details'); ?></h3>
    <br><br>
    <div class="profile-env">
        <section class="profile-info-tabs" style="padding-bottom: 0px;">
            <div class="row">
                <table class="table table-bordered">
                    <?php if($param4 == 'income' || $param4 == 'expense') { ?>
                        <tr>
                            <td><?php echo lang_key('title'); ?></td>
                            <td><b><?php echo $row['title']; ?></b></td>
                        </tr>
                        
                        <tr>
                            <td><?php echo lang_key('description'); ?></td>
                            <td><b><?php echo $row['description']; ?></b></td>
                        </tr>
                        
                        <tr>
                            <td><?php echo lang_key('category'); ?></td>
                            <td><b><?php echo get_db_field_by_id('income_expense_category', 'name', $row['income_expense_category_id']); ?></b></td>
                        </tr>

                        <tr>
                            <td><?php echo lang_key('amount'); ?></td>
                            <td><b><?php echo show_price($row['amount']); ?></b></td>
                        </tr>

                        <tr>
                            <td><?php echo lang_key('account'); ?></td>
                            <td><b><?php echo get_db_field_by_id('account', 'title', $row['account_id']); ?></b></td>
                        </tr>

                        <tr>
                            <td><?php echo lang_key('date'); ?></td>
                            <td><b><?php echo date('d/m/Y', $row['date']); ?></b></td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td><?php echo lang_key($param4) . ' ' . lang_key('code'); ?></td>
                            <td><b><?php echo $row[$param4. '_code']; ?></b></td>
                        </tr>
                        
                        <tr>
                            <?php if($param4 == 'sale') 
                                    $contact_type = 'customer';
                                else
                                    $contact_type = 'supplier';
                                $contact = $this->db->get_where('contact', array('contact_id' => $row[$contact_type . '_id']))->row(); ?>
                            <td><?php echo lang_key($contact_type); ?></td>
                            <td><b><?php echo $contact->first_name . ' ' . $contact->last_name; ?></b></td>
                        </tr>

                        <tr>
                            <td><?php echo lang_key('account'); ?></td>
                            <td><b><?php echo get_db_field_by_id('account', 'title', $row['account_id']); ?></b></td>
                        </tr>

                        <tr>
                            <td><?php echo lang_key('amount'); ?></td>
                            <td><b><?php echo show_price($row['amount']); ?></b></td>
                        </tr>

                        <tr>
                            <td><?php echo lang_key('vat'); ?></td>
                            <td>
                                <b>
                                    <?php
                                    $vat = $this->db->get_where('vat', array('vat_id' => $row['vat_id']))->row();
                                    echo $vat->name . ' (' . $vat->percentage . '%)'?>
                                </b>
                            </td>
                        </tr>

                        <tr>
                            <td><?php echo lang_key('discount'); ?></td>
                            <td><b><?php echo show_price($row['discount']); ?></b></td>
                        </tr>

                        <tr>
                            <td><?php echo lang_key('creation_date'); ?></td>
                            <td><b><?php echo date('d/m/Y', $row['creation_date']); ?></b></td>
                        </tr>

                        <tr>
                            <td><?php echo lang_key('due_date'); ?></td>
                            <td><b><?php echo date('d/m/Y', $row['due_date']); ?></b></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>		
        </section>
    </div>
<?php } ?>