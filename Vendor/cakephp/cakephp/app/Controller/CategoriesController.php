<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

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
		$this->Category->recursive = 0;
		$this->set('categories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Categoria Invalida'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('Categoria Salva com Sucesso!'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('A categoria não pôde ser salva. Por favor, tente novamente.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Categoria Inválida'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Flash->success(__('Categoria Salva com Sucesso!'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('A categoria não pôde ser salva. Por favor, tente novamente.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Categoria Inválida!'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Category->delete($id)) {
			$this->Flash->success(__('Categoria excluída com sucesso.'));
		} else {
			$this->Flash->error(__('A categoria não pôde ser excluída. Por favor, tente novamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
