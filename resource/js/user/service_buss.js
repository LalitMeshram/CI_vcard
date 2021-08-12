var base_url = localStorage.getItem('url');
var userid = localStorage.getItem('userid');
var token = localStorage.getItem('token');


var service = new Map();
    function getServiceData() {

        $.ajax({

            url: base_url+'service',

            type: 'GET',
            
            headers: {
                "Authorization": token
            },

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
        var tableData = '';
        for (let k of list.keys()) {
            let serv = list.get(k);
            tableData+=`<div class="row b-1">`;
            
            tableData+=`<div class="col-md-2 m-1">`+serv.title+`
                           <input type="hidden" id="serviceid_`+serv.id+`" value="`+serv.id+`"/> 
                        </div>`;
//            if(serv.btn_icon!=null && serv.i_icon!=null){
//                
//            }else{
//            tableData+=`<img width="40" height="40" src="`+serv.img_url+`" alt=""><div class="col-md-2 m-1">`+serv.title+`</div>`;
//                
//            }
            if(serv.flag==1){
             tableData+=`<div class="col-md-3 m-1"><input type="text" class="form-control" id="url_`+serv.id+`" placeholder="Enter Your `+serv.title+` No."/></div>`;   
             tableData+=`<div class="col-md-3 m-1"><input type="hidden" id="qrbase64_`+serv.id+`" value=""/><input class="form-control" id="qrcode_`+serv.id+`"  type="file" onchange="loadFile(event, 'qrcode_`+serv.id+`_pre');imageUploaded('`+serv.id+`');"></div>`;   
             tableData+=`<div class"col-md-3 m-1"><img src="`+base_url+`resource/img/noimage.png" alt="" id="qrcode_`+serv.id+`_pre" width="40px" height="40px" /></div>`;   
            }else{
             tableData+=`<div class="col-md-3 m-1"><input type="text" class="form-control" id="number_`+serv.id+`" placeholder="Enter Url"/></div>`;   
            }
          tableData+=`</div>`;  
        }
        $('#serviceData').html(tableData);

    }
    
    
    function  imageUploaded(id) {
        var image=$('#qrcode_'+id).prop('files')[0];
//        alert(id);
//        console.log(image);
        getPhotoBase64(image).then(function (data) {
                    //set string in hidden field
                    $('#qrbase64_'+id).val(data);
                });
}



//base64 file upload
    async   function getPhotoBase64(fileData) {
//        alert(id);
//        var f = $(id).prop('files')[0];
        var f = fileData;
        return  await toBase64(f);

    }


const toBase64 = file => new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
        });

