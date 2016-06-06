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
                        echo '<button class="col-2 col-m-2 buttonSubscribe">+</button>';
                    echo '<li><a class="col-6 col-m-8 hobbySubcategory" href="' . URL . 'hobbies/index/' . $hobby->getId_category() . '/' . $hobby->getId_hobby() . '">' . $hobby->getTitle() . '</a></li>';
                        echo '<div class="hobbyBox">';
                                echo '<img class="" src="'. URL . $hobby->getImage() . '" width="200px" height="200px">';
                                echo '<p class="">'.$hobby->getDescription().'</p>';
                        echo '</div>';
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
					<img src="' . URL . $article->getImage() . '" alt="Category Image" width="150px" height="150px">
				</div>
				<h3 class="articleTitle">' . $article->getTitle() . '</h3>
				<div class="rating">
					 <button class="col-4 col-m-4 likeCounter like" disabled>' . $article->getLikes() . ' </button>
					 <button class="col-4 col-m-4 likeCounter dislike" disabled>' . $article->getLikes() . ' </button></div>
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


