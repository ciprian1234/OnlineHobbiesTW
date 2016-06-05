<?php
	require_once 'views/header.php';
    require_once('..\impl\models\CommentModel.php');
?>


<main class="col-10 col-m-10 mainPage">


  <div class="col-11 article">
	<?php
		echo '<img class="col-2 col-m-5 articleImage" src="'.URL.$articles->getImage().'" alt="Mountain View" />';
		echo '<h2>'.$articles->getTitle().'</h2>';
		echo '<p>'.$articles->getText().'</p>';
	?>

  </div>

    <?php
            foreach($commentsList as $c){
                echo $c->render();
            }
    ?>

<form class="articleForm" action="submitComment.php" method="post">
    <?php
        $inputHidden="text";
        $labelHidden="block";
        $nameValue = "";
        $emailValue = "";
        $commentModel = new CommentModel();
        $photo = "https://upload.wikimedia.org/wikipedia/en/e/ee/Unknown-person.gif";

        //$commentModel ->addComment(11,$photo,"Ceva valoros","Ceva ceva");
        if(isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);
            $inputHidden = "hidden";
            $labelHidden = "none";
            $nameValue = $user->getUsername();
            $emailValue = $user->getEmail();
            $photo = $user->getImage();
        }
            echo '<input value="'.$articles->getId_Article().'" type="hidden" id="id_article">';
            echo '<input value="'.$photo.'" type="hidden" id="photo">';
            echo '<div>
                     <label class="col-3-offset col-5" style="display:'.$labelHidden.'">Name:</label>
                     <input class="col-3-offset col-5 col-m-10 formItem" id="name" value="'.$nameValue.'" type="'.$inputHidden.'" name="title" placeholder="Please enter your name" size="50" maxlength="50">
                  </div>';
    ?>

    <div>
        <label class="col-3-offset col-5">Comment:</label>
        <textarea class="col-3-offset col-5 col-m-10 formItem" id="text" name="content" rows="20" placeholder="Please enter article content..."></textarea>
    </div>

    <input class="formButton col-3-offset col-2 col-m-5" type="submit" id="submit" value="Submit">
</form>

</main>
<?php
include 'views/footer.php';
?>
