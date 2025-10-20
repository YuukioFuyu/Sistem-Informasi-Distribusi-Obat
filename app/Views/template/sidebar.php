
<nav class="sidebar sidebar-bunker">
          <div class="sidebar-header">
            <a href="<?php echo base_url()?>" class="sidebar-brand"><img src="<?php echo base_url().$settings_info->favicon?>" class="sidebar-brand_icon" alt="">
              <span class="sidebar-brand_text logo-text"><?php echo $settings_info->menu_title?></span>
            </a>
          </div><!--/.sidebar header-->
          <div class="profile-element d-flex align-items-center flex-shrink-0">
                <div class="avatar online">
                  <img src="<?php echo base_url().session('image')?>" class="img-fluid rounded-circle" alt="">
                </div>
                <div class="profile-text">
                  <h6 class="m-0"><?php echo session('fullname')?></h6>
                  <span><?php echo session('email')?></span>
               </div>
          </div><!--/.profile element-->
       
          <div class="sidebar-body custom-sidebar">
              <nav class="sidebar-nav">
                  <ul class="metismenu">
                   
                  <li class="<?php echo (($segment_2=="" || $segment_3=="home")?"mm-active":'') ?>"><a href="<?php echo base_url()?>"><i class="typcn typcn-home-outline mr-2"></i> <?php echo lan('dashboard')?></a></li>

                <!-- customer menu start -->
        
 <?php if($permission->method('add_customer','create')->access() || $permission->method('customer_list','read')->access() || $permission->method('credit_customer','read')->access() || $permission->method('paid_customer','read')->access()){ ?> 
        <li class="<?php echo (($segment_2=="customer")?"mm-active":'') ?>">
               <a class="has-arrow material-ripple" href="#">
                              <i class="typcn typcn-group mr-2"></i>
                              <?php echo lan('customer')?> 
                          </a>
              <ul class="nav-second-level <?php echo (($segment_3=="cusotomer_list" || $segment_3=="add_customer")?"mm-collapse mm-show":'') ?> ">
 <?php if($permission->method('add_customer','create')->access()){?>
              <li class="<?php echo (($segment_3=="add_customer")?"mm-active":'') ?>"><a href="<?php echo base_url('customer/add_customer')?>"><?php echo lan('add_customer')?></a></li>
                <?php }?>
  <?php if($permission->method('customer_list','read')->access() || $permission->method('customer_list','delete')->access()){?>
              <li class="<?php echo (($segment_3=="customer_list")?"mm-active":'') ?>"><a href="<?php echo base_url('customer/customer_list')?>"> <?php echo lan('customer_list')?></a></li>
        <?php }?>
        <?php if($permission->method('credit_customer','create')->access() || $permission->method('credit_customer','delete')->access()){?>
              <li class="<?php echo (($segment_3=="credit_customer")?"mm-active":'') ?>"><a href="<?php echo base_url('customer/credit_customer')?>"> <?php echo lan('credit_customer')?></a></li>
  <?php }?>
   <?php if($permission->method('paid_customer','create')->access() || $permission->method('paid_customer','delete')->access()){?>
              <li class="<?php echo (($segment_3=="paid_customer")?"mm-active":'') ?>"><a href="<?php echo base_url('customer/paid_customer')?>"> <?php echo lan('paid_customer')?></a></li>
                 <?php }?>


   <?php if($permission->method('customer_ledger','read')->access()){?>
                <li class="<?php echo (($segment_3=="customer_ledger")?"mm-active":'') ?>"><a href="<?php echo base_url('customer/customer_ledger')?>"> <?php echo lan('customer_ledger')?></a></li>
                 <?php }?>               
                      </ul>
                    </li>
                  <?php }?>

                  <!-- customer menu end -->

                    <!-- manufacturer menu start -->
        
 <?php if($permission->method('add_manufacturer','create')->access() || $permission->method('manufacturer_list','read')->access()){?>
        <li class="<?php echo (($segment_2=="manufacturer")?"mm-active":'') ?>">
            <a class="has-arrow material-ripple" href="#">
                              <i class="typcn typcn-group-outline mr-2"></i>
                              <?php echo lan('manufacturer')?> 
                          </a>
              <ul class="nav-second-level <?php echo (($segment_3=="manufacturer_list" || $segment_3=="add_manufacturer")?"mm-collapse mm-show":'') ?> ">
       <?php if($permission->method('add_manufacturer','create')->access()){?> 
              <li class="<?php echo (($segment_3=="add_manufacturer")?"mm-active":'') ?>"><a href="<?php echo base_url('manufacturer/add_manufacturer')?>"><?php echo lan('add_manufacturer')?></a></li>
            <?php }?>
            <?php if($permission->method('manufacturer_list','read')->access() || $permission->method('manufacturer_list','delete')->access()){?> 
              <li class="<?php echo (($segment_3=="manufacturer_list")?"mm-active":'') ?>"><a href="<?php echo base_url('manufacturer/manufacturer_list')?>"> <?php echo lan('manufacturer_list')?></a></li>
               <?php }?>

       <?php if($permission->method('manufacturer_ledger','read')->access()){?> 
              <li class="<?php echo (($segment_3=="manufacturer_ledger")?"mm-active":'') ?>"><a href="<?php echo base_url('manufacturer/manufacturer_ledger')?>"> <?php echo lan('manufacturer_ledger')?></a></li>
               <?php }?>          
                      </ul>
                    </li>
 <?php }?>
                  <!-- manufacturer menu end -->

                  <!-- Medicine menu start -->
        
