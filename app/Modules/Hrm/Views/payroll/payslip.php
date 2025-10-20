 <link href="<?php echo base_url('assets/dist/css/payslip.css') ?>" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="col-lg-12 col-md-12 ">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('payslip')?></h6>
                                    
                                </div>
                                <div class="text-right">
                                  <button  class="btn btn-warning" onclick="printDiv('printableArea')"><span class="fas fa-print"></span></button>
                                 
                                </div>
                            </div>
                        </div>
                        <div id="printableArea">
            <div class="card-body" id="payslip">
                     <div class="row" >
                                
                        <div class="col-lg-12">

                           

<div class="row">
    <div class="col-12 col-md-6">
        <img src="<?php echo(!empty($settings_info->logo)?base_url().'/'.$settings_info->logo:'') ?>" width="250px;" alt="">
         <div id="details">
        <div class="scope-entry">
            <div class="title"><?php echo  lan('employee_name')?> :<?php echo  $paymentdata[0]['first_name'].' '.$paymentdata[0]['last_name']?></div>
            <div class="title"><?php echo  lan('designation')?>   : <?php echo  $paymentdata[0]['position_name']?></div>
            <div class="title"><?php echo  lan('salary_date')?>   : <?php echo  $paymentdata[0]['payment_date']?></div>
            
        </div>
        
    </div>
    </div>
    <div class="col-12 col-md-6 text-center">
       <address class="margin-top10">
                            <strong class="font30"><?php echo (!empty($settings_info->title)?$settings_info->title:'Bdtask Ltd')?></strong><br>
                                        <?php echo (!empty($settings_info->address)?$settings_info->address:'Demo Address')?><br>
                                       <b> Salary Slip - <?php echo  $paymentdata[0]['salary_month']?></b>
                                    </address>
    </div>
</div> 



                            <table class="table">
                                <tr>
                                    <td class="left-panel borderright"> 
                                     <table class="" width="100%">
                                        
                                    <thead>
                                        <tr class="employee">
                                            <th class="name text-center border-bottom" colspan="2"><?php echo lan('earnings'); ?></th>
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody class="details">
                                      
                                        <tr class="entry">
                                            <td class="value"><?php if($paymentdata[0]['salarytype'] == 1){ echo lan('basic_salary');}else{echo lan('basic_salary');}?></td>
                                            <td class="value"><div><?php if($paymentdata[0]['salarytype'] == 1){  $basicsal = $paymentdata[0]['basic']*$paymentdata[0]['total_working_minutes'];
                                               echo number_format($basicsal, 2, '.', '');
                                        }else{echo $basicsal = number_format($paymentdata[0]['basic'], 2, '.', '');}?></div></td>
                                           
                                        </tr>
                                        <?php 
                                        $totalAddition = 0;
                                        foreach($addition as $additions){?>
                                         <tr class="entry">
                                            <td class="value"><?php echo  $additions->benefit_name;?></td>
                                            <td class="value"><div><?php  $additionval =  $basicsal*($additions->amount)/100;
                                            $totalAddition +=$basicsal*($additions->amount)/100;
                                            echo number_format($additionval, 2, '.', '');
                                            ?></div></td>
                                           
                                        </tr>
                                    <?php }?>
                                         
                                        <tr class="entry nti">
                                             <td class="value text-left"><?php echo  lan('total_addition')?></td>
                                            <td class="value"><b><?php echo number_format($totalAddition+$basicsal,2); ?></b></td>
                                        </tr>
                              
                                      
                                    </tbody>
                                </table></td>
                                    <td  class="right-panel">  <table class="" width="100%">
                                        
                                  
                                        
                                    <thead>
                                        <tr class="employee">
                                            <th class="name text-center border-bottom" colspan="2"><?php echo lan('deduction'); ?></th>
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody class="details">
                                      <?php 
                                      $totalDeduction = 0;
                                      foreach($deduction as $deductions){?>
                                        <tr class="entry">
                                            <td class="value"><?php echo  $deductions->benefit_name; ?></td>
                                            <td class="value"><div><?php  $deductedval =  $basicsal*($deductions->amount)/100;
                                            $totalDeduction +=$basicsal*($deductions->amount)/100;
                                            echo number_format($deductedval,2);
                                            ?></div></td>
                                           
                                        </tr>
                                    <?php }?>
                                    <?php $gross = $totalAddition+($basicsal-$totalDeduction);
                                     if($paymentdata[0]['total_salary'] < $gross){
                                    ?>
                                     <tr class="entry">
                                            <td class="value"><?php echo  lan('tax')?></td>
                                            <td class="value"><div><?php  $tax = $gross - intval(str_replace(',', '', $paymentdata[0]['total_salary']));
                                            echo $totaltax = number_format($tax,2);
                                            ?></div></td>
                                           
                                        </tr>
                                <?php }?>
                                       
                                         <tr class="entry nti">
                                             <td class="value text-left"><?php echo  lan('total_deduction')?></td>
                                            <td class="value"><b><?php echo number_format($totalDeduction+(!empty($totaltax)?$totaltax:0),2); ?></b></td>
                                        </tr>
                                        
                                    </tbody>
                                
                                </table></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                              
                           
                            <div class="row">

                               
                                <div class="col-lg-12">

                                    <table class="table">
                                   
                                      
                                            <tr class="details">
                                                <tbody class="nti">
                                                <th class="value text-right"><?php echo lan('net_salary'); ?> : </th>
                                                <td class="value text-right"><b><?php echo  $paymentdata[0]['total_salary']?></b> </td>
                                                </tbody>
                                            </tr>
                                             
                                      
                                    </table>

                                   

                                </div>
                            </div>
                             <div class="row paddingbottom">
                                <div class="col-lg-12">
                             
                                        <div class="col-lg-6 text-left"><b><?php echo  lan('ref_number')?>: .........</b></div>
                                    
                                </div>
                              
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                 <div  class="employee-signature">
                                        <?php echo lan('employee_signature'); ?>
                                    </div>
                                </div>
                              
                                     <div class="col-lg-6"> <div  class="paidby">
                                        <?php echo lan('paid_by'); ?>
                                    </div></div>
                            </div>
             
            </div> 
        </div>
    </div>
    </div>
    
</div>

