
<link href="<?php echo base_url('/assets/dist/css/pos.css') ?>" rel="stylesheet" type="text/css"/>
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="row">
                <div class="col-sm-3 col-md-12 col-lg-12 col-xl-2">
                    <div class="btn-check-group mb-2">
                        <div class="btn-check position-relative mb-1 mb-sm-2 mb-md-1 mb-xl-2 d-inline-block d-sm-block d-md-inline-block d-xl-block">
                            <input type="checkbox" checked autocomplete="off" id="one" onclick="check_category('all')">
                            <label class="btn btn-success btn-sm btn-block font-weight-600 mb-0" for="one">
                                All
                            </label>
                        </div>
                        <?php foreach($categorylist as $categories){?>
                        <div class="btn-check position-relative mb-1 mb-sm-2 mb-md-1 mb-xl-2 d-inline-block d-sm-block d-md-inline-block d-xl-block">
                           
                            <label class="btn btn-success btn-sm btn-block font-weight-600 mb-0" for="<?php echo $categories['category_id']?>">
                                 <input type="checkbox" autocomplete="off" id="<?php echo $categories['category_id']?>" onclick="check_category(<?php echo $categories['category_id']?>)">
                                <?php echo $categories['category_name']?>
                            </label>
                        </div>
                      <?php }?>

                    </div>
                </div>
                <div class="col-sm-9 col-md-12 col-lg-12 col-xl-10 " id="style-3">
                    <div class="row search-bar">
                        <div class="col-6">
                            <!--Product search box-->
                            <form class="search product-search mb-3" action="#" method="get">
                                <div class="search__inner">
                                    <input type="text" class="search__text" placeholder="Search..." id="product_name">
                                    <i class="typcn typcn-zoom-outline search__helper" data-sa-action="search-close"></i>
                                </div>
                            </form>
                        </div>
                        <div class="col-6 mb-3">
                            <select name="productlist" class="filter-select select2" id="productlist" onchange="onselectimage(this.value)">
                                <option value=' ' selected>Select Medicine</option>
                                <?php foreach($product_list as $medicines){?>
                                <option value="<?php echo $medicines->product_id?>"><?php echo $medicines->product_name.'('.$medicines->strength.')'?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="product-grid">
                        <div class="row row-m-3" id="product_search">
                          <?php foreach($itemlist as $items){?>
                            <div class="col-4 col-sm-3 col-md-4 col-lg-4 col-xl-3 col-p-3">
                                <div class="product-panel bg-white overflow-hidden border-0 shadow-sm" id="image-active_<?php echo $items->product_id ?>">
                                    <div class="item-image position-relative overflow-hidden" onclick="onselectimage(<?php echo $items->product_id?>)">
                                       <div class="" id="image-active_count_<?php echo $items->product_id ?>"><span id="active_pro_<?php echo $items->product_id ?>" class="active_qty"></span></div>
                                        <img src="<?php echo ($items->image?base_url().$items->image:base_url().'/assets/dist/img/products/product.png') ?>" alt="" class="img-fluid">
                                    </div>
                                    <div class="panel-footer border-0 bg-white" onclick="onselectimage(<?php echo $items->product_id?>)">
                                        <h3 class="item-details-title"><?php echo $items->product_name.'('.$items->strength.')'?></h3>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                           
                          
                        </div>
                    </div>               
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 mt-3 mt-md-0">
          
  <?php echo form_open_multipart("invoice/save_pos_sale/", array('id' => 'pos_sale_insert')) ?>
    <div class="row mb-3">
                <div class="col-sm-8">
                     <div class="d-flex align-items-center">
                <div class="form-group mb-0">
                    <input type="text" id="add_item" class="form-control" placeholder="Barcode or QR-code scan here">
                </div>
                <label class="mr-2 ml-2 mb-0 mr-xl-3 ml-xl-3 font-weight-bold">OR</label>       
                <div class="form-group mb-0">
                    <input type="text" id="add_item_m" class="form-control" placeholder="Manual Input barcode">
                </div>
                </div>
                </div>
               
                <div class="col-sm-4 mt-3 mt-sm-0">
              
                  
                <div class="input-group mb-0 mr-xl-2 ml-xl-2">
                        <input type="text" class="form-control" value="<?php echo $customer_name;?>" id="customer_name" onkeyup="CustomerList_pos()">
                        <input type="hidden" name="customer_id" value="<?php echo $customer_id?>" id="customer_id">
                        <div class="input-group-append">
                            <button class="client-add-btn btn btn-success md-trigger" type="button" aria-hidden="true" data-toggle="modal" data-target="#cust_info" id="customermodal-link"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
           
                
                
           </div>
        
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm text-nowrap" id="normalinvoice">
                    <thead>
                        <tr class="text-center">
                            <th><?php echo lan('medicine_information')?> <i class="text-danger">*</i></th>
                            <th><?php echo lan('batch') ?></th>
                            <th><?php echo lan('expiry_date')?></th>
                            <th><?php echo lan('quantity') ?> <i class="text-danger">*</i></th>
                            <th width="150"><?php echo lan('price') ?> <i class="text-danger">*</i></th>
                            <th><?php 
                    if($settings_info->discount_type == 1){
                     echo lan('discount').' %';
                 }
                     if($settings_info->discount_type == 2){
                         echo lan('discount');
                     }
                      if($settings_info->discount_type == 3){
                         echo lan('fixed_dis');
                     }
                      ?></th>
                            <th width="170"><?php echo lan('total') ?></th>
                            <th><?php echo lan('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                  
                    </tbody>
                </table>
            </div>
            <div class="footer">
                <div class="form-group mb-1">
                    <div class="row justify-content-end align-items-center">
                        <label for="invoice_discount" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0"><?php echo lan('invoice_discount') ?>:</label>
                        <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                            <input type="text" class="form-control form-control-sm text-right" id="invdcount" name="invoice_discount" placeholder="0.00" onkeyup="calculateSum_pos()" onchange="calculateSum_pos()">
                            <input type="hidden" id="total_product_dis" value="">
                        </div>
                        <div class="col-2 col-sm-1"></div>
                    </div>
                </div>
                <div class="form-group mb-1">
                    <div class="row justify-content-end align-items-center">
                        <label for="total_discount_ammount" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0"><?php echo lan('total_discount') ?>:</label>
                        <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                            <input type="text" id="total_discount_ammount" class="form-control form-control-sm gui-foot text-right valid_number" name="total_discount" value="0.00" readonly />
                        </div>
                        <div class="col-2 col-sm-1"></div>
                    </div>
                </div>
<?php
$x=0;
 foreach($taxes as $taxs){?>
                <div class="form-group hiddenRow mb-1 collapse" id="collapseExample">
                    
                    <div class="row justify-content-end align-items-center">
                        <label for="total_tax_amount" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0"><?php echo $taxs['tax_name']?>:</label>
                        <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                            <input id="total_tax_amount<?php echo $x;?>" tabindex="-1" class="form-control gui-foot text-right valid totalTax valid_number" name="total_tax<?php echo $x;?>" value="0.00" readonly="readonly" aria-invalid="false" type="text">
                        </div>
                        <div class="col-2 col-sm-1"></div>
                    </div>

                </div>
            <?php $x++;}?>
                <div class="form-group mb-1">
                    <div class="row justify-content-end align-items-center">
                        <label for="total_tax_amount" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0"><?php echo lan('total_vat')?>:</label>
                        <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                            <input type="text" id="total_tax_amount" class="form-control form-control-sm text-right valid_number" name="total_tax" value="0.00"  readonly />
                        </div>
                        <button class="col-2 col-sm-1 btn btn-primary btn-sm text-white collapse-btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-angle-double-down rotate-icon"></i>
                        </button >
                    </div>
                </div>
         
                <div class="form-group mb-1">
                    <div class="row justify-content-end align-items-center">
                        <label for="grandTotal" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0"><?php echo lan('grand_total')?>:</label>
                        <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                            <input type="text" id="grandTotal" class="form-control form-control-sm text-right valid_number" name="grand_total_price" value="" placeholder="0.00" readonly />
                        </div>
                        <div class="col-2 col-sm-1"></div>
                    </div>
                </div>
                <div class="form-group mb-1">
                    <div class="row justify-content-end align-items-center">
                        <label for="previous" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0"><?php echo lan('previous')?>:</label>
                        <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                            <input type="text" id="previous" class="form-control form-control-sm gui-foot text-right valid_number" name="previous" value="0.00" readonly /></div>
                        <div class="col-2 col-sm-1"></div>
                    </div>
                </div>
                <div class="form-group mb-1">
                    <div class="row justify-content-end align-items-center">
                        <label for="change" class="col-5 col-sm-6 col-lg-6 col-xl-7 text-right font-weight-bold mb-0"><?php echo lan('change')?>:</label>
                        <div class="col-5 col-sm-5 col-lg-5 col-xl-3">
                            <input type="text" id="change" class="form-control form-control-sm gui-foot text-right valid_number" name="change" value="0.00" readonly />
                        </div>
                        <div class="col-2 col-sm-1"></div>
                    </div>
                </div>
            </div>
            <div class="fixedclasspos shadow position-fixed bg-white text-center text-lg-left">
                <div class="collapse-btn2 position-absolute d-flex text-white align-items-center justify-content-center bg-red">
                    <i class="fa fa-angle-double-down rotate-icon"></i>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-12 col-xl-8">
                        <div class="calculation d-lg-flex">
                            <div class="cal-box d-lg-flex align-items-lg-center mr-4 text-nowrap">
                                <label class="cal-label font-weight-bold mr-2 mb-0"><?php echo lan('net_total')?>:</label><span class="amount" id="net_total_text">0.00</span>
                                <input type="hidden" id="n_total" name="n_total"> 
                                <input type="hidden" id="txfieldnum" value="<?php echo count($taxes);?>">   
                            </div>
                            <div class="cal-box d-lg-flex align-items-lg-center mr-4">
                                <div class="d-inline-flex align-items-center text-nowrap">
                                    <label class="cal-label font-weight-bold mr-2 mb-0"><?php echo lan('paid_amount')?>:</label>
                                    <input type="text" class="form-control valid_number" placeholder="0.00" onkeyup="invoice_paidamount()" onchange="invoice_paidamount()" id="paidAmount" name="paid_amount">
                                </div>
                            </div>
                            <div class="cal-box d-lg-flex align-items-lg-center mr-4">
                                <label class="cal-label font-weight-bold mr-2 mb-0"><?php echo lan('due_amount')?>:</label><span class="amount" id="due_text">0.00</span>
                                <input type="hidden" id="due_amount" name="due_amount">

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-4 text-xl-right">
                        <div class="action-btns d-flex justify-content-center justify-content-xl-end mt-2 mt-xl-0">

                               <input type="button" id="full_paid_tab" class="btn btn-warning font-weight-600 mr-2" value="Full Paid" onclick="full_paid()" />
                            <input type="submit" id="add_invoice" class="btn btn-success font-weight-600 mr-2" name="add_invoice" value="<?php echo lan('cash_payment')?>">
                            <button type="button" class="btn btn-info font-weight-600 mr-2" data-toggle="modal" data-target="#bank_info_div"><?php echo lan('bank_payment')?></button>
                         <input type="hidden" name="bank_id" value="" id="bank_id">
                          <input type="hidden" name="payment_type" value="1" id="payment_type">
                           
                            
                        </div>
                    </div>
                   

                </div>
            </div>
             <?php echo form_close() ?>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <!--Bootstrap 4 styling-->
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('invoice_list')?></h6>
                </div>
                <div class="text-right">
                   
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table lan table-bordered table-striped table-hover basic">
                    <thead>
                        <tr>
                    <th><?php echo lan('sl_no') ?></th>
                    <th><?php echo lan('invoice_no') ?></th>
                    <th><?php echo lan('invoice_id') ?></th>
                    <th><?php echo lan('customer_name') ?></th>
                    <th><?php echo lan('date') ?></th>
                    <th><?php echo lan('total_amount') ?></th>
                    <th><?php echo lan('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sln = 1;
                         if($todays_sale){?>
                            <?php foreach($todays_sale as $saleList){?>
                        <tr>
                            <td><?php echo $sln++;?></td>
                            <td><?php echo $saleList['invoice'];?></td>
                            <td><?php echo $saleList['invoice_id'];?></td>
                            <td><?php echo $saleList['customer_name'];?></td>
                            <td><?php echo $saleList['date'];?></td>
                            <td class="text-right"><?php echo $saleList['total_amount'];?></td>
                            <td>
        <a href="<?php echo base_url().'/invoice/invoice_details/'.$saleList['invoice_id']?>" class="btn btn-success-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Details"><i class="fas fa-eye" aria-hidden="true"></i></a>
      
       <a href="<?php echo base_url().'/invoice/invoice_edit/'.$saleList['invoice_id'];?>" class="btn btn-primary-soft btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fas fa-edit" aria-hidden="true"></i></a>

       <a onclick="'.$jsaction.'" href="<?php echo base_url().'/invoice/delete_delete/'.$saleList['invoice_id']?>"  class="btn btn-danger-soft btn-sm" data-toggle="tooltip" data-placement="right" title="Delete "><i class="far fa-trash-alt" aria-hidden="true"></i></a>
                            </td>
                           
                        </tr>
                       
                       <?php }}?>
                       
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>




<!-- Modal sticky up effects -->
<div class="md-modal md-effect-1 calc-modal" id="calculator-modal">
<div class="md-content">
    <div class="calc-container">
        <a href="javascript:void(0)" class="close md-close">
            <span aria-hidden="true">×</span>
        </a>
        <h1 class="text-center h2 font-weight-600 mb-3">Calculator</h1>
        <div class="calc">
            <input type="text" class="calc-input" value="" />
            <div class="buttons_cont">
                <button class="btn btn_clear">C</button>
                <button class="btn btn_num">(</button>
                <button class="btn btn_num">)</button>
                <button class="btn btn_num">/</button>
                <button class="btn btn_num">7</button>
                <button class="btn btn_num">8</button>
                <button class="btn btn_num">9</button>
                <button class="btn btn_num">*</button>
                <button class="btn btn_num">4</button>
                <button class="btn btn_num">5</button>
                <button class="btn btn_num">6</button>
                <button class="btn btn_num">+</button>
                <button class="btn btn_num">1</button>
                <button class="btn btn_num">2</button>
                <button class="btn btn_num">3</button>
                <button class="btn btn_num">-</button>
                <button class="btn btn_num">.</button>
                <button class="btn btn_num">0</button>
                <button class="btn btn_del">&laquo;</button>
                <button class="btn btn_calculate">=</button>
            </div>
        </div>
    </div>
</div>
</div>


<!-- customer form modal start -->
    <div class="modal fade" id="cust_info" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                           
                            <h3 class="modal-title"><?php echo lan('add_new_customer') ?></h3>
                             <a href="#" class="close  md-close" data-dismiss="modal">&times;</a>
                        </div>
                        
                        <div class="modal-body">
                            <div id="customeMessage" class="alert hide"></div>
                       <?php echo form_open('invoice/instant_customer', array('class' => 'form-vertical', 'id' => 'newcustomer')) ?>
                    <div class="panel-body">
                        <div class="form-group row">
                            <label for="customer_name" class="col-sm-4 col-form-label"><?php echo lan('customer_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="customer_name" id="m_customer_name" type="text" placeholder="<?php echo lan('customer_name') ?>"  required="" tabindex="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label"><?php echo lan('email') ?></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="email" id="email" type="email" placeholder="<?php echo lan('email') ?>" tabindex="2"> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label"><?php echo lan('mobile_no') ?></label>
                            <div class="col-sm-6">
                                <input class="form-control valid_number" name="mobile" id="mobile" type="text" placeholder="<?php echo lan('mobile_no') ?>" min="0" tabindex="3">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address " class="col-sm-4 col-form-label"><?php echo lan('address') ?></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="address" id="address " rows="3" placeholder="<?php echo lan('address') ?>" tabindex="4"></textarea>
                            </div>
                        </div>
                      
                    </div>
                    
                        </div>

                        <div class="modal-footer">
                            
                            <a href="#" class="btn btn-danger" tabindex="5" data-dismiss="modal">Close</a>
                            
                            <input type="submit" tabindex="6" class="btn btn-success" value="Submit">
                        </div>
                        <?php echo form_close() ?>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
<!-- customer modal form end -->

<!-- product details modal start -->
<div id="detailsmodal" class="modal fade" role="dialog">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">

<strong><center> <?php echo lan('product_details')?></center></strong>
<a href="#" class="close" data-dismiss="modal">&times;</a>
</div>
<div class="modal-body">

    <div class="row">
    <div class="col-sm-12 col-md-12">
    <div class="panel panel-bd">

        <div class="panel-body"> 
            <span id="modalimg"></span><br>  
            <h4><?php echo lan('medicine_name')?> :<span id="modal_productname"></span></h4>
            <h4><?php echo lan('strength')?> :<span id="modal_productmodel"></span></h4>
            <h4><?php echo lan('price')?> :<span id="modal_productprice"></span></h4>
            <h4><?php echo lan('unit')?> :<span id="modal_productunit"></span></h4>
            <h4><?php echo lan('stock')?> :<span id="modal_productstock"></span></h4>

        </div>  
    </div>
    </div>
    </div>

</div>

</div>
<div class="modal-footer">

</div>

</div>

</div>
  <div class="modal fade" id="bank_info_div" tabindex="-1" role="dialog" aria-labelledby="bank_infobody" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title font-weight-600" id="bank_infobody">Bank Payment</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                  <label for="bank" class="col-md-2 text-right bank_div col-form-label"><?php echo lan('bank')?>:</label>
             <div class="col-md-8">
         
    
 <?php echo  form_dropdown('bank_p',$bank_list,null, 'class="form-control select2" id="bank_p" onchange="bankpayment(this.value)"') ?> 

            </div> 
                    </div> 
                                                    </div>
                                                    <div class="modal-footer">
                                                  
                                                        <button type="button" class="btn btn-success" onclick="bankpayment_submit()">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<!-- product details modal end -->

<div class="md-overlay"></div>
</div><!--/.body content-->
</div>


<script src="<?php echo base_url()?>/assets/dist/js/pages/pos.active.js"></script>


