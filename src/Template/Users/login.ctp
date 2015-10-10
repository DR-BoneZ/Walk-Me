<div class="users form col-md-6 col-md-offset-3">
    <h1>Login</h1>
    <?= $this->Form->create() ?>
    <?= $this->Form->input('email') ?>
    <?= $this->Form->input('password') ?>
    <?= $this->Form->button('Login', array('class' => 'btn btn-primary')) ?>
    <?= $this->Form->end() ?>
    <br />
    <a href="/WalkMe/users/add">Don't have an account? Register</a>
</div>