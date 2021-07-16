<script>

    $('#addActivityForm').on('submit', function (e) {

        e.preventDefault();

        var returnVal = $("#addActivityForm").valid();
        var formdata = new FormData(this);
        if (returnVal) {
            $.ajax({

                url: 'activity',

                type: 'POST',

                data: formdata,

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
                        $('#myModal4').modal('toggle');
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