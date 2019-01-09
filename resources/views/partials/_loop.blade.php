@if ($posts)
    @foreach ($posts as $post)
        <div class="post">
            <h3>{!! Html::linkRoute('posts.show', $post->title, [$post->slug] ) !!}</h3>
            <p>{{ excerpt($post->content, 300) }} </p>
            @if ( strlen(strip_tags($post->content)) > 300 )
            {!! Html::linkRoute('blog.single', 'Read More', [$post->slug], ['class'=>'btn btn-primary']) !!}
            @endif
        </div>
    @endforeach
@else
    <h3 class="text-center text-danger">No posts found!</h3>
@endif