<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $walker->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $walker->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Walkers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="walkers form large-9 medium-8 columns content">
    <?= $this->Form->create($walker) ?>
    <fieldset>
        <legend><?= __('Edit Walker') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('bio');
            echo $this->Form->input('active');
            echo $this->Form->input('lat');
            echo $this->Form->input('lng');
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
