jQuery(document).ready(function($) {

    $(document).on('blur', '#phonenumber', function(event) {
        if($(this).val().trim().length)
        {
            if (validatePhone('phonenumber')) {
                $this=$(this);
                Ajaxdata.phonenumber=$this.val();
                $.post(base_url+'auth/check_phone', Ajaxdata,
                function(data, textStatus, xhr) {
                    if(data!="not_found")
                    {
                        $this.next('span.error').html("This Contact number is already in use");
                    }else{
                        $this.next('span.error').empty();
                    }
                });
            }
            else {
                $(this).next('span.error').html('Please add valid phone number');
            }
        }else{
            $(this).next('span.error').empty();
        }
    });

    $(document).on('blur', '#email_id', function(event) {
        if($(this).val().trim().length)
        {
            $this=$(this);
            if(!IsEmail($this.val())){
                $(this).next('span.error').html("Please Enter the valid email address");
            }else{
                if($this.val().length){
                    Ajaxdata.email_id=$this.val();
                    $.post(base_url+'auth/check_email', Ajaxdata,
                    function(data, textStatus, xhr) {
                        if(data!="not_found")
                        {
                            $this.next('span.error').html("This Email Address is already in use");
                        }else{
                            $this.next('span.error').empty();
                        }
                    });
                }else{
                    console.log("fail case");
                }
            }
        }else{
            $(this).next('span.error').empty();
        }
    })
});




function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function isNumber(evt) 
{
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
    }
    return true;
}

//indian phone validator
function validatePhone(txtPhone) {
    var a = document.getElementById(txtPhone).value;
    var filter = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
    if (filter.test(a)) {
        return true;
    }
    else {
        return false;
    }
}