$('#addUser').click(function (e) {
        
        var serviceId = $('#service').val();
        var service=$("#service option:selected").html();
        var url = $('#url').val();
        var flag = $('#hiddenflag').val();
        var other_image = $('#other_image').prop('files')[0];
        var tableData = '';
        $('#url').val('');
        $('#other_image').val('');
//   alert(partnerName+' '+pMobile);
//if fields are not empty then add in table 
//else empty then set errors
        if (service != '') {
            if (!($('#r' + service.replace(/ /g, "_")).length)) {
                tableData += $('#otherTable tbody').html();
                tableData += `<tr id="r` + service.replace(/ /g, "_") + `">
                        <td>` + serviceId + `</td>
                        <td>` + service + `</td>
                        <td>` + url + `</td>
                            <td>
                            <img src="`+base_url+`/resource/img/noimage.png" alt="" id="other` + service.replace(/ /g, "_") + `pre" width="20px" height="20px" />
                                <input type="hidden" id="other` + service.replace(/ /g, "_") + `" value=""/>
                                <input type="hidden" id="flag` + service.replace(/ /g, "_") + `" value="`+flag+`"/>
                                    
                        </td>
                        <td>
                        <button type="button" class="btn btn-secondary btn-sm text-danger" onclick="deletePartner('` + service.replace(/ /g, "_") + `')">
                        Delete
                        </button>
                        </td>
                        </tr>`;

                $('#otherData').html(tableData);
                $('#other_imagepre').attr('src',base_url+"/resource/img/noimage.png");
                
                $('#other' + service.replace(/ /g, "_") + 'pre').attr("src", URL.createObjectURL(other_image));
                
                
                getPhotoBase64(other_image).then(function (data) {
                    //set string in hidden field
                    $('#other' + service.replace(/ /g, "_")).val(data);
                });
                
                
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