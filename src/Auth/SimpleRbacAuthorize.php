<?php

namespace Burzum\SimpleRbac\Auth;

use Cake\Auth\BaseAuthorize;
use Cake\Core\Configure;
use Cake\Http\ServerRequest;
use Cake\Utility\Inflector;
use RuntimeException;

/**
 * Copyright 2011 - 2015, Florian Krämer
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2011 - 2015, Florian Krämer
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class SimpleRbacAuthorize extends BaseAuthorize
{

    /**
     * Default config for this object.
     *
     * - `roleField` - The name of the role field in the user data array that is passed to authorize()
     *
     * @var array
     */
    public $_defaultConfig = array(
        'roleField' => 'role',
        'allowEmptyActionMap' => false,
        'allowEmptyPrefixMap' => true,
        'undefinedActionsAreAllowed' => false
    );

    /**
     * Authorize a user based on his roles
     *
     * @param array $user The user to authorize
     * @param Request $request The request needing authorization.
     * @return boolean
     * @throws RuntimeException when the role field does not exist
     */
    public function authorize($user, ServerRequest $request)
    {
        $roleField = $this->_config['roleField'];

        if (!isset($user[$roleField])) {
            throw new RuntimeException(sprintf('The role field `%s` does not exist!', $roleField));
        }

        if (is_string($user[$roleField])) {
            $user[$roleField] = array($user[$roleField]);
        }

        if ($this->authorizeByPrefix($user[$roleField], $request)) {
            return true;
        }

        if ($this->authorizeByControllerAndAction($user, $request)) {
            return true;
        }

        return false;
    }

    /**
     * Checks if a role is granted access to a controller and action
     *
     * @param array $user
     * @param Request $request
     * @return boolean
     */
    public function authorizeByControllerAndAction($user, ServerRequest $request)
    {
        $roleField = $this->getConfig('roleField');
        extract($this->getControllerNameAndAction($request));
        $actionMap = $this->getActionMap();

        if (isset($actionMap[$name]['*'])) {
            if ($this->_isAllowedRole($user[$roleField], $actionMap[$name]['*'])) {
                return true;
            }
        }

        if (isset($actionMap[$name][$action])) {
            if ($this->_isAllowedRole($user[$roleField], $actionMap[$name][$action])) {
                return true;
            }
        }

        if ($this->getConfig('undefinedActionsAreAllowed') === true) {
            return true;
        }

        return false;
    }

    /**
     * Checks if a role is allowed.
     *
     * @param array|string $userRoles
     * @param array $allowedRoles
     * @return boolean
     */
    protected function _isAllowedRole($userRoles, array $allowedRoles)
    {
        if (in_array('*', $allowedRoles)) {
            return true;
        }
        if (is_string($userRoles)) {
            $userRoles = [$userRoles];
        }
        foreach ($userRoles as $userRole) {
            if (in_array($userRole, $allowedRoles)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks if a role is granted access to a prefix route like /admin.
     *
     * @param array $roles
     * @param Request $request
     * @return boolean
     */
    public function authorizeByPrefix(array $roles, ServerRequest $request)
    {
        $prefixeMap = $this->getPrefixMap();
        $prefix = $request->getParam('prefix');
        if ($prefix !== null && isset($prefixeMap[$prefix])) {
            foreach ($roles as $role) {
                if (in_array($role, $prefixeMap[$prefix])) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Gets the controller and action, prefixes the controller with the plugin if there is one
     *
     * @param Request $request
     * @return array
     */
    public function getControllerNameAndAction(ServerRequest $request)
    {
        $controller = $this->_registry->getController();
        $name = $controller->getName();
        $action = $request->getParam('action');
        $plugin = $request->getParam('plugin');

        if (!empty($plugin)) {
            $name = Inflector::camelize($plugin) . '.' . $name;
        }

        return compact('name', 'action');
    }

    /**
     * Can be overridden if inherited with a method to fetch this from anywhere, a database for example.
     *
     * @return array
     * @throws RuntimeException
     */
    public function getActionMap()
    {
        $actionMap = (array) Configure::read('SimpleRbac.actionMap');
        if (empty($actionMap) && $this->getConfig('allowEmptyActionMap') === false) {
            throw new RuntimeException('SimpleRbac.actionMap configuration is empty!');
        }
        return $actionMap;
    }

    /**
     * Can be overriden if inherited with a method to fetch this from anywhere, a database for exaple
     *
     * @return array
     * @throws \RuntimeException
     */
    public function getPrefixMap()
    {
        $prefixMap = (array) Configure::read('SimpleRbac.prefixMap');
        if (empty($prefixMap) && $this->getConfig('allowEmptyPrefixMap') === false) {
            throw new RuntimeException('SimpleRbac.prefixMap configuration is empty!');
        }
        return $prefixMap;
    }
}