<?php if($permission->method('add_category','create')->access() || $permission->method('category_list','read')->access() || $permission->method('add_unit','create')->access() || $permission->method('unit_list','read')->access() || $permission->method('add_type','create')->access() || $permission->method('type_list','read')->access() || $permission->method('add_medicine','create')->access() || $permission->method('medicine_list','read')->access() ){?> 
        <li class="<?php echo (($segment_2=="medicine")?"mm-active":'') ?>">
               <a class="has-arrow material-ripple" href="#">
                              <i class="fas fa-pills mr-2"></i>
                              <?php echo lan('medicine')?> 
                          </a>
            <ul class="nav-second-level <?php echo (($segment_3=="category_list" || $segment_3=="add_category")?"mm-collapse mm-show":'') ?> ">
              <?php if($permission->method('add_category','create')->access()){?>
              <li class="<?php echo (($segment_3=="add_category")?"mm-active":'') ?>"><a href="<?php echo base_url('medicine/add_category')?>"><?php echo lan('add_category')?></a></li>
              <?php }?>
              <?php if($permission->method('category_list','read')->access()){?>
              <li class="<?php echo (($segment_3=="category_list")?"mm-active":'') ?>"><a href="<?php echo base_url('medicine/category_list')?>"> <?php echo lan('category_list')?></a></li>
              <?php }?>
              <?php if($permission->method('add_unit','create')->access()){?>
              <li class="<?php echo (($segment_3=="add_unit")?"mm-active":'') ?>"><a href="<?php echo base_url('medicine/add_unit')?>"><?php echo lan('add_unit')?></a></li>
              <?php }?>
              <?php if($permission->method('unit_list','read')->access()){?>
              <li class="<?php echo (($segment_3=="unit_list")?"mm-active":'') ?>"><a href="<?php echo base_url('medicine/unit_list')?>"> <?php echo lan('unit_list')?></a></li>
              <?php }?>
              <?php if($permission->method('add_type','create')->access()){?>
              <li class="<?php echo (($segment_3=="add_type")?"mm-active":'') ?>"><a href="<?php echo base_url('medicine/add_type')?>"><?php echo lan('add_type')?></a></li>
              <?php }?>
              <?php if($permission->method('type_list','read')->access()){?>
              <li class="<?php echo (($segment_3=="type_list")?"mm-active":'') ?>"><a href="<?php echo base_url('medicine/type_list')?>"> <?php echo lan('type_list')?></a></li>
              <?php }?>
              <li class="<?php echo (($segment_3=="leaf_setting")?"mm-active":'') ?>"><a href="<?php echo base_url('medicine/leaf_setting')?>"> <?php echo lan('leaf_setting')?></a></li>
              
              <?php if($permission->method('add_medicine','create')->access()){?>
              <li class="<?php echo (($segment_3=="add_medicine")?"mm-active":'') ?>"><a href="<?php echo base_url('medicine/add_medicine')?>"> <?php echo lan('add_medicine')?></a></li>
              <?php }?>
              <?php if($permission->method('medicine_list','read')->access()){?>
              <li class="<?php echo (($segment_3=="medicine_list")?"mm-active":'') ?>"><a href="<?php echo base_url('medicine/medicine_list')?>"> <?php echo lan('medicine_list')?></a></li>
               <?php }?>
            </ul>
          </li>
        <?php }?>

                  <!-- Medicine menu end -->


                <!-- Purchase menu start -->
            <?php if($permission->method('add_purchase','create')->access() || $permission->method('purchase_list','read')->access()){?>    
            <li class="<?php echo (($segment_2=="purchase")?"mm-active":'') ?>">
               <a class="has-arrow material-ripple" href="#">
                <i class="typcn typcn-shopping-cart mr-2"></i><?php echo lan('purchase')?> </a>
            <ul class="nav-second-level <?php echo (($segment_3=="purchase_list" || $segment_3=="add_purchase")?"mm-collapse mm-show":'') ?> ">
             <?php if($permission->method('add_purchase','create')->access()){?>
              <li class="<?php echo (($segment_3=="add_purchase")?"mm-active":'') ?>"><a href="<?php echo base_url('purchase/add_purchase')?>"><?php echo lan('add_purchase')?></a></li>
             <?php }?>
             <?php if($permission->method('purchase_list','read')->access()){?>
              <li class="<?php echo (($segment_3=="purchase_list")?"mm-active":'') ?>"><a href="<?php echo base_url('purchase/purchase_list')?>"> <?php echo lan('purchase_list')?></a></li>
               <?php }?>
            </ul>
           </li>
         <?php }?>

                <!-- Purchase menu end -->

                 <!-- invoice part start -->
            <?php if($permission->method('add_invoice','create')->access() || $permission->method('pos_invoice','create')->access() || $permission->method('invoice_list','read')->access()){?>
              <li class="<?php echo (($segment_2=="invoice")?"mm-active":'') ?>">
               <a class="has-arrow material-ripple" href="#">
                              <i class="fas fa-hand-holding-usd mr-2"></i>
                              <?php echo lan('invoice')?> 
                          </a>
             <ul class="nav-second-level <?php echo (($segment_3=="invoice_list" || $segment_3=="add_invoice")?"mm-collapse mm-show":'') ?> ">
              <?php if($permission->method('add_invoice','create')->access()){?>
              <li class="<?php echo (($segment_3=="add_invoice")?"mm-active":'') ?>"><a href="<?php echo base_url('invoice/add_invoice')?>"><?php echo lan('add_invoice')?></a></li>
              <?php }?>
               <?php if($permission->method('pos_invoice','create')->access()){?>
              <li class="<?php echo (($segment_3=="pos_invoice")?"mm-active":'') ?>"><a href="<?php echo base_url('invoice/pos_invoice')?>"><?php echo lan('pos_invoice')?></a></li>
              <?php }?>
              <?php if($permission->method('invoice_list','read')->access()){?>
              <li class="<?php echo (($segment_3=="invoice_list")?"mm-active":'') ?>"><a href="<?php echo base_url('invoice/invoice_list')?>"> <?php echo lan('invoice_list')?></a></li>
               <?php }?>
            </ul>
            </li>

            <?php }?>
                 <!-- invoice part end -->

                 <!-- return menu start -->
            <?php if($permission->method('add_return','create')->access() || $permission->method('invoice_return_list','read')->access() || $permission->method('manufacturer_return_list','read')->access() || $permission->method('wastage_return_list','read')->access()){?>     
              <li class="<?php echo (($segment_2=="return")?"mm-active":'') ?>">
               <a class="has-arrow material-ripple" href="#">
                              <i class="fas fa-retweet mr-2"></i>
                              <?php echo lan('return')?> 
                          </a>
            <ul class="nav-second-level <?php echo (($segment_3=="return_form" || $segment_3=="invoice_return_list")?"mm-collapse mm-show":'') ?> ">
            <?php if($permission->method('add_return','create')->access()){?>
            <li class="<?php echo (($segment_3=="add_return")?"mm-active":'') ?>"><a href="<?php echo base_url('return/add_return')?>"><?php echo lan('add_return')?></a></li>
            <?php }?>
            <?php if($permission->method('invoice_return_list','read')->access()){?>
            <li class="<?php echo (($segment_3=="invoice_return_list")?"mm-active":'') ?>"><a href="<?php echo base_url('return/invoice_return_list')?>"><?php echo lan('invoice_return_list')?></a></li>
            <?php }?>
             <?php if($permission->method('manufacturer_return_list','read')->access()){?>
            <li class="<?php echo (($segment_3=="manufacturer_return_list")?"mm-active":'') ?>"><a href="<?php echo base_url('return/manufacturer_return_list')?>"><?php echo lan('manufacturer_return_list')?></a></li>
                <?php }?>
            <?php if($permission->method('wastage_return_list','read')->access()){?>
            <li class="<?php echo (($segment_3=="wastage_return_list")?"mm-active":'') ?>"><a href="<?php echo base_url('return/wastage_return_list')?>"><?php echo lan('wastage_return_list')?></a></li>
                <?php }?>    
            </ul>
            </li>
          <?php }?>

                 <!-- return menu end -->

                 <!-- stock menu start -->
       <?php if($permission->method('stock_report','read')->access() || $permission->method('stock_report_batchwise','read')->access()){?>
        <li class="<?php echo (($segment_2=="stock")?"mm-active":'') ?>">
               <a class="has-arrow material-ripple" href="#">
                              <i class="fab fa-linode mr-3"></i>
                              <?php echo lan('stock')?> 
                          </a>
              <ul class="nav-second-level <?php echo (($segment_3=="stock_list" || $segment_3=="stock_list_batchWise")?"mm-collapse mm-show":'') ?> ">
              <?php if($permission->method('stock_report','read')->access()){?>
              <li class="<?php echo (($segment_3=="stock_list")?"mm-active":'') ?>"><a href="<?php echo base_url('stock/stock_list')?>"><?php echo lan('stock_report')?></a></li>
              <?php }?>
               <?php if($permission->method('stock_report_batchwise','read')->access()){?>
              <li class="<?php echo (($segment_3=="stock_list_batchWise")?"mm-active":'') ?>"><a href="<?php echo base_url('stock/stock_list_batchWise')?>"> <?php echo lan('stock_report_batchwise')?></a></li>
               <?php }?>

              <?php if($permission->method('available_stock','read')->access()){?>
              <li class="<?php echo (($segment_3=="available_stock")?"mm-active":'') ?>"><a href="<?php echo base_url('stock/available_stock')?>"> <?php echo lan('available_stock')?></a></li>
               <?php }?>
                      </ul>
                    </li>
              <?php }?>      
                 <!-- stock menu end -->

                  <!-- bank menu start -->
        
