<div class="users form col-md-6 col-md-offset-3">
    <?= $this->Form->create($user) ?>
    <h1>Register</h1>
    <?php
        echo $this->Form->input('email');
        echo $this->Form->input('password');
    ?>
    <?= $this->Form->button(__('Submit'), array('class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
	<br />
    <a href="/WalkMe/users/login">Do you already have an account? Login here</a>
</div>
