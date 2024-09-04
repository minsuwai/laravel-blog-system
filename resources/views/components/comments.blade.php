@props(['comments'])

<section class="container">
    <div class="col-md-8  mx-auto">
        <h5 class="my-3 text-secondary">Comments (3)</h5>

        {{-- Single comment card --}}
        @foreach ($comments as $comment)
        <x-single-comment :comment="$comment"></x-single-comment>

        @endforeach
    </div>
</section>