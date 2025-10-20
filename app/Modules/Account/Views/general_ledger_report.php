
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('general_ledger')?></h6>
                </div>
                <div class="text-right">
                  <a href="<?php echo base_url('account/general_ledger')?>" class="btn btn-primary-soft">Back</a>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
         <div id="printArea">
             <table class="print-table" width="100%">
                                                
                                                <tr>
                                                    <td align="left" class="print-table-tr">
                                                        <img src="<?php echo base_url().'/'.$settings_info->logo;?>" alt="logo">
                                                    </td>
                                                    <td align="center" class="print-cominfo">
                                                        <span class="company-txt">
                                                            <?php echo esc($settings_info->title);?>
                                                           
                                                        </span><br>
                                                        <?php echo esc($settings_info->address);?>
                                                        <br>
                                                        <?php echo esc($settings_info->email);?>
                                                        <br>
                                                         <?php echo esc($settings_info->phone);?>
                                                        
                                                    </td>
                                                   
                                                     <td align="right" class="print-table-tr">
                                                        <date>
                                                        <?php echo lan('date')?>: <?php
                                                        echo date('d-M-Y');
                                                        ?> 
                                                    </date>
                                                    </td>
                                                </tr>            
                                   
                                </table>
            <table class="table" width="99%" align="center"  cellpadding="5" cellspacing="5" border="2"> 

                <thead>
                <tr align="center" class="">

                    <td colspan="7"><font size="+1"> <strong ><?php echo lan('general_ledger_of').'- '.$ledger[0]['HeadName'].' ('.lan('on')?> <span class="text-"><?php echo $dtpFromDate ?></span> <?php echo lan('to')?>  <span class="text"> <?php echo $dtpToDate;?></span>)</strong></font><strong></th></strong>
                </tr>

                <tr>
                    <td height="25" align="center"><strong><?php echo lan('sl');?></strong></td>
                    <td align="center"><strong><?php echo "Transaction Date";?></strong></td>
                    <td align="center"><strong><?php echo !empty($Trans)?"Transaction Date":"Head Code";?></strong></td>
                    
                    <?php
                    if($chkIsTransction){
                        ?>
                        <td align="center"><strong><?php echo lan('particulars')?></strong></td>
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
                if((!empty($error)?$error:'')){
                    ?>

                    <tr>
                        <td height="25"></td>
                        <td></td>
                        <td><?php echo lan('no_record_found')?>.</td>
                        <?php
                        if($chkIsTransction){
                            ?>
                            <td></td>
                            <?php
                        }
                        ?>

                        <td align="right"></td>
                        <td align="right"></td>
                        <td align="right"></td>
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
                        <td align="center"><?php echo $data->COAID; ?></td>
                        
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
                        if($chkIsTransction)
                            $colspan=4;
                        else
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
            <div class="text-center" id="print">
                <input type="button" class="btn btn-warning" name="btnPrint" id="btnPrint" value="Print" onclick="printDiv('printArea');"/>
                
            </div>
                    
                    </div>
                    </div>
                    </div>
           

                    </div>

                      

