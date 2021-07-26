<?php
$session_data = $this->session->userdata('loginSession');
?>
<script>

    $('#addRoleForm').on('submit', function (e) {

        e.preventDefault();

        var returnVal = $("#addRoleForm").valid();
        var formdata = new FormData(this);
        if (returnVal) {
            $.ajax({

                url: '<?php echo base_url();?>role',

                type: 'POST',
                
                headers: {
                "Authorization": "<?php echo $session_data['token'];?>"
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



</script>