<div class="users form col-md-7 col-md-offset-3">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend>Register</legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
