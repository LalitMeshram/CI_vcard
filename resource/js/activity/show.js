var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');

    var activityList = new Map();
    function getActivity() {
        $.ajax({

            url: base_url+'activity',

            type: 'GET',
            headers: {
                "Authorization": token
            },

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
                            <td> <a href="#" onclick="getActive(` + active.id + `)" title="Update Activity" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a>&nbsp;&nbsp;
                          <!--a href="#" onclick="deleteActive(` + active.id + `)" title="Delete Activity" ><i class="mdi mdi-delete-circle text-danger" style="font-size: 20px;"></i></a -->
                             </td>
                    </tr>
                    `;
        }

        $('#activityList').html(tblData);
        $('#activityTable').DataTable();
    }


    function getActive(id) {
        $.ajax({

            url: base_url+'activity/' + id,

            type: 'GET',
            headers: {
                "Authorization": token
            },

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

function deleteActive(id){
    $.ajax({

url: base_url+'activity/' + id,

type: 'DELETE',
headers: {
    "Authorization": token
},

dataType: 'json',

success: function (response) {


    if (response.status == 200) {
        swal("Good job!", response.msg, "success");
        location.reload();

    }else{
        swal("Good job!", response.msg, "error");
    }

}

});
}


    $('#addActivity').click(function () {
        $('#myModal4').modal('toggle');
        $("#addActivityForm").trigger("reset");
        $('#id').val('');
    });

