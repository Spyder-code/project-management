@extends('layouts.app')
@section('title')
    Projects
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Projects and Tasks</h1>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="userProjects-table">
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Task</th>
                                <th width="300px">Description</th>
                                <th colspan="3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $userProject)
                            <tr>
                                <td>
                                    <a href="{{ url('project/'.$userProject->project->id ) }}">{{ $userProject->project->name }}</a>
                                </td>
                                <td>{{ $userProject->name }}</td>
                                <td>{{ $userProject->description }}</td>
                                <td>
                                    <form action="{{ route('updateStatus') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $userProject->id }}" name="task_id">
                                        <select name="status" onchange="submit()" class="form-control">
                                            <option value="0" {{ $userProject->status==0?'selected':'' }}>Belum</option>
                                            <option value="1" {{ $userProject->status==1?'selected':'' }}>Sudah</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
       </div>
   </div>

    </section>
@endsection

