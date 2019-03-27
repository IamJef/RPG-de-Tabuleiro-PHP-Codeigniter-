<body class="text-center bg-dark">
  <form class="form-signin">
    <img src="<?php echo site_url(); ?>assets/imgs/logo_login.png">
    <h4 class="text-white"><?=$select?></h4>
    <br>
    <a class="my-2 btn btn-success" href="<?php echo site_url()."change-language/portugues"; ?>" role="button">
      <img src="<?php echo site_url();?>/assets/imgs/icons/flags/Brasil.png"> Português
    </a>
    <br>
    <a class="my-2 btn btn-danger" href="<?php echo site_url()."change-language/espanol"; ?>" role="button">
      <img src="<?php echo site_url();?>/assets/imgs/icons/flags/Espanha.png"> Español
    </a>
    <br>
    <a class="my-2 btn btn-primary" href="<?php echo site_url()."change-language/english"; ?>" role="button">
      <img src="<?php echo site_url();?>/assets/imgs/icons/flags/USA.png"> English
    </a>
  </form>
</body>