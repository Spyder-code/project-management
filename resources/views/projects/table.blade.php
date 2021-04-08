<div class="table-responsive">
    <table class="table" id="projects-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
        <th>Start</th>
        <th>Deadline</th>
        <th>Customer</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                       <td>{{ $project->name }}</td>
            <td>{{ $project->description }}</td>
            <td>{{ $project->start }}</td>
            <td>{{ $project->deadline }}</td>
            <td>{{ $project->customer }}</td>
            <td>{{ $project->status==0?'Belum Selesai':'Selesai' }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('projects.show', [$project->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('projects.edit', [$project->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
