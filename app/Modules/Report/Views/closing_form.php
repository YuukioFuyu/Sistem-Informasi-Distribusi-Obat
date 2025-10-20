  
        <div class="row">
             <div class="col-md-6 col-lg-6">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_closing')?></h6>
                </div>
                <div class="text-right">
                 
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
   
      <?php echo form_open_multipart("report/add_closing/") ?>            
               
                       <div class="form-group row">
                            <label for="last_day_closing" class="col-sm-3 col-form-label"><?php echo lan('last_day_closing') ?></label>
                            <div class="col-sm-6">
                                <input type="text" name="last_day_closing" class="form-control" id="last_day_closing" value="<?php echo $info['last_day_closing']?>" readonly="readonly" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cash_in" class="col-sm-3 col-form-label"><?php echo lan('receive') ?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="cash_in" name="cash_in" value="<?php echo $info['cash_in'];?>" readonly="readonly" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cash_out" class="col-sm-3 col-form-label"><?php echo lan('payment') ?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="cash_out" name="cash_out" value="<?php echo $info['cash_out']?>" readonly="readonly" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cash_in_hand" class="col-sm-3 col-form-label"><?php echo lan('balance') ?></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="cash_in_hand" name="cash_in_hand" value="<?php echo $info['cash_in_hand']?>" readonly="readonly" required />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit" id="add-deposit" class="btn btn-success" name="add-deposit" value="<?php echo lan('save') ?>" required />
                            </div>
                        </div>
               

                <?php echo form_close();?>
                    </div>
                    </div>
                    </div>

                                 <div class="col-md-6 col-lg-6">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('cash_in_hand')?></h6>
                </div>
                <div class="text-right">
                 
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
                      <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center"><nobr><?php echo lan('note_name') ?></nobr></th>
                                    <th class="text-center"><?php echo lan('pcs') ?></th>
                                    <th class="text-center"><?php echo lan('amount') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                    <td class="2000 text-right"><?php echo '2000'; ?></td>
                                    <td><input type="number" class="form-control text_0 text-right" name="thousands" onkeyup="cashCalculator()"  onchange="cashCalculator()"></td>
                                    <td><input type="text" class="form-control text_0_bal text-right" readonly=""></td>
                                </tr> 
                                <tr>
                                    <td class="1000 text-right"><?php echo '1000'; ?></td>
                                    <td><input type="number" class="form-control text_1 text-right" name="thousands" onkeyup="cashCalculator()"  onchange="cashCalculator()"></td>
                                    <td><input type="text" class="form-control text_1_bal text-right" readonly=""></td>
                                </tr> 
                                <tr>
                                    <td class="500 text-right"><?php echo '500'; ?></td>
                                    <td><input type="number" class="form-control text_2 text-right" name="fivehnd" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><input type="text" class="form-control text_2_bal text-right" readonly=""></td>
                                </tr> 
                                 <tr>
                                    <td class="200 text-right"><?php echo '200'; ?></td>
                                    <td><input type="number" class="form-control text_200 text-right" name="hundrad" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><input type="text" class="form-control text_200_bal text-right" readonly=""></td>
                                </tr>     
                                <tr>
                                    <td class="100 text-right"><?php echo '100'; ?></td>
                                    <td><input type="number" class="form-control text_3 text-right" name="hundrad" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><input type="text" class="form-control text_3_bal text-right" readonly=""></td>
                                </tr>   
                                <tr>
                                    <td class="50 text-right"><?php echo '50'; ?></td>
                                    <td><input type="number" class="form-control text_4 text-right" name="fifty" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><input type="text" class="form-control text_4_bal text-right" readonly=""></td>
                                </tr>   
                                <tr>
                                    <td class="20 text-right"><?php echo '20'; ?></td>
                                    <td><input type="number" class="form-control text_5 text-right" name="twenty" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><input type="text" class="form-control text_5_bal text-right" readonly=""></td>
                                </tr>   
                                <tr>
                                    <td class="10 text-right"><?php echo '10'; ?></td>
                                    <td><input type="number" class="form-control text_6 text-right" name="ten" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><input type="text" class="form-control text_6_bal text-right" readonly=""></td>
                                </tr>   
                                <tr>
                                    <td class="5 text-right"><?php echo '5'; ?></td>
                                    <td><input type="number" class="form-control text_7 text-right" name="five" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><input type="text" class="form-control text_7_bal text-right" readonly=""></td>
                                </tr>   
                                <tr>
                                    <td class="2 text-right"><?php echo '2';?></td>
                                    <td><input type="number" class="form-control text_8 text-right" name="two" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><input type="text" class="form-control text_8_bal text-right" readonly=""></td>
                                </tr>
                                <tr>
                                    <td class="1 text-right"><?php echo '1'; ?></td>
                                    <td><input type="number" class="form-control text_9 text-right" name="one" onkeyup="cashCalculator()" onchange="cashCalculator()"></td>
                                    <td><input type="text" class="form-control text_9_bal text-right" readonly=""></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" align="right"><b><?php echo lan('grand_total') ?></b></td>
                                    <td class=""><input type="text" class="form-control total_money text-right" readonly="" name="grndtotal"></td>
                                </tr>
                                <?php echo form_close() ?>
                            </tfoot>
                        </table>
   
  
                    </div>
                    </div>
                    </div>
                    </div>
                      

