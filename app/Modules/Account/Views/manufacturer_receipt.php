
        <div class="col-12 col-lg-6 col-xl-6">
            <div class="header p-0 ml-0 mr-0 shadow-none">
                <div class="header-body d-flex justify-content-end">
                    
                </div>
            </div>
            <!--/.End of header-->
            <div class="card card-body p-0">
                <table align="center" border="0">
                    <tbody>
                        <tr>
                            <td>
                                <table border="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td align="center" class="text-center">
                                                 <img src="<?php echo base_url().'/'.$company->logo?>" alt=""> 
                                                <div>
                                                	<?php 
                                                
                                                  echo  $company->title;?><br>
                                                   <?php echo  $company->address;?><br />
                                                    <?php echo  $company->phone;?>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td class="minpos-bordertop" style="border-top: #333 1px solid;"></td>
                                        </tr>
                                        <tr>
                                            <td align="center"><b><?php echo $manufacturer[0]['manufacturer_name'];?></b><br /></td>
                                        </tr>
                                        <tr>
                                            <td align="center">
                                                <time datetime="2008-02-14 20:00">Mobile: <?php echo $manufacturer[0]['mobile'];?></time>
                                            </td>
                                        </tr>
                                         <tr>
                                            <td align="center">
                                                <time datetime="2008-02-14 20:00">Date: <?php echo $payment_info[0]['VDate'];?></time>
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                                      <?php 
                                    
                                      ?>
                                <table width="100%" border="0">
                                    <tbody>
                                       
                                    <tr>
                                        <td class="text-left"><?php echo lan('voucher_no'); ?> : </td><td><?php echo  $payment_info[0]['VNo']?></td>
                                    </tr>
                                    <tr>
                                    <td class="text-left"><?php echo lan('payment_type'); ?> : </td><td><?php echo  'Payment';?></td>
                                    </tr>
                                    <tr>
                                    <td class="text-left"><?php echo lan('amount'); ?> </td><td>: <?php echo  $payment_info[0]['Debit'];?></td>
                                    </tr>
                                     <tr>
                                    <td class="text-left"><?php echo lan('remark'); ?> </td><td>: <?php echo  $payment_info[0]['Narration'];?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr colspan="6">
                            <td align="center">
                                Powered By: <a href="javascript:void(0)"><strong><?php echo  $company->title;?></strong></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
