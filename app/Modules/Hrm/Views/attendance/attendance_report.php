<div class="row">
    <div class="col-md-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('attendance_report')?></h6>
                                </div>
                                <div class="text-right">
                                   <a href="<?php echo base_url('attendance/add_attendance')?>" class="btn btn-success btn-sm mr-1"><i class="fas fa-plus mr-1"></i><?php echo lan('add_attendance')?></a>
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">
             <div class="row">
                  <div class="col-sm-12">
                    <?php echo form_open("attendance/datewise_attendance_report",'class="form-inline"') ?> 
                         
                                            <label class="sr-only" for="from_date"><?php echo lan('start_date') ?></label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><?php echo lan('start_date') ?></div>
                                                </div>
                                                <input type="text" class="form-control datepicker" name="from_date" id="from_date" placeholder="<?php echo lan('start_date') ?>" value="<?php echo $from_date?>">
                                            </div>

                                            <label class="sr-only" for="to_date"><?php echo lan('end_date') ?></label>
                                            <div class="input-group mb-2 mr-sm-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><?php echo lan('end_date') ?></div>
                                                </div>
                                                <input type="text" class="form-control datepicker" id="to_date" name="to_date" placeholder="<?php echo lan('end_date') ?>" value="<?php echo $to_date?>">
                                            </div>
                                            <label class="sr-only" for="employee"><?php echo lan('employee') ?></label>
                                            <div class="input-group mb-2 mr-sm-2">
                                               <?php echo  form_dropdown('employee_id',$employee_list,$employee_id, 'class="form-control select2"') ?>
                                            </div>
                                        
                                            <button type="submit" id="btn-filter-pur" class="btn btn-success mb-2"><?php echo lan('find') ?></button>
                                        <?php echo form_close()?>
                </div>
               
            </div>
            <?php if($result){?>
                <div class="table-responsive mt-3">
        
                       <table class="table table-bordered">
                     
                      <thead>
                        <tr>
                          <th><?php echo lan('sl_no')?></th>
                          <th><?php echo lan('employee')?></th>
                          <th><?php echo lan('date')?></th>
                          <th><?php echo lan('sign_in')?></th>
                          <th><?php echo lan('sign_out')?></th>
                          <th><?php echo lan('staytime')?></th>
                        </tr>
                      </thead>
                      <tbody>
                         
                        <?php 
                        $sl = 1;
                        $sum = strtotime('00:00:00');
                        $sum2=0; 
                        foreach($result as $data){?>
                        <tr>
                          <td><?php echo $sl++;?></td>
                          <td><?php echo $data['first_name'].' '.$data['last_name']?></td>
                          <td><?php echo $data['date']?></td>
                          <td><?php echo $data['sign_in']?></td>
                          <td><?php echo $data['sign_out']?></td>
                          <td><?php echo $data['staytime'];
                          $sum1=strtotime($data['staytime'])-$sum;
                          $sum2 = $sum2+$sum1;
                          ?></td>
                        </tr>
                      <?php }?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="5" class="text-right"><b><?php echo lan('total')?></b></td>
                          <td>
                            <b><?php  $sum3=$sum+$sum2;
                            if(empty($result[0]['staytime'])){
                              echo '00:00:00';
                            }else{
                             echo date("H:i:s",$sum3);  
                            }
                           
                            ?></b>
                          </td>

                        </tr>
                      </tfoot>
                    </table>
                </div>
              <?php }?>
            </div> 
        </div>
    </div>
</div>

