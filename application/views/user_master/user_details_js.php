<?php
$session_data = $this->session->userdata('loginSession');
?>
<script>
 var userList = new Map();
   function getUserDetails(){
       $.ajax({

            url: '<?php echo base_url();?>user/'+'<?php echo $id;?>',

            type: 'GET',
            
            headers: {
                "Authorization": "<?php echo $session_data['token']; ?>"
            },

            dataType: 'json',

            success: function (response) {
            

                if (response.status == 200) {
                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            userList.set(response.data[i].id, response.data[i]);
                        }
                        showUserList(userList);

                    }

                }

            }

        });
    }
    getUserDetails();

  function showUserList(list) {
  console.log(list);
        var tblData = '', status;
        var image='';
        for (let k of list.keys()) {
            let user = list.get(k);
           $('#suserName').html(user.first_name+" "+user.middle_name+" "+user.last_name);
           $('#sbusinessName').html(user.business_name);
        }

        
    }


</script>