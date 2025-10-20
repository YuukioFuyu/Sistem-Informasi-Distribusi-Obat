<div class="row">
    <div class="card col-md-12 col-lg-12">
        
              <div class="card-header">
                 <div class="d-flex justify-content-between align-items-center"> 
                 <?php echo $title;?> 
                                    </div>
                                    </div>
  
            <div class="card body">
                <?php echo form_open_multipart('dashboard/add_setting','class="form-inner"') ?>
                    <?php echo form_hidden('id',$setting->id) ?>

                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label"><?php echo lan('company_title') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-9">
                            <input name="title" type="text" class="form-control" id="title" placeholder="<?php echo lan('company_title') ?>" value="<?php echo $setting->title ?>">
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label"><?php echo lan('menu_title') ?> <i class="text-danger">*</i></label>
                        <div class="col-sm-9">
                            <input name="menu_title" type="text" class="form-control" id="menu_title" placeholder="<?php echo lan('menu_title') ?>" value="<?php echo $setting->menu_title ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-sm-3 col-form-label"><?php echo lan('address') ?></label>
                        <div class="col-sm-9">
                            <input name="address" type="text" class="form-control" id="address" placeholder="<?php echo lan('address') ?>"  value="<?php echo $setting->address ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label"><?php echo lan('email')?></label>
                        <div class="col-sm-9">
                            <input name="email" type="email" class="form-control" id="email" placeholder="<?php echo lan('email')?>"  value="<?php echo $setting->email ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label"><?php echo lan('phone') ?></label>
                        <div class="col-sm-9">
                            <input name="phone" type="text" class="form-control valid_number" id="phone" placeholder="<?php echo lan('phone') ?>"  value="<?php echo $setting->phone ?>" >
                        </div>
                    </div>
                     <?php if(!empty($setting->favicon)) {  ?>
                    <div class="form-group row">
                        <label for="faviconPreview" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url().$setting->favicon ?>" alt="Favicon" class="img-thumbnail" height="70" width="70"/>
                        </div>
                    </div>
                    <?php } ?>

                    <div class="form-group row">
                        <label for="favicon" class="col-sm-3 col-form-label"><?php echo lan('favicon') ?> </label>
                        <div class="col-sm-9">
                            <input type="file" name="favicon" id="favicon">
                            <input type="hidden" name="old_favicon" value="<?php echo $setting->favicon ?>">
                        </div>
                    </div>


                    <!-- if setting logo is already uploaded -->
                    <?php if(!empty($setting->logo)) {  ?>
                    <div class="form-group row">
                        <label for="logoPreview" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url().$setting->logo ?>" alt="Picture" class="img-thumbnail" height="70" width="70"/>
                        </div>
                    </div>
                    <?php } ?>
                      <div class="form-group row">
                        <label for="logo" class="col-sm-3 col-form-label"><?php echo lan('logo') ?></label>
                        <div class="col-sm-9">
                            <input type="file" name="logo" id="logo">
                            <input type="hidden" name="old_logo" value="<?php echo $setting->logo ?>">
                        </div>
                    </div>
                        <?php if(!empty($setting->login_background)) {  ?>
                    <div class="form-group row">
                        <label for="logoPreview" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <img src="<?php echo base_url().$setting->login_background ?>" alt="Login Background" class="img-thumbnail" height="70" width="120"/>
                        </div>
                      
                    </div>
                    <?php } ?>
                     <div class="form-group row">
                        <label for="login_background_image" class="col-sm-3 col-form-label"><?php echo lan('login_background_image') ?></label>
                        <div class="col-sm-6">
                            <input type="file" name="login_background" id="login_background_image">
                            <input type="hidden" name="old_login_background" value="<?php echo $setting->login_background ?>">
                        </div>
                          <div class="3">
                            Upload (1280 X 853)px Image For Login Background
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="language" class="col-sm-3 col-form-label"><?php echo lan('language') ?></label>
                        <div class="col-sm-9">
                            <?php echo  form_dropdown('language',$languageList,$setting->language, 'class="form-control select2"') ?> 
                        </div>
                    </div> 


                     <div class="form-group row">
                        <label for="currency" class="col-sm-3 col-form-label"><?php echo lan('currency') ?></label>
                        <div class="col-sm-9">
                            <?php echo  form_dropdown('currency',$currency_list,$setting->currency, 'class="form-control select2"') ?> 
                        </div>
                    </div> 

                     <div class="form-group row">
                            <label for="discount_type" class="col-sm-3 col-form-label"><?php echo lan('discount_type') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-9">
                                <select class="form-control select2" name="discount_type" id="discount_type" tabindex="10">
                                    <option value=""><?php echo lan('select_discount_type') ?></option>
                                    <option value="1" <?php if ($setting->discount_type == 1) {
                        echo "selected";
                    } ?>><?php echo lan('discount_percentage') ?> %</option>
                                    <option value="2" <?php if ($setting->discount_type == 2) {
                        echo "selected";
                    } ?>><?php echo lan('discount') ?></option>
                                    <option value="3" <?php if ($setting->discount_type == 3) {
                        echo "selected";
                    } ?>><?php echo lan('fixed_dis') ?></option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="rtl" class="col-sm-3 col-form-label"><?php echo lan('rtlltr') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-9">
                                <select class="form-control select2" name="rtl" id="rtl" >
                          
                    <option value="0" <?php if ($setting->rtl == 0) {
                        echo "selected";
                    } ?>><?php echo lan('ltr') ?></option>
                    <option value="1" <?php if ($setting->rtl == 1) {
                        echo "selected";
                    } ?>><?php echo lan('rtl') ?></option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rtl" class="col-sm-3 col-form-label"><?php echo 'Time zone'; ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-9">
                                 <?php echo form_dropdown('timezone', $timezones, $setting->timezone , array('class'=>'form-control select2')); ?>
                            </div>

                       </div>

                    <div class="form-group row">
                        <label for="footer_text" class="col-sm-3 col-form-label"><?php echo lan('footer_text') ?></label>
                        <div class="col-sm-9">
                            <textarea name="footer_text" class="form-control"  placeholder="Footer Text" maxlength="140" rows="3"><?php echo $setting->footer_text ?></textarea>
                        </div>
                    </div>   

                    <div class="form-group text-right">
                        <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo lan('reset') ?></button>
                        <button type="submit" class="btn btn-success w-md m-b-5"><?php echo lan('save') ?></button>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
  
    </div>
