<?php

class NewsController extends AppController{
	public $uses = array('News');
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		$this->News->locale = Configure::read('Config.language');
		$this->News->bindTranslation(array('title' => 'titleTranslation'));
		// $this->Gallery->locale = Configure::read('Config.language');
		// $this->Gallery->bindTranslation(array('title' => 'titleTranslation'));
		// $this->Category->locale = Configure::read('Config.language');
		// $this->Category->bindTranslation(array('title' => 'titleTranslation'));

		$partners = $this->Partner->find('all');
		if(isset($this->request->query['cat'])){
			$data = $this->News->find('all', array(
				'order' => array('date' => 'desc'),
				'conditions' => array('category' => $this->request->query['cat'])
			));
			switch ($this->request->query['cat']) {
				case '1': $title_for_layout = __('Новости компании'); break;
				case '2': $title_for_layout = __('Пресс релизы'); break;
				case '3': $title_for_layout = __('СМИ о нас'); break;
				case '4': $title_for_layout = __('Медиатека'); break;
				case '5': $title_for_layout = __('Новости отрасли'); break;
				default: $title_for_layout = __('Новости'); break;
			}

		}else{
			$data = $this->News->find('all', array(
				'order' => array('date' => 'desc')
			));
			$title_for_layout = __('Новости');
		}
		
		
		$this->set(compact('data', 'title_for_layout', 'categories', 'stol', 'partners', 'galleries'));
	}

	public function search(){
		$this->News->locale = Configure::read('Config.language');
		$this->News->bindTranslation(array('title' => 'titleTranslation'));
		$this->Gallery->locale = Configure::read('Config.language');
		$this->Gallery->bindTranslation(array('title' => 'titleTranslation'));
		$galleries = $this->Gallery->find('all', array(
            'limit' => 3
        ));
		$stol = $this->News->find('all', array(
            'conditions' => array('category_id' => 5),
            'limit' => 3
        ));
		$search = !empty($_GET['q']) ? $_GET['q'] : null;
		if(is_null($search)){
			$search_res = __('Введите пойсковый запрос...');
			return $this->set(compact('search_res'));
		}
		$categories = $this->Category->find('all');
		$title_for_layout = __('Поиск');
		$search_res = $this->News->query("SELECT * FROM i18n 
			WHERE i18n.content LIKE '%{$search}%'");
		$this->set(compact('search_res', 'title_for_layout', 'categories', 'stol', 'galleries'));
	}

	public function admin_index(){
		$this->News->locale = array('ru', 'kz');
		$this->News->bindTranslation(array(
			'title' => 'titleTranslation',
			'body' => 'bodyTranslation',
			'keywords' => 'keywordsTranslation',
			'description' => 'descriptionTranslation'
		));
		$data = $this->News->find('all');
		
		if($this->request->is('post')){
			$anons = $this->request->data['News']['anons'];
			$news_id = $this->request->data['News']['news_id'];
			// debug($news_id);
			// die;

			// debug($news_id);
			$setAnons = $this->_anons($news_id, $anons);
			if($setAnons){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->News->create();
			$data = $this->request->data['News'];

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->News->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->News->locale = 'en';
			}else{
				$this->News->locale = 'ru';
			}
			// $this->News->locale = 'ru';
			if($this->News->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->News->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->News->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->News->id = $id;
			// $this->News->locale = Configure::read('Config.languages');
			// debug($this->News->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['News'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->News->locale = 'kz';
				$this->Category->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->News->locale = 'en';
				$this->Category->locale = 'en';
			}else{
				$this->News->locale = 'ru';
				$this->Category->locale = 'ru';
			}
			
			// $this->News->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
		// 	debug($data1);
		// die;
			
			if($this->News->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$this->News->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->News->read(null, $id);
		}
			
				$this->Category->locale = 'ru';
			$categories = $this->Category->find('list');
			$this->set(compact('id', 'data', 'categories'));

	}

	public function admin_delete($id){
		if (!$this->News->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->News->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function view($id){
		if(is_null($id) || !(int)$id || !$this->News->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}

		$this->Category->locale = Configure::read('Config.language');
		$this->Category->bindTranslation(array('title' => 'titleTranslation'));
		$this->Gallery->locale = Configure::read('Config.language');
		$this->Gallery->bindTranslation(array('title' => 'titleTranslation'));
		$this->News->locale = Configure::read('Config.language');
		$this->News->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$post = $this->News->findById($id);
		$news = $this->News->find('all', array(
			'fields' => array('id', 'title')
			));
		$categories = $this->Category->find('first', array(
			'recursive' => -1,
			'conditions' => array('Category.id' => $post['News']['category_id'])
		));
		$galleries = $this->Gallery->find('all', array(
            'limit' => 3
        ));
		$stol = $this->News->find('all', array(
            'conditions' => array('category_id' => 5),
            'limit' => 3
        ));
		$comments = $this->Comment->find('all', array(
			'conditions' => array('Comment.news_id' => $id),
			'order' => array('Comment.id' => 'desc')
		));
		
		$r = $this->_visit_add($id);
		
		$title_for_layout = $post['News']['title'];
		$meta['keywords'] = $post['News']['keywords'];
		$meta['description'] = $post['News']['description'];
		$this->set(compact('post', 'news','title_for_layout' ,'meta', 'stol', 'galleries', 'categories', 'comments'));
	}

	protected function _visit_add($id){
		if($this->Session->read('visits')){
			return false;
		}else{
			$ip = $_SERVER["REMOTE_ADDR"]; // Преобразуем IP в число
			$count = $this->Visit->find('count', array(
				'conditions' => array('Visit.ip' => $ip, 'Visit.news_id' => $id)
			));

			if($count == 0){
				$this->Session->write('visits', '1');
				$data = array('news_id' => $id, 'ip' => $ip);
				
				$this->Visit->save($data);
			}
		}
	}

}