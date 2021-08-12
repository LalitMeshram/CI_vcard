var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');

    

    $('#addBuss').click(function (e) {

        var product = $('#product').val();
        var business = $('#business').val();
        var seq = $('#seq').val();
        var tableData = '';
        var d = new Date();
        var n = d.getTime();
        if (product != '' && business != '') {
//           if (!($('#r' + product.replace(/ /g, "_")).length)) {
            tableData += $('#bussTable tbody').html();
            tableData += `<tr id="l`+n+ `">
                        <td>` + product + `</td>
                        <td>` + business + `</td>
                        <td>` + seq + `</td>
                        <td>
                        <button type="button" class="btn btn-secondary btn-sm text-danger" onclick="deleteBuss('` +n+`')">
                        Delete
                        </button>
                        </td>
                        </tr>`;

            $('#bussData').html(tableData);
//            }
        } else {
            var errorData = '';

            if (pAadhar == '') {
                errorData += '<span id="pAadharError" class="text-danger"> *Enter Aadhar No.</span><br/>';
            }
            if (pPancard == '') {
                errorData += '<span id="pPanError" class="text-danger"> *Enter Pan No.</span><br/>';
            }
            if (pEmail == '') {
                errorData += '<span id="pEmailError" class="text-danger"> *Enter Emailid</span><br/>';
            }
            if (pMobile == '') {
                errorData += '<span id="pMobileError" class="text-danger"> *Enter Mobile No.</span><br/>';
            }
            $('.partnerError').html(errorData);
        }
    });
    function deleteBuss(id) {
        $('#l'+id).remove();
    }


