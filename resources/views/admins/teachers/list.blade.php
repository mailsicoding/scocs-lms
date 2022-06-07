
        <div class="span9" id="">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Teacher List</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <table cellpadding="0" width="100%" cellspacing="0" border="0" class="table" id="example">
                                <thead>
                                    <tr>
                                        <th width="30px">Sr.No</th>
                                        <th width="@php echo 100/6; @endphp%">Photo</th>
                                        <th width="@php echo 100/6; @endphp%">Name</th>
                                        <th width="@php echo 100/6; @endphp%">Email</th>
                                        <th width="@php echo 100/6; @endphp%">Phone</th>
                                        <th width="@php echo 100/6; @endphp%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teachers as $teacher)
                                    <tr>
                                        <td width="30px">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td width="40px"><img class="img-circle" src="{{ asset($teacher->image) }}" height="50" width="50"></td>
                                        <td width="@php echo 100/6; @endphp%">{{ $teacher->first_name.' '.$teacher->last_name }}</td>
                                        <td width="@php echo 100/6; @endphp%">{{ $teacher->email }}</td>
                                        <td width="@php echo 100/6; @endphp%">{{ $teacher->phone_number }}</td>
                                        <td width="@php echo 100/6; @endphp%"><a
                                                href="{{ route('teachers.edit',$teacher->id) }}"
                                                class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                            @php $cls = route('teachers.destroy',$teacher->id); @endphp
                                            <a data-toggle="modal" href="#class_delete" style="margin-top:10px"
                                                id="delete" class="btn btn-danger"
                                                onclick="delete_record('{{ $cls }}','Delete Teacher','teacher')"><i
                                                    class="icon-trash icon-large"></i></a>
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