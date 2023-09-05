<div>
    <h2>Users</h2>
    <table class="table table-dark table-striped">
        <thead>
        <tr style="border-color: white;">
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $item)
            <tr style="border-color: white">
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3">{{$users->links()}}</td>
        </tr>
        </tbody>
    </table>
</div>
