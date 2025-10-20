
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('manufaturer_payment')?></h6>
                </div>
                <div class="text-right">
                  
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
      <?php echo  form_open_multipart('account/save_manufacturer_payment','id="manufacturer_payment"') ?>
                     <div class="form-group row">
                        <label for="vo_no" class="col-sm-2 col-form-label"><?php echo lan('voucher_no')?></label>
                        <div class="col-sm-4">
                             <input type="text" name="txtVNo" id="txtVNo" value="<?php if(!empty($voucher_no[0]['voucher'])){
                               $vn = substr($voucher_no[0]['voucher'],3)+1;
                              echo $voucher_n = 'PM-'.$vn;
                             }else{
                               echo $voucher_n = 'PM-1';
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
                                    <label for="manufacturer" class="col-sm-2 col-form-label"><?php
                                        echo lan('manufacturer');
                                        ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-4">
                    <select name="manufacturer_id" id="manufacturer_id_1" class="form-control select2" onchange="load_manufacturer_code(this.value)" required>
                  <option value="">Select manufacturer</option>}
                  option
                   <?php foreach ($manufacturer_list as $manufacturer) {?>
             <option value="<?php echo $manufacturer->manufacturer_id;?>"><?php echo $manufacturer->manufacturer_name;?></option>
                   <?php }?>
                 </select>
                                      
                <input type="hidden" name="txtCode" value="" class="form-control "  id="txtCode">
                 </div>
                                 
                               
                    </div>


                     <div class="form-group row">
                        <label for="amount" class="col-sm-2 col-form-label"><?php
                                        echo lan('amount');
                                        ?> <i class="text-danger">*</i></label>
                      <div class="col-sm-4">
                       <input type="text" name="txtAmount" value="" class="form-control total_price text-right valid_number"  id="txtAmount_1" required>
                                     
                                    </div>
                                 
                               
                    </div>


                    <div class="form-group row">
                                    <label for="payment_type" class="col-sm-2 col-form-label"><?php
                                        echo lan('payment_type');
                                        ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-4">
                                        <select name="paytype" class="form-control select2" required="" onchange="bank_payment(this.value)" tabindex="3">
                                  <option value="1"><?php echo lan('cash_payment');?></option>
                                  <option value="2"><?php echo lan('bank_payment');?></option> 
                                        </select>
                                      

                                     
                                    </div>
                                 
                               
                    </div>

                       <div class="bank_div">
                            <div class="form-group row ">
                                <label for="bank" class="col-sm-2 col-form-label"><?php
                                    echo lan('bank');
                                    ?> <i class="text-danger">*</i></label>
                                <div class="col-sm-4">
                                  <?php echo  form_dropdown('bank_id',$bank_list,null, 'class="form-control select2" id="bank_id"') ?> 
                                 
                                </div>
                             
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
                      
