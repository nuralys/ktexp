<div class="cr">
	<ul class="breadcrumbs">
		<li><a href="/<?=$lang?>"><?=__('Главная')?> </a></li>
		<li><?=__('О компании')?></li>
		<li><?=__('Руководство')?></li>
	</ul>
	<div class="content">
		<ul class="leadership_list">
		<?php foreach($data as $item): ?>
			<li>
				<div class="img">
					<img src="/img/leadership/thumbs/<?=$item['Leadership']['img'] ?>" alt="<?=$item['Leadership']['title'] ?>">
				</div>
				<a href="/<?=$lang?>leaderships/view/<?=$item['Leadership']['id'] ?>" class="name"><?=$item['Leadership']['title'] ?></a>
				<div class="prof"><?=$item['Leadership']['position'] ?></div>
				<p><?= $this->Text->truncate(strip_tags($item['Leadership']['body']), 400, array('ellipsis' => '...', 'exact' => true)) ?></p>
				<a href="/<?=$lang?>leaderships/view/<?=$item['Leadership']['id'] ?>" class="button">
					<span><?=__('Подробнее')?></span>
				</a>
			</li>
		<?php endforeach ?>	
		</ul>
	</div>
</div>