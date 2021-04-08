<!-- Task Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Project_id', 'Project Name:') !!}
    {!! Form::select('project_id', $itemProject, null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Name:') !!}
    {!! Form::select('user_id', $itemUser, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userProjects.index') }}" class="btn btn-light">Cancel</a>
</div>
