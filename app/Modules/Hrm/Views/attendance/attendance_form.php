  
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_attendance')?></h6>
                </div>
                <div class="text-right">
                     <?php if($permission->method('attendance_list','read')->access()){?>  
                   <a href="<?php echo base_url('attendance/attendance_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('attendance_list')?></a>
               <?php }?>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php echo form_open_multipart("attendance/add_attendance/".$attendance->id) ?>            
                <?php echo form_hidden('id',$attendance->id) ?>
                  
              
                        <div class="form-group row">
                      <label for="employee" class="col-md-2 text-right col-form-label"><?php echo lan('employee')?> <i class="text-danger">  </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <?php echo  form_dropdown('employee_id',$employee_list,$attendance->employee_id, 'class="form-control select2"') ?>

                        </div>
                       
                    </div>
               
                  
                </div>

                <div class="form-group row">
                	     <label for="date" class="col-md-2 text-right col-form-label"><?php echo lan('date')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" class="form-control datepicker" name="date" id="date" placeholder="<?php echo lan('date')?>" value="<?php echo $attendance->date?>">

                        </div>
                       
                    </div>
                </div>

                  <div class="form-group row">
                	     <label for="sign_in" class="col-md-2 text-right col-form-label"><?php echo lan('sign_in')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" class="form-control timepicker" name="sign_in" id="sign_in" placeholder="<?php echo lan('sign_in')?>" value="<?php echo $attendance->sign_in?>">

                        </div>
                       
                    </div>
                </div>
             
            
            
         <div class="form-group row">
                   <div class="col-md-2 text-right">
                   </div>
                     <div class="col-md-4 text-right">
                        <div class="">
                           
                            <button type="submit"  class="btn btn-success form-control">
                                <?php echo (empty($attendance->id)?lan('save'):lan('update')) ?></button>

                        </div>
                       
                    </div>
                </div>

                <?php echo form_close();?>
                    </div>
                    </div>
                </div>
                    </div>

                 
                 