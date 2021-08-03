<?php
$session_data = $this->session->userdata('loginSession');
?>
<script>
    var userList = new Map();
    function getUser() {
        $.ajax({

            url: '<?php echo base_url(); ?>user',

            type: 'GET',

            headers: {
                "Authorization": "<?php echo $session_data['token']; ?>"
            },

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            userList.set(response.data[i].id, response.data[i]);
                        }
                        showList(userList);

                    }

                }

            }

        });
    }
    getUser();


    function showList(list) {

        $('#userTable').dataTable().fnDestroy();
        $('#userList').empty();
        var tblData = '', status;
        var image = '';
        for (let k of list.keys()) {
            let users = list.get(k);
            switch (users.is_active) {
                case '1':
                    status = '<span class="badge badge-pill badge-success">Active</span>';
                    break;

                case '0':
                    status = '<span class="badge badge-pill badge-danger">Inactive</span>';
                    break;

            }
            (users.profile_image != null) ? (image = "<?php echo base_url(); ?>" + users.profile_image) : (image = "<?php echo base_url(); ?>" + 'resource/images/avatar-custom.png');


            tblData += ` <tr>
                                            <td>` + users.id + `</td>
                                            <td>` + users.role + `</td>
                                            <td>

                                                <div class="media align-items-center">


                                                    <a class="avatar avatar-lg ` + ((users.is_active == 1) ? `status-success` : `status-danger`) + `" href="#">
                                                        <img src="` + image + `" alt="` + users.business_name + `">
                                                    </a>

                                                    <div class="media-body">
                                                        <p>
                                                            <a href="#"><strong class="h6">` + users.first_name + ' ' + users.middle_name + ' ' + users.last_name + `</strong></a>
                                                            
                                                        </p>
                                                        <p><strong class="">` + users.business_name + `</strong><small class="sidetitle">` + users.designation + `</small></p>
                                                        <p><strong class="">Phone1:</strong> ` + users.phone1 + ` | <strong>Phone2:</strong> ` + users.phone2 + `</p>
                                                        <p> <strong class="">Email:</strong> ` + users.email_id + ` </p>
                                                        <nav class="nav mt-2">
                                                            <a class="nav-link" href="#"><i class="fa fa-facebook"></i></a>
                                                            <a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
                                                            <a class="nav-link" href="#"><i class="fa fa-github"></i></a>
                                                            <a class="nav-link" href="#"><i class="fa fa-linkedin"></i></a>
                                                        </nav>
                                                                            <hr>
                                                               <p><small>Created By:` + users.creator_fname + ' ' + users.creator_lname + `-` + users.created_at + `</small></p>             
                                                               <p><small>Owner By:` + users.agent_fname + ' ' + users.agent_lname + `</small></p>             
                                                    </div>
                                            </td>
                                            <td>` + users.next_renewal_date + `</td>
                                            <td>` + status + `</td>
                                            
                                            <td>
                                                <a href="#" onclick="getUsers('` + users.id + `');" title="Edit"><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a>&nbsp;&nbsp;  <a href="#" onclick="getPermission('` + users.id + `')" title="Permission List" ><i class="mdi mdi-account-key" style="font-size: 20px;"></i></a>



                                            </td>
                                        </tr>`;
        }

        $('#userList').html(tblData);
        $('#userTable').DataTable();
    }


    function getUsers(id) {
        localStorage.myMap = JSON.stringify(Array.from(userList.entries()));
        window.location.replace("update-form/" + id);
    }
    
    
    
        function getPermission(id) {
        $.ajax({

            url: '<?php echo base_url(); ?>activity',
            type: 'GET',
            async:false,
            headers: {
                "Authorization": "<?php echo $session_data['token']; ?>"
            },
            dataType: 'json',
            success: function (response) {

                var tableData = '';
                if (response.status == 200) {
                    var data = response.data;
                    for (var i = 0; i < data.length; i++) {
                        tableData += `
                            <tr>
                                        <td>` + data[i].id + `</td>
                                        <td>` + data[i].activity_title + `</td>
                                            <td>
                                            <div class="controls">
                                                <input type="checkbox" id="viewbox_` + data[i].id + `" required value="1">
                                                <label for="viewbox_` + data[i].id + `"></label>
                                            </div>								
                                        </td>
                                        <td>
                                            <!--<div class="form-group">-->
                                            <div class="controls">
                                                <input type="checkbox" id="createbox_` + data[i].id + `" required value="1">
                                                <label for="createbox_` + data[i].id + `"></label>
                                                    <input type="hidden" id="profileid_`+data[i].id+`">
                                                    <input type="hidden" id="userid_`+data[i].id+`">
                                            </div>								
                                            <!--</div>-->
                                        </td>

                                        <td>
                                            <div class="controls">
                                                <input type="checkbox" id="updatebox_` + data[i].id + `" required value="1">
                                                <label for="updatebox_` + data[i].id + `"></label>
                                            </div>								
                                        </td>
                                        <td>
                                            <div class="controls">
                                                <input type="checkbox" id="deletebox_` + data[i].id + `" required value="1">
                                                <label for="deletebox_` + data[i].id + `"></label>
                                            </div>								
                                        </td>
                                        <td>
                                            <div class="controls">
                                                <input type="checkbox" id="permissionbox_` + data[i].id + `" required value="1">
                                                <label for="permissionbox_` + data[i].id + `"></label>
                                            </div>								
                                        </td>
                                    </tr>
                        `;
                    }
                    $('#permissionData').html(tableData);
                    $('#userId').val(id);
                    $('#permissionModal').modal('toggle');

                }

            }

        });

//        -----------------------------------------------------------------
        $.ajax({

            url: '<?php echo base_url();?>userPermission/'+id,

            type: 'GET',
            headers: {
                "Authorization": "<?php echo $session_data['token']; ?>"
            },
            async:false,
            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {
                    var data=response.data;
                        for (var i = 0; i < data.length; i++) {
                            
                            $('#profileid_'+data[i].activity_id).val(data[i].profile_master_id);
                            $('#userid_'+data[i].activity_id).val(data[i].user_id);
                            
                            if(data[i]._create==1){
                                $('#createbox_'+data[i].activity_id).prop('checked', true);
                            }
                            if(data[i]._update==1){
                                $('#updatebox_'+data[i].activity_id).prop('checked', true);
                            }
                            if(data[i]._delete==1){
                                $('#deletebox_'+data[i].activity_id).prop('checked', true);
                            }
                            
                            
                        }
                }

            }

        });


    }




    $('#addUser').click(function () {
        $("#addUserForm").trigger("reset");
        $('#id').val('');
    });

</script>