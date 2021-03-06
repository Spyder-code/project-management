<!-- Project Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Project Name:') !!}
    {!! Form::select('project_id', $itemProject, null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<input type="hidden" name="status" value="0">

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tasks.index') }}" class="btn btn-light">Cancel</a>
</div>