<?php if($permission->method('add_bank','create')->access() || $permission->method('bank_list','read')->access()){?>
        <li class="<?php echo (($segment_2=="bank")?"mm-active":'') ?>">
               <a class="has-arrow material-ripple" href="#">
                              <i class="fas fa-landmark mr-2"></i>
                              <?php echo lan('bank')?> 
                          </a>
              <ul class="nav-second-level <?php echo (($segment_3=="bank_list" || $segment_3=="add_bank")?"mm-collapse mm-show":'') ?> ">
            <?php if($permission->method('add_bank','create')->access()){?>
              <li class="<?php echo (($segment_3=="add_bank")?"mm-active":'') ?>"><a href="<?php echo base_url('bank/add_bank')?>"><?php echo lan('add_bank')?></a></li>
              <?php }?>
              <?php if($permission->method('bank_list','read')->access()){?>
              <li class="<?php echo (($segment_3=="bank_list")?"mm-active":'') ?>"><a href="<?php echo base_url('bank/bank_list')?>"> <?php echo lan('bank_list')?></a></li>
               <?php }?>
                      </ul>
                    </li>
<?php }?>
                  <!-- bank menu end -->

                             <!-- account menu start -->
        
 <?php if($permission->method('coa','create')->access() || $permission->method('opening_balance','create')->access() || $permission->method('manufaturer_payment','create')->access() || $permission->method('customer_receive','create')->access() || $permission->method('cash_adjustment','create')->access() || $permission->method('debit_voucher','create')->access() || $permission->method('credit_voucher','create')->access() || $permission->method('contra_voucher','create')->access() || $permission->method('journal_voucher','create')->access()|| $permission->method('voucher_list','read')->access() || $permission->method('report','read')->access()){?>
        <li class="<?php echo (($segment_2=="account")?"mm-active":'') ?>">
               <a class="has-arrow material-ripple" href="#">
                              <i class="fas fa-money-check-alt mr-2"></i>
                              <?php echo lan('accounts')?> 
                          </a>
              <ul class="nav-second-level <?php echo (($segment_3=="coa")?"mm-collapse mm-show":'') ?> ">
              <?php if($permission->method('coa','create')->access()){?>
                  <li class="<?php echo (($segment_3=="coa")?"mm-active":'') ?>"><a href="<?php echo base_url('account/coa')?>"><?php echo lan('coa')?></a></li>
                <?php }?>
                <?php if($permission->method('opening_balance','create')->access()){?>
                  <li class="<?php echo (($segment_3=="opening_balance")?"mm-active":'') ?>"><a href="<?php echo base_url('account/opening_balance')?>"><?php echo lan('opening_balance')?></a></li> 
                  <?php }?>
                   <?php if($permission->method('manufaturer_payment','create')->access()){?>             
                  <li class="<?php echo (($segment_3=="manufaturer_payment")?"mm-active":'') ?>"><a href="<?php echo base_url('account/manufaturer_payment')?>"><?php echo lan('manufaturer_payment')?></a></li>
                <?php }?>
                <?php if($permission->method('customer_receive','create')->access()){?>
                  <li class="<?php echo (($segment_3=="customer_receive")?"mm-active":'') ?>"><a href="<?php echo base_url('account/customer_receive')?>"><?php echo lan('customer_receive')?></a></li>
                <?php }?>
                  <?php if($permission->method('cash_adjustment','create')->access()){?>
                  <li class="<?php echo (($segment_3=="cash_adjustment")?"mm-active":'') ?>"><a href="<?php echo base_url('account/cash_adjustment')?>"><?php echo lan('cash_adjustment')?></a></li>
                <?php }?>
                 <?php if($permission->method('debit_voucher','create')->access()){?>
                  <li class="<?php echo (($segment_3=="debit_voucher")?"mm-active":'') ?>"><a href="<?php echo base_url('account/debit_voucher')?>"><?php echo lan('debit_voucher')?></a></li>
                <?php }?>
                <?php if($permission->method('credit_voucher','create')->access()){?>
                  <li class="<?php echo (($segment_3=="credit_voucher")?"mm-active":'') ?>"><a href="<?php echo base_url('account/credit_voucher')?>"><?php echo lan('credit_voucher')?></a></li>
                <?php }?>
                 <?php if($permission->method('contra_voucher','create')->access()){?>
                  <li class="<?php echo (($segment_3=="contra_voucher")?"mm-active":'') ?>"><a href="<?php echo base_url('account/contra_voucher')?>"><?php echo lan('contra_voucher')?></a></li>
                <?php }?>
                 <?php if($permission->method('journal_voucher','create')->access()){?>
                  <li class="<?php echo (($segment_3=="journal_voucher")?"mm-active":'') ?>"><a href="<?php echo base_url('account/journal_voucher')?>"><?php echo lan('journal_voucher')?></a></li> 
                  <?php }?> 
                  <?php if($permission->method('voucher_list','read')->access()){?>
                  <li class="<?php echo (($segment_3=="voucher_list")?"mm-active":'') ?>"><a href="<?php echo base_url('account/voucher_list')?>"><?php echo lan('voucher_list')?></a></li>
                  <?php }?>
           <?php if($permission->method('report','read')->access() || $permission->method('cash_book','read')->access() || $permission->method('bank_book','read')->access() || $permission->method('general_ledger','read')->access() || $permission->method('inventory_ledger','read')->access() || $permission->method('trial_balance','read')->access() || $permission->method('profit_loss_result','read')->access() || $permission->method('cash_flow','read')->access() || $permission->method('coa_print','read')->access() || $permission->method('balance_sheet','read')->access()){?>           
                   <li>
           <a class="has-arrow" href="#" aria-expanded="false"> <?php echo lan('report')?></a>
              <ul class="nav-third-level">
                <?php if($permission->method('cash_book','read')->access()){?>
                <li class="<?php echo (($segment_3=="cash_book")?"mm-active":'') ?>"><a href="<?php echo base_url('account/cash_book')?>"><?php echo lan('cash_book')?></a></li>
                <?php }?>
                <?php if($permission->method('bank_book','read')->access()){?>
                <li class="<?php echo (($segment_3=="bank_book")?"mm-active":'') ?>"><a href="<?php echo base_url('account/bank_book')?>"><?php echo lan('bank_book')?></a></li>
                <?php }?>
                <?php if($permission->method('general_ledger','read')->access()){?>
                <li class="<?php echo (($segment_3=="general_ledger")?"mm-active":'') ?>"><a href="<?php echo base_url('account/general_ledger')?>"><?php echo lan('general_ledger')?></a></li>
                <?php }?>
                <?php if($permission->method('trial_balance','read')->access()){?>
                <li class="<?php echo (($segment_3=="trial_balance_form" || $segment_3=="trial_balance_result")?"mm-active":'') ?>"><a href="<?php echo base_url('account/trial_balance_form')?>"><?php echo lan('trial_balance')?></a></li>
                <?php }?>
                <?php if($permission->method('profit_loss','read')->access()){?>
                <li class="<?php echo (($segment_3=="profit_loss" || $segment_3=="profit_loss_result")?"mm-active":'') ?>"><a href="<?php echo base_url('account/profit_loss')?>"><?php echo lan('profit_loss')?></a></li>
                <?php }?>
                <?php if($permission->method('cash_flow','read')->access()){?>
                <li class="<?php echo (($segment_3=="cash_flow" || $segment_3=="cash_flow_result")?"mm-active":'') ?>"><a href="<?php echo base_url('account/cash_flow')?>"><?php echo lan('cash_flow')?></a></li>
                <?php }?>
                <?php if($permission->method('coa_print','read')->access()){?>
                <li class="<?php echo (($segment_3=="coa_print")?"mm-active":'') ?>"><a href="<?php echo base_url('account/coa_print')?>"><?php echo lan('coa_print')?></a></li>                       
                <?php }?>
               <?php if($permission->method('balance_sheet','read')->access()){?> 
                <li class="<?php echo (($segment_3=="balance_sheet")?"mm-active":'') ?>"><a href="<?php echo base_url('account/balance_sheet')?>"><?php echo lan('balance_sheet')?></a></li>                       
                <?php }?>   
                      </ul>
                                    </li>
                                  <?php }?>
                      </ul>
                    </li>
                  <?php }?>
                  <!-- account menu end -->

                  <!-- report menu start -->
          <?php if($permission->method('add_closing','create')->access() || $permission->method('closing_list','read')->access() || $permission->method('sales_report','read')->access() || $permission->method('userwise_sales_report','read')->access() || $permission->method('productwise_sales_report','read')->access() || $permission->method('categorywise_sales_report','read')->access() || $permission->method('purchase_report','read')->access() || $permission->method('purchase_report_categorywise','read')->access()){?>          
         <li class="<?php echo (($segment_2=="report")?"mm-active":'') ?>">
          <a class="has-arrow material-ripple" href="#">
                              <i class="fas fa-book-open mr-2"></i>
                              <?php echo lan('report')?> 
                          </a>
              <ul class="nav-second-level <?php echo (($segment_3=="add_closing")?"mm-collapse mm-show":'') ?> ">
            <?php if($permission->method('add_closing','create')->access()){?>  
              <li class="<?php echo (($segment_3=="add_closing")?"mm-active":'') ?>"><a href="<?php echo base_url('report/add_closing')?>"><?php echo lan('add_closing')?></a></li>
            <?php }?> 
            <?php if($permission->method('closing_list','read')->access()){?>
              <li class="<?php echo (($segment_3=="closing_list")?"mm-active":'') ?>"><a href="<?php echo base_url('report/closing_list')?>"><?php echo lan('closing_list')?></a></li>
              <?php }?>
              <?php if($permission->method('sales_report','read')->access()){?>
              <li class="<?php echo (($segment_3=="sales_report")?"mm-active":'') ?>"><a href="<?php echo base_url('report/sales_report')?>"><?php echo lan('sales_report')?></a></li>
              <?php }?>
              <?php if($permission->method('userwise_sales_report','read')->access()){?>
              <li class="<?php echo (($segment_3=="userwise_sales_report")?"mm-active":'') ?>"><a href="<?php echo base_url('report/userwise_sales_report')?>"><?php echo lan('userwise_sales_report')?></a></li>
              <?php }?>
              <?php if($permission->method('productwise_sales_report','read')->access()){?>
              <li class="<?php echo (($segment_3=="productwise_sales_report")?"mm-active":'') ?>"><a href="<?php echo base_url('report/productwise_sales_report')?>"><?php echo lan('productwise_sales_report')?></a></li>
              <?php }?>
             <?php if($permission->method('categorywise_sales_report','read')->access()){?> 
              <li class="<?php echo (($segment_3=="categorywise_sales_report")?"mm-active":'') ?>"><a href="<?php echo base_url('report/categorywise_sales_report')?>"><?php echo lan('categorywise_sales_report')?></a></li>
              <?php }?>
              <?php if($permission->method('purchase_report','read')->access()){?>
              <li class="<?php echo (($segment_3=="purchase_report")?"mm-active":'') ?>"><a href="<?php echo base_url('report/purchase_report')?>"><?php echo lan('purchase_report')?></a></li>
              <?php }?>
              <?php if($permission->method('purchase_report_categorywise','read')->access()){?>
              <li class="<?php echo (($segment_3=="purchase_report_categorywise")?"mm-active":'') ?>"><a href="<?php echo base_url('report/purchase_report_categorywise')?>"><?php echo lan('purchase_report_categorywise')?></a></li>    
               <?php }?>
                      </ul>
                    </li>
                  <?php }?>
                  <!-- report menu end -->

                   <!-- Hrm menu start -->
        
 <?php if($permission->method('employee','read')->access() || $permission->method('attendance','read')->access() || $permission->method('payroll','read')->access() || $permission->method('expense','read')->access() || $permission->method('loan','read')->access()){?>
        <li class="<?php echo (($segment_2=="employee" || $segment_2=="attendance" | $segment_2=="payroll")?"mm-active":'') ?>">
               <a class="has-arrow material-ripple" href="#">
                              <i class="far fa-address-card mr-2"></i>
                              <?php echo lan('hrm')?> 
                          </a>
              <ul class="nav-second-level <?php echo (($segment_3=="add_designation" || $segment_3=="designation_list")?"mm-collapse mm-show":'') ?> ">

               
<?php if($permission->method('employee','read')->access()){?>
        <li>
           <a class="has-arrow" href="#" aria-expanded="false"> <?php echo lan('employee')?></a>
              <ul class="nav-third-level">
                <?php if($permission->method('add_designation','create')->access()){?>
                <li class="<?php echo (($segment_3=="add_designation")?"mm-active":'') ?>"><a href="<?php echo base_url('employee/add_designation')?>"><?php echo lan('add_designation')?></a></li>
               <?php }?>
               <?php if($permission->method('designation_list','read')->access()){?>
               <li class="<?php echo (($segment_3=="designation_list")?"mm-active":'') ?>"><a href="<?php echo base_url('employee/designation_list')?>"> <?php echo lan('designation_list')?></a></li>
               <?php }?>
               <?php if($permission->method('add_employee','create')->access()){?>
               <li class="<?php echo (($segment_3=="add_employee")?"mm-active":'') ?>"><a href="<?php echo base_url('employee/add_employee')?>"> <?php echo lan('add_employee')?></a></li>
               <?php }?>
               <?php if($permission->method('employee_list','read')->access()){?>
                <li class="<?php echo (($segment_3=="employee_list")?"mm-active":'') ?>"><a href="<?php echo base_url('employee/employee_list')?>"> <?php echo lan('employee_list')?></a></li>
                 <?php }?>                          
                   </ul>
           </li>
         <?php }?>
<?php if($permission->method('attendance','read')->access()){?>
            <li>
           <a class="has-arrow" href="#" aria-expanded="false"> <?php echo lan('attendance')?></a>
              <ul class="nav-third-level">
                <?php if($permission->method('add_attendance','create')->access()){?>
                <li class="<?php echo (($segment_3=="add_attendance")?"mm-active":'') ?>"><a href="<?php echo base_url('attendance/add_attendance')?>"><?php echo lan('add_attendance')?></a></li>
               <?php }?>
               <?php if($permission->method('attendance_list','read')->access()){?>
               <li class="<?php echo (($segment_3=="attendance_list")?"mm-active":'') ?>"><a href="<?php echo base_url('attendance/attendance_list')?>"> <?php echo lan('attendance_list')?></a></li>
               <?php }?>
               <?php if($permission->method('datewise_attendance_report','read')->access()){?>
               <li class="<?php echo (($segment_3=="datewise_attendance_report")?"mm-active":'') ?>"><a href="<?php echo base_url('attendance/datewise_attendance_report')?>"> <?php echo lan('datewise_attendance_report')?></a></li>
               <?php }?>                            
               </ul>
            </li>
          <?php }?>

<?php if($permission->method('payroll','read')->access()){?>
          <li>
           <a class="has-arrow" href="#" aria-expanded="false"> <?php echo lan('payroll')?></a>
              <ul class="nav-third-level">
                <?php if($permission->method('add_benefits','create')->access()){?>
                <li class="<?php echo (($segment_3=="add_benefits")?"mm-active":'') ?>"><a href="<?php echo base_url('payroll/add_benefits')?>"><?php echo lan('add_benefits')?></a></li>
                <?php }?>
                <?php if($permission->method('benefit_list','read')->access()){?>
                <li class="<?php echo (($segment_3=="benefit_list")?"mm-active":'') ?>"><a href="<?php echo base_url('payroll/benefit_list')?>"><?php echo lan('benefit_list')?></a></li>
                <?php }?>
                <?php if($permission->method('add_salarysetup','create')->access()){?>
                
                <li class="<?php echo (($segment_3=="add_salarysetup")?"mm-active":'') ?>"><a href="<?php echo base_url('payroll/add_salarysetup')?>"><?php echo lan('add_salarysetup')?></a></li>
               <?php }?>
               <?php if($permission->method('salary_setup_list','read')->access()){?>
                <li class="<?php echo (($segment_3=="salary_setup_list")?"mm-active":'') ?>"><a href="<?php echo base_url('payroll/salary_setup_list')?>"><?php echo lan('salary_setup_list')?></a></li>
                <?php }?>
                <?php if($permission->method('salary_generate','create')->access()){?>
                <li class="<?php echo (($segment_3=="salary_generate")?"mm-active":'') ?>"><a href="<?php echo base_url('payroll/salary_generate')?>"><?php echo lan('salary_generate')?></a></li>
                <?php }?>
                <?php if($permission->method('salary_sheet','read')->access()){?>
                <li class="<?php echo (($segment_3=="salary_sheet")?"mm-active":'') ?>"><a href="<?php echo base_url('payroll/salary_sheet')?>"><?php echo lan('salary_sheet')?></a></li>
                <?php }?>
                <?php if($permission->method('salary_payment','read')->access()){?>
                <li class="<?php echo (($segment_3=="salary_payment")?"mm-active":'') ?>"><a href="<?php echo base_url('payroll/salary_payment')?>"><?php echo lan('salary_payment')?></a></li>
                   <?php }?>               
                                            
                  </ul>
              </li>
<?php }?>
<?php if($permission->method('expense','read')->access()){?>
            <li>
             <a class="has-arrow" href="#" aria-expanded="false"> <?php echo lan('expense')?></a>
              <ul class="nav-third-level">
                <?php if($permission->method('add_expense_item','create')->access()){?>
                <li class="<?php echo (($segment_3=="add_expense_item")?"mm-active":'') ?>"><a href="<?php echo base_url('expense/add_expense_item')?>"><?php echo lan('add_expense_item')?></a></li>
                <?php }?>
                <?php if($permission->method('expense_item_list','read')->access()){?>
                <li class="<?php echo (($segment_3=="expense_item_list")?"mm-active":'') ?>"><a href="<?php echo base_url('expense/expense_item_list')?>"><?php echo lan('expense_item_list')?></a></li>
                <?php }?>
                <?php if($permission->method('add_expense','create')->access()){?>
                <li class="<?php echo (($segment_3=="add_expense")?"mm-active":'') ?>"><a href="<?php echo base_url('expense/add_expense')?>"><?php echo lan('add_expense')?></a></li>
                <?php }?>
                <?php if($permission->method('expense_list','read')->access()){?>
                <li class="<?php echo (($segment_3=="expense_list")?"mm-active":'') ?>"><a href="<?php echo base_url('expense/expense_list')?>"><?php echo lan('expense_list')?></a></li>
                <?php }?>
                 <?php if($permission->method('expense_statement','read')->access()){?>
                <li class="<?php echo (($segment_3=="expense_statement")?"mm-active":'') ?>"><a href="<?php echo base_url('expense/expense_statement')?>"><?php echo lan('expense_statement')?></a></li>
                <?php }?>
                </ul>
             </li>
           <?php }?>
      <?php if($permission->method('loan','read')->access()){?>
                <li>
             <a class="has-arrow" href="#" aria-expanded="false"> <?php echo lan('loan')?></a>
              <ul class="nav-third-level">
                <?php if($permission->method('add_person','create')->access()){?>
                <li class="<?php echo (($segment_3=="add_person")?"mm-active":'') ?>"><a href="<?php echo base_url('loan/add_person')?>"><?php echo lan('add_person')?></a></li>
                <?php }?>
                 <?php if($permission->method('person_list','read')->access()){?>
                <li class="<?php echo (($segment_3=="person_list")?"mm-active":'') ?>"><a href="<?php echo base_url('loan/person_list')?>"><?php echo lan('person_list')?></a></li>
                <?php }?>
                <?php if($permission->method('add_loan','create')->access()){?>
                <li class="<?php echo (($segment_3=="add_loan")?"mm-active":'') ?>"><a href="<?php echo base_url('loan/add_loan')?>"><?php echo lan('add_loan')?></a></li>
                <?php }?>
                <?php if($permission->method('add_payment','create')->access()){?>
                <li class="<?php echo (($segment_3=="add_payment")?"mm-active":'') ?>"><a href="<?php echo base_url('loan/add_payment')?>"><?php echo lan('add_payment')?></a></li>
                <?php }?>
                 <?php if($permission->method('loan_list','read')->access()){?>
                <li class="<?php echo (($segment_3=="loan_list")?"mm-active":'') ?>"><a href="<?php echo base_url('loan/loan_list')?>"><?php echo lan('loan_list')?></a></li>
                <?php }?>
                <?php if($permission->method('person_ledger','read')->access()){?>
                <li class="<?php echo (($segment_3=="person_ledger")?"mm-active":'') ?>"><a href="<?php echo base_url('loan/person_ledger')?>"><?php echo lan('person_ledger')?></a></li>
               <?php }?>
             
             </ul>
             </li>
           <?php }?>
               

                      </ul>
                    </li>

                  <?php }?>

                  <!-- Hrm menu end -->
                  <!-- tax menu start -->
         <?php if($permission->method('tax_settings','create')->access() || $permission->method('add_income_tax','create')->access() || $permission->method('income_tax_list','read')->access()){?>         
          <li class="<?php echo (($segment_2=="tax")?"mm-active":'') ?>">
          <a class="has-arrow material-ripple" href="#">
                               <i class="fas fa-hryvnia mr-3"></i>
                              <?php echo lan('tax')?> 
                          </a>
              <ul class="nav-second-level <?php echo (($segment_3=="tax_setting" || $segment_3=="update_tax_setting")?"mm-collapse mm-show":'') ?> ">
               <?php if($permission->method('tax_settings','create')->access()){?>
              <li class="<?php echo (($segment_3=="tax_setting")?"mm-active":'') ?>"><a href="<?php echo base_url('tax/tax_setting')?>"><?php echo lan('tax_settings')?></a></li>
              <?php }?>
               <?php if($permission->method('add_income_tax','create')->access()){?>
              <li class="<?php echo (($segment_3=="add_income_tax")?"mm-active":'') ?>"><a href="<?php echo base_url('tax/add_income_tax')?>"><?php echo lan('add_income_tax')?></a></li>
              <?php }?>
               <?php if($permission->method('income_tax_list','create')->access()){?>
              <li class="<?php echo (($segment_3=="income_tax_list")?"mm-active":'') ?>"><a href="<?php echo base_url('tax/income_tax_list')?>"><?php echo lan('income_tax_list')?></a></li>
                 <?php }?>
                      </ul>
                    </li>
                  <?php }?>
                  <!-- tax menu end -->
                     <!-- service menu start -->
        
 <?php if($permission->method('add_service','create')->access() || $permission->method('service_list','read')->access() || $permission->method('service_invoice_form','create')->access() || $permission->method('service_invoice_list','read')->access()){?>
        <li class="<?php echo (($segment_2=="service")?"mm-active":'') ?>">
          <a class="has-arrow material-ripple" href="#">
                              <i class="fab fa-servicestack mr-3"></i>
                              <?php echo lan('service')?> 
                          </a>
              <ul class="nav-second-level <?php echo (($segment_3=="add_service" || $segment_3=="service_list")?"mm-collapse mm-show":'') ?> ">
         <?php if($permission->method('add_service','create')->access()){?>
              <li class="<?php echo (($segment_3=="add_service")?"mm-active":'') ?>"><a href="<?php echo base_url('service/add_service')?>"><?php echo lan('add_service')?></a></li>
             <?php }?>
              <?php if($permission->method('service_list','read')->access()){?>
              <li class="<?php echo (($segment_3=="service_list")?"mm-active":'') ?>"><a href="<?php echo base_url('service/service_list')?>"> <?php echo lan('service_list')?></a></li>
              <?php }?>
               <?php if($permission->method('service_invoice_form','create')->access()){?>
              <li class="<?php echo (($segment_3=="service_invoice_form")?"mm-active":'') ?>"><a href="<?php echo base_url('service/service_invoice_form')?>"> <?php echo lan('add_invoice')?></a></li>
              <?php }?>
              <?php if($permission->method('service_invoice_list','read')->access()){?>
              <li class="<?php echo (($segment_3=="service_invoice_list")?"mm-active":'') ?>"><a href="<?php echo base_url('service/service_invoice_list')?>"> <?php echo lan('invoice_list')?></a></li>
                <?php }?>

                      </ul>
                    </li>
<?php }?>
                  <!-- service menu end -->
             

                  <!-- search menu start -->
        
