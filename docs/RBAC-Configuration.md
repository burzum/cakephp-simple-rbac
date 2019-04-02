RBAC Configuration
==================

To avoid adding a ton of things into `config/bootstrap.php` create a new file `config/rbac.php`.

Here is an example of how it could look like:

```php
$config = [
	'SimpleRbac' => [
		'roles' => [
			'authors',
			'admin',
			'user',
		],
		'actionMap' => [
			'Articles' => [
				'view' => ['user', 'author', 'admin'],
				'add' => ['admin', 'author'],
				'edit' => ['admin', 'author'],
				'delete' => ['admin'],
			],
			'Users' => [
				'*' => ['admin'],
			],
		]
	]
];
```

Load the configuration file in `config/bootstrap.php`:

```php
Configure::load('rbac');
```

Dynamic Roles and Permissions
-----------------------------

The plugin is not limited to the static roles configuration. You can manage your permissions and roles in the database as well and write them to `config/rbac.php` or simply write at runtime using `Configure::write()`.

Another way of making the permission fetching dynamic is to extend SimpleRbac:

```php
namespace App\Auth;

use Burzum\SimpleRbac\Auth\SimpleRbacAuthorize;
use Cake\ORM\TableRegistry;

class ExtendedSimpleRbacAuthorize extends SimpleRbacAuthorize {
	public function getActionMap() {
		// Example, do whatever you need here.
		return TableRegistry::get('RbacRules')->getActionRules();
	}
	public function getPrefixMap() {
		// Example, do whatever you need here.
		return TableRegistry::get('RbacRules')->getPrefixRules();
	}
}
```

Bottom line is that you can customize it to fit any need.
