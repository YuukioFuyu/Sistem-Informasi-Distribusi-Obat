  
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_benefits')?></h6>
                </div>
                <div class="text-right">
                  <?php if($permission->method('benefit_list','read')->access()){?>  
                   <a href="<?php echo base_url('payroll/benefit_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('benefit_list')?></a>
                 <?php }?>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php echo form_open_multipart("payroll/add_benefits/".$benefits->id) ?>            
                <?php echo form_hidden('id',$benefits->id) ?>
                  
              
                        <div class="form-group row">
                      <label for="benefit_name" class="col-md-2 text-right col-form-label"><?php echo lan('benefit_name')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                          <input type="text" class="form-control" name="benefit_name" id="benefit_name" placeholder="<?php echo lan('benefit_name')?>" value="<?php echo $benefits->benefit_name?>">

                        </div>
                       
                    </div>
               
                  
                </div>

                <div class="form-group row">
                	     <label for="benefit_type" class="col-md-2 text-right col-form-label"><?php echo lan('benefit_type')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                          <select name="benefit_type" class="form-control select2">
                              <option value="">Select type</option>
                              <option value="1" <?php if($benefits->benefit_type == 1){echo 'selected';}?>><?php echo lan('add')?></option>
                              <option value="2" <?php if($benefits->benefit_type == 2){echo 'selected';}?>><?php echo lan('deduct')?></option>
                          </select>

                        </div>
                       
                    </div>
                </div>

                <div class="form-group row">
                      <label for="status" class="col-md-2 text-right col-form-label"><?php echo lan('status')?> <i class="text-danger"> * </i>:</label>
                      <div class="col-md-4">
                    <div class="">
                      <label class="radio-inline my-2">
                                <?php echo form_radio('status', '1', (($benefits->status==1 || $benefits->status==null)?true:false), 'id="status"'); ?>Active
                            </label>
                            <label class="radio-inline my-2">
                                <?php echo form_radio('status', '0', (($benefits->status=="0")?true:false) , 'id="status"'); ?>Inactive
                            </label> 
                        </div>
                         </div>
                </div>

       
            
            
         <div class="form-group row">
                   <div class="col-md-2 text-right">
                   </div>
                     <div class="col-md-4 text-right">
                        <div class="">
                           
                            <button type="submit"  class="btn btn-success form-control">
                                <?php echo (empty($benefits->id)?lan('save'):lan('update')) ?></button>

                        </div>
                       
                    </div>
                </div>

                <?php echo form_close();?>
                    </div>
                    </div>
                </div>
                    </div>

                 
                 