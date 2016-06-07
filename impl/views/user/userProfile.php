<?php
	require_once 'views/header.php'; 
?>

<main class="col-10 col-m-10 mainPage">
<div class="section">
	
	
		<h1>User Profile</h1>
		<h2>Add hobby to preferences</h2>
		<form class="" action="<?php echo URL.'hobbies/addPreference';?>" method="post" enctype = "multipart/form-data">
			<div>
				<label class="col-2">Select hobby:</label>
				<?php
				echo '<select id="hobby" name="hobby">';
					echo '<option value=""></option>';
					foreach($articles as $hobby)
						echo '<option value="'.$hobby->getId_hobby().'">'.$hobby->getTitle().'</option>';
				echo '</select>';
				?>
				<input class="" type="submit" name="submit" value="Add to preferences">
			</div>
			
		</form>
		
		<h2>Your Hobby list:</h2>
		<ul>
			<?php
			foreach($hobbies as $hobby) {
				echo '<li>'.$hobby->getTitle().' <a href="'.URL.'hobbies/deletePreference/'.$hobby->getId_hobby().'">Delete</a></li>';
			}
			?>
		</ul>
</div>
</main>

<?php 
	require_once 'views/footer.php';
?>


