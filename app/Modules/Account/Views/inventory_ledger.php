
 <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('inventory_ledger')?></h6>
                </div>
      <?php 
      $PreBalance=0;
    if($previous)
    {
        $PreBalance=$previous[0]['Credit'];
        $PreBalance=$PreBalance- $previous[0]['Debit'];
    }

    
                ?>
            </div>
        </div>
                 <div class="card-body">
            <?php echo form_open_multipart('account/inventory_ledger','name="form1" id="form1" class="form-inline')?>        
                        <label class="sr-only" for="from_date"><?php echo lan('start_date') ?></label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><?php echo lan('start_date') ?></div>
                                                </div>
                                                <input type="text" class="form-control datepicker" name="from_date" id="from_date" placeholder="<?php echo lan('start_date') ?>" value="<?php echo $from_date?>">
                                            </div>

                                            <label class="sr-only" for="to_date"><?php echo lan('end_date') ?></label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><?php echo lan('end_date') ?></div>
                                                </div>
                                                <input type="text" class="form-control datepicker" id="to_date" name="to_date" placeholder="<?php echo lan('end_date') ?>" value="<?php echo $to_date?>">
                                          <input type="hidden" id="txtCode" name="txtCode" value="1020101"/>
                                          <input type="hidden"  id="txtName" name="txtName" size="40" value="Cash In Hand"/>
                                            </div>
                                        
                                            <button type="submit" id="btn-filter-pur" class="btn btn-success mb-2 mt-0"><?php echo lan('find') ?></button>
                    
               
               <?php echo form_close()?>
   
                    
                    </div>


                      <div class="card-body">
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
                
                    <table width="100%" class="table table-stripped" cellpadding="6" cellspacing="1">
                       
                        <tr class="table_data">
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td colspan="3" align="right"><strong><?php echo lan('opening_balance')?></strong></td>
                            <td align="right"><?php echo number_format((!empty($PreBalance)?$PreBalance:0),2,'.',','); ?></td>
                        </tr>
                        <tr class="table_head">
                            <td align="center"><strong><?php echo lan('sl_no')?></strong></td>
                            <td align="center"><strong><?php echo lan('date')?></strong></td>
                            <td align="center" ><strong><?php echo lan('voucher_no')?></strong></td>
                            <td align="center"><strong><?php echo lan('voucher_type')?></strong></td>
                           
                             <td align="center"><strong><?php echo lan('remark')?></strong></td>
                            <td align="right"><strong><?php echo lan('debit')?></strong></td>
                            <td align="right"><strong><?php echo lan('credit')?></strong></td>
                            <td align="right" ><strong><?php echo lan('balance')?></strong></td>
                             
                        </tr>
                       
                        <?php
                        $TotalCredit=0;
                        $TotalDebit=0;
                        $VNo="";
                        $CountingNo=1;
                         foreach($oResult as $result){?>
                          <tr>
                            <?php
                                if($VNo!=$result['VNo'])
                                {
                                    ?>
                                    <td  height="25" align="center"><?php echo $CountingNo++;?></td>
                                    <td align="center"><?php echo substr($result['VDate'],0,10);?></td>
                                    <td align="center" ><?php
                                        echo $result['VNo'];
                                        ?></td>
                                       <td align="center"><?php echo $result['Vtype'];
                                            ?>

                                    </td>

                                    <?php
                                    $VNo=$result['VNo'];
                                }
                                else
                                {
                                    ?>
                                    <td colspan="4">&nbsp;</td>
                                    <?php
                                }
                                ?>
                                <td align="center"><?php echo $result['Narration'];?></td>
                                 <td  align="right"><?php
                                    $TotalDebit += $result['Debit'];
                                    $PreBalance += $result['Debit'];
                                    echo number_format($result['Debit'],2,'.',',');?></td>
                                <td align="right"><?php
                                    $TotalCredit += $result['Credit'];
                                    $PreBalance -= $result['Credit'];
                                    echo number_format($result['Credit'],2,'.',',');?></td>
                               
                                <td align="right"><?php echo number_format((!empty($PreBalance)?$PreBalance:0),2,'.',','); ?></td>
                              </tr>
                        <?php }?>
                        <tr class="table_data print-footercolor">
                            <td align="center" bgcolor="green">&nbsp;</td>
                            <td align="center"  bgcolor="green">&nbsp;</td>
                            <td align="center"  bgcolor="green">&nbsp;</td>
                            <td align="center"  bgcolor="green">&nbsp;</td>
                            <td  align="right"  bgcolor="green"><strong><?php echo lan('total')?></strong></td>
                            <td  align="right"  bgcolor="green"><?php echo number_format($TotalDebit,2,'.',','); ?></td>
                            <td  align="right"  bgcolor="green"><?php echo number_format($TotalCredit,2,'.',','); ?></td>
                            <td  align="right"  bgcolor="green"><?php echo number_format((!empty($PreBalance)?$PreBalance:0),2,'.',','); ?></td>
                            
                        </tr>

                    </table>
   
                    
                    </div>
                 
                    </div>
                    </div>
           

                    </div>