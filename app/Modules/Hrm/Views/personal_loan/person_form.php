<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_person')?></h6>
                                </div>
                                <div class="text-right">
                                    <?php if($permission->method('person_list','read')->access()){?>
                                   <a href="<?php echo base_url('loan/person_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('person_list')?></a>
                               <?php }?>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">
                   <?php echo form_open_multipart("loan/add_person/".$person->id) ?>            
                <?php echo form_hidden('id',$person->id) ?>
            <div class="row">
                <div class="col-sm-12">
                         <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label"><?php echo lan('name')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                             <input type="text" name="person_name" id="person_name" class="form-control" value="<?php echo $person->person_name?>">
                            
                        </div>
                    </div> 
                    </div>

                     <div class="col-sm-12">
                         <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label"><?php echo lan('phone')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                             <input type="text" name="phone" id="phone" class="form-control valid_number" value="<?php echo $person->person_phone?>">
                            
                        </div>
                    </div> 
                    </div>

                     <div class="col-sm-12">
                         <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label"><?php echo lan('address')?><i class="text-danger"></i></label>
                        <div class="col-sm-4">
                             <input type="text" name="address" id="address" class="form-control" value="<?php echo $person->person_address?>">
                            
                        </div>
                    </div> 
                    </div>
           
                      
                           
                            <div class="col-sm-6 text-right">
                               <div class="form-group row">
                                <label class="col-sm-4"></label>
                                <div class="col-sm-8">
                                 <button type="submit"  class="btn btn-success form-control">
                                <?php echo (empty($person->id)?lan('save'):lan('update')) ?></button>
                               </div>
                            </div>
                        </div>
                  <?php echo form_close() ?>
                
            </div> 
        </div>
    </div>
</div>
</div>

