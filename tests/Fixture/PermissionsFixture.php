<?php
namespace Burzum\SimpleRbac\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PermissionsFixture
 */
class PermissionsFixture extends TestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	// @codingStandardsIgnoreStart
	public $fields = [
		'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
		'display_name' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
		'description' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
			'id' => '7758a759-4e0b-475d-98bf-aeb22a17c05c',
			'name' => 'Users/view',
			'display_name' => 'Users View',
			'description' => ''
		],
		[
			'id' => '9ea3d542-f33b-4827-83fc-325b78746456',
			'name' => 'Users/delete',
			'display_name' => 'Users delete',
			'description' => ''
		],
		[
			'id' => 'eaf58464-f1f5-4a57-89f6-f9c30539fed5',
			'name' => 'Products/add',
			'display_name' => 'Permission to add new products',
			'description' => ''
		],
		[
			'id' => '75f3682a-8f9d-4df1-bccc-58c939a85924',
			'name' => 'Products/view',
			'display_name' => 'Permission to view products',
			'description' => ''
		],
	];
}
