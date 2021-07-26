<?php
$session_data = $this->session->userdata('loginSession');
?>
<script>
    var ServiceList = new Map();
    function getService() {
        $.ajax({

            url: '<?php echo base_url(); ?>service',

            type: 'GET',
            headers: {
                "Authorization": "<?php echo $session_data['token']; ?>"
            },
            dataType: 'json',

            success: function (response) {


                if (response.status == 200) {

                    if (response.data.lenght != 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            ServiceList.set(response.data[i].id, response.data[i]);
                        }
                        showList(ServiceList);

                    }

                }

            }

        });
    }
    getService();


    function showList(list) {

        $('#serviceTable').dataTable().fnDestroy();
        $('#ServiceList').empty();
        var tblData = '', badge, status;
        for (let k of list.keys()) {
            let services = list.get(k);
            tblData += `
                    <tr>
                            <td>` + services.id + `</td>
                            <td>` + services.title + `</td>
                            <td> <a href="#" onclick="getServices(` + services.id + `)" title="Update Service" ><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a> </td>
                    </tr>
                    `;
        }

        $('#ServiceList').html(tblData);
        $('#serviceTable').DataTable();
    }


    function getServices(id) {
        $.ajax({

            url: '<?php echo base_url(); ?>service/' + id,

            type: 'GET',
            headers: {
                "Authorization": "<?php echo $session_data['token']; ?>"
            },

            dataType: 'json',

            success: function (response) {
//                console.log(response);

                if (response.status == 200) {
                    $('#id').val(id);
                    $('#title').val(response.data.title);
//                    (response.data.is_active == 1) ? $("#active").attr('checked', 'checked') : $("#inactive").attr('checked', 'checked');

                    $('#myModal3').modal('toggle');

                }

            }

        });
    }




    $('#addService').click(function () {
        $('#myModal3').modal('toggle');
        $("#addServiceForm").trigger("reset");
        $('#id').val('');
    });

</script>