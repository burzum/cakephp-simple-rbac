<?php
namespace Burzum\SimpleRbac\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersRolesFixture

 */
class UsersRolesFixture extends TestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	// @codingStandardsIgnoreStart
	public $fields = [
		'user_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null],
		'role_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['user_id', 'role_id'], 'length' => []],
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
			'user_id' => '37336b10-ed1c-4fe6-a5e9-7cdce9ab0818', // burzum
			'role_id' => 'ea7a0d0d-a080-4cdf-abad-cc08c06d3baa' // admin
		],
		[
			'user_id' => '37336b10-ed1c-4fe6-a5e9-7cdce9ab0818', // burzum
			'role_id' => '6a9801ca-bcc6-4e02-b96f-819668819e4b' // developer
		],
		[
			'user_id' => '02a6a44f-b61b-4971-97da-3f545889a39e', // gollum
			'role_id' => 'f1384734-3cb0-4575-97dc-540a28c554b2' // sales-manager
		]
	];
}
