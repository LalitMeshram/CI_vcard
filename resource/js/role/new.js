var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');


$('#addRoleForm').on('submit', function (e) {

    e.preventDefault();

    var returnVal = $("#addRoleForm").valid();
    var formdata = new FormData(this);
    if (returnVal) {
        $.ajax({

            url: base_url+'role',

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
                if (response.status == 200) {
                    $('#myModal1').modal('toggle');
                    swal("Good job!", response.msg, "success");
                    location.reload();

                } else {

                    swal("Error", response.msg, "error");

                }

            }

        });
    }
});


