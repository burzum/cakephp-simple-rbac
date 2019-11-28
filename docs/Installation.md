# Installation

## Using Composer

Installing the plugin via [Composer](https://getcomposer.org/) is very simple, just run in your project folder:

```sh
composer require burzum/cakephp-simple-rbac
```

## CakePHP Bootstrap

Add the following part to your applications `config/bootstrap.php`.

```php
Plugin::load('Burzum/SimpleRbac');
```

## Configure the Auth Component

Load the adapter like any other authorization adapter as well.

```php
	public function initialize() {
		$this->loadComponent('Auth', [
			'authorize' => [
				'Burzum/SimpleRbac.SimpleRbac'
			]
		]);
	}
```

[See the official documentation about authorziation](http://book.cakephp.org/3.0/en/controllers/components/authentication.html#authorization) in CakePHP if you have more questions related to this part.

## Roles and Permissions

See [RBAC Configuration](RBAC-Configuration.md) for how to configure the roles and access.
