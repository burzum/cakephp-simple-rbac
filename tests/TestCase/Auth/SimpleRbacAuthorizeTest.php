<?php

namespace Burzum\SimpleRbac\Test\TestCase\Event;

use Burzum\SimpleRbac\Auth\SimpleRbacAuthorize;
use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Controller\ComponentRegistry;
use Cake\Controller\Controller;
use Cake\Network\Request;
use Cake\TestSuite\TestCase;

/**
 * Copyright 2011 - 2015, Florian Krämer
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2011 - 2015, Florian Krämer
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class SimpleRbacAuthorizeTest extends TestCase
{

    /**
     * setup
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->controller = $this->getMockBuilder(Controller::class)
            ->setMethods(['isAuthorized'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->components = $this->getMockBuilder(ComponentRegistry::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->components->expects($this->any())
            ->method('getController')
            ->will($this->returnValue($this->controller));

        $this->auth = new SimpleRbacAuthorize($this->components);

        $actionMap = array(
            'Rbac.Roles' => array(
                'index' => array('*'),
                'add' => array('admin'),
                'edit' => []
            )
        );

        Configure::write('SimpleRbac.actionMap', $actionMap);
    }

    /**
     * test failure
     *
     * @return void
     */
    public function testAuthorizeFailure()
    {
        $this->controller->name = 'Roles';
        $this->controller->action = 'edit';

        $user = array(
            'role' => 'admin',
            'id' => '4316da10-4014-4640-8df2-05c2c0a80b96'
        );

        $request = new Request('/rbac/roles/edit');
        $request->params['plugin'] = 'rbac';
        $this->assertFalse($this->auth->authorize($user, $request));
    }

    /**
     * test isAuthorized working.
     *
     * @return void
     */
    public function testAuthorizeSuccess()
    {
        $user = array(
            'role' => 'admin'
        );

        $this->controller->name = 'Roles';
        $this->controller->action = 'add';
        $request = new Request('/rbac/roles/add');
        $request->action = 'add';
        $request->controller = 'Roles';
        $request->params = [
            'plugin' => 'Rbac',
            'controller' => 'Roles',
            'action' => 'add'
        ];
        $this->assertTrue($this->auth->authorize($user, $request));

        $this->controller->name = 'Roles';
        $this->controller->action = 'index';
        $request = new Request('/rbac/roles/index');
        $request->action = 'index';
        $request->controller = 'Roles';
        $request->params = [
            'plugin' => 'Rbac',
            'controller' => 'Roles',
            'action' => 'index'
        ];
        $this->assertTrue($this->auth->authorize($user, $request));
    }
}
