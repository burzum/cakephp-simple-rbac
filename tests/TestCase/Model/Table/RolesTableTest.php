<?php
namespace Burzum\SimpleRbac\Test\TestCase\Model\Table;

use Burzum\SimpleRbac\Model\Table\RolesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Burzum\SimpleRbac\Model\Table\RolesTable Test Case
 */
class RolesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Burzum\SimpleRbac\Model\Table\RolesTable
     */
    public $Roles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.burzum/simple_rbac.roles',
        'plugin.burzum/simple_rbac.users_roles',
        'plugin.burzum/simple_rbac.users',
        'plugin.burzum/simple_rbac.permissions',
        'plugin.burzum/simple_rbac.permissions_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Roles') ? [] : ['className' => 'Burzum\SimpleRbac\Model\Table\RolesTable'];
        $this->Roles = TableRegistry::get('Roles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Roles);

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
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
