<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Role'), ['action' => 'edit', $role->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Role'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users Roles'), ['controller' => 'UsersRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Role'), ['controller' => 'UsersRoles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permissions'), ['controller' => 'Permissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permission'), ['controller' => 'Permissions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="roles view large-9 medium-8 columns content">
    <h3><?= h($role->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($role->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($role->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Display Name') ?></th>
            <td><?= h($role->display_name) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($role->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users Roles') ?></h4>
        <?php if (!empty($role->users_roles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('User Id') ?></th>
                <th><?= __('Role Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($role->users_roles as $usersRoles): ?>
            <tr>
                <td><?= h($usersRoles->user_id) ?></td>
                <td><?= h($usersRoles->role_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UsersRoles', 'action' => 'view', $usersRoles->user_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'UsersRoles', 'action' => 'edit', $usersRoles->user_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UsersRoles', 'action' => 'delete', $usersRoles->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersRoles->user_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Permissions') ?></h4>
        <?php if (!empty($role->permissions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Display Name') ?></th>
                <th><?= __('Description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($role->permissions as $permissions): ?>
            <tr>
                <td><?= h($permissions->id) ?></td>
                <td><?= h($permissions->name) ?></td>
                <td><?= h($permissions->display_name) ?></td>
                <td><?= h($permissions->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Permissions', 'action' => 'view', $permissions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Permissions', 'action' => 'edit', $permissions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Permissions', 'action' => 'delete', $permissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permissions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