<?php if($permission->method('medicine_search','read')->access() || $permission->method('invoice_search','read')->access() || $permission->method('purchase_search','read')->access()){?>
        <li class="<?php echo (($segment_2=="search")?"mm-active":'') ?>">
               <a class="has-arrow material-ripple" href="#">
                              <i class="fas fa-search mr-3"></i>
                              <?php echo lan('search')?> 
                          </a>
              <ul class="nav-second-level <?php echo (($segment_3=="medicine_search")?"mm-collapse mm-show":'') ?> ">
            <?php if($permission->method('medicine_search','read')->access()){?>
              <li class="<?php echo (($segment_3=="medicine_search")?"mm-active":'') ?>"><a href="<?php echo base_url('search/medicine_search')?>"><?php echo lan('medicine_search')?></a></li>
              <?php }?>

             <?php if($permission->method('invoice_search','read')->access()){?>
              <li class="<?php echo (($segment_3=="invoice_search")?"mm-active":'') ?>"><a href="<?php echo base_url('search/invoice_search')?>"><?php echo lan('invoice_search')?></a></li>
              <?php }?>  
              <?php if($permission->method('purchase_search','read')->access()){?>
              <li class="<?php echo (($segment_3=="purchase_search")?"mm-active":'') ?>"><a href="<?php echo base_url('search/purchase_search')?>"><?php echo lan('purchase_search')?></a></li>
              <?php }?> 
              
             
                      </ul>
                    </li>
<?php }?>
                  <!-- search menu end -->


      <?php  
        helper('filesystem');
        $path = 'app/Modules/';
        $map  = directory_map($path);
        $HmvcMenu   = array();
        if (is_array($map) && sizeof($map) > 0)
        foreach ($map as $key => $value) {
            $menu = str_replace("\\", '/', $path.$key.'config/menu.php'); 
            if (file_exists($menu)) {

                if (file_exists(APPPATH.'modules/'.$key.'/assets/data/env')){
                   @include($menu);
                }
               
            }  
        }  
        ?> 
                  <!-- setting menu start -->

