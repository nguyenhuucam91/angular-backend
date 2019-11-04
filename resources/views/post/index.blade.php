<ul>
    @foreach ($posts as $post)
        <li>Title: {{ $post['name'] }} Content: {{ $post['content'] }}</li>
        <a href="{{ action('PostController@view', ['id' => $post['id']]) }}">Link</a>
    @endforeach
</ul>