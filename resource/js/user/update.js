var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');

$('#updateUserForm').on('submit', function (e) {

    e.preventDefault();

    var formdata = new FormData(this);

    $.ajax({

        url: base_url+'user',

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
                $('#updateUserForm').modal('toggle');

                swal("Good job!", response.msg, "success");
                location.reload();

            } else {

                swal("Good job!", response.msg, "error");

            }

        }

    });

});

