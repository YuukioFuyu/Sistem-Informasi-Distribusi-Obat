<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('manufacturer_ledger')?></h6>
                                </div>
                                <div class="text-right">
                                   
                                </div>
                            </div>
            </div>
            <div class="card-body">

                    <div class="row">
                  <div class="col-sm-12">
                          
                            <?php echo form_open('manufacturer/manufacturer_ledger','class="form-inline"')?>
                            
                                            <div class="input-group mb-2 mr-sm-2 list-width">
                                               
                                                <?php echo  form_dropdown('manufacturer_id',$manufacturer_list,$manufacturer_id, 'class="form-control select2" id="manufacturer_id" ') ?> 
                                            </div>
                                            <label class="sr-only" for="from_date"><?php echo lan('start_date') ?></label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><?php echo lan('start_date') ?></div>
                                                </div>
                                                <input type="text" class="form-control datepicker" name="from_date" id="from_date" placeholder="<?php echo lan('start_date') ?>" value="<?php echo $dtpFromDate?>">
                                            </div>

                                            <label class="sr-only" for="to_date"><?php echo lan('end_date') ?></label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><?php echo lan('end_date') ?></div>
                                                </div>
                                                <input type="text" class="form-control datepicker" id="to_date" name="to_date" placeholder="<?php echo lan('end_date') ?>" value="<?php echo $dtpToDate?>">
                                            </div>
                                        
                                            <button type="submit" id="btn-filter-pur" class="btn btn-success mb-2"><?php echo lan('find') ?></button>
                                       <?php echo form_close()?>
                </div>
               
            </div>
        <table class="table" width="99%" align="center"  cellpadding="5" cellspacing="5" border="2"> 

                <thead>
                <tr align="center" class="">

                    <td colspan="7"><font size="+1"> <strong ><?php echo lan('manufacturer_ledger').'- '.$ledger[0]['HeadName'].' ('.lan('on')?> <span class="text-"><?php echo $dtpFromDate ?></span> <?php echo lan('to')?>  <span class="text"> <?php echo $dtpToDate;?></span>)</strong></font><strong></th></strong>
                </tr>

                <tr>
                    <td height="25" align="center"><strong><?php echo lan('sl_no');?></strong></td>
                    <td align="center"><strong><?php echo lan('date');?></strong></td>
                   
                    
                    <?php
                    if($chkIsTransction){
                        ?>
                        <td align="center"><strong><?php echo lan('description')?></strong></td>
                    <?php
                    }
                    ?>
                    <td align="right"><strong><?php echo lan('debit');?></strong></td>
                    <td align="right"><strong><?php echo lan('credit');?></strong></td>
                    <td align="right"><strong><?php echo lan('balance');?></strong></td>
                </tr>
                </thead>
                <tbody>

                <?php
                if(empty($HeadName2)){
                $TotalCredit=0;
                $TotalDebit=0;
                $CurBalance = $prebalance;
                    ?>

                    <tr>
                        <td colspan="6" class="text-center text-danger">
                            <h4><?php echo lan('no_record_found')?></h4>
                        </td>
                       
                    </tr>
          

                    <?php
                }
                else{
                $TotalCredit=0;
                $TotalDebit=0;
                $CurBalance =$prebalance;
                foreach($HeadName2 as $key=>$data) {
                    ?>
                    <tr>
                        <td height="25" align="center"><?php echo ++$key;?></td>
                        <td align="center"><?php echo $data->VDate; ?></td>
                       
                        
                        <?php
                        if($chkIsTransction){
                            ?>
                            <td align="center"><?php echo $data->Narration; ?></td>
                            <?php
                        }
                        ?>

                        <td align="right"><?php echo  number_format($data->Debit,2,'.',','); ?></td>
                        <td align="right"><?php echo  number_format($data->Credit,2,'.',','); ?></td>
                        <?php
                        $TotalDebit += $data->Debit;
                        $CurBalance += $data->Debit;

                        $TotalCredit += $data->Credit;
                        $CurBalance -= $data->Credit;
                        ?>
                        <td align="right"><?php echo  number_format($CurBalance,2,'.',','); ?></td>
                        
                    </tr>
                <?php } ?>

                <tfoot>
                <tr class="table_data">
                    <?php
                            $colspan=3;
                            ?>
                    <td colspan="<?php echo $colspan;?>" align="right"><strong><?php echo lan('total')?></strong></td>                    
                    <td align="right"><strong><?php echo number_format($TotalDebit,2,'.',','); ?></strong></td>
                    <td align="right"><strong><?php echo number_format($TotalCredit,2,'.',','); ?></strong></td>
                    <td align="right"><strong><?php echo number_format($CurBalance,2,'.',','); ?></strong></td>
                </tr>
                </tfoot>
                <?php
                }
                ?>
                </tbody>
               
                     <h4 class="prbalance">
                    <?php echo lan('pre_balance')?> : <?php echo number_format($prebalance,2,'.',','); ?>
                    <br /> <?php echo lan('current_balance')?> : <?php echo number_format($CurBalance,2,'.',','); ?>
                </h4>
             
               
            </table>
                    
               
            </div> 
        </div>
    </div>
</div>

