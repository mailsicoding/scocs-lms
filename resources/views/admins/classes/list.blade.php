<div class="span9" id="">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Class List</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Class Name</th>
                                        <th>Session Year</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($classes as $class)
                                    <tr>
                                        <td width="@php echo 100/4; @endphp%">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td width="@php echo 100/4; @endphp%">{{ $class->class_name }}</td>
                                        <td width="@php echo 100/4; @endphp%">{{ $class->session_year }}</td>

                                        <td width="@php echo 100/4; @endphp%"><a
                                                href="{{ route('classes.edit',$class->id) }}" class="btn btn-success"><i
                                                    class="icon-pencil icon-large"></i></a>
                                            @php $cls = route('classes.destroy',$class->id); @endphp
                                            <a data-toggle="modal" href="#class_delete" style="margin-top:10px"
                                                id="delete" class="btn btn-danger"
                                                onclick="delete_record('{{ $cls }}','Delete Class','class')"><i
                                                    class="icon-trash icon-large"></i></a>
                                                    <a
                                                href="{{ route('classes.show',$class->id) }}" class="btn btn-primary">
                                                    Students
                                                </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>


        </div>