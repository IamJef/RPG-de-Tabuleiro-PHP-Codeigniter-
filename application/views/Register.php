<body class="text-center bg-dark">
 
  <?php 
  $atributo = array('class' => 'form-signin');

  echo form_open('register/registrar', $atributo);

  ?>
    <div class="erros">
      <?php echo validation_errors(); ?>
    </div>
    <img class="mb-4" src="<?php echo site_url(); ?>assets/imgs/logo_kalos.png">
    <label for="inputEmail" class="sr-only">
      {email}
    </label>
    <input type="text" name="email" id="inputEmail" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="<?=$email?>" autofocus>
    <label for="inputPassword" class="sr-only">
      {senha}
    </label>
    <input type="password" name="password" id="inputPassword" value="<?php echo set_value('password'); ?>" class="form-control" placeholder="<?=$senha?>">
    <label for="inputPassword1" class="sr-only">
      {resenha}
    </label>
    <input type="password" name="resenha" id="inputPassword1" value="<?php echo set_value('resenha'); ?>" class="form-control" placeholder="<?=$resenha?>">
    
    <button class="btn btn-lg btn-success" type="submit"><?=$registrar?></button>
    <a class="btn btn-lg btn-danger" href="/login"><?=$cancelar?></a>
    <p class="mt-5 mb-3 text-white">&copy; 2018</p>
  </form>
</body>