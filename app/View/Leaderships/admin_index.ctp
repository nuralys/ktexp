<a href="/admin/leaderships/add">Добавить материал</a><br>
<table>
<th>Название</th><th>Редактировать</th><th>Удаление</th>
<?php 
// debug($data);
foreach ($data as $item) : ?>
<tr>
	<td>
		<?php  foreach($item['titleTranslation'] as $title): ?>
			<?=$title['content']; ?>
		<?php endforeach; ?>
	</td>
	<td>
	<a href="/admin/leaderships/edit/<?=$item['Leadership']['id']?>?lang=ru"> рус</a> |
	 <a href="/admin/leaderships/edit/<?=$item['Leadership']['id']?>?lang=kz"> каз</a> |
	 <a href="/admin/leaderships/edit/<?=$item['Leadership']['id']?>?lang=en"> анг</a> |
	 <a href="/admin/leaderships/edit/<?=$item['Leadership']['id']?>?lang=zh"> кит</a> 
	 </td>
	<td>
		<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Leadership']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
</tr>
<?php endforeach; ?>
</table>