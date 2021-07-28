<?php
$session_data = $this->session->userdata('loginSession');
?>
<script>

        function getSocialData() {

        var data = [];
        var id;
        var service;
        var url;
        var flag;
        var image;
        var i = 0;
        $('#otherTable tbody>tr').each(function (index, tr) {
            var tds = $(tr).find('td');
            id = tds[0].textContent;
            service = tds[1].textContent;
            url = tds[2].textContent;

            flag = $('#flag' + service.replace(/ /g, "_")).val();
            image = $('#other' + service.replace(/ /g, "_")).val();


            data[i++] = {
                service_type_id: id,
                value: url,
                otherImage: image,
                flag: flag
            }
        });
        return data;
    }
        function getBusinessData() {

        var data = [];
        var type;
        var content;
        var sequence;
        var i = 0;
        $('#bussTable tbody>tr').each(function (index, tr) {
            var tds = $(tr).find('td');
            type = tds[0].textContent;
            content = tds[1].textContent;
            sequence = tds[2].textContent;



            data[i++] = {
                type: type,
                content: content,
                sequence: sequence
            }
        });
        return data;
    }


    $(".tab-wizard").steps({
        headerTag: "h6"
        , bodyTag: "section"
        , transitionEffect: "none"
        , titleTemplate: '<span class="step">#index#</span> #title#'
        , labels: {
            finish: "Submit"
        }
        , onFinished: function (event, currentIndex) {

//       ajax call
            event.preventDefault();
            var socialData = getSocialData();
        var socialString = JSON.stringify(socialData);
        var businessData=getBusinessData();
        var businessString = JSON.stringify(businessData);
            
            
            var returnVal = $("#addUserForm").valid();
            var formdata = new FormData(this);
            formdata.append('socialData', socialString);
        formdata.append('bussData', businessString);
        formdata.append('created_by', 1);
            if (returnVal) {
                $.ajax({

                    url: '<?php echo base_url();?>user',

                    type: 'POST',
                    
                    headers: {
                "Authorization": "<?php echo $session_data['token']; ?>"
            },

                    data: formdata,

                    cache: false,

                    contentType: false,

                    processData: false,

                    dataType: 'json',

                    success: function (response) {
                        if (response.status == 200) {
                            $('#myModal2').modal('toggle');
                            swal("Good job!", response.msg, "success");
                            location.reload();

                        } else {

                            swal("Good job!", response.msg, "error");

                        }

                    }

                });
            }
//       ajax call


        }
    });



</script>