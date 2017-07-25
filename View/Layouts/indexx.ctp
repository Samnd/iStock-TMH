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
    <?php echo $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons') ?>

    <?php echo $this->Html->script('jquerymin'); ?>
    <?php echo $this->Html->script('modernizrcustom'); ?>
    <?php echo $this->Html->script('like'); ?>
    <?php echo $this->Html->script('contentscript'); ?>

  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
        fjs.parentNode.insertBefore(js, fjs);
        } (document, 'script', 'facebook-jssdk'));
    </script>

    <div id="navbar-main">
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-shield" style="font-size:30px; color:#3498db;"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="/"><span class="icon icon-shield" style="font-size:18px; color:#3498db;"></span></a>
        </div>

        <div class="navbar-collapse collapse" class="mainsubmenu">
          <ul class="nav navbar-nav">
            <li style="padding-top: 2px;"><a href="/" class="smoothScroll">Home</a></li>
            <li><div class="dropdown">
                <button class="dropbtn">Upload</button>
                <div class="dropdown-content">
                    <a href="/photos/upload">Photos</a>
                    <a href="/videos/upload">Videos</a>
                  </div>
            </div></li>
            <li style="width: 30px; height: 50px;"></li>
            <li style="padding-top: 15px;">
                <?php
                    echo $this->Form->create('Photo', array(
                        'url'=> array(
                            'controller' => 'photos',
                            'action' => 'index'
                        )));
                    echo $this->Form->input('type', array(
                        'options' => array(
                           'all' => 'All',
                           'nature' => 'Nature',
                           'people' => 'People',
                           'animal' => 'Animal',
                           'others' => 'Others'),
                       'class' => 'formsearch'));
                ?>
            </li>
            <li style="padding-top: 13.5px;">
                <?php echo $this->Form->end('Search'); ?>
            </li>
            <li style="width: 400px; height: 50px;"></li>
            <li style="color: #aaaaaa; height: 50px; margin-left: 10px; padding-top: 3px;"> 
                <?php
                    if($this->Session->read('Auth.User.username')){
                ?>
                <p style="padding-top: 14px; color: #3498db; font-weight: 500;">
                    Hello,
                    <?php
                        echo $this->Session->read('Auth.User.username'); 
                    ?>
                </p>
            </li>
            <li style="padding-top: 5px;">
                <?php 
                    echo $this->Html->link('Log Out', array('controller' => 'users','action' => 'logout'));
                } else {
                ?> 
            </li>
            <li style="width: 72px; height: 50px; padding-top: 3px;"></li>
            <li>
                <?php
                    echo $this->Html->link('Log In', array('controller' => 'users','action' => 'login'));}
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
                <h1 style="margin-top: 50px;">Photo<span>Stock</span></h1>
            </div>
        </div>

        <div class="container" id="portfolio" name="portfolio">
        <br>
            <div class="row">
                <br>
                <h1 class="centered" style="color: #11999b; z-index: 21; text-shadow: 3px 3px 7px gray; font-weight: 300;">__ IMAGINE YOUR IMAGES __</h1>
                <hr>
                <br>
                <br>
            </div><!-- /row -->
            <div id="content" class="container" style="position: relative; background-color: rgba(255,255,255,0.9); padding-top: 20px; margin-right: 10px;">

            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>
            </div>
            <div style="text-align: center; padding-bottom: 20px; width: inherit; opacity: 0.9; position: relative; background-color: white;">
                    <?php 
                    echo $this->Paginator->prev('<< '.__('Previous  '),array(),null,array('class' => 'prev disabled'));
                    echo '|';
                    echo $this->Paginator->numbers(); 
                    echo '|';
                    echo $this->Paginator->next(__('  Next').' >>',array(),null,array('class' => 'next disabled'));
                    ?>
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