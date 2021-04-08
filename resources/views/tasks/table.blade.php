<div class="table-responsive">
    <table class="table" id="tasks-table">
        <thead>
            <tr>
                <th>Project Name</th>
        <th>Task</th>
        <th>Description</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
            <td>{{ $task->project_name}}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->description }}</td>
            <td>{{ $task->status==0?'Belum Selesai':'Selesai' }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('tasks.show', [$task->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('tasks.edit', [$task->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
