<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('wastage_return_list')?></h6>
                                </div>
                                <div class="text-right">
                                   <a href="<?php echo base_url('return/add_return')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_return')?></a>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">
             <div class="row">
                  <div class="col-sm-12">
                          <form action="" class="form-inline" method="post" accept-charset="utf-8">
                                            <label class="sr-only" for="from_date"><?php echo lan('start_date') ?></label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><?php echo lan('start_date') ?></div>
                                                </div>
                                                <input type="text" class="form-control datepicker psdate" name="from_date" id="from_date" placeholder="<?php echo lan('start_date') ?>" value="">
                                            </div>

                                            <label class="sr-only" for="to_date"><?php echo lan('end_date') ?></label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><?php echo lan('end_date') ?></div>
                                                </div>
                                                <input type="text" class="form-control datepicker pedate" id="to_date" name="to_date" placeholder="<?php echo lan('end_date') ?>">
                                            </div>
                                        
                                            <button type="button" id="btn-filter-pur" class="btn btn-success mb-2"><?php echo lan('find') ?></button>
                            </form>
                </div>
               
            </div>
                <div class="table-responsive">
                     <table class="table table-striped table-bordered custom-table" cellspacing="0" width="100%" id="WastageReturn"> 
                <thead>
                  <tr>
                    <th><?php echo lan('sl_no') ?></th>
                    <th><?php echo lan('invoice_id') ?></th>
                    <th><?php echo lan('purchase_id') ?></th>
                    <th><?php echo lan('customer_name') ?></th>
                    <th><?php echo lan('manufacturer_name') ?></th>
                    <th><?php echo lan('date') ?></th>
                    <th><?php echo lan('total_amount') ?></th>
                    <th><?php echo lan('action') ?></th>
                  </tr>
                </thead>
                <tbody>
            
                </tbody>
                <tfoot>
                    <th colspan="6" class="text-right"><?php echo lan('total') ?>:</th>
                
                  <th></th>  
                  <th></th> 
                                </tfoot>
                        </table>
                    
                </div>
            </div> 
        </div>
    </div>
</div>

