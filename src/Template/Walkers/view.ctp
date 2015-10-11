<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Walker'), ['action' => 'edit', $walker->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Walker'), ['action' => 'delete', $walker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $walker->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Walkers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Walker'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="walkers view large-9 medium-8 columns content">
    <h3><?= h($walker->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($walker->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($walker->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($walker->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Lat') ?></th>
            <td><?= $this->Number->format($walker->lat) ?></td>
        </tr>
        <tr>
            <th><?= __('Lng') ?></th>
            <td><?= $this->Number->format($walker->lng) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $walker->active ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Bio') ?></h4>
        <?= $this->Text->autoParagraph(h($walker->bio)); ?>
    </div>
</div>
