 <div style="position: relative;" onclick="videoClick(this)" class="image">
<?php 
    echo $this->Html->media($url, 
    	array(
    		'id' => 'video'.$id,
    		'controls' => $controls,
    		'style' => 'width: 100%'
    	));
?>
<div class="playbutton" style="background-image:url(https://doky.io/v3/images/play-button.png);
    background-repeat:no-repeat;
    width:50%;
    height:50%;
    position:absolute;
    left:0%;
    right:0%;
    top:0%;
    bottom:0%;
    margin:auto;
    background-size:contain;
    background-position: center;"></div>

    </div> 