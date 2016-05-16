
<?php //debug($data); ?>
<div class="admin_add">
	<div class="ad_up">
		<h2>Редактирование новости/акции</h2>
	</div>
<?php 

echo $this->Form->create('News', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));?>
<?php if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'): ?>
<?php 
echo $this->Form->input('date', array('label' => 'Дата:'));
?>

<?php endif ?>
<div class="input select">
<label for="NewsCategoryId">Категория:</label>
	<select required name="data[News][category_id]" id="NewsCategoryId">
		<option value="">Выберите категорию</option>
		<?php foreach($categories as $key => $value): ?>
			<option value="<?=$key?>" <?= ($data['News']['category_id'] == $key)? 'selected' : '' ?>><?=$value?></option>
		<?php endforeach ?>
	</select>
</div>
<?php
echo $this->Form->input('img', array('label' => 'Картинка:', 'type' => 'file'));
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