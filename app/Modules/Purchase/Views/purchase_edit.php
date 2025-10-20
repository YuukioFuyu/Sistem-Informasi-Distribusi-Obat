  <div class="row">
    <div class="col-md-12 col-lg-12">
     <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('edit_purchase')?></h6>
                </div>
                <div class="text-right">
                    <?php if($permission->method('purchase_list','read')->access()){?>
                   <a href="<?php echo base_url('purchase/purchase_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('purchase_list')?></a>
               <?php }?>
                </div>
            </div>
        </div>
    <div class="card-body">
      <?php echo form_open_multipart("purchase/purchase_update/") ?>            
                <div class="form-group row">
                    <label for="manufacturer" class="col-md-2 text-right col-form-label"><?php echo lan('manufacturer')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                              <?php echo  form_dropdown('manufacturer_id',$manufacturers,$purchase->manufacturer_id, 'class="form-control select2" id="manufacturer_id" tabindex="1"') ?> 
                        </div>
                    </div>
                     <label for="date" class="col-md-2 text-right col-form-label"><?php echo lan('date')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                        <input type="text" name="date" class="form-control datepicker" id="purdate" placeholder="<?php echo lan('date')?>" value="<?php echo $purchase->purchase_date?>" tabindex="2">
                        </div>
                       
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="invoice_no" class="col-md-2 text-right col-form-label"><?php echo lan('invoice_no')?><i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class=""> 
                            <input type="text" class="form-control valid_number" name="invoice_no" id="invoice_no" tabindex="3" placeholder="<?php echo lan('invoice_no')?>" value="<?php echo $purchase->chalan_no?>">
                            <input type="hidden" name="purchase_id" value="<?php echo $purchase->purchase_id;?>">
                        </div>
                    </div>
                      <label for="details" class="col-md-2 text-right col-form-label"><?php echo lan('details')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" class="form-control" tabindex="4" name="details" id="details" placeholder="<?php echo lan('details')?>" value="<?php echo $purchase->purchase_details?>">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="payment_type" class="col-md-2 text-right col-form-label"><?php echo lan('payment_type')?><i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                       <select name="payment_type" id="payment_tp" tabindex="5" onchange="bank_payment(this.value)" class="form-control select2">
                            <option value="1" <?php echo ($purchase->payment_type==1?'selected':'')?>><?php echo lan('cash_payment')?></option>
                            <option value="2" <?php echo ($purchase->payment_type==2?'selected':'')?>><?php echo lan('bank_payment')?></option>

                            
                        </select>
           <input type="hidden" name="" value="<?php echo $purchase->payment_type?>" id="payment_type">
                        </div>
                       
                    </div>
                 
                     <label for="bank" class="col-md-2 text-right bank_div col-form-label"><?php echo lan('bank')?>:</label>
                    <div class="col-md-4 bank_div" id="bank_div">
                        <div class="">
                            
                         <?php echo  form_dropdown('bank_id',$bank_list,$purchase->bank_id, 'class="form-control select2" id="bank_id"') ?> 
                        </div>
                       
                    </div>
               
                </div>
                 <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="purchaseTable">
                                <thead>
                                    <tr>
                                <th class="text-center" width="20%"><?php echo lan('medicine_information') ?><i class="text-danger">*</i></th> 
                                <th class="text-center"><?php echo lan('batch_id') ?><i class="text-danger"></i></th>
                                <th class="text-center"><?php echo lan('expeire_date') ?><i class="text-danger">*</i></th>
                                <th class="text-center"><?php echo lan('stock_qty') ?></th>
                                <th class="text-center"><nobr><?php echo lan('box_pattern') ?><i class="text-danger">*</i></nobr></th>
                                <th class="text-center"><?php echo lan('box_qty') ?><i class="text-danger">*</i></th>
                                <th class="text-center"><?php echo lan('quantity') ?> <i class="text-danger">*</i></th>
                                <th class="text-center"><?php echo lan('manufacturer_rate') ?><i class="text-danger">*</i></th>
                                <th class="text-center"><nobr><?php echo lan('box_mrp') ?><i class="text-danger">*</i></nobr></th>
                                <th class="text-center"><?php echo lan('total_purchase_price') ?></th>
                                <th class="text-center"><?php echo lan('action') ?></th>
                                        </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                      <input type="hidden" name="" value="<option value=''>Select One</option><?php foreach ($leaf_pattern as $lflist) {?><option value='<?php echo $lflist['total_number']?>'><?php echo $lflist['leaf_type'].'('.$lflist['total_number'].')'?></option><?php }?>
                                                    " id="leaf_type_dropdown">
                                    <?php
                                    $sub_total = 0;
                                 if($details){
                                    $sl = 1;
                                    foreach($details as $details){
                                         if($sl == 1){
                                       $tabindex  = $sl * 5; 
                                     }else{
                                      $tabindex  = $sl * 8; 
                                     }
                                        $b_pattern = $details['quantity']/$details['box_qty'];
                                        $sub_total += $details['total_amount']; 

                                    ?>
                                    <tr>
                                        <td class="span3 manufacturer">
                                           <input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_list_purchase(<?php echo $sl?>);" placeholder="<?php echo lan('product_name') ?>" id="product_name_<?php echo $sl?>" tabindex="<?php echo $tabindex + 1;?>" value="<?php echo $details['product_name'].'('.$details['strength'].')'?>">

                                            <input type="hidden" class="autocomplete_hidden_value product_id_<?php echo $sl?>" name="product_id[]" id="SchoolHiddenId" value="<?php echo $details['product_id']?>"/>

                                            <input type="hidden" class="sl" value="<?php echo $sl?>">
                                        </td>
                                         <td>
                                                <input type="text" name="batch_id[]" id="batch_id_<?php echo $sl?>" class="form-control text-right"  tabindex="<?php echo $tabindex + 2;?>" placeholder="<?php echo lan('batch_id') ?>" value="<?php echo $details['batch_id']?>"/>
                                            </td>
                                            <td>
                                                <input type="text" name="expeire_date[]" id="expeire_date_<?php echo $sl?>" class="form-control datepicker " tabindex="<?php echo $tabindex + 3;?>" value="<?php echo $details['expeire_date']?>"    placeholder="<?php echo lan('expeire_date') ?>" onchange="checkExpiredate(<?php echo $sl?>)" required/>
                                            </td>

                                       <td class="wt">
                                                <input type="text" id="available_quantity_<?php echo $sl?>" class="form-control text-right stock_ctn_<?php echo $sl?>" placeholder="0.00" readonly/>
                                            </td>
                                             <td><select name="leaf_type[]" class="form-control select2 select2-hidden-accessible" id="leaf_type_<?php echo $sl?>" onchange="purchase_calculation(<?php echo $sl?>),checkqty(<?php echo $sl?>)"  aria-hidden="true" required tabindex="<?php echo $tabindex + 4;?>">
                                            <option value="" selected="selected">Select Leaf Type</option>
                                            <?php foreach($leaf_pattern as $pattern){?>
                                            <option value="<?php echo $pattern['total_number']?>" <?php if($b_pattern == $pattern['total_number']){echo 'selected';}?>><?php echo $pattern['leaf_type'].'('.$pattern['total_number'].')';?></option>
                                            <?php }?>
                                            </select>
                                          
                                         </td>
                                             <td class="text-right">
                                                <input type="text" name="box_quantity[]" id="box_quantity_<?php echo $sl?>" class="form-control text-right store_cal_<?php echo $sl?> valid_number" onkeyup="purchase_calculation(<?php echo $sl?>),checkqty(<?php echo $sl?>);" onchange="purchase_calculation(<?php echo $sl?>);" placeholder="0.00" value="<?php echo $details['box_qty']?>" min="0" tabindex="<?php echo $tabindex + 5;?>" required="required"/>
                                            </td>
                                        
                                            <td class="text-right">
                                                <input type="text" name="product_quantity[]" id="quantity_<?php echo $sl?>" class="form-control text-right store_cal_<?php echo $sl?>" onkeyup="purchase_calculation(<?php echo $sl?>),checkqty(<?php echo $sl?>);" onchange="purchase_calculation(<?php echo $sl?>);" placeholder="0.00" value="<?php echo $details['quantity']?>" min="0"  required="required" readonly=""  />
                                                <input type="hidden" name="unit_qty[]" id="unit_qty_<?php echo $sl?>" value="<?php echo $details['box_size']?>">
                                            </td>
                                            <td class="test">
                                                <input type="text" name="product_rate[]" onkeyup="purchase_calculation(<?php echo $sl?>),checkqty(<?php echo $sl?>);" onchange="purchase_calculation(<?php echo $sl?>);" id="product_rate_<?php echo $sl?>" class="form-control product_rate_<?php echo $sl?> text-right valid_number" placeholder="0.00" value="<?php echo $details['old_mprice']?>" min="0" tabindex="<?php echo $tabindex + 6;?>" required="required" />
                                            </td>
                                           
                                           <td><input type="text" class="form-control valid_number" name="mrp[]" tabindex="<?php echo $tabindex + 7;?>" id="mrp_<?php echo $sl?>" value="<?php echo $details['mrp']?>" required="required"></td>
                                            <td class="text-right">
                                                <input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_<?php echo $sl?>" value="<?php echo $details['total_amount']?>" readonly="readonly" />
                                            </td>
                                            <td>

                                               
                                            <button type="button" class="btn btn-danger-soft" tabindex="<?php echo $tabindex + 8?>" onclick="deleteRow(this)"><i class="far fa-trash-alt"></i></button>
                                                
                                            </td>
                                    </tr>
                                <?php $sl++;}
                            }?>
                                </tbody>
                                <tfoot>
                                     <tr>
                                        <td class="text-right" colspan="9"><b><?php echo lan('sub_total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="sub_total"  class="text-right form-control" value="<?php echo $sub_total;?>" name="sub_total" placeholder="0.00" readonly="" />
                                        </td>
                                        <td>
                                        <button id="add_invoice_item" type="button" class="btn btn-info-soft" name="add-invoice-item" onClick="add_purchaseRow('addPurchaseItem')" tabindex="<?php echo $tabindex + 9?>"><i class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="text-right" colspan="9"><b><?php echo lan('vat') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="vat" onkeyup="purchase_vatcalculation()" value="<?php echo $purchase->total_vat?>" class="text-right form-control valid_number" name="vat" placeholder="0.00" tabindex="<?php echo $tabindex + 10?>"/>
                                        </td>
                                        <td>
                                      
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="text-right" colspan="9"><b><?php echo lan('discount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="discount" onkeyup="disoucnt_calculation()" class="text-right form-control valid_number" name="discount" placeholder="0.00" value="<?php echo $purchase->total_discount?>" tabindex="<?php echo $tabindex + 11?>"/>
                                        </td>
                                        <td>
                                       
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="text-right" colspan="9"><b><?php echo lan('grand_total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="<?php echo $purchase->grand_total_amount?>" readonly="readonly" />
                                        </td>
                                        <td>
                                       
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="text-right" colspan="9"><b><?php echo lan('paid_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="paid_amount" class="text-right form-control valid_number" name="paid_amount" onkeyup="paid_calculation()" placeholder="0.00" value="<?php echo $purchase->paid_amount?>" tabindex="<?php echo $tabindex + 13?>"/>
                                        </td>
                                        <td>
                                       
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="text-right" colspan="9"><b><?php echo lan('due_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="due_amount" class="text-right form-control" name="due_amount" placeholder="0.00" readonly="readonly" value="<?php echo $purchase->due_amount?>" />
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
                           <input type="button" id="full_paid_purchase_tab" class="btn btn-warning" value="<?php echo lan('full_paid') ?>" tabindex="<?php echo $tabindex + 12?>" onClick="full_paid_purchase()"/>
                            <button type="submit"  class="btn btn-success" id="save_purchase" tabindex="<?php echo $tabindex + 14?>">
                                <?php echo lan('save'); ?></button>

                        </div>
                       
                    </div>
                </div>
               

                <?php echo form_close();?>
                    </div>
                    </div>
                    </div>
                    </div>

   