<div class="content">
	<div class="title_index">
		<h1><?=$post['Blog']['title']?></h1>
	</div>
	<div class="news_second_lvl">
		<div class="blog_second_img_container">
			<img src="/img/blog/thumbs/<?=$post['Blog']['img']?>" alt="<?=$post['Blog']['title']?>">
		</div>
		<div class="date"><?php echo $this->Time->format($post['Blog']['date'], '%d.%m.%Y', 'invalid'); ?></div>
		<div class="title">
			<h2><?=$post['Blog']['title']?></h2>
		</div>
		<?=$post['Blog']['body']?>
	</div>
</div>
<?php echo $this->element('sidebar'); ?>

<?php echo $this->element('partners'); ?>