<?php
require_once 'views/header.php';
?>

<main class="col-10 col-m-10 mainPage">
    <div class="section">


        <h1>User Profile</h1>
        <h2>Add hobby to preferences</h2>
        <button class="toggleButton">Add a new hobby</button>
        <div class="col-3-offset col-7 col-m-7 toggleDiv">
            <form class="articleForm" action="<?php echo URL . 'hobbies/addPreference'; ?>" method="post"
                  enctype="multipart/form-data">
                <div>
                    <label class="col-2 col-m-1">Select hobby:</label>
                    <?php
                    echo '<select class="col-2 col-m-2 selectDropdown" id="hobby" name="hobby">';
                    echo '<option value=""></option>';
                    foreach ($articles as $hobby)
                        echo '<option value="' . $hobby->getId_hobby() . '">' . $hobby->getTitle() . '</option>';
                    echo '</select>';
                    ?>
                    <input class="col-6 col-m-6 selectDropdown" type="text" name="motiv"
                           placeholder="Motivul pentru care iti place acest hobby">
                    <div class="col-10 dummy"></div>
                    <div class="col-1"></div>
                    <label class="col-3 col-m-2">Share to facebook</label>
                    <input class="col-1 col-m-1 checkBox" type="checkbox" name="shareToFacebok" id="shareToFacebook">
                    <input class="col-3 col-m-7 formButton" type="submit" name="submit" value="Add to preferences">
                </div>

            </form>
        </div>

        <button class="toggleButton">Your hobbies</button>
        <div class="col-4-offset col-6 col-m-7 toggleDiv">
            <ul>
                <?php
                foreach ($hobbies as $hobby) {
                    echo '<li class="hobbyListed">';

                    echo '<div class="col-10 dummy"></div>';
                        echo '<div class="col-2">';
                        echo '<img style="border:1px solid #ccc;" src="' . URL . $hobby->getImage() . '" width="40px" height="40px">';
                        echo '</div>';
                                echo '<h3 class="col-3">' . $hobby->getTitle() . '</h3>';
                                echo '<a class="col-4 col-m-4 deleteButton" href="' . URL . 'hobbies/deletePreference/' . $hobby->getId_hobby() . '">X</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</main>

<?php
require_once 'views/footer.php';
?>


