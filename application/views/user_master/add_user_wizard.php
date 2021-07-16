<style>
    #profile_image {
        opacity: 0;
        position: absolute;
        z-index: -1;
    }
</style>


<div class="modal fade bs-example-modal-lg" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">User Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">


                <div class="box-body wizard-content">
                    <form action="#" class="tab-wizard wizard-circle">

                        <!-- Step 1 -->
                        <h6>Personal Information</h6>
                        <section>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="<?php echo base_url('/admin_assets/img/doc_pre.png'); ?>" alt="" id="otherdpre"  width="100px" height="100px"/>
                                        <label for="profile_image" style="cursor: pointer;" class="h6"><u>Upload...</u></label>
                                        <input type="file" class="form-control" name="profile_image" id="profile_image" accept="image/*"  onchange="loadFile(event, 'otherdpre')" />

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><span class="error">*</span>Select Role</label>
                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected">Alabama</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label ><span class="error">*</span>Select Profile</label>
                                        <select class="form-control select2" style="width: 100%;">
                                            <option selected="selected">Alabama</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
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
                            <h3>Contact Information</h3>
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
                        <h6>Transaction Information</h6>
                        <section>
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
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Next Installation Date</label>

                                        <input type="date" class="form-control" name="nxtinstalldate" id="nxtinstalldate" />
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Step 4 -->
                        <h6>Other Information</h6>
                        <section class="bg-white">
                            <h6>Service Details</h6>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label ><span class="error">*</span>Select Service</label>
                                        <select class="form-control select2" style="width: 100%;" id="service">
                                            <option selected="selected">Alabama</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label ><span class="error">*</span>Url</label>
                                        <input type="text" class="form-control" placeholder="" id="url">
                                    </div>
                                </div>
                                
                                
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label ><span class="error">*</span>Sequence</label>
                                        <input type="number" class="form-control" placeholder="" id="seq">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label"><span class="error">*</span>Select Image</label>

                                        <input class="form-control" id="other_image" name="other_image" type="file" onchange="loadFile(event, 'other_imagepre')" />
                                        <img src="<?php echo base_url('/admin_assets/img/doc_pre.png'); ?>" alt="" id="other_imagepre" width="20px" height="20px" />
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
                                            <th scope="col">Service</th>
                                            <th scope="col">Url</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Sequence</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="otherData">   

                                    </tbody>
                                </table>
                            </div>
                            
                            <h6>Business Details</h6>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label ><span class="error">*</span>Select Type</label>
                                        <select class="form-control select2" style="width: 100%;" id="product">
                                            <option>product & Service</option>
                                            <option>Other Business</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label ><span class="error">*</span>Product/Service/Business</label>
                                        <input type="text" class="form-control" placeholder="" id="business">
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

                <!--form end-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>