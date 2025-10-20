  
        <div class="row">
             <div class="col-md-12 col-lg-12">
                 <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_type')?></h6>
                </div>
                <div class="text-right">
                    <?php if($permission->method('type_list','read')->access()){?>  
                   <a href="<?php echo base_url('medicine/type_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('type_list')?></a>
               <?php }?>
                  
                </div>
            </div>
        </div>
    <div class="card-body">
            <?php echo form_open_multipart("medicine/add_type/".$type->id) ?>            
                <?php echo form_hidden('id',$type->id) ?>
                <div class="form-group row">
                        <label for="type_name" class="col-sm-3 col-form-label"><?php echo lan('type_name'); ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-3">
                            <input name="type_name" class="form-control" type="text" placeholder="<?php echo lan('type_name'); ?>" id="type_name" value="<?php echo $type->type_name;?>">
                        </div>
                    </div> 

                 <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">status <i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                            <label class="radio-inline my-2">
                                <?php echo form_radio('status', '1', (($type->status==1 || $type->status==null)?true:false), 'id="status"'); ?>Active
                            </label>
                            <label class="radio-inline my-2">
                                <?php echo form_radio('status', '0', (($type->status=="0")?true:false) , 'id="status"'); ?>Inactive
                            </label> 
                        </div>
                    </div>
                     <div class="form-group row">
                 
                     <div class="col-md-6 text-right">
                        <div class="">
                           
                            <button type="submit"  class="btn btn-success">
                                <?php echo (empty($type->type_id)?lan('save'):lan('update')) ?></button>

                        </div>
                       
                    </div>
                </div>

                <?php echo form_close();?>
                    </div>
                    </div>
                </div>
                    </div>
                      

                 