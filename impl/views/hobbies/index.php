
<?php
	require_once 'views/header.php'; 
?>

<main class="col-10 col-m-10" style="margin-left: 9%;">
	<div class="leftBar">
		<div class="nav">
				<ul>
					<?php
					foreach($hobbies as $hobby){
						echo '<li><a href="#">'.$hobby->getTitle().'</a></li>';
					}
					?>
					
				</ul>
		</div>
	</div>
<div class="section">
	<div class="articlePreview">
		<div class="articleImage"><img src="resources/images/csgo.jpg" alt="Mountain View" 	></div>
		<div class="rating">Rating</div>
			<h3 class="articlePreviewContent">An arcade game or coin-op is a coin-operated entertainment machine typically installed in public businesses such as restaurants, bars and amusement arcades.
			Most arcade games are video games, pinball machines, electro-mechanical games, redemption games or merchandisers..</h3>
		<a href="#" class="gotoBtn"><h3>Read more</h3></a>
	</div>
	
</div>
</main>

<?php 
	require_once 'views/footer.php';
?>


