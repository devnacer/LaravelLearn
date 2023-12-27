<div class="card my-2 mx-2" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{ $note->title }}</h5>
        {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
        <p class="card-text">{{ Str::limit($note->desc, 55, '...') }}</p>
        <a href="{{route('note.show', $note->id)}}" class="card-link stretched-link"></a>
    </div>
</div>
