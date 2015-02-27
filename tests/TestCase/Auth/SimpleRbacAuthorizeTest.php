<?php
namespace Burzum\SimpleRbac\Test\TestCase\Event;

use Burzum\SimpleRbac\Auth\SimpleRbacAuthorize;
use Cake\Core\Configure;
use Cake\Controller\ComponentRegistry;
use Cake\Controller\Controller;
use Cake\Network\Request;
use Cake\TestSuite\TestCase;

class SimpleRbacAuthorizeTest extends TestCase {

/**
 * setup
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->controller = $this->getMock('Controller', array('isAuthorized'), array(), '', false);
		$this->components = $this->getMock('ComponentRegistry');

		$this->components->expects($this->any())
			->method('getController')
			->will($this->returnValue($this->controller));

		$this->auth = new SimpleRbacAuthorize($this->components);

		$actionMap = array(
			'Rbac.Roles' => array(
				'index' => array('*'),
				'add' => array('admin'),
				'edit' => array()
			)
		);
		Configure::write('SimpleRbac.actionMap', $actionMap);
	}

/**
 * test failure
 *
 * @return void
 */
	public function testAuthorizeFailure() {
		$this->controller->name = 'Roles';
		$this->controller->action = 'edit';

		$user = array(
			'User' => array(
				'role' => 'admin',
				'id' => '4316da10-4014-4640-8df2-05c2c0a80b96'));

		$request = new Request('/rbac/roles/edit', false);
		$request->params['plugin'] = 'rbac';

		$this->assertFalse($this->auth->authorize($user, $request));
	}

/**
 * test isAuthorized working.
 *
 * @return void
 */
	public function testAuthorizeSuccess() {
		$user = array(
			'User' => array(
				'role' => 'admin'
			)
		);

		$this->controller->name = 'Roles';
		$this->controller->action = 'add';
		$request = new Request('/rbac/roles/add', false);
		$request->params['plugin'] = 'rbac';
		$this->assertTrue($this->auth->authorize($user, $request));

		$this->controller->name = 'Roles';
		$this->controller->action = 'index';
		$request = new Request('/rbac/roles/index', false);
		$request->params['plugin'] = 'rbac';
		$this->assertTrue($this->auth->authorize($user, $request));
	}
}
