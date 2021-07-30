<script>

    $(function () {

        $("#addUserForm").validate({

            ignore: [], rules: {

                phone1: {

                    required: true, minlength: 2, maxlength: 255

                }
                
//                , profile_image: {
//
//                    required: true, minlength: 2, maxlength: 255
//
//                }
            }

            , messages: {

                phone1: {

                    required: 'Enter Valid Phone No.', minlength: 'please enter more word', maxlength: 'length is exceed'

                }
//               , profile_image: {
//
//                    required: 'Enter Title', minlength: 'please enter more word', maxlength: 'length is exceed'
//
//                }
            }

        });

    });



</script>