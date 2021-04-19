<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('Role', 'Role:') !!}
    <select name="role" class="form-control">
        <option value="admin" selected>Admin</option>
        <option value="karyawan">Karyawan</option>
        <option value="hrd">HRD</option>
        <option value="ceo">CEO</option>
        <option value="project manager">Project Manager</option>
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
</div>
