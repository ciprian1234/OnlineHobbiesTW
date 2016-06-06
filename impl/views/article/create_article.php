
<?php
include '/views/header.php';
?>


	<main class="col-m-10 col-10 mainPage">

    <div class="heading">
        <h1 class="heading"> Create your own article </h1>
        <p>Fill up these fields and press 'Submit' button when you're done...</p>
    </div>


    <form class="articleForm" action="submit_post.php" method="post">

        <div>
            <label class="col-3">Article title:</label>
            <input class="col-10 col-m-10 formItem" type="text" name="title" placeholder="Please enter article title..." size="50" maxlength="50">
        </div>

        <div>
            <label class="col-3">Article image:</label>
            <input class="col-13" type="file" name="image">
        </div>

        <div>
            <label class="col-3">Article content:</label>
            <textarea class="col-10 col-m-10 formItem descriptionArea" name="content" rows="30" placeholder="Please enter article content..."></textarea>
        </div>

        <input class="formButton col-2 col-m-7" type="submit" name="submit" value="Submit Article">
        <input class="formButton col-2 col-m-7" type="reset">
    </form>

	</main>

<?php
include '/views/footer.php';
?>