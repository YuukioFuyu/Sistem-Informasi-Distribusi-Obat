<style>
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
table {
    background-color: transparent;
}
table {
    border-spacing: 0;
    border-collapse: collapse;
}  

.table>thead>tr>th {
    border-bottom: 1px solid #e4e5e7;
} 

</style>
 <div class="col-12 col-lg-10 col-xl-8">


<div class="card card-body p-5">

<div class="row">
<table border="0" width="100%">
<tbody>
    <tr>
        <td colspan="2" align="center">
        <img src="<?php echo base_url().$company->logo;?>" alt="..." class="img-fluid mb-4">
        <h4 class="mb-0 font-weight-bold"><?php echo $company->title;?></h4>
        <p class="text-muted mb-5">Invoice: <?php echo $invoice->invoice?></p>
    </td>
    </tr>
<tr>
    <td align="left">
     <h6 class="text-uppercase text-muted fs-12 font-weight-600">Invoiced from</h6>
        <p class="">
            <strong class="text-body fs-16"><?php echo $company->title;?>.</strong> <br>
            <?php echo $company->address;?> <br>
            <?php echo $company->email;?> <br>
            P: <?php echo $company->phone;?>
        </p>
        <h6 class="text-uppercase text-muted fs-12 font-weight-600">Invoiced No</h6>
        <p class="mb-4"><?php echo $invoice->invoice;?></p>
                                            </td>
        <td align="right">
        <h6 class="text-uppercase text-muted fs-12 font-weight-600">Invoiced to</h6>
        <p class="text-muted mb-4">
            <strong class="text-body fs-16">
         <?php echo $invoice->customer_name;?></strong> 
            <?php if($invoice->customer_address){?>
            <br>
           <?php echo $invoice->customer_address;?>
            <?php }?>
           <?php if($invoice->email_address){?>
           <br>
           <?php echo $invoice->email_address;?>
          <?php }?>
            <br>
            P: <?php echo $invoice->customer_mobile;?>
        </p>
        <h6 class="text-uppercase text-muted fs-12 font-weight-600"> invoice date</h6>
        <p class="mb-4"><time datetime=""> <?php echo $invoice->date;?></time></p>         
                                            </td>
                                        </tr>
                                        
                                       
                                     
                                    </tbody>
                                </table>
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
            <table class="table my-4 table-bordered" width="100%" border="0">
                <thead>
                    <tr>
                    	 <th class="px-0 bg-transparent border-top-0">
                            <span class="h6 font-weight-bold"><?php echo lan('sl_no')?></span>
                        </th>
                        <th class="px-0 bg-transparent border-top-0">
                            <span class="h6 font-weight-bold">Medicine Name</span>
                        </th>
                        <th class="px-0 bg-transparent border-top-0">
                            <span class="h6 font-weight-bold">QTY(U)</span>
                        </th>
                        <th class="px-0 bg-transparent border-top-0 text-right">
                            <span class="h6 font-weight-bold">Price</span>
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
                    	<td class="px-0" align="center"><?php echo $sl++;?></td>
                        <td class="px-0" align="center">
                            <?php echo $details['product_name'].' ('.$details['strength'].')'?>
                        </td>
                        <td class="px-0" align="center">
                            <?php echo $details['quantity']?>
                        </td>
                        <td class="px-0 text-right" align="center">
                           <?php echo $details['rate']?>
                        </td>

                          <?php if($total_dis > 0){?>
                                <td class="px-0 text-right" align="center"><?php echo $details['discount']?></td>
                                     <?php }?>
                        <td class="px-0 text-right" align="center">
                            <?php echo $details['total_price'];
                              $sum_total += $details['total_price'];
                            ?>
                        </td>
                    </tr>
                <?php }}?>
                   
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>" align="right">
                            <strong>Total amount</strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2" align="center">
                            <span class="fs-16 font-weight-600">
                               <?php echo number_format($sum_total,2);?>
                            </span>
                        </td>
                    </tr>
                    <?php if($invoice->invoice_discount > 0){?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>" align="right">
                            <strong>Invoice Discount</strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2" align="center">
                            <span class="fs-16 font-weight-600">
                               <?php echo $invoice->invoice_discount;?>
                            </span>
                        </td>
                    </tr>
                <?php }?>

                      <?php if($invoice->prevous_due > 0){?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>" align="right">
                            <strong>Previous</strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2" align="center">
                            <span class="fs-16 font-weight-600">
                               <?php echo $invoice->prevous_due;?>
                            </span>
                        </td>
                    </tr>
                <?php }?>

                      <?php if($invoice->total_tax > 0){?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>" align="right">
                            <strong><?php echo lan('total_vat')?></strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2" align="center">
                            <span class="fs-16 font-weight-600">
                               <?php echo $invoice->total_tax;?>
                            </span>
                        </td>
                    </tr>
                <?php }?>
                    <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>" align="right">
                            <strong>Grand Total</strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2" align="center">
                            <span class="fs-16 font-weight-600">
                               <?php echo $invoice->total_amount;?>
                            </span>
                        </td>
                    </tr>
                    <?php if($invoice->paid_amount >0){?>
                     <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>" align="right">
                            <strong>Paid Amount</strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2" align="center">
                            <span class="fs-16 font-weight-600">
                               <?php echo $invoice->paid_amount;?>
                            </span>
                        </td>
                    </tr>
                <?php }?>
                <?php if($invoice->due_amount >0){?>
                     <tr>
                        <td class="px-0 border-top border-top-2 text-right" colspan="<?php echo 4+$colspan ?>" align="right">
                            <strong>Due Amount</strong>
                        </td>
                        <td class="px-0 text-right border-top border-top-2" align="center">
                            <span class="fs-16 font-weight-600">
                               <?php echo $invoice->due_amount;?>
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

