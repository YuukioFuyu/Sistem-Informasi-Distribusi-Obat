<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('salary_payment')?></h6>
                                    
                                </div>
                                <div class="text-right">
                                  
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover custom-table text-nowrap" cellspacing="0" width="100%" id="SalaryPayment">
                        <thead>
                            <tr>
                        <th><?php echo lan('sl_no') ?></th>
                        <th><?php echo lan('employee') ?></th>
                        <th><?php echo lan('salary_month') ?></th>
                        <th><?php echo lan('total_salary') ?></th>
                        <th><?php echo lan('total_working_hours') ?></th>
                        <th><?php echo lan('total_working_day') ?></th>
                        <th><?php echo lan('date') ?></th>
                        <th><?php echo lan('status') ?></th>
                        <th><?php echo lan('paid_by') ?></th>
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
     <div class="modal fade" id="paymentModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                             <h3 class="modal-title"><?php echo lan('pay_now') ?></h3>
                            <a href="#" class="close  md-close" data-dismiss="modal">&times;</a>
                           
                        </div>
                        
                        <div class="modal-body">
                           
                       <?php echo form_open('payroll/pay_confirm', array('class' => 'form-vertical')) ?>
                    <div class="panel-body">
                          <input name="emp_sal_pay_id" id="salType" type="hidden" value="">
                         <div class="form-group row">
                            <label for="employee_id" class="col-sm-3 col-form-label"><?php echo lan('employee') ?> </label>
                            <div class="col-sm-9">
                                <input type="text" name="empname" class="form-control" id="employee_name" value="" readonly>
                                <input type="hidden" name="employee_id" class="form-control" id="employee_id" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_salary" class="col-sm-3 col-form-label"><?php echo lan('total_salary') ?> </label>
                            <div class="col-sm-9">
                                <input type="text" name="total_salary" class="form-control" id="total_salary" value="" readonly>
                            </div>
                        </div> 

                       <div class="form-group row">
                            <label for="total_working_hours" class="col-sm-3 col-form-label"><?php echo lan('total_working_hours') ?> </label>
                            <div class="col-sm-9">
                                <input type="text" name="total_working_minutes" class="form-control" id="total_working_minutes" value="" readonly>
                            </div>
                        </div> 
                         <div class="form-group row">
                            <label for="total_working_day" class="col-sm-3 col-form-label"><?php echo lan('total_working_day') ?> </label>
                            <div class="col-sm-9">
                                <input type="text" name="working_period" class="form-control" id="working_period" value="" readonly>
                                 
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="salary_month" class="col-sm-3 col-form-label"><?php echo lan('salary_month') ?> </label>
                            <div class="col-sm-9">
                               
                                 <input type="text" name="salary_month" class="form-control" id="salary_month" value="" readonly>
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

