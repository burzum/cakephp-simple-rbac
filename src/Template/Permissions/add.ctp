<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Permissions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permissions form large-9 medium-8 columns content">
    <?= $this->Form->create($permission) ?>
    <fieldset>
        <legend><?= __('Add Permission') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('display_name');
            echo $this->Form->input('description');
            echo $this->Form->input('roles._ids', ['options' => $roles]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
