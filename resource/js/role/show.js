var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');


    var roleList = new Map();
    function getRole() {

        $.ajax({

            url: base_url+'role',

            type: 'GET',

            dataType: 'json',

            headers: {
                "Authorization": token
            },

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            roleList.set(response.data[i].id, response.data[i]);
                        }
                        showList(roleList);

                    }

                }

            }

        });
    }
    getRole();


    function showList(list) {

        $('#roleTable').dataTable().fnDestroy();
        $('#roleList').empty();
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
                            <td>` + status + `</td>
                            <td> <a href="#" onclick="getRoles(` + roles.id + `)" title="Update Role" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> </td>
                    </tr>
                    `;
        }

        $('#roleList').html(tblData);
        $('#roleTable').DataTable();
    }


    function getRoles(id) {
        $.ajax({

            url: base_url+'role/' + id,

            type: 'GET',
            headers: {
                "Authorization": token
            },

            dataType: 'json',

            success: function (response) {
//                console.log(response);

                if (response.status == 200) {
                    $('#id').val(id);
                    $('#role').val(response.data.role);
                    (response.data.is_active == 1) ? $("#active").attr('checked', 'checked') : $("#inactive").attr('checked', 'checked');

                    $('#myModal1').modal('toggle');

                }

            }

        });
    }




    $('#addRole').click(function () {
        $('#myModal1').modal('toggle');
        $("#addRoleForm").trigger("reset");
        $('#id').val('');
    });
