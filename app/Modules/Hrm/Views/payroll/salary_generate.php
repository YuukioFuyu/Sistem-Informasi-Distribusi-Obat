  
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('salary_generate')?></h6>
                </div>
                <div class="text-right">
                  <?php if($permission->method('benefit_list','read')->access()){?>
                   <a href="<?php echo base_url('payroll/salary_sheet')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('generate_list')?></a>
                 <?php }?>
                  
                </div>
            </div>
        </div>
            <div class="card-body">
      <?php echo form_open_multipart("payroll/create_salary_sheet/") ?>            
               
                      <div class="form-group row">
                      <label for="salary_month" class="col-md-2 text-right col-form-label"><?php echo lan('salary_month')?> <i class="text-danger">  </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                          <input type="text" class="form-control monthpicker" name="myDate" id="salary_month" placeholder="<?php echo lan('salary_month')?>" value="">

                        </div>
                       
                    </div>
               
                  
                </div>

      
            
            
         <div class="form-group row">
                   <div class="col-md-2 text-right">
                   </div>
                     <div class="col-md-4 text-right">
                        <div class="">
                           
                            <button type="submit"  class="btn btn-success form-control">
                                <?php echo lan('save'); ?></button>

                        </div>
                       
                    </div>
                </div>

                <?php echo form_close();?>
                    </div>
                    </div>
                </div>
                    </div>

                 
                 