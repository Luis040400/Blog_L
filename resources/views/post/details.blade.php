@extends('app');

@section('content')

<div class="container mt-5 mb-5">
<div class="jumbotron text-center">
  <h1>{{$post->Titulo}}</h1>
  <p>{{$post->Contenido}}</p>
  <h6>{{$post->user->name}}</h6>
</div>

<form action="{{route('post.comentarios')}}" method="POST">
@csrf
  <div class="form-group">
    <label for="body">Escribe tus comentarios</label>
    <textarea class="form-control" rows="4" id="body" name="body"></textarea>
    <input type="hidden" name="post_id" value="{{$post->id}}">
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
@foreach ($post->comments as $comment)
@if (Auth::user()->id == $comment->user_id)
<div class="container border border-primary rounded mb-2 d-flex justify-content-between">
    <div>
    <h2>{{ $comment->user->name }}</h2>
    <h6>{{$comment->created_at}}</h6>
    <p>{{ $comment->body }}</p>
    </div>
    <div class="align-self-center">
    <form action="{{route('comment.destroy',[$comment->id])}}" method="POST" >
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <button class="btn btn-danger btn-sm">Eliminar</button>
    </form>
    </div>
</div>
@else
<div class="container border border-primary rounded mb-2">
    <h2>{{ $comment->user->name }}</h2>
    <h6>{{$comment->created_at}}</h6>
    <p>{{ $comment->body }}</p>
</div>
@endif


@endforeach
</div>




@endsection
