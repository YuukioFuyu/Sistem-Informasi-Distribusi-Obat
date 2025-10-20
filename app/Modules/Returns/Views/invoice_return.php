
  <div class="row">
    <div class="col-md-12 col-lg-12">
     <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center">
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('return_invoice')?></h6>
                </div>
              
            </div>
        </div>
    <div class="card-body">
         <?php echo form_open("return/save_invoice_return/", array('id' => 'return_invoice')) ?>

   <div class="row">
                            <div class="col-sm-6" id="payment_from_1">
                                <div class="form-group row">
                                    <label for="product_name" class="col-sm-4 col-form-label"><?php echo lan('customer_name') ?> <i class="text-danger"></i></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="customer_name" value="<?php echo $invoice_data[0]['customer_name']?>" class="form-control customerSelection" placeholder='<?php echo lan('customer_name') ?>' required id="customer_name" tabindex="1" readonly="">

                                        <input type="hidden" class="customer_hidden_value" name="customer_id" value="<?php echo $invoice_data[0]['customer_id']?>" id="SchoolHiddenId"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="product_name" class="col-sm-4 col-form-label"><?php echo lan('date') ?> <i class="text-danger"></i></label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="2" class="form-control" name="invoice_date" value="<?php echo $invoice_data[0]['date']?>"  required readonly="" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center"><nobr><?php echo lan('medicine_information') ?> <i class="text-danger"></i></nobr></th>
                                        <th class="text-center"><?php echo lan('sold_qty') ?></th>
                                        <th class="text-center"><?php echo lan('ret_quantity') ?>  <i class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo lan('price') ?> <i class="text-danger"></i></th>
                                        <th class="text-center"><?php echo lan('deduction') ?> %</th>
                                        <th class="text-center"><?php echo lan('total') ?></th>
                                        <th class="text-center"><nobr><?php echo lan('check_return') ?> <i class="text-danger">*</i></nobr></th>
                                    </tr>
                                </thead>
                                <tbody id="addinvoiceItem" class="skin-square">
                                    
                                    <?php 
                                    $sl = 1;
                                  
                                    foreach($invoice_data as $details){?>
                                    <tr>
                                        <td class="product_field">
                                            <input type="text" name="product_name" onclick="invoice_productList(<?php echo $sl?>);" value="<?php echo $details['product_name']?>-(<?php echo $details['strength']?>)" class="form-control productSelection" required placeholder='<?php echo lan('product_name') ?>' id="product_names" tabindex="3" readonly="">

                                            <input type="hidden" class="product_id_<?php echo $sl?> autocomplete_hidden_value"  value="<?php echo $details['product_id']?>" id="product_id_<?php echo $sl?>"/>
                                            <input type="hidden" name="batch_id[]" value="<?php echo $details['batch_id']?>">
                                        </td>
                                        <td>
                                            <input type="text" name="sold_qty[]" id="sold_qty_<?php echo $sl?>" class="form-control text-right available_quantity_1" value="<?php echo $details['sum_quantity']?>" readonly="" />
                                        </td>
                                        <td>
                                            <input type="text"  onkeyup="quantity_calculate_invoicereturn(<?php echo $sl?>);" onchange="quantity_calculate_invoicereturn(<?php echo $sl?>);"  class="total_qntt_<?php echo $sl?> form-control text-right valid_number" id="total_qntt_<?php echo $sl?>" min="0" placeholder="0.00" tabindex="4" />
                                        </td>

                                        <td>
                                            <input type="text" name="product_rate[]" onkeyup="quantity_calculate_invoicereturn(<?php echo $sl?>);" onchange="quantity_calculate_invoicereturn(<?php echo $sl?>);" value="<?php echo $details['rate']?>" id="price_item_<?php echo $sl?>" class="price_item<?php echo $sl?> form-control text-right valid_number" min="0" tabindex="5" required="" placeholder="0.00" readonly=""/>
                                        </td>
                                        <!-- Discount -->
                                        <td>
                                            <input type="text"  onkeyup="quantity_calculate_invoicereturn(<?php echo $sl?>);"  onchange="quantity_calculate_invoicereturn(<?php echo $sl?>);" id="discount_<?php echo $sl?>" class="form-control text-right valid_number" placeholder="0.00" value="" min="0" tabindex="6"/>

                                            <input type="hidden" value="<?php ?>" name="discount_type" id="discount_type_<?php echo $sl?>">
                                        </td>

                                        <td>
                                            <input class="total_price form-control text-right valid_number" type="text"  id="total_price_<?php echo $sl?>" value="" readonly="readonly" />

                                            <input type="hidden" name="invoice_details_id[]" id="invoice_details_id" value=""/>
                                        </td>
                                        <td>

                                            <!-- Tax calculate start-->
                                            <input id="total_tax_<?php echo $sl?>" class="total_tax_<?php echo $sl?>" type="hidden" value="{tax}">
                                            <input id="all_tax_<?php echo $sl?>" class="total_tax" type="hidden" value="0" name="tax[]">
                                            <!-- Tax calculate end-->

                                            <!-- Discount calculate start-->
                                            <input type="hidden" id="total_discount_<?php echo $sl?>" class="" value=""/>

                                            <input type="hidden" id="all_discount_<?php echo $sl?>" class="total_discount" value="" />
                                            <!-- Discount calculate end -->
                                       
                                                 
                                             <input type="checkbox" name='rtn[]'
                                                       onclick="checkboxcheck_invoiceReturn(<?php echo $sl; ?>)"
                                                       id="check_id_<?php echo $sl; ?>" value="<?php echo $sl; ?>"
                                                       class="form-control">

                                                     
                                                   
                                        </td>
                                    </tr>
                                    <?php $sl++;}?>
                                </tbody>

                                <tfoot>

                                    <tr>
                                        <td colspan="4" rowspan="3">
                                <center><label  for="details" class="  col-form-label text-center"><?php echo lan('reason') ?></label></center>
                                <textarea class="form-control" name="details" id="details" placeholder="<?php echo lan('reason') ?>"></textarea> <br>
                                <span class="usablity"><?php echo lan('usablilties') ?> </span><br>
                                <label class="ab"><?php echo lan('adjs_with_stck') ?>
                                    <input type="radio" checked="checked" name="radio" value="1">
                                    <span class="checkmark"></span>
                                </label><br>

                               
                                <label class="ab"><?php echo lan('wastage') ?>
                                    <input type="radio"  name="radio" value="3">
                                    <span class="checkmark"></span>
                                </label>

                                </td>
                                <td class="text-right" colspan="1"><b><?php echo lan('total_deduction') ?>:</b></td>
                                <td class="text-right">
                                    <input type="text" id="total_discount_ammount" class="form-control text-right valid_number" name="total_discount" value="" readonly="readonly" />
                                </td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="1" ><b><?php echo lan('total_tax') ?>:</b></td>
                                    <td class="text-right">
                                        <input id="total_tax_ammount" tabindex="-1" class="form-control text-right valid valid_number" name="total_tax" value="<?php echo $invoice_data[0]['total_tax']?>" readonly="readonly" aria-invalid="false" type="text">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="1"  class="text-right"><b><?php echo lan('nt_return') ?>:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="grandTotal" class="form-control text-right valid_number" name="grand_total_price" value="" readonly="readonly" />
                                    </td>
                                <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url(); ?>"/>
                                <input type="hidden" name="invoice_id" id="invoice_id" value="<?php echo $invoice_data[0]['invoice_id']?>"/>
                                </tr>


                                </tfoot>
                            </table>
                        </div>
                        <div class="form-group row">
                            <label for="example-text-input" class=" col-form-label"></label>
                            <div class="col-sm-12 text-right">


                                <input type="submit" id="add_invoice" class="btn btn-success btn-large" name="add-invoice" value="<?php echo lan('return') ?>" tabindex="9"/>

                            </div>
                        </div>
                    <?php echo form_close()?>
                    </div>
                    </div>
                    </div>
                </div>
                
                <script>

        

         "use strict";
 function checkboxcheck_invoiceReturn(sl) {

        var check_id    = 'check_id_' + sl;
        var total_qntt  = 'total_qntt_' + sl;
        var product_id  = 'product_id_' + sl;
        var total_price = 'total_price_' + sl;
        var discount    = 'discount_' + sl;
        var checkval    = $('#'+check_id).val();
        

        if ($('#' + check_id).prop("checked") == false) {
                  
            document.getElementById(total_qntt).removeAttribute("required");
            document.getElementById(product_id).removeAttribute("name", "");
            document.getElementById(total_qntt).removeAttribute("name", "");
            document.getElementById(total_price).setAttribute("name", "total_price[]");
            document.getElementById(discount).setAttribute("name", ""); 
        } else if ($('#' + check_id).prop("checked") == true) {
           document.getElementById(total_qntt).setAttribute("required", "required");
           document.getElementById(product_id).setAttribute("name", "product_id[]");
           document.getElementById(total_qntt).setAttribute("name", "product_quantity[]");
           document.getElementById(total_price).setAttribute("name", "total_price[]");
           document.getElementById(discount).setAttribute("name", "discount[]");
        }
    }


      $(document).ready(function () {
            "use strict";
        $('input[type=checkbox]').each(function () {
            if (this.nextSibling.nodeName != 'label') {
                $(this).after('<label for="' + this.id + '"></label>')
            }
        })


    $('#add_invoice').prop("disabled", true);
    $('input:checkbox').click(function () {
        if ($(this).is(':checked')) {
            $('#add_invoice').prop("disabled", false);
        } else {
            if ($('.chk').filter(':checked').length < 1) {
                $('#add_invoice').attr('disabled', true);
            }
        }
    });
    })
                </script>
