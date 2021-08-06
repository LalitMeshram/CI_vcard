var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');


function getPermissionData() {

    var data = [];
    var activity_id;
    var profile_id;
    var user_id;
    var _view;
    var _create;
    var _update;
    var _delete;
    var permissionBtn;
    var i = 0;
    $('#permissionTable tbody>tr').each(function (index, tr) {
        var tds = $(tr).find('td');
        activity_id = tds[0].textContent;

//            _create = tds[2].textContent;
//            _update = tds[3].textContent;
//            _delete = tds[4].textContent;
        _view = ($('#viewbox_' + activity_id).prop("checked") == true) ? 1 : 0;
        _create = ($('#createbox_' + activity_id).prop("checked") == true) ? 1 : 0;
        _update = ($('#updatebox_' + activity_id).prop("checked") == true) ? 1 : 0;
        _delete = ($('#deletebox_' + activity_id).prop("checked") == true) ? 1 : 0;
        permissionBtn = ($('#permissionbox_' + activity_id).prop("checked") == true) ? 1 : 0;

        profile_id = $('#profileid_' + activity_id).val();
        user_id = $('#userid_' + activity_id).val();
        data[i++] = {
            profile_master_id: profile_id,
            user_id: user_id,
            activity_id: activity_id,
            _view: _view,
            _create: _create,
            _update: _update,
            _delete: _delete,
            permissionBtn: permissionBtn
        }
    });
    return data;
}

$('#permissionBtn').click(function () {
    var permission = getPermissionData();
    var permissionString = JSON.stringify(permission);
    var userId = $('#userId').val();
    var formdata = new FormData();
    formdata.append('userId', userId);
    formdata.append('Data', permissionString);

    $.ajax({

        url: base_url+'userPermission',

        type: 'POST',
        headers: {
            "Authorization": token
        },
        data: formdata,

        cache: false,

        contentType: false,

        processData: false,

        dataType: 'json',

        success: function (response) {
            console.log(response);
            if (response.status == 200) {
                $('#myModal3').modal('toggle');
                swal("Good job!", response.msg, "success");
                location.reload();

            } else {

                swal("Good job!", response.msg, "error");

            }

        }

    });
});


