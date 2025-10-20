<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_expense')?></h6>
                                </div>
                                <div class="text-right">
                                    <?php if($permission->method('add_expense_item','create')->access()){?>  
                                   <a href="<?php echo base_url('expense/add_expense_item')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_expense_item')?></a>
                                 <?php }?>
                                </div>
                            </div>
                        </div>
            <div class="card-body">
                <?php echo  form_open_multipart('expense/save_expense') ?>
                                <div class="row">
                          <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-3 col-form-label"><?php echo lan('date') ?>
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php  echo date('Y-m-d');?>">

                                    </div>
                                </div>
                            </div>
                             <div class="col-sm-12" id="payment_from_1">
                                <div class="form-group row">
                                    <label for="expense_type" class="col-sm-3 col-form-label"><?php
                                        echo lan('expense_type');
                                        ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <select name="expense_type" class="form-control select2">
                                            <option value="">Select Expense Type</option>
                                            <?php foreach($expense_item as $item){?>
                                            <option value="<?php echo $item['expense_item_name']?>"><?php echo $item['expense_item_name']?></option>
                                        <?php }?>
                                        </select>
                                    </div>
                                 
                                </div>
                            </div>
                            <div class="col-sm-12" id="payment_from_1">
                                <div class="form-group row">
                                    <label for="payment_type" class="col-sm-3 col-form-label"><?php
                                        echo lan('payment_type');
                                        ?> <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <select name="paytype" class="form-control select2"  id="paytype" onchange="bank_payment(this.value)" >
                                            <option value="">Select Payment Option</option>
                                            <option value="1">Cash Payment</option>
                                            <option value="2">Bank Payment</option>
                                        </select>
                                    </div>
                                 
                                </div>
                            </div>
                                <div class="col-sm-12 bank_div" id="bank_div">
                                <div class="form-group row">
                                     <label for="bank" class="col-sm-3 text-right bank_div col-form-label"><?php echo lan('bank')?><i class="text-danger">*</i></label>
                    <div class="col-sm-8">
                       
                            
                         <?php echo  form_dropdown('bank_id',$bank_list,null, 'class="form-control select2" id="bank_id"') ?> 
                        
                       
                    </div>
                                 
                                </div>
                            </div>
                            <div class="col-sm-12" id="payment_from_1">
                         <div class="form-group row">
                        <label for="date" class="col-sm-3 col-form-label"><?php echo lan('amount')?><i class="text-danger">*</i></label>
                        <div class="col-sm-8">
                             <input type="text" name="amount" id="amount" class="form-control valid_number" >
                            
                        </div>
                    </div> 
                    </div>
           
                      
                           
                            <div class="col-sm-12 text-right">
                               <div class="form-group row">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-8">
                                <input type="submit" id="add_receive" class="btn btn-success btn-large" name="save" value="<?php echo lan('save') ?>" tabindex="9"/>
                               </div>
                            </div>
                        </div>
                  <?php echo form_close() ?>
                
            </div> 
        </div>
    </div>
</div>
</div>
