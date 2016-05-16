
<?php //debug($data); ?>
<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование материала</h2>
	</div>
<?php 

echo $this->Form->create('Purchase', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));?>
<div class="input select">
<label for="NewsCategoryId">Категория:</label>
	<select name="data[Purchase][category_id]" id="NewsCategoryId">
		<option value="">Выберите категорию</option>
		<?php foreach($categories as $key => $value): ?>
			<option value="<?=$key?>" <?= ($data['Purchase']['category_id'] == $key)? 'selected' : '' ?>><?=$value?></option>
		<?php endforeach ?>
	</select>
</div>
<?php
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
?>
<div class="edit_bot">
	<div class="bot_r">
	<?
	
	echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
	echo $this->Form->input('description', array('label' => 'Описание:'));
	echo $this->Form->input('id');
	echo $this->Form->end('Редактировать');
	?>
	</div>
</div>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>