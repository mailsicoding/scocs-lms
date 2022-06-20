@extends('students.layout.app')

@section('title','Courses')

@section('content')

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Course Meterial</h2>
        </div>
    </div>
    <div style="height:20px;"></div>

    <div class="row-fluid">
    <div class="span12" id="">
        <div class="row-fluid">
            <!-- block -->
            <div id="block_bg" class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Course Meterial</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Lecture #</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $file)
                                <tr>
                                    <td></td>
                                    <td width="@php echo 100/3; @endphp%">Lecture # {{ $file->lecture }}</td>
                                    <td width="@php echo 100/3; @endphp%">{{ $file->title }}</td>
                                    <td width="@php echo 100/2; @endphp%">
                                        <a href="{{ $file->file }}" download="{{ $file->title }}" style="margin-top:10px" class="btn btn-info">
                                            Download
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
</div>


</div>

@endsection

