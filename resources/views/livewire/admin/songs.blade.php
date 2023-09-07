<div>
    <h2>Songs</h2>
    <table class="table table-dark table-striped">
        <thead>
        <tr style="border-color: white;">
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Album</th>
        </tr>
        </thead>
        <tbody>
        @foreach($songs as $item)
            <tr style="border-color: white">
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->album->name}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3">{{$songs->links()}}</td>
        </tr>
        </tbody>
    </table>
</div>
