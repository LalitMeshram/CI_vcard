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
        var tblData = '', status;
        var image='';
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
            (users.profile_image!=null)?(image ="<?php echo base_url(); ?>"+users.profile_image):(image ="<?php echo base_url(); ?>"+'resource/images/avatar-custom.png');
            

            tblData += ` <tr>
                                            <td>`+users.id+`</td>
                                            <td>`+users.role+`</td>
                                            <td>

                                                <div class="media align-items-center">


                                                    <a class="avatar avatar-lg `+((users.is_active==1)?`status-success`:`status-danger`)+`" href="#">
                                                        <img src="`+image+`" alt="`+users.business_name+`">
                                                    </a>

                                                    <div class="media-body">
                                                        <p>
                                                            <a href="#"><strong class="h6">`+users.first_name+' '+users.middle_name+' '+users.last_name+`</strong></a>
                                                            
                                                        </p>
                                                        <p><strong class="">`+users.business_name+`</strong><small class="sidetitle">`+users.designation+`</small></p>
                                                        <p><strong class="">Phone1:</strong> `+users.phone1+` | <strong>Phone2:</strong> `+users.phone2+`</p>
                                                        <p> <strong class="">Email:</strong> `+users.email_id+` </p>
                                                        <nav class="nav mt-2">
                                                            <a class="nav-link" href="#"><i class="fa fa-facebook"></i></a>
                                                            <a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
                                                            <a class="nav-link" href="#"><i class="fa fa-github"></i></a>
                                                            <a class="nav-link" href="#"><i class="fa fa-linkedin"></i></a>
                                                        </nav>
                                                                            <hr>
                                                               <p><small>Created By:`+users.creator_fname+' '+users.creator_lname+`-`+users.created_at+`</small></p>             
                                                               <p><small>Owner By:`+users.agent_fname+' '+users.agent_lname+`</small></p>             
                                                    </div>
                                            </td>
                                            <td>`+users.next_renewal_date+`</td>
                                            <td>`+status+`</td>
                                            
                                            <td>
                                                <a href="providerDetail/1" title="Edit"><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a>



                                            </td>
                                        </tr>`;
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