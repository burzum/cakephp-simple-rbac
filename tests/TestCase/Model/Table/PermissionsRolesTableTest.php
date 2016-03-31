<?php
namespace Burzum\SimpleRbac\Test\TestCase\Model\Table;

use Burzum\SimpleRbac\Model\Table\PermissionsRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Burzum\SimpleRbac\Model\Table\PermissionsRolesTable Test Case
 */
class PermissionsRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Burzum\SimpleRbac\Model\Table\PermissionsRolesTable
     */
    public $PermissionsRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.burzum/simple_rbac.permissions_roles',
        'plugin.burzum/simple_rbac.permissions',
        'plugin.burzum/simple_rbac.roles',
        'plugin.burzum/simple_rbac.users_roles',
        'plugin.burzum/simple_rbac.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PermissionsRoles') ? [] : ['className' => 'Burzum\SimpleRbac\Model\Table\PermissionsRolesTable'];
        $this->PermissionsRoles = TableRegistry::get('PermissionsRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PermissionsRoles);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
