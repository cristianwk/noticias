<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 */
class NewsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->News->recursive = 0;
		$this->set('news', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->News->create();
			if ($this->News->save($this->request->data)) {
				$this->Flash->success(__('Dica Salva com Sucesso!'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('A Dica não pôde ser salva. Por favor, tente novamente.'));
			}
		}
		$categories = $this->News->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Dica Inválida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->News->save($this->request->data)) {
				$this->Flash->success(__('Dica Salva com Sucesso!'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('A Dica não pôde ser salva. Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			$this->request->data = $this->News->find('first', $options);
		}
		$categories = $this->News->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Dica Inválida'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->News->delete($id)) {
			$this->Flash->success(__('Dica excluída com sucesso.'));
		} else {
			$this->Flash->error(__('A Dica não pôde ser excluída. Por favor, tente novamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
