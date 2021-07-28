<?php
$session_data = $this->session->userdata('loginSession');
?>
<script>

    $('#updateUserForm').on('submit', function (e) {

        e.preventDefault();
        
        var formdata = new FormData(this);

        $.ajax({

            url: '<?php echo base_url();?>user',

            type: 'POST',
            
            headers: {
                "Authorization": "<?php echo $session_data['token']; ?>"
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

</script>