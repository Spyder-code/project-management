<div class="table-responsive">
    <table class="table" id="projects-table">
        <thead>
            <tr>
        <th>ID</th>
        <th>Nama User</th>
        <th>Waktu Masuk</th>
        <th>Waktu Keluar</th>
        <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($time_entries as $time_entri)
            <tr>
            <td>{{ $time_entri->id }}</td>
            <td>{{ $time_entri->namaUser }}</td>
            <td>{{ $time_entri->time_start }}</td>
            <td>{{ $time_entri->time_end }}</td>
                       {{-- <td class=" text-center">
                           {!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('projects.show', [$project->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('projects.edit', [$project->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td> --}}
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
