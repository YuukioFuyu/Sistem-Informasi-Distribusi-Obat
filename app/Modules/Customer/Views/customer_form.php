  
        <div class="row">
        	 <div class="col-md-12 col-lg-12">
                 <div class="card">
                       <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_customer')?></h6>
                </div>
                <div class="text-right">
                  <?php if($permission->method('customer_list','read')->access()){?>  
                   <a href="<?php echo base_url('customer/customer_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('customer_list')?></a>

                    <a href="<?php echo base_url('customer/paid_customer')?>" class="btn btn-purple btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('paid_customer')?></a>
                   <a href="<?php echo base_url('customer/credit_customer')?>" class="btn btn-info btn-sm"><i class="fas fa-align-justify mr-1"></i><?php echo lan('credit_customer')?></a>
                    <?php }?> 
              
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php echo form_open_multipart("customer/add_customer/".$customer->customer_id) ?>            
               
               <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customer->customer_id?>">
                <div class="form-group row">
                    <label for="customer_name" class="col-md-2 text-right col-form-label"><?php echo lan('customer_name')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder="<?php echo lan('customer_name')?>" value="<?php echo $customer->customer_name?>">
                            <input type="hidden" name="old_name" value="<?php echo $customer->customer_name?>">

                        </div>
                       
                    </div>
                     <label for="customer_mobile" class="col-md-2 text-right col-form-label"><?php echo lan('mobile_no')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="customer_mobile" class="form-control input-mask-trigger text-left valid_number" id="customer_mobile" placeholder="<?php echo lan('mobile_no')?>" value="<?php echo $customer->customer_mobile?>" data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true" im-insert="true">

                        </div>
                       
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="customer_email" class="col-md-2 text-right col-form-label"><?php echo lan('email_address')?>1:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="email" class="form-control input-mask-trigger" name="customer_email" id="email" data-inputmask="'alias': 'email'" im-insert="true" placeholder="<?php echo lan('email')?>" value="<?php echo $customer->customer_email?>">

                        </div>
                       
                    </div>
                      <label for="email_address" class="col-md-2 text-right col-form-label"><?php echo lan('email_address')?>2:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" class="form-control" name="email_address" id="email_address" placeholder="<?php echo lan('email_address')?>" value="<?php echo $customer->email_address?>">

                        </div>
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-md-2 text-right col-form-label"><?php echo lan('phone')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                          <input class="form-control input-mask-trigger text-left" id="phone" type="number" name="phone" placeholder="<?php echo lan('phone')?>" data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true" im-insert="true" value="<?php echo $customer->phone?>">

                        </div>
                       
                    </div>

                     <label for="contact" class="col-md-2 text-right col-form-label"><?php echo lan('contact')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                          <input class="form-control"  id="contact" type="text" name="contact" placeholder="<?php echo lan('contact')?>" value="<?php echo $customer->contact?>">

                        </div>
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address1" class="col-md-2 text-right col-form-label"><?php echo lan('address1')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                           <textarea name="customer_address" id="customer_address" class="form-control" placeholder="<?php echo lan('address1')?>"><?php echo $customer->customer_address?></textarea>

                        </div>
                      
                    </div>

                          <label for="address2" class="col-md-2 text-right col-form-label"><?php echo lan('address2')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                           <textarea name="address2" id="address2" class="form-control" placeholder="<?php echo lan('address2')?>"><?php echo $customer->address2?></textarea>

                        </div>
                      
                    </div>
                </div>
                <div class="form-group row"> 
                    <label for="fax" class="col-md-2 text-right col-form-label"><?php echo lan('fax')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                            <input type="text" name="fax" class="form-control" id="fax" placeholder="<?php echo lan('fax')?>" value="<?php echo $customer->fax?>">

                        </div>
                       
                    </div>
                    <label for="city" class="col-md-2 text-right col-form-label"><?php echo lan('city')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                            <input type="text" name="city" class="form-control" id="city" placeholder="<?php echo lan('city')?>" value="<?php echo $customer->city?>">

                        </div>
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="state" class="col-md-2 text-right col-form-label"><?php echo lan('state')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="state" class="form-control" id="state" placeholder="<?php echo lan('state')?>"  value="<?php echo $customer->state?>">

                        </div>
                       
                    </div>
                    <label for="zip" class="col-md-2 text-right col-form-label"><?php echo lan('zip')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input name="zip" type="text" class="form-control" id="zip" placeholder="<?php echo lan('zip')?>" value="<?php echo $customer->zip?>">

                        </div>
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="country" class="col-md-2 text-right col-form-label"><?php echo lan('country')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input name="country" type="text" class="form-control " placeholder="<?php echo lan('country')?>" value="<?php echo $customer->country?>" id="country" >

                        </div>
                       
                    </div>
                    <?php if(empty($customer->customer_id)){?>

                     <label for="previous_balance" class="col-md-2 text-right col-form-label"><?php echo lan('previous_balance')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input name="previous_balance" type="text" class="form-control text-right input-mask-trigger valid_number" placeholder="<?php echo lan('previous_balance')?>"  data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true" im-insert="true" >

                        </div>
                       
                    </div>
                <?php }?>
                    
                </div>

              

         <div class="form-group row">
                   <div class="col-md-6 text-right">
                   </div>
                     <div class="col-md-6 text-right">
                        <div class="">
                           
                            <button type="submit"  class="btn btn-success">
                                <?php echo (empty($customer->customer_id)?lan('save'):lan('update')) ?></button>

                        </div>
                       
                    </div>
                </div>
               

                <?php echo form_close();?>
                    </div>
                    </div>
                </div>
                    </div>
                      

                 