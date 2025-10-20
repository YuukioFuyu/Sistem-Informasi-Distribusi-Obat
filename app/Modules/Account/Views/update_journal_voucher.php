
    <div class="row">
         <div class="col-md-12 col-lg-12">
            <div class="card">
    <div class="card-header py-2">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('update_journal_voucher')?></h6>
            </div>
            <div class="text-right">
              
              
            </div>
        </div>
    </div>
             <div class="card-body">

 <?php echo  form_open_multipart('account/update_journal_voucher','id="journal_voucher_form"') ?>
                     <div class="form-group row">
                        <label for="vo_no" class="col-sm-2 col-form-label"><?php echo lan('voucher_no')?></label>
                        <div class="col-sm-4">
                             <input type="text" name="txtVNo" id="txtVNo" value="<?php echo $voucher_info[0]['VNo'];?>" class="form-control" readonly>
                        </div>
                    </div> 
                    
                     <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label"><?php echo lan('date')?></label>
                        <div class="col-sm-4">
                             <input type="text" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php echo $voucher_info[0]['VDate'];?>">
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="txtRemarks" class="col-sm-2 col-form-label"><?php echo lan('remark')?></label>
                        <div class="col-sm-4">
                          <textarea  name="txtRemarks" id="txtRemarks" class="form-control"><?php echo $voucher_info[0]['Narration'];?></textarea>
                        </div>
                    </div> 
                       <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="debtAccVoucher"> 
                                <thead>
                                    <tr>
                               <th class="text-center"> <?php echo lan('account_name')?></th>
                                <th class="text-center"> <?php echo lan('code')?></th>
                                <th class="text-center"> <?php echo lan('debit')?></th>
                                <th class="text-center"> <?php echo lan('credit')?></th>
                                <th class="text-center"> <?php echo lan('action')?></th> 
                                    </tr>
                                </thead>
                                <tbody id="debitvoucher">
                                   <?php
                                   $sl = 1;
                                   $total_debit = 0;
                                   $total_credit = 0;
                                    foreach($voucher_info as $vinfo){
                                      $total_debit += $vinfo['Debit'];
                                      $total_credit += $vinfo['Credit'];
                                      ?>
                                    <tr>
                                        <td class="" width="300">  
       <select name="cmbCode[]" id="cmbCode_<?php echo $sl?>" class="form-control" onchange="load_dbtvouchercode(this.value,<?php echo $sl?>)">
         <?php foreach ($acc as $acc1) {?>
   <option value="<?php echo $acc1->HeadCode;?>" <?php if($vinfo['COAID'] == $acc1->HeadCode){echo 'selected';}?>><?php echo $acc1->HeadName;?></option>
         <?php }?>
       </select>

                                         </td>
                                        <td><input type="text" name="txtCode[]"  class="form-control " value="<?php echo $vinfo['COAID'];?>"  id="txtCode_<?php echo $sl?>" readonly></td>
                                        <td><input type="text" name="txtAmount[]" value="<?php echo $vinfo['Debit'];?>" class="form-control total_price text-right valid_number"  id="txtAmount_<?php echo $sl?>" onkeyup="calculationContravoucher(<?php echo $sl?>)" >
                                           </td>
                                            <td ><input type="text" name="txtAmountcr[]" value="<?php echo $vinfo['Credit'];?>" class="form-control total_price1 text-right valid_number"  id="txtAmount<?php echo $sl?>_<?php echo $sl?>" onkeyup="calculationContravoucher(<?php echo $sl?>)" >
                                           </td>
                                       <td>
                                                <button class="btn btn-danger-soft red" type="button" value="<?php echo lan('delete')?>" onclick="deleteRowContravoucher(this)"><i class="far fa-trash-alt"></i></button>
                                            </td>
                                    </tr>   
                                    <?php $sl++;}?>                           
                              
                                </tbody>                               
                             <tfoot>
                                    <tr>
                                     
                                        <td colspan="2" class="text-right"><label  for="reason" class="  col-form-label"><?php echo lan('total') ?></label>
                                           </td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="form-control text-right " name="grand_total" value="<?php echo $total_debit;?>" readonly="readonly" value="0"/>
                                        </td>
                                         <td class="text-right">
                                            <input type="text" id="grandTotal1" class="form-control text-right " name="grand_total1" value="<?php echo $total_credit;?>" readonly="readonly" value="0"/>
                                        </td>
                                           <td><a id="add_more" class="btn btn-info-soft" name="add_more"  onClick="addaccountContravoucher('debitvoucher')"><i class="fa fa-plus"></i></a></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="form-group row">
                           
                            <div class="col-sm-12 text-right">

                                <input type="submit" id="add_receive" class="btn btn-success btn-large" name="save" value="<?php echo lan('update') ?>" tabindex="9"/>
                               
                            </div>
                        </div>
                  <?php echo form_close() ?>
                
                </div>
               <input type="hidden" id="headoption" value="<option value=''>Select One</option><?php foreach ($acc as $acc2) {?><option value='<?php echo $acc2->HeadCode;?>'><?php echo $acc2->HeadName;?></option><?php }?>" name="">
                </div>
                </div>
       

                </div>
                  
