var request;
$("#contact-form").submit(function(event) {
    // alert("submit form");
    event.preventDefault();
    if (request) {
        request.abort();
    }

    var $form = $(this),
        $inputs = $form.find("input"),
        serializedData = $form.serialize(),
        actionURL = $form.attr('action'),
        $email = $('input[name="email"]');

    $inputs.prop("disabled", true);

    request = $.ajax({
        url: actionURL,
        type: "post",
        data: serializedData
    })

    $('.form-group .has-error.alert').hide();

    // validation
    if ($email.val() === '')
    {
        console.log("error");


        if ($email.val() === '') {
            $('.form-group').find('.has-error').show();
        }

    } else {
        request.done(function (response, textStatus, jqXHR){
            console.log("response: "+response);
            if (response == "success")
            {
                $('.form-group').hide();
                $('.error-send').hide();
                $('.sucess-send').show();
            } else
            {
                $('.error-send').show();
            }

        });
    }

    request.fail(function (jqXHR, textStatus, errorThrown){
        $('.error-send').show();
        /*// console.error(
            "The following error occured: "+
            textStatus, errorThrown
        );*/
    });

    request.always(function () {
        $inputs.prop("disabled", false);
    });

    event.preventDefault();
});