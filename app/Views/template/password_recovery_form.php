<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="<?php  echo  ($title?$title:'Bdtask Pharmacare')?>e">
        <meta name="author" content="Bdtask">
        <title><?php  echo  ($title?$title:'Bdtask Pharmacare')?></title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url()?>/assets/dist/img/favicon.png">
        <!--Global Styles(used by all pages)-->
        <link href="<?php echo base_url()?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/toastr/toastr.css" rel="stylesheet">
        <!--Third party Styles(used by this page)--> 

        <!--Start Your Custom Style Now-->
        <link href="<?php echo base_url()?>/assets/dist/css/style.css" rel="stylesheet">
    </head>
    <body class="bg-white">
        <div class="d-flex align-items-center justify-content-center text-center h-100vh">
            <div class="form-wrapper m-auto">
                <div class="form-container my-4">
                    <div class="register-logo text-center mb-4">
                        <img src="assets/dist/img/logo.png" alt="">
                    </div>
                    <div class="panel">
                     
                         <?php echo form_open('change_recovery', array('class' => 'form-vertical', 'id' => 'passrecovery')) ?>
                            <div class="form-group">
                                <input type="password" class="form-control is-invalid" id="new_password" name="new_password" placeholder="Enter Your New password">
                                <input type="hidden" name="email" value="<?php echo $email;?>">
                                <input type="hidden" name="token" value="<?php echo $token;?>">
                            </div>
                          
                           
                            <button type="submit" class="btn btn-success btn-block">Reset</button>
                        <?php echo form_close()?>
                    </div>
                  <input type="hidden" value="<?php echo base_url()?>" id="base_url">
                </div>
            </div>

        </div>
       
        <!-- /.End of form wrapper -->
        <!--Global script(used by all pages)-->
        <script src="<?php echo base_url()?>/assets/plugins/jQuery/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/assets/plugins/jQuery/jquery.min.js"></script>
        <script src="<?php echo base_url()?>/assets/dist/js/popper.min.js"></script>
        <script src="<?php echo base_url()?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>/assets/plugins/metisMenu/metisMenu.min.js"></script>
        <script src="<?php echo base_url()?>/assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
        <!-- Third Party Scripts(used by this page)-->

        <!--Page Active Scripts(used by this page)-->

        <!--Page Scripts(used by all page)-->
        <script src="<?php echo base_url()?>/assets/dist/js/sidebar.js"></script>
        <script src="<?php echo base_url()?>/assets/plugins/toastr/toastr.min.js"></script>
   
 <script type="text/javascript">
 $(document).ready(function() {
                "use strict";
   var frm = $("#passrecovery");
   var base_url = $("#base_url").val();
    frm.on('submit', function(e) {
        e.preventDefault(); 
        $.ajax({
            url      : $(this).attr('action'),
            method   : $(this).attr('method'),
            dataType : 'json',
            data     : frm.serialize(),
            success: function(data) 
            {
        if (data.status == 1) {
           toastr["success"](data.message);
           window.location.assign(base_url+'/login');
            }else {
            toastr["error"](data.exception);
            }
            },
            error: function(xhr)
            {
                toastr["error"]('fail');
            }
        });
    });
     });
        </script>
      