<?php if($permission->method('add_user','create')->access() || $permission->method('user_list','read')->access() || $permission->method('setting','create')->access() || $permission->method('add_role','create')->access() || $permission->method('role_list','read')->access() || $permission->method('assign_role','create')->access() || $permission->method('language','read')->access() || $permission->method('currency','read')->access()|| $permission->method('currency','create')->access() || $permission->method('currency','update')->access()){?>                    
  <li class="<?php echo (($segment_3=="language" || $segment_3=="edit_phrase" || $segment_3=="phrases" || $segment_2=="role" || $segment_2=="user")?"mm-active":'') ?>">
                          <a class="has-arrow material-ripple" href="#">
                              <i class="typcn typcn-cog-outline mr-3"></i>
                              <?php echo lan('application_setting')?> 
                          </a>
                      <ul class="nav-second-level <?php echo (($segment_3=="user_list" || $segment_3=="add_user" ||$segment_3=="setting" || $segment_3=="add_module" || $segment_3=="add_menu" || $segment_3=="add_role" || $segment_3=="role_list" || $segment_3=="assign_role" || $segment_3=="language" || $segment_3=="phrases" || $segment_3=="edit_phrase")?"mm-collapse mm-show":'') ?> ">
                         <?php if($permission->method('add_user','create')->access()){ ?>
                        <li class="<?php echo (($segment_3=="add_user")?"mm-active":'') ?>"><a href="<?php echo base_url('user/add_user')?>"> <?php echo lan('add_user')?></a></li>

                      <?php }?>
                      <?php if($permission->method('user_list','read')->access()){ ?>
                        <li class="<?php echo (($segment_3=="user_list")?"mm-active":'') ?>"><a href="<?php echo base_url('user/user_list')?>"> <?php echo lan('user_list')?></a></li>
                        <?php }?>
                        <?php if($permission->method('currency','create')->access()){ ?>
                        <li class="<?php echo (($segment_3=="add_currency" || $segment_3=="edit_currency" || $segment_3=="currency_list")?"mm-active":'') ?>"><a href="<?php echo base_url('currency/currency_list')?>">  <?php echo lan('currency')?></a></li>
                       <?php }?>  
                        <?php if($permission->method('setting','create')->access()){ ?>
                        <li class="<?php echo (($segment_3=="setting")?"mm-active":'') ?>"><a href="<?php echo base_url('dashboard/setting')?>">  <?php echo lan('setting')?></a></li>
                       <?php }?>
                     <?php if($permission->method('backup_download','create')->access()){ ?>
                        <li class="<?php echo (($segment_3=="backup_download")?"mm-active":'') ?>"><a href="<?php echo base_url('dashboard/backup_download')?>">  <?php echo lan('backup_download')?></a></li>
                       <?php }?>
                       <?php if($permission->method('restore_database','create')->access()){ ?>
                       <li class="<?php echo (($segment_3=="restore_database")?"mm-active":'') ?>"><a href="<?php echo base_url('dashboard/restore_database')?>">  <?php echo lan('restore_database')?></a></li>
                        <?php }?>
                        <?php if($permission->method('db_import','create')->access()){ ?>
                       <li class="<?php echo (($segment_3=="db_import")?"mm-active":'') ?>"><a href="<?php echo base_url('dashboard/db_import')?>">  <?php echo lan('db_import')?></a></li>
                          <?php }?>
                        <?php if($permission->method('panel_setting','create')->access()){ ?>
                        <li class="<?php echo (($segment_3=="panel_setting")?"mm-active":'') ?>"><a href="<?php echo base_url('dashboard/panel_setting')?>">  <?php echo lan('panel_setting')?></a></li>
                       <?php }?>
                        <!--<li class="<?php echo (($segment_3=="add_module")?"mm-active":'') ?>"><a href="<?php echo base_url('role/add_module')?>"><?php echo lan('add_module')?></a></li>-->
                        <!--<li class="<?php echo (($segment_3=="add_menu")?"mm-active":'') ?>"><a href="<?php echo base_url('role/add_menu')?>"><?php echo lan('add_menu')?> </a></li>-->
                        <?php if($permission->method('add_role','create')->access()){ ?>
                        <li class="<?php echo (($segment_3=="add_role")?"mm-active":'') ?>"><a href="<?php echo base_url('role/add_role')?>"> <?php echo lan('add_role')?></a></li>
                       <?php }?>
                       <?php if($permission->method('role_list','read')->access()){ ?>
                        <li class="<?php echo (($segment_3=="role_list")?"mm-active":'') ?>"><a href="<?php echo base_url('role/role_list')?>"> <?php echo lan('role_list')?></a></li>
                       <?php }?>
                        <?php if($permission->method('assign_role','create')->access()){ ?>
                        <li class="<?php echo (($segment_3=="assign_role")?"mm-active":'') ?>"><a href="<?php echo base_url('role/assign_role')?>"><?php echo lan('assign_role')?></a></li>
                        <?php }?>
                        <?php if($permission->method('language','read')->access()){ ?>
                        <li class="<?php echo (($segment_3=="language" || $segment_3=="edit_phrase" || $segment_3=="phrases")?"mm-active":'') ?>"><a href="<?php echo base_url('dashboard/language')?>"> <?php echo lan('language')?></a></li>
                      <?php }?>
                      </ul>
                    </li>
                  <?php }?>
                  <!-- setting menu end -->
   <?php  if(session('isAdmin') == 1){?>               
  <li class="<?php echo (($segment_2=="autoupdate")?"mm-active":'') ?>">
     <a class="has-arrow material-ripple" href="#">
        <i class="fab fa-autoprefixer mr-2"></i> <?php echo lan('autoupdate')?> </a>
  <ul class="nav-second-level <?php echo (($segment_3=="autoupdate")?"mm-collapse mm-show":'') ?> ">
    <li  class="<?php echo (($segment_3=="autoupdate")?"mm-active":'') ?>">
    <a href="<?php echo base_url('autoupdate/autoupdate')?>"> <?php echo lan('autoupdate')?></a>
  </li>
      </ul>
  </li>
<?php }?>
                  </ul>
              </nav>
          </div><!-- sidebar-body -->
      </nav>