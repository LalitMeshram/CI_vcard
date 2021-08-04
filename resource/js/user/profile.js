var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');

var profileList = new Map();
function getProfileData() {

    $.ajax({

        url: base_url+'profile',

        type: 'GET',

        headers: {
            "Authorization": token
        },

        async: false,

        dataType: 'json',

        success: function (response) {


            if (response.status == 200) {

                if (response.data.lenght != 0) {

                    for (var i = 0; i < response.data.length; i++) {
                        profileList.set(response.data[i].id, response.data[i]);
                    }
//                        console.log(roles);
                    showProfileList(profileList);

                }

            }

        }

    });

}
getProfileData();


function showProfileList(list) {
    var option = '<option value="0">Select</option>';
    for (let k of list.keys()) {
        let profile = list.get(k);
//            if(role.id != 1 && role.is_active==1){
        option += `<option value='` + profile.id + `'>` + (profile.id + `-` + profile.title) + `</option>`;
//            }
    }
    $('#profile_id').html(option);


}




  