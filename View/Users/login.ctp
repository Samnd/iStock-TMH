
<div class="login">
  <div class="login-header">
    <h1>PhotoStock</h1>
    <h2 style="color: gray;">Login</h2>
  </div>
  <br>
  <?php echo $this->Flash->render('auth'); ?>
  <?php echo $this->Form->create('User'); ?>
  <div class="login-form">
    <?php
      echo $this->Form->input('username', array('label' => false, 'placeholder' => 'Username'));
      echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Password'));
    ?>
    <?php echo $this->Form->end(__('Login', array('class'=>'login-button'))); ?>
    <div style="margin-left: 40px; margin-top: 19px; color: white; font-size: 18px; background-color: rgba(200,200,200,0.4); width: 165px;"><?php echo $this->Html->link('Create an Account', array('action' => 'signup')); ?> </div>
  </div>
</div>

  

  