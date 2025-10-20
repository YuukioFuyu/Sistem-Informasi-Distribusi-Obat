  <div class="row">


       <div class="col-md-12 col-lg-12">
     <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0 text-center"><?php echo lan('return_to_manufacturer')?></h6>
                </div>
                <div class="text-right">
                 
                </div>
            </div>
        </div>
    <div class="card-body">
        <?php echo form_open("return/save_manufacturer_return/", array('id' => 'return_invoice')) ?>
     <div class="row">
                                <div class="col-sm-6" id="payment_from_1">
                                    <div class="form-group row">
                                        <label for="product_name"
                                               class="col-sm-4 col-form-label"><?php echo lan('manufacturer_name') ?>
                                            <i class="text-danger"></i></label>
                                        <div class="col-sm-8">
                                            <input type="text" name="manufacturer_name" value="<?php echo $manufacturer_name?>"
                                                   class="form-control"
                                                   placeholder='<?php echo lan('manufacturer_name') ?>' required
                                                   id="manufacturer_name" tabindex="1" readonly="">

                                            <input type="hidden" class="customer_hidden_value" name="manufacturer_id"
                                                   value="<?php echo $manufacturer_id?>" id="SchoolHiddenId"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="product_name"
                                               class="col-sm-4 col-form-label"><?php echo lan('date') ?> <i
                                                    class="text-danger"></i></label>
                                        <div class="col-sm-8">
                                            <input type="text" tabindex="2" class="form-control" name="return_date"
                                                   value="<?php echo $date?>" required readonly=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
 <div class="table table-responsive">
 	  <table class="table table-bordered table-hover" id="purchase">
                                    <thead>
                                    <tr>
                                        <th class="text-center"><?php echo lan('medicine_name') ?> <i
                                                    class="text-danger"></i></th>
                                        <th class="text-center"><?php echo lan('purchase_qty') ?></th>
                                        <th class="text-center"><?php echo lan('stock') ?></th>
                                        <th class="text-center"><?php echo lan('ret_quantity') ?> <i
                                                    class="text-danger">*</i></th>
                                        <th class="text-center"><?php echo lan('purchase_price') ?> <i
                                                    class="text-danger"></i></th>

                                        
                                            <th class="text-center"><?php echo lan('deduction') ?></th>

                                        <th class="text-center"><?php echo lan('total') ?></th>
                                        <th class="text-center">
                                        	<nobr><?php echo lan('check_return') ?> <i
                                                    class="text-danger">*</i></nobr></th>
                                    </tr>
                                    </thead>
                                    <tbody id="addinvoiceItem">
                                    <?php
                                    $sl = 1;
                                    foreach ($purchase_all_data as $retdata) { ?>


                                        <tr>
                                            <td class="" width="200px">
                                                <input type="text" name="product_name"
                                                       value="<?php echo $retdata['product_name'] . '-' .$retdata['strength']; ?>"
                                                       class="form-control productSelection" required
                                                       placeholder='<?php echo lan('product_name') ?>'
                                                       id="product_names" tabindex="3" readonly="">

                                                <input type="hidden"
                                                       class="product_id_<?php echo $sl; ?> autocomplete_hidden_value"
                                                       value="<?php echo $retdata['product_id'] ?>"
                                                       id="product_id_<?php echo $sl; ?>"/>

                                                <input type="hidden" name="batch_id[]" id="batch_id_<?php echo $sl; ?>"
                                                       value="<?php echo $retdata['batch_id'] ?>">
                                            </td>
                                            <td>
                                                <input type="text" name="ret_qty[]" class="form-control text-right valid_number"
                                                        value="<?php
                                                 $this->db = db_connect();
                    $stockqty = $this->db->table('product_purchase_details')
                                        ->select('sum(quantity) as qty')
                                        ->where('product_id', $retdata['product_id'])
                                        ->where('purchase_id', $retdata['purchase_id'])
                                        ->get()
                                        ->getRow();

                                                echo $stockqty->qty; ?>" readonly=""/>
                                                <input type="hidden" name="expire_date[]"
                                                       id="expire_date_<?php echo $sl; ?>"
                                                       value="<?php echo $retdata['expeire_date'] ?>">
                                            </td>
                                            <td>
                                                <input type="text" name="stocks"
                                                       class="form-control text-right available_quantity_1" id="sold_qty_<?php echo $sl; ?>" value="<?php

                                $stockoutqty = $this->db->table('invoice_details')
                                ->select('sum(quantity) as sell')
                                ->where('product_id', $retdata['product_id'])
                                ->where('batch_id',$retdata['batch_id'])
                                ->get()
                                ->getRow();

                                                echo $stockqty->qty - $stockoutqty->sell; ?>" readonly=""/>
                                            </td>
                                            <td>
                                                <input type="text"
                                                       onkeyup="quantity_calculate_mreturn(<?php echo $sl; ?>),checkrequird_mreturn(<?php echo $sl; ?>),checkqty_mreturn(<?php echo $sl; ?>);"
                                                       onchange="quantity_calculate_mreturn(<?php echo $sl; ?>);"
                                                       class="total_qntt_<?php echo $sl; ?> form-control text-right valid_number"
                                                       id="total_qntt_<?php echo $sl; ?>" min="0" placeholder="0.00"
                                                       tabindex="4"/>
                                            </td>

                                            <td>
                                                <input type="text" onkeyup="quantity_calculate_mreturn(<?php echo $sl; ?>);"
                                                       onchange="quantity_calculate_mreturn(<?php echo $sl; ?>);"
                                                       value="<?php echo $retdata['rate']; ?>"
                                                       id="price_item_<?php echo $sl; ?>"
                                                       class="price_item<?php echo $sl; ?> form-control text-right valid_number"
                                                       min="0" tabindex="5" required="" placeholder="0.00" readonly=""/>
                                            </td>
                                            <!-- Discount -->
                                            <td>
                                                <input type="text" onkeyup="quantity_calculate_mreturn(<?php echo $sl; ?>);"
                                                       onchange="quantity_calculate_mreturn(<?php echo $sl; ?>);"
                                                       id="discount_<?php echo $sl; ?>" class="form-control text-right valid_number"
                                                       placeholder="0.00" value="" min="0" tabindex="6"/>

                                            </td>

                                            <td>
                                                <input class="total_price form-control text-right" type="text"
                                                       id="total_price_<?php echo $sl; ?>" value=""
                                                       readonly="readonly"/>

                                                <input type="hidden" name="purchase_detail_id[]" id="purchase_detail_id"
                                                       value="<?php echo $retdata['id']; ?>"/>
                                            </td>
                                            <td>


                                                <!-- Discount calculate start-->
                                                <input type="hidden" id="total_discount_<?php echo $sl; ?>" class=""
                                                       value=""/>

                                                <input type="hidden" id="all_discount_<?php echo $sl; ?>"
                                                       class="total_discount" value=""/>
                                                <!-- Discount calculate end -->


                                                <input type="checkbox" name='rtn[]'
                                                       onclick="manufacturer_checkbox(<?php echo $sl; ?>)"
                                                       id="check_id_<?php echo $sl; ?>" value="<?php echo $sl; ?>"
                                                       class="form-control">


                                            </td>
                                        </tr>

                                        <?php $sl++;
                                    }
                                    ?>
                                    </tbody>

                                    <tfoot>

                                    <tr>
                                        <td colspan="5" rowspan="2">
                                            <center><label class="text-center" for="details"
                                                           class="  col-form-label"><?php echo lan('reason') ?></label>
                                            </center>
                                            <textarea class="form-control" name="details" id="details"
                                                      placeholder="<?php echo lan('reason') ?>"></textarea> <br>
                                            <input type="radio" checked="checked" name="radio" value="2">
                                            <label class="ab"><?php echo lan('return_to_manufacturer') ?>
                                            </label><br>

                                            <input type="radio" name="radio" value="3">
                                            <label class="ab"><?php echo lan('wastage') ?>
                                            </label>

                                        </td>
                                        <td class="text-right" colspan="1">
                                            <b><?php echo lan('to_deduction') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="total_discount_ammount"
                                                   class="form-control text-right valid_number" name="total_discount" value=""
                                                   readonly="readonly"/>
                                        </td>
                                    </tr>

                                    <tr>

                                        <td colspan="1" class="text-right"><b><?php echo lan('nt_return') ?>
                                                :</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="form-control text-right valid_number"
                                                   name="grand_total_price" value="" readonly="readonly"/>
                                        </td>
                                        <input type="hidden" name="baseUrl" class="baseUrl"
                                               value="<?php echo base_url(); ?>"/>
                                        <input type="hidden" name="purchase_id" id="purchase_id" value="<?php echo $purchase_id;?>"/>

                                    </tr>


                                    </tfoot>
                                </table>
 </div>
  <div class="form-group row">
                                <label for="example-text-input" class=" col-form-label"></label>
                                <div class="col-sm-12 text-right">

                                    <input type="submit" id="add_invoice" class="btn btn-success btn-large"
                                           name="pretid" value="<?php echo lan('return') ?>" tabindex="9"/>

                                </div>
                            </div>
                    <?php echo form_close();?>
                    </div>
                    </div>
                    </div>
                    </div>
    <script>
     function manufacturer_checkbox(sl){
        var check_id    ='check_id_'+sl;
        var total_qntt  ='total_qntt_'+sl;
        var product_id  ='product_id_'+sl;
        var total_price ='total_price_'+sl;
        var discount  ='discount_'+sl;
        var price_item  ='price_item_'+sl;

        if($('#'+check_id).prop("checked") == true){
            document.getElementById(total_qntt).setAttribute("required","required");
            document.getElementById(product_id).setAttribute("name","product_id[]");
            document.getElementById(total_qntt).setAttribute("name","product_quantity[]");
            document.getElementById(total_price).setAttribute("name","total_price[]");
            document.getElementById(discount).setAttribute("name","discount[]");
            document.getElementById(price_item).setAttribute("name","product_rate[]");
        }
        else if($('#'+check_id).prop("checked") == false){
            document.getElementById(total_qntt).removeAttribute("required");
            document.getElementById(product_id).removeAttribute("name");
            document.getElementById(total_qntt).removeAttribute("name");
            document.getElementById(total_price).removeAttribute("name");
            document.getElementById(discount).removeAttribute("name");
            document.getElementById(total_qntt).removeAttribute("name");
            document.getElementById(price_item).removeAttribute("name");
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

   