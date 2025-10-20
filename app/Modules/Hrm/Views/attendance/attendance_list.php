<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('attendance_list')?></h6>
                                </div>
                                <div class="text-right">
                                     <?php if($permission->method('add_attendance','create')->access()){?> 
                                   <a href="<?php echo base_url('attendance/add_attendance')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_attendance')?></a>
                                 <?php }?>
                                </div>
                            </div>
                        </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover custom-table" cellspacing="0" width="100%" id="attendanceList">
                        <thead>
                            <tr>
                        <th><?php echo lan('sl_no') ?></th>
                        <th><?php echo lan('employee') ?></th>
                        <th><?php echo lan('date') ?></th>
                        <th><?php echo lan('sign_in') ?></th>
                        <th><?php echo lan('sign_out') ?></th>
                        <th><?php echo lan('staytime') ?></th>
                        <th><?php echo lan('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                          
                          
                        </tbody>
                         
                    </table>
                    
                </div>
            </div> 
        </div>
    </div>
    <div class="modal fade" id="sign_outmodal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            
                            <h3 class="modal-title"><?php echo lan('sign_out') ?></h3><a href="#" class="close  md-close" data-dismiss="modal">&times;</a>
                        </div>
                        
                        <div class="modal-body">
                           
                       <?php echo form_open('attendance/sign_out', array('class' => 'form-vertical', 'id' => 'singout_form')) ?>
                    <div class="panel-body">
                        <div class="form-group row">
                            <label for="sign_out" class="col-sm-4 col-form-label"><?php echo lan('sign_out') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control timepicker" name ="sign_out" id="sign_out" type="text" placeholder="<?php echo lan('sign_out') ?>"  required="" tabindex="1">
                                <input type="hidden" id="attendance_id" name="attendance_id">
                                 <input type="hidden" id="sign_in" name="sign_in">
                            </div>
                        </div>


                      
                    </div>
                    
                        </div>

                        <div class="modal-footer">
                            
                            <a href="#" class="btn btn-danger" tabindex="5" data-dismiss="modal">Close</a>
                            
                            <input type="submit" tabindex="6" class="btn btn-success" value="Submit">
                        </div>
                        <?php echo form_close() ?>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
</div>
