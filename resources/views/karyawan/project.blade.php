@extends('layouts.app')
@section('title')
    Projects
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Projects</h1>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="userProjects-table">
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Start</th>
                                <th>Deadline</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($project as $userProject)
                            <tr>
                                <td>
                                    <a href="{{ url('project/'.$userProject->project->id ) }}">{{ $userProject->project->name }}</a>
                                </td>
                                <td>{{ $userProject->project->start }}</td>
                                <td>{{ $userProject->project->deadline }}</td>
                                <td>{{ $userProject->project->status==1?'Sudah':'Belum' }}</td>
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

