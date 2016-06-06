<?php
	require_once 'views/header.php'; 
?>

<main class="col-10 col-m-10 mainPage">
<div class="section">
	
	
		
		<?php
		foreach($articles as $article) {
		echo '<div class="col-10 col-m-10 articlePreview">';
		echo 	'<div class="col-2 col-m-4 articleImage">
					<img src="'.URL.$article->getImage().'" alt="Category Image" width="150px" height="150px">
				</div>
				<h3 class="articleTitle">'.$article->getTitle().'</h3>
				<div class="rating">
					 <button class="col-4 col-m-4 likeCounter like" disabled>'.$article->getLikes().' </button>
					 <button class="col-4 col-m-4 likeCounter dislike" disabled>'.$article->getDislikes().' </button></div>
				<h3 class="col-7 col-m-7 articlePreviewContent">'.substr($article->getText(), 0, 300).'</h3>
			<div class="col-7 col-m-7 buttonDiv">
			<a href="'.URL.'article/index/'.$article->getId_article().'" class="col-m-2 col-5 deleteArticleButton"><h3>Delete article</h3></a>
			<a href="'.URL.'article/index/'.$article->getId_article().'" class="col-m-2 col-5 readMoreButton"><h3>Read more</h3></a>
			</div>
			</div>';
		}
		?>
</div>
</main>

<?php 
	require_once 'views/footer.php';
?>


