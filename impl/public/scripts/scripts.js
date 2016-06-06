/**
 * Created by donic on 6/6/2016.
 */
$(document).ready(function(){

    $('.hobbySubcategory').hover(function(){
       $(this).parent().next().show();
    },function(){
       $(this).parent().next().hide();
    });

});
$(document).ready(function() {
    // Hide all dropdowns initially.
    $('.dropdown').hide();

    // Bind click event
    $('.image-holder').click(function() {
        $(this).children('.dropdown').slideToggle('slow');
    });
});