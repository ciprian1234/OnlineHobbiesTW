<?php
require 'views/header.php';
?>
<script type="text/javascript">
    function hobbiesDropdown(s1, s2) {
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        s2.innerHTML = "";
        var optionArray = [];
        optionArray.push(" ");
        var ar2 = [" "];
        var ar3 = [" "];
        <?php foreach($hobbies as $hobie){
        ?>
        optionArray.push("<?php echo $hobie->getId_category();?>");
        ar2.push("<?php echo $hobie->getTitle(); ?>");
        ar3.push("<?php echo $hobie->getId_hobby(); ?>")
        <?php } ?>

        //document.write(2)
        //document.write(optionArray);
        var i = -1;


        for (var option in optionArray) {
            i++;
            //document.write(optionArray[option]);
            //document.write(s1.value);

            if (optionArray[option].localeCompare(s1.value) == 0) {

                var newOption = document.createElement("option");
                newOption.value = ar3[i];
                newOption.id = ar3[i];
                newOption.innerHTML = ar2[i];
                s2.options.add(newOption);
            }


        }

    }
</script>
<main class="col-m-10 col-10 mainPage">
    <div class="heading">
        <h1 class="heading"> Create your own article </h1>
        <p>Fill up these fields and press 'Submit' button when you're done...</p>
    </div>
    <div class="col-1-offset articleCreationDiv">
        <form class="articleForm" action="<?php echo URL . 'user/submitArticle'; ?>" method="post"
              enctype="multipart/form-data">
            <label class="col-1 col-m-3">Category:</label>
            <?php
            //var_dump($categories);
            echo '<select class="col-3 selectDropdown" id="category" name="category" onchange="hobbiesDropdown(\'category\',\'hobby\')">';
            echo '<option value="">Default</option>';
            foreach ($categories as $category)
                echo '<option value="' . $category->getId_category() . '">' . $category->getTitle() . '</option>';
            echo '</select>';
            ?>
            <select class="selectDropdown" id="hobby" name="hobby"></select>
            <div>
                <label class="col-1 col-m-1" for="title">Article title:</label>
                <input class="col-5 col-m-5 formItem selectDropdown" type="text" name="title" id="title"
                       placeholder="Please enter article title..." size="50" maxlength="50">
            </div>

            <div>
                <label class="col-2 col-m-1">Article image:</label>
                <input class="col-6 col-m-7" type="file" name="image">
            </div>

            <div>
                <label class="col-3" for="articleContent">Article content:</label>
                <textarea class="col-10 col-m-10 formItem descriptionArea selectDropdown" id="articleContent" name="content" rows="15"
                          placeholder="Please enter article content..."></textarea>
            </div>

            <input class="formButton col-2 col-m-7" type="submit" name="submit" value="Submit Article">
            <input class="formButton col-2 col-m-7" type="reset">
        </form>
    </div>
</main>

<?php
include 'views/footer.php';
?>