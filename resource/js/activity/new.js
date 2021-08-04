var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');


    $('#addActivityForm').on('submit', function (e) {

        e.preventDefault();

        var returnVal = $("#addActivityForm").valid();
        var formdata = new FormData(this);
        if (returnVal) {
            $.ajax({

                url: base_url+'activity',

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
                        
                        swal("Good job!", response.msg, "success");
                        location.reload();

                    } else {

                        swal("Good job!", response.msg, "error");

                    }

                }

            });
        }
    });

