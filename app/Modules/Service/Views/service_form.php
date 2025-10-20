<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_service')?></h6>
                                </div>
                                <div class="text-right">
                                    <?php if($permission->method('service_list','read')->access()){?>  
                                   <a href="<?php echo base_url('service/service_list')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i><?php echo lan('service_list')?></a>
                                 <?php }?>
                                </div>
                            </div>
                        </div>
            <div class="card-body">
                   <?php echo form_open_multipart("service/add_service/".$service->id) ?>            
                <?php echo form_hidden('id',$service->id) ?>
            <div class="row">
                <div class="col-sm-12">
                         <div class="form-group row">
                        <label for="service_name" class="col-sm-2 col-form-label"><?php echo lan('service_name')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                             <input type="text" name="service_name" id="service_name" class="form-control" value="<?php echo $service->service_name?>">
                            
                        </div>
                    </div> 
                    </div>

                     <div class="col-sm-12">
                         <div class="form-group row">
                        <label for="charge" class="col-sm-2 col-form-label"><?php echo lan('charge')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                             <input type="number" name="charge" id="charge" class="form-control" value="<?php echo $service->charge?>">
                            
                        </div>
                    </div> 
                    </div>

                     <div class="col-sm-12">
                         <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label"><?php echo lan('description')?><i class="text-danger"></i></label>
                        <div class="col-sm-4">
                             
                             <textarea name="description" id="description" class="form-control"><?php echo $service->description?></textarea>
                            
                        </div>
                    </div> 
                    </div>

                    <?php 
                $i=0;
                foreach ($taxfield as $taxss) {
                if($sudata){
                    $tx = 'tax'.$i;
                    $tval = $sudata[0][$tx];
                }else{
                    $tval ='';
                }
                    ?>
                        <div class="col-sm-12">
                         <div class="form-group row">
                            <label for="tax" class="col-sm-2 col-form-label"><?php echo $taxss['tax_name']; ?> <i class="text-danger"></i></label>
                            <div class="col-sm-4">
                              <input type="text" name="tax<?php echo $i;?>" class="form-control" value="<?php echo ($tval?$tval*100:$taxss['default_value']);?>">
                            </div>
                            <div class="col-sm-1"> <i class="text-success">%</i></div>
                        </div>
                         </div>
                       <?php $i++;}

?>
           
                      
                           
                            <div class="col-sm-6 text-right">
                               <div class="form-group row">
                                <label class="col-sm-4"></label>
                                <div class="col-sm-8">
                                 <button type="submit"  class="btn btn-success form-control">
                                <?php echo (empty($person->id)?lan('save'):lan('update')) ?></button>
                               </div>
                            </div>
                        </div>
                  <?php echo form_close() ?>
                
            </div> 
        </div>
    </div>
</div>
</div>

