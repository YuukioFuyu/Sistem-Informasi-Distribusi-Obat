<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('expense_statement')?></h6>
                                </div>
                                <div class="text-right">
                                   <a href="<?php echo base_url('expense/add_expense')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_expense')?></a>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">
             <div class="row">
                  <div class="col-sm-12">
                          <?php echo  form_open('expense/expense_statement','class="form-inline"') ?>
                             <label class="sr-only" for="expense_item"><?php echo lan('expense_item') ?></label>
                                            <div class="input-group mb-2 mr-sm-2" >
                                                
                                            <select name="expense_type" class="form-control select2">
                                            <option value="">Select Expense Type</option>
                                            <?php foreach($expense_item as $item){?>
                                            <option value="<?php echo $item['expense_item_name']?>" <?php if($eitem == $item['expense_item_name']){echo 'selected';}?>><?php echo $item['expense_item_name']?></option>
                                        <?php }?>
                                        </select>
                                            </div>
                                            <label class="sr-only" for="from_date"><?php echo lan('start_date') ?></label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><?php echo lan('start_date') ?></div>
                                                </div>
                                                <input type="text" class="form-control datepicker" name="from_date" id="from_date" placeholder="<?php echo lan('start_date') ?>" value="<?php echo $from_date;?>">
                                            </div>

                                            <label class="sr-only" for="to_date"><?php echo lan('end_date') ?></label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><?php echo lan('end_date') ?></div>
                                                </div>
                                                <input type="text" class="form-control datepicker" id="to_date" name="to_date" placeholder="<?php echo lan('end_date') ?>" value="<?php echo $to_date;?>">
                                            </div>
                                        
                                            <button type="submit" id="btn-filter-pur" class="btn btn-success mb-2"><?php echo lan('find') ?></button>
                                        <?php echo form_close()?>
                </div>
               
            </div>
                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover custom-table" cellspacing="0" width="100%" id="ss">
                        <thead>
                            <tr>
                        <th><?php echo lan('sl_no') ?></th>
                        <th><?php echo lan('date') ?></th>
                        <th><?php echo lan('expense_item') ?></th>
                        <th><?php echo lan('debit') ?></th>
                        <th><?php echo lan('credit') ?></th>
                        <th><?php echo lan('remark') ?></th>
                       
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($expense_info){
                                $sl = 1;
                             foreach($expense_info as $expenses){?>
                          
                          <tr>
                              <td><?php echo $sl++;?></td>
                              <td><?php echo $expenses->VDate?></td>
                              <td><?php echo $expenses->HeadName?></td>
                              <td><?php echo $expenses->Debit?></td>
                              <td><?php echo $expenses->Credit?></td>
                              <td><?php echo $expenses->Narration?></td>
                             

                          </tr>
                          <?php }}else{?>
                            <tr>
                                <td colspan="6" class="text-center">
                                    <?php echo lan('no_record_found')?>
                                </td>
                            </tr>
                        <?php }?>
                        </tbody>
                         
                    </table>
                    
                </div>
            </div> 
        </div>
    </div>
   
</div>

