<div class="users form col-md-6 col-md-offset-3">
    <?= $this->Form->create($user) ?>
    <h1>Register</h1>
    <?php
            echo $this->Form->input('name');
            echo $this->Form->input('bio');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('admin');
            echo $this->Form->input('lat');
            echo $this->Form->input('lng');
            echo $this->Form->input('dlat');
            echo $this->Form->input('dlng');
    ?>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
</div>