
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('edit_salary_setup')?></h6>
                </div>
                <div class="text-right">
                   <a href="<?php echo base_url('payroll/salary_setup_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('salary_setup_list')?></a>
                 
                </div>
            </div>
        </div>
                 <div class="card-body">
               
               <?php echo  form_open('payroll/salary_setup_update','id="validate"') ?>
                <div class="form-group row">
                  <label for="employee_id" class="col-md-3 col-form-label"><?php echo lan('employee') ?> <span class="text-danger">*</span></label>
                  <div class="col-md-6">
                   <?php echo form_dropdown('employee_id',$employee,(!empty($data[0]['employee_id'])?$data[0]['employee_id']:null),'class="form-control select2" id="employee_id" onchange="employechange(this.value)" required') ?>
                 </div>
               </div>

               <div class="form-group row">
                <label for="payment_period" class="col-md-3 col-form-label"><?php echo lan('salary_type') ?> <span class="text-danger">*</span></label>
                <div class="col-md-6">
                 <input type="text" class="form-control" name="sal_type_name" readonly="" id="sal_type_name" value="<?php if($EmpRate[0]['rate_type']==1){
                    echo 'Hourly';
                 }else{
                    echo 'Salary';
                 }?>">
                 <input type="hidden" class="form-control" name="sal_type" id="sal_type" value="<?php echo $EmpRate[0]['rate_type']; ?>">
                
               </div>
             </div>
             <table  border="1" class="" width="100%">
                   <tr>
              
                <td>  
                  <table id="add"> 
                  <caption class="text-center"><u><?php echo lan('addition')?></u></caption>    
                  
                    <?php foreach($amo as $basic){}?>   
                  <tr><th  class="padding10"><?php echo lan('basic')?></th><td><input type="text" id="basic" name="basic" class="form-control"  value="<?php echo $EmpRate[0]['hrate']; ?>" readonly></td></tr>    
                                   <?php
                 $x=0;
                foreach($amo as $value){?>
                             <tr>
                             <th class="padding10"><?php echo $value->benefit_name ;?> (%)</th>
                                <td>
                                <input type="text" name="amount[<?php echo $value->salary_type_id; ?>]" class="form-control addamount valid_number" onkeyup="summary()" value="<?php echo $value->amount; ?>" id="add_<?php echo $x;?>">
                             </td>
                             </tr>
                             <?php $x++;} ?>
              </table>
                </td>
                <td> 
                <table id="dduct">
                   <caption class="text-center"><u><?php echo lan('deduction')?></u></caption> 
                 <?php
                $y=0;
                foreach ($samlft as $row){

                  ?>
                  <tr><th class="padding10"><?php echo $row->benefit_name ;?> (%)</th><td><input type="text" name="amount[<?php echo $row->salary_type_id; ?>]" onkeyup="summary()" class="form-control deducamount valid_number" value="<?php echo $row->amount ?>" id="dd_<?php echo $y;?>"></td></tr><?php
               $y++; }
                ?>
                <tr><th class="padding10"><?php echo lan('tax')?> (%)</th><td><input type="text" name="amount[]"  onkeyup="summary()"  class="form-control deducamount valid_number" id="taxinput" <?php if($EmpRate[0]['rate_type']==1){
                    echo 'readonly';
                } ?>></td><td class="padding10"><input type="checkbox" name="tax_manager" id="taxmanager" onchange='handletax(this);' value="1" <?php if($EmpRate[0]['rate_type']==1){
                    echo 'checked'.'  '.'disabled';
                } ?>>Tax Manager</td></tr>
              </table></td>
              
              </tr> 
      
          
        </table>
     

<br>
<div class="form-group row">
   <label for="payable" class="col-sm-3 col-form-label text-center"><?php echo lan('gross_salary')?></label>
        <div class="col-sm-9">
<input type="text" class="form-control" name="gross_salary" value="<?php echo $basic->gross_salary; ?>" id="grsalary" readonly="">
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



                 
                 