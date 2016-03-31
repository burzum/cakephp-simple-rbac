<?php
namespace Burzum\SimpleRbac\Model\Entity;

use Cake\ORM\Entity;

/**
 * PermissionsRole Entity.
 *
 * @property string $permission_id
 * @property \Burzum\SimpleRbac\Model\Entity\Permission $permission
 * @property string $role_id
 * @property \Burzum\SimpleRbac\Model\Entity\Role $role
 */
class PermissionsRole extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'permission_id' => false,
        'role_id' => false,
    ];
}
