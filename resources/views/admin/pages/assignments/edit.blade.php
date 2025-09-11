<form action="{{route('assignment.update', $assignment->id)}}" method="post" id="add-form">
    @csrf
    @method('PUT')
             <div class="form-group">
                  <label for="exp_name" class="col-form-label pt-0">Course Name<sup class="text-size-20 top-1"></sup></label>
                    <input type="text" class="form-control" id="exp_name" name="exp_name" value="{{ $assignment->exp_name }}">
                    <small id="emailHelp" class="form-text text-muted">Company Title</small>
                </div>     
      <div class="form-group">
                  <label for="course_name" class="col-form-label pt-0">Experiment Name<sup class="text-size-20 top-1"></sup></label>
                    <input type="text" class="form-control" id="course_name" name="course_name" value="{{ $assignment->course_name }}">
                    <small id="emailHelp" class="form-text text-muted">Company Title</small>
                </div>     
                  <div class="form-group">
                  <label for="total_marks" class="col-form-label pt-0">Total Marks<sup class="text-size-20 top-1"></sup></label>
                    <input type="text" class="form-control" id="total_marks" name="total_marks" value="{{ $assignment->total_marks }}">
                    <small id="emailHelp" class="form-text text-muted">Company Title</small>
                </div>

                       <div class="form-group">
                  <label for="earned_marks" class="col-form-label pt-0">Earned Marks<sup class="text-size-20 top-1 text-danger">*</sup></label>
                    <input type="text" class="form-control" id="earned_marks" name="earned_marks" value="{{ $assignment->earned_marks }}" required>
                    <small id="emailHelp" class="form-text text-muted">Company Title</small>
                </div>

                     <div class="form-group">
            <label for="deadline" class="col-form-label pt-0">
                Deadline <sup class="text-size-20 top-1"></sup>
            </label>
            <input type="datetime-local" class="form-control" id="deadline" name="deadline" value="{{ $assignment->deadline }}">
            <small id="emailHelp" class="form-text text-muted">Select assigned date & time</small>
        </div>
               
            <div class="form-group">
            <label for="assigned_date" class="col-form-label pt-0">
                Assigned Date <sup class="text-size-20 top-1"></sup>
            </label>
            <input type="datetime-local" class="form-control" id="assigned_date" name="assigned_date" value="{{ $assignment->assigned_date }}">
            <small id="emailHelp" class="form-text text-muted">Select assigned date & time</small>
        </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> <span class="d-none"> loading ......</span> Update</button>
      </div>
  </form>

  
