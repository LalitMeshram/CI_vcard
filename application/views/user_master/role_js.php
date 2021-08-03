<?php
$session_data = $this->session->userdata('loginSession');
?>
<script>
    var roles = new Map();
    function getRoleData() {

        $.ajax({

            url: '<?php echo base_url();?>role',

            
            type: 'GET',
            
            headers: {
                "Authorization": "<?php echo $session_data['token']; ?>"
            },
                    
            async:false,
            
            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {

                        for (var i = 0; i < response.data.length; i++) {
                            roles.set(response.data[i].id, response.data[i]);
                        }
//                        console.log(roles);
                        showRoleList(roles);

                    }

                }

            }

        });

    }
    getRoleData();


    function showRoleList(list) {
        var option = '<option value="0">Select</option>';
        for (let k of list.keys()) {
            let role = list.get(k);
//            if(role.id != 1 && role.is_active==1){
            option += `<option value='` + role.id + `'>` +(role.id+`-`+role.role) + `</option>`;
//            }
        }
        $('#role_id').html(option);

    }
    
    $('#role_id').change(function() {
            var id=$('#role_id').val();
            if(id!=0){
            $.ajax({

            url: '<?php echo base_url();?>profileasperRole/'+id,

            type: 'GET',
            
            headers: {
                "Authorization": "<?php echo $session_data['token']; ?>"
            },
            
            async:false,
            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        var option='';
                        for (var i = 0; i < response.data.length; i++) {
                        var    profile=response.data[i];
                             option += `<option value='` + profile.id + `'>` +(profile.id+`-`+profile.title) + `</option>`
                        }
                        $('#profile_id').html(option);

                    }

                }

            }

        });
    }else{
        $('#profile_id').html('<option></option>');
         $("#profile_id").prop('disabled', true);
    }
        });
   
    
    </script>