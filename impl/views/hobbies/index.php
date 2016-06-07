<?php
require_once 'views/header.php';
?>

<main class="col-10 col-m-10 mainPage">
    <div class="col-2">
        <div class="nav">
            <ul>
                <?php
                foreach ($hobbies as $hobby) {
                    if(isset($_SESSION['user']))
                        echo '<li><button class="col-2 col-m-2 buttonSubscribe">+</button></li>';
                    echo '<li><a class="col-6 col-m-8 hobbySubcategory" href="' . URL . 'hobbies/index/' . $hobby->getId_category() . '/' . $hobby->getId_hobby() . '">' . $hobby->getTitle() . '</a></li>';
                        echo '<li><div class="hobbyBox">';
                                echo '<img class="" src="'. URL . $hobby->getImage() . '" width="200" height="200" alt="noImg">';
                                echo '<p class="">'.$hobby->getDescription().'</p>';
                        echo '</div></li>';
                }
                ?>
            </ul>
        </div>

    </div>
    <div class="section">


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
			<div class="col-7 col-m-7 buttonDiv">
				<a href="' . URL . 'article/index/' . $article->getId_article() . '" class="col-m-2 col-5 readMoreButton"><h3>Read more</h3></a>
				<a href="' . URL . 'article/shareArticle/' . $article->getId_article().'" class="col-m-2 col-5 readMoreButton"><h3>Share to facebook</h3></a>
			</div>
			</div>';
        }
        ?>
    </div>
</main>

<?php
require_once 'views/footer.php';
?>


