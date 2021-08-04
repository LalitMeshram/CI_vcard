var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');

    var profileList = new Map();
    getRole();
    function getUser() {
        $.ajax({

            url: base_url+'profile',

            type: 'GET',
            headers: {
                "Authorization": token
            },

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            profileList.set(response.data[i].id, response.data[i]);
                        }
                        showList(profileList);

                    }

                }

            }

        });
    }
    getUser();


    function showList(list) {

        $('#profileTable').dataTable().fnDestroy();
        $('#profileList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let roles = list.get(k);
            switch (roles.is_active) {
                case '1':
                    status = '<span class="badge badge-pill badge-primary">Active</span>';
                    break;

                case '0':
                    status = '<span class="badge badge-pill badge-danger">Inactive</span>';
                    break;

            }

            tblData += `
            <tr>
                    <td>` + roles.id + `</td>
                    <td>` + roles.role + `</td>
                    <td>` + roles.title + `</td>
                    <td>` + status + `</td>
                    <td> <a href="#" onclick="getUsers(` + roles.id + `)" title="Update Profile" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a>&nbsp;&nbsp;  <a href="#" onclick="getPermission('` + roles.id + `')" title="Permission List" ><i class="mdi mdi-account-key" style="font-size: 20px;"></i></a> </td>
            </tr>
            `;
        }

        $('#profileList').html(tblData);
        $('#profileTable').DataTable();
    }


    function getUsers(id) {
        $.ajax({

            url: base_url+'profile/' + id,

            type: 'GET',
            headers: {
                "Authorization": token
            },

            dataType: 'json',

            success: function (response) {
                //                console.log(response);

                if (response.status == 200) {
                    $('#id').val(id);
                    $('#role_id').val(response.data.role_id);
                    $('#title').val(response.data.title);
                    (response.data.is_active == 1) ? $("#active").attr('checked', 'checked') : $("#inactive").attr('checked', 'checked');

                    $('#myModal5').modal('toggle');

                }

            }

        });
    }

    function getPermission(id) {
        $.ajax({

            url: base_url+'activity',
            type: 'GET',
            async:false,
            headers: {
                "Authorization": token
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
                    $('#profileId').val(id);
                    $('#permissionModal').modal('toggle');

                }

            }

        });

//        -----------------------------------------------------------------
        $.ajax({

            url: base_url+'profilePermission/'+id,

            type: 'GET',
            headers: {
                "Authorization": token
            },
            async:false,
            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {
                    var data=response.data;
                    
                        for (var i = 0; i < data.length; i++) {
                            if(data[i]._view==1){
                                $('#viewbox_'+data[i].activity_id).prop('checked', true);
                            }
                            if(data[i]._create==1){
                                $('#createbox_'+data[i].activity_id).prop('checked', true);
                            }
                            if(data[i]._update==1){
                                $('#updatebox_'+data[i].activity_id).prop('checked', true);
                            }
                            if(data[i]._delete==1){
                                $('#deletebox_'+data[i].activity_id).prop('checked', true);
                            }
                            if(data[i].permissionBtn==1){
                                $('#permissionbox_'+data[i].activity_id).prop('checked', true);
                            }
                        }
                }

            }

        });


    }




    $('#addProfile').click(function () {
        $('#myModal5').modal('toggle');
        $("#addProfileForm").trigger("reset");
        $('#id').val('');
    });

    function getRole() {


        $.ajax({

            url: base_url+'role',

            type: 'GET',

            headers: {
                "Authorization": token
            },

            async: false,

            dataType: 'json',

            success: function (response) {

                if (response.status == 200) {
                    var userlistData = '';
                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            userlistData += `<option value="` + response.data[i].id + `"> ` + response.data[i].role + ` </option>`;
                        }

                    }
                    $('#role_id').html(userlistData);
                }

            }

        });

    }

