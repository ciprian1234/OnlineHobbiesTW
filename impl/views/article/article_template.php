<?php
include '/views/header.php';
?>


<main class="col-10 col-m-10 mainPage">


  <div class="col-11 article">
	  <img class="col-3 col-m-5 articleImage" src="../impl/public/images/cpp.png" alt="Mountain View" />
	  <h2>Article</h2>
	  <h3>Rating</h3>
	  <h3>Alte informatii</h3>
	  
  </div>



<form class="articleForm" action="submit_post.php" method="post">

    <div>
        <label class="col-3">Name:</label>
        <input class="col-10 col-m-10 formItem" type="text" name="title" placeholder="Please enter article title..." size="50" maxlength="50">
    </div>

    <div>
        <label class="col-3">Email:</label>
        <input class="col-10 col-m-10 formItem" type="text" name="title" placeholder="Please enter article title..." size="50" maxlength="50">
    </div>
   
    <div>
        <label class="col-3">Comment:</label>
        <textarea class="col-10 col-m-10 formItem" name="content" rows="20" placeholder="Please enter article content..."></textarea>
    </div>

    <input class="formButton col-2 col-m-5" type="submit" name="submit" value="Submit Comment">
    <input class="formButton col-2 col-m-5" type="reset">
</form>

</main>
<?php
include '/views/footer.php';
?>
