              <?php foreach($itemlist as $items){?>
                            <div class="col-4 col-sm-3 col-md-4 col-lg-4 col-xl-3 col-p-3">
                                <div class="product-panel bg-white overflow-hidden border-0 shadow-sm" id="image-active_<?php echo $items->product_id ?>">
                                    <div class="item-image position-relative overflow-hidden" onclick="onselectimage(<?php echo $items->product_id?>)">
                                       <div class="" id="image-active_count_<?php echo $items->product_id ?>"><span id="active_pro_<?php echo $items->product_id ?>" class="active_qty"></span></div>
                                        <img src="<?php echo ($items->image?base_url().$items->image:base_url().'/assets/dist/img/products/product.png') ?>" alt="" class="img-fluid">
                                    </div>
                                    <div class="panel-footer border-0 bg-white">
                                        <h3 class="item-details-title"><?php echo $items->product_name.'('.$items->strength.')'?></h3>
                                    </div>
                                </div>
                            </div>
                            <?php }?>