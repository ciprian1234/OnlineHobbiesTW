<!DOCTYPE html>
<html>
<head>
	<title>Online Hobbies</title>
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<!--<link rel="stylesheet" type="text/css" href="../css/960_16_col.css">-->
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>

<!--<header class="col-12 alpha omega">
    <ul class="category">
        <li class="col-3 menuButton"> <a href="index.php">Home</a> </li>
        <li class="col-3 menuButton"> <a href="index.php">Categories</a>
            <ul class="subcategory">
                <li class="col-4 menuButton"><a href="hobby_page.html">Sport</a></li>
                <li class="col-4 menuButton"><a href="hobby_page.html">Video games</a></li>
                <li class="col-4 menuButton"><a href="hobby_page.html">Movies</a></li>
            </ul>
        </li>
    </ul>

    <form class="alpha omega search-container" id="searchForm" action="#" method="get">
    	<input class="searchBar" type="text" name="searchQuerry" value="" placeholder="Search for categories, hobbies, articles etc..." size="35" maxlength="999">
    </form>


    <a href="#" class="bigButton"><h3>Sign in</h3></a>
</header>-->

<?php
    include 'resources/templates/header.php';
?>

<main class="col-m-10 col-10" style = "margin-left:9%">

    <div class="heading">
        <h1 class="heading"> Categories </h1>
        <p>All hobbies in organised in categories</p>
    </div>

	<ul class="category-container">
		    <li class="col-m-10 col-3 item_box"><a class="category-link" href="#">
                    <h5 class="category-title">Sports</h5>
                    <img class="category-icon" alt="Games" src="resources/images/sportcat.png">
                </a> 
            </li>
            
            <li class="col-m-10 col-3 item_box"><a class="category-link" href="#">
                    <h5 class="category-title">Movies</h5>
                    <img class="category-icon" alt="Movies" src="resources/images/moviecat.png">
                </a> 
            </li>
            
            <li class="col-m-10 col-3 item_box"><a class="category-link" href="#">
                    <h5 class="category-title">Music</h5>
                    <img class="category-icon" alt="Music" src="resources/images/musiccat.png">
                </a>
            </li>
                
            <li class="col-m-10 col-3 item_box"><a class="category-link" href="#">
                    <h5 class="category-title">Books</h5>
                    <img class="category-icon" alt="Books" src="resources/images/bookscat.png">
                </a> 
            </li>
            
            <li class="col-m-10 col-3 item_box"><a class="category-link" href="#">
                    <h5 class="category-title">Cars</h5>
                    <img class="category-icon" alt="Cars" src="resources/images/carscat.png">
                </a> 
            </li>
                
            <li class="col-m-10 col-3 item_box"><a class="category-link" href="#">
                    <h5 class="category-title">Pets</h5>
                    <img class="category-icon" alt="Pets    " src="resources/images/petscat.png">
                </a> 
            </li>
            
            <li class="col-m-10 col-3 item_box"><a class="category-link" href="#">
                    <h5 class="category-title">Travelling</h5>
                    <img class="category-icon" alt="Travelling" src="resources/images/travellingcat2.png">
                </a> 
            </li>
            
            <li class="col-m-10 col-3 item_box"><a class="category-link" href="#">
                    <h5 class="category-title">Games</h5>
                    <img class="category-icon" alt="Games" src="resources/images/videogamescat.png">
                </a> 
            </li>
            <li class="col-m-10 col-3 item_box"><a class="category-link" href="#">
                    <h5 class="category-title">Games</h5>
                    <img class="category-icon" alt="Games" src="resources/images/sportcat.png">
                </a> 
            </li>
	</ul>

	</main>

    <footer>
        <p> Footer Stuffs...</p>
    </footer>

</body>
</html>