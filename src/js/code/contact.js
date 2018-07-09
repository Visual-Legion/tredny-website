/* Cookie */

var contact = {
    aFunction: function(name, value) {}
};

(function(root, $, undefined) {
"use strict";

$(() => {

    var form_error_msg = "Some fields have issues, please check the fields above.";

    var tdny_required_msg = "This field is required!";


    //  ADD MAILCHIMP ? MAYBE NOT A FIRST AS WE DONT WANT TO ADD CHECKBOX SAYING WE'RE COLLECTING INFO

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function isEmptyString(string) {
        return string == '' || string == null;
    }

    function validateRequiredField(element) {
        if (isEmptyString(element.val())) {
            console.log('this field is required!');
            element.next().text(tdny_required_msg);
            return false;
        } else {
            return true;
        }
    }

    function areRequiredFieldsEmpty() {
        var required_fields = $('input[required=required],textarea[required=required]');
        var valid = true;
        Array.prototype.forEach.call(required_fields, element => {
            if (!validateRequiredField($(element))) {
                valid = false;
            }
        });
        return valid;
    }

    //we're assuming there is only one form... we could adapt to find elements in given form
    function isFormValid() {
        return areRequiredFieldsEmpty();
    }


    $("input, textarea").keyup(e => {
        // console.log('change', $(e.currentTarget));

        var current_element = $(e.currentTarget);

        //Is this field required and does it have text
        if (current_element.prop('required')) {
            validateRequiredField(current_element)
        }

        if (current_element.attr('type') == 'email') {
        }
    });

    $('#contactbutton').click(function() {
        //  ADD BACK WHEN TESTING DONE

        if (!isFormValid()) {
            $('#contact-msg').html(form_error_msg);
            return false;
        } else {
            $('#contact-msg').html('<img src="http://mailgun.github.io/validator-demo/loading.gif" alt="Loading...">');
            // $.ajax({
            //     type: "GET",
            //     url: 'http://apilayer.net/api/check',
            //     data: {
            //         access_key: 'c673ff585d5fa454aa388487d9b7ef7c',
            //         email: email,
            //         smtp: 1,
            //         format: 0
            //     },
            //     dataType: "json",
            //     crossDomain: true,
            //     success: function(data, status_text) {
            //         if (data['format_valid' && !data['disposable']) {
            //             if (data['did_you_mean']) {
            //                 $('#contact-msg').html('Error, did you mean <em>' + data['did_you_mean'] + '</em>?');
            //                 return false;
            //             } else if (!data['mx_found']) {
            //                 $('#contact-msg').html('The entered mail address is invalid.');
            //                 return false;
            //             } else {
            $.ajax({
                type: 'POST',
                url: ajax_object.ajax_url,
                data: $('#contactform').serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        $('#contactform')[0].reset();
                    }
                    $('#contact-msg').html(response.errmessage);
                }
            });
            // }

        //         } else {
        //             $('#contact-msg').html('The entered mail address is invalid.');
        //             return false;
        //         }
        //     },
        //     error: function(request, status_text, error) {
        //         $('#contact-msg').html('Error occurred, unable to validate your email address.');
        //         return false;
        //     }
        // });
        }
    });

});
})(undefined, jQuery);

module.exports = {
    contact
};