<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_invoice')?></h6>
                                </div>
                                <div class="text-right">
                                     <?php if($permission->method('service_invoice_list','read')->access()){?>
                                   <a href="<?php echo base_url('service/service_invoice_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('invoice_list')?></a>
                                 <?php }?>
                                </div>
                            </div>
                        </div>
            <div class="card-body">
       <?php echo form_open_multipart("service/service_invoice_form/", array('id' => 'manual_service_insert')) ?>
                    <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="customer_name" class="col-sm-4 col-form-label"><?php
                                echo lan('customer_name').'/'.lan('phone');
                                ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                 <input type="text" name="customer_name" id="customer_name" class="form-control" value="" onkeyup="CustomerList()" required="" autocomplete="off">
                           <input type="hidden" name="customer_id" id="customer_id" class="form-control" value=""></div>
                        
                          
                       
                        </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group row">
                             <label for="employee" class="col-sm-4 col-form-label"><?php
                                echo lan('employee');
                                ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                     <?php echo form_dropdown('employee_id[]',$employee_list,null,'class="form-control select2" id="employee_id" required multiple') ?>
                                </div>
                        </div>
                    </div>

                   
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label"><?php echo lan('hanging_over') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <?php
                       
                                $date = date('Y-m-d');
                                ?>
                                <input class="datepicker form-control" type="text" size="50" name="invoice_date" id="date" required value="<?php echo $date; ?>" tabindex="6" />
                            </div>
                        </div>
                    </div>

                     <div class="col-sm-6">
                        <div class="form-group row">
                             <label for="details" class="col-sm-4 col-form-label"><?php
                                echo lan('details');
                                ?> <i class="text-danger"></i></label>
                                <div class="col-sm-8">
                                    <textarea name="inva_details" class="form-control" placeholder="<?php echo lan('invoice_details') ?>"></textarea>
                   </div>
                        </div>
                    </div>
                </div>
                   <div class="form-group row">
                    <label for="payment_type" class="col-md-2 text-right col-form-label"><?php echo lan('payment_type')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                       <select name="payment_type" id="payment_type" onchange="bank_payment(this.value)" class="form-control select2">
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
                    <table class="table table-bordered table-hover" id="serviceInvoice">
                        <thead>
                            <tr>
                                <th class="text-center product_field"><?php echo lan('service_name') ?> <i class="text-danger">*</i></th>
                                <th class="text-center"><?php echo lan('quantity') ?> <i class="text-danger">*</i></th>
                                <th class="text-center invoice_fields" ><?php echo lan('charge') ?> <i class="text-danger">*</i></th>

                                <?php if ($settings_info->discount_type == 1) { ?>
                                    <th class="text-center"><?php echo lan('discount_percentage') ?> %</th>
                                <?php } elseif ($settings_info->discount_type == 2) { ?>
                                    <th class="text-center"><?php echo lan('discount') ?> </th>
                                <?php } elseif ($settings_info->discount_type == 3) { ?>
                                    <th class="text-center"><?php echo lan('fixed_dis') ?> </th>
                                <?php } ?>

                                <th class="text-center"><?php echo lan('total') ?> 
                                </th>
                                <th class="text-center"><?php echo lan('action') ?></th>
                            </tr>
                        </thead>
                        <tbody id="addService">
                            <tr>
                                <td class="product_field">
                                    <input type="text" name="service_name" onkeypress="service_productList(1);" class="form-control serviceSelection" placeholder='<?php echo lan('service_name') ?>' required="" id="service_name_1" tabindex="7">

                                    <input type="hidden" class="autocomplete_hidden_value service_id_1" name="service_id[]" id="SchoolHiddenId"/>

                                 
                                </td>

                                <td>
                                    <input type="text" name="product_quantity[]" onkeyup="service_calculation(1);" onchange="service_calculation(1);" class="total_qntt_1 form-control text-right valid_number" id="total_qntt_1" placeholder="0.00" min="0" tabindex="8" required="required"/>
                                </td>
                                <td class="invoice_fields">
                                    <input type="text" name="product_rate[]" id="price_item_1" class="price_item1 price_item form-control text-right valid_number" tabindex="9" required="" onkeyup="service_calculation(1);" onchange="service_calculation(1);" placeholder="0.00" min="0" />
                                </td>
                                <!-- Discount -->
                                <td>
                                    <input type="text" name="discount[]" onkeyup="service_calculation(1);"  onchange="service_calculation(1);" id="discount_1" class="form-control text-right valid_number" min="0" tabindex="10" placeholder="0.00"/>
                                    <input type="hidden" value="<?php echo $settings_info->discount_type?>" name="discount_type" id="discount_type_1">
                                </td>


                                <td class="invoice_fields">
                                    <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" />
                                </td>

                                <td>
                                    <!-- Tax calculate start-->
                              <?php $x=0;
                             foreach($taxes as $taxfldt){?>
                                    <input id="total_tax<?php echo $x;?>_1" class="total_tax<?php echo $x;?>_1" type="hidden">
                                    <input id="all_tax<?php echo $x;?>_1" class="total_tax<?php echo $x;?>" type="hidden" name="tax[]">
                                    <!-- Tax calculate end-->
                                    <!-- Discount calculate start-->
                                    <?php $x++;} ?>
                                    <!-- Tax calculate end-->
                                    <!-- Discount calculate start-->
                                    <input type="hidden" id="total_discount_1" class="" />
                                    <input type="hidden" id="all_discount_1" class="total_discount" name="discount_amount[]" />
                                 
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>

                          <tr><td colspan="3" rowspan="2">
                       </td>
                        <td class="text-right" colspan="1"><b><?php echo lan('invoice_discount') ?>:</b></td>
                        <td class="text-right">
                          <input type="text" onkeyup="service_calculation(1);"  onchange="service_calculation(1);" id="invoice_discount" class="form-control text-right valid_number" name="invoice_discount" placeholder="0.00"  />
                          <input type="hidden" id="txfieldnum" value="<?php echo count($taxes);?>"> 
                        </td>
                        <td><button type="button" id="add_service_item" class="btn btn-info" name="add-invoice-item"  onClick="add_serviceField('addService');" ><i class='fa fa-plus'></i></button>
                            <input type="hidden" name="" id="discount_type" value="<?php echo $settings_info->discount_type?>">
                        </td>
                        </tr>

             
                        <tr>
                            
                            <td class="text-right" colspan="1"><b><?php echo lan('total_discount') ?>:</b></td>
                            <td class="text-right">
                                <input type="text" id="total_discount_ammount" class="form-control text-right valid_number" name="total_discount" value="0.00" readonly="readonly" />
                            </td>
                              <td></td>
                        </tr>                     
                            <?php $x=0;
                             foreach($taxes as $taxfldt){?>
                            <tr class="form-group hiddenRow mb-1 collapse" id="collapseExample">
                               
                        <td class="text-right" colspan="4"><b><?php echo $taxfldt['tax_name'] ?></b></td>
                        <td class="text-right">
                            <input id="total_tax_ammount<?php echo $x;?>" tabindex="-1" class="form-control text-right valid totalTax valid_number" name="total_tax<?php echo $x;?>" value="0.00" readonly="readonly" aria-invalid="false" type="text">
                        </td>
                       
                       <td></td>
                         
                        </tr>
                    <?php $x++;}?>
                         
            <tr>
                            <td colspan="3"></td>
                            <td class="text-right" colspan="1"><b><?php echo lan('total_tax') ?>:</b></td>
                            <td class="text-right">
                                <input type="text" id="total_tax_amount" class="form-control text-right valid_number" name="total_tax_amount" value="0.00" readonly="readonly" />
                            </td>
                            <td><button type="button" class="toggle btn-warning collapse-btn" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        <i class="fa fa-angle-double-down rotate-icon"></i>
       </button></td>
                        </tr>                

                         <tr>
                            <td class="text-right" colspan="4"><b><?php echo lan('shipping_cost') ?>:</b></td>
                            <td class="text-right">
                                <input type="text" id="shipping_cost" class="form-control text-right valid_number" name="shipping_cost" onkeyup="service_calculation(1);"  onchange="service_calculation(1);"  placeholder="0.00"  />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"  class="text-right"><b><?php echo lan('grand_total') ?>:</b></td>
                            <td class="text-right">
                                <input type="text" id="grandTotal" class="form-control text-right" name="grand_total_price" value="0.00" readonly="readonly" />
                            </td>
                        </tr>
                         <tr>
                            <td colspan="4"  class="text-right"><b><?php echo lan('previous'); ?>:</b></td>
                            <td class="text-right">
                                <input type="text" id="previous" class="form-control text-right valid_number" name="previous" value="0.00" readonly="readonly" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"  class="text-right"><b><?php echo lan('net_total'); ?>:</b></td>
                            <td class="text-right">
                                <input type="text" id="n_total" class="form-control text-right valid_number" name="n_total" value="0" readonly="readonly" placeholder="" />
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                               

                                <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>"/>
                            </td>
                            <td class="text-right" colspan="3"><b><?php echo lan('paid_amount') ?>:</b></td>
                            <td class="text-right">
                                <input type="text" id="paidAmount" 
                                       onkeyup="service_paidamount();" class="form-control text-right valid_number" name="paid_amount" placeholder="0.00" tabindex="13" value=""/>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <input type="button" id="service_full_paid_tab" class="btn btn-warning" value="<?php echo lan('full_paid') ?>" tabindex="14" onClick="service_full_paid()"/>

                                <input type="submit" id="add_service" class="btn btn-success" name="add-invoice" value="<?php echo lan('save') ?>" tabindex="15"/>
                            </td>

                            <td class="text-right" colspan="3"><b><?php echo lan('due_amount') ?>:</b></td>
                            <td class="text-right">
                                <input type="text" id="dueAmmount" class="form-control text-right" name="due_amount" value="0.00" readonly="readonly"/>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <?php echo form_close()?>
            </div> 
        </div>
    </div>
</div>

  
