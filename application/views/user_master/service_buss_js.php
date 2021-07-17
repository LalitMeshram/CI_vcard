<script>
    var service = new Map();
    function getServiceData() {

        $.ajax({

            url: 'service',

            type: 'GET',

            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {

                        for (var i = 0; i < response.data.length; i++) {
                            service.set(response.data[i].id, response.data[i]);
                        }
                        showList(service);


                    }

                }

            }

        });

    }
    getServiceData();


    function showList(list) {
        var option = '';
        for (let k of list.keys()) {
            let serv = list.get(k);
            option += `<option value='` + serv.id + `'>` + serv.title + `</option>`

        }
        $('#service').html(option);

    }
    
    
    $('#service').change(function() {
            var id=$("#service").val();
            var serv=service.get(id);
            $("#hiddenflag").val(serv.flag);
            if(serv.flag==1){
                $("#urlLabel").html("Number");
                $("#other_image").prop('disabled', false);
            }else{
                $("#urlLabel").html("Url");
                $("#other_image").prop('disabled', true);
                
            }
        })
                $("#other_image").prop('disabled', true);

</script>