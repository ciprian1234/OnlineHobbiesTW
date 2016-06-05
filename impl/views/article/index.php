<?php
	require_once 'views/header.php';
?>


<main class="col-10 col-m-10 mainPage">


  <div class="col-11 article">
	<?php
		echo '<img class="col-2 col-m-5 articleImage" src="'.URL.$articles->getImage().'" alt="Img" />';
		echo '<h2>'.$articles->getTitle().'</h2>';
		echo '<p>'.$articles->getText().'</p>';
	?>
  </div>
  
	<?php
            foreach($comments as $comment){
                echo '<div class="col-3-offset col-5 col-m-10 comment">
						<div class="commentAvatar">
							<img src="'.$comment->getImage().'" width="50px" height="50px">
						</div>
						<div class="commentName">
							<h3 class="commentNameV">'.$comment->getUsername().'</h3>
						</div>
							<p class="commentContent">'.$comment->getText().'</p>
					</div>';
            }
    ?>



    <?php
        if(!isset($_SESSION['user'])) {
			echo '<div class="col-3-offset col-5 col-m-10"><p> You must be logged in to leave a comment!</p></div>';
		}
		else {
			echo'<form class="articleForm" action="'.URL.'article/submitComment/'.$articles->getId_article().'" method="post">';
			echo 	'<div>
						<label class="col-3-offset col-5">Comment:</label>
						<textarea class="col-3-offset col-5 col-m-10 formItem" name="content" rows="20" placeholder="Please enter article content..."></textarea>
					</div>

				<input class="formButton col-3-offset col-2 col-m-5" type="submit" name="submit" value="Submit Comment">
				<input class="formButton col-1-offset col-2 col-m-5" type="reset">
				</form>';
		}	
    ?>

</main>
<?php
include 'views/footer.php';
?>
