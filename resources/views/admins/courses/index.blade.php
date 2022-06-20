@extends('admins.layout.app')

@section('title','Classes')

@section('content')

<div class="container-fluid main-content">

	<div class="row-fluid">
		<div class="span6">
			<h2>Courses</h2>
		</div>
	</div>

	<div style="height:20px;"></div>

	<div class="row-fluid">

		<div class="span12" id="content">
			<div class="row-fluid">
				<a href="{{ route('courses.create') }}" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Course</a>
			<!-- block -->
				<div id="block_bg" class="block">
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left">Course List</div>
					</div>
					<div class="block-content collapse in">
						<div class="span12">
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<thead>
										<tr>
											<th width="">Sr.No</th>
											<th width="@php echo 100/5; @endphp%">Course Code</th>
											<th width="@php echo 100/5; @endphp%">Course Title</th>
											<th width="@php echo 100/3; @endphp%">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($courses as $course)
										<tr>
											<td width="">{{ $loop->iteration }}</td>
											<td width="@php echo 100/4; @endphp%">{{ $course->course_code }}</td>
											<td width="@php echo 100/4; @endphp%">{{ $course->course_title }}</td>
											<td  width="@php echo 100/3; @endphp%"><a href="{{ route('courses.edit',$course->id) }}"
												class="btn btn-success"><i class="icon-pencil"></i> </a>
												@php $cls = route('courses.destroy',$course->id); @endphp
                                            <a data-toggle="modal" href="#class_delete" style="margin-top:10px"
                                                id="delete" class="btn btn-danger"
                                                onclick="delete_record('{{ $cls }}','Delete Course','course')"><i
                                                    class="icon-trash icon-large"></i></a></td>
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
