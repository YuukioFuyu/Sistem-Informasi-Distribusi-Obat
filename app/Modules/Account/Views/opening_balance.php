
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('opening_balance')?></h6>
                </div>
                <div class="text-right">
                  
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
             
            <?php echo  form_open_multipart('account/save_opening_balance','id="opening_form"') ?>
                     <div class="form-group row">
                        <label for="vo_no" class="col-sm-2 col-form-label"><?php echo lan('voucher_no')?></label>
                        <div class="col-sm-4">
                             <input type="text" name="txtVNo" id="txtVNo" value="<?php if(!empty($voucher_no[0]['voucher'])){
                               $vn = substr($voucher_no[0]['voucher'],3)+1;
                              echo $voucher_n = 'OP-'.$vn;
                             }else{
                               echo $voucher_n = 'OP-1';
                             } ?>" class="form-control" readonly>
                        </div>
                    </div> 
                     <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label"><?php echo lan('date')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                             <input type="text" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php  echo date('Y-m-d');?>" required>
                        </div>
                    </div> 
                   
                    <div class="form-group row">
                        <label for="account_head" class="col-sm-2 col-form-label"><?php
                            echo lan('account_head');
                            ?> <i class="text-danger">*</i></label>
                    <div class="col-sm-4">
                        <select name="headcode" class="form-control select2"  tabindex="3">
                    <option value="">Select One</option>
                    <?php foreach($headss as $acc_head){?>
                  <option value="<?php echo $acc_head->HeadCode;?>"><?php echo $acc_head->HeadName;?></option>
                    <?php }?>
                        </select>
                    </div>
                               
                    </div>
                      <div class="form-group row">
                        <label for="amount" class="col-sm-2 col-form-label"><?php echo lan('amount')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                             <input type="text" name="amount" id="amount" class="form-control valid_number"  value="" placeholder="0.00">
                        </div>
                    </div>

                       
                          
                        
                       <div class="form-group row">
                        <label for="txtRemarks" class="col-sm-2 col-form-label"><?php echo lan('remark')?></label>
                        <div class="col-sm-4">
                          <textarea  name="txtRemarks" id="txtRemarks" class="form-control"></textarea>
                        </div>
                    </div> 
                   
                       
                        <div class="form-group row">
                           <label for="txtRemarks" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-4">

                                <input type="submit" id="add_receive" class="btn btn-success btn-large form-control" name="save" value="<?php echo lan('save') ?>" tabindex="9"/>
                               
                            </div>
                        </div>
                  <?php echo form_close() ?>
                    
                    </div>
                    </div>
                    </div>
           

                    </div>
