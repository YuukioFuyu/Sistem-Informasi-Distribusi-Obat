<div class="row justify-content-center">
 <div class="col-12 col-lg-10 col-xl-8">
 	  <div class="header p-0 ml-0 mr-0 shadow-none">
<div class="header-body">
    <div class="row align-items-center">
        <div class="col">
            <h6 class="header-pretitle fs-10 font-weight-bold text-muted text-uppercase mb-1"><?php echo lan('payments')?></h6>
            <h1 class="header-title fs-25 font-weight-600"><?php echo lan('invoice_no')?>: <?php echo $invoice->invoice?></h1>
        </div>
        <div class="col-auto">
            <a href="<?php echo base_url('invoice/invoice_list')?>" class="btn btn-success-soft ml-2"><i class="fas fa-align-justify mr-1"></i><?php echo lan('invoice_list')?></a>
            <a src="javascript:void(0)" onclick="printDiv('printArea')" class="btn btn-success ml-2"><i class="typcn typcn-printer mr-1"></i><?php echo lan('print_invoice')?> </a>
        </div>
    </div> 
</div>
</div>


<div class="card card-body p-5">
<div class="" id="printArea">
<div class="row">
    <div class="col text-center">
        <img src="<?php echo base_url().$settings_info->logo;?>" alt="..." class="img-fluid mb-4" height="100px" width="250px;">
        <h4 class="mb-0 font-weight-bold"><?php echo esc($settings_info->title);?></h4>
        <p class="text-muted mb-5"><?php echo lan('invoice')?>: <?php echo esc($invoice->invoice)?></p>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <h3 class="text-uppercase text-success font-weight-600"><?php echo lan('billing_from')?></h3>
        <p class="text-muted mb-4">
            <strong class="text-body fs-16"><?php echo esc($settings_info->title);?>.</strong> <br>
            <?php echo esc($settings_info->address);?> <br>
            <?php echo esc($settings_info->email);?> <br>
            P: <?php echo esc($settings_info->phone);?>
        </p>
        <h6 class="text-uppercase text-muted fs-12 font-weight-600"><?php echo lan('invoice_no')?></h6>
        <p class="mb-4"><?php echo esc($invoice->invoice);?></p>
    </div>
    <div class="col-12 col-md-6 text-md-right">
        <h3 class="text-uppercase text-success font-weight-600"><?php echo lan('billing_to')?></h3>
        <p class="text-muted mb-4">
            <strong class="text-body fs-16"><?php echo esc($invoice->customer_name);?></strong> 
            <?php if($invoice->customer_address){?>
            <br>
           <?php echo esc($invoice->customer_address);?> <?php }?>
           <?php if($invoice->email_address){?>
           <br>
           <?php echo esc($invoice->email_address);?>
       <?php }?>
            <br>
            P: <?php echo esc($invoice->customer_mobile);?>
        </p>
        <h6 class="text-uppercase text-muted fs-12 font-weight-600"> <?php echo lan('date')?></h6>
        <p class="mb-4"><time datetime=""> <?php echo esc($invoice->date);?></time></p>
    </div>
</div> 
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
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
            <table class="table my-4">
                <thead>
                    <tr>
                    	 <th class="px-0 bg-transparent border-top-0">
                            <span class="h6 font-weight-bold"><?php echo lan('sl_no')?></span>
                        </th>
                        <th class="px-0 bg-transparent border-top-0">
                            <span class="h6 font-weight-bold"><?php echo lan('medicine_name')?></span>
                        </th>
                        <th class="px-0 bg-transparent border-top-0">
                            <span class="h6 font-weight-bold"><?php echo lan('quantity')?></span>
                        </th>
                        <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6 font-weight-bold"><?php echo lan('price')?></span>
                        </th>
                         <?php if($total_dis > 0){?>
                         <th class="px-0 bg-transparent border-top-0 text-right"><span class="h6 font-weight-bold"><?php echo lan('discount')?></span></th>
                            <?php }?>
                         <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6 font-weight-bold"><?php echo lan('total_amount')?></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                	<?php
                	  $sum_total = 0;
                	 if($details){
                		$sl = 1;
                		foreach($details as $details){?>
                    <tr>
                    	<td class="px-0"><?php echo $sl++;?></td>
                        <td class="px-0">
                            <?php echo esc($details['product_name']).' ('.esc($details['strength']).')'?>
                        </td>
                        <td class="px-0">
                            <?php echo esc($details['quantity'])?>
                        </td>
                        <td class="px-0 text-right">
                           <?php echo esc($details['rate'])?>
                        </td>

                          <?php if($total_dis > 0){?>
                                <td class="px-0 text-right"><?php echo esc($details['discount'])?></td>
                                     <?php }?>
                        <td class="px-0 text-right">
                            <?php echo esc($details['total_price']);
                              $sum_total += $details['total_price'];
                            ?>
                        </td>
                    </tr>
                <?php }}?>
                   
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong><?php echo lan('sub_total')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo number_format($sum_total,2);?>
                            </span>
                        </td>
                    </tr>
                    <?php if($invoice->invoice_discount > 0){?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong><?php echo lan('invoice_discount')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo esc($invoice->invoice_discount);?>
                            </span>
                        </td>
                    </tr>
                <?php }?>

                      <?php if($invoice->prevous_due > 0){?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong><?php echo lan('previous')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo esc($invoice->prevous_due);?>
                            </span>
                        </td>
                    </tr>
                <?php }?>

                      <?php if($invoice->total_tax > 0){?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong><?php echo lan('total_vat')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo esc($invoice->total_tax);?>
                            </span>
                        </td>
                    </tr>
                <?php }?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong><?php echo lan('grand_total')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo esc($invoice->total_amount);?>
                            </span>
                        </td>
                    </tr>
                    <?php if($invoice->paid_amount >0){?>
                     <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong><?php echo lan('paid_amount')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo esc($invoice->paid_amount);?>
                            </span>
                        </td>
                    </tr>
                <?php }?>
                <?php if($invoice->due_amount >0){?>
                     <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong><?php echo lan('due_amount')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo esc($invoice->due_amount);?>
                            </span>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
        <hr class="my-5">
        <h6 class="text-uppercase font-weight-bold">Comments </h6>
        <p class="text-muted mb-0">
            thank you
        </p>
    </div>
</div>
</div>
</div>
 </div>
</div>
