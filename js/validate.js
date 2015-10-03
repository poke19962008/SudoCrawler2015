$(document).ready(function(){
    $("#submit").attr("disabled","disabled");
    //Username at login
    $("#login").keyup(function(){
        var ival=$(this).val();
        var regex=/^[A-Za-z][A-Za-z0-9]+$/;
        if(!regex.test(ival))
        {
            $.fn.report('#uerror','Not a valid username. Must start with an alphabet.','red');
        }
        else
        {
            $.fn.report('#uerror','Looks Cool','green');
        }
    });

    //First name
    $("#firstName").keyup(function(){
        var ival=$(this).val();
        var regex=/([a-zA-Z]{3,30}\s*)+/;
        if(!regex.test(ival))
        {
            $.fn.report('#ferror','Enter only name.','red');
        }
        else
        {
            $.fn.report('#ferror','Welcome '+ival.toUpperCase(),'green');
        }
    });

    //Last Name
    $("#email").keyup(function(){
        var emailAddress=$(this).val();
        function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
        return pattern.test(emailAddress);
        if( !isValidEmailAddress( emailAddress ) ) { $.fn.report('#emailerror','Enter valid email','red'); }
     };
       
       // if( !isValidEmailAddress( emailAddress ) ) { $.fn.report('#emailerror','Enter valid email','red'); }

        // var ival=$(this).val();
        // var regex=/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
        // if(regex.test(ival))
        // {
        //     $.fn.report('#lerror','Enter valid email.','red');
        // }
        // else
        // {
        //     $.fn.report('#lerror','','green');
        // }
    });

    //Username at regsister
    $("#username").keyup(function(){
        var ival=$(this).val();
        var regex=/^[A-Za-z][A-Za-z0-9]+$/;
        if(!regex.test(ival))
        {
            $.fn.report('#uererror','Not a valid username. Must start with an alphabet.','red');
        }
        else
        {
            $.fn.report('#usererror','Looks Cool','green');
        }
    });

    $("#password").keyup(function(){
        var ival=$(this).val();
        var regex=/^[a-zA-Z0-9]{8,}$/;
        if(!regex.test(ival))
        {
            $.fn.report('#uererror','Not a valid username. Must start with an alphabet.','red');
        }
        else
        {
            $.fn.report('#usererror','Looks Cool','green');
        }
    });



    $.fn.report=function(location,msg,color){
        
        $(location).html(msg).css({'color':color});
        $(location).slideDown(400);
    }

    $('form .grid_5 > input').keyup(function() {
        var empty = false;
        $('form .grid_5 > input').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });

        if (empty) {
            $('#submit').attr('disabled', 'disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
        } else {
            $('#submit').removeAttr('disabled'); // updated according to http://stackoverflow.com/questions/7637790/how-to-remove-disabled-attribute-with-jquery-ie
        }
    });

});