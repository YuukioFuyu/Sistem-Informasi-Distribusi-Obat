<div class="row justify-content-center">
 <div class="col-12 col-lg-10 col-xl-8">
 	  <div class="header p-0 ml-0 mr-0 shadow-none">
<div class="header-body">
    <div class="row align-items-center">
        <div class="col">
            <h6 class="header-pretitle fs-10 font-weight-bold text-muted text-uppercase mb-1">Payments</h6>
            <h1 class="header-title fs-25 font-weight-600">Invoice No: <?php echo $purchase_id?></h1>
        </div>
        <div class="col-auto">
            <a href="<?php echo base_url('invoice/invoice_list')?>" class="btn btn-success-soft ml-2"><i class="fas fa-align-justify mr-1"></i>invoice List</a>
            <a src="javascript:void(0)" onclick="printDiv('printArea')" class="btn btn-success ml-2"><i class="typcn typcn-printer mr-1"></i>Print Invoice </a>
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
        <p class="text-muted mb-5">Invoice: <?php echo $purchase_id?></p>
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
        <p class="mb-4"><?php echo $purchase_id;?></p>
    </div>
    <div class="col-12 col-md-6 text-md-right">
        <h6 class="text-uppercase text-muted fs-12 font-weight-600">Invoiced to</h6>
        <p class="text-muted mb-4">
            <strong class="text-body fs-16"><?php echo $manufacturer_name;?></strong> 
            <?php if($address){?>
            <br>
           <?php echo $address;?> <?php }?>
          
            <br>
            P: <?php echo $mobile;?>
        </p>
        <h6 class="text-uppercase text-muted fs-12 font-weight-600"> invoice date</h6>
        <p class="mb-4"><time datetime=""> <?php echo $date;?></time></p>
    </div>
</div> 
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
              
           <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><?php echo lan('sl_no') ?></th>
                                            <th class="text-center"><?php echo lan('medicine_name') ?></th>
                                            <th class="text-center"><?php echo lan('quantity') ?></th>
                                            
                                            
                                            <th class="text-center"><?php echo lan('deduction') ?> %</th>
                                           
                                            <th class="text-center"><?php echo lan('price') ?></th>
                                            <th class="text-center"><?php echo lan('amount') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                        $sl = 1;
                                        foreach($return_detail as $details){?>
                                        <tr>
                                            <td class="text-center"><?php echo $sl++;?></td>
                                            <td class="text-center"><div><strong><?php echo $details['product_name']?> - (<?php echo $details['strength']?>)</strong></div></td>
                                            <td align="center"><?php echo $details['ret_qty']?></td>

                                          
                                            <td align="center"><?php echo $details['deduction'] ?></td>
                                         
                                            
                                            <td align="center"><?php echo $details['product_rate'] ?></td>
                                            <td align="center"><?php echo $details['total_ret_amount'] ?></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <td align="center" colspan="1"><b><?php echo lan('grand_total')?>:</b></td>
                                        <td></td>
                                        <td align="center" ><b><?php echo $subTotal_quantity?></b></td>
                                        <td></td>
                                        <td></td>
                                        
                                        <td align="center" ><b><?php echo $subTotal_ammount ?></b></td>
                                    </tfoot>
                                </table>
                                <div class="row">
                                
                                    <div class="col-xs-8 invoicefooter-content">
                                        <p><strong><?php echo lan('note') ?> : </strong><?php echo $note?></p>
                                        
                                        <div  class="">
                                            
                                        </div>
                                    </div>
                                    <div class="col-xs-4 inline-block">

                                        <table class="table">
                                            <?php
                                                if ($return_detail[0]['total_deduct'] != 0) {
                                            ?>
                                                <tr>
                                                    <th class="border-bottom-top"><?php echo lan('deduction') ?> : </th>
                                                    <td class="border-bottom-top"><?php echo $total_deduct ?> </td>
                                                </tr>
                                            <?php } 
                                                if ($return_detail[0]['total_tax'] != 0) {
                                            ?>
                                                <tr>
                                                    <th class="border-bottom-top"><?php echo lan('tax') ?> : </th>
                                                    <td class="border-bottom-top"><?php echo $total_tax ?> </td>
                                                </tr>
                                            <?php } ?>
                                                <tr>
                                                    <th class="grand_total text-right"><?php echo lan('grand_total') ?> :</th>
                                                    <td class="grand_total text-right"><?php echo $total_amount ?></td>
                                                </tr>
                                                
                                        </table>
                           
                                        <div class="sig_div">
                                                <?php echo lan('authorised_by') ?>
                                        </div>
                                    
                                </div>
                            </div>
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
