<div class="row justify-content-center">
 <div class="col-12 col-lg-10 col-xl-8">
 	  <div class="header p-0 ml-0 mr-0 shadow-none">
<div class="header-body">
    <div class="row align-items-center">
        <div class="col">
            <h6 class="header-pretitle fs-10 font-weight-bold text-muted text-uppercase mb-1">Payments</h6>
            <h1 class="header-title fs-25 font-weight-600">Invoice No: <?php echo $main->voucher_no?></h1>
        </div>
        <div class="col-auto">
            <a href="<?php echo base_url('service/service_invoice_list')?>" class="btn btn-success-soft ml-2"><i class="fas fa-align-justify mr-1"></i>invoice List</a>
            <a src="javascript:void(0)" onclick="printDiv('printArea')" class="btn btn-success ml-2 text-white"><i class="typcn typcn-printer mr-1"></i>Print Invoice </a>
        </div>
    </div> 
</div>
</div>


<div class="card card-body p-5">
<div class="" id="printArea">
<div class="row">
    <div class="col text-center">
        <img src="<?php echo base_url().$settings_info->logo;?>" alt="..." class="img-fluid mb-4">
        <h4 class="mb-0 font-weight-bold"><?php echo $settings_info->title;?></h4>
        <p class="text-muted mb-5">Invoice: <?php echo $main->voucher_no?></p>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <h6 class="text-uppercase text-muted fs-12 font-weight-600">Invoiced from</h6>
        <p class="text-muted mb-4">
            <strong class="text-body fs-16"><?php echo $settings_info->title;?>.</strong> <br>
            <?php echo $settings_info->address;?> <br>
            <?php echo $settings_info->email;?> <br>
            P: <?php echo $settings_info->phone;?>
        </p>
        <h6 class="text-uppercase text-muted fs-12 font-weight-600">Invoiced No</h6>
        <p class="mb-4"><?php echo $main->voucher_no;?></p>
    </div>
    <div class="col-12 col-md-6 text-md-right">
        <h6 class="text-uppercase text-muted fs-12 font-weight-600">Invoiced to</h6>
        <p class="text-muted mb-4">
            <strong class="text-body fs-16"><?php echo $main->customer_name;?></strong> 
            <?php if($main->customer_address){?>
            <br>
           <?php echo $main->customer_address;?> <?php }?>
           <?php if($main->email_address){?>
           <br>
           <?php echo $main->email_address;?>
       <?php }?>
            <br>
            P: <?php echo $main->customer_mobile;?>
        </p>
        <h6 class="text-uppercase text-muted fs-12 font-weight-600"> invoice date</h6>
        <p class="mb-4"><time datetime=""> <?php echo $main->date;?></time></p>
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
                            <span class="h6 font-weight-bold"><?php echo lan('service_name')?></span>
                        </th>
                        <th class="px-0 bg-transparent border-top-0">
                            <span class="h6 font-weight-bold"><?php echo lan('quantity')?></span>
                        </th>
                        <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6 font-weight-bold"><?php echo lan('charge')?></span>
                        </th>
                         <?php if($total_dis > 0){?>
                         <th class="px-0 bg-transparent border-top-0 text-right"><span class="h6 font-weight-bold">Dis</span></th>
                            <?php }?>
                         <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6 font-weight-bold">Total</span>
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
                            <?php echo $details['service_name']?>
                        </td>
                        <td class="px-0">
                            <?php echo $details['qty']?>
                        </td>
                        <td class="px-0 text-right">
                           <?php echo $details['charge']?>
                        </td>

                          <?php if($total_dis > 0){?>
                                <td class="px-0 text-right"><?php echo $details['discount']?></td>
                                     <?php }?>
                        <td class="px-0 text-right">
                            <?php echo $details['total'];
                              $sum_total += $details['total'];
                            ?>
                        </td>
                    </tr>
                <?php }}?>
                   
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong>Total amount</strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo number_format($sum_total,2);?>
                            </span>
                        </td>
                    </tr>
                    <?php if($main->invoice_discount > 0){?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong>Invoice Discount</strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo $main->invoice_discount;?>
                            </span>
                        </td>
                    </tr>
                <?php }?>

                      <?php if($main->previous > 0){?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong>Previous</strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo $main->previous;?>
                            </span>
                        </td>
                    </tr>
                <?php }?>

                      <?php if($main->total_tax > 0){?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong><?php echo lan('total_vat')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo $main->total_tax;?>
                            </span>
                        </td>
                    </tr>
                <?php }?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong>Grand Total</strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo $main->total_amount;?>
                            </span>
                        </td>
                    </tr>
                    <?php if($main->paid_amount >0){?>
                     <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong>Paid Amount</strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo $main->paid_amount;?>
                            </span>
                        </td>
                    </tr>
                <?php }?>
                <?php if($main->due_amount >0){?>
                     <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>">
                            <strong>Due Amount</strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo $main->due_amount;?>
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
