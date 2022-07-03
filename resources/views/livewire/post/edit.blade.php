<div>
<div class="card">
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <input type="hidden" wire:model="postId">
                <div class="form-group mb-3">
                    <label>Judul</label>
                    <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul">
                    @error('title')
                        <span class="invalid-feedback">
                            {{ $message }}
                         </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label>Konten</label>
                    <textarea wire:model="content" class="form-control @error('content') is-invalid @enderror" rows="4" placeholder="Masukkan Konten"></textarea>
                    @error('content')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <a href="{{ route('post.index') }}" class="btn btn-dark me-2">CANCEL</a>
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
</div>
