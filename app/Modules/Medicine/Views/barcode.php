
  <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('barcode')?></h6>
                </div>
                <div class="text-right">
                   <a href="<?php echo base_url('medicine/medicine_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('medicine_list')?></a>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
                          <div id="printableArea">
                                    <div class="paddin5ps">
                                    <table  id="" class="table-bordered">
                                        <?php
                                        $counter = 0;
                                        $cqty = 6;
                                         $qty = 18;
                                        for ($i = 0; $i < $qty; $i++) {
                                            ?>
                                            <?php if ($counter == $cqty) { ?>
                                                <tr> 
                                                    <?php $counter = 0; ?>
                                                <?php } ?>
                                                <td class="barcode-toptd">      

                                                    <div class="barcode-inner barcode-innerdiv">
                                                        <div class="product-name barcode-productname">
                                                            <?php echo $settings_info->title;?>
                                                        </div>
                                                        <span class="model-name barcode-modelname"><?php echo $product_info->strength;?></span>
                                                        <img class="img-responsive center-block barcode-image" alt="" src="<?= base_url('vendor/barcode.php?size=30&text='.$product_id.'&print=true')?>" >
                                                        <div class="product-name-details barcode-productdetails"><?php echo $product_info->product_name;?></div>
                                                        <div class="price barcode-price"><?php echo $settings_info->currency;?><?php echo $product_info->price ?> <small class="barcode-vat"><?php echo 'include vat'; ?>. 
                                                       
                                                    </div>

                                                </td>
                                         <?php if ($counter == 6) { ?>
                                                </tr> 
                                                <?php $counter = 0; ?>
                                            <?php } ?>
                                            <?php $counter++; ?>
                                            <?php
                                        }
                                        ?>
                                           
                                    </table>
                                </div>
                                </div>
                                <br>
                              <a  class="btn btn-info" href="#" onclick="printDiv('printableArea')"><?php echo 'Print' ?></a>  
                    </div>

                    </div>
                </div>
                    </div>

