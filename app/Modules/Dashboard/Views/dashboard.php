                  <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-info card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-users"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted"><?php echo lan('total').' '.lan('customer')?></p>
                                        <h3 class="card-title fs-18 font-weight-bold"><?php echo esc($total_customer)?>
                                            <small></small>
                                        </h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                             <?php if($permission->method('customer_list','read')->access()){ ?>
                                            <a href="<?php echo base_url('customer/customer_list')?>" class="warning-link"><i class="typcn typcn-calendar-outline mr-2"></i>Show Details</a>
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-success card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fas fa-pills"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Total Medicine</p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo esc($total_medicine);?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                         <?php if($permission->method('medicine_list','read')->access()){ ?>    
                                            <a href="<?php echo base_url('medicine/medicine_list')?>"> <i class="typcn typcn-calendar-outline mr-2"></i>Show Details</a>
                                        <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-danger card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="fab fa-linode"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Out Of Stock</p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo esc($out_of_stock);?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <?php if($permission->method('stock_report','read')->access()){ ?> 
                                          <a href="<?php echo base_url('dashboard/stockout_medicine')?>"> <i class="typcn typcn-calendar-outline mr-2"></i>Show Details</a>
                                      <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats statistic-box mb-4">
                                    <div class="card-header card-header-warning card-header-icon position-relative border-0 text-right px-3 py-0">
                                        <div class="card-icon d-flex align-items-center justify-content-center">
                                            <i class="far fa-calendar-alt"></i>
                                        </div>
                                        <p class="card-category text-uppercase fs-10 font-weight-bold text-muted">Expired Medicine</p>
                                        <h3 class="card-title fs-21 font-weight-bold"><?php echo esc($expired);?></h3>
                                    </div>
                                    <div class="card-footer p-3">
                                        <div class="stats">
                                            <?php if($permission->method('stock_report','read')->access()){ ?> 
                                          <a href="<?php echo base_url('dashboard/expired_medicine')?>"> <i class="typcn typcn-calendar-outline mr-2"></i>Show Details</a>
                                      <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                              <!--Variable Radius Pie Chart-->
                    <?php if($permission->method('income_expense_statement','read')->access()){ ?>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('income_expense_statement')?></h6>
                                            </div>
                                            <div class="text-right">
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                      
                                        <canvas id="Income_ExpenseChart" height="110"></canvas>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
              <?php if($permission->method('best_sale_of_the_month','read')->access()){ ?>
                             <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('best_sale_of_the_month')?></h6>
                                            </div>
                                            <div class="text-right">
                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                       
                                         <canvas id="bestSalechart" width="300" height="110"></canvas>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                         
                <?php if($permission->method('monthly_progress_report','read')->access()){ ?>            
                            <div class="col-lg-9">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('monthly_progress_report')?></h6>
                                            </div>
                                            <div class="text-right">
                                           
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                    
                                      <canvas id="monthlyProgress" height="100"></canvas>
                                    </div>
                                </div>
                            </div>
                        <?php }?>

            <?php if($permission->method('todays_report','read')->access()){ ?> 
                              <div class="col-lg-3">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('todays_report')?></h6>

                                            </div>
                                            <div class="text-right">
                                             
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th><?php echo lan('todays_report')?></th>
                                    <th><?php echo lan('amount')?></th>
                                </tr>
                                 <tr>
                                        <th><?php echo lan('total_sales')?></th>
                                        <td class="text-right"><?php echo esc($todays_totalsale); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo lan('total_purchase')?></th>
                                        <td class="text-right"><?php echo esc($todays_totalpurchase); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo lan('cash_received')?></th>
                                        <td class="text-right"><?php echo esc($todays_cashreceive); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo lan('bank_received')?> </th>
                                        <td class="text-right"><?php echo esc($todays_bankreceive); ?></td>
                                    </tr>
                                  
                                     <tr>
                                        <th><?php echo lan('total_service')?> </th>
                                        <td class="text-right"><?php echo esc($todays_total_service); ?></td>
                                    </tr>

                            </table>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                           
                           
                          
                            <!--Tag cloud-->
<input type="hidden" id="bestsaledata" value='<?php echo rtrim($best_sale_data,',');?>' name="">
<input type="hidden" id="bestsalelabel" value='<?php echo rtrim($best_sale_label,',');?>' name="">
<input type="hidden" id="total_sales" value="<?php echo esc($total_sales);?>">
<input type="hidden" id="total_purchase" value="<?php echo esc($total_purchase);?>">
<input type="hidden" id="total_service" value="<?php echo esc($total_service);?>">
<input type="hidden" id="total_salary" value="<?php echo esc($total_salary);?>">
<input type="hidden" id="total_expense" value="<?php echo esc($total_expense);?>">
<input type="hidden" id="progresslabel" value='<?php echo rtrim($monthly_progress_lable,',');?>' name="">
<input type="hidden" id="progress_saledata" value='<?php echo rtrim($progress_saledata,',');?>' name="">
<input type="hidden" id="progress_purchaedata" value='<?php echo rtrim($progress_purchaedata,',');?>' name="">

</div>
                   
    <div id="stockmodal" class="modal fade" role="dialog">
     <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo lan('out_of_stock_and_date_expired_medicine')?></h4>
              </div>
      <div class="modal-body">
        <?php
        
         $query = $expired_medicine_list;

        ?>
        <div> <h4><center>Date Expired Medicine</center></h4></div>
       <table id="" class="table table-bordered table-striped table-hover">
         
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo lan('medicine_name') ?></th>
                                        <th class="text-center"><?php echo lan('batch_id') ?></th>
                                        <th class="text-center"><?php echo lan('expeire_date') ?></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if ($query) {
                                        foreach ($query as $out) {
                                 
                                ?>
                               
                                    <tr>
                                      
                                        <td class="text-center">
                                          
                                           <?php echo esc($out['product_name']).'('.esc($out['strength']).')';?> 
                                            
                                        </td>
                                        <td class="text-center"> <?php echo esc($out['batch_id'])?> </td>
                                        <td class="text-center"><?php echo esc($out['expdate'])?>
                                     <input type="hidden" id="expdate" value="<?php echo esc($out['expdate'])?>">
                                         </td>
                                        
                                    </tr>
                             <?php     }
                             ?>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>

                           <?php 
                           
        $out_of_stock = $stockout_medicine_list;

                            ?>
         <div> <h4><center>Out of Stock Medicine</center></h4></div>                   
        <table id="" class="table table-bordered table-striped table-hover">
             
                                <thead>
                                    <tr>
                                        <th class="text-center"><?php echo lan('medicine_name') ?></th>
                                        <th class="text-center"><?php echo lan('manufacturer_name') ?></th>
                                        
                                        <th class="text-center"><?php echo lan('stock') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        $spcount = 0;
                                        $count = 0;
                                    if ($out_of_stock) {
                                       
                                        foreach ($out_of_stock as $stockout) { 
                                            $count += $spcount;?>
                                       
                            
                                    <tr>
                                        
                                        <td class="text-center">
                                           
                                           <?php echo $stockout['product_name'].'('.$stockout['strength'].')'?> 
                                        
                                            <input type="hidden" id="stockqty" class="stockqtymdl" value="<?php echo esc($stockout['stock'])?>">   
                                        </td>
                                        <td class="text-center"><?php echo esc($stockout['manufacturer_name'])?> </td>
                                     
                                        <td class="text-center"><span class="text-danger"><?php echo esc($stockout['stock'])?></span></td>
                                    </tr>
                                <?php  $spcount++;}
                                ?>
                                <?php
                                    }
                                ?>
                                <input type="hidden" value="<?php echo  esc($count);?>" id="stpcount">
                                </tbody>
                            </table>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="is_modal_shown" id="is_modal_shown" value="<?php echo session('is_modal_shown');?>">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lan('close')?></button>
          </div>
        </div>
     </div>
  </div>     
        
        <!-- Third Party Scripts(used by this page)-->
   <script src="<?php echo base_url()?>/assets/plugins/chartJs/Chart.min.js"></script>
    <script src="<?php echo base_url()?>/assets/dist/js/pages/dashboard.js"></script>
        <!--Page Active Scripts(used by this page)-->
     
    