<div class="card my-2 mx-2" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{ $note->title }}</h5>
        {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
        <p class="card-text">{{ Str::limit($note->desc, 55, '...') }}</p>
        <a href="{{ route('note.show', $note->id) }}" class="card-link stretched-link"></a>
    </div>
    <div class="card-footer bg-transparent border-top" style="z-index: 2">
        <form action="{{ route('note.destroy', $note->id) }}" method="POST">
            @csrf
            @method('delete')
            <button class="btn-sm btn-danger float-end">Delete</button>
        </form>
        <form action="{{ route('note.edit', $note->id) }}" method="get">
            @csrf
            <button class="btn-sm btn-primary float-end mx-2">Edit</button>
        </form>
    </div>
</div>
