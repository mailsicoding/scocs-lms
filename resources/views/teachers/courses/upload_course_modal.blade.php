		<!-- Modal -->
        <div  id="upload_course" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3 id="myModalLabel">Upload Course</h3>
	</div>
		<div class="modal-body">
	<form  id="reply"  action="{{ route('teacher.courses.upload.result',$course->id) }}" method="post">
		<div class="control-group">
			<div class="controls">
				@csrf
				<input type="hidden" name="student_id" id="student_id" value="" readonly>
				<input type="hidden" name="course_id" value="{{$course->id}}" id="course_id" readonly>
				
			<label class="control-label" for="inputEmail">Score</label>
			<input type="text" name="score"  id="score" value="" required>
			
			<label class="control-label" for="inputEmail">Grade</label>
				<input type="text" name="grade"  id="grade" value="" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
			<button type="submit" id="" class="btn btn-success reply"><i class="icon-upload"></i> Upload</button>
			</div>
		</div>
    </form>
		</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Close</button>
		<!-- <button   id="" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i class="icon-check icon-large"></i> Yes</button> -->
	</div>
</div>
				
				

			