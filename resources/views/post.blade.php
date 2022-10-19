<!DOCTYPE html>

<title>Sena's Blog</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<body>

    <article>
        <h1>{!! $post->title !!}</h1>

        <div>
            <p>{!! $post->body !!}</p>
        </div>
    </article>

    <a href='{!! url('/'); !!}'>Go Back</a>

</body>
