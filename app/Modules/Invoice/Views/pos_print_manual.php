
        <div class="col-lg-3 col-sm-3">


            <!--/.End of header-->
            
            <div class="card card-body pl-4" >
     

              <div class="row" id="printArea">
                <table border="0" class="p-4 m-4">
                    <tbody>
                        <tr>
                            <td>
                                <table border="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td align="center" class="text-center">
                                                 <img src="<?php echo base_url().'/'.$company->logo?>" alt="" height="80px" width="250px"> 
                                                <div>
                                                	<?php echo  $company->title;?><br>
                                                   <?php echo  $company->address;?><br />
                                                    <?php echo  $company->phone;?>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="minpos-bordertop" style="border-top: #333 1px solid;"></td>
                                        </tr>
                                        <tr>
                                            <td align="center"><b><?php echo $main->customer_name;?></b><br /></td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <time datetime="2008-02-14 20:00">Date: <?php echo $main->date;?></time>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Invoice No : <?php echo $main->invoice;?></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                      <?php 
                                     $total_dis = 0;
                                      foreach($details as $dis_per){
                                        $total_dis += $dis_per['discount'];
                                      }
                                      $colspan = 0;
                                       if($total_dis > 0){
                                         $colspan = 1;
                                       }
                                      ?>
                                <table width="100%">
                                    <tbody>
                                        <tr class="border_bottom">
                                            <td align="center">SL.</td>
                                            <td align="center">Item</td>
                                            <td align="center">Qty</td>
                                            <td align="center"></td>
                                            <td align="right">Rate</td>
                                             <?php if($total_dis > 0){?>
                                             <td align="right">Dis</td> 	
                                             <?php }?>
                                            <td align="right">Amount</td>
                                        </tr>

                                      <?php
                                     
                                      $sl = 1;
                                      $total = 0;
                                       foreach($details as $details){?>
                               <tr>
                                <td align="center"><nobr><?php echo $sl++;?></nobr></td>
                                <td align="center"><nobr><?php echo $details['product_name'].'('.$details['strength'].')';?></nobr></td>
                                <td align="center"><nobr><?php echo $details['quantity']?></nobr></td>
                                <td align="right"></td>
                                <td align="right"><nobr>
                                     <?php echo $details['rate']?></nobr>
                                </td>
                                <?php if($total_dis > 0){?>
                                <td align="right"><?php echo $details['discount']?></td>
                                	 <?php }?>
                                <td align="right"><nobr>
                                      <?php echo $details['total_price'];
                                      $total  += $details['total_price'];
                                      ?></nobr>
                                </td>

                               </tr>
                                      <?php }?>
                                      
                                        <tr>
                                            <td colspan="<?php echo 6+$colspan ?>" class="minpos-bordertop" style="border-top: #333 1px solid;"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="<?php echo 6+$colspan ?>" class="minpos-bordertop"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Sales By :<?php echo $main->firstname.' '.$main->lastname;?></td>
                                            <td align="right" colspan="<?php echo 3+$colspan ?>">Total :</td>
                                            <td align="right">
                                               <nobr> <?php echo $company->currency.' '.$total ?></nobr>
                                            </td>
                                        </tr>
                                        <?php if($main->total_discount > 0){?>
                                          <tr>
                                            
                                            <td align="right" colspan="<?php echo 5+$colspan ?>">Invoice Discount :</td>
                                            <td align="right">
                                                <nobr><?php echo $company->currency.' '.$main->invoice_discount ?></nobr>
                                            </td>
                                        </tr>
                                    <?php }?>
                                   <?php if($main->total_tax > 0){?>
                                        <tr>
                                            
                                            <td align="right" colspan="<?php echo 5+$colspan ?>"><?php echo lan('total_vat')?> :</td>
                                            <td align="right">
                                                <nobr><?php echo $company->currency.' '.$main->total_tax ?></nobr>
                                            </td>
                                        </tr>
                                    <?php }?>
                                      <?php if($main->prevous_due > 0){?>
                                         <tr>
                                            
                                            <td align="right" colspan="<?php echo 5+$colspan ?>">Previous :</td>
                                            <td align="right">
                                                <nobr><?php echo $company->currency.' '.$main->prevous_due ?></nobr>
                                            </td>
                                        </tr>
                                        <?php }?>
                                        <tr>
                                            <td colspan="<?php echo 5+$colspan ?>" class="minpos-bordertop"></td>
                                        </tr>
                                        <tr>
                                           
                                            <td align="right" colspan="<?php echo 5+$colspan ?>"><strong>Grand Total :</strong></td>
                                            <td align="right">
                                                <strong> <nobr><?php echo $company->currency.' '.$main->total_amount ?></nobr> </strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="<?php echo 5+$colspan ?>" class="minpos-bordertop"></td>
                                        </tr>
                                        <tr>
                                            
                                            <td align="right" colspan="<?php echo 5+$colspan ?>">
                                                Paid Amount :
                                            </td>
                                            <td align="right">
                                               <nobr> <?php echo $company->currency.' '.$main->paid_amount ?></nobr>
                                            </td>
                                        </tr>
                                        <?php if($main->due_amount > 0){?>
                                        <tr>
                                            
                                            <td align="right" colspan="<?php echo 5+$colspan ?>">Due :</td>
                                            <td align="right">
                                               <nobr> <?php echo $company->currency.' '.$main->due_amount ?></nobr>
                                            </td>
                                        </tr>
                                    <?php }?>

                                        <?php $change = $main->paid_amount - $main->total_amount;?>
                                        <?php if($change > 0){?>

                                        <tr>
                                            
                                            <td align="right" colspan="<?php echo 5+$colspan ?>">Change :</td>
                                            <td align="right">
                                               <nobr> <?php echo $company->currency.' '.$change ?></nobr>
                                            </td>
                                        </tr>
                                       <?php }?>
                                        <tr>
                                            <td colspan="<?php echo 6+$colspan ?>" class="minpos-bordertop" style="border-top: #333 1px solid;margin-bottom: 10px;" align="center"></td>
                                        </tr>
                                         <tr>
                                            <td colspan="<?php echo 6+$colspan ?>" class="text-center minpos-bordertop" align="center">
                                            	<?php $invoice_no = $main->invoice;?>
                                            	 <img class="img-responsive center-block barcode-image" alt="" src="<?= base_url('vendor/barcode.php?size=30&text='.$invoice_no.'&print=true')?>" >
                                            	
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr colspan="6">
                            <td align="center">
                                Powered By: <a href="javascript:void(0)"><strong><?php echo  $company->title;?></strong></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
            <div class="row align-items-center">
      
        <div class="col-auto">
            <a href="<?php echo base_url('invoice/invoice_list')?>" class="btn btn-success-soft ml-2"><i class="fas fa-align-justify mr-1"></i>invoice List</a>
            <a src="javascript:void(0)" onclick="printDiv('printArea')" class="btn btn-success ml-2"><i class="typcn typcn-printer mr-1"></i>Print Invoice </a>
        </div>
    </div> 
        </div>
