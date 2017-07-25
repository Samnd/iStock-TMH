<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>
    Photo Stocks
  </title>
  <?php echo $this->Html->css('http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'); ?>  
  <?php echo $this->Html->css('https://fonts.googleapis.com/css?family=Ubuntu:500'); ?>
  <?php echo $this->Html->css('style'); ?>
  <?php echo $this->Html->css('animation'); ?>
</head>
<body>
  <ul class="slideshow">
    <li style="list-style: none;"><span>Image 01</span></li>
    <li style="list-style: none;"><span>Image 02</span></li>
    <li style="list-style: none;"><span>Image 03</span></li>
    <li style="list-style: none;"><span>Image 04</span></li>
    <li style="list-style: none;"><span>Image 05</span></li>
    <li style="list-style: none;"><span>Image 06</span></li>
  </ul>
<div class="login">
  	<?php echo $this->Flash->render(); ?>
  	<?php echo $this->fetch('content'); ?>
</div>


  <?php echo $this->Html->script('http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'); ?>
  <?php echo $this->Html->script('http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'); ?>
  <?php echo $this->Html->script('index'); ?>
  </body>
</html>