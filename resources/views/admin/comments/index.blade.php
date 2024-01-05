@foreach ($comments as $comment)
    <li class="dd-item" data-id="{{ $comment->id }}">
        <div class="dd-handle">{{ $comment->comment }}</div>
        <ol class="dd-list">
            @include('admin.comments.index', ['comments' => $comment->childs()])
        </ol>
    </li>
@endforeach
