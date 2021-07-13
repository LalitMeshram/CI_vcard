<script>

    $('#addRoleForm').on('submit', function (e) {

        e.preventDefault();

        var returnVal = $("#addRoleForm").valid();
        var formdata = new FormData(this);
        if (returnVal) {
            $.ajax({

                url: 'role',

                type: 'POST',

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

                        swal("Good job!", response.msg, "error");

                    }

                }

            });
        }
    });



</script>