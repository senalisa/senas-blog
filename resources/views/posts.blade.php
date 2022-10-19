<!DOCTYPE html>

<title>Sena's Blog</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body>

@foreach($posts as $post)

    <article>
        <h1>
            <a href="/posts/{{$post->slug}}">
            {{$post->title}}
            </a>
        </h1>

        <div>
           <p>{{$post->excerpt}}</p>
        </div>
    </article>

@endforeach
</body>
