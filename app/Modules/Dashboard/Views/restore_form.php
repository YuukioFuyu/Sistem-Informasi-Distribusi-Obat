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
                                            Note : If You Restore Your Database your Whole database will be blank.
                                        </div>
                                    </div>
                                </div>
     
                    <?php echo form_open_multipart('dashboard/restore') ?>
                       <div class="form-group row">
                   <div class="col-md-12 col-lg-12 text-center">
                        <button onclick="return confirm('Are You Sure ?')" type="submit" class="btn btn-success col-lg-2"><?php echo lan('restore') ?></button>
                    </div>
                    </div>
                     
                     <?php echo form_close() ?>
                    </div>
                </div>
            </div>
                <div class="col-md-2 col-lg-2">
    </div>
        </div>