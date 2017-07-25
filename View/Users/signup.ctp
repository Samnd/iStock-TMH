<div class="login">
  <div class="login-header">
    <h1>PhotoStock</h1>
    <h2 style="color: gray;">Sign up</h2>
  </div>
  <br>
  <?php echo $this->Flash->render('auth'); ?>
  <?php echo $this->Form->create('User'); ?>
    <div class="login-form">
        <?php echo $this->Form->create('User'); ?>
        <?php
          echo $this->Form->input('username', array('label' => false, 'placeholder' => 'Username'));
          echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Password'));
          echo $this->Form->input('email', array('label' => false, 'placeholder' => 'Email'));
        ?>
        <?php echo $this->Form->end('Sign Up'); ?>
  
    <div style="margin-top: 19px; margin-left: 40px; color: white; font-size: 18px; background-color: rgba(200,200,200,0.4); width: 65px;"><?php echo $this->Html->link('Log In', array('action' => 'login')); ?></div>
  </div>
</div>