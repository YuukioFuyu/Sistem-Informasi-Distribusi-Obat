<?php
    $user_type = 1;
    
    include('google_fonts.php');
?>

    <!--/.Content Header (Page header)--> 
    
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="fs-17 font-weight-600 mb-0">Color & Font Setting </h6>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <?php echo form_open_multipart('dashboard/update_panel_setting');?>
                            <div class="card-body">
                                
                                <div class="row">

                                    <div class="col-md-2 pr-md-1">
                                        <div class="form-group">
                                            <label class="lebel font-weight-600">Font One</label>
                                            <select class="form-control " name="fontone">
                                                <option value="">--Select font--</option>
                                                <?php
                                                    foreach($google_fonts as $key => $va){

                                                ?>
                                                    <option value="<?php echo $key?>" <?php echo($key==@$setting->font_one?'selected':'')?>><?php echo esc($key)?></option>
                                                <?php }?>

                                            </select>
                                            <input type="hidden" name="id" value="<?php echo esc(@$setting->id)?>">
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-2 pl-md-1">
                                        <div class="form-group">
                                            <label class="font-weight-600">Font Two</label>
                                            <select class="form-control"  name="fonttwo">
                                                <option value="">--Select font--</option>
                                                <?php foreach($google_fonts as $key => $va){?>
                                                    <option value="<?php echo $key?>" <?php echo($key==@$setting->font_two?'selected':'')?>><?php echo esc($key)?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-2 pr-md-1">
                                        <div class="form-group">
                                            <label class="font-weight-600">Body background color</label>
                                            <input type="color" id="basecolor"  pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->color_code)?>" class="form-control"> 
                                        </div>
                                    </div>

                                    <div class="col-md-2 pl-md-1">
                                        <div class="form-group">
                                            <label class="font-weight-600">Color hex code<span class="text-danger">*</span></label>
                                            <input type="text" name="color_code" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->color_code)?>" id="basecolor_hexcolor" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-md-2 pr-md-1">
                                        <div class="form-group">
                                            <label class="font-weight-600">Body Font Size</label>
                                            <input type="text" name="body_font_size" value="<?php echo esc(@$setting->body_font_size)?>"  placeholder="14" class="form-control"> px
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2 pl-md-1">
                                        <div class="form-group">
                                            <label class="font-weight-600">Line Hight</label>
                                            <input type="text" name="body_line_hight" value="<?php echo esc(@$setting->body_line_hight)?>" placeholder="1.5" class="form-control">
                                        </div>
                                    </div>

                                           <div class="col-md-2 pr-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Text Color</label>
                                                <input type="color" id="content_text_color"  pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->content_text_color)?>" class="form-control"> 
                                            </div>
                                        </div>

                                        <div class="col-md-2 pl-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Color hex code<span class="text-danger">*</span></label>
                                                <input type="text" name="content_text_color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->content_text_color)?>" id="content_text_color_hexcolor" class="form-control">
                                            </div>
                                        </div>

                                 <div class="col-md-2 pr-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Logo Text Color</label>
                                                <input type="color" id="logo_text_color"  pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->logo_text_color)?>" class="form-control"> 
                                            </div>
                                        </div>

                                        <div class="col-md-2 pl-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Color hex code<span class="text-danger">*</span></label>
                                                <input type="text" name="logo_text_color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->logo_text_color)?>" id="logo_text_color_hexcolor" class="form-control">
                                            </div>
                                        </div>
                                </div>



                                <fieldset>

                                    <legend> Menu </legend><hr>

                                    <div class="row">

                                        <div class="col-md-2 pr-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Menu bg color</label>
                                                <input type="color" id="menubg_color"  pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->menubg_color)?>" class="form-control"> 
                                            </div>
                                        </div>

                                        <div class="col-md-2 pl-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Color hex code<span class="text-danger">*</span></label>
                                                <input type="text" name="menubg_color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->menubg_color)?>" id="menubg_color_hexcolor" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-2 pr-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Menu hover color</label>
                                                <input type="color" id="menu_hover_color"  pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->menu_hover_color)?>" class="form-control"> 
                                            </div>
                                        </div>

                                        <div class="col-md-2 pl-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Color hex code<span class="text-danger">*</span></label>
                                                <input type="text" name="menu_hover_color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->menu_hover_color)?>" id="menu_hover_color_hexcolor" class="form-control">
                                            </div>
                                        </div>
                                    

                                        <div class="col-md-2 pr-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Menu Font color</label>
                                                <input type="color" id="menu_font_color"  pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->menu_font_color)?>" class="form-control"> 
                                            </div>
                                        </div>

                                        <div class="col-md-2 pl-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Color hex code<span class="text-danger">*</span></label>
                                                <input type="text" name="menu_font_color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->menu_font_color)?>" id="menu_font_color_hexcolor" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-2 pr-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Menu Font Size</label>
                                                <input type="text" name="menu_font_size" value="<?php echo esc(@$setting->menu_font_size)?>"  placeholder="14" class="form-control"> px
                                            </div>
                                        </div>

                                         <div class="col-md-2 pr-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Active menu color</label>
                                                <input type="color" id="active_menu_color"  pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->active_menu_color)?>" class="form-control"> 
                                            </div>
                                        </div>

                                         <div class="col-md-2 pl-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Color hex code<span class="text-danger">*</span></label>
                                                <input type="text" name="active_menu_color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->active_menu_color)?>" id="active_menu_color_hexcolor" class="form-control">
                                            </div>
                                        </div>

                                              <div class="col-md-2 pr-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Active menu bg color</label>
                                                <input type="color" id="active_menu_bgcolor"  pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->active_menu_bgcolor)?>" class="form-control"> 
                                            </div>
                                        </div>

                                         <div class="col-md-2 pl-md-1">
                                            <div class="form-group">
                                                <label class="font-weight-600">Color hex code<span class="text-danger">*</span></label>
                                                <input type="text" name="active_menu_bgcolor" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="<?php echo esc(@$setting->active_menu_bgcolor)?>" id="active_menu_bgcolor_hexcolor" class="form-control">
                                            </div>
                                        </div>
                                        
                                    </div>

                                </fieldset>
                                

                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <div class="radio radio-success radio-inline">
                                                <input type="radio" id="inlineRadio1" value="1" <?php echo (@$setting->active_status=='1'?'checked':'')?> name="active_status" >
                                                <label for="inlineRadio1"> Active </label>
                                            </div>

                                            <div class="radio radio-inline radio-warning">
                                                <input type="radio" id="inlineRadio2" value="0" <?php echo (@$setting->active_status=='0'?'checked':'')?> name="active_status">
                                                <label for="inlineRadio2"> Inactive </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">
                                            <strong> <i class="fas fa-exclamation-triangle"></i></strong>
                                            Note : Color, Font, Menu settings will be applied at active theme only
                                        </div>
                                    </div>
                                </div>

                            </div>




                            <div class="card-footer ">
                                <button type="submit" class="btn btn-fill btn-success"><?php echo lan('update')?></button>
                            </div>

                        <?php echo form_close();?>
                            
       
                    </div>
                </div>
           


        