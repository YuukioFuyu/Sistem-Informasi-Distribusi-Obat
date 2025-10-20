<div class="row">
    <div class="col-md-2 col-lg-2">
    </div>
    <div class="card col-md-8 col-lg-8">
        
              <div class="card-header">
                 <div class="d-flex justify-content-between align-items-center"> 
                 <h6 class="fs-17 font-weight-600 mb-0"><?php echo $title;?> </h6>
                    </div>
            </div>
  
            <div class="card body">
                    <div class="card-body">
                      <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">
                                            <strong class="text-danger"> <i class="fas fa-exclamation-triangle"></i></strong>
                                            Note : If You Import any sql file Previous data will be destroy.
                                        </div>
                                    </div>
                                </div>
     
                    <?php echo form_open_multipart('dashboard/importdata') ?>
                       <div class="form-group row">
                    <label for="import" class="col-sm-2 col-form-div"><b><?php echo lan('import') ?> <span class="text-danger">*</span></b></label>
                        <div class="col-sm-4">
                            <input type="file" name="file" class="form-control"  placeholder="<?php echo lan('import') ?>" id="file" required>
                        </div>
                        <button type="submit" class="btn btn-success col-sm-2"><?php echo lan('import') ?></button>
                    </div>
                     
                     <?php echo form_close() ?>
                    </div>
                </div>
            </div>
                <div class="col-md-2 col-lg-2">
    </div>
        </div>