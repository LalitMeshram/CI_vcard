<script>

    $('#addUser').click(function (e) {

        var service = $('#service').val();
        var url = $('#url').val();
        var seq = $('#seq').val();
        var other_image = $('#other_image').prop('files')[0];
        var tableData = '';
//   alert(partnerName+' '+pMobile);
//if fields are not empty then add in table 
//else empty then set errors
        if (service != '') {
            if (!($('#r' + service.replace(/ /g, "_")).length)) {
                tableData += $('#otherTable tbody').html();
                tableData += `<tr id="r` + service.replace(/ /g, "_") + `">
                        <td>` + service + `</td>
                        <td>` + url + `</td>
                            <td>
                            <img src="<?php echo base_url('/admin_assets/img/doc_pre.png'); ?>" alt="" id="other` + service.replace(/ /g, "_") + `pre" width="20px" height="20px" />
                                <input type="hidden" id="other` + service.replace(/ /g, "_") + `" value=""/>
                                    
                        </td>
                        <td>` + seq + `</td>
                        <td>
                        <button type="button" class="btn btn-secondary btn-sm text-danger" onclick="deletePartner('` + service.replace(/ /g, "_") + `')">
                        Delete
                        </button>
                        </td>
                        </tr>`;

                $('#otherData').html(tableData);
                $('#other' + service.replace(/ /g, "_") + 'pre').attr("src", URL.createObjectURL(other_image));
            }
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

function deletePartner(id) {
        $('#r' + id).remove();
    }

    $('#addBuss').click(function (e) {

        var product = $('#product').val();
        var business = $('#business').val();
        var tableData = '';
        var d = new Date();
        var n = d.getTime();
        if (product != '' && business != '') {
//           if (!($('#r' + product.replace(/ /g, "_")).length)) {
            tableData += $('#bussTable tbody').html();
            tableData += `<tr id="l`+n+ `">
                        <td>` + product + `</td>
                        <td>` + business + `</td>
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




</script>