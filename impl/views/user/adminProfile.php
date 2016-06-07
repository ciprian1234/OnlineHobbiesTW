<?php
	require_once 'views/header.php'; 
?>

<main class="col-10 col-m-10 mainPage">
<div class="section">
	
	
		<h1>Admin Profile</h1>
		<h2>Statistics:</h2>
		<p>Total number of users: 123 </p>
		
		<p>Total number of categories: 8 </p>
		<p>Total number of hobbies: 12 </p>
		<p>Total number of articles: 123</p>
		<p>Most popular category: </p>
		<p>Most popular hobby: </p>
		<p>Most popular article: </p>
		
		<h3>Create Category</h3>
		<form class="col-10 col-m-10 articlePreview articleForm" action="<?php echo URL.'user/createCategory';?>" method="post" enctype = "multipart/form-data">
			<div>
				<label class="col-3">Category title:</label>
				<input class="col-10 col-m-10 formItem" type="text" name="title" placeholder="Please enter category title..." size="50" maxlength="50">
			</div>

			<div>
				<label class="col-3">Category image:</label>
				<input class="col-13" type="file" name="image">
			</div>

			<input class="formButton col-2 col-m-7" type="submit" name="submit" value="Create Category">
			<input class="formButton col-2 col-m-7" type="reset">
		</form>
		
		
		<h3>Create Hobby</h3>
		<form class="col-10 col-m-10 articlePreview articleForm" action="<?php echo URL.'user/createHobby';?>" method="post" enctype = "multipart/form-data">
			<div>
				<label class="col-2">Select category:</label>
				<?php
				echo '<select id="category" name="category">';
					echo '<option value=""></option>';
					foreach($categories as $category)
						echo '<option value="'.$category->getId_category().'">'.$category->getTitle().'</option>';
				echo '</select>';
				?>
			</div>
			
			<div>
				<label class="col-3">Hobby title:</label>
				<input class="col-10 col-m-10 formItem" type="text" name="title" placeholder="Please enter hobby title..." size="50" maxlength="50">
			</div>

			<div>
				<label class="col-3">Hobby image:</label>
				<input class="col-13" type="file" name="image">
			</div>

			<div>
				<label class="col-3">Hobby description:</label>
				<textarea class="col-10 col-m-10 formItem descriptionArea" name="content" rows="30" placeholder="Please enter hobby description..."></textarea>
			</div>
			
			<input class="formButton col-2 col-m-7" type="submit" name="submit" value="Create Hobby">
			<input class="formButton col-2 col-m-7" type="reset">
		</form>
</div>
</main>

<?php 
	require_once 'views/footer.php';
?>


