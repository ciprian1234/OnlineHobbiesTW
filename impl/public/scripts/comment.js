/**
 * Created by donic on 6/5/2016.
 */
$(document).ready(function(){

    $('.formButton').click(function(e) {

        e.preventDefault();

        /* Sending the form fileds to submit.php: */
        $.ajax({
            type: "post",
            url: "submitComment.php",
            data: $(".articleForm").serialize(),
            success: function (response) {

                alert(response);
                $('.formButton').val('Working..');
            },
            error: function () {
                alert("EROARE MUITE");
            }
        })

    });

});
    /* Listening for the submit event of the form: */
    /*$('.articleForm').submit(function(e){

        e.preventDefault();
        if(working) return false;

        working = true;
        $('.formButton').val('Working..');
        $('span.error').remove();

        /!* Sending the form fileds to submit.php: *!/
        $.post('submitComment.php',$(this).serialize(),function(msg){
            if(msg.status){
                $('.formButton').val('Got it.');
                /!*
                 /	If the insert was successful, add the comment
                 /	below the last one on the page with a slideDown effect
                 /!*!/
                $(msg.html).hide().insertBefore('#articleForm').slideDown();
            }
            else {
                $('.formButton').val('Some error.');
                /!*
                 /	If there were errors, loop through the
                 /	msg.errors object and display them on the page
                 /!*!/

                $.each(msg.errors,function(k,v){
                    $('label[for='+k+']').append('<span class="error">'+
                        v+'</span>');
                });
            }
        },'json');
    });
*/