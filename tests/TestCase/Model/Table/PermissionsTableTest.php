<?php
namespace Burzum\SimpleRbac\Test\TestCase\Model\Table;

use Burzum\SimpleRbac\Model\Table\PermissionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * Burzum\SimpleRbac\Model\Table\PermissionsTable Test Case
 */
class PermissionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Burzum\SimpleRbac\Model\Table\PermissionsTable
     */
    public $Permissions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.burzum/simple_rbac.permissions',
        'plugin.burzum/simple_rbac.roles',
        'plugin.burzum/simple_rbac.users_roles',
        'plugin.burzum/simple_rbac.users',
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
        $config = TableRegistry::exists('Permissions') ? [] : ['className' => 'Burzum\SimpleRbac\Model\Table\PermissionsTable'];
        $this->Permissions = TableRegistry::get('Permissions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Permissions);

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
