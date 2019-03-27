        <!-- jQuery CDN -->
         <script src="<?php echo site_url(); ?>assets/js/jquery-1.12.0.min.js"></script>
        <script src="<?php echo site_url(); ?>assets/js/jquery-ui.min.js"></script>

         <!-- Bootstrap Js CDN -->
         <script src="<?php echo site_url(); ?>assets/js/bootstrap.min.js"></script>
         <script src="<?php echo site_url(); ?>assets/js/bootstrap.bundle.min.js"></script>

         <script src="<?php echo site_url(); ?>assets/js/geral.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
            $(function () {
                $('[data-toggle="popover"]').popover({html : true});
                $('.popover-dismiss').popover({
                  trigger: 'focus'
                });
            });

         </script>
    </body>
</html>