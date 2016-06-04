<!DOCTYPE html>
<html>
<head>
	<title>Online Hobbies</title>
	<link rel="stylesheet" type="text/css" href="../../impl/public/css/reset.css">
    <link rel="stylesheet" type="text/css" href="../../impl/public/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="../../impl/public/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <form class="col-4 search-container" id="searchForm" action="#" method="get">
    	<input class="searchBar" type="text" name="searchQuerry" value="" placeholder="Search for categories, hobbies, articles etc..." size="35" maxlength="999">
    </form>
    <a href="<?php echo URL . 'login'?>" class="col-6 bigButton"><h3>Sign in</h3></a>
</header>