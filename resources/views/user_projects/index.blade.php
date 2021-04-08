@extends('layouts.app')
@section('title')
    User Projects 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>User Projects</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('userProjects.create')}}" class="btn btn-primary form-btn">User Project <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('user_projects.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

