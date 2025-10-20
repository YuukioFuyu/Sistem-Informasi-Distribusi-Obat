
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('cash_flow')?></h6>
                </div>
                <div class="text-right">
                  <input type="button" class="btn btn-warning" name="btnPrint" id="btnPrint" value="Print" onclick="printDiv('printArea');"/>
                  
                </div>
            </div>
        </div>
                 <div class="card-body">
                    <div id="printArea">
  <table class="print-table" width="100%">
                                                
                                                <tr>
                                                    <td align="left" class="print-table-tr">
                                                        <img src="<?php echo base_url().'/'.$settings_info->logo;?>" alt="logo">
                                                    </td>
                                                    <td align="center" class="print-cominfo">
                                                        <span class="company-txt">
                                                            <?php echo esc($settings_info->title);?>
                                                           
                                                        </span><br>
                                                        <?php echo esc($settings_info->address);?>
                                                        <br>
                                                        <?php echo esc($settings_info->email);?>
                                                        <br>
                                                         <?php echo esc($settings_info->phone);?>
                                                        
                                                    </td>
                                                   
                                                     <td align="right" class="print-table-tr">
                                                        <date>
                                                        <?php echo lan('date')?>: <?php
                                                        echo date('d-M-Y');
                                                        ?> 
                                                    </date>
                                                    </td>
                                                </tr>            
                                   
                                </table>
                 <table width="100%" class="table_boxnew" cellpadding="0" cellspacing="0">
                  <tr>
                      <td colspan="3" align="center"><b><?php echo lan('cash_flow_statement');?>  </b></td>
                  </tr>
                  <tr class="table_head">
                      <td colspan="3" align="center"><b>On <?php echo esc($dtpFromDate); ?> To <?php echo esc($dtpToDate);?></b></td>
                  </tr>
                  <tr class="table_head">
                      <td width="73%" height="29" align="center" class="cashflowparticular"><b><?php echo lan('particulars');?></b></td>
                      <td width="2%">&nbsp;</td>
                      <td width="30%" align="right" class="cashflowamount"><b><?php echo lan('amount');?></b></td>
                  </tr>
                   <tr class="table_head">
                    <td colspan="3" class="paddingleft10px"><strong><?php echo lan('opening_cash_and_equivalent');?>:</strong></td>
                  </tr>
                  <?php
                  use App\Modules\Account\Models\AccountModel;
                    $accountModel  = new AccountModel();
                    $db = db_connect();
                    $sql=$accountModel->cashflow_firstquery();

                    $sql = $db->query($sql);
                    $oResultAsset = $sql->getResult();
            
                    $TotalOpening=0;
                    for($i=0;$i<count($oResultAsset);$i++)
                    {
                      $COAID=$oResultAsset[$i]->HeadCode;
                      $sql=$accountModel->cashflow_secondquery($dtpFromDate,$dtpToDate,$COAID); 

                      $sql1 = $db->query($sql);
                      $oResultAmountPre = $sql1->getRow();
                      if($oResultAmountPre->Amount!=0)
                      {
                  ?>
                    <tr >
                        <td align="left" class="paddingleft10px"><?php echo esc($oResultAsset[$i]->HeadName); ?></td>
                        <td>&nbsp;</td>
                        <td align="right" class="cashflowamnt <?php if($TotalOpening==0) echo 'footersignature' ?>" >
                            <?php 
                                $Total=$oResultAmountPre->Amount;
                                echo number_format($Total);
                        
                                $TotalOpening+=$Total; 
                            ?>
                        </td>
                    </tr>
                          <?php
                      }
                    }
                  ?>
                  <tr>
                    <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td class="footersignature">&nbsp;</td>
                  </tr>
                  <tr>
                   <td align="left" class="paddingleftright10"><strong>Total Opening Cash & Cash Equivalent</strong></td>
                    <td>&nbsp;</td>
                     <td align="right" class="totalopeninig"><strong><?php echo number_format($TotalOpening); ?></strong></td>
                  </tr>
                  <tr class="table_head">
                      <td colspan="3" class="padddingwithunderline"><b>Cashflow from Operating Activities</b></td>
                  </tr>
                  <?php
                      $TotalCurrAsset=0;
                      $sql=$accountModel->cashflow_thirdquery();

                      $sql2 = $db->query($sql);
                      $oResultCurrAsset = $sql2->getResult();

                      for($s=0;$s<count($oResultCurrAsset);$s++)
                      {
                        $COAID=$oResultCurrAsset[$s]->HeadCode;
                        $sql= $accountModel->cashflow_forthquery($dtpFromDate,$dtpToDate,$COAID);

                        $sql3 = $db->query($sql);
                        $oResultAmount = $sql3->getRow();

                        if($oResultAmount->Amount!=0)
                        {
                          ?>
                          <tr >
                              <td align="left" class="paddingleft10px"><?php echo esc($oResultCurrAsset[$s]->HeadName); ?></td>
                              <td>&nbsp;</td>
                              <td align="right" class="cashflowamnt <?php if($TotalCurrAsset==0) echo 'footersignature' ?>">
                                  <?php 
                                      $Total=$oResultAmount->Amount;
                                      echo number_format($Total);
                                      $TotalCurrAsset+=$Total; 
                                  ?>
                              </td>
                          </tr>
                          <?php
                      }
                    }
                  $sql=$accountModel->cashflow_fifthquery($dtpFromDate,$dtpToDate,$COAID);

                  $sql4 = $db->query($sql);
                  $oResultAmount = $sql4->getRow();

                  if($oResultAmount->Amount!=0)
                  {
                    ?>
                   <tr>
                      <td align="left" class="paddingleft10px">Payment for Other Operating Activities</td>
                      <td>&nbsp;</td>
                      <td align="right"  class="cashflowamnt">
                          <?php 
                              $Total=$oResultAmount->Amount;
                              echo number_format($Total,2);
                              $TotalCurrAsset+=$Total; 
                          ?>
                      </td>
                  </tr>
                  <?php
                }
                ?>
                   <tr >
                      <td >&nbsp;</td>
                       <td>&nbsp;</td>
                     <td class="footersignature">&nbsp;</td>
                  </tr>
                  <tr >
                      <td align="left" class="paddingleftright10"><strong>Cash generated from Operating Activites before Changing in Opereating Assets &amp; Liabilities</strong></td>
                       <td>&nbsp;</td>
                     <td align="right" class="totalopeninig"><strong><?php echo number_format($TotalCurrAsset); ?></strong></td>
                  </tr>
                  
                  <tr class="table_head">
                      <td colspan="3" class="padddingwithunderline"><b>Cashflow from Non Operating Activities</b></td>
                  </tr>
                  <?php
                    $TotalCurrAssetNon=0;
                    $sql=$accountModel->cashflow_sixthquery();

                    $sql5 = $db->query($sql);
                    $oResultCurrAsset = $sql5->getResult();

                    for($s=0;$s<count($oResultCurrAsset);$s++)
                    {
                    $COAID=$oResultCurrAsset[$s]->HeadCode;
                    $sql=$accountModel->cashflow_seventhquery($dtpFromDate,$dtpToDate,$COAID);

                    $sql6 = $db->query($sql);
                    $oResultAmount = $sql6->getRow();

                    if($oResultAmount->Amount!=0)
                    {
                  ?>
                    <tr>
                        <td align="left" class="paddingleft10px"><?php echo esc($oResultCurrAsset[$s]->HeadName); ?></td>
                        <td>&nbsp;</td>
                        <td align="right" class="cashflowamnt <?php if($TotalCurrAssetNon==0) echo 'footersignature' ?>">
                    <?php 
                        $Total=$oResultAmount->Amount;
                        echo number_format($Total);
                        $TotalCurrAssetNon+=$Total; 
                    ?>
                        </td>
                    </tr>
                  <?php
                      }
                    }
                  ?>
                   <tr >
                      <td >&nbsp;</td>
                       <td>&nbsp;</td>
                     <td class="footersignature">&nbsp;</td>
                  </tr>
                  <tr >
                      <td align="left" class="paddingleftright10"><strong>Cash generated from Non Operating Activites before Changing in Opereating Assets &amp; Liabilities</strong></td>
                       <td>&nbsp;</td>
                     <td align="right" class="totalopeninig"><strong><?php echo number_format($TotalCurrAssetNon); ?></strong></td>
                  </tr>
                  <tr >
                      <td >&nbsp;</td>
                       <td>&nbsp;</td>
                     <td >&nbsp;</td>
                  </tr>
                   <tr class="table_head">
                      <td align="left" class="paddingleftright10"><strong>Increase/Decrease in Operating Assets &amp; Liabilites</strong></td>
                     <td>&nbsp;</td>
                     <td align="right" class="pddingright10">&nbsp;</td>
                </tr>
                  
                <?php
                $TotalCurrLiab=0;
                $sql="SELECT * FROM acc_coa WHERE IsGL=1 AND HeadCode LIKE '20101%' AND HeadCode!=20101 AND IsActive=1";

                $sql6 = $db->query($sql);
                $oResultLiab = $sql6->getResult();

                for($t=0;$t<count($oResultLiab);$t++)
                {
                $COAID=$oResultLiab[$t]->HeadCode;

                $sql="SELECT SUM(acc_transaction.Credit)-SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%')";
                $oResultAmount=$oAccount->SqlQuery($sql);

                $sql7 = $db->query($sql);
                $oResultAmount = $sql7->getRow();

                if($oResultAmount->Amount!=0)
                {
                  ?>
                  <tr >
                      <td align="left" class="paddingleft10px"><?php echo esc($oResultLiab[$t]->HeadName); ?></td>
                      <td>&nbsp;</td>
                      <td align="right" class="cashflowamnt <?php if($TotalCurrLiab==0) echo 'footersignature' ?>">
                          <?php 
                              $Total=$oResultAmount->Amount;
                              echo number_format($Total);
                              $TotalCurrLiab+=$Total;
                          ?>
                      </td>
                  </tr>
                  <?php
              }
                    }
                  ?>
                   <tr >
                      <td >&nbsp;</td>
                       <td>&nbsp;</td>
                     <td class="footersignature">&nbsp;</td>
                  </tr>
                  <tr >
                      <td align="left" class="paddingleftright10"><strong>Total Increase/Decrease</strong></td>
                       <td>&nbsp;</td>
                     <td align="right" class="totalopeninig"><strong><?php echo number_format($TotalCurrLiab); ?></strong></td>
                  </tr>
                 <tr >
                      <td >&nbsp;</td>
                       <td>&nbsp;</td>
                     <td >&nbsp;</td>
                  </tr>
                  <tr>
                      <td align="left" class="paddingleftright10"><strong>Net Cash From Operating/Non Operating Activities</strong></td>
                      <td>&nbsp;</td>
                      <td align="right" class="totalopeninig"><strong><?php echo number_format($TotalCurrAsset+$TotalCurrAssetNon+$TotalCurrLiab); ?></strong></td>
                  </tr>
                   <tr >
                      <td >&nbsp;</td>
                       <td>&nbsp;</td>
                     <td >&nbsp;</td>
                  </tr>
                  <tr class="table_head">
                      <td colspan="3" class="padddingwithunderline"><b>Cash Flow from Investing Activities</b></td>
                  </tr>
                  <?php
                  $TotalNonCurrAsset=0;
                  $sql="SELECT * FROM acc_coa WHERE IsGL=1 AND HeadCode LIKE '101%' AND HeadCode!=101 AND IsActive=1";

                  $sql9 = $db->query($sql);
                  $oResultNonCurrAsset = $sql9->getResult();

                  for($t=0;$t<count($oResultNonCurrAsset);$t++)
                  {
                  $COAID=$oResultNonCurrAsset[$t]->HeadCode;

                  $sql="SELECT SUM(acc_transaction.Debit)-SUM(acc_transaction.Credit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%')";

                  $sql8 = $db->query($sql);
                  $oResultAmount = $sql8->getRow();

                  if($oResultAmount->Amount!=0)
                  {
                  ?>
                  <tr >
                      <td align="left" class="paddingleft10px"><?php echo $oResultNonCurrAsset[$t]->HeadName; ?></td>
                      <td>&nbsp;</td>
                      <td align="right" class="cashflowamnt <?php if($TotalNonCurrAsset==0) echo 'footersignature' ?>">
                          <?php 
                              $Total=$oResultAmount->Amount;
                              echo number_format($Total,2);
                              $TotalNonCurrAsset+=$Total;
                          ?>
                      </td>
                  </tr>
                  <?php
              }
                    }
                  ?>
                   <tr >
                      <td >&nbsp;</td>
                       <td>&nbsp;</td>
                     <td class="footersignature">&nbsp;</td>
                  </tr>
                  <tr >
                      <td align="left" class="paddingleftright10"><strong>Net Cash Used Investing Activities</strong></td>
                      <td>&nbsp;</td>
                      <td align="right" class="noncurcss"><strong><?php echo number_format($TotalNonCurrAsset); ?></strong></td>
                  </tr>
                   <tr >
                      <td >&nbsp;</td>
                       <td>&nbsp;</td>
                     <td >&nbsp;</td>
                  </tr>
                 
                  <tr class="table_head">
                      <td colspan="3" class="padddingwithunderline"><b>Cash Flow from Financing Activities</b></td>
                  </tr>
                  <?php
                  $TotalNonCurrLiab=0;
                  $sql="SELECT * FROM acc_coa WHERE IsGL=1 AND HeadCode LIKE '20102%' AND IsActive=1";

                  $sql10 = $db->query($sql);
                  $oResultNonCurrLiab = $sql10->getResult();

                  for($t=0;$t<count($oResultNonCurrLiab);$t++)
                  {
                  $COAID=$oResultNonCurrLiab[$t]->HeadCode;

                  $sql="SELECT SUM(acc_transaction.Credit)-SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%')";

                  $sql11 = $db->query($sql);
                  $oResultAmount = $sql11->getRow();

                  if($oResultAmount->Amount!=0)
                  {
                      ?>
                  <tr >
                      <td align="left" class="paddingleft10px"><?php echo $oResultNonCurrLiab[$t]->HeadName; ?></td>
                      <td>&nbsp;</td>
                      <td align="right" class="cashflowamnt <?php if($TotalNonCurrLiab==0) echo 'footersignature' ?>">
                          <?php 
                              $Total=$oResultAmount->Amount;
                              echo number_format($Total);
                              $TotalNonCurrLiab+=$Total;
                          ?>
                      </td>
                  </tr>
                  <?php
                    }
                  }
                  ?>
                  <?php
                  $TotalFund=0;
                  $sql="SELECT * FROM acc_coa WHERE IsGL=1 AND HeadCode LIKE '202%' AND IsActive=1";

                  $sql12 = $db->query($sql);
                  $oResultFund = $sql12->getResult();


                  for($t=0;$t<count($oResultFund);$t++)
                  {
                  $COAID=$oResultFund[$t]->HeadCode;

                  $sql="SELECT SUM(acc_transaction.Credit)-SUM(acc_transaction.Debit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove = 1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%' AND VNo in (SELECT VNo FROM acc_transaction WHERE COAID LIKE '1020101%')";

                  $sql13 = $db->query($sql);
                  $oResultAmount = $sql13->getRow();

                  if($oResultAmount->Amount!=0)
                  {
                  ?>
                  <tr >
                      <td align="left" class="paddingleft10px"><?php echo esc($oResultFund[$t]->HeadName); ?></td>
                      <td>&nbsp;</td>
                      <td align="right" class="cashflowamnt">
                          <?php 
                              $Total=$oResultAmount->Amount;
                              echo number_format($Total,2);
                              $TotalFund+=$Total;
                          ?>
                      </td>
                  </tr>
                  <?php
              }
                    }
                  ?>
                   <tr >
                      <td >&nbsp;</td>
                       <td>&nbsp;</td>
                     <td class="footersignature">&nbsp;</td>
                  </tr>
                  <tr >
                      <td align="left" class="paddingleftright10"><strong>Net  Cash Used Financing Activities</strong></td>
                      <td>&nbsp;</td>
                      <td align="right" class="cashflowamnt"><strong><?php echo number_format($TotalFund+$TotalNonCurrLiab); ?></strong></td>
                  </tr>
                   <tr >
                      <td >&nbsp;</td>
                       <td>&nbsp;</td>
                     <td >&nbsp;</td>
                  </tr>
                  <tr >
                      <td align="left" class="paddingleft10px"><strong>Net Cash Inflow/Outflow (Profit Loss <?php echo number_format($TotalCurrAsset+$TotalCurrAssetNon+$TotalCurrLiab+$TotalNonCurrAsset+$TotalFund+$TotalNonCurrLiab); ?>)</strong></td>
                      <td>&nbsp;</td>
                      <td align="right" class="totalopeninig"><strong><?php echo number_format($TotalCurrAsset+$TotalCurrAssetNon+$TotalCurrLiab+$TotalNonCurrAsset+$TotalFund+$TotalNonCurrLiab+$TotalOpening); ?></strong></td>
                  </tr>
                   <tr >
                      <td >&nbsp;</td>
                       <td>&nbsp;</td>
                     <td >&nbsp;</td>
                  </tr>
                
                <tr class="table_head">
                    <td colspan="3" class="paddingleft10px"><strong>Closing Cash & Cash Equivalent:</strong></td>
                  </tr>
                <?php
                  $sql="SELECT * FROM acc_coa WHERE acc_coa.IsTransaction=1 AND acc_coa.HeadType='A' AND acc_coa.IsActive=1 AND acc_coa.HeadCode LIKE '1020101%' ";

                  $sql14 = $db->query($sql);
                  $oResultAsset = $sql14->getResult();

                  $TotalAsset=0;
                  for($i=0;$i<count($oResultAsset);$i++)
                  {
                    $COAID=$oResultAsset[$i]->HeadCode;
                    $sql="SELECT SUM(acc_transaction.Debit)- SUM(acc_transaction.Credit) AS Amount FROM acc_transaction INNER JOIN acc_coa ON acc_transaction.COAID = acc_coa.HeadCode WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN  '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%'";

                    $sql15 = $db->query($sql);
                    $oResultAmount = $sql15->getRow();

                    if($oResultAmount->Amount!=0)
                    {
                ?>
                  <tr >
                      <td align="left" class="paddingleft10px"><?php echo $oResultAsset[$i]->HeadName; ?></td>
                      <td>&nbsp;</td>
                      <td align="right" class="cashflowamnt <?php if($TotalAsset==0) echo 'footersignature' ?>">
                          <?php 
                              $Total=$oResultAmount->Amount;
                              echo number_format($Total);
                                  $TotalAsset+=$Total; 
                          ?>
                      </td>
                  </tr>
                        <?php
                    }
                  }
                ?>
                  <tr>
                    <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td class="footersignature">&nbsp;</td>
                  </tr>
                  <tr>
                   <td align="left" class="paddingleftright10"><strong>Total Closing Cash & Cash Equivalent</strong></td>
                    <td>&nbsp;</td>
                     <td align="right" class="totalopeninig"><strong><?php echo number_format($TotalAsset); ?></strong></td>
                  </tr>
                 
              </table>
<br>
<br><br>
             <table width="100%" cellpadding="1" cellspacing="20">
                      <tr>
                        <td width="20%" class="footersignature" align="center"><?php echo lan('prepared_by')?></td>
                          <td width="20%" class="footersignature" align="center"><?php echo lan('accounts')?></td>
                          <td width="20%" class="footersignature" align="center"><?php echo lan('authorized_signature')?></td>
                          <td  width="20%" class="footersignature" align='center'><?php echo lan('chairman')?></td>
                      </tr>
                    </table>
                    
                    </div>
                    </div>
                    </div>
                    </div>
           

                    </div>

        

