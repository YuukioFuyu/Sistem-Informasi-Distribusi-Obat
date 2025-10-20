  
        <div class="row">
             <div class="col-md-12 col-lg-12">
            <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_unit')?></h6>
                </div>
                <div class="text-right">
                    <?php if($permission->method('unit_list','read')->access()){?> 
                   <a href="<?php echo base_url('medicine/unit_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('unit_list')?></a>
               <?php }?>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php echo form_open_multipart("medicine/add_unit/".$unit->id) ?>            
                <?php echo form_hidden('id',$unit->id) ?>
                <div class="form-group row">
                        <label for="unit_name" class="col-sm-3 col-form-label"><?php echo lan('unit_name'); ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-3">
                            <input name="unit_name" class="form-control" type="text" placeholder="<?php echo lan('unit_name'); ?>" id="unit_name" value="<?php echo $unit->unit_name;?>">
                        </div>
                    </div> 

                 <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">status <i class="text-danger">*</i></label>
                        <div class="col-sm-3">
                            <label class="radio-inline my-2">
                                <?php echo form_radio('status', '1', (($unit->status==1 || $unit->status==null)?true:false), 'id="status"'); ?>Active
                            </label>
                            <label class="radio-inline my-2">
                                <?php echo form_radio('status', '0', (($unit->status=="0")?true:false) , 'id="status"'); ?>Inactive
                            </label> 
                        </div>
                    </div>
                     <div class="form-group row">
                 
                     <div class="col-md-6 text-right">
                        <div class="">
                           
                            <button type="submit"  class="btn btn-success">
                                <?php echo (empty($unit->unit_id)?lan('save'):lan('update')) ?></button>

                        </div>
                       
                    </div>
                </div>

                <?php echo form_close();?>
                    </div>
                    </div>
                </div>
                    </div>
                      

                 