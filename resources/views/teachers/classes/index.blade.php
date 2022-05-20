@extends('admins.layout.app')

@section('title','Courses')

@section('content')

<div class="container-fluid main-content">

<div class="row-fluid">
    <div class="span6">
        <h2>Departments</h2>
    </div>
</div>
<div style="height:20px;"></div>

<div class="row-fluid">
    <div class="span3" id="adduser">
        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Add Department</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form method="post">
                            <div class="control-group">
                                <div class="controls">
                                    <input class="input focused " id="focusedInput" name="d" type="text"
                                        placeholder="Deparment" value="">
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <input class="input focused  " id="focusedInput" name="dn"
                                        type="text" placeholder="Dean Of Department" value="">
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    <button name="save" class="btn btn-info"><i
                                            class="icon-plus-sign icon-large"></i></button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>

    </div>
    <div class="span9" id="">
        <div class="row-fluid">
            <!-- block -->
            <div id="block_bg" class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Department List</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form action="delete_department.php" method="post">
                            <table cellpadding="0" cellspacing="0" border="0" class="table"
                                id="example">
                                <a data-toggle="modal" href="#department_delete" id="delete"
                                    class="btn btn-danger" name=""><i
                                        class="icon-trash icon-large"></i></a>
                                <!-- department delete modal -->
                                <div id="department_delete" class="modal hide fade" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">x</button>
                                        <h3 id="myModalLabel">Delete Department?</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-danger">
                                            <p>Are you sure you want to delete the department you
                                                check?.</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i
                                                class="icon-remove icon-large"></i> Close</button>
                                        <button name="delete_department" class="btn btn-danger"><i
                                                class="icon-check icon-large"></i> Yes</button>
                                    </div>
                                </div>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Department</th>
                                        <th>Person In-charge</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td width="30">
                                            <input id="optionsCheckbox" class="uniform_on"
                                                name="selector[]" type="checkbox" value="11">
                                        </td>
                                        <td>Computer Science</td>
                                        <td>Prof. Iftikhar Hussain Shah</td>

                                        <td width="30"><a href="edit_department.php?id=11"
                                                class="btn btn-success"><i
                                                    class="icon-pencil icon-large"></i></a></td>


                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>


    </div>
</div>


</div>

@endsection