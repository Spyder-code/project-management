<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $project->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $project->description }}</p>
</div>

<!-- Start Field -->
<div class="form-group">
    {!! Form::label('start', 'Start:') !!}
    <p>{{ $project->start }}</p>
</div>

<!-- Deadline Field -->
<div class="form-group">
    {!! Form::label('deadline', 'Deadline:') !!}
    <p>{{ $project->deadline }}</p>
</div>

<!-- Customer Field -->
<div class="form-group">
    {!! Form::label('customer', 'Customer:') !!}
    <p>{{ $project->customer }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $project->status==0?'Belum Selesai':'Selesai' }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $project->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $project->updated_at }}</p>
</div>

