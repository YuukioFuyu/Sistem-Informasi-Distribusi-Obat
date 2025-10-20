  <div class="row">
    <div class="col-md-6 col-lg-6">
     <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-center">
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('return_from_customer')?></h6>
                </div>
              
            </div>
        </div>
    <div class="card-body">
         <?php echo form_open("return/return_invoice_form/", array('id' => 'return_invoice')) ?>
    <div class="form-group row">
                        <label for="invoice_no" class="col-sm-3 col-form-label"><b><?php echo lan('invoice_no'); ?> <i class="text-danger">*</i></b></label>
                        <div class="col-sm-6">
                            <input name="invoice_no" class="form-control" type="text" placeholder="<?php echo lan('invoice_no'); ?>" id="invoice_no" value="">
                        </div>
                         <div class="col-sm-3">
                           <button type="submit" class="btn btn-success"><?php echo lan('search')?></button>
                        </div>
                    </div> 
                    <?php echo form_close()?>
                    </div>
                    </div>
                    </div>

                        <div class="col-md-6 col-lg-6">
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
        <?php echo form_open("return/manufacturer_return_form/", array('id' => 'return_invoice')) ?>
    
        <div class="form-group row">
                        <label for="purchase_id" class="col-sm-3 col-form-label"><b><?php echo lan('purchase_id'); ?> <i class="text-danger">*</i></b></label>
                        <div class="col-sm-6">
                            <input name="purchase_id" class="form-control" type="text" placeholder="<?php echo lan('purchase_id'); ?>" id="invoice_no" value="">
                        </div>
                         <div class="col-sm-3">
                           <button type="submit" class="btn btn-success"><?php echo lan('search')?></button>
                        </div>
                    </div>
                    <?php echo form_close();?>
                    </div>
                    </div>
                    </div>
                    </div>

                      

                 