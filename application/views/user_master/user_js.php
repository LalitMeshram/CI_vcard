<script>
    var users = new Map();
    function getUserData() {

        $.ajax({

            url: 'user',

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {

                        for (var i = 0; i < response.data.length; i++) {
                            users.set(response.data[i].id, response.data[i]);
                        }
                        showUserList(users);


                    }

                }

            }

        });

    }
    getUserData();


    function showUserList(list) {
        var option = '';
        for (let k of list.keys()) {
            let user = list.get(k);
            if(user.role_id!=4){
            option += `<option value='` + user.id + `'>` +user.id+`-`+ (user.first_name+` `+user.last_name) + `</option>`
            }

        }
        $('#agent_id').html(option);

    }
   
    
    </script>