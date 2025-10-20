<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('income_tax_list')?></h6>
                                </div>
                                <div class="text-right">
                                   <a href="<?php echo base_url('tax/add_income_tax')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_income_tax')?></a>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover custom-table" id="example">
                          <thead>
                        <tr>
                            <th><?php echo lan('sl_no') ?></th>
                            <th><?php echo lan('start_amount') ?></th>
                            <th><?php echo lan('end_amount') ?></th>
                             <th><?php echo lan('tax_rate') ?></th>
                            
                           <th><?php echo lan('action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($taxs)) { ?>
                            <?php $sl = 1; ?>
                            <?php foreach ($taxs as $que) { ?>
                                <tr class="<?php echo ($sl & 1)?"odd gradeX":"even gradeC" ?>">
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $que->start_amount; ?></td>
                                    <td><?php echo $que->end_amount; ?></td>
                                    <td><?php echo $que->rate; ?> %</td>
                                    
                                    <td class="center">
                                
                                        <a href="<?php echo base_url("tax/income_tax_list/$que->id") ?>" class="btn btn-sm btn-success-soft"><i class="far fa-edit"></i></a>
                                       
                                    
                                   
                                        <a href="<?php echo base_url("tax/delete_income_tax/$que->id") ?>" class="btn btn-sm btn-danger-soft" onclick="return confirm('<?php echo lan('are_you_sure') ?>') "><i class="far fa-trash-alt"></i></a> 
                                        
                                    </td>
                                </tr>
                                <?php $sl++; ?>
                            <?php } ?> 
                        <?php } ?> 
                    </tbody>
                         
                    </table>
                    
                </div>
            </div> 
        </div>
    </div>
</div>

  