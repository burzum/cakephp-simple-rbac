<?php

use Phinx\Migration\AbstractMigration;

class InitialMigration extends AbstractMigration {

	/**
	 * Change Method.
	 * Write your reversible migrations using this method.
	 * More information on writing migrations is available here:
	 * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
	 * The following commands can be used in this method and Phinx will
	 * automatically reverse them when rolling back:
	 *    createTable
	 *    renameTable
	 *    addColumn
	 *    renameColumn
	 *    addIndex
	 *    addForeignKey
	 * Remember to call "create()" or "update()" and NOT "save()" when working
	 * with the Table class.
	 */
	public function change() {
		$this->table('users_roles', ['id' => false, 'primary_key' => ['user_id', 'role_id']])
			->addColumn('user_id', 'char', ['limit' => 36, 'default' => null, 'null' => true])
			->addColumn('role_id', 'char', ['limit' => 36, 'default' => null, 'null' => true])
			->addIndex(['user_id', 'role_id'], ['unique' => true])
			->create();

		$this->table('roles', ['id' => false, 'primary_key' => 'id'])
			->addColumn('id', 'char', ['limit' => 36])
			->addColumn('name', 'string', ['limit' => 255])
			->addColumn('display_name', 'string', ['limit' => 255, 'default' => null, 'null' => true])
			->addColumn('description', 'text', ['default' => null, 'null' => true])
			->create();

		$this->table('permissions', ['id' => false, 'primary_key' => 'id'])
			->addColumn('id', 'char', ['limit' => 36])
			->addColumn('name', 'string', ['limit' => 255])
			->addColumn('display_name', 'string', ['limit' => 255, 'default' => null, 'null' => true])
			->addColumn('description', 'text', ['default' => null, 'null' => true])
			->create();

		$this->table('permissions_roles', ['id' => false, 'primary_key' => ['permission_id', 'role_id']])
			->addColumn('permission_id', 'char', ['limit' => 36, 'default' => null, 'null' => true])
			->addColumn('role_id', 'char', ['limit' => 36, 'default' => null, 'null' => true])
			->addIndex(['permission_id', 'role_id'], ['unique' => true])
			->create();
	}
}
