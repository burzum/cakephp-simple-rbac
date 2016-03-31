<?php
namespace Burzum\SimpleRbac\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RolesFixture

 */
class RolesFixture extends TestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	// @codingStandardsIgnoreStart
	public $fields = [
		'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'name' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
		'display_name' => ['type' => 'string', 'length' => 64, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
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
			'id' => 'ea7a0d0d-a080-4cdf-abad-cc08c06d3baa',
			'name' => 'admin',
			'display_name' => 'Administrator',
			'description' => ''
		],
		[
			'id' => 'f1384734-3cb0-4575-97dc-540a28c554b2',
			'name' => 'sales-manager',
			'display_name' => 'Sales Manager',
			'description' => ''
		],
		[
			'id' => '6a9801ca-bcc6-4e02-b96f-819668819e4b',
			'name' => 'developer',
			'display_name' => 'Developer',
			'description' => ''
		],
	];
}
