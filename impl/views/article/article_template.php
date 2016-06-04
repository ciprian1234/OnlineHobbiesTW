<?php
include '/views/header.php';
?>


<main class="col-10 col-m-10 mainPage">


  <div class="col-11 article">
	  <img class="col-3 col-m-5 articleImage" src="../impl/public/images/cpp.png" alt="Mountain View" />
	  <h2>Article</h2>
	  <h3>Rating</h3>
	  <h3>Alte informatii</h3>
	  <p>
	  Nota IMDB *: 7.9
	  Regia : László Nemes
	  Durata : 107 min
	  Filmul unguresc Son of Saul castigator a numeroase premii, 
	  inclusiv a unui Oscar la categoria film stain, aduce pe ecrane o frantura din
	   viata unui membru al Sonderkommando, adica a unui prizonier al lagarului de exteminare Auschwitz a carui menire era, alaturi de alti osanditi, sa mentina in functiune crematoriile, fabricile mortii in care milioane de suflete si-au gasit sfarsitul. In vartejul ororilor si al anormalului la care este martor in fiecare zi, Saul decide sa salveze de la incinerare unu baiat, presupusul sau fiu si sa ii ofere o inmormantare normala. Un film dureros, greu digerabil, ce aminteste despre crimele odioase ale unui regim dement petrecute in lagare precum Auschwitz. Vizionare placuta!
	   </p>

	   <p>
	  Nota IMDB *: 7.9
	  Regia : László Nemes
	  Durata : 107 min
	  Filmul unguresc Son of Saul castigator a numeroase premii, 
	  inclusiv a unui Oscar la categoria film stain, aduce pe ecrane o frantura din
	   viata unui membru al Sonderkommando, adica a unui prizonier al lagarului de exteminare Auschwitz a carui menire era, alaturi de alti osanditi, sa mentina in functiune crematoriile, fabricile mortii in care milioane de suflete si-au gasit sfarsitul. In vartejul ororilor si al anormalului la care este martor in fiecare zi, Saul decide sa salveze de la incinerare unu baiat, presupusul sau fiu si sa ii ofere o inmormantare normala. Un film dureros, greu digerabil, ce aminteste despre crimele odioase ale unui regim dement petrecute in lagare precum Auschwitz. Vizionare placuta!
	   </p>

	   <p>
	  Nota IMDB *: 7.9
	  Regia : László Nemes
	  Durata : 107 min
	  Filmul unguresc Son of Saul castigator a numeroase premii, 
	  inclusiv a unui Oscar la categoria film stain, aduce pe ecrane o frantura din
	   viata unui membru al Sonderkommando, adica a unui prizonier al lagarului de exteminare Auschwitz a carui menire era, alaturi de alti osanditi, sa mentina in functiune crematoriile, fabricile mortii in care milioane de suflete si-au gasit sfarsitul. In vartejul ororilor si al anormalului la care este martor in fiecare zi, Saul decide sa salveze de la incinerare unu baiat, presupusul sau fiu si sa ii ofere o inmormantare normala. Un film dureros, greu digerabil, ce aminteste despre crimele odioase ale unui regim dement petrecute in lagare precum Auschwitz. Vizionare placuta!
	   </p>
  </div>



<form class="articleForm" action="submit_post.php" method="post">

    <div>
        <label class="col-3">Name:</label>
        <input class="col-10 col-m-10 formItem" type="text" name="title" placeholder="Please enter article title..." size="50" maxlength="50">
    </div>

    <div>
        <label class="col-3">Email:</label>
        <input class="col-10 col-m-10 formItem" type="text" name="title" placeholder="Please enter article title..." size="50" maxlength="50">
    </div>
   
    <div>
        <label class="col-3">Comment:</label>
        <textarea class="col-10 col-m-10 formItem" name="content" rows="20" placeholder="Please enter article content..."></textarea>
    </div>

    <input class="formButton col-2 col-m-5" type="submit" name="submit" value="Submit Comment">
    <input class="formButton col-2 col-m-5" type="reset">
</form>

</main>
<?php
include '/views/footer.php';
?>
