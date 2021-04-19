<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user', 'User Id:') !!}
    <p>{{ $userProject->user->name }}</p>
</div>

<!-- Project Id Field -->
<div class="form-group">
    {!! Form::label('project', 'Project Id:') !!}
    <p>{{ $userProject->project->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $userProject->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $userProject->updated_at }}</p>
</div>

