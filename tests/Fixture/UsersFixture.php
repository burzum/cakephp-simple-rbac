<?php
namespace Burzum\SimpleRbac\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture

 */
class UsersFixture extends TestFixture {

	/**
	 * Fields
	 *
	 * @var array
	 */
	// @codingStandardsIgnoreStart
	public $fields = [
		'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'username' => ['type' => 'string', 'length' => 64, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
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
			'id' => '37336b10-ed1c-4fe6-a5e9-7cdce9ab0818',
			'username' => 'burzum',
		],
		[
			'id' => '02a6a44f-b61b-4971-97da-3f545889a39e',
			'username' => 'gollum'
		]
	];
}
