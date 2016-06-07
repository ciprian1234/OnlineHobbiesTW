<?php
require_once 'views/header.php';
?>

<main class="col-10 col-m-10 mainPage">
    
        <?php
        foreach ($articles as $article) {
            echo '<div class="col-9 col-m-10 articlePreview">';
            echo '<div class="col-2 col-m-4 articleImage">
					<img src="' . URL . $article->getImage() . '" alt="Category Image" width="150" height="150">
				</div>
				<h3 class="articleTitle">' . $article->getTitle() . '</h3>
				<div class="rating">
					<a class="col-4 col-m-4 likeCounter like" href="'.URL.'article/likeArticle/'.$article->getId_article().'">' . $article->getLikes() . ' </a>
					<a class="col-4 col-m-4 likeCounter dislike" href="'.URL.'article/dislikeArticle/'.$article->getId_article().'">' . $article->getDislikes() . ' </a>
				</div>
				<h3 class="col-7 col-m-7 articlePreviewContent">' . substr($article->getText(), 0, 300) . '</h3>
			<a href="' . URL . 'article/index/' . $article->getId_article() . '" class="col-m-2 col-2 readMoreButton"><h3>Read more</h3></a>
			</div>';
        }
        ?>
    </div>
</main>

<?php
require_once 'views/footer.php';
?>


