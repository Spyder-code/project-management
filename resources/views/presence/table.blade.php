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
        @foreach($time_entries as $item)
            <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->namaUser }}</td>
            <td>{{ $item->time_start }}</td>
            <td>{{ $item->time_end }}</td>
                       <td class=" text-center">
                           <form action="{{ route('absen.destroy') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
