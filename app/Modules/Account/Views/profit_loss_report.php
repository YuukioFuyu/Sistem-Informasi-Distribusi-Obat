
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('profit_loss')?></h6>
                </div>
                <div class="text-right">
                  
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
          <?php echo  form_open_multipart('account/profit_loss_result','id="profit_loss_result"') ?>
                  
                 

                     <div class="form-group row">
                        <label for="from_date" class="col-sm-2 col-form-label"><?php echo lan('from_date')?></label>
                        <div class="col-sm-4">
                         <input type="text" name="dtpFromDate" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo lan('date') ?>" class="datepicker form-control" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="to_date" class="col-sm-2 col-form-label"><?php echo lan('to_date')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                         <input type="text"  name="dtpToDate" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo lan('date') ?>" class="datepicker form-control" required>
                        </div>
                    </div> 
                      
                      
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">

                                <input type="submit" id="add_receive" class="btn btn-success btn-large form-control" name="search" value="<?php echo lan('search') ?>" tabindex="9"/>
                               
                            </div>
                        </div>
                  <?php echo form_close() ?>
                    
                    </div>
                    </div>
                    </div>
           

                    </div>

        

