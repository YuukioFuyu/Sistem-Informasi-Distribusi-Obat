        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_salarysetup')?></h6>
                </div>
                <div class="text-right">
                   <?php if($permission->method('salary_setup_list','read')->access()){?>
                   <a href="<?php echo base_url('payroll/salary_setup_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('salary_setup_list')?></a>
                 <?php }?>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
               
         <?php echo  form_open('payroll/save_salarysetup','id="validate"') ?>
                <div class="form-group row">
                  <label for="employee_id" class="col-md-3 col-form-label"><?php echo lan('employee') ?> <span class="text-danger">*</span></label>
                  <div class="col-md-6">
                   <?php echo form_dropdown('employee_id',$employee,null,'class="form-control select2" id="employee_id" onchange="employechange(this.value)" required') ?>
                 </div>
               </div>

               <div class="form-group row">
                <label for="payment_period" class="col-md-3 col-form-label"><?php echo lan('salary_type') ?> <span class="text-danger">*</span></label>
                <div class="col-md-6">
                 <input type="text" class="form-control " name="sal_type_name" id="sal_type_name" readonly="">
                 <input type="hidden" class="form-control" name="sal_type" id="sal_type">
               </div>
             </div>
             <table  border="1" class="" width="100%">
                   <tr>
              
                <td>  
                  <table id="add"> 
                  <caption class="text-center"><u><?php echo lan('addition')?></u></caption>    
                  <tr><th  class="pl-4"><?php echo lan('basic')?></th><td><input type="text" id="basic" name="basic" class="form-control" disabled=""></td></tr>    
                                   <?php
                 $x=0;
                 foreach ($slname as $ab){
                  ?>
                  <tr><th class="pl-4"><?php echo $ab->benefit_name ;?>(%)</th><td><input type="text" name="amount[<?php echo $ab->id; ?>]" class="form-control addamount valid_number" onkeyup="summary()" id="add_<?php echo $x;?>"></td></tr>
                  <?php
                $x++;}
                ?>
              </table>
                </td>
                <td> 
                <table id="dduct">
                   <caption class="text-center"><u><?php echo lan('deduction')?></u></caption> 
                <?php
                $y=0;
                foreach ($sldname as $row){
                  ?>
                  <tr>
                    <th class="pl-4"><?php echo $row->benefit_name ;?> (%)</th>
                    <td><input type="text" name="amount[<?php echo $row->id; ?>]" onkeyup="summary()" class="form-control deducamount valid_number" id="dd_<?php echo $y;?>"></td><td></td>
                    </tr><?php
               $y++; }
                ?>
                <tr>
                  <th class="pl-4"><?php echo lan('tax')?> (%)</th>
                  <td><input type="text" name="amount[]"  onkeyup="summary()"  class="form-control deducamount valid_number" id="taxinput"></td>
                  <td class="pl-4"><input type="checkbox" name="tax_manager" id="taxmanager" onchange='handletax(this);' value="1">Tax Manager</td>
                </tr>

              </table></td>
              
              </tr> 
      
          
        </table>
     

<br>
<div class="form-group row">
   <label for="payable" class="col-sm-3 col-form-label text-center"><?php echo lan('gross_salary')?></label>
        <div class="col-sm-9">
<input type="text" class="form-control" name="gross_salary" id="grsalary" readonly="">
       </div>
</div>
   <div class="form-group text-right">
    <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo lan('reset') ?></button>
    <button type="submit" class="btn btn-success w-md m-b-5"><?php echo lan('save') ?></button>
  </div>
  <?php echo form_close() ?>
 
</div>

                    </div>
                    </div>
                </div>


                 