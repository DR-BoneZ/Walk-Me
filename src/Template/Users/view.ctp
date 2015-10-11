<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'adminAdd']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Admin') ?></th>
            <td><?= $this->Number->format($user->admin) ?></td>
        </tr>
        <tr>
            <th><?= __('Lat') ?></th>
            <td><?= $this->Number->format($user->lat) ?></td>
        </tr>
        <tr>
            <th><?= __('Lng') ?></th>
            <td><?= $this->Number->format($user->lng) ?></td>
        </tr>
        <tr>
            <th><?= __('Dlat') ?></th>
            <td><?= $this->Number->format($user->dlat) ?></td>
        </tr>
        <tr>
            <th><?= __('Dlng') ?></th>
            <td><?= $this->Number->format($user->dlng) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Bio') ?></h4>
        <?= $this->Text->autoParagraph(h($user->bio)); ?>
    </div>
</div>
