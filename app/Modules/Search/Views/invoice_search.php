<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('invoice_search')?></h6>
                                </div>
                                <div class="text-right">
                                  
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">
             <div class="row">
                  <div class="col-sm-4">
                        
                            <?php echo form_open('search/invoice_search')?>
                                           
                                            <div class="input-group">
                                             <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="<?php echo lan('enter_what_you_search')?>" aria-label="medicine search" name="search_query">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success" type="submit"><?php echo lan('search')?></button>
                                                </div>
                                            </div>
                                            </div>
                                          
                                          
                                      <?php echo form_close()?>
                </div>
               
            </div>
            <?php if($search_data){
            
              ?>
                <div class="table-responsive">
                     <table class="table table-striped table-bordered custom-table" cellspacing="0" width="100%" id=""> 
                <thead>
                  <tr>
                    <th><?php echo lan('sl_no') ?></th>
                    <th><?php echo lan('date') ?></th>
                    <th><?php echo lan('invoice_no') ?></th>
                    <th><?php echo lan('customer_name') ?></th>
                    <th><?php echo lan('total_amount') ?></th>
                    <th><?php echo lan('due_amount') ?></th>

                  </tr>
                </thead>
                <tbody>
          <?php $sl = 1;
           foreach($search_data as $result){?>
               <tr>
                <td><?php echo $sl++;?></td>
                 <td><?php echo $result['date']?></td>
                 <td><?php echo $result['invoice']?></td>
                 <td><?php echo $result['customer_name']?></td>
                 <td><?php echo $result['total_amount']?></td>
                 <td><?php echo $result['due_amount']?></td>
               
               </tr>
          <?php }?>
                </tbody>
               
                        </table>
                    
                </div>

              <?php }else{?>
              <div class="table-responsive">
                <table class="table">
                  
                  
                  <tbody>
                    <tr>
                      <td colspan="6" class="text-center">No Record Found</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            <?php }?>
            </div> 
        </div>
    </div>
</div>

