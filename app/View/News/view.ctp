<div class="cr">
	<ul class="breadcrumbs">
		<li><a href="/<?=$lang?>">Главная </a></li>
		<li><a href="/<?=$lang?>news"><?= __('Новости') ?></a></li>
		<li><?=$post['News']['title']?></li>
	</ul>
	<div class="content">
		<div class="title">
			<h1><?= __('Новости') ?></h1>
		</div>
		<?=$post['News']['body']?>
	</div>
</div>