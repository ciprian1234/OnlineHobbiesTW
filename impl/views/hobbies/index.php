
<?php
	require_once 'views/header.php'; 
?>

<main class="col-10 col-m-10 mainPage">
	<div class="col-1">
		<div class="nav">
				<ul>
					<?php
					foreach($hobbies as $hobby){
						echo '<li><a href="'.URL.'hobbies/index/'.$hobby->getId_category().'/'.$hobby->getId_hobby().'">'.$hobby->getTitle().'</a></li>';
					}
					?>
					
				</ul>
		</div>
	</div>
<div class="section">
	
		
		<?php
		foreach($articles as $article) {
		echo '<div class="col-10 col-m-10 articlePreview">';
		echo 	'<div class="articleImage">
					<img src="'.URL.$article->getImage().'" alt="Mountain View">
				</div>
				<h3>'.$article->getTitle().'</h3>
				<div class="rating">Likes:'.$article->getLikes().' Dislikes:'.$article->getLikes().'</div>
				<h3 class="articlePreviewContent">'.substr($article->getText(), 0, 300).'</h3>
			<a href="#" class="gotoBtn"><h3>Read more</h3></a>
			</div>';
		}
		?>
</div>
</main>

<?php 
	require_once 'views/footer.php';
?>


