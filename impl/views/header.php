<!DOCTYPE html>
<html>
<head>
	<title>Online Hobbies</title>
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/reset.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/responsive.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/form.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/article.css">
        <link rel="stylesheet" type="text/css" href="<?php echo URL;?>public/css/subcategory.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                // Hide all dropdowns initially.
                $('.dropdown').hide();

                // Bind click event
                $('.image-holder').click(function() {
                    $(this).children('.dropdown').slideToggle('slow');
                });
            });
        </script>
</head>

<body>

<header class="col-m-10 col-10">
    <ul class="category">
        <li class="col-m-2 col-1 menuButton"> <a href="<?php echo URL . 'home'?>">Home</a> </li>
        <li class="col-m-2 col-1 menuButton"> <a href="category">Categories</a>
            <ul class="subcategory">
				<?php
				foreach($content as $category){
					echo '<li class="col-m-4 col-4 menuButton"><a href="#">'.$category->getTitle().'</a></li>';
				}
				?>
            </ul>
        </li>
    </ul>

    <form class=" search-container" id="searchForm" action="#" method="get">
    	<input class="searchBar" type="text" name="searchQuerry" value="" placeholder="Search for categories, hobbies, articles etc..." size="35" maxlength="999">
    </form>
    
	<?php

	if (isset($_SESSION['name'])) {
        echo '<div class="col-m-7 col-5 profileDiv">';
        echo "<div class='image-holder'>";
		echo "<img id='profileImage' src=\"";
           if($_SESSION['provider'] == "Facebook")
               echo "http://graph.facebook.com/" . $_SESSION['id'] . "/picture?width=75&height=75\"";
           else
               echo $_SESSION['picture'] . "\"";
		echo "</img>";
        echo "  <div class=\"dropdown\">
            <a class=' profileButton' href='#'>My hobbies</a>
            <a class=' profileButton' href='#'>My articles</a>
            <a class=' profileButton' href='#'>My profile</a>
            <a class='   profileButton' href=". URL ."'logout'>Logout</a>
        </div>";
        echo "</div>";
		echo "<h3>" . $_SESSION['name'] . "</h3>";
		echo "<h5>" . $_SESSION['email'] . "</h5>";
        echo "</div>";
	} else {
        echo '<div class="col-m-7 col-5 loginDiv">
                 <a class="col-7 col-m-2" href="'. URL . 'login-with?provider=Facebook">
                     <button class=\'loginBtn loginBtn--facebook\'>Login with Facebook</button>
                 </a>
                 <a class="col-7 col-m-2" href="' . URL . 'login-with?provider=Google">
                      <button class=\'loginBtn loginBtn--google\'>Login with Google</button>
	             </a>
	          </div>';

	}
?>
</header>