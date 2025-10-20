  
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_employee')?></h6>
                </div>
                <div class="text-right">
                   <?php if($permission->method('employee_list','read')->access()){?>  
                   <a href="<?php echo base_url('employee/employee_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('employee_list')?></a>
                 <?php }?>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php echo form_open_multipart("employee/add_employee/".$employee->id) ?>            
                <?php echo form_hidden('employee_id',$employee->id) ?>
                  
                <div class="form-group row">
                   
                <label for="firstname" class="col-md-2 text-right col-form-label"><?php echo lan('firstname')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                         <input type="text" name="firstname" class="form-control" id="firstname" placeholder="<?php echo lan('firstname')?>" value="<?php echo $employee->first_name?>">
                        </div>
                       
                    </div>
            
                    <label for="lastname" class="col-md-2 text-right col-form-label"><?php echo lan('lastname')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="<?php echo lan('lastname')?>" value="<?php echo $employee->last_name?>">
                           

                        </div>
                       
                    </div>
                   
                </div>
                 <div class="form-group row">
                      <label for="designation" class="col-md-2 text-right col-form-label"><?php echo lan('designation')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <?php echo  form_dropdown('designation_id',$designation_list,$employee->designation, 'class="form-control select2"') ?>

                        </div>
                       
                    </div>
                    <label for="phone" class="col-md-2 text-right col-form-label"><?php echo lan('phone')?><i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" class="form-control valid_number" name="phone" id="phone" placeholder="<?php echo lan('phone')?>" value="<?php echo $employee->phone?>">

                        </div>
                       
                    </div>
                  
                </div>
             
                <div class="form-group row">
                        <label for="rate_type" class="col-md-2 text-right col-form-label"><?php echo lan('rate_type')?><i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                          
                            <select class="form-control select2" name="rate_type" id="rate_type">
                              <option value="">Select Option</option>}
                              <option value="1" <?php if($employee->rate_type==1){echo 'selected';}?>><?php echo lan('hourly')?></option>
                              <option value="2" <?php if($employee->rate_type==2){echo 'selected';}?>><?php echo lan('salary')?></option>
                            </select>

                        </div>
                       
                    </div>
                   
  <label for="hour_rate" class="col-md-2 text-right col-form-label"><?php echo lan('hour_rate')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                         <input type="text" class="form-control valid_number" name="hrate" id="hrate" placeholder="<?php echo lan('hour_rate')?>" value="<?php echo $employee->hrate?>">    

                        </div>
                       
                    </div>
                   
                </div>

                   <div class="form-group row">
                    <label for="email" class="col-md-2 text-right col-form-label"><?php echo lan('email')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                          <input class="form-control" id="email" type="email" name="email" placeholder="<?php echo lan('email')?>" value="<?php echo $employee->email?>">

                        </div>
                       
                    </div>
                       <label for="blood_group" class="col-md-2 text-right col-form-label"><?php echo lan('blood_group')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="blood_group" class="form-control" id="blood_group" placeholder="<?php echo lan('blood_group')?>"  value="<?php echo $employee->blood_group?>">

                        </div>
                       
                    </div>

                 
                </div>
                <div class="form-group row"> 
              

                     <label for="address_line_1" class="col-md-2 text-right col-form-label"><?php echo lan('address_line_1')?><i class="text-danger">  </i>:</label>
                       <div class="col-md-4">
                        <div class="">
                            
                           <textarea name="address_line_1" id="address_line_1" class="form-control"><?php echo $employee->address_line_1?></textarea>

                        </div>
                    </div>

         <label for="address_line_2" class="col-md-2 text-right col-form-label"><?php echo lan('address_line_2')?><i class="text-danger">  </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                         <textarea name="address_line_2" id="address_line_1" class="form-control"><?php echo $employee->address_line_2?></textarea>

                        </div>
                       
                    </div>
                  
                  
                </div>
                <div class="form-group row">
            
                       <label for="country" class="col-md-2 text-right col-form-label"><?php echo lan('country')?>:</label>
                    <div class="col-md-4">
                        <div class="">
      <input type="text" name="country" class="form-control" id="country" placeholder="<?php echo lan('country')?>"  value="<?php echo $employee->country?>">
                        </div>
                      
                    </div>
                    <label for="image" class="col-md-2 text-right col-form-label"><?php echo lan('image')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input name="image" type="file" class="form-control" id="image" placeholder="<?php echo lan('image')?>" value="">
                            <input name="old_image" type="hidden" class="form-control"  value="<?php echo $employee->image?>">

                        </div>
                       
                    </div>
                </div>
                 <div class="form-group row">
            
                       <label for="city" class="col-md-2 text-right col-form-label"><?php echo lan('city')?>:</label>
                    <div class="col-md-4">
                        <div class="">
      <input type="text" name="city" class="form-control" id="country" placeholder="<?php echo lan('city')?>"  value="<?php echo $employee->city?>">
                        </div>
                      
                    </div>
                    <label for="zip" class="col-md-2 text-right col-form-label"><?php echo lan('zip')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input name="zip" type="text" class="form-control" id="zip" placeholder="<?php echo lan('zip')?>" value="<?php echo $employee->zip?>">
                          

                        </div>
                       
                    </div>
                </div>
         
            

                <div class="form-group row">
                    <label for="status" class="col-md-2 text-right col-form-label"><?php echo lan('status')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                           <label class="radio-inline my-2">
                                <?php echo form_radio('status', '1', (($employee->status==1 || $employee->status==null)?true:false), 'id="status"'); ?>Active
                            </label>
                            <label class="radio-inline my-2">
                                <?php echo form_radio('status', '0', (($employee->status=="0")?true:false) , 'id="status"'); ?>Inactive
                            </label> 

                        </div>
                       
                    </div>
                       <label for="preview" class="col-md-2 text-right col-form-label"><?php echo lan('preview')?>:</label>    
                    <div class="col-md-4">
                        <div class="">
                            
                          <img id="blah" class="img-thambnail" src="<?php echo (!empty($employee->image)?base_url().'/'.$employee->image:base_url('assets/dist/img/employee/employee.jpg'))?>" alt="your image" height="70px" width="70px;" />

                        </div>
                       
                    </div>
                </div>
              
            
         <div class="form-group row">
                   <div class="col-md-6 text-right">
                   </div>
                     <div class="col-md-6 text-right">
                        <div class="">
                           
                            <button type="submit"  class="btn btn-success">
                                <?php echo (empty($m_id)?lan('save'):lan('update')) ?></button>

                        </div>
                       
                    </div>
                </div>

                <?php echo form_close();?>
                    </div>
                    </div>
                </div>
                    </div>

                 
                     

                 