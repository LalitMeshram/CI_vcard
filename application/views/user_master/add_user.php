<div class="modal fade bs-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">User Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="form" id="addRoleForm" method="post">
                    <div class="box-body">
                        <div class="row card">
                            <div>
                                <table class="table table-image">
                                    <tbody>
                                        <tr class="bussdocClass">
                                            <td>
                                                <div class="form-group">
                                                    <label for="output"></label>
                                                    <img src="<?php echo base_url('/admin_assets/img/doc_pre.png'); ?>" alt="" id="otherdpre" width="100px" height="100px" />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label class="form-label">Select Logo</label>
                                                    <input type="file" class="form-control" name="otherd" id="otherd" onchange="loadFile(event, 'otherdpre')" />
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Personal Information </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" id="firstName" name="firstName">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Middle Name</label>
                                    <input type="text" class="form-control" placeholder="Middle Name" id="lastName" name="lastName">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" id="lastName" name="lastName">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Business Name</label>
                                    <input type="text" class="form-control" placeholder="Business Name" id="businessName" name="businessName">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Destination</label>
                                    <input type="text" class="form-control" placeholder="Destination" id="destination" name="destination">
                                </div>
                            </div>
                        </div>
                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Contact Information </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Phone No.1</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Phone No.2</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo2" name="phoneNo2">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Whatsapp No.</label>
                                    <input type="text" class="form-control" placeholder="Whatsapp No" id="whatsapp" name="whatsapp">
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
                                    <input type="text" class="form-control" placeholder="Map Url" id="mapurl" name="mapurl">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Website Url</label>
                                    <input type="text" class="form-control" placeholder="Website Url" id="web_url" name="web_url">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Address</label>
                                    <input type="text" class="form-control" placeholder="Address" id="address" name="address">
                                </div>
                            </div>
                            <!--                            <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label ><span class="error">*</span>About Us</label>
                            
                                                                <textarea class="textarea" placeholder="Place some text here"
                                                                          style="width: 100%; height: 35px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            
                                                                <input type="text" class="form-control" placeholder="First Name" id="firstName" name="firstName">
                                                            </div>
                                                        </div>-->
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">About Us</label>
                                    <textarea class="form-control" placeholder="Place some text here" name="aboutus" id="aboutus" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Password</label>
                                    <input type="text" class="form-control" placeholder="Password" id="password" name="password">
                                </div>
                            </div>
                        </div>
                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Transaction Information </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Total Amount</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Paid Amount</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Discount Amount</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Renewal Amount</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Installation Date</label>

                                    <input type="date" class="form-control" name="installdate" id="installdate" />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">Next Installation Date</label>

                                    <input type="date" class="form-control" name="nxtinstalldate" id="nxtinstalldate" />
                                </div>
                            </div>

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
                        <!--transaction row-->

                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> Other Information </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Select Service</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Title</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Url</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Number</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Designation</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Sequence</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>


                            <div class="col-sm-2">
                                <div class="row mt-5" style="margin-top: 25px;">
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
                            <table class="table table-bordered" id="billTable">
                                <thead>
                                    <tr>
                                        <th scope="col">Select Service</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Number</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Sequence</th>
                                    </tr>
                                </thead>
                                <tbody id="billData">   

                                </tbody>
                            </table>
                        </div>
                        <!--other info-->

                        <h4 class="box-title text-info"><i class="ti-user mr-15"></i> User Profile </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Role</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label ><span class="error">*</span>Profile</label>
                                    <input type="text" class="form-control" placeholder="Phone No" id="phoneNo1" name="phoneNo1">
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->


                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Save
                        </button>
                    </div>
                </form>
                <!--form end-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>