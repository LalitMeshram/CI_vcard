<style>
    #profile_image {
        opacity: 0;
        position: absolute;
        z-index: -1;
    }
</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="<?php echo base_url(); ?>user-master" class="btn btn-primary" id="addRole">Back</a>
    </section>
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">User List</h3>

                <ul class="box-controls pull-right">
                    <li><a class="box-btn-close" href="#"></a></li>
                    <li><a class="box-btn-slide" href="#"></a></li>	
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
                                        <img src="<?php echo base_url('resource/images/avatar-custom.png'); ?>" alt="" id="otherdpre"  width="100px" height="100px"/>
                                        <p><label for="profile_image" style="cursor: pointer;" class="h6"><u>Upload...</u></label></p>
                                        <input type="file" class="form-control" name="profile_image" id="profile_image" accept="image/*"  onchange="loadFile(event, 'otherdpre')" />
                                        <input type="hidden" id="userid" name="userid">
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
                                        <label><span class="error">*</span>Phone No.1</label>
                                        <input type="text" class="form-control" placeholder="Phone No" id="phone1" name="phone1">
                                        <input type="checkbox" id="isPhone" >
                                        <label for="isPhone"></label>
                                        <span id="errorPhone" class="text-danger"></span>
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
                                        <input type="checkbox" id="isEmail" >
                                        <label for="isEmail"></label>
                                        <span id="errorEmail" class="text-danger"></span>
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
                                        <input type="checkbox" id="isPassword" >
                                        <label for="isPassword"></label>
                                    </div>
                                </div>
                                <!--</div>-->
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
                        <!-- Step 3 -->
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
                        <!-- Step 4 -->
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
            <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
