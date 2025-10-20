
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                      <div class="card-header">
                 <div class="d-flex justify-content-between align-items-center"> 
                 <?php echo $title;?> 
                                    </div>
                                    </div>
                    <?php echo form_open('role/save_module', array('class' => 'form-vertical', 'id' => 'insert_module')) ?>
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="module_name" class="col-sm-3 col-form-label"><?php echo lan('module_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="hidden" name="id" value="<?php echo (!empty($moduleinfo->id)?$moduleinfo->id:'')?>">
                                <input class="form-control" name ="module_name" id="module_name" type="text" placeholder="<?php echo lan('module_name') ?>"  required="" tabindex="1" value="<?php echo (!empty($moduleinfo->name)?$moduleinfo->name:'')?>">
                            </div>
                        </div>

                      


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit" id="add-module" class="btn btn-primary btn-large" name="add-module" value="<?php echo lan('save') ?>" tabindex="7"/>
                              
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>

  
