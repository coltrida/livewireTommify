<div>
    <h2>Albums</h2>
    <table class="table table-dark table-striped">
        <thead>
        <tr style="border-color: white;">
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Artist</th>
        </tr>
        </thead>
        <tbody>
        @foreach($albums as $item)
            <tr style="border-color: white">
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->artist->user->name}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3">{{$albums->links()}}</td>
        </tr>
        </tbody>
    </table>
</div>
