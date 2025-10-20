  
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_bank')?></h6>
                </div>
                <div class="text-right">
                  <?php if($permission->method('bank_list','read')->access()){?>
                   <a href="<?php echo base_url('bank/bank_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('bank_list')?></a>
                 <?php }?>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php echo form_open_multipart("bank/add_bank/".$bank->bank_id) ?>            
               
               <input type="hidden" name="bank_id" id="bank_id" value="<?php echo $bank->bank_id?>">
                <div class="form-group row">
                    <label for="bank_name" class="col-md-2 text-right col-form-label"><?php echo lan('bank_name')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="<?php echo lan('bank_name')?>" value="<?php echo $bank->bank_name?>">
                            <input type="hidden" name="old_name" value="<?php echo $bank->bank_name?>">

                        </div>
                       
                    </div>
                     <label for="ac_name" class="col-md-2 text-right col-form-label"><?php echo lan('ac_name')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="ac_name" class="form-control input-mask-trigger text-left" id="ac_name" placeholder="<?php echo lan('ac_name')?>" value="<?php echo $bank->ac_name?>" data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true" im-insert="true">

                        </div>
                       
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="ac_number" class="col-md-2 text-right col-form-label"><?php echo lan('ac_number')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" class="form-control input-mask-trigger valid_number" name="ac_number" id="ac_number" data-inputmask="'alias': 'email'" im-insert="true" placeholder="<?php echo lan('ac_number')?>" value="<?php echo $bank->ac_number?>">

                        </div>
                       
                    </div>
                      <label for="branch" class="col-md-2 text-right col-form-label"><?php echo lan('branch')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" class="form-control" name="branch" id="branch" placeholder="<?php echo lan('branch')?>" value="<?php echo $bank->branch?>">

                        </div>
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="signature_pic" class="col-md-2 text-right col-form-label"><?php echo lan('signature_pic')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                          <input class="form-control input-mask-trigger text-left" id="signature_pic" type="file" name="image" placeholder="<?php echo lan('signature_pic')?>" data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true" im-insert="true" >
<input type="hidden" name="old_image" value="<?php echo $bank->signature_pic?>">
                        </div>
                       
                    </div>

                      <label for="status" class="col-md-2 text-right col-form-label"><?php echo lan('status')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                           <label class="radio-inline my-2">
                                <?php echo form_radio('status', '1', (($bank->status==1 || $bank->status==null)?true:false), 'id="status"'); ?>Active
                            </label>
                            <label class="radio-inline my-2">
                                <?php echo form_radio('status', '0', (($bank->status=="0")?true:false) , 'id="status"'); ?>Inactive
                            </label> 

                        </div>
                       
                    </div>
                </div>
           <div class="form-group row">
              <label for="preview" class="col-md-2 text-right col-form-label"><?php echo lan('preview')?>:</label>    
                    <div class="col-md-4">
                        <div class="">
                            
                          <img id="blah" class="img-thambnail" src="<?php echo (!empty($bank->signature_pic)?base_url().'/'.$bank->signature_pic:base_url('assets/dist/img/bank/bank.jpg'))?>" alt="your image" height="70px" width="70px;" />

                        </div>
                       
                    </div>
                </div>

              

         <div class="form-group row">
                   <div class="col-md-6 text-right">
                   </div>
                     <div class="col-md-6 text-right">
                        <div class="">
                           
                            <button type="submit"  class="btn btn-success">
                                <?php echo (empty($bank->bank_id)?lan('save'):lan('update')) ?></button>

                        </div>
                       
                    </div>
                </div>
               

                <?php echo form_close();?>
                    </div>
                    </div>
                    </div>
                    </div>
                      

             
                     