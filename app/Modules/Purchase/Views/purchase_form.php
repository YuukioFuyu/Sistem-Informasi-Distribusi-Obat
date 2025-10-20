  <div class="row">
    <div class="col-md-12 col-lg-12">
     <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_purchase')?></h6>
                </div>
                <div class="text-right">
                    <?php if($permission->method('purchase_list','read')->access()){?>
                   <a href="<?php echo base_url('purchase/purchase_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('purchase_list')?></a>
               <?php }?>
                </div>
            </div>
        </div>
    <div class="card-body">
      <?php echo form_open_multipart("purchase/add_purchase/",'id="purchase_form"') ?>            
                <div class="form-group row">
                    <label for="manufacturer" class="col-md-2 text-right col-form-label"><?php echo lan('manufacturer')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                              <?php echo  form_dropdown('manufacturer_id',$manufacturers,null, 'class="form-control select2" id="manufacturer_id" tabindex="1" ') ?> 
                        </div>
                       
                    </div>
                     <label for="date" class="col-md-2 text-right col-form-label"><?php echo lan('date')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="date" class="form-control datepicker" id="purdate" placeholder="<?php echo lan('date')?>" value="" tabindex="2" >

                        </div>
                       
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="invoice_no" class="col-md-2 text-right col-form-label"><?php echo lan('invoice_no')?><i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class=""> 
                            <input type="text" class="form-control valid_number" name="invoice_no" id="invoice_no" placeholder="<?php echo lan('invoice_no')?>" value="" tabindex="3">
                        </div>
                    </div>
                      <label for="details" class="col-md-2 text-right col-form-label"><?php echo lan('details')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" class="form-control" name="details" id="details" placeholder="<?php echo lan('details')?>" value="" tabindex="4">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="payment_type" class="col-md-2 text-right col-form-label"><?php echo lan('payment_type')?><i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                       <select name="payment_type" id="payment_type" onchange="bank_payment(this.value)" class="form-control select2" tabindex="5" >
                            <option value="1" selected="selected"><?php echo lan('cash_payment')?></option>
                            <option value="2"><?php echo lan('bank_payment')?></option>
                            
                        </select>

                        </div>
                       
                    </div>
                 
                     <label for="bank" class="col-md-2 text-right bank_div col-form-label"><?php echo lan('bank')?>:</label>
                    <div class="col-md-4 bank_div" id="bank_div">
                        <div class="">
                            
                         <?php echo  form_dropdown('bank_id',$bank_list,null, 'class="form-control select2" id="bank_id"') ?> 
                        </div>
                       
                    </div>
               
                </div>
                 <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="purchaseTable">
                                <thead>
                                    <tr>
                                <th class="text-center"><nobr><?php echo lan('medicine_information') ?><i class="text-danger">*</i></nobr></th> 
                                <th class="text-center"><nobr><?php echo lan('batch_id') ?><i class="text-danger"></i></nobr></th>
                                <th class="text-center"><nobr><?php echo lan('expeire_date') ?><i class="text-danger">*</i></nobr></th>
                                <th class="text-center"><nobr><?php echo lan('stock_qty') ?></nobr></th>
                                <th class="text-center"><nobr><?php echo lan('box_pattern') ?><i class="text-danger">*</i></nobr></th>
                                <th class="text-center"><nobr><?php echo lan('box_qty') ?><i class="text-danger">*</i></nobr></th>
                                <th class="text-center"><nobr><?php echo lan('quantity') ?> <i class="text-danger">*</i></nobr></th>
                                <th class="text-center"><nobr><?php echo lan('manufacturer_rate') ?><i class="text-danger">*</i></nobr></th>
                                <th class="text-center"><nobr><?php echo lan('box_mrp') ?> <i class="text-danger">*</i></nobr></th>
                                <th class="text-center"><nobr><?php echo lan('total_purchase_price'); ?></nobr></th>
                                <th class="text-center"><nobr><?php echo lan('action') ?></nobr></th>
                                        </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                    <tr>
                                        <td class="span3 manufacturer">
                                           <input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_list_purchase(1);" placeholder="<?php echo lan('medicine_name') ?>" id="product_name_1" tabindex="6" >

                                            <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id[]" id="SchoolHiddenId"/>

                                            <input type="hidden" class="sl" value="1">
                                        </td>
                                         <td>
                                                <input type="text" name="batch_id[]" id="batch_id_1" class="form-control text-right"  tabindex="7" placeholder="<?php echo lan('batch_id') ?>" />
                                            </td>
                                            <td>
                                                <input type="text" name="expeire_date[]" id="expeire_date_1" class="form-control uidatepicker " tabindex="8"    placeholder="<?php echo lan('expeire_date') ?>" onchange="checkExpiredate(1)" required/>
                                            </td>

                                       <td class="wt">
                                                <input type="text" id="available_quantity_1" class="form-control text-right stock_ctn_1" placeholder="0.00" readonly/>
                                            </td>
                                            <td><select name="leaf_type[]" class="form-control select2 select2-hidden-accessible" id="leaf_type_1" onchange="purchase_calculation(1),checkqty(1)" tabindex="9" aria-hidden="true" required="">
                                            <option value="" selected="selected">Select Leaf Type</option>
                                            <?php foreach($leaf_pattern as $pattern){?>
                                            <option value="<?php echo $pattern['total_number']?>"><?php echo $pattern['leaf_type'].'('.$pattern['total_number'].')';?></option>
                                            <?php }?>
                                            </select>
                                            <input type="hidden" name="" value="<option value=''>Select One</option><?php foreach ($leaf_pattern as $lflist) {?><option value='<?php echo $lflist['total_number']?>'><?php echo $lflist['leaf_type'].'('.$lflist['total_number'].')';?></option><?php }?>
                                                    " id="leaf_type_dropdown">
                                         </td>

                                             <td class="text-right">
                                                <input type="text" name="box_quantity[]" id="box_quantity_1" class="form-control text-right store_cal_1 valid_number" onkeyup="purchase_calculation(1),checkqty(1);" onchange="purchase_calculation(1);" placeholder="0.00" value="" min="0" tabindex="10" required="required"/>
                                            </td>
                                        
                                            <td class="text-right">
                                                <input type="text" name="product_quantity[]" id="quantity_1" class="form-control text-right store_cal_1" onkeyup="purchase_calculation(1),checkqty(1);" onchange="purchase_calculation(1);" placeholder="0.00" value="" min="0" required="required" readonly="" />
                                                <input type="hidden" name="unit_qty[]" id="unit_qty_1">
                                            </td>
                                            <td class="test">
                                                <input type="text" name="product_rate[]" onkeyup="purchase_calculation(1),checkqty(1);" onchange="purchase_calculation(1);" id="product_rate_1" class="form-control product_rate_1 text-right valid_number" placeholder="0.00" value="" min="0" tabindex="11" required="required" />
                                            </td>
                                           <td><input type="text" class="form-control valid_number" name="mrp[]" id="mrp_1" required tabindex="12" ></td>

                                            <td class="text-right">
                                                <input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" />
                                            </td>
                                            <td>

                                               
                                            <button type="button" class="btn btn-danger-soft" tabindex="13" onclick="deleteRow(this)"><i class="far fa-trash-alt"></i></button>
                                                
                                            </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                        <tr>
                                        
                                        <td class="text-right" colspan="9"><b><?php echo lan('sub_total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="sub_total"  class="text-right form-control" name="sub_total" placeholder="0.00" readonly="" />
                                        </td>
                                        <td>
                                        <button id="add_invoice_item" type="button" class="btn btn-info-soft" name="add-invoice-item" onClick="add_purchaseRow('addPurchaseItem')" tabindex="14"><i class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="text-right" colspan="9"><b><?php echo lan('vat') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="vat" onkeyup="purchase_vatcalculation()" class="text-right form-control valid_number" name="vat" placeholder="0.00" tabindex="15" />
                                        </td>
                                        <td>
                                      
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="text-right" colspan="9"><b><?php echo lan('discount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="discount" onkeyup="disoucnt_calculation()" class="text-right form-control valid_number" name="discount" placeholder="0.00" tabindex="16" />
                                        </td>
                                        <td>
                                      
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="text-right" colspan="9"><b><?php echo lan('grand_total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="0.00" readonly="readonly" />
                                        </td>
                                        <td>
                                       
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="text-right" colspan="9"><b><?php echo lan('paid_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="paid_amount" class="text-right form-control valid_number" name="paid_amount" onkeyup="paid_calculation()" placeholder="0.00" tabindex="18" />
                                        </td>
                                        <td>
                                       
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="text-right" colspan="9"><b><?php echo lan('due_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="due_amount" class="text-right form-control" name="due_amount" placeholder="0.00" readonly="readonly" />
                                        </td>
                                        <td>
                                       
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
               
         <div class="form-group row">
                   <div class="col-md-6 text-right">
                   </div>
                     <div class="col-md-6 text-right">
                        <div class="">
                           <input type="button" id="full_paid_purchase_tab" class="btn btn-warning" value="<?php echo lan('full_paid') ?>" tabindex="17" onClick="full_paid_purchase()"/>
                            <button type="submit"  class="btn btn-success" tabindex="19" id="save_purchase">
                                <?php echo lan('save'); ?></button>

                        </div>
                       
                    </div>
                </div>
               

                <?php echo form_close();?>
                    </div>
                    </div>
                    </div>
                    </div>


        <script type="text/javascript">

    
    "use strict";
function full_paid_purchase() {
    var grandTotal = $("#grandTotal").val();
    $("#paid_amount").val(grandTotal);
    paid_calculation();
}
            </script>     