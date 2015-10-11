<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Walker'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="walkers index large-9 medium-8 columns content">
    <h3><?= __('Walkers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th><?= $this->Paginator->sort('lat') ?></th>
                <th><?= $this->Paginator->sort('lng') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($walkers as $walker): ?>
            <tr>
                <td><?= $this->Number->format($walker->id) ?></td>
                <td><?= h($walker->email) ?></td>
                <td><?= h($walker->active) ?></td>
                <td><?= $this->Number->format($walker->lat) ?></td>
                <td><?= $this->Number->format($walker->lng) ?></td>
                <td><?= h($walker->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $walker->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $walker->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $walker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $walker->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
