<li><a href=""><?php echo $p_menu['Purchase']['title'] ?></a>
	<?php if($p_menu['children']) : ?>
		<div class="<?php echo ($p_menu['Purchase']['id']==1) ? 'sub_container' : 'sub_containers ss';?> ">
			<ul class="<?php echo ($p_menu['Purchase']['id']<=1) ? 'sub_menu' : 'sub_menus';?>">
				<?php echo $this->_catMenuHtml($p_menu['children']); ?>
			</ul>
		</div>
	<?php endif; ?>
</li>
