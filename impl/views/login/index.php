<?php require_once 'views/header.php' ?>

<main class="col-m-10 col-10" style = "margin-left:9%">
<h2>Login</h2>
<form class="" action="login/auth" method="post">
	<label>Username: </label><input type="text" name="username"/><br>
	<label>Password: </label><input type="password" name="password"/><br>
	<input type="submit" name="submit" value="submit">
</form>
</main>

<?php require_once 'views/footer.php' ?>