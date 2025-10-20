
  <div class="row">
    <div class="col-md-12 col-lg-12">
     <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo $title?></h6>
                </div>
                <div class="text-right">
                   <a href="<?php echo base_url('invoice/invoice_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('invoice_list')?></a>
                </div>
            </div>
        </div>
    <div class="card-body">
      <?php echo form_open_multipart("invoice/invoice_update/", array('id' => 'manual_sale_insert')) ?>            
                <div class="form-group row">
                    <label for="customer_name" class="col-md-2 text-right col-form-label"><?php echo lan('customer_name')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                          <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo $invoice->customer_name?>" onkeyup="CustomerListInvoice()" tabindex="1">
                           <input type="hidden" name="customer_id" id="customer_id" class="form-control" value="<?php echo $invoice->customer_id?>">
                        </div>
                       
                    </div>
                     <label for="date" class="col-md-2 text-right col-form-label"><?php echo lan('date')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="date" class="form-control datepicker" id="date" placeholder="<?php echo lan('date')?>" value="<?php echo $invoice->date ?>" tabindex="2">

                        </div>
                       
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="invoice_no" class="col-md-2 text-right col-form-label"><?php echo lan('invoice_no')?>:</label>
                    <div class="col-md-4">
                        <div class=""> 
                            <input type="text" class="form-control" name="invoice_no" id="invoice_no" placeholder="<?php echo lan('invoice_no')?>" value="<?php echo $invoice->invoice?>" readonly>
                            <input type="hidden" class="form-control" name="invoice_id" id="invoice_id" placeholder="" value="<?php echo $invoice->invoice_id?>">
                        </div>
                    </div>
                      <label for="details" class="col-md-2 text-right col-form-label"><?php echo lan('details')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" class="form-control" name="details" id="details" placeholder="<?php echo lan('details')?>" value="<?php echo $invoice->invoice_details?>" tabindex="3">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="payment_type" class="col-md-2 text-right col-form-label"><?php echo lan('payment_type')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                       <select name="payment_type" id="payment_type" onchange="bank_payment(this.value)" class="form-control select2" tabindex="4">
                            <option value="1" <?php  if($invoice->payment_type ==1){echo 'selected';}?>><?php echo lan('cash_payment')?></option>
                            <option value="2" <?php  if($invoice->payment_type ==2){echo 'selected';}?>><?php echo lan('bank_payment')?></option>
                            
                        </select>

                        </div>
                       
                    </div>
                 
                     <label for="bank" class="col-md-2 text-right bank_div col-form-label"><?php echo lan('bank')?>:</label>
                    <div class="col-md-4 bank_div" id="bank_div">
                        <div class="">
                            
                         <?php echo  form_dropdown('bank_id',$bank_list,$invoice->bank_id, 'class="form-control select2" id="bank_id"') ?> 
                        </div>
                       
                    </div>
               
                </div>
                 <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm text-nowrap custom-table table-sm text-nowrap" id="normalinvoice">
          <thead>
            <tr>
            <th class="text-center" width="220"><?php echo lan('medicine_information') ?> <i class="text-danger">*</i></th>
            <th class="text-center" width="130"><?php echo lan('batch') ?><i class="text-danger"></i></th>
            <th class="text-center"><?php echo lan('available_qnty') ?></th>
            <th class="text-center" width="120"><?php echo lan('expiry_date') ?></th>
            <th class="text-center" width="100"><?php echo lan('unit') ?></th>
            <th class="text-center"  width="70"><?php echo lan('quantity') ?> <i class="text-danger">*</i></th>
            <th class="text-center"  width="70"><?php echo lan('box_qty') ?> <i class="text-danger">*</i></th>
            <th class="text-center" width="100"><?php echo lan('price') ?> <i class="text-danger">*</i></th>
            <th class="text-center"><?php 
                    if($settings_info->discount_type == 1){
                     echo lan('discount').' %';
                 }
                     if($settings_info->discount_type == 2){
                         echo lan('discount');
                     }
                      if($settings_info->discount_type == 3){
                         echo lan('fixed_dis');
                     }
                      ?> </th>
      
            <th class="text-center" width="110"><?php echo lan('total') ?>
            </th>
            <th class="text-center"><?php echo lan('action') ?></th>
                                    </tr>
                                </thead>
         <tbody id="addinvoiceItem">
            <?php
          use App\Modules\Invoice\Models\InvoiceModel;
          $this->invoiceModel  = new InvoiceModel();
            if($details){
                $sl = 1;

            foreach($details as $details){
              if($sl == 1){
               $tabindex  = $sl * 4; 
             }else{
              $tabindex  = $sl * 5; 
             }
                
                $batch_tab = $tabindex+2;
                $batchList =  $this->invoiceModel->selected_batch_edit($details['product_id']);
                $expiry    = $this->invoiceModel->batch_expiry($details['product_id'],$details['batch_id']);
                ?>
            
            <tr>
             <td class="product_field">
            <input type="text" name="product_name" onkeyup="invoice_productList(<?php echo $sl?>);" onkeypress="invoice_productList(<?php echo $sl?>);" class="form-control productSelection" placeholder='<?php echo lan('medicine_name') ?>' required="" id="product_name_<?php echo $sl?>" tabindex="<?php echo $tabindex + 1;?>" value="<?php echo $details['product_name'].'('.$details['strength'].')'?>">

            <input type="hidden" class="autocomplete_hidden_value product_id_<?php echo $sl?>" name="product_id[]" id="product_id_<?php echo $sl?>"  value="<?php echo $details['product_id']?>"/>

            <input type="hidden" class="baseUrl" value="<?php echo base_url();?>" />
        </td>
        <td>
           
              <?php echo  form_dropdown('batch_id[]',$batchList,$details['batch_id'], 'class="form-control select2" id="batch_id_'.$sl.'" onchange="product_stock_invoice('.$sl.')" tabindex="'.$batch_tab.'"') ?> 
        </td>
        <td>
            <input type="text" name="available_quantity[]" value="<?php echo $expiry['total_stock']+$details['quantity']?>" class="form-control text-right available_quantity_<?php echo $sl?>" value="0" readonly="" id="available_quantity_<?php echo $sl?>"/>
        </td>
        <td id="expire_date_<?php echo $sl?>">
         <?php echo $expiry['expeire_date'];?>
        </td>
        <td>
            <input name="" id="" class="form-control text-right unit_<?php echo $sl?> valid" value="<?php echo $details['unit_name']?>" readonly="" aria-invalid="false" type="text">
        </td>
        <td>
            <input type="text" name="product_quantity[]" onkeyup="quantity_calculate_invoice(<?php echo $sl?>),checkqty_invoice(<?php echo $sl?>);" onchange="quantity_calculate_invoice(<?php echo $sl?>);" class="total_qntt_<?php echo $sl?> form-control text-right valid_number" id="total_qntt_<?php echo $sl?>" value="<?php echo $details['quantity']?>" placeholder="0.00" min="0" tabindex="<?php echo $tabindex + 3;?>" required/>
        </td>

         <td>
            <input type="text" name="box_quantity[]" onkeyup="quantity_calculate_invoice(<?php echo $sl?>),checkqty_invoice(<?php echo $sl?>);" onchange="quantity_calculate_invoice(<?php echo $sl?>);" class=" form-control text-right valid_number" id="box_qty_<?php echo $sl?>" placeholder="0.00" min="0" readonly="" value="<?php echo $details['quantity']/$details['box_size']?>"/>
            <input type="hidden" id="u_box_<?php echo $sl?>" name="b_qty" value="<?php echo $details['box_size']?>"/>
        </td>
        <td class="invoice_fields">
            <input type="text" name="product_rate[]" id="price_item_<?php echo $sl?>" class="price_item<?php echo $sl?> price_item form-control text-right valid_number" tabindex="<?php echo $tabindex + 4;?>" required="" onkeyup="quantity_calculate_invoice(<?php echo $sl?>),checkqty_invoice(<?php echo $sl?>);" onchange="quantity_calculate_invoice(<?php echo $sl?>);" placeholder="0.00" min="0" value="<?php echo $details['rate']?>"/>
        </td>
        <!-- Discount -->
        <td>
            <input type="text" name="discount[]" onkeyup="quantity_calculate_invoice(<?php echo $sl?>),checkqty_invoice(<?php echo $sl?>);"  onchange="quantity_calculate_invoice(<?php echo $sl?>);" id="discount_<?php echo $sl?>" class="form-control text-right valid_number" min="0" tabindex="<?php echo $tabindex + 5;?>" placeholder="0.00" value="<?php echo $details['discount']?>"/>

            <input type="hidden" value="" name="discount_type" id="discount_type_<?php echo $sl?>">
        </td>


        <td class="invoice_fields">
            <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_<?php echo $sl?>" value="<?php echo $details['total_price']?>" readonly="readonly" />
        </td>

        <td>
               <?php $x=0;
     foreach($taxes as $taxfldt){
        $taxval='tax'.$x;
        ?>
            <input id="total_tax<?php echo $x;?>_<?php echo $sl?>" class="total_tax<?php echo $x;?>_<?php echo $sl?>" type="hidden" value="<?php echo $details[$taxval]?>">
            <input id="all_tax<?php echo $x;?>_<?php echo $sl?>" class="total_tax<?php echo $x;?>" type="hidden" name="tax[]">
           
            <!-- Tax calculate end-->

            <!-- Discount calculate start-->
           
            <?php $x++;} ?>
            <!-- Tax calculate end-->

            <!-- Discount calculate start-->
            <input type="hidden" id="total_discount_<?php echo $sl?>" class=""  value="<?php
            if($settings_info->discount_type == 1){
              echo (($details['discount']?$details['discount']:0)*($details['rate']?$details['rate']:0)*($details['quantity']?$details['quantity']:1))/100;
            }
            if($settings_info->discount_type == 2){
              echo (($details['discount']?$details['discount']:0)*($details['quantity']?$details['quantity']:1));
            }
             if($settings_info->discount_type == 3){
              echo ($details['discount']?$details['discount']:0);
            }
             ?>"/>
            
            <input type="hidden" id="all_discount_<?php echo $sl?>" class="total_discount dppr" value="<?php
            if($settings_info->discount_type == 1){
              echo (($details['discount']?$details['discount']:0)*($details['rate']?$details['rate']:0)*($details['quantity']?$details['quantity']:1))/100;
            }
            if($settings_info->discount_type == 2){
              echo (($details['discount']?$details['discount']:0)*($details['quantity']?$details['quantity']:1));
            }
             if($settings_info->discount_type == 3){
              echo ($details['discount']?$details['discount']:0);
            }
             ?>"/>
            <!-- Discount calculate end -->

          <button type="button" class="btn btn-danger-soft btn-sm" tabindex="<?php echo $tabindex + 6;?>" onclick="deleteRowinvoice(this)"><i class="far fa-trash-alt"></i></button>
        </td>
    </tr>
        <?php $sl++;}}?>
                                </tbody>
                       <tfoot>
                                    
                                    <tr>
                                        <td colspan="8" rowspan="2">
                                      
                                    </td>
                                        <td class="text-right" colspan="1"><b><?php echo lan('invoice_discount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="invdcount" class="form-control text-right valid_number" name="invoice_discount" onkeyup="calculateSumInvoice()" onchange="calculateSumInvoice()" placeholder="0.00" value="<?php echo $invoice->invoice_discount ?>" tabindex="<?php echo $tabindex + 8;?>"/>
                                            <input type="hidden" id="total_product_dis" value="<?php echo ($invoice->total_discount?$invoice->total_discount:0) - ($invoice->invoice_discount?$invoice->invoice_discount:0); ?>" >
                                           
                                        </td>
                                        <td> 
                                              <button  class="btn btn-info" type="button" onClick="addInputFieldInvoice('addinvoiceItem');" tabindex="<?php echo $tabindex + 7;?>" id="add_invoice_item"><i class="fa fa-plus"></i>
                                            </button>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="1"  class="text-right"><b><?php echo lan('total_discount') ?>:</b></td>
                                        <td class="text-right">
                                           <input type="text" id="total_discount_ammount" class="form-control text-right valid_number" name="total_discount" value="<?php echo $invoice->total_discount ?>" readonly="readonly" />
                                              
                                        </td>
                                    </tr>
                                    <?php
                                    $x=0;
                                     foreach($taxes as $taxfldt){?>
                                     <tr class="hideableRow hiddenRow collapse" id="collapseExample">
                                       
                                <td class="text-right" colspan="9"><b><?php echo $taxfldt['tax_name'] ?></b></td>
                                <td class="text-right">
                                    <input id="total_tax_amount<?php echo $x;?>" tabindex="-1" class="form-control text-right valid totalTax valid_number" name="total_tax<?php echo $x;?>" value="<?php $txval ='tax'.$x;
                                     echo $taxvalu[0][$txval]?>" readonly="readonly" aria-invalid="false" type="text">
                                </td>
                               
                               
                                 
                                </tr>
                                         <?php $x++;}?>
                                      
                              <tr>
                                         
                                        <td class="text-right" colspan="9"><b><?php echo lan('total_vat') ?>:</b></td>
                                        <td class="text-right">
                                            <input id="total_tax_amount" tabindex="-1" class="form-control text-right valid valid_number" name="total_tax" value="<?php echo $invoice->total_tax ?>" readonly="readonly" aria-invalid="false" type="text">
                                        </td>
                                         <td><a class="btn btn-warning taxbutton text-center"  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-double-up"></i></a></td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="9"  class="text-right"><b><?php echo lan('grand_total') ?>:</b></td>
                                        <td class="text-right">
                                            
                                             <input type="text" id="grandTotal" class="form-control text-right" name="grand_total_price" value="<?php echo $invoice->total_amount-$invoice->prevous_due ?>" readonly="readonly" />
                                           
                                        </td>
                                    </tr>
                                    <tr>
                                         <tr>
                                    <td colspan="9"  class="text-right"><b><?php echo lan('previous'); ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="previous" class="form-control text-right valid_number" name="previous" value="<?php echo $invoice->prevous_due ?>" readonly="readonly" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="9"  class="text-right"><b><?php echo lan('net_total'); ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="n_total" class="form-control text-right valid_number" name="n_total" value=" <?php echo $invoice->total_amount ?>" readonly="readonly" placeholder="" />
                                         <input type="hidden" id="txfieldnum" value="<?php echo count($taxes);?>"> 
                                    </td>
                                </tr>

                                        <td class="text-right" colspan="9"><b><?php echo lan('paid_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="paidAmount"
                                            onkeyup="calculateSumInvoice()" class="form-control text-right valid_number" name="paid_amount" placeholder="0.00" tabindex="<?php echo $tabindex + 9;?>" value="<?php echo $invoice->paid_amount ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <input type="button" id="full_paid_invoice_tab" class="btn btn-warning" value="<?php echo lan('full_paid') ?>" tabindex="<?php echo $tabindex + 10;?>" onClick="full_paid_invoice()"/>

                                            <input type="submit" id="add_invoice" class="btn btn-success" name="add-invoice" value="<?php echo lan('update') ?>" tabindex="<?php echo $tabindex + 11;?>"/>
                                        </td>

                                        <td class="text-right" colspan="8"><b><?php echo lan('due_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="dueAmmount" class="form-control text-right" name="due_amount" value="<?php echo $invoice->due_amount ?>" readonly="readonly"/>
                                        </td>
                                    </tr>
                                    <tr id="change_m"><td class="text-right" colspan="9" id="ch_l"><b><?php echo lan('change') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="change" class="form-control text-right" name="change" value="<?php  $change =$invoice->paid_amount - $invoice->total_amount;
                                            if($change > 0){
                                                echo $change;
                                            }else{
                                                echo 0;
                                            } ?>" readonly="readonly"/>
                                        </td></tr>
                                </tfoot>
                            </table>
                        </div>
                <?php echo form_close();?>
                    </div>
                    </div>
                    </div>
                    </div>
   