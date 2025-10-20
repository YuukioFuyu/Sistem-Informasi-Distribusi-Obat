  
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_medicine')?></h6>
                </div>
                <div class="text-right">
                  <?php if($permission->method('medicine_list','read')->access()){?>  
                   <a href="<?php echo base_url('medicine/medicine_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('medicine_list')?></a>
                    <button class="client-add-btn btn btn-success md-trigger" type="button" aria-hidden="true" data-toggle="modal" data-target="#csv_medicine_modal" id="csvmodal-link"><i class="fas fa-plus"></i> <?php echo lan('upload_csv')?></button>
                  <?php }?>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php
      $m_id = (!empty($medicine->product_name)?$medicine->product_id:'');
       echo form_open_multipart("medicine/add_medicine/".$m_id) ?>            
                <?php echo form_hidden('product_id',$m_id) ?>
                  
                <div class="form-group row">
                    <?php if(empty($medicine->product_name)){?>
                <label for="bar_qrcode" class="col-md-2 text-right col-form-label"><?php echo lan('bar_qrcode')?> <i class="text-danger">  </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                         <input type="text" name="barcode_id" class="form-control" id="bar_qrcode" placeholder="<?php echo lan('bar_qrcode')?>" value="">
                        </div>
                       
                    </div>
                <?php }?>
                    <label for="medicine_name" class="col-md-2 text-right col-form-label"><?php echo lan('medicine_name')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="medicine_name" class="form-control" id="medicine_name" placeholder="<?php echo lan('medicine_name')?>" value="<?php echo $medicine->product_name?>">
                           

                        </div>
                       
                    </div>
                   
                </div>
                 <div class="form-group row">
                      <label for="strength" class="col-md-2 text-right col-form-label"><?php echo lan('strength')?> <i class="text-danger">  </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="strength" class="form-control input-mask-trigger text-left" id="strength" placeholder="<?php echo lan('strength')?>" value="<?php echo $medicine->strength?>">

                        </div>
                       
                    </div>
                    <label for="generic_name" class="col-md-2 text-right col-form-label"><?php echo lan('generic_name')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" class="form-control" name="generic_name" id="generic_name" placeholder="<?php echo lan('generic_name')?>" value="<?php echo $medicine->generic_name?>">

                        </div>
                       
                    </div>
                  
                </div>
             
                <div class="form-group row">
                        <label for="box_size" class="col-md-2 text-right col-form-label"><?php echo lan('box_size')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                        <?php echo  form_dropdown('box_size',$leaf,$medicine->box_size, 'class="form-control select2 required" id="box_size"') ?> 

                          

                        </div>
                       
                    </div>
                   
  <label for="unit" class="col-md-2 text-right col-form-label"><?php echo lan('unit')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                            <?php echo  form_dropdown('unit',$unit_list,$medicine->unit, 'class="form-control select2"') ?>

                        </div>
                       
                    </div>
                   
                </div>

                   <div class="form-group row">
                    <label for="product_location" class="col-md-2 text-right col-form-label"><?php echo lan('product_location')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                          <input class="form-control" id="product_location" type="text" name="product_location" placeholder="<?php echo lan('product_location')?>" value="<?php echo $medicine->product_location?>">

                        </div>
                       
                    </div>
                       <label for="product_details" class="col-md-2 text-right col-form-label"><?php echo lan('product_details')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="product_details" class="form-control" id="product_details" placeholder="<?php echo lan('product_details')?>"  value="<?php echo $medicine->product_details?>">

                        </div>
                       
                    </div>

                 
                </div>
                <div class="form-group row"> 
              

                     <label for="category" class="col-md-2 text-right col-form-label"><?php echo lan('category')?><i class="text-danger"> * </i>:</label>
                       <div class="col-md-4">
                        <div class="">
                            
                            <?php echo  form_dropdown('category_id',$category_list,$medicine->category_id, 'class="form-control select2"') ?>

                        </div>
                    </div>

         <label for="price" class="col-md-2 text-right col-form-label"><?php echo lan('price')?><i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                          <input class="form-control valid_number"  id="price" type="text" name="price" placeholder="<?php echo lan('price')?>" value="<?php echo $medicine->b_price?>">

                        </div>
                       
                    </div>
                  
                  
                </div>
                <div class="form-group row">
            
                       <label for="medicine_type" class="col-md-2 text-right col-form-label"><?php echo lan('medicine_type')?>:</label>
                    <div class="col-md-4">
                        <div class="">
       <?php echo  form_dropdown('product_type',$type_list,$medicine->product_type, 'class="form-control select2"') ?> 
                        </div>
                      
                    </div>
                    <label for="image" class="col-md-2 text-right col-form-label"><?php echo lan('image')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input name="image" type="file" class="form-control" id="image" placeholder="<?php echo lan('image')?>" value="">
                            <input name="old_image" type="hidden" class="form-control"  value="<?php echo $medicine->image?>">

                        </div>
                       
                    </div>
                </div>
                <div class="form-group row">
                       <label for="manufacturer_id" class="col-md-2 text-right col-form-label"><?php echo lan('manufacturer')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                         <?php echo  form_dropdown('manufacturer_id',$manufacturer_list,$medicine->manufacturer_id, 'class="form-control select2"') ?> 

                        </div>
                      
                    </div>
                          <label for="manufacturer_price" class="col-md-2 text-right col-form-label"><?php echo lan('manufacturer_price')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                            <input type="text" name="manufacturer_price" class="form-control valid_number" id="manufacturer_price" placeholder="<?php echo lan('manufacturer_price')?>" value="<?php echo $medicine->m_b_price?>">

                        </div>
                       
                    </div>
                </div>
              
                             <div class="row">
                             <?php  $i=0;
                    foreach ($taxfield as $taxss) {?>
                   
                            <div class="col-sm-6">
                         <div class="form-group row">
                            <label for="tax" class="col-sm-4 col-form-label"><?php echo $taxss['tax_name']; ?> <i class="text-danger"></i>:</label>
                            <div class="col-sm-7">
                              <input type="text" name="tax<?php echo $i;?>" class="form-control" value="<?php  $taxv = 'tax'.$i;
                              echo (!empty($medicine->product_name)?($medicine->$taxv*100): number_format($taxss['default_value'], 2, '.', ','));
                              ?>">
                            </div>
                            <div class="col-sm-1"> <i class="text-success">%</i></div>
                        </div>
                    </div>
               
                       <?php $i++;}?>  
              </div>

            

                <div class="form-group row">
                    <label for="status" class="col-md-2 text-right col-form-label"><?php echo lan('status')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                           <label class="radio-inline my-2">
                                <?php echo form_radio('status', '1', (($medicine->status==1 || $medicine->status==null)?true:false), 'id="status"'); ?>Active
                            </label>
                            <label class="radio-inline my-2">
                                <?php echo form_radio('status', '0', (($medicine->status=="0")?true:false) , 'id="status"'); ?>Inactive
                            </label> 

                        </div>
                       
                    </div>
                       <label for="preview" class="col-md-2 text-right col-form-label"><?php echo lan('preview')?>:</label>    
                    <div class="col-md-4">
                        <div class="">
                            
                          <img id="blah" class="img-thambnail" src="<?php echo (!empty($medicine->image)?base_url().'/'.$medicine->image:base_url('assets/dist/img/products/product.png'))?>" alt="your image" height="70px" width="70px;" />

                        </div>
                       
                    </div>
                </div>
              
            
         <div class="form-group row">
                   <div class="col-md-6 text-right">
                   </div>
                     <div class="col-md-6 text-right">
                        <div class="">
                           
                            <button type="submit"  class="btn btn-success">
                                <?php echo (empty($m_id)?lan('save'):lan('update')) ?></button>

                        </div>
                       
                    </div>
                </div>

                <?php echo form_close();?>
                    </div>
                    </div>
                </div>
                   <div class="modal fade" id="csv_medicine_modal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                           
                            <h3 class="modal-title"><?php echo lan('upload_csv') ?></h3>
                             <a href="#" class="close  md-close" data-dismiss="modal">&times;</a>
                        </div>
                        
                        <div class="modal-body">
                            <div class="text-right mb-2">
                               <a href="<?php echo base_url('assets/csvfile/product_csv_sample.csv') ?>" class="btn btn-info pull-right"><i class="fa fa-download"></i> Download Sample File</a>
                            </div>
                       <?php echo form_open_multipart('medicine/upload_medicine', array('class' => 'form-vertical', 'id' => 'csvmedicine')) ?>
                 
                        <div class="form-group row">
                            <label for="import_csv" class="col-sm-4 col-form-label"><?php echo lan('import_csv') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="file" id="file" type="file" placeholder="<?php echo lan('import_csv') ?>"  required="" tabindex="1">
                            </div>
                        </div>

                       


                      
                   
                    
                        </div>

                        <div class="modal-footer">
                            
                            <a href="#" class="btn btn-danger" tabindex="5" data-dismiss="modal">Close</a>
                            
                            <input type="submit" tabindex="6" class="btn btn-success" value="Submit">
                        </div>
                        <?php echo form_close() ?>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
                    </div>

                  

                 