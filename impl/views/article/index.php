<?php
	require_once 'views/header.php'; 
?>


<main class="col-10 col-m-10 mainPage">


  <div class="col-11 article">
	<?php
		echo '<img class="col-2 col-m-5 articleImage" src="'.URL.$articles->getImage().'" alt="Mountain View" />';
		echo '<h2>'.$articles->getTitle().'</h2>';
		echo '<p>'.$articles->getText().'</p>';
	?>

  </div>


<form class="articleForm" action="submit_post.php" method="post">


    <div class="col-3-offset col-5 col-m-10 comment">
        <div class="commentAvatar">
            <img src="<?php if(isset($_SESSION['name'])) echo $_SESSION['picture'];?>" width="50px" height="50px">
        </div>

        <div class="commentName">
            <h3 class="commentNameV"><?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?></h3>
        </div>

        <p class="commentContent">Lorem ipsum coamsdopgnf asldkfnlkdsafsadklfj asdpljf lasdj f;lasdjf;ladsjf a;sdljf;alsdjf asd;lf ja;sldjf ;ladsjlf </p>
    </div>

    <?php
        if(!isset($_SESSION['name']))
        echo "<div>
                 <label class=\"col-3-offset col-5\">Name:</label>
                 <input class=\"col-3-offset col-5 col-m-10 formItem\" type=\"text\" name=\"title\" placeholder=\"Please enter article title...\" size=\"50\" maxlength=\"50\">
              </div>
            
              <div>
                 <label class=\"col-3-offset col-5\">Email:</label>
                 <input class=\"col-3-offset col-5 formItem\" type=\"text\" name=\"title\" placeholder=\"Please enter article title...\" size=\"50\" maxlength=\"50\">
              </div>";
    ?>

    <div>
        <label class="col-3-offset col-5">Comment:</label>
        <textarea class="col-3-offset col-5 col-m-10 formItem" name="content" rows="20" placeholder="Please enter article content..."></textarea>
    </div>

    <input class="formButton col-3-offset col-2 col-m-5" type="submit" name="submit" value="Submit Comment">
    <input class="formButton col-1-offset col-2 col-m-5" type="reset">
</form>

</main>
<?php
include 'views/footer.php';
?>
