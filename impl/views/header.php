<?php require 'models/UserEntity.php'; ?>
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
        <link href='http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css' rel='stylesheet' type='text/css'>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!--        <script src="--><?php //echo URL;?><!--public/scripts/comment.js"></script>-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
                foreach($categories as $category){
                    echo '<li class="col-m-4 col-4 menuButton"><a href="'.URL.'hobbies/index/'.$category->getId_category().'">'.$category->getTitle().'</a></li>';
                }
                ?>
            </ul>
        </li>
    </ul>

    <form class=" search-container" id="searchForm" action="#" method="get">
    	<input class="searchBar" type="text" name="searchQuerry" value="" placeholder="Search for categories, hobbies, articles etc..." size="35" maxlength="999">
    </form>
    
	<?php
	if (isset($_SESSION['user'])) {
		$user = unserialize($_SESSION['user']);
        echo '<div class="col-m-7 col-5 profileDiv">';
        echo "<div class='image-holder'>";
		echo "<img id='profileImage' src=\"";
           if($_SESSION['provider'] == "Facebook")
               echo "http://graph.facebook.com/" . $user->getId() . "/picture?width=75&height=75\"";
           else
               echo $user->getImage() . "\"";
		echo "</img>";
        echo "  <div class=\"dropdown\">
            <a class='profileButton' href='#'>My hobbies</a>
            <a class='profileButton' href='#'>My articles</a>
            <a class='profileButton' href='#'>My profile</a>
            <a class='profileButton' href=\"". URL ."logout\">Logout</a>
        </div>";
        echo "</div>";
		echo "<h3>" . $user->getUsername() . "</h3>";
		echo "<h5>" . $user->getEmail() . "</h5>";
        echo "<h5>" . $_SESSION['status'] . "</h5>";
        echo "</div>";
	} else {
        echo '<div class="col-m-7 col-3 loginDiv">
                
                 <a class="col-10 col-m-2" href="'. URL . 'login-with?provider=Facebook">
                     <button class=\'loginBtn loginBtn--facebook\'>Login with Facebook</button>
                 </a>
                 <a class="col-10 col-m-2" href="' . URL . 'login-with?provider=Google">
                      <button class=\'loginBtn loginBtn--google\'>Login with Google</button>
	             </a>
	          </div>';

	}
?>
</header>