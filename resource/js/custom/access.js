
var base_url = localStorage.getItem('url');
 var userid=localStorage.getItem('userid');
 var token=localStorage.getItem('token');
 $.ajax({

                url: base_url+'userPermission/'+userid,

                type: 'GET',
                
                headers: {
                "Authorization": token
            }, 

                cache: false,

                contentType: false,

                processData: false,

                dataType: 'json',

                success: function (response) {
                    if (response.status == 200) {
//                        swal("Good job!", response.msg, "success");
                        
                        
//                     window.location.replace("dashboard");
                    } else if(response.status == 400){

//                        swal("Login Error!", response.msg, "error");

                    }

                }

            });
