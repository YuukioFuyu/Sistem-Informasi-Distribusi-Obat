<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('stock_report_batchwise')?></h6>
                                </div>
                                <div class="text-right">
                                   <a href="<?php echo base_url('stock/stock_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('stock_report')?></a>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table lan table-bordered table-striped table-hover custom-table" width="100%" id="StockListBatchwise">
                        <thead>
                    <tr>
                      <th class="text-center"><?php echo lan('sl_no') ?></th>
                      <th class="text-center"><?php echo lan('medicine_name') ?></th>
                      <th class="text-center"><?php echo lan('strength') ?></th>
                      <th class="text-center"><?php echo lan('batch_id') ?></th>
                      <th class="text-center"><?php echo lan('expiry_date') ?></th>
                      <th class="text-center"><?php echo lan('in_qty') ?></th>
                      <th class="text-center"><?php echo lan('out_qty') ?></th>
                      <th class="text-center"><?php echo lan('stock') ?></th>
                      <th class="text-center"><?php echo lan('stock').' '.'box'; ?></th>
                              
                      </tr>
                        </thead>
                        <tbody>
                          
                          
                        </tbody>
                
                    </table>
                    
                </div>
            </div> 
        </div>
    </div>
</div>

