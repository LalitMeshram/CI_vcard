<script>
    var userList = new Map();
    function getUser() {
        $.ajax({

            url: 'user',

            type: 'GET',

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
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let users = list.get(k);
            switch (users.is_active) {
                case '1':
                    status = '<span class="badge badge-pill badge-primary">Active</span>';
                    break;

                case '0':
                    status = '<span class="badge badge-pill badge-danger">Inactive</span>';
                    break;

            }

            tblData += `
                    <tr>
                            <td>` + users.id + `</td>
                            <td>` + users.role_id + `</td>
                            <td>` + users.business_name + `</td>
                            <td>` + users.first_name + `</td>
                            <td>` + users.email_id + `</td>
                            <td>` + users.phone1 + `</td>
                            <td>` + status + `</td>
                            <td> <a href="#" onclick="getUsers(` + users.id + `)" title="update User" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> </td>
                    </tr>
                    `;
        }

        $('#userList').html(tblData);
        $('#userTable').DataTable();
    }


    function getUsers(id) {
        $.ajax({

            url: 'user/' + id,

            type: 'GET',

            dataType: 'json',

            success: function (response) {
//                console.log(response);

                if (response.status == 200) {
                    $('#id').val(id);
                    $('#role_id').val(response.data.role_id);
                    $('#first_name').val(response.data.first_name);
                    $('#email_id').val(response.data.email_id);
                    $('#phone1').val(response.data.phone1);
                    $('#ucontact2').val(response.data.contact2);
                    $('#uaddress').val(response.data.address);
                    $('#uhighway').val(response.data.highway);
                    $('#ucity').val(response.data.city);
                    (response.data.is_active == 1) ? $("#uactive").attr('checked', 'checked') : $("#uinactive").attr('checked', 'checked');

                    $('#myModal2').modal('toggle');

                }

            }

        });
    }




    $('#addUser').click(function () {
        $("#addUserForm").trigger("reset");
        $('#id').val('');
    });

</script>