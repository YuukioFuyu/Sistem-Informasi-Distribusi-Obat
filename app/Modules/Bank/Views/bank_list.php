<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('bank_list')?></h6>
                                </div>
                                <div class="text-right">
                                 <?php if($permission->method('add_bank','create')->access()){?>    
                                   <a href="<?php echo base_url('bank/add_bank')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_bank')?></a>
                               <?php }?>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover custom-table" width="100%" id="BankList">
                        <thead>
                            <tr>
                            <th><?php echo lan('sl_no') ?></th>
                            <th width="200px;"><?php echo lan('bank_name') ?></th>
                            <th><?php echo lan('ac_name'); ?></th>
                            <th><?php echo lan('ac_number') ?></th>
                            <th><?php echo lan('branch'); ?></th>
                            <th><?php echo lan('signature_pic'); ?></th>
                            <th><?php echo lan('balance') ?></th>
                            <th width="30px;"><?php echo lan('action') ?></th>
                              
                            </tr>
                        </thead>
                        <tbody>
                          
                          
                        </tbody>
                           <tfoot>
                                <tr>
                                    <th colspan="6" class="text-right"><?php echo lan('total') ?>:</th>
                                    <th class="text-right"></th>
                                   <th></th>
                                </tr>
                                            
                           </tfoot>
                    </table>
                    
                </div>
            </div> 
        </div>
    </div>
</div>

