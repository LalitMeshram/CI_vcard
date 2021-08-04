<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!--<li class="breadcrumb-item"><a href="#">Master</a></li>-->
            <li class="breadcrumb-item active">User Master</li>
        </ol>
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
                <!--table start-->
                <div class="col-12">         
                    <div class="box">
                        <div class="box-header with-border box-controls pull-right">

                            <!--<div class="box-controls pull-right">-->
                            <!--<button id="row-count" class="btn btn-xs btn-primary">Row count</button>-->
                            <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3" id="addRole">Add User</button>-->
                            <a href="user-form" class="btn btn-primary" id="addRole">Add User</a>
                            <!--</div>-->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-sm-3 px-0">
                                            <select class="form-control" id="cityorhighway" name="cityorhighway">
                                                <option>Select</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4 mx-0 px-0">
                                            <input type="radio" name="group"  id="gr1" value="highway"/>
                                            <label for="gr1" class="">Highway</label>
                                            <input type="radio" name="group"  id="gr2" value="city"/>
                                            <label for="gr2" class="">City</label>
                                            <button type="button" class="btn btn-outline btn-rounded btn-success btn-sm mb-5" id="searchButton"><i class="fa fa-search" aria-hidden="true"></i>Search</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="userTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Role</th>
                                            <th style="width: 100%">User</th>
                                            <th>Next Renewal</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="userList">
<!--                                        <tr>
                                            <td>1</td>
                                            <td>Master</td>
                                            <td>

                                                <div class="media align-items-center">


                                                    <a class="avatar avatar-lg status-success" href="#">
                                                        <img src="<?php // echo base_url();  ?>resource/images/avatar-custom.png" alt="...">
                                                    </a>

                                                    <div class="media-body">
                                                        <p>
                                                            <a href="#"><strong class="h5">Lalit Meshram</strong></a>
                                                            
                                                        </p>
                                                        <p><strong class="h6">Anvi Softweb Soultions</strong><small class="sidetitle">Director</small></p>
                                                        <p><strong class="h6">Phone1:</strong> 8007015819 | <strong>Phone2:</strong> 8745963214</p>
                                                        <p> <strong class="h6">Email:</strong> lalitrmeshram@gmail.com </p>
                                                        <nav class="nav mt-2">
                                                            <a class="nav-link" href="#"><i class="fa fa-facebook"></i></a>
                                                            <a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
                                                            <a class="nav-link" href="#"><i class="fa fa-github"></i></a>
                                                            <a class="nav-link" href="#"><i class="fa fa-linkedin"></i></a>
                                                        </nav>

                                                    </div>
                                            </td>
                                            <td>14 jul 2021</td>
                                            <td>Active</td>
                                            <td>
                                                <p>Lalit Meshram</p>
                                                <p>14 july 2021</p>
                                            </td>
                                            <td>
                                                <a href="providerDetail/1" title="Edit"><i class="mdi mdi-tooltip-edit" style="font-size: 20px;"></i></a>



                                            </td>
                                        </tr>-->

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Role</th>
                                            <th>User</th>
                                            <th>Next Renewal</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body 
                    </div>
                        <!-- /.box -->


                        <!-- /.box -->          
                    </div>
                    <!--table end-->

                </div>
                <!-- /.box-body -->

                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
