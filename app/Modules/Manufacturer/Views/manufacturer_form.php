  
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_manufacturer')?></h6>
                </div>
                <div class="text-right">
                     <?php if($permission->method('manufacturer_list','read')->access()){?>  
                   <a href="<?php echo base_url('manufacturer/manufacturer_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('manufacturer_list')?></a>
               <?php }?>
               <?php if($permission->method('add_manufacturer','create')->access()){?>  
                 
                    <button class="client-add-btn btn btn-success md-trigger" type="button" aria-hidden="true" data-toggle="modal" data-target="#csv_manufacturer_modal" id="csvmodal-link"><i class="fas fa-plus"></i> <?php echo lan('upload_csv')?></button>
                <?php }?>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php echo form_open_multipart("manufacturer/add_manufacturer/".$manufacturer->manufacturer_id) ?>            
               
               <input type="hidden" name="manufacturer_id" id="manufacturer_id" value="<?php echo $manufacturer->manufacturer_id?>">
                <div class="form-group row">
                    <label for="manufacturer_name" class="col-md-2 text-right col-form-label"><?php echo lan('manufacturer_name')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="manufacturer_name" class="form-control" id="manufacturer_name" placeholder="<?php echo lan('manufacturer_name')?>" value="<?php echo $manufacturer->manufacturer_name?>">
                            <input type="hidden" name="old_name" value="<?php echo $manufacturer->manufacturer_name?>">

                        </div>
                       
                    </div>
                     <label for="manufacturer_mobile" class="col-md-2 text-right col-form-label"><?php echo lan('mobile_no')?> <i class="text-danger"> * </i>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="manufacturer_mobile" class="form-control input-mask-trigger text-left valid_number" id="manufacturer_mobile" placeholder="<?php echo lan('mobile_no')?>" value="<?php echo $manufacturer->mobile?>" data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true" im-insert="true">

                        </div>
                       
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="manufacturer_email" class="col-md-2 text-right col-form-label"><?php echo lan('email_address')?>1:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="email" class="form-control input-mask-trigger" name="manufacturer_email" id="email" data-inputmask="'alias': 'email'" im-insert="true" placeholder="<?php echo lan('email')?>" value="<?php echo $manufacturer->emailnumber?>">

                        </div>
                       
                    </div>
                      <label for="email_address" class="col-md-2 text-right col-form-label"><?php echo lan('email_address')?>2:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" class="form-control" name="email_address" id="email_address" placeholder="<?php echo lan('email_address')?>" value="<?php echo $manufacturer->email_address?>">

                        </div>
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-md-2 text-right col-form-label"><?php echo lan('phone')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                          <input class="form-control input-mask-trigger text-left valid_number" id="phone" type="text" name="phone" placeholder="<?php echo lan('phone')?>" data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true" im-insert="true" value="<?php echo $manufacturer->phone?>">

                        </div>
                       
                    </div>

                     <label for="contact" class="col-md-2 text-right col-form-label"><?php echo lan('contact')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                          <input class="form-control"  id="contact" type="text" name="contact" placeholder="<?php echo lan('contact')?>" value="<?php echo $manufacturer->contact?>">

                        </div>
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address1" class="col-md-2 text-right col-form-label"><?php echo lan('address1')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                           <textarea name="address" id="manufacturer_address" class="form-control" placeholder="<?php echo lan('address1')?>"><?php echo $manufacturer->address?></textarea>

                        </div>
                      
                    </div>

                          <label for="address2" class="col-md-2 text-right col-form-label"><?php echo lan('address2')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                           <textarea name="address2" id="address2" class="form-control" placeholder="<?php echo lan('address2')?>"><?php echo $manufacturer->address2?></textarea>

                        </div>
                      
                    </div>
                </div>
                <div class="form-group row"> 
                    <label for="fax" class="col-md-2 text-right col-form-label"><?php echo lan('fax')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                            <input type="text" name="fax" class="form-control" id="fax" placeholder="<?php echo lan('fax')?>" value="<?php echo $manufacturer->fax?>">

                        </div>
                       
                    </div>
                    <label for="city" class="col-md-2 text-right col-form-label"><?php echo lan('city')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                            
                            <input type="text" name="city" class="form-control" id="city" placeholder="<?php echo lan('city')?>" value="<?php echo $manufacturer->city?>">

                        </div>
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="state" class="col-md-2 text-right col-form-label"><?php echo lan('state')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input type="text" name="state" class="form-control" id="state" placeholder="<?php echo lan('state')?>"  value="<?php echo $manufacturer->state?>">

                        </div>
                       
                    </div>
                    <label for="zip" class="col-md-2 text-right col-form-label"><?php echo lan('zip')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input name="zip" type="text" class="form-control" id="zip" placeholder="<?php echo lan('zip')?>" value="<?php echo $manufacturer->zip?>">

                        </div>
                       
                    </div>
                </div>
                <div class="form-group row">
                    <label for="country" class="col-md-2 text-right col-form-label"><?php echo lan('country')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input name="country" type="text" class="form-control " placeholder="<?php echo lan('country')?>" value="<?php echo $manufacturer->country?>" id="country" >

                        </div>
                       
                    </div>
                    <?php if(empty($manufacturer->manufacturer_id)){?>

                     <label for="previous_balance" class="col-md-2 text-right col-form-label"><?php echo lan('previous_balance')?>:</label>
                    <div class="col-md-4">
                        <div class="">
                           
                            <input name="previous_balance" type="number" class="form-control text-right input-mask-trigger" placeholder="<?php echo lan('previous_balance')?>"  data-inputmask="'alias': 'decimal', 'groupSeparator': '', 'autoGroup': true" im-insert="true" >

                        </div>
                       
                    </div>
                <?php }?>
                    
                </div>

              

         <div class="form-group row">
                   <div class="col-md-6 text-right">
                   </div>
                     <div class="col-md-6 text-right">
                        <div class="">
                           
                            <button type="submit"  class="btn btn-success">
                                <?php echo (empty($manufacturer->manufacturer_id)?lan('save'):lan('update')) ?></button>

                        </div>
                       
                    </div>
                </div>
               

                <?php echo form_close();?>
                    </div>
                    </div>
                    </div>

                <div class="modal fade" id="csv_manufacturer_modal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                           
                            <h3 class="modal-title"><?php echo lan('upload_csv') ?></h3>
                             <a href="#" class="close  md-close" data-dismiss="modal">&times;</a>
                        </div>
                        
                        <div class="modal-body">
                            <div class="text-right mb-2">
                               <a href="<?php echo base_url('assets/csvfile/manufacturer_csv_sample.csv') ?>" class="btn btn-info pull-right"><i class="fa fa-download"></i> Download Sample File</a>
                            </div>
                       <?php echo form_open_multipart('manufacturer/upload_manufacturer', array('class' => 'form-vertical', 'id' => 'csvmedicine')) ?>
                 
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
                      

                 