var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');


$('#updateServiceForm').on('submit', function (e) {

    e.preventDefault();

    var formdata = new FormData(this);

    $.ajax({

        url: base_url + 'service',

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
                $('#myModal3').modal('toggle');

                swal("Good job!", response.msg, "success");
                location.reload();

            } else {

                swal("Good job!", response.msg, "error");

            }

        }

    });

});

