<script>
    var roles = new Map();
    $("#profile_id").prop('disabled', true);
    function getRoleData() {

        $.ajax({

            url: 'role',

            async:false,
            
            type: 'GET',
            
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
            if(role.id != 1 && role.is_active==1){
            option += `<option value='` + role.id + `'>` +(role.id+`-`+role.role) + `</option>`;
            }
        }
        $('#role_id').html(option);

    }
    
    $('#role_id').change(function() {
            var id=$('#role_id').val();
            if(id!=0){
            $.ajax({

            url: 'profile/'+id,

            type: 'GET',
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
                        $("#profile_id").prop('disabled', false);

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