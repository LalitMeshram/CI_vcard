<div class="modal fade bs-example-modal-lg" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Provider Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <!--            <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">User List</h3>
            
                                <ul class="box-controls pull-right">
                                    <li><a class="box-btn-close" href="#"></a></li>
                                    <li><a class="box-btn-slide" href="#"></a></li>	
                                    <li><a class="box-btn-fullscreen" href="#"></a></li>
                                </ul>
                            </div>
                        </div>-->
            <div class="modal-body">
                <form class="form" id="addProductForm" method="post">

                    <div class="box-body">
                        <h4 class="box-title text-info"><i class="fa fa-shopping-cart"></i> Provider Info </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group text-center">
                                    <img src="<?php echo base_url('/admin_assets/img/doc_pre.png'); ?>" alt="" id="otherdpre"  width="100px" height="100px"/>
                                    <p><label for="profile_image" style="cursor: pointer;" class="h6"><u>Upload...</u></label></p>
                                    <input type="file" style="display: none;" class="form-control" name="profile_image" id="profile_image" accept="image/*"  onchange="loadFile(event, 'otherdpre')" />

                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="error">*</span> Provider Name</label>
                                    <input type="text" class="form-control" placeholder="Provider Name" name="name" id="name">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Date of Birth</label>

                                    <input type="date" class="form-control" name="dob" id="dob" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="error">*</span> Age </label>
                                    <input type="text" class="form-control" placeholder="age" name="age" id="age">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="error">*</span> Adhar No. </label>
                                    <input type="text" class="form-control" placeholder="adhar" name="adhar" id="adhar">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="error">*</span> Pancard </label>
                                    <input type="text" class="form-control" placeholder="pancard" name="pancard" id="pancard">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="error">*</span> Mobile No. </label>
                                    <input type="text" class="form-control" placeholder="mobile" name="mobile" id="mobile">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="error">*</span> Password </label>
                                    <input type="text" class="form-control" placeholder="Password" name="pass" id="pass">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><span class="error">*</span> Email </label>
                                    <input type="text" class="form-control" placeholder="email" name="email" id="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control" name="country" id="country">
                                        <option>India</option>
                                        <option>America</option>
                                        <option>Paris</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="form-control" name="state" id="state">
                                        <option>Maharashtra</option>
                                        <option>Delhi</option>
                                        <option>Kerla</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control" name="city" id="city">
                                        <option>Nagpur</option>
                                        <option>Mumbai</option>
                                        <option>Pune</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Address</label>
                                    <textarea rows="2" class="form-control" placeholder="Description" name="description" id="description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                            <!--</div>-->
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