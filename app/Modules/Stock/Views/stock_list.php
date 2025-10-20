<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('stock_report')?></h6>
                                </div>
                                <div class="text-right">
                                   <a href="<?php echo base_url('stock/stock_list_batchWise')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('stock_report_batchwise')?></a>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover custom-table" width="100%" id="StockList">
                        <thead>
                            <tr>
                      <th class="text-center"><?php echo lan('sl_no') ?></th>
                      <th class="text-center"><nobr><?php echo lan('medicine_name') ?></nobr></th>
                      <th class="text-center"><nobr><?php echo lan('manufacturer_name') ?></nobr></th>
                      <th class="text-center"><nobr><?php echo lan('sale_price') ?></nobr></th>
                      <th class="text-center"><nobr><?php echo lan('purchase_price') ?></nobr></th>
                      <th class="text-center"><nobr><?php echo lan('in_qty') ?></nobr></th>
                      <th class="text-center"><nobr><?php echo lan('out_qty') ?></nobr></th>
                      <th class="text-center"><nobr><?php echo lan('stock') ?></nobr></th>
                      <th class="text-center"><nobr><?php echo lan('stock').' box'; ?></nobr></th>
                      <th class="text-center"><nobr><?php echo lan('stock_sale_price')?></nobr></th>
                      <th class="text-center"><nobr><?php echo lan('stock_purchase_price')?></nobr></th>
                              
                            </tr>
                        </thead>
                        <tbody>
                          
                          
                        </tbody>
                           <tfoot>
                      <tr>
                <th colspan="7" class="text-right"><?php echo lan('total')?>:</th>
                <th id="stockqty"></th>
                  <th></th><th></th>  <th></th> 
            </tr>
                      
                    </tfoot> 
                    </table>
                    
                </div>
            </div> 
        </div>
    </div>
</div>

