<script>
    var profileList = new Map();
    getRole();
    function getUser() {
        $.ajax({

            url: 'profile',

            type: 'GET',

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
                            <td> <a href="#" onclick="getUsers(` + roles.id + `)" title="Update Profile" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> </td>
                    </tr>
                    `;
        }

        $('#profileList').html(tblData);
        $('#profileTable').DataTable();
    }


    function getUsers(id) {
        $.ajax({

            url: 'profile/' + id,

            type: 'GET',

            dataType: 'json',

            success: function (response) {
//                console.log(response);

                if (response.status == 200) {
                    $('#id').val(id);
                    $('#role').val(response.data.role);
                    $('#title').val(response.data.title);
                    (response.data.is_active == 1) ? $("#active").attr('checked', 'checked') : $("#inactive").attr('checked', 'checked');

                    $('#myModal5').modal('toggle');

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

            url: 'role',

            type: 'GET',

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
                    $('#role_id').html(userlistData);
                }

            }

        });

    }


</script>