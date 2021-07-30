<div class="modal fade bs-example-modal-lg" id="myModal20" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--form start-->
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Permission List</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <form class="form" id="addProfileForm" method="post">
                    <div class="box-body">
                        <div class="row">
                            <table class="table table-striped table-sm" id="otherTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Activity</th>
                                        <th scope="col">Create</th>
                                        <th scope="col">Update</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="otherData">   
                                    <tr>
                                        <td>1</td>
                                        <td>xyz</td>
                                        <td>
                                            <!--<div class="form-group">-->
                                            <div class="controls">
                                                <input type="checkbox" id="checkbox_1" required value="single">
                                                <label for="checkbox_1"></label>
                                            </div>								
                                            <!--</div>-->
                                        </td>

                                        <td><input type="checkbox" id="checkbox_2"></td>
                                        <td><input type="checkbox" id="checkbox_3"></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!--form end-->
    </div>
    <!-- /.modal-content -->
</div>