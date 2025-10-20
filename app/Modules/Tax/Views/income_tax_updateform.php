<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('update_income_tax')?></h6>
                                </div>
                                <div class="text-right">
                                 
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">
 <?php echo form_open_multipart("tax/update_income_tax/") ?>     
      <input name="tax_setup_id" type="hidden" value="<?php echo $data[0]['id'] ?>">
                 
                         <div class="form-group row">
                            <label for="start_amount" class="col-sm-3 col-form-label"><?php echo lan('start_amount') ?><span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="start_amount" class="form-control valid_number" id="start_amount" value="<?php echo $data[0]['start_amount']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_amount" class="col-sm-3 col-form-label"><?php echo lan('end_amount') ?> <span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="end_amount" class="form-control valid_number" id="end_amount" value="<?php echo $data[0]['end_amount']?>">
                            </div>
                        </div> 

                       <div class="form-group row">
                            <label for="rate" class="col-sm-3 col-form-label"><?php echo lan('tax_rate') ?> <span class="text-danger"> *</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="rate" class="form-control valid_number" id="rate" value="<?php echo $data[0]['rate']?>">
                            </div>
                        </div> 
                         
                        


                        <div class="form-group text-right">
                            
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo lan('update') ?></button>
                        </div>
  <?php echo form_close()?>
            </div> 
        </div>
    </div>
</div>

 