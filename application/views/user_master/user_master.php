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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3" id="addRole">Add User</button>
                            <!--</div>-->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="roleTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Role</th>
                                            <th>Business Name</th>
                                            <th>User Name</th>
                                            <th>Email Id</th>
                                            <th>Mobile No.</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="roleList">
                                        <tr>
                                            <td>1</td>
                                            <td>master</td>
                                            <td>Anvi SoftWeb</td>
                                            <td>pradyumn</td>
                                            <td>pra@gmail.com</td>
                                            <td>9876543210</td>
                                            <td>Active</td>
                                            <td>Edit</td>
                                        </tr>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <tr>
                                            <th>Id</th>
                                            <th>Role</th>
                                            <th>Business Name</th>
                                            <th>User Name</th>
                                            <th>Email Id</th>
                                            <th>Mobile No.</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
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
