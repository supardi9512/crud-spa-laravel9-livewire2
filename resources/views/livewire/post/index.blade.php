<div>
    <div class="row mb-3">
        <div class="col-12">
            <a href="{{ route('post.create') }}" class="btn btn-md btn-success">TAMBAH POST</a>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <input type="text" wire:model="search" class="form-control" placeholder="Pencarian">
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Judul</th>
                <th scope="col">Konten</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ ($posts ->currentpage()-1) * $posts ->perpage() + $loop->index + 1 }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td class="text-center">
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    <button wire:click="destroy({{ $post->id }})" class="btn btn-sm btn-danger">DELETE</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</div>
