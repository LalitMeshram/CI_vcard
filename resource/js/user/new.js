var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');

function getSocialData(list) {
    var data = [];
    var id;
    var value='';
    var flag;
    var image = '';
    var i = 0;

    for (let k of list.keys()) {
        let serv = list.get(k);
        id = $('#serviceid_' + serv.id).val();
        flag = serv.flag;

        if (serv.flag == 1) {
            value = $('#number_'+ serv.id).val();
            image = $('#qrbase64_'+ serv.id).val();
        } else {
            value = $('#url_'+serv.id).val();

        }
        data[i++] = {
            service_type_id: id,
            otherImage: image,
            flag: flag,
            vval:value
        };

    }
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
        var socialData = getSocialData(service);
        var socialString = JSON.stringify(socialData);
        var businessData = getBusinessData();
        var businessString = JSON.stringify(businessData);


        var returnVal = $("#addUserForm").valid();
        var formdata = new FormData(this);
        formdata.append('socialData', socialString);
        formdata.append('bussData', businessString);
        formdata.append('created_by', userid);
        if (returnVal) {
            $.ajax({

                url: base_url + 'user',

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
                    if (response.status == 200) {
                        $('#myModal2').modal('toggle');
                        swal("Good job!", response.msg, "success");

                        window.location.replace(base_url + "user-master");

                    } else {

                        swal("Good job!", response.msg, "error");

                    }

                }

            });
        }
//       ajax call


    }
});
