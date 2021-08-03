<script>

var userList;
    function getUserList() {
        userList = new Map(JSON.parse(localStorage.myMap));
        setUser();
    }
    getUserList();


 function setUser() {
        var id =<?php echo $id; ?>;
        id = id.toString();
        var user = userList.get(id);
        console.log(user);

        $('#userid').val(id);
        $('#business_name').val(user.business_name);
        $('#role_id').val(user.role_id);
        $('#profile_id').val(user.profile_id);
        $('#first_name').val(user.first_name);
        $('#middle_name').val(user.middle_name);
        $('#last_name').val(user.last_name);
        $('#phone1').val(user.phone1);
        $('#phone2').val(user.phone2);
        $('#address').val(user.address);
        $('#about_us').val(user.about_us);
        $('#total_amount').val(user.total_amount);
        $('#paid_amount').val(user.paid_amount);
        $('#discount').val(user.discount);
        $('#installation_date').val(user.installation_date);
        $('#next_renewal_date').val(user.next_renewal_date);
        $('#renewal_amount').val(user.renewal_amount);
        $('#term').val(user.term);
        $('#is_active').val(user.is_active);
        (user.is_active==1)?$("#active").prop("checked", true):$("#inactive").prop("checked", true);
        $('#remark').val(user.remark);
        $('#discount_id').val(user.discount_id);
        $('#designation').val(user.designation);
        $('#whatsapp_number').val(user.whatsapp_number);
        $('#map_direction_url').val(user.map_direction_url);
        $('#website_url').val(user.website_url);
        $('#email_id').val(user.email_id);
        

        var paramTable = '';

        
    }

</script>
