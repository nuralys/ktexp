<div class="center_img">
	<div class="cr">
		<div class="trinagel">
			<div class="trinagel_title">ТРАНСПОРТНЫЕ
			ГРУЗОПЕРЕВОЗКИ
			</div>
			<a href="" class="more"><span><?= __('Море')?></span></a>
			<a href="" class="samolet"><span><?= __('Авия')?></span></a>
			<a href="" class="avto"><span><?= __('Авто')?></span></a>
			<a href="" class="zhd"><span><div><?= __('ЖД')?></div></span></a>
		</div>
		<div class="slogan">
			Lorem Ipsum is simply dummy
			text of the printing and
			typesetting industry
		</div>
		<a href="" class="calc">
			Онлайн калькулятор ЖД перевозок<br>
			по Республике Казахстан
		</a>
	</div>
</div>
<div class="cr">
	<div class="news_index">
		<div class="news_index_item fl_l">
			<div class="news_index_item_titel"><?= __('Новости компании')?></div>
			<ul class="news_index_list ">
				<li>
				<?php foreach($news_company as $item): ?>
					<div class="date"><?php echo $this->Time->format($item['News']['date'], '%d.%m.%Y', 'invalid'); ?></div>
					<a href="/<?=$lang?>news/view/<?=$item['News']['id']?>"><?=$item['News']['title']?></a>
				</li>
				<?php endforeach ?>
			</ul>
			<a href="" class="button">
				<span><?= __('Все новости')?></span>
			</a>
		</div>
		<div class="news_index_item fl_r">
			<div class="news_index_item_titel"><?= __('Новости отрасли')?></div>
			<ul class="news_index_list ">
			<?php foreach($news_otrasl as $item): ?>
				<li>
					<div class="date"><?php echo $this->Time->format($item['News']['date'], '%d.%m.%Y', 'invalid'); ?></div>
					<a href="/<?=$lang?>news/view/<?=$item['News']['id']?>"><?=$item['News']['title']?></a>
				</li>
			<?php endforeach ?>	
			</ul>
			<a href="" class="button">
				<span><?= __('Все новости')?></span>
			</a>
		</div>
	</div>
	<div class="parnter_index">
		<div class="news_index_item_titel"><?= __('Партнеры')?></div>
	</div>
	<div class="slider_partners">
		<div class="slider__item">
			<img src="img/slide1.png" alt="">
		</div>
		
	</div>
</div>
<div class="top_line"></div>


