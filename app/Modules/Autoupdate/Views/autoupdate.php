<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
            <?php if ($latest_version!=$current_version) { ?>
                <?php echo form_open_multipart("autoupdate/update") ?>
                    <div class="row">
                        <div class="form-group col-lg-12 col-offset-2">
                            <blink class="text-success text-center autp-update-text"><?php echo @$message_txt ?></blink>
                            <blink class="text-waring text-center autp-update-text"><?php echo @$exception_txt ?></blink>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="alert alert-success text-center autoupdate-version-text"><?php echo lan('latestv')?> <br>V-<?php echo $latest_version ?></div>
                                </div> 
                                <div class="col-lg-6">
                                    <span class="autoupdate-currentversion-text"><?php echo lan('current_ver')?></span>
                                    <div class="alert alert-danger text-center autoupdate-version-text"><?php echo lan('current_ver');?> <br>V-<?php echo $current_version ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="checkserver">
                    <div class="row">
                        <div class="form-group col-lg-8 col-offset-3">
                            <p class="alert autoupdate-error-message" id="errormsg"><?php echo "Before Update Check Your Server requiremnt for Update script.Check Your server php allow_url_fopen is enable,memory Limit More than 100M and max execution time is 300 or more";?></p>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-success col-offset-5" onclick="checkserver()"><i class="fa fa-wrench" aria-hidden="true"></i> <?php echo "Check server";?></button>
                         <button type="button" class="btn btn-danger col-offset-5" onclick="cancel_upnotification(<?php echo $settings_info-> id?>)"> <?php echo "Cancel Update Notification";?></button>
                    </div>
                    </div>
                    <div id="serverok" style="display:none;">
                    <div class="row">
                        <div class="form-group col-lg-6 col-offset-3">
                             
                            <p class="alert autoupdate-error-message"><?php echo lan('notesupdate')?></p>
                            <p class="alert autoupdate-error-message">note: strongly recomanded to backup your <b>SOURCE FILE</b> and <b>DATABASE</b> before update. <a href="<?php echo base_url('dashboard/backup_download')?>" class="btn btn-primary">Download Database</a></p>
                            
                            <label><?php echo lan('purchase_key')?><span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="purchase_key">
                        </div>
                        <div class="form-group col-lg-6 col-offset-3">                           
                            <label><?php echo "Select Version";?><span class="text-danger">*</span></label>
                            <select name="version"  class="form-control">
                            <option value=""  selected="selected"><?php echo lan('select_option') ?></option>
                                <?php $start=$latest_version-0.4;
                                for($i=$current_version+0.1;$i<=$latest_version;$i+=0.1){
                                ?>
                                <option value="<?php echo number_format((float)$i, 1, '.', '');?>"><?php echo "pharmacare-v".number_format((float)$i, 1, '.', '');?></option>
                                <?php } ?>
                               
                              </select>
                              <p><a href="https://forum.bdtask.com" target="_blank">Do you Need support?</a> </p>
                        </div>
                    </div> 
                    <div>
                        <button type="submit" class="btn btn-success col-offset-5" onclick="return confirm('are you sure want to update?')"><i class="fa fa-wrench" aria-hidden="true"></i> <?php echo lan('update')?></button>
                    </div>
                    </div>
                <?php echo form_close() ?>

                <?php } else{  ?>
                    <div class="row">
                        <div class="form-group col-lg-12 col-offset-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-success text-center autoupdate-version-text"><?php echo 'Current Version'?> <br>V-<?php echo $current_version ?></div>
                                    <h2 class="text-center"><?php echo lan('noupdates')?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>


