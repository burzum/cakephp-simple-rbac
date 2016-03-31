<?php
namespace Burzum\SimpleRbac\Test\TestCase\Model\Table;

use Burzum\SimpleRbac\Model\Table\UsersRolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Burzum\SimpleRbac\Model\Table\UsersRolesTable Test Case
 */
class UsersRolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Burzum\SimpleRbac\Model\Table\UsersRolesTable
     */
    public $UsersRoles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.burzum/simple_rbac.users_roles',
        'plugin.burzum/simple_rbac.users',
        'plugin.burzum/simple_rbac.roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UsersRoles') ? [] : ['className' => 'Burzum\SimpleRbac\Model\Table\UsersRolesTable'];
        $this->UsersRoles = TableRegistry::get('UsersRoles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UsersRoles);

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
