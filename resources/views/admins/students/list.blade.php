
        <div class="span9" id="">
            <div class="row-fluid">
                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Students List</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <table cellpadding="0" width="100%" cellspacing="0" border="0" class="table" id="example">
                                <thead>
                                    <tr>
                                        <th width="@php echo 100/7; @endphp%">Sr.No</th>
                                        <th width="@php echo 100/7; @endphp%">Photo</th>
                                        <th width="@php echo 100/7; @endphp%">Name</th>
                                        <th width="@php echo 100/7; @endphp%">Email</th>
                                        <th width="@php echo 100/7; @endphp%">Phone</th>
                                        <th width="@php echo 100/7; @endphp%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td width="@php echo 100/7; @endphp%">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td width="40px"><img class="img-circle" src="{{ asset($student->image) }}" height="50" width="50"></td>
                                        <td width="@php echo 100/7; @endphp%">{{ $student->first_name.' '.$student->last_name }}</td>
                                        <td width="@php echo 100/7; @endphp%">{{ $student->email }}</td>
                                        <td width="@php echo 100/7; @endphp%">{{ $student->phone_number }}</td>
                                        <td width="@php echo 100/7; @endphp%"><a
                                                href="{{ route('students.edit',$student->id) }}"
                                                class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                            @php $cls = route('students.destroy',$student->id); @endphp
                                            <a data-toggle="modal" href="#class_delete" style="margin-top:10px"
                                                id="delete" class="btn btn-danger"
                                                onclick="delete_record('{{ $cls }}','Delete Student','student')"><i
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