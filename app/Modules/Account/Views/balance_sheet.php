
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('balance_sheet')?></h6>
                </div>
                <div class="text-right">
                  
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
  
<?php echo form_open('account/balance_sheet', array('class' => 'form-inline', 'method' => 'post')) ?>
            <?php
            $today = date('Y-m-d');
            ?>
            <div class="form-group">
                <label class="" for="from_date"><?php echo lan('start_date') ?></label>
                <input type="text" name="dtpFromDate" class="form-control datepicker" id="from_date" placeholder="<?php echo lan('start_date') ?>" value="<?php echo $from_date ?>">
            </div> 

            <div class="form-group">
                <label class="" for="to_date"><?php echo lan('end_date') ?></label>
                <input type="text" name="dtpToDate" class="form-control datepicker" id="to_date" placeholder="<?php echo lan('end_date') ?>" value="<?php echo $to_date ?>">
            </div>  

            <button type="submit" class="btn btn-success"><?php echo lan('search') ?></button>
          
            <?php echo form_close() ?>
                    
                    </div>
                    <div class="card-body">
                      <div class="paddin5ps">
               <?php 
               use App\Modules\Account\Models\AccountModel;
                $this->accountModel  = new AccountModel();
                $this->db = db_connect();
               ?>
<table width="100%" class="table_boxnew table-bordered" cellpadding="0" cellspacing="0">
<tr class="table_head">
    <td width="73%" height="29" align="center" class="cashflowparticular"><b><?php echo lan('particulars');?></b></td>
   
    <td width="30%" align="right" class="cashflowamount"><b><?php echo lan('amount');?></b></td>
</tr>
<?php 

foreach($fixed_assets as $assets){
$total_assets = 0;
$head_data = $this->accountModel->assets_info($assets['HeadName']);


?>
<tr >
      <td align="left" class="paddingleft10px <?php if($assets['HeadName'] =='Current Asset' || $assets['HeadName'] =='Non Current Assets'){echo 'balancesheet_head';}?>"><?php echo $assets['HeadName']; ?></td>
    
      <td align="right" class="cashflowamnt" >
         
      </td>
  </tr>
  <?php
 
   foreach($head_data as $assets_head){
      
   $ass_balance = $this->accountModel->assets_balance($assets_head['HeadCode'],$from_date,$to_date);?>
<?php if($assets_head['PHeadName'] == 'Current Asset'){
$child_head_current = $this->accountModel->asset_childs($assets_head['HeadName'],$from_date,$to_date);

?>
<tr>
      <td align="left" class="paddingleft10px"><?php echo esc($assets_head['HeadName']); ?></td>
    
      <td align="right" class="cashflowamnt" >
        
      </td>
  </tr>  

  <?php foreach($child_head_current as $cchead){
    $cur_ass_balance = $this->accountModel->assets_balance($cchead['HeadCode'],$from_date,$to_date);
     $schild_head_current = $this->accountModel->asset_childs($cchead['HeadName'],$from_date,$to_date);
    ?>
    <?php if($cur_ass_balance[0]['balance'] <> 0){?>
<tr>
      <td align="left" class="paddingleft10px"><?php echo esc($cchead['HeadName']); ?></td>
    
      <td align="right" class="cashflowamnt" >
        <?php echo esc($cur_ass_balance[0]['balance']);
        $total_assets += $cur_ass_balance[0]['balance'];
        ?>
      </td>
  </tr> 
<?php }?>

  <?php if($cchead['HeadName'] == 'Cash At Bank' || $cchead['HeadName'] == 'Account Receivable' || $cchead['HeadName'] == 'Customer Receivable' || $cchead['HeadName'] == 'Loan Receivable'){
  foreach($schild_head_current as $scchild){
    $cur_bank_balance = $this->accountModel->assets_balance($scchild['HeadCode'],$from_date,$to_date);
   ?>
   <?php if($cur_bank_balance[0]['balance'] <> 0){?>
    <tr >
      <td align="left" class="paddingleft10px"><?php echo esc($scchild['HeadName']); ?></td>
    
      <td align="right" class="cashflowamnt" >
        <?php echo esc($cur_bank_balance[0]['balance']);
        $total_assets += $cur_bank_balance[0]['balance'];
        ?>
      </td>
  </tr> 
<?php }?>
<?php }}?>
  <?php }?>
<?php }?>

    <?php if($assets_head['PHeadName'] == 'Non Current Assets'){?>
    <tr >
      <td align="left" class="paddingleft10px"><?php echo esc($assets_head['HeadName']); ?></td>
    
      <td align="right" class="cashflowamnt" >
        <?php echo esc($ass_balance[0]['balance']);
        $total_assets += $ass_balance[0]['balance'];
        ?>
      </td>
  </tr>  

<?php }?>
      
<?php }?>

     <tr >
      <td class="text-right balancesheet-paddingright"><b><?php echo lan('total')?>  <?php echo $assets['HeadName']; ?></b></td>
    
      <td align="right" class="cashflowamnt balance-sheet-border">
        <b><?php echo number_format($total_assets,2);?></b>
      </td>
  </tr>
<?php }?>



<?php

foreach($liabilities as $liability){
$total_liab = 0;
$liab_head_data = $this->accountModel->liabilities_info($liability['HeadName']);
?>
<tr >
      <td align="left" class="paddingleft10px <?php if($liability['HeadName'] =='Current Liabilities' || $liability['HeadName'] =='Non Current Liabilities'){echo 'balancesheet_head';}?>"><?php echo $liability['HeadName']; ?></td>
    
      <td align="right" class="cashflowamnt" >
         
      </td>
  </tr>
   <?php
 
   foreach($liab_head_data as $liab_head){
  
    if($liab_head['HeadName'] == 'Tax'){
        $child_liability = $this->accountModel->liabilities_info_tax($liab_head['HeadName']);
    }else{
        $child_liability = $this->accountModel->liabilities_info($liab_head['HeadName']);
    }
    ?>
   <?php  if($liab_head['HeadName'] != 'Tax'){?>
<tr >
      <td align="left" class="paddingleft10px"><?php echo esc($liab_head['HeadName']); ?></td>
    
      <td align="right" class="cashflowamnt" >
         <?php 
         $total_liab += 0;
          ?>
      </td>
  </tr>
<?php }?>

   <?php
 
   foreach($child_liability as $chliab_head){
    $liab_balance = $this->accountModel->liabilities_balance($chliab_head['HeadCode'],$from_date,$to_date);

    ?>
    <?php if($liab_balance[0]['balance'] <> 0){?>
<tr >
      <td align="left" class="paddingleft10px"><?php echo esc($chliab_head['HeadName']); ?></td>
    
      <td align="right" class="cashflowamnt" >
         <?php 

         echo  esc($liab_balance[0]['balance']);
         $total_liab += $liab_balance[0]['balance'];
          ?>
      </td>
  </tr>
<?php }?>

<?php }?>
<?php }?>
<tr >
      <td class="paddingleft10px text-right balancesheet-paddingright" ><b><?php echo lan('total')?>  <?php echo esc($liability['HeadName']); ?></b></td>
    
      <td align="right" class="cashflowamnt balance-sheet-border">
        <b><?php echo number_format($total_liab,2);?></b>
      </td>
  </tr>
<?php }?>

  <?php
 $total_expense = 0;
 $total_income = 0;
   foreach($incomes as $incomelable){
    $income_balance = $this->accountModel->income_balance($incomelable['HeadCode'],$from_date,$to_date);
    ?>
    <tr>
      <td align="left" class="paddingleft10px balancesheet_head"><?php echo esc($incomelable['HeadName']); ?></td>
    
      <td align="right" class="cashflowamnt" >
         <?php echo esc($income_balance[0]['balance']);
         $total_income += $income_balance[0]['balance'];
         ?>
      </td>
    </tr>
    <?php }?>

<tr >
      <td class="paddingleft10px text-right balancesheet-paddingright"><b><?php echo lan('total')?>  <?php echo lan('income'); ?></b></td>
    
      <td align="right" class="cashflowamnt balance-sheet-border">
        <b><?php echo number_format($total_income,2);?></b>
      </td>
  </tr>
     <?php
 
   foreach($expenses as $expense){
    $expense_balance = $this->accountModel->income_balance($expense['HeadCode'],$from_date,$to_date);
    ?>
    <tr>
      <td align="left" class="paddingleft10px balancesheet_head"><?php echo esc($expense['HeadName']); ?></td>
    
      <td align="right" class="cashflowamnt" >
         <?php echo $expense_balance[0]['balance'];
           $total_expense += $expense_balance[0]['balance'];
         ?>
      </td>
    </tr>
    <?php }?>
    <tr >
      <td class="paddingleft10px text-right balancesheet-paddingright"><b><?php echo lan('total')?>  <?php echo lan('expense'); ?></b></td>
    
      <td align="right" class="cashflowamnt balance-sheet-border">
        <b><?php echo number_format($total_expense,2);?></b>
      </td>
  </tr>

</table>
</div>
                    </div>
                    </div>
                    </div>
           

                    </div>

        

