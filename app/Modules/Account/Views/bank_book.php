
 <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('bank_book')?></h6>
                </div>

            </div>
        </div>
                 <div class="card-body">
                          <?php 
      $PreBalance=0;
    if($previous)
    {
        $PreBalance=$previous[0]['Credit'];
        $PreBalance=$PreBalance- $previous[0]['Debit'];
    }

    
                ?>
            <?php echo form_open_multipart('account/bank_book','name="form1" id="form1"')?>        
                        <div class="form-group row">
                        <label for="account_head" class="col-sm-2 col-form-label"><?php echo lan('account_head')?></label>
                        <div class="col-sm-4">
                            <input type="hidden" id="txtName" name="txtName"/>
                             <select name="cmbCode" class="form-control select2" onchange="cmbCode_bankbookonchange()" id="cmbCode" required="">
                                <option value="">Select Head</option>
                                
                                   <?php foreach($bank_head as $head){?>
                                   <option value="<?php echo esc($head['HeadCode'])?>"><?php echo esc($head['HeadName'])?></option>
                                    <?php }?>
                                </select>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-warning"  onclick="printDiv('printArea')">Print</button>
                        </div>
                    </div> 
                     <div class="form-group row">
                        <label for="account_code" class="col-sm-2 col-form-label"><?php echo lan('account_code')?></label>
                        <div class="col-sm-4">
                            <input type="text" name="txtCode" id="txtCode" size="40" readonly="readonly" class="form-control"/>
                        </div>
                    </div> 
                     <div class="form-group row">
                        <label for="from_date" class="col-sm-2 col-form-label"><?php echo lan('from_date')?></label>
                        <div class="col-sm-4">
                           <input type="text" name="from_date" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo lan('date') ?>" class="datepicker form-control" required>
                        </div>
                    </div> 
                     <div class="form-group row">
                        <label for="to_date" class="col-sm-2 col-form-label"><?php echo lan('to_date')?></label>
                        <div class="col-sm-4">
                            <input type="text"  name="to_date" value="<?php echo date('Y-m-d')?>" placeholder="<?php echo lan('date') ?>" class="datepicker form-control" required>
                        </div>
                    </div> 
                    <div class="form-group row">
                      <lable class="col-sm-2"></lable>
                        <div class="col-sm-4">
                            <button type="submit" id="btn-filter-pur" class="btn btn-success mb-2 mt-0 form-control"><?php echo lan('search') ?></button>
                        </div>
                    </div> 

                                           
               <?php echo form_close()?>
   
                    
                    </div>
                    <hr>
<div class="row">
<div class="card-body" id="printArea">
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
    <center><caption class="text-center">
                            <font size="+1"> <strong><?php echo lan('bank_book_report_of')?> <?php echo (!empty($HeadName)?$HeadName:'') ?> (<?php echo lan('on')?> <?php echo (!empty($from_date)?$from_date:''); ?> <?php echo lan('to')?> <?php echo (!empty($to_date)?$to_date:'');?>)</strong></font>
                        </caption> 
                    </center>
                <table width="100%" class="table table-stripped" cellpadding="1" cellspacing="1">
                        
                        <tr class="table_data">
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td align="center">&nbsp;</td>
                            <td colspan="2" align="right"><b><?php echo lan('opening_balance')?></b></td>
                            <td align="right"><?php echo esc(number_format((!empty($PreBalance)?$PreBalance:0),2,'.',',')); ?></td>
                        </tr>
                        <tr class="table_head">
                            <td height="25"><b><?php echo lan('sl')?></b></td>
                            <td align="center"><b><?php echo lan('date')?></b></td>
                            <td align="center" ><b><?php echo lan('voucher_no')?></b></td>
                            <td align="center"><b><?php echo lan('type')?></b></td>
                            <td align="center"><b><?php echo lan('remark')?></b></td>
                            <td align="right"><b><?php echo lan('debit')?></b></td>
                            <td align="right"><b><?php echo lan('credit')?></b></td>
                            <td align="right" ><b><?php echo lan('balance')?></b></td>
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
                                        echo esc($result['VNo']);
                                        ?></td>
                                       <td align="center"><?php echo esc($result['Vtype']);
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
                            <td bgcolor="green">&nbsp;</td>
                            <td align="center" bgcolor="green">&nbsp;</td>
                            <td align="center" bgcolor="green">&nbsp;</td>
                            <td align="center" bgcolor="green">&nbsp;</td>
                            <td  align="right" bgcolor="green"><strong><?php echo lan('total')?></strong></td>
                            <td  align="right" bgcolor="green"><?php echo esc(number_format($TotalDebit,2,'.',',')); ?></td>
                            <td  align="right" bgcolor="green"><?php echo esc(number_format($TotalCredit,2,'.',',')); ?></td>
                            <td  align="right" bgcolor="green"><?php echo esc(number_format((!empty($PreBalance)?$PreBalance:0),2,'.',',')); ?></td>
                        </tr>

                    </table>

</div>
                 
                 </div>
                    </div>
                    </div>
           

                    </div>
