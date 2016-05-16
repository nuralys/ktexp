<header>
	<div class="top_line"></div>
	<div class="head">
		<div class="cr">
			<div class="lang_container">
				<ul class="lang_list">
					<li><a href="/kz">kz </a>|</li>
					<li><a href="/ru" class="active"> ru </a>|</li>
					<li><a href="/en">en</a>|</li>
					<li><a href="/zh">cn</a></li>
				</ul>
			</div>
			<a href="/<?=$lang?>" class="logo">
				<img src="/img/logo.png" alt="">
			</a>
			<div class="head_right">
				<div class="search">
					<form action="/search">
						<input name="q" placeholder="перевезти груз|" type="text" id="">		
						<button type="submit" class="sub_but"></button>					
					</form>
				</div>
				<div class="phones">
					<a href="tel:+7 7172 78 38 02">+7 (7172) <span>78 38 02</span></a>
					<a href="tel:+7 778 999 87 41">+7 778  <span>999 87 41</span></a>
					<a href=""><?=__('Заказать звонок')?></a>
				</div>
			</div>
			<nav>
				<ul class="nav">
					<li  class="active"><a href="" ><?=__('О компании')?> </a>
						<ul class="sub_menu">
							<li><a href="/<?=$lang?>page/history"><?=__('История')?>  </a></li>
							<li><a href="/<?=$lang?>leaderships"> <?=__('Руководство')?> </a></li>
							<li><a href=""> <?=__('партнеры')?>   </a></li>
							<li><a href="/<?=$lang?>page/rekvizity"> <?=__('Банковские реквизиты')?>  </a></li>
							<li><a href="/<?=$lang?>page/vacancy"><?=__('Вакансии')?>  </a></li>
						</ul>
					</li>
					<li><a href=""><?=__('Инфраструктура')?></a>
						<ul class="sub_menu">
							<li><a href="/<?=$lang?>page/more"><?=__('Море')?>  </a></li>
							<li><a href="/<?=$lang?>page/avia"> <?=__('Авия')?> </a></li>
							<li><a href="/<?=$lang?>page/auto"> <?=__('Авто')?>   </a></li>
							<li><a href="/<?=$lang?>page/zhd"> <?=__('ЖД')?>  </a></li>
						</ul>
					</li>
					<li><a href=""> <?=__('Услуги')?> </a></li>
					<li><a href=""><?=__('Клиентам')?></a></li>
					<li><a href=""><?=__('Закупки')?></a>
						<ul class="sub_menu">
							<li><a href="/<?=$lang?>page/history"><?=__('АО «KTZ Express» >')?>  </a></li>
							<li><a href="/<?=$lang?>leaderships"> <?=__('Airport Management Group >')?> </a></li>
							<li><a href=""> <?=__('KTZ Express Shipping >')?></a>
								<ul class="sub_menu">
							<li><a href="/<?=$lang?>purchases/6"><?=__('Годовой план закупок')?>  </a></li>
							<li><a href="/<?=$lang?>leaderships"> <?=__('Тендеры')?></a></li>
							<li><a href=""> <?=__('Ценовые предложения')?></a></li>
						</ul>
							</li>
						</ul>
					</li>
					<li><a href=""><?=__('Инвесторам')?> </a></li>
					<li><a href=""><?=__('Пресс центр')?></a>
						<ul class="sub_menu last">
							<li><a href="/<?=$lang?>news?cat=2"><?=__('Пресс релизы')?>  </a></li>
							<li><a href="/<?=$lang?>"> <?=__('Сми о нас')?> </a></li>
							<li><a href="/<?=$lang?>"> <?=__('Медиатека')?>   </a></li>
							<li><a href="/<?=$lang?>"> <?=__('Новости отрасли')?>  </a></li>
						</ul>
					</li>
					<li><a href="/<?=$lang?>page/contacts"><?=__('Контакты')?></a></li>
				</ul>
			</nav>
		</div>
	</div>
</header>