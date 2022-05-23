@extends('admins.layout.app')

@section('title','Students')

@section('content')

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Students</h2>
        </div>
    </div>
    <div style="height:20px;"></div>

    <div class="row-fluid">
        <div class="span3" id="adduser">
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Student</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form method="post" action="{{ route('student.store') }}">
                                @csrf
                                <div class="control-group">

                                    <div class="controls">
                                        <label for="">Select Class</label>
                                        <select name="class_id" class="chzn-select" required>
                                            <option>Select Class</option>
                                            @foreach($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->class_name }} ( {{ $class->session_year }} )</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">First Name</label>
                                        <input class="input focused @error('first_name') is-invalid @enderror"
                                            id="focusedInput" name="first_name" type="text" placeholder="First Name"
                                            value="">
                                        @error('first_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Last Name</label>
                                        <input class="input focused @error('last_name') is-invalid @enderror"
                                            id="focusedInput" name="last_name" type="text" placeholder="Last Name"
                                            value="">
                                        @error('last_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Email</label>
                                        <input class="input focused @error('email') is-invalid @enderror"
                                            id="focusedInput" name="email" type="email" placeholder="Email" value="">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Phone Number</label>
                                        <input class="input focused @error('phone_number') is-invalid @enderror"
                                            id="focusedInput" name="phone_number" type="number"
                                            placeholder="Phone Number" value="">
                                        @error('phone_number')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">CNIC Number</label>
                                        <input class="input focused @error('cnic_number') is-invalid @enderror"
                                            id="focusedInput" name="cnic_number" type="number" placeholder="CNIC Number"
                                            value="">
                                        @error('cnic_number')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Date Of Birth</label>
                                        <input class="input focused @error('date_of_birth') is-invalid @enderror"
                                            id="focusedInput" name="date_of_birth" type="date"
                                            placeholder="xxxxxxxxxxxxx" value="">
                                        @error('date_of_birth')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn btn-info"><i
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
                        <div class="muted pull-left">Students List</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <table cellpadding="0" width="100%" cellspacing="0" border="0" class="table" id="example">
                                <thead>
                                    <tr>
                                        <th width="@php echo 100/7; @endphp%">Sr.No</th>
                                        <th width="@php echo 100/7; @endphp%">Name</th>
                                        <th width="@php echo 100/7; @endphp%">Email</th>
                                        <th width="@php echo 100/7; @endphp%">Phone</th>
                                        <th width="@php echo 100/7; @endphp%">CNIC</th>
                                        <th width="@php echo 100/7; @endphp%">Date Of Birth</th>
                                        <th width="@php echo 100/7; @endphp%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td width="@php echo 100/7; @endphp%">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td width="@php echo 100/7; @endphp%">{{ $student->first_name }}</td>
                                        <td width="@php echo 100/7; @endphp%">{{ $student->last_name }}</td>
                                        <td width="@php echo 100/7; @endphp%">{{ $student->email }}</td>
                                        <td width="@php echo 100/7; @endphp%">{{ $student->phone_number }}</td>
                                        <td width="@php echo 100/7; @endphp%">{{ $student->cnic_number }}</td>
                                        <td width="@php echo 100/7; @endphp%">{{ $student->date_of_birth }}</td>
                                        <td width="@php echo 100/7; @endphp%"><a
                                                href="{{ route('student.edit',$student->id) }}"
                                                class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                            @php $cls = route('student.destroy',$student->id); @endphp
                                            <a data-toggle="modal" href="#class_delete" style="margin-top:10px"
                                                id="delete" class="btn btn-danger"
                                                onclick="delete_record('{{ $cls }}','Delete Class','class')"><i
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
    </div>


</div>

@endsection
