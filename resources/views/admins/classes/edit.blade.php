@extends('admins.layout.app')

@section('title','Courses')

@section('content')

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Classes</h2>
        </div>
    </div>
    <div style="height:20px;"></div>

    <div class="row-fluid">
        <div class="span3" id="adduser">
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Class</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form method="post" action="{{ route('class.update',$class->id) }}">
                                @csrf
                                @method('put')
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Class Name</label>
                                        <input class="input focused @error('class_name') is-invalid @enderror"
                                            id="focusedInput" name="class_name" type="text" placeholder="Class Name"
                                            value="{{ $class->class_name }}">
                                        @error('class_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">No Of Students</label>
                                        <input class="input focused @error('no_of_students') is-invalid @enderror"
                                            id="focusedInput" name="no_of_students" type="number"
                                            placeholder="No Of Students" value="{{ $class->no_of_students }}">
                                        @error('no_of_students')
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
                        <div class="muted pull-left">Class List</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Class Name</th>
                                        <th>No Of Students</th>
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
                                        <td width="@php echo 100/4; @endphp%">{{ $class->no_of_students }}</td>

                                        <td width="@php echo 100/4; @endphp%"><a href="{{ route('class.edit',$class->id) }}"
                                                class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                                @php $cls = route('class.destroy',$class->id); @endphp
                                            <a data-toggle="modal" href="#class_delete" style="margin-top:10px" id="delete"
                                                class="btn btn-danger" onclick="delete_record('{{ $cls }}','Delete Class','class')"><i class="icon-trash icon-large"></i></a>
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
@section('scripts')

@endsection
