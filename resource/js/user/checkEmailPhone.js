var base_url = localStorage.getItem('url');
var token = localStorage.getItem('token');

$('#phone1').on('change', function () {
    var phone = this.value;
    var formdata = new FormData();
    formdata.append('user_id',phone);
    
    $.ajax({

            url: base_url+'checkUserId',

            type: 'POST',

            headers: {
                "Authorization": token
            },

            data: formdata,

            cache: false,

            contentType: false,

            processData: false,

            dataType: 'json',

            success: function (response) {
                if (response.status == 400) {
                    $('#errorPhone').html(response.msg); 
                    $("#addUserForm :input").prop("disabled", true);
                    $("#phone1").prop("disabled", false);
                    
                } 
                else{
                    $('#errorPhone').html(' ');
                    $("#addUserForm :input").prop("disabled", false);
                    $("#password").prop("disabled", true);
                    $("#email_id").prop("disabled", true);
                    $("#role_id").prop("disabled", true);
                    $("#profile_id").prop("disabled", true);
                    $("#agent_id").prop("disabled", true);
                }

            }

        });
    

});


$('#email_id').on('change', function () {
    var email = this.value;
    var formdata = new FormData();
    formdata.append('user_id',email);
    
    $.ajax({

            url: base_url+'checkUserId',

            type: 'POST',

            headers: {
                "Authorization": token
            },

            data: formdata,

            cache: false,

            contentType: false,

            processData: false,

            dataType: 'json',

            success: function (response) {
                if (response.status == 400) {
                    $('#errorEmail').html(response.msg); 
                    $("#addUserForm :input").prop("disabled", true);
                    $("#email_id").prop("disabled", false);
                    
                } 
                else{
                    $('#errorEmail').html(' ');
                    $("#addUserForm :input").prop("disabled", false);
                    $("#password").prop("disabled", true);
                    $("#phone1").prop("disabled", true);
                    $("#role_id").prop("disabled", true);
                    $("#profile_id").prop("disabled", true);
                    $("#agent_id").prop("disabled", true);
                }

            }

        });
    

});