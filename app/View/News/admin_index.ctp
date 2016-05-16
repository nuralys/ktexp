<a href="/admin/news/add">Добавить материал</a><br>
<table>
<th>Название</th><th>Редактировать</th><th>Удаление</th>
<?php foreach ($data as $item) : ?>
	<tr>
		<td>
			<?php  foreach($item['titleTranslation'] as $title): ?>
				<?= $title['locale'] .': '. $title['content']; ?><br>
			<?php endforeach; ?>
			 
		</td>
		
		<td>
			<a href="/admin/news/edit/<?=$item['News']['id']?>?lang=ru"> рус</a> |
			<a href="/admin/news/edit/<?=$item['News']['id']?>?lang=kz"> каз</a> |
			<a href="/admin/news/edit/<?=$item['News']['id']?>?lang=en"> анг</a> |
			<a href="/admin/news/edit/<?=$item['News']['id']?>?lang=zh"> кит</a>
		</td>
		<td>
			<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['News']['id']), array('confirm' => 'Подтвердите удаление')); ?>
				</div> 
		</td>
	</tr>
<?php endforeach; ?>
</table>
