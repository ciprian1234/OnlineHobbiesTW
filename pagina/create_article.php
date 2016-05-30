<!DOCTYPE html>
<html>
<head>
	<title>Create Article</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/form.css">
</head>


<body>

<?php
include 'resources/templates/header.php';
?>


	<main class="col-m-10 col-10">

    <div class="heading">
        <h1 class="heading"> Create your own article </h1>
        <p>Fill up these fields and press 'Submit' button when you're done...</p>
    </div>


    <form class="articleForm" action="submit_post.php" method="post">

        <div>
            <label class="col-3">Article title:</label>
            <input class="col-12 formItem" type="text" name="title" placeholder="Please enter article title..." size="50" maxlength="50">
        </div>

        <div>
            <label class="col-3">Article image:</label>
            <input class="col-13" type="file" name="image">
        </div>

        <div>
            <label class="col-3">Article content:</label>
            <textarea class="col-12 formItem descriptionArea" name="content" rows="30" placeholder="Please enter article content..."></textarea>
        </div>

        <input class="formButton col-2" type="submit" name="submit" value="Submit Article">
        <input class="formButton col-2" type="reset">
    </form>

	</main>

    <footer>
        <p> Footer Stuffs...</p>
    </footer>

</body>
</html>