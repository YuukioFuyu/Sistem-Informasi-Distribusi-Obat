  <footer class="footer-content">
                    <div class="footer-text d-flex align-items-center justify-content-between">
                        <div class="copy"><?php echo $settings_info->footer_text;?></div>
                        <div class="credit"></div>
                    </div>
                    <input type="hidden" name="" id="base_url" value="<?php echo base_url();?>">
                    <input type="hidden" name="" id="currency" value="<?php echo esc($settings_info->currency);?>">
                    <input type="hidden" name="" id="discount_type" value="<?php echo esc($settings_info->discount_type);?>">
                    <input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?php echo csrf_hash();?>">
                </footer><!--/.footer content-->

                <!-- Modal fade in & scale effect -->

                <div class="overlay"></div>
                </div>
</div>

      <script src="<?php echo base_url()?>/assets/dist/js/popper.min.js"></script>
       <script src="<?php echo base_url()?>/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
      <script src="<?php echo base_url()?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url()?>/assets/plugins/metisMenu/metisMenu.min.js"></script>
      <script src="<?php echo base_url()?>/assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
      <!-- Third Party Scripts(used by this page)-->
     <script src="<?php echo base_url()?>/assets/plugins/sparkline/sparkline.min.js"></script>
       
        <!--Page Active Scripts(used by this page)-->
 
        <!--Page Scripts(used by all page)-->
    <script src="<?php echo base_url()?>/assets/dist/js/sidebar.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/chartJs/Chart.min.js"></script>
        <!--Page Active Scripts(used by this page)-->

    <script src="<?php echo base_url()?>/assets/plugins/datatables/dataTables.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/datatables/dataTables.buttons.min.js"></script>
  
    <script src="<?php echo base_url()?>/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/datatables/jszip.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/datatables/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/datatables/vfs_fonts.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/datatables/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/datatables/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/datatables/data-bootstrap4.active.js"></script>
      
    <script src="<?php echo base_url()?>/assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
        <!--Page Active Scripts(used by this page)-->
    <script src="<?php echo base_url()?>/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/toastr/toastr.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/select2/dist/js/select2.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/vakata-jstree/dist/jstree.min.js"></script>
            <!--Page Active Scripts(used by this page)-->
    <script src="<?php echo base_url()?>/assets/dist/js/pages/tree-view.active.js"></script> <script src="<?php echo base_url()?>/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?php echo base_url()?>/assets/dist/js/print.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/modals/classie.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/modals/modalEffects.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/icheck/icheck.min.js"></script>
    <script src="<?php echo base_url()?>/assets/dist/js/pages/icheck.active.js"></script>
    <script src="<?php echo base_url()?>/assets/dist/js/pages/custom.js"></script>

    </body>
</html>