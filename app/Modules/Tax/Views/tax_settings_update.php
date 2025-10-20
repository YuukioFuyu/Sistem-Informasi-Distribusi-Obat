<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card ">
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
 <?php echo form_open_multipart("tax/update_taxs/") ?>     
                        
                      <div class="form-group row">
                            <label for="number_of_tax" class="col-sm-2 col-form-label"><?php echo lan('number_of_tax') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="nt" id="number_of_tax" required="" placeholder="<?php echo lan('number_of_tax') ?>" onkeyup="add_columnTaxsettings(this.value)" value="<?php echo $setinfo[0]['nt'];?>"/>
                                <input type="hidden" name="id" value="<?php echo $setinfo[0]['id'];?>">
                            </div>
                        </div>
                         
                        <span id="taxfield" class="form-group row">
                            <?php  
                        $i=1;
                        foreach ($setinfo as $taxss) {?>
                          <div class="form-group row"><label for="fieldname" class="col-sm-2 col-form-label">Tax Name <?php echo $i;?>*</label><div class="col-sm-2"><input type="text" class="form-control" name="taxfield[]" required="" value="<?php echo esc($taxss['tax_name']);?>"></div>
                          <label for="default_value" class="col-sm-1 col-form-label"><?php echo lan('default_value') ?><span class="text-danger">(%)</span></label><div class="col-sm-2"><input type="text" class="form-control valid_number" name="default_value[]" value="<?php echo esc($taxss['default_value']);?>" id="default_value"  placeholder="<?php echo lan('default_value') ?>" /></div><label for="reg" class="col-sm-1 col-form-label"><?php echo lan('reg_no'); ?></label>
                          <div class="col-sm-2"><input type="text" class="form-control" name="reg_no[]" value="<?php echo esc($taxss['reg_no']);?>" id="reg_no"  placeholder="<?php echo lan('reg_no') ?>" /></div>
                          <div class="col-sm-1"><input type="checkbox" name="is_show" class="form-control" value="1" <?php if($taxss['is_show']==1){echo 'checked';}?>></div><label for="isshow" class="col-sm-1 col-form-label"><?php echo 'Is Show'; ?></label>
                      </div>  
                      <?php $i++;}?>
                        </span>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit" id="add-settings" class="btn btn-success" name="add-settings" value="<?php echo lan('save') ?>" />
                            </div>
                        </div>
                        <div class="row text-center">
                           <h3> <span class="text-danger">If you Update tax settings ,All of your previous tax record will be destroy.You Will Need to set tax product wise and Service wise</span></h3>
                        </div>

                        <?php echo form_close()?>
            </div> 
        </div>
    </div>
</div>

