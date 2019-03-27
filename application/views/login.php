<body class="text-center bg-azul">
  <?php 
  $atributo = array('class' => 'form-signin');

  echo form_open('login/autenticar', $atributo);

  ?>
  <?php if($this->uri->segment(2) == 'autenticar'){ ?>
    <div class="alert alert-danger" role="alert">
      <?=$erro?>
    </div>
  <?php } ?>
    <img class="mb-4" src="<?php echo site_url(); ?>assets/imgs/logo_login.png">
    <label for="inputEmail" class="sr-only"><?=$email?></label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="<?=$email?>" required autofocus>
    <label for="inputPassword" class="sr-only"><?=$senha?></label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="<?=$senha?>" required>
    <div class="checkbox mb-3">
      <label class="text-white">
        <input type="checkbox" value="remember-me"><?=$lembrar?>
      </label>
    </div>
    <button class="btn btn-lg btn-danger btn-block" type="submit"><?=$entrar?></button>
    <label class="text-white"><?=$ou?></label>
    <a class="btn btn-lg btn-primary btn-sm btn-block" href="/register"><?=$registre?></a>
    <p class="mt-5 mb-3 text-white">&copy; 2018</p>
  </form>
</body>