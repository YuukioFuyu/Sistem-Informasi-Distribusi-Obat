<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('leaf_list')?></h6>
                                </div>
                                <div class="text-right">
                               
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">
               <?php echo form_open("medicine/add_leaf_setting/".$leaf->id)?>
               <?php echo form_hidden('id',$leaf->id) ?>
                        <div class="form-group row">
                            <label for="leaf_type" class="col-sm-4 col-form-label"><?php echo lan('leaf_type') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="leaf_type" id="leaf_type" type="text" placeholder="<?php echo lan('leaf_type') ?>" value="<?php echo $leaf->leaf_type?>"  required="" tabindex="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_number" class="col-sm-4 col-form-label"><?php echo lan('total_number') ?><i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name ="total_number" id="total_number" type="number" placeholder="<?php echo lan('total_number') ?>"  value="<?php echo $leaf->total_number?>" tabindex="2" required=""> 
                            </div>
                        </div>  
                        <div class="form-group row">
                          <div class="col-sm-10 text-right">
                          <input type="submit"  class="btn btn-success" value="Submit"> 
                        </div> 
                        </div>  
                        <?php echo form_close()?>
                
            </div> 
        </div>
    </div>
  </div>