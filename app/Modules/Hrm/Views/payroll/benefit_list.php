  
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('benefit_list')?></h6>
                </div>
                <div class="text-right">
                   <?php if($permission->method('add_benefits','create')->access()){?>
                   <a href="<?php echo base_url('payroll/add_benefits')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_benefits')?></a>
                 <?php }?>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
                  <div class="table-responsive">
                    <table class="table display table-bordered table-striped table-hover custom-table" id="example">
                     
                      <thead>
                        <tr>
                          <th><?php echo lan('sl_no')?></th>
                          <th class="text-center"><?php echo lan('benefit_name')?></th>
                          <th class="text-center"><?php echo lan('benefit_type')?></th>
                          <th class="text-center"><?php echo lan('status')?></th>
                          <th class="text-center"><?php echo lan('action')?></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if($list){
                          $sl = 1;
                        foreach($list as $data){?>
                        <tr>
                          <td><?php echo$sl++;?></td>
                          <td class="text-center"><?php echo $data['benefit_name']?></td>
                          <td class="text-center"><?php echo ($data['benefit_type'] == 1?lan('add'):lan('deduct'))?></td>
                          <td class="text-center"><?php echo ($data['status'] ==1?lan('active'):lan('inactive'))?></td>
                          <td class="text-center">
                             <?php if($permission->method('benefit_list','update')->access()){?>
                            <a href="<?php echo base_url('payroll/edit_benefit/'.$data['id'])?>" class="btn btn-info-soft"><i class="fas fa-edit" aria-hidden="true"></i></a>
                          <?php }?>
                          <?php if($permission->method('benefit_list','delete')->access()){?>
                            <a onclick="return confirm('Are You Sure?')" href="<?php echo base_url('payroll/delete_benefit/'.$data['id'])?>" class="btn btn-danger-soft"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
                          <?php }?>
                          </td>
                        </tr>
                      <?php }}else{?>
                         <tr>
                          <td colspan="5" class="text-center"><?php echo lan('no_record_found')?></td>
                        
                        </tr>
                      <?php }?>
                      </tbody>
                    </table>
                  </div>
                    </div>
                    </div>
                </div>
              </div>

                 
                 