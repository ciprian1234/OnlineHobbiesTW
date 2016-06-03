<?php session_start(); ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Online Hobbies</title>
        <link rel="stylesheet" type="text/css" href="../impl/public/css/reset.css">
        <link rel="stylesheet" type="text/css" href="../impl/public/css/responsive.css">
        <link rel="stylesheet" type="text/css" href="../impl/public/css/main.css">
        <link rel="stylesheet" type="text/css" href="../impl/public/css/form.css">
        <link rel="stylesheet" type="text/css" href="../impl/public/css/article.css">
        <link rel="stylesheet" type="text/css" href="../impl/public/css/subcategory.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="./fbapp/fb.js">x</script>
    </head>

    <body>

<?php
echo "<header class=\"col-m-10 col-10\">
    <ul class=\"category\">
        <li class=\"col-m-2 col-2 menuButton\"> <a href=\"home\">Home</a> </li>
        <li class=\"col-m-2 col-2 menuButton\"> <a href=\"category\">Categories</a>
            <ul class=\"subcategory\">
                <li class=\"col-m-4 col-4 menuButton\"><a href=\"hobby_page.php\">Sport</a></li>
                <li class=\"col-m-4 col-4 menuButton\"><a href=\"hobby_page.php\">Video games</a></li>
                <li class=\"col-m-4 col-4 menuButton\"><a href=\"hobby_page.php\">Movies</a></li>
            </ul>
        </li>
    </ul>

    <form class=\"col-4 search-container\" id=\"searchForm\" action=\"#\" method=\"get\">
    	<input class=\"searchBar\" type=\"text\" name=\"searchQuerry\" value=\"\" placeholder=\"Search for categories, hobbies, articles etc...\" size=\"35\" maxlength=\"999\">
    </form>
   ";

if (isset($_SESSION['name'])) {
    echo "<img src=\"http://graph.facebook.com/".$_SESSION['id'] ."/picture?width=75&height=75\" </img>";
    echo "<br>";
    echo $_SESSION['name'];
    echo "<br>";
    echo $_SESSION['id'];
    echo "<br>";
    echo $_SESSION['birthday'];
    echo "<br>";
    //echo $_SESSION['bd'];
    echo "<a href=\"logout\" class=\"col-6 bigButton\"><h3>Logout</h3></a>";
} else {
    echo "
       <div class=\"fb-login-button\" data-size=\"large\" data-show-faces=\"false\" 
       data-auto-logout-link=\"false\" perms=\"birthday,email\" onlogin=\"checkLoginState();\"></div>
    ";
}
echo "</header>";
?>