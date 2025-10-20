<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="card ">
            <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('add_income_tax')?></h6>
                                </div>
                                <div class="text-right">
                                 
                                 
                                </div>
                            </div>
                        </div>
            <div class="card-body">
 <?php echo form_open_multipart("tax/save_income_tax/") ?>     
      <table id="POITable" border="0">
        <tr>
            <td class="text-center"><?php echo lan('sl_no') ?></td>
            <td class="text-center"><?php echo lan('start_amount') ?><strong><i class="text-danger">*</i></strong></td>
            <td class="text-center"><?php echo lan('end_amount') ?><strong><i class="text-danger">*</i></strong></td>
            <td class="text-center"><?php echo lan('tax_rate') ?><strong><i class="text-danger">*</i></strong></td>
            <td class="paddin5ps text-center"><?php echo lan('delete') ?>?</td>
            <td><?php echo lan('add_more') ?>?</td>
        </tr>
        <tr>
            <td>1</td>
            <td class="paddin5ps" required><input  type="text" class="form-control valid_number" id="start_amount" name="start_amount[]"  required/></td>
            <td class="paddin5ps"><input  type="text" class="form-control valid_number" id="end_amount" name="end_amount[]"  required/></td>
            <td class="paddin5ps"><input  type="text" class="form-control valid_number" id="rate" name="rate[]"  required/></td>
            <td class="paddin5ps"><button type="button" id="delPOIbutton" class="btn btn-danger ml-2" value="Delete" onclick="deleteTaxRow(this)"><i class="far fa-trash-alt"></i></button></td>
            <td class="paddin5ps"><button type="button" id="addmorePOIbutton" class="btn btn-success" value="Add More POIs" onclick="TaxinsRow()"><i class="fa fa-plus-circle"></button></td>
        </tr>
        </table>
        <br>
                        <div class="form-group text-center">
                            <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo lan('reset') ?></button>
                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo lan('setup') ?></button>
                        </div>                   
                   
  <?php echo form_close()?>
            </div> 
        </div>
    </div>
</div>

