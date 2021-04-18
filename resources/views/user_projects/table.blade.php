<div class="table-responsive">
    <table class="table" id="userProjects-table">
        <thead>
            <tr>
                <th>Project</th>
        <th>User Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userProjects as $userProject)
            <tr>
                       <td>{{ $userProject->namaProjek }}</td>
                       <td>{{ $userProject->namaUser }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['userProjects.destroy', $userProject->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('userProjects.show', [$userProject->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('userProjects.edit', [$userProject->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
