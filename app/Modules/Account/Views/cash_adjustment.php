
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('cash_adjustment')?></h6>
                </div>
                <div class="text-right">
                  
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
          <?php echo  form_open_multipart('account/save_cash_adjustment','id="cash_adjustment"') ?>
                     <div class="form-group row">
                        <label for="vo_no" class="col-sm-2 col-form-label"><?php echo lan('voucher_no')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                             <input type="text" name="txtVNo" id="txtVNo" value="<?php if(!empty($voucher_no[0]['voucher'])){
                               $vn = substr($voucher_no[0]['voucher'],4)+1;
                              echo $voucher_n = 'CHV-'.$vn;
                             }else{
                               echo $voucher_n = 'CHV-1';
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
                        <label for="amount" class="col-sm-2 col-form-label"><?php echo lan('amount')?></label>
                        <div class="col-sm-4">
                        <input type="text" name="txtAmount" value="" class="form-control total_price text-right valid_number"  id="txtAmount_1" required>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label"><?php echo lan('adjustment_type')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                         <select name="type" class="form-control select2" required="">
                           <option value="1"><?php echo lan('debit')?></option>
                           <option value="2"><?php echo lan('credit')?></option>
                         </select>
                         <input type="hidden" name="txtCode" value="1020101" class="form-control "  id="txtCode" readonly="">
                        </div>
                    </div> 
                       <div class="form-group row">
                        <label for="txtRemarks" class="col-sm-2 col-form-label"><?php echo lan('remark')?></label>
                        <div class="col-sm-4">
                          <textarea  name="txtRemarks" id="txtRemarks" class="form-control"></textarea>
                        </div>
                    </div> 
                   
                      
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">

                                <input type="submit" id="add_receive" class="btn btn-success btn-large form-control" name="save" value="<?php echo lan('save') ?>" tabindex="9"/>
                               
                            </div>
                        </div>
                  <?php echo form_close() ?>
                    
                    </div>
                    </div>
                    </div>
           

                    </div>
                      
