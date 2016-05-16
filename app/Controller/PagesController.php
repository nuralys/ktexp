<?php

class PagesController extends AppController {

	public $uses = array('Page', 'News', 'Partner');
	public $component = array('Visit');
	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index(){
		$this->News->locale = Configure::read('Config.language');
		$this->News->bindTranslation(array('title' => 'titleTranslation'));
		$this->Page->locale = Configure::read('Config.language');
		$this->Page->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		// $news = $this->News->find('all', array(
		// 	'fields' => array('id', 'title', 'date', 'img'),
		// 	'order' => array('News.date' => 'desc'),
		// 	'limit' => 8
		// 	));
		// $categories = $this->Category->find('all');
		$news_company = $this->News->find('all', array(
			'order' => array('News.id' => 'desc'),
			'conditions' => array('News.category' => '1')
		));
		$news_otrasl = $this->News->find('all', array(
			'order' => array('News.id' => 'desc'),
			'conditions' => array('News.category' => '5')
		));
		// debug($anons[0]);
		$title_for_layout = 'title';
		$meta['keywords'] = 'keywords';
		$meta['description'] = 'description';
		$this->set(compact('title_for_layout', 'meta', 'news_company', 'news_otrasl'));
	}    

	public function page($page_alias = null){
		$this->Page->locale = Configure::read('Config.language');
		$this->Page->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$this->News->locale = Configure::read('Config.language');
		if(is_null($page_alias)){
			throw new NotFoundException("Такой страницы нету");
		}
		$page = $this->Page->findByAlias($page_alias);
		if(!$page){
			throw new NotFoundException("Такой страницы нету");
		}
		
		$title_for_layout = $page['Page']['title'];
		$meta['keywords'] = $page['Page']['keywords'];
		$meta['description'] = $page['Page']['description'];
		$news = $this->News->find('all', array(
			'fields' => array('id', 'title'),
			'order' => array('News.created' => 'desc'),
			'limit' => 3
			));
		$this->set(compact('page_alias', 'page', 'title_for_layout', 'meta', 'news'));
	}

	public function admin_index(){
		$this->Page->locale = 'ru';
		$this->Page->bindTranslation(array('title' => 'titleTranslation', 'body' => 'bodyTranslation'));
		$pages = $this->Page->find('all');
		$this->set(compact('pages'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Page->create();
			$data = $this->request->data['Page'];
			
			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Page->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Page->locale = 'en';
			}else{
				$this->Page->locale = 'ru';
			}
			if($this->Page->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}

	public function admin_edit($page_id){
		
		if(is_null($page_id) || !(int)$page_id || !$this->Page->exists($page_id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Page->findById($page_id);
		if(!$page_id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Page->id = $page_id;
			// $this->Page->locale = Configure::read('Config.languages');
			// debug($this->Page->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Page'];
			

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Page->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Page->locale = 'en';
			}else{
				$this->Page->locale = 'ru';
			}
			// $this->Page->locale = 'kz';
			// debug($data1);
			$data1['id'] = $page_id;
			if($this->Page->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if($this->request->is('post')){
			$this->request->data = $data1;
			$data = $data1;
		}else{
			$this->Page->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Page->read(null, $page_id);
		}
			$this->set(compact('page_id', 'data'));


	}

}
