  
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('tax_settings')?></h6>
                </div>
                <div class="text-right">
                   
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php echo form_open_multipart("tax/save_tax_setting/") ?>            
               
                      <div class="form-group row">
                            <label for="number_of_tax" class="col-sm-2 col-form-label"><?php echo lan('number_of_tax') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control valid_number" name="nt" id="number_of_tax" required="" placeholder="<?php echo lan('number_of_tax') ?>" onkeyup="add_columnTaxsettings(this.value)" />
                            </div>
                        </div>
                        <span id="taxfield" class="form-group row"></span>

                       

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit" id="add-settings" class="btn btn-success" name="add-settings" value="<?php echo lan('save') ?>" />
                            </div>
                        </div>

                <?php echo form_close();?>
                    </div>
                    </div>
                    </div>
                    </div>
                      


