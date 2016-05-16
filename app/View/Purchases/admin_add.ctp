<div class="admin_add">
	<div class="ad_up">
		<h2>Добавление материала</h2>
	</div>
<?php 
echo $this->Form->create('Purchase', array('type' => 'file'));
?>

<div class="input select">
<label for="PurchaseParentId">Категория:</label>
	<select required name="data[Purchase][parent_id]" id="PurchaseParentId">
		<option value="">Выберите категорию</option>
		<?php foreach($categories as $item): ?>
			<option value="<?=$item['Purchase']['id']?>"><?=$item['Purchase']['title']?></option>
		<?php endforeach; ?>
	</select>
</div>
<div class="input select">
<label for="PurchaseCategory">Тип:</label>
	<select required name="data[Purchase][category]" id="PurchaseCategory">
		<option value="">Выберите тип</option>
		<option value="1">Категория</option>
		<option value="0">Материал</option>
	</select>
</div>
<?php
echo $this->Form->input('title', array('label' => 'Название:'));

echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
echo $this->Form->input('description', array('label' => 'Описание:'));
echo $this->Form->end('Создать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>