<?php

class PurchasesController extends AppController{

	//public $uses = array('Purchas');

	public function beforeFilter(){
		parent::beforeFilter();
	}

	public function index($id){
		if(is_null($id) || !(int)$id || !$this->Purchase->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}

		$this->Purchase->locale = Configure::read('Config.language');
		$this->Purchase->bindTranslation(array('title' => 'titleTranslation'));
		
		$data = $this->Purchase->findById($id);
			
		$title_for_layout = $data['Purchase']['title'];
		
		
		
		$this->set(compact('data', 'title_for_layout'));
	}

	public function admin_index(){
		$this->Purchase->locale = array('ru', 'kz');
		$this->Purchase->bindTranslation(array('title' => 'titleTranslation'));
		$data = $this->Purchase->find('all');

		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Purchase->create();
			$data = $this->request->data['Purchase'];

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Purchase->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Purchase->locale = 'en';
			}else{
				$this->Purchase->locale = 'ru';
			}
			// $this->Purchase->locale = 'ru';
			if($this->Purchase->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$this->Purchase->locale = array('ru', 'kz');	
		$this->Purchase->bindTranslation(array('title' => 'titleTranslation'));
		$categories = $this->Purchase->find('all', array(
			'conditions' => array('category' => 1),
			
		));
		// $cats = $this->_catMenuHtml($categories);
		// debug($categories);
		// debug($cats);
		$this->set(compact('categories', 'cats'));
	}

	protected function _catMenuHtml($tree = false){
		if(!$tree) return false;
		$html = '';
		foreach ($tree as $item) {
			$html .= $this->_catMenuTemplate($item);
		}
		return $html;
	}

	protected function _catMenuTemplate($cats){
		ob_start();
		include APP . "View/Elements/cats_tpl.ctp";
		return ob_get_clean();
	}

	public function admin_edit($id){

		if(is_null($id) || !(int)$id || !$this->Purchase->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Purchase->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Purchase->id = $id;
			// $this->Purchase->locale = Configure::read('Config.languages');
			// debug($this->Purchase->locale);
			// debug($this->request->data);
			$data1 = $this->request->data['Purchase'];
			

			if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'kz'){
				$this->Purchase->locale = 'kz';
				//$this->Category->locale = 'kz';
			}elseif(isset($this->request->query['lang']) && $this->request->query['lang'] == 'en'){
				$this->Purchase->locale = 'en';
				//$this->Category->locale = 'en';
			}else{
				$this->Purchase->locale = 'ru';
				//$this->Category->locale = 'ru';
			}
			
			// $this->Purchase->locale = 'kz';
			// debug($data1);
			$data1['id'] = $id;
		// 	debug($data1);
		// die;
			
			if($this->Purchase->save($data1)){
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
			$this->Purchase->locale = $this->request->query['lang'];
			$data = $this->request->data = $this->Purchase->read(null, $id);
		}
			
			//$this->Category->locale = 'ru';
			// $categories = $this->Category->find('list');
			$this->set(compact('id', 'data'));

	}

	public function admin_delete($id){
		if (!$this->Purchase->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Purchase->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	
}