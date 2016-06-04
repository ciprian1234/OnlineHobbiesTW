<?php require_once 'views/header.php' ?>

<main class="col-m-10 col-10" style = "margin-left:9%">

    <div class="heading">
        <h1 class="heading"> Categories </h1>
        <p>All hobbies in organised in categories</p>
    </div>

	<ul class="category-container">
	
		<?php
		foreach($categories as $category){
		    echo '<li class="col-m-10 col-3 item_box">
			<a class="category-link" href="'.URL.'hobbies/index/'.$category->getId_category().'">
				<h5 class="category-title">'.$category->getTitle().'</h5>
				<img class="category-icon" alt="Games" src="../../impl/'.$category->getImage().'">
            </a>
            </li>';
		}
        ?>   
	</ul>

	</main>


<?php require_once 'views/footer.php' ?>