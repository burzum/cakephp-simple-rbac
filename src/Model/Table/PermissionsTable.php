<?php
namespace Burzum\SimpleRbac\Model\Table;

use Burzum\SimpleRbac\Model\Entity\Permission;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Permissions Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Roles
 */
class PermissionsTable extends Table
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

        $this->table('permissions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsToMany('Roles', [
            'foreignKey' => 'permission_id',
            'targetForeignKey' => 'role_id',
            'joinTable' => 'permissions_roles',
            'className' => 'Burzum/SimpleRbac.Roles'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('display_name');

        $validator
            ->allowEmpty('description');

        return $validator;
    }
}
