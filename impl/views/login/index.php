<?php require_once 'views/header.php' ?>

<main class="col-m-10 col-10 mainPage">
<h2>Login</h2>
<form class="" action="<?php echo URL . 'login/auth'?>" method="post">
	<label>Username: </label><input type="text" name="username"/><br>
	<label>Password: </label><input type="password" name="password"/><br>
	<input type="submit" name="submit" value="submit">
</form>
</main>

<?php require_once 'views/footer.php' ?>