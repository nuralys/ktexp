<option>
<?php echo $cats['Purchase']['title']; ?>
	</option> 
	<?php if($cats['children']) : ?>
	
		<?php echo $this->_catMenuHtml($cats['children']); ?>
	
	<?php endif; ?>