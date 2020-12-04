<h1>Register</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'completed'): ?>
    <strong class="alert_green">Register Completed</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert_red">Register Failed, verify the inputs</strong>
<?php endif; ?>
<?php Helpers::deleteSession('register') ?>

<!-- <form action="index.php?controller=Users&action=save" method="POST"> -->
<form action="<?=base_url?>users/save" method="POST">
    <label for="name">Name</label>
    <input type="text" name="name" required>

    <label for="lastname">LastName</label>
    <input type="text" name="lastname" required>

    <label for="email">Email</label>
    <input type="email" name="email" required>

    <label for="password">Password</label>
    <input type="password" name="password" required>

    <input type="submit" value="Save">
</form>