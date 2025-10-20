  
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_designation')?></h6>
                </div>
                <div class="text-right">
                     <?php if($permission->method('designation_list','read')->access()){?>  
                   <a href="<?php echo base_url('employee/designation_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('designation_list')?></a>
               <?php }?>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php echo form_open_multipart("employee/add_designation/".$designation->id) ?>            
                <?php echo form_hidden('designation_id',$designation->id) ?>
                <div class="form-group row">
                        <label for="designation_name" class="col-sm-3 col-form-label"><?php echo lan('designation_name'); ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-3">
                            <input name="designation_name" class="form-control" type="text" placeholder="<?php echo lan('designation_name'); ?>" id="designation_name" value="<?php echo $designation->designation;?>">
                        </div>
                    </div> 

                     <div class="form-group row">
                        <label for="details" class="col-sm-3 col-form-label"><?php echo lan('details'); ?> <i class="text-danger"></i></label>
                        <div class="col-sm-3">
                            <textarea name="details" class="form-control" type="text" placeholder="<?php echo lan('details'); ?>" id="details"><?php echo $designation->details;?></textarea>
                        </div>
                    </div> 

                
                     <div class="form-group row">
                  
                     <div class="col-md-6 text-right">
                        <div class="">
                           
                            <button type="submit"  class="btn btn-success">
                                <?php echo (empty($designation->id)?lan('save'):lan('update')) ?></button>

                        </div>
                       
                    </div>
                </div>

                <?php echo form_close();?>
                    </div>
                    </div>
                </div>
                    </div>
                      

                 