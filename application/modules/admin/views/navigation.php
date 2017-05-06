<div class="sidebar-menu">


    <header class="logo-env">

        <!-- logo -->
        <div class="logo">
            <a href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>uploads/logo.png" style="max-height:60px;" alt="" />
            </a>
        </div>

        <!-- logo collapse icon -->

        <div class="sidebar-collapse">
            <a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                <i class="entypo-menu"></i>
            </a>
        </div>



        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                <i class="entypo-menu"></i>
            </a>
        </div>

    </header>

    <ul id="main-menu" class="main-menu">

        <li class="<?php if($page_name == 'dashboard') echo 'active'; ?>">
            <a href="<?php echo site_url('admin'); ?>">
                <i class="entypo-gauge"></i>
                <span><?php echo lang_key('dashboard'); ?></span>
            </a>
        </li>
        
        <li class="<?php if($page_name == 'contact' || $page_name == 'contact_details') echo 'opened active'; ?>">
            <a href="#">
                <i class="entypo-users"></i>
                <span><?php echo lang_key('contacts'); ?></span>
            </a>
            <ul>
                <li class="<?php if($page_name == 'contact' && $contact_type == 'customer'
                    || $page_name == 'contact_details' && $contact_type == 'customer') echo 'active'; ?>">
                    <a href="<?php echo site_url('contact/contacts/customer'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('customers'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'contact' && $contact_type == 'supplier'
                    || $page_name == 'contact_details' && $contact_type == 'supplier') echo 'active'; ?>">
                    <a href="<?php echo site_url('contact/contacts/supplier'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('suppliers'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="<?php
                    if($page_name == 'account' || $page_name == 'account_add' ||
                        $page_name == 'bill_account' ||
                        $page_name == 'account_payments' ||
                       $page_name == 'ledger_view' || $page_name == 'ledgaccount_payser_view')
                        echo 'opened active';
         ?>">
            <a href="#">
                <i class="entypo-briefcase"></i>
                <span><?php echo lang_key('financial_accounts'); ?></span>
            </a>
            <ul>
                <li class="<?php if($page_name == 'account_pays') echo 'active'; ?>">
                    <a href="<?php echo site_url('account/account_pays'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('pay_account'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'account_payments') echo 'active'; ?>">
                    <a href="<?php echo site_url('account/account_payments'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('bill_account'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'account_add') echo 'active'; ?>">
                    <a href="<?php echo site_url('account/account_add'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('create_new_account'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'account' || $page_name == 'ledger_view') echo 'active'; ?>">
                    <a href="<?php echo site_url('account/accounts'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('account_list'); ?></span>
                    </a>
                </li>

            </ul>
        </li>
       <?php if( $this->session->userdata('role') == 'admin'){ ?>
        <li class="<?php if($page_name == 'product' || $page_name == 'product_category')
            echo 'opened active'; ?>">
            <a href="#">
                <i class="entypo-database"></i> 
                <span><?php echo lang_key('inventory'); ?></span>
            </a>
            <ul>
                <li class="<?php if($page_name == 'product' && $product_type == 'product') echo 'active'; ?>">
                    <a href="<?php echo site_url('inventory/products/product'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('products'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'product' && $product_type == 'service') echo 'active'; ?>">
                    <a href="<?php echo site_url('inventory/products/service'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('services'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'product_category') echo 'active'; ?>">
                    <a href="<?php echo site_url('inventory/product_category'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('product_/_service_categories'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="<?php if($page_name == 'purchase' || $page_name == 'purchase_add'
            || $page_name == 'purchase_edit' || $page_name == 'purchase_invoice') echo 'opened active'; ?>">
            <a href="#">
                <i class="entypo-tag"></i>
                <span><?php echo lang_key('purchases'); ?></span>
            </a>
            <ul>
                <li class="<?php if($page_name == 'purchase_add') echo 'active'; ?>">
                    <a href="<?php echo site_url('inventory/purchase_add'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('new_purchase'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'purchase' || $page_name == 'purchase_edit'
                    || $page_name == 'purchase_invoice') echo 'active'; ?>">
                    <a href="<?php echo site_url('inventory/purchase'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('purchase_history'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <?php } ?>
        <li class="<?php if($page_name == 'sale' || $page_name == 'sale_add'
            || $page_name == 'sale_edit' || $page_name == 'sale_invoice') echo 'opened active'; ?>">
            <a href="#">
                <i class="entypo-basket"></i>
                <span><?php echo lang_key('sales'); ?></span>
            </a>
            <ul>
                <li class="<?php if($page_name == 'sale_add') echo 'active'; ?>">
                    <a href="<?php echo site_url('inventory/sale_add'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('new_sale'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'sale' || $page_name == 'sale_edit'
                    || $page_name == 'sale_invoice') echo 'active'; ?>">
                    <a href="<?php echo site_url('inventory/sale'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('sales_history'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        <?php if( $this->session->userdata('role') == 'admin'){ ?>
        <!-- <li class="<?php if($page_name == 'income' || $page_name == 'expense'
            || $page_name == 'income_expense_category') echo 'opened active'; ?>">
            <a href="#">
                <i class="entypo-chart-line"></i>
                <span><?php echo lang_key('incomes_/_expenses'); ?></span>
            </a>
            <ul>
                <li class="<?php if($page_name == 'income') echo 'active'; ?>">
                    <a href="<?php echo site_url('income_expense/income'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('incomes'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'expense') echo 'active'; ?>">
                    <a href="<?php echo site_url('income_expense/expense'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('expenses'); ?></span>
                    </a>
                </li>
                <li class="<?php if($page_name == 'income_expense_category') echo 'active'; ?>">
                    <a href="<?php echo site_url('income_expense/income_expense_category'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('income_/_expense_categories'); ?></span>
                    </a>
                </li>
            </ul>
        </li> -->
        
        <li class="<?php if($page_name == 'account_statement' || $page_name == 'income_report'
            || $page_name == 'expense_report' || $page_name == 'income_expense_comparison') echo 'opened active'; ?>">
            <a href="#">
                <i class="entypo-chart-bar"></i>
                <span><?php echo lang_key('reporting'); ?></span>
            </a>
            <ul>
                <li class="<?php if($page_name == 'account_statement') echo 'active'; ?>">
                    <a href="<?php echo site_url('reporting/account_statement'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('account_statements'); ?></span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="<?php if($page_name == 'income_report') echo 'active'; ?>">
                    <a href="<?php echo site_url('reporting/income_report'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('income_report'); ?></span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="<?php if($page_name == 'expense_report') echo 'active'; ?>">
                    <a href="<?php echo site_url('reporting/expense_report'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('expense_report'); ?></span>
                    </a>
                </li>
            </ul>
            <ul>
                <li class="<?php if($page_name == 'income_expense_comparison') echo 'active'; ?>">
                    <a href="<?php echo site_url('reporting/income_expense_comparison'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('income_expense_comparison'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="<?php if($page_name == 'note') echo 'active'; ?>">
            <a href="<?php echo site_url('admin/note'); ?>">
                <i class="entypo-doc-text"></i>
                <span><?php echo lang_key('notes'); ?></span>
            </a>
        </li>
        
        <li class="<?php if($page_name == 'admin') echo 'active'; ?>">
            <a href="<?php echo site_url('admin/admins'); ?>">
                <i class="entypo-user"></i>
                <span><?php echo lang_key('admins'); ?></span>
            </a>
        </li>
        
        <!-- SETTINGS -->
        <li class="<?php if ($page_name == 'email_settings' || $page_name == 'system_settings'
            || $page_name == 'manage_language'|| $page_name == 'vat') echo 'opened active';?>">
            <a href="#">
                <i class="entypo-tools"></i>
                <span><?php echo lang_key('settings'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'system_settings') echo 'active';?>">
                    <a href="<?php echo site_url('admin/system_settings'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('system_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'email_settings') echo 'active';?>">
                    <a href="<?php echo site_url('admin/email_settings'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('email_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'manage_language') echo 'active';?>">
                    <a href="<?php echo site_url('admin/manage_language'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('language_settings'); ?></span>
                    </a>
                </li>
                <li class="<?php if ($page_name == 'vat') echo 'active';?>">
                    <a href="<?php echo site_url('admin/vat'); ?>">
                        <i class="entypo-dot"></i>
                        <span><?php echo lang_key('vat_settings'); ?></span>
                    </a>
                </li>
            </ul>
        </li>
<?php } ?>
        <!-- ACCOUNT -->
        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
            <a href="<?php echo site_url('admin/manage_profile'); ?>">
                <i class="entypo-lock"></i>
                <span><?php echo lang_key('account'); ?></span>
            </a>
        </li>
    </ul>

</div>