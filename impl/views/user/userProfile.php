<?php
	require_once 'views/header.php'; 
?>

<main class="col-10 col-m-10 mainPage">
<div class="section">
	
	
		<h1>User Profile</h1>
		<h2>Your Hobby list:</h2>
		
		<ul>
			<?php
			foreach($hobbies as $hobby) {
				echo '<li>?PHP Title Hobby <a href='.'user/deletePreference/+id_prefPHP.>Delete</a></li>';
			}
			?>
		</ul>
</div>
</main>

<?php 
	require_once 'views/footer.php';
?>


