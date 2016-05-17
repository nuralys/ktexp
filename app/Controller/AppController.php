<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller', 'CakeEmail', 'Network/Email');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $uses = array('App', 'News', 'Partner', 'Purchase');

	public $components = array('DebugKit.Toolbar', 'Cookie', 'Session', 'Auth' => array(
            'loginRedirect' => '/admin/',
            'logoutRedirect' => '/',
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        ));
	public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter() {

        parent::beforeFilter();

        // debug($this->request->params['prefix']);
        $admin = (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') ? 'admin/' : false;
        if(!$admin) $this->Auth->allow();
        if($admin){
            $this->layout = 'default';
        }else{
            $this->layout = 'index';
            // $this->News->locale = Configure::read('Config.language');
            // $this->News->bindTranslation(array('title' => 'titleTranslation'));
            // $this->Gallery->locale = Configure::read('Config.language');
            // $this->Gallery->bindTranslation(array('title' => 'titleTranslation'));
        }

        if(isset($this->params['language']) && $this->params['language'] == 'kz'){
            Configure::write('Config.language', 'kz');
            $this->Purchase->locale = 'kz'; 
        }elseif(isset($this->params['language']) && $this->params['language'] == 'en'){
            Configure::write('Config.language', 'en');
            $this->Purchase->locale = 'en'; 
        }elseif(isset($this->params['language']) && $this->params['language'] == 'zh'){
            Configure::write('Config.language', 'zh');
            $this->Purchase->locale = 'zh'; 
        }else{
            Configure::write('Config.language', 'ru');
            $this->Purchase->locale = 'ru'; 
        }
        // $stol = $this->News->find('all', array(
        //     'conditions' => array('category_id' => 5)
        // ));
        
        $this->Purchase->bindTranslation(array('title' => 'titleTranslation'));
        $partners = $this->Partner->find('all');
        $p_tree = $this->Purchase->find('threaded');
        $p_menu = $this->_catMenuHtml($p_tree);
        // debug($p_menu);
        // debug($this->request->params);
        // debug($this->params['language']);
        $lang = ($this->params['language']) ? $this->params['language'] . '/' : '';
        $this->set(compact('admin', 'lang', 'partners', 'p_menu'));

    }

    protected function _catMenuHtml($service_tree = false){
        if(!$service_tree) return false;
        $html = '';
        foreach ($service_tree as $item) {
            $html .= $this->_catMenuTemplate($item);
            
        }
        return $html;
    }

    protected function _catMenuTemplate($p_menu){
        ob_start();
        include APP . "View/Elements/purchase_tpl.ctp";
        return ob_get_clean();
    }

}
