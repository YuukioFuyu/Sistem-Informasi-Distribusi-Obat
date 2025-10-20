<div class="row justify-content-center">
 <div class="col-12 col-lg-10 col-xl-8">
 	  <div class="header p-0 ml-0 mr-0 shadow-none">
<div class="header-body">
    <div class="row align-items-center">
        <div class="col">
            <h6 class="header-pretitle fs-10 font-weight-bold text-muted text-uppercase mb-1"><?php echo lan('payments')?></h6>
            <h1 class="header-title fs-25 font-weight-600"><?php echo lan('invoice_no')?>: <?php echo $purchase->chalan_no?></h1>
        </div>
        <div class="col-auto">
            <a href="<?php echo base_url('purchase/purchase_list')?>" class="btn btn-success-soft ml-2"><i class="fas fa-align-justify mr-1"></i><?php echo lan('purchase_list')?></a>
            <a onclick="printDiv('printArea')" class="btn btn-success ml-2"><i class="typcn typcn-printer mr-1"></i><?php echo lan('print_invoice')?> </a>
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
        <p class="text-muted mb-5"><?php echo lan('invoice')?>: <?php echo esc($purchase->chalan_no)?></p>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <h4 class="text-uppercase text-success  font-weight-600"><?php echo lan('billing_from')?></h4>
               <p class="text-muted mb-4">
            <strong class="text-body fs-16"><?php echo esc($purchase->manufacturer_name);?></strong> 
            <?php if($purchase->address){?>
            <br>
           <?php echo esc($purchase->address);?> <?php }?>
           <?php if($purchase->email_address){?>
           <br>
           <?php echo esc($purchase->email_address);?>
       <?php }?>
            <br>
            P: <?php echo esc($purchase->mobile);?>
        </p>
        <h6 class="text-uppercase text-muted fs-12 font-weight-600"><?php echo lan('purchase_id')?></h6>
        <p class="mb-4"><?php echo $purchase->purchase_id;?></p>
    </div>
    <div class="col-12 col-md-6 text-md-right">
        <h4 class="text-uppercase text-success font-weight-600"><?php echo lan('billing_to')?></h4>

         <p class="text-muted mb-4">
            <strong class="text-body fs-16"><?php echo esc($settings_info->title);?>.</strong> <br>
            <?php echo esc($settings_info->address);?> <br>
            <?php echo esc($settings_info->email);?> <br>
            P: <?php echo esc($settings_info->phone);?>
        </p>
        <h6 class="text-uppercase text-muted fs-12 font-weight-600"> <?php echo lan('date')?></h6>
        <p class="mb-4"><time datetime=""> <?php echo esc($purchase->purchase_date);?></time></p>
    </div>
</div> 
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
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
                            <span class="h6 font-weight-bold"><?php echo lan('qty_box')?></span>
                        </th>
                        <th class="px-0 bg-transparent border-top-0">
                            <span class="h6 font-weight-bold"><?php echo lan('pcs')?></span>
                        </th>
                        <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6 font-weight-bold"><?php echo lan('manufacturer_price')?></span>
                        </th>

                        <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6 font-weight-bold"><?php echo lan('vat')?></span>
                        </th>

                        <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6 font-weight-bold"><?php echo lan('discount')?></span>
                        </th>

                        <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6 font-weight-bold"><?php echo lan('purchase_price')?></span>
                        </th>
                        <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6 font-weight-bold"><?php echo lan('per_pcs_price')?></span>
                        </th>

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
                            <?php echo esc($details['box_qty'])?>
                        </td>
                         <td class="px-0">
                            <?php echo esc($details['quantity'])?>
                        </td>
                         <td class="px-0 text-right">
                            <?php echo esc($details['old_mprice'])?>
                        </td>
                        <td class="px-0 text-right">
                            <?php echo esc($details['single_vat'])?>
                        </td>
                        <td class="px-0 text-right">
                            <?php echo esc($details['discount'])?>
                        </td>
                        <td class="px-0 text-right">
                            <?php echo esc($details['rate'])?>
                        </td>
                        <td class="px-0 text-right">
                           <?php echo esc($details['unit_rate'])?>
                        </td>
                        <td class="px-0 text-right">
                            <?php echo esc($details['total_amount']);
                              $sum_total += $details['total_amount'];
                            ?>
                        </td>
                    </tr>
                <?php }}?>
                   
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="9">
                            <strong><?php echo lan('sub_total')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo number_format($sum_total,2);?>
                            </span>
                        </td>
                    </tr>
                    <?php if($purchase->total_vat >0){?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="9">
                            <strong><?php echo lan('total_vat')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo $purchase->total_vat;?>
                            </span>
                        </td>
                    </tr>
                <?php }?>
                    <?php if($purchase->total_discount >0){?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="9">
                            <strong><?php echo lan('total_discount')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo $purchase->total_discount;?>
                            </span>
                        </td>
                    </tr>
                <?php }?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="9">
                            <strong><?php echo lan('grand_total')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo $purchase->grand_total_amount;?>
                            </span>
                        </td>
                    </tr>
                    <?php if($purchase->paid_amount >0){?>
                     <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="9">
                            <strong><?php echo lan('paid_amount')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo $purchase->paid_amount;?>
                            </span>
                        </td>
                    </tr>
                <?php }?>
                <?php if($purchase->due_amount >0){?>
                     <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="9">
                            <strong><?php echo lan('due_amount')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2">
                            <span class="fs-16 font-weight-600">
                               <?php echo $purchase->due_amount;?>
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
