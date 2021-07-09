<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Role
        </h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!--<li class="breadcrumb-item"><a href="#">Master</a></li>-->
            <li class="breadcrumb-item active">Role Master</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Role List</h3>

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
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1" id="addRole">Add Role</button>
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
                                            <th>Status</th>
<!--                                            <th>Email</th>
                                            <th>Contact No.</th>-->
<!--                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Highway</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="roleList">
<!--                                        <tr>
-->                                            <td>1</td>
                                            <td>master</td><!--
                                            <td>GANESH GADAKH</td>
                                            <td>abc@gmail.com</td>
                                            <td>9422629949</td>
                                            <td>SHINDE PALASE, NASHIK</td>
                                            <td>NASHIK</td>
                                            <td>PUNE NASHIK HIGHWAY</td>
                                            <td>2018-04-01</td>
                                            -->
                                            <td>Active</td>
                                            <td>Edit</td>
                                        </tr>


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Role</th>
                                            <th>Status</th>
<!--                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Highway</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
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
