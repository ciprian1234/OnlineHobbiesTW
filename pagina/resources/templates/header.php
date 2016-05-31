<?php
/**
 * Created by PhpStorm.
 * User: donic
 * Date: 5/25/2016
 * Time: 2:50 PM
 */
    echo "<header class=\"col-m-10 col-10\">
    <ul class=\"category\">
        <li class=\"col-m-2 col-2 menuButton\"> <a href=\"index.php\">Home</a> </li>
        <li class=\"col-m-2 col-2 menuButton\"> <a href=\"index.php\">Categories</a>
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


    <a href=\"#\" class=\"col-6 bigButton\"><h3>Sign in</h3></a>
</header>";
?>