<?php
namespace Burzum\SimpleRbac\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PermissionsRolesFixture

 */
class PermissionsRolesFixture extends TestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	// @codingStandardsIgnoreStart
	public $fields = [
		'permission_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null],
		'role_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['permission_id', 'role_id'], 'length' => []],
			'permission_id' => ['type' => 'unique', 'columns' => ['permission_id', 'role_id'], 'length' => []],
		],
		'_options' => [
			'engine' => 'InnoDB',
			'collation' => 'utf8_general_ci'
		],
	];
	// @codingStandardsIgnoreEnd

	/**
	 * Records
	 *
	 * @var array
	 */
	public $records = [
		[
			'permission_id' => '7758a759-4e0b-475d-98bf-aeb22a17c05c', // Users/view
			'role_id' => 'ea7a0d0d-a080-4cdf-abad-cc08c06d3baa'  // admin
		],
		[
			'permission_id' => 'eaf58464-f1f5-4a57-89f6-f9c30539fed5', // Products/add
			'role_id' => 'f1384734-3cb0-4575-97dc-540a28c554b2' // sales-manager
		]
	];
}
