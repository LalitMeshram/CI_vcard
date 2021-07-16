<script>
    var activityList = new Map();
    function getActivity() {
        $.ajax({

            url: 'activity',

            type: 'GET',

            dataType: 'json',

            success: function (response) {
            

                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            activityList.set(response.data[i].id, response.data[i]);
                        }
                        showList(activityList);

                    }

                }

            }

        });
    }
    getActivity();


    function showList(list) {

        $('#activityTable').dataTable().fnDestroy();
        $('#activityList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let active = list.get(k);
            switch (active.is_active) {
                case '1':
                    status = '<span class="badge badge-pill badge-primary">Active</span>';
                    break;

                case '0':
                    status = '<span class="badge badge-pill badge-danger">Inactive</span>';
                    break;

            }

            tblData += `
                    <tr>
                            <td>` + active.id + `</td>
                            <td>` + active.activity_title + `</td>
                            <td>` + active.category + `</td>
                            <td>` + active.url + `</td>
                            <td>` + status + `</td>
                            <td>` + active.created_at + `</td>
                            <td> <a href="#" onclick="getActive(` + active.id + `)" title="Update Activity" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> </td>
                    </tr>
                    `;
        }

        $('#activityList').html(tblData);
        $('#activityTable').DataTable();
    }


    function getActive(id) {
        $.ajax({

            url: 'activity/' + id,

            type: 'GET',

            dataType: 'json',

            success: function (response) {
//                console.log(response);

                if (response.status == 200) {
                    $('#id').val(id);
                    $('#activity_title').val(response.data.activity_title);
                    $('#category').val(response.data.category);
                    $('#url').val(response.data.url);
                    $('#sequence').val(response.data.sequence);
                    $('#created_at').val(response.data.created_at);
                    (response.data.is_active == 1) ? $("#active").attr('checked', 'checked') : $("#inactive").attr('checked', 'checked');

                    $('#myModal4').modal('toggle');

                }

            }

        });
    }




    $('#addActivity').click(function () {
        $('#myModal4').modal('toggle');
        $("#addActivityForm").trigger("reset");
        $('#id').val('');
    });

</script>