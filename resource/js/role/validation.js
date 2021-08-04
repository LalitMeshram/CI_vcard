$(function () {

        $("#addRoleForm").validate({

            ignore: [], rules: {

                role: {

                    required: true, minlength: 2, maxlength: 255

                }
            }

            , messages: {

                role: {

                    required: 'Enter Role', minlength: 'please enter more word', maxlength: 'length is exceed'

                }
            }

        });

    });

