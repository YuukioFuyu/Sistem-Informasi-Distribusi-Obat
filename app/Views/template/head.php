
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="<?php  echo  ($title?$title:'Bdtask Pharmacare')?>">
        <meta name="author" content="Bdtask">
        <title><?php  echo  ($title?$title:'Bdtask Pharmacare')?></title>
        <?php 
          $font_one = (@$dynamic_color->font_one?@$dynamic_color->font_one:'Alegreya+Sans');
          $font_two = (@$dynamic_color->font_two?@$dynamic_color->font_two:'Libre+Franklin');
        ?>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url().$settings_info->favicon?>">
        <!--Global Styles(used by all pages)-->
          <!-- style for ltl bootstrap css-->
          <?php if($settings_info->rtl == 0){?>
    <link href="<?php echo base_url()?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
         <!-- style for rtl custom bootstap css -->
     <?php }else{?>
       <link href="<?php echo base_url()?>/assets/plugins/bootstrap/css/rtl/bootstrap-rtl.min.css" rel="stylesheet">
       <?php }?> 

  <!-- style for ltl metismenu css-->
  <?php if($settings_info->rtl == 0){?>
      <link href="<?php echo base_url()?>/assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
   <!-- style for rtl metismenu css-->
    <?php }else{?>
         <link href="<?php echo base_url()?>/assets/plugins/metisMenu/metisMenu-rtl.css" rel="stylesheet"> 
    <?php }?> 

        <link href="<?php echo base_url()?>/assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
       
           <link href="https://fonts.googleapis.com/css2?family=<?php echo @$font_one?>:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900&family=<?php echo @$font_two?>:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
        
        <!--Third party Styles(used by this page)--> 
       
   <!-- datatable css -->
        <link href="<?php echo base_url()?>/assets/plugins/datatables/dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet">
        <!-- datatable css end -->
        <!--Start Your Custom Style Now-->
      
        <link href="<?php echo base_url()?>/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/select2-bootstrap4/dist/select2-bootstrap4.min.css" rel="stylesheet">

        <link href="<?php echo base_url()?>/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/toastr/toastr.css" rel="stylesheet">
     
        <link href="<?php echo base_url()?>/assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
        <link href="<?php echo base_url()?>/assets/plugins/modals/component.css" rel="stylesheet">
         <link href="<?php echo base_url()?>/assets/plugins/icheck/skins/all.css" rel="stylesheet">
  
       <!-- style for ltl custom css-->
       <?php if($settings_info->rtl == 0){?>
         <link href="<?php echo base_url()?>/assets/dist/css/style.min.css" rel="stylesheet"> 
       <?php }else{?>
        <!-- style for rtl custom css-->
         <link href="<?php echo base_url()?>/assets/dist/css/style.rtl.css" rel="stylesheet"> 
          <?php }?> 
           <link href="<?php echo base_url()?>/assets/plugins/vakata-jstree/dist/themes/default/style.min.css" rel="stylesheet">
           
        <link href="<?php echo base_url()?>/assets/dist/css/print.css" rel="stylesheet">  
        <link href="<?php echo base_url()?>/assets/dist/css/custom.css" rel="stylesheet">  
        <?php 
        if(!empty($dynamic_color) && $dynamic_color->active_status==1){
             echo view('template/style.php');
        }
    ?> 
       <script src="<?php echo base_url()?>/assets/plugins/jQuery/jquery.min.js"></script>
       