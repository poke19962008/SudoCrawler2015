$(document).ready(function(){
    $("#submit").attr("disabled","disabled");
    $("#confpassword").attr("disabled", "disabled");
});
    var name_flag = false;
    $("#name").keyup(function(){
        var ival=$(this).val();
        var regex=/([0-9$`~!@#%^&*()_\-+=\[\]\{\}\\\|:;'"/?.>,<])+/;

        if(regex.test(ival) || ival.length < 3){ $.fn.report('#ferror','Enter only alphabets and more than 3characters.','red');name_flag=false;}
        else{$.fn.report('#ferror','Welcome '+ival.toUpperCase(),'green');name_flag=true;}
    });

    var email_check = false;
    $("#mail").on('keyup', function(){
        var emailAddress=$(this).val();
        var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.÷|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);

        if( !pattern.test(emailAddress)) {$.fn.report('#emailerror','Enter valid email','red');email_check = false;
        }else{$.fn.report('#emailerror','Looks Cool!','green');email_check = true;}
    });

    var username_flag = false;
    $("#username").keyup(function(){
        var ival=$(this).val();
        var regex=/^[A-Za-z][A-Za-z0-9]+$/;

        if(!regex.test(ival)){$.fn.report('#usererror','Not a valid username. Must start with an alphabet and rest must be alphabets or number only.','red'); username_flag=false;}
        else{$.fn.report('#usererror','Looks Cool!','green');username_flag=true;}
    });

    var passlength = 1;             //Testing purpose. CHANGE TO '6'
    var password_flag = false;
    $("#password").keyup(function(){
        var ival=$(this).val();
        var regex=/^[a-zA-Z0-9]{8,}$/; // Do we need regex on this??

        if($(this).val().length < passlength){$.fn.report('#passworderror','Password must be atlest 6.','red');}
        else{$.fn.report('#passworderror','Looks Cool!','green');$("#confpassword").removeAttr("disabled");}
    });

   $("#confpassword").keyup(function(){
        var passVal = $("#password").val();
        var confVal = $("#confpassword").val();

        if ((passVal == confVal) && (passVal.length >= passlength)){$.fn.report('#confpassworderror','Looks Cool!','green');password_flag = true;}
        else{$.fn.report('#confpassworderror','Password do not match.','red');password_flag = false;}
    });

    $.fn.report=function(location,msg,color){

        $(location).html(msg).css({'color':color});
        $(location).slideDown(400);
    }

    $('form .grid_5 > input').keyup(function() {
        if(username_flag && password_flag && email_check && name_flag) { $('#submit').removeAttr('disabled');}
        else{ $('#submit').attr('disabled', 'disabled');}
    });