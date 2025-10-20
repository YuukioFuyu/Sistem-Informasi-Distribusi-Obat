  
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_expense_item')?></h6>
                </div>
                <div class="text-right">
                   <?php if($permission->method('expense_item_list','read')->access()){?>  
                   <a href="<?php echo base_url('expense/expense_item_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('expense_item_list')?></a>
                 <?php }?>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php echo form_open_multipart("expense/add_expense_item/".$expense->id) ?>            
                <?php echo form_hidden('id',$expense->id) ?>
                  
              
                        <div class="form-group row">
                      <label for="expense_item_name" class="col-md-2 text-right col-form-label"><?php echo lan('expense_item_name')?> <i class="text-danger">  </i>:</label>
                    <div class="col-md-4">
                      
                           
                              <input type="text" class="form-control" name="expense_item_name" id="expense_item_name" placeholder="<?php echo lan('expense_item_name')?>" value="<?php echo $expense->expense_item_name?>">
                              <input type="hidden" name="old_name" value="<?php echo $expense->expense_item_name?>">

                        
                       
                    </div>
                    <div class="col-md-2">
                  <button type="submit"  class="btn btn-success form-control">
                                <?php echo (empty($expense->id)?lan('save'):lan('update')) ?></button>
                  </div>
                </div>

          
  

                <?php echo form_close();?>
                    </div>
                    </div>
                </div>
                    </div>

                 
                 