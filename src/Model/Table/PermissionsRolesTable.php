<?php
namespace Burzum\SimpleRbac\Model\Table;

use Burzum\SimpleRbac\Model\Entity\PermissionsRole;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PermissionsRoles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Permissions
 * @property \Cake\ORM\Association\BelongsTo $Roles
 */
class PermissionsRolesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('permissions_roles');
        $this->displayField('permission_id');
        $this->primaryKey(['permission_id', 'role_id']);

        $this->belongsTo('Permissions', [
            'foreignKey' => 'permission_id',
            'joinType' => 'INNER',
            'className' => 'Burzum/SimpleRbac.Permissions'
        ]);
        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
            'className' => 'Burzum/SimpleRbac.Roles'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['permission_id'], 'Permissions'));
        $rules->add($rules->existsIn(['role_id'], 'Roles'));
        return $rules;
    }
}
