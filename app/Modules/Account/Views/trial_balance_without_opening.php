
        <div class="row">
             <div class="col-md-12 col-lg-12">
                <div class="card">
        <div class="card-header py-2">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="fs-17 font-weight-600 mb-0"><?php echo lan('trial_balance')?></h6>
                </div>
                <div class="text-right">
                    <input type="button" class="btn btn-warning" name="btnPrint" id="btnPrint" value="Print" onclick="printDiv('printArea');"/>
                  <?php  $this->db = db_connect();?>
                </div>
            </div>
        </div>
                 <div class="card-body">
            <div id="printArea">
                           <table width="100%" class="table table-bordered table_boxnew" cellpadding="5" cellspacing="0">
                <tr>
                 <td colspan="4" align="center">
                <h3><?php echo lan('trial_balance')?><br/>
        <?php echo lan('as_on')?> <?php echo $dtpFromDate; ?> <?php echo lan('to')?> <?php echo $dtpToDate;?></h3></td></tr>
                <tr class="table_head">
                <td width="20%" align="center"><strong><?php echo lan('code')?></strong></td>
                <td width="50%" align="center"><strong><?php echo lan('account_name')?></strong></td>
                <td width="15%" align="center"><strong><?php echo lan('debit')?></strong></td>
                <td width="15%" align="center"><strong><?php echo lan('credit')?></strong></td>
                </tr>
        <?php
            $TotalCredit=0;
          $TotalDebit=0;  
          $k=0;
            for($i=0;$i<count($oResultTr);$i++)
          {
            $COAID=$oResultTr[$i]['HeadCode'];
            
              $sql="SELECT SUM(acc_transaction.Debit) AS Debit, SUM(acc_transaction.Credit) AS Credit FROM acc_transaction WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%' ";
            
          

            $q1=$this->db->query($sql);
            $oResultTrial = $q1->getRow();


            $bg=$k&1?"#FFFFFF":"#E7E0EE";
            if($oResultTrial->Credit+$oResultTrial->Debit>0)
            {
              $k++; ?>
                <tr class="table_data">
                  <td  align="left" bgcolor="<?php echo $bg;?>"><a href="javascript:"><?php echo $oResultTr[$i]['HeadCode'];?>
                   </a>
                  </td>
                  <td  align="left" bgcolor="<?php echo $bg;?>"><?php echo $oResultTr[$i]['HeadName'];?></td>
                  <?php
            if($oResultTrial->Debit>$oResultTrial->Credit)
          {
          ?>
                  <td  align="right" bgcolor="<?php echo $bg;?>"><?php 
            $TotalDebit += $oResultTrial->Debit-$oResultTrial->Credit;
           echo number_format($oResultTrial->Debit-$oResultTrial->Credit,2);
           ?></td>
                  <td  align="right" bgcolor="<?php echo $bg;?>"><?php
           echo number_format('0.00',2);?></td>
                   <?php
          }
          else
          {
          ?>
                     <td  align="right" bgcolor="<?php echo $bg;?>"><?php 
           echo number_format('0.00',2);
           ?></td>
                  <td  align="right" bgcolor="<?php echo $bg;?>"><?php 
            $TotalCredit += $oResultTrial->Credit-$oResultTrial->Debit;
           echo number_format($oResultTrial->Credit-$oResultTrial->Debit,2);?></td>
                   <?php
          }
          ?>
                </tr>
                <?php
            }
          } 
          
          for($i=0;$i<count($oResultInEx);$i++)
          {
            $COAID=$oResultInEx[$i]['HeadCode'];
            
              $sql="SELECT SUM(acc_transaction.Debit) AS Debit, SUM(acc_transaction.Credit) AS Credit FROM acc_transaction WHERE acc_transaction.IsAppove =1 AND VDate BETWEEN '".$dtpFromDate."' AND '".$dtpToDate."' AND COAID LIKE '$COAID%' ";
          

            $q2=$this->db->query($sql);
            $oResultTrial = $q2->getRow();

            $bg=$k&1?"#FFFFFF":"#E7E0EE";
            if($oResultTrial->Credit+$oResultTrial->Debit>0)
            {
              $k++; ?>
                <tr class="table_data">
                  <td  align="left" bgcolor="<?php echo $bg;?>"><a href="javascript:"><?php echo $oResultInEx[$i]['HeadCode'];?>
                   </a>
                  </td>
                  <td  align="left" bgcolor="<?php echo $bg;?>"><?php echo $oResultInEx[$i]['HeadName'];?></td>
                  <?php
            if($oResultTrial->Debit>$oResultTrial->Credit)
          {
          ?>
                  <td  align="right" bgcolor="<?php echo $bg;?>"><?php 
            $TotalDebit += $oResultTrial->Debit-$oResultTrial->Credit;
           echo number_format($oResultTrial->Debit-$oResultTrial->Credit,2);
           ?></td>
                  <td  align="right" bgcolor="<?php echo $bg;?>"><?php
           echo number_format('0.00',2);?></td>
                   <?php
          }
          else
          {
          ?>
                     <td  align="right" bgcolor="<?php echo $bg;?>"><?php 
           echo number_format('0.00',2);
           ?></td>
                  <td  align="right" bgcolor="<?php echo $bg;?>"><?php 
            $TotalCredit += $oResultTrial->Credit-$oResultTrial->Debit;
           echo number_format($oResultTrial->Credit-$oResultTrial->Debit,2);?></td>
                   <?php
          }
          ?>
                </tr>
                <?php
            }
          } 
        ?>
                <tr class="table_head">
                  <td colspan="2" align="right"><strong><?php echo lan('total')?></strong></td>
                  <td align="right"><strong><?php echo number_format($TotalDebit); ?></strong></td>
                  <td align="right"><strong><?php echo number_format( $TotalCredit,2); ?></strong></td>
                </tr>
                
            </table>
<br>
             <table width="100%" cellpadding="1" cellspacing="20" class="signaturetable">
                      <tr>
                          <td width="20%" class="footersignature" align="center"><?php echo lan('prepared_by')?></td>
                            <td width="20%" class="footersignature" align="center"><?php echo lan('accounts')?></td>
                            <td  width="20%" class="footersignature" align='center'><?php echo lan('chairman')?></td>
                        </tr>
                    </table>
                    </div>
                    </div>
                    </div>
                    </div>
           

                    </div>

        