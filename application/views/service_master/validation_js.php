<script>

    $(function () {

        $("#addServiceForm").validate({

            ignore: [], rules: {

                title: {

                    required: true, minlength: 2, maxlength: 255

                }
            }

            , messages: {

                title: {

                    required: 'Enter Title', minlength: 'please enter more word', maxlength: 'length is exceed'

                }
            }

        });

    });



</script>