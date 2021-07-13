<script>

    $('#addServiceForm').on('submit', function (e) {

        e.preventDefault();

        var returnVal = $("#addServiceForm").valid();
        var formdata = new FormData(this);
        if (returnVal) {
            $.ajax({

                url: 'service',

                type: 'POST',

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
        }
    });



</script>