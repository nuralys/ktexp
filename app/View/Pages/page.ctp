<div class="cr">
	<ul class="breadcrumbs">
		<li><a href="/<?=$lang?>"><?= __('Главная') ?> </a></li>
		<?php if($this->params->pass['0'] == 'more' || $this->params->pass['0'] == 'avia' || $this->params->pass['0'] == 'auto' || $this->params->pass['0'] == 'zhd'): ?>
			<li><?= __('Инфраструктура') ?></li>
		<?php else: ?>
			<li><?= __('О компании') ?></li>
		<?php endif; ?>
		<li><?php echo $page['Page']['title'] ?></li>
	</ul>
	<div class="content">
		<div class="title">
			<h1><?php echo $page['Page']['title'] ?></h1>
		</div>
		<?php echo $page['Page']['body'] ?>
	</div>
</div>