<!DOCTYPE html>
<html>

<head>
	<title></title>
	
</head>
<body>

<?php 
//echo $this->Html->css('cake.generic');
echo $this->Html->css('mystyles');
 ?>

<h3><?php echo $this->fetch('title'); ?></h3>
<?php echo $this->fetch('content'); ?>
<div class="view">
	<?php echo $this->fetch('view'); ?>
</div>
<div class="actions">
    <h1>Related actions</h1>
    <ul>
    <?php echo $this->fetch('sidebar'); ?>
    </ul>
</div>

</body>
</html>



