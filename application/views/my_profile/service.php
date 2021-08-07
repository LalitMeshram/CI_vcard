<div class="modal fade bs-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Service Provider</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form" id="addProductForm" method="post">

                    <div class="box-body">
                        <h4 class="box-title text-info"><i class="fa fa-shopping-cart"></i> Services Info </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Select Sevices</label>
                                    <select class="form-control" name="services" id="services">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><span class="error">*</span> Service Charge </label>
                                    <input type="text" class="form-control" placeholder="Service Charge" name="ser_charge" id="ser_charge">
                                </div>
                            </div>
                        </div>
                        <h4 class="box-title text-info"><i class="fa fa-shopping-cart"></i> Services Area </h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control" name="country" id="country">
                                        <option>India</option>
                                        <option>America</option>
                                        <option>Paris</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>State</label>
                                    <select class="form-control" name="state" id="state">
                                        <option>Maharashtra</option>
                                        <option>Delhi</option>
                                        <option>Kerla</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control" name="city" id="city">
                                        <option>Nagpur</option>
                                        <option>Mumbai</option>
                                        <option>Pune</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Area</label>
                                    <select class="form-control" name="area" id="area">
                                        <option>Nandanwan</option>
                                        <option>bardi</option>
                                        <option>butibori</option>
                                    </select>
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
                            <!--</div>-->
                        </div>
                        <div class="row">
                            <table class="table table-striped table-sm" id="otherTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Select Sevices</th>
                                        <th scope="col">Service Charge</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">State</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Area</th>

                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="otherData">   

                                </tbody>
                            </table>
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