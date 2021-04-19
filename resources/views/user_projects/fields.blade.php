<div class="form-group col-sm-6">
    {!! Form::label('project', 'Project Name:') !!}
    {!! Form::select('project_id', $itemProject, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('Karyawan', 'Project Name:') !!}
    {!! Form::select('user_id', $itemUser, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userProjects.index') }}" class="btn btn-light">Cancel</a>
</div>
