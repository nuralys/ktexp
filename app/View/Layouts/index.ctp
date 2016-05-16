<html>
<head>
<title><?php echo $title_for_layout ?></title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<?php if(isset($meta['keywords'])): ?>
	<meta name="keywords" content="<?=$meta['keywords']?>">
<?php endif; ?>
<?php if(isset($meta['description'])): ?>
	<meta name="description" content="<?=$meta['description']?>">
<?php endif; ?>
<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
<?php
echo $this->Html->script(array('jquery-2.1.4','jquery.fancybox.pack.js?v=2.1.5', 'app'));
echo $this->Html->css(array('reset', 'style', 'slide', 'jquery.fancybox.css?v=2.1.5'));
echo $this->fetch('meta');
echo $this->fetch('script');
echo $this->fetch('css');
?>
</head>
	<body>
		<div class="page">
			<?php echo $this->element('header'); ?>
			<div class="container">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		<?php echo $this->element('footer'); ?>
	</body>
</html>