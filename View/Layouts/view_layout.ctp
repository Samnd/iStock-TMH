<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.png">

    <title> Photo Stocks</title>

    <?php echo $this->Html->css('bootstrap.css'); ?>
    <?php echo $this->Html->css('main.css'); ?>
    <?php echo $this->Html->css('icomoon.css'); ?>
    <?php echo $this->Html->css('animate-custom.css'); ?>
    <?php echo $this->Html->css('animation'); ?>
    <?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic'); ?>
    <?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Raleway:400,300,700'); ?>

    <?php echo $this->Html->script('jquerymin'); ?>
    <?php echo $this->Html->script('modernizrcustom'); ?>
    <?php echo $this->Html->script('like') ?>
    <?php echo $this->Html->script('comment') ?>
    <?php echo $this->Html->script('contentscript'); ?>

  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">

    <div id="navbar-main">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="/"><span class="icon icon-shield" style="font-size:18px; color:#3498db;"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/" class="smoothScroll">Home</a></li>
            <li><div class="dropdown">
                <button class="dropbtn">Upload</button>
                <div class="dropdown-content">
                    <a href="/photos/upload">Photos</a>
                    <a href="/videos/upload">Videos</a>
                  </div>
            </div></li>
            <li style="width: 789px; height: 50px;"></li>
            <li style="color: #aaaaaa; height: 50px; margin-left: 10px;"> 
                <?php
                    if($this->Session->read('Auth.User.username')){
                ?>
                <p style="padding-top: 11px;">
                Hello,
                <?php
                    echo $this->Session->read('Auth.User.username'); 
                ?>
                </p>
            </li>
            <li>
                <?php 
                    echo $this->Html->link('Log Out', array('controller' => 'users','action' => 'logout'));
                    } else echo $this->Html->link('Log In', array('controller' => 'users','action' => 'login'));
                ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>

  
        <div id="headerwrap" id="home" name="home">
            <ul class="slideshow">
              <li style="list-style: none;"><span>Image 01</span></li>
              <li style="list-style: none;"><span>Image 02</span></li>
              <li style="list-style: none;"><span>Image 03</span></li>
              <li style="list-style: none;"><span>Image 04</span></li>
              <li style="list-style: none;"><span>Image 05</span></li>
              <li style="list-style: none;"><span>Image 06</span></li>
            </ul>
            <div class="container">
                <h1><span class="icon icon-shield"></span></h1>
                <h1 style="margin-top: 0px;">Photo<span>Stock</span></h1>
            </div>
        </div>

        <div class="container" id="portfolio" name="portfolio">
        
            <div id="content" class="container" style="position: relative; background-color: rgba(255,255,255,0.9); padding-top: 20px; margin-right: 10px;">
                <?php echo $this->Flash->render(); ?>
                <div id="container">
                    <div id="action" class="outset">
                        <?php echo $this->fetch('sidebar'); ?>
                    </div>
                        <?php echo $this->fetch('post'); ?>
                </div>
                <div class="comment-container">
                    <div id="blank"></div>
                    <div id="comment">
                        <div class="outset">
                            <?php echo $this->fetch('comment_form'); ?>
                        </div>
                        <div id="showcomment" class="outset">
                            <?php echo $this->fetch('comment_show'); ?>
                        </div>
                    </div>
                </div>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>

        <div id="footerwrap">
            <div class="container">
                <h4>Modified by Team A - Copyright 2017</h4>
            </div>
        </div>

    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->Html->script('jquery.easing.1.3'); ?>
    <?php echo $this->Html->script('smoothscroll'); ?>
    <?php echo $this->Html->script('jquery-func'); ?>
  </body>
</html>