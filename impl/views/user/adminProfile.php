<?php
require_once 'views/header.php';
?>

<main class="col-10 col-m-10 mainPage">
	<div class="section">
		<h1 class="heading">Admin Profile</h1>
		<button class="toggleButton1" onclick="location.href='<?php echo URL.'user/pdfStatistics';?>'">Statistics</button>
		<button class="toggleButton">Create a new category</button>
		<div class="col-3-offset col-7 col-m-10 toggleDiv createDiv createCategoryDiv">
			<form class="articleForm" action="<?php echo URL . 'user/createCategory'; ?>"
				  method="post" enctype="multipart/form-data">
				<div>
					<label class="col-2">Category title:</label>
					<input class="col-7 col-m-7 formItem" type="text" name="title"
						   placeholder="Please enter category title..." size="50" maxlength="50">
				</div>

				<div>
					<label class="col-2">Category image:</label>
					<input class="col-8" type="file" name="image">
				</div>

				<input class="formButton col-3 col-m-7" type="submit" name="submit" value="Create Category">
				<input class="formButton col-3 col-m-7" type="reset">
			</form>
		</div>

		<button class="toggleButton">Create a new hobby</button>
		<div class="col-3-offset col-7 col-m-10 createDiv toggleDiv createHobbyDiv">
			<form class="articleForm" action="<?php echo URL . 'user/createHobby'; ?>"
				  method="post" enctype="multipart/form-data">
				<div>
					<label class="col-2 col-m-1">Select category:</label>
					<?php
					echo '<select class="selectDropdown" id="category" name="category" onchange="hobbiesDropdown(\'category\',\'hobby\')">';
					echo '<option value=""></option>';
					foreach ($categories as $category)
						echo '<option value="' . $category->getId_category() . '">' . $category->getTitle() . '</option>';
					echo '</select>';
					?>
				</div>

				<div>
					<label class="col-2 col-m-2">Hobby title:</label>
					<input class="col-7 col-m-7 formItem" type="text" name="title"
						   placeholder="Please enter hobby title..." size="50" maxlength="50">
				</div>

				<div>
					<label class="col-2 col-m-2">Hobby image:</label>
					<input class="col-7 col-m-7" type="file" name="image">
				</div>

				<div>
					<label class="col-2 col-m-2">Hobby description:</label>
                <textarea class="col-10 col-m-10 formItem descriptionArea" name="content" rows="15"
						  placeholder="Please enter hobby description..."></textarea>
				</div>

				<input class="formButton col-2 col-m-7" type="submit" name="submit" value="Create Hobby">
				<input class="formButton col-2 col-m-7" type="reset">
			</form>
		</div>
	</div>
</main>

<?php
require_once 'views/footer.php';
?>


