<style>
    #profile_image {
        opacity: 0;
        position: absolute;
        z-index: -1;
    }
</style>



<div class="content-wrapper"  id="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            My Account
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!--<li class="breadcrumb-item"><a href="#">Master</a></li>-->
            <li class="breadcrumb-item active">My Profile</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-10">

                <div class="row">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Personal <strong>Information</strong>


                            </h4>
                            <button type="button" class="btn btn-primary btn-xs"  id="addProvider" data-toggle="modal" data-target="#myModal1">Edit</button>
                            <ul class="box-controls pull-right">
                                <li><a class="box-btn-close" href="#"></a></li>
                                <li><a class="box-btn-slide rotate-180" href="#"></a></li>	
                                <li><a class="box-btn-fullscreen" href="#"></a></li>
                            </ul>
                        </div>

                        <div class="box-body">
                            <div class="box-body wizard-content">
                                <form action="#" class="tab-wizard wizard-circle" id="addUserForm">                            

                                    <!-- Step 1 -->
                                    <h6>Personal Detail</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group text-center">
                                                    <img src="<?php echo base_url('/admin_assets/img/doc_pre.png'); ?>" alt="" id="otherdpre"  width="100px" height="100px"/>
                                                    <p><label for="profile_image" style="cursor: pointer;" class="h6"><u>Upload...</u></label></p>
                                                    <input type="file" class="form-control" name="profile_image" id="profile_image" accept="image/*"  onchange="loadFile(event, 'otherdpre')" />

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label><span class="error">*</span>Select Role</label>
                                                    <select class="form-control select2" style="width: 100%;" name="role_id" id="role_id">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Select Profile</label>
                                                    <select class="form-control select2" style="width: 100%;" name="profile_id" id="profile_id">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Select Agent</label>
                                                    <select class="form-control select2" style="width: 100%;" name="agent_id" id="agent_id">

                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>First Name</label>
                                                    <input type="text" class="form-control" placeholder="First Name" id="first_name" name="first_name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Middle Name</label>
                                                    <input type="text" class="form-control" placeholder="Middle Name" id="middle_name" name="middle_name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Last Name</label>
                                                    <input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Business Name</label>
                                                    <input type="text" class="form-control" placeholder="Business Name" id="business_name" name="business_name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Destination</label>
                                                    <input type="text" class="form-control" placeholder="Destination" id="designation" name="designation">
                                                </div>
                                            </div>
                                        </div>
                                        <h3>Contact Information</h3>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Phone No.1</label>
                                                    <input type="text" class="form-control" placeholder="Phone No" id="phone1" name="phone1">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Phone No.2</label>
                                                    <input type="text" class="form-control" placeholder="Phone No" id="phone2" name="phone2">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Whatsapp No.</label>
                                                    <input type="text" class="form-control" placeholder="Whatsapp No" id="whatsapp_number" name="whatsapp_number">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Email Id</label>
                                                    <input type="text" class="form-control" placeholder="Email Id" id="email_id" name="email_id">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Map Url</label>
                                                    <input type="text" class="form-control" placeholder="Map Url" id="map_direction_url" name="map_direction_url">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Website Url</label>
                                                    <input type="text" class="form-control" placeholder="Website Url" id="website_url" name="website_url">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Address</label>
                                                    <input type="text" class="form-control" placeholder="Address" id="address" name="address">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">About Us</label>
                                                    <textarea class="form-control" placeholder="Place some text here" name="about_us" id="about_us" rows="1"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Password</label>
                                                    <input type="text" class="form-control" placeholder="Password" id="password" name="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Status</label>
                                                    <div class="radio">
                                                        <input name="is_active" type="radio" id="active" value="1" checked>
                                                        <label for="active">Active</label>                    
                                                    </div>
                                                    <div class="radio">
                                                        <input name="is_active" type="radio" id="inactive" value="0">
                                                        <label for="inactive">Inactive</label>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--row-1-->
                <div class="row">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Transaction <strong>Details</strong></h4>
                            <button type="button" class="btn btn-primary btn-xs"  id="addServices" data-toggle="modal" data-target="#myModal2">Add</button>
                            <ul class="box-controls pull-right">
                                <li><a class="box-btn-close" href="#"></a></li>
                                <li><a class="box-btn-slide rotate-180" href="#"></a></li>	
                                <li><a class="box-btn-fullscreen" href="#"></a></li>
                            </ul>
                        </div>

                        <div class="box-body">
                            <div class="box-body wizard-content">
                                <form action="#" class="tab-wizard wizard-circle" id="addUserForm">
                                    <h6>Transaction Detail</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Term(year)</label>
                                                    <select class="form-control select2" style="width: 100%;" name="term" id="term">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option>6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Total Amount</label>
                                                    <input type="text" class="form-control" placeholder="Total Amount" id="total_amount" name="total_amount">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Paid Amount</label>
                                                    <input type="text" class="form-control" placeholder="Paid Amount" id="paid_amount" name="paid_amount">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Discount Amount</label>
                                                    <input type="text" class="form-control" placeholder="Discount Amount" id="discount" name="discount">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Renewal Amount</label>
                                                    <input type="text" class="form-control" placeholder="Renewal Amount" id="renewal_amount" name="renewal_amount">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="control-label">Installation Date</label>

                                                    <input type="date" class="form-control" name="installation_date" id="installation_date" />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label">Next Installation Date</label>

                                                    <input type="date" class="form-control" name="next_renewal_date" id="next_renewal_date" />
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label">Remark</label>
                                                    <textarea rows="1" class="form-control" name="remark" id="remark"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Social <strong>Details</strong></h4>
                            <button type="button" class="btn btn-primary btn-xs"  id="addServices" data-toggle="modal" data-target="#myModal2">Add</button>
                            <ul class="box-controls pull-right">
                                <li><a class="box-btn-close" href="#"></a></li>
                                <li><a class="box-btn-slide rotate-180" href="#"></a></li>	
                                <li><a class="box-btn-fullscreen" href="#"></a></li>
                            </ul>
                        </div>

                        <div class="box-body">
                            <div class="box-body wizard-content">
                                <form action="#" class="tab-wizard wizard-circle" id="addUserForm">
                                    <h6>Social Detail</h6>
                                    <section class="bg-white">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Select Service</label>
                                                    <select class="form-control select2" style="width: 100%;" id="service">

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span><span id="urlLabel">Url</span></label>
                                                    <input type="text" class="form-control" placeholder="" id="url">
                                                    <input type="hidden"  id="hiddenflag" value="0">
                                                </div>
                                            </div>



                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label class="control-label"><span class="error">*</span>Select Image</label>

                                                    <input class="form-control" id="other_image" name="other_image" type="file" onchange="loadFile(event, 'other_imagepre')" />
                                                    <img src="<?php echo base_url('resource/img/noimage.png'); ?>" alt="" id="other_imagepre" width="20px" height="20px" />
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="row" style="margin-top: 25px;">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <button type="button" class="btn btn-info" id="addUser">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <table class="table table-striped table-sm" id="otherTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Id</th>
                                                        <th scope="col">Service</th>
                                                        <th scope="col">Url/Number</th>
                                                        <th scope="col">Image</th>

                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="otherData">   

                                                </tbody>
                                            </table>
                                        </div>


                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Business <strong>Details</strong></h4>
                            <button type="button" class="btn btn-primary btn-xs"  id="addServices" data-toggle="modal" data-target="#myModal2">Add</button>
                            <ul class="box-controls pull-right">
                                <li><a class="box-btn-close" href="#"></a></li>
                                <li><a class="box-btn-slide rotate-180" href="#"></a></li>	
                                <li><a class="box-btn-fullscreen" href="#"></a></li>
                            </ul>
                        </div>

                        <div class="box-body">
                            <div class="box-body wizard-content">
                                <form action="#" class="tab-wizard wizard-circle" id="addUserForm">
                                    <h6>Business Detail</h6>
                                    <section class="bg-white">

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Select Type</label>
                                                    <select class="form-control select2" style="width: 100%;" id="product">
                                                        <option>product & Service</option>
                                                        <option>Other Business</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Product/Service/Business</label>
                                                    <input type="text" class="form-control" placeholder="" id="business">
                                                </div>
                                            </div>

                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label ><span class="error">*</span>Sequence</label>
                                                    <input type="number" class="form-control" value="1" id="seq" min="1" max="10">
                                                </div>
                                            </div>


                                            <div class="col-sm-3">
                                                <div class="row" style="margin-top: 25px;">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="control-label"></label>
                                                            <button type="button" class="btn btn-info" id="addBuss">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <table class="table table-striped table-sm" id="bussTable">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Product/Service/Business</th>
                                                        <th scope="col">Sequence</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bussData">   

                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-2">

            </div>
            <!--side menu col-12-->
        </div>
        <!--wirte all content in this row-->
    </section>
    <!-- /.content -->
</div>