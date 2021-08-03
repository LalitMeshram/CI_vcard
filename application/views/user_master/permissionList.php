<div class="modal fade bs-example-modal-lg" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Permission List</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                    <div class="box-body">
                        <div class="row">
                            <input type="hidden" id="userId" name="userId">
                            <table class="table table-striped table-sm" id="permissionTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Activity</th>
                                        <th scope="col">Create</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="permissionData">   
                                    

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary btn-outline" id="permissionBtn">
                            <i class="ti-save-alt"></i> Save
                        </button>
                    </div>
            </div>
        </div>
        <!--form end-->
    </div>
    <!-- /.modal-content -->
</div>