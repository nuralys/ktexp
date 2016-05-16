<div class="cr">
	<ul class="breadcrumbs">
		<li><a href="/<?=$lang?>">Главная </a></li>
		<li>Пресс центр</li>
		<li><?= $title_for_layout ?></li>
	</ul>
	<div class="content">
		<div class="title">
			<h1><?= $title_for_layout ?></h1>
		</div>
	</div>
	<ul class="news_index_list second">
	<?php foreach($data as $item): ?>
		<li>
			<div class="date"><?php echo $this->Time->format($item['News']['date'], '%d.%m.%Y', 'invalid'); ?></div>
			<a href="/<?=$lang?>news/view/<?=$item['News']['id']?>"><?=$item['News']['title']?></a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>