  
        <div class="row">
             <div class="col-md-12 col-lg-12">
            <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_currency')?></h6>
                </div>
                <div class="text-right">
                    <?php if($permission->method('currency','read')->access()){?> 
                   <a href="<?php echo base_url('currency/currency_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('currency_list')?></a>
               <?php }?>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php echo form_open_multipart("currency/add_currency/".$currency->id) ?>            
                <?php echo form_hidden('id',$currency->id) ?>
                <div class="form-group row">
                        <label for="currency_name" class="col-sm-3 col-form-label"><?php echo lan('currency_name'); ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-3">
                            <input name="currency_name" class="form-control" type="text" placeholder="<?php echo lan('currency_name'); ?>" id="currency_name" value="<?php echo $currency->currency_name;?>">
                        </div>
                    </div> 

                 <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label"><?php echo lan('icon'); ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-3">
                            <input name="icon" class="form-control" type="text" placeholder="<?php echo lan('icon'); ?>" id="icon" value="<?php echo $currency->icon;?>">
                        </div>
                    </div>
                     <div class="form-group row">
                 
                     <div class="col-md-6 text-right">
                        <div class="">
                           
                            <button type="submit"  class="btn btn-success">
                                <?php echo (empty($currency->id)?lan('save'):lan('update')) ?></button>

                        </div>
                       
                    </div>
                </div>

                <?php echo form_close();?>
                    </div>
                    </div>
                </div>
                    </div>
                      

                 