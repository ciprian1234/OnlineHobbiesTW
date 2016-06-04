<!DOCTYPE html>
<html>
<head>
	<title>Online Hobbies</title>
        <link rel="stylesheet" type="text/css" href="../../impl/public/css/reset.css">
        <link rel="stylesheet" type="text/css" href="../../impl/public/css/responsive.css">
        <link rel="stylesheet" type="text/css" href="../../impl/public/css/main.css">
        <link rel="stylesheet" type="text/css" href="../../impl/public/css/form.css">
        <link rel="stylesheet" type="text/css" href="../../impl/public/css/article.css">
        <link rel="stylesheet" type="text/css" href="../../impl/public/css/subcategory.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="./fbapp/fb.js">x</script>
</head>

<body>

<header class="col-m-10 col-10">
    <ul class="category">
        <li class="col-m-2 col-2 menuButton"> <a href="<?php echo URL . 'home'?>">Home</a> </li>
        <li class="col-m-2 col-2 menuButton"> <a href="category">Categories</a>
            <ul class="subcategory">
				<?php
				foreach($content as $category){
					echo '<li class="col-m-4 col-4 menuButton"><a href="#">'.$category->getTitle().'</a></li>';
				}
				?>
            </ul>
        </li>
    </ul>

    <form class="col-3 search-container" id="searchForm" action="#" method="get">
    	<input class="searchBar" type="text" name="searchQuerry" value="" placeholder="Search for categories, hobbies, articles etc..." size="35" maxlength="999">
    </form>
    
	<?php
	echo '<div class="col-m-4 col-4 profileDiv">';
	if (isset($_SESSION['name'])) {
		echo "<img id='profileImage' src=\"";
           if($_SESSION['provider'] == "Facebook")
               echo "http://graph.facebook.com/" . $_SESSION['id'] . "/picture?width=75&height=75\"";
           else
               echo $_SESSION['picture'] . "\"";
		echo "</img>";
		echo "<h3>" . $_SESSION['name'] . "</h3>";
		echo "<h5>" . $_SESSION['email'] . "</h5>";
		echo "<a href=\"logout\" class=\"col-6 bigButton\"><h3>Logout</h3></a>";
	} else {
		  echo "<a class='col-7 col-m-2' href=\"login-with?provider=Facebook\">
		<button class='loginBtn loginBtn--facebook'>Login with facebook</button>
	</a>";
		  echo "<a class='col-7 col-m-2' href=\"login-with?provider=Twitter\">
		<button class='loginBtn loginBtn--twitter'>Login with twitter</button>
	</a>";

	}
	echo "</div>";
?>
</header>