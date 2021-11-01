@extends('app');

@section('content')
<div class="container w-100 border p-4 mt-4">
    <form action="{{route('post.update',['id' => $post->id])}}" method="POST">
        @method('PATCH')
        @csrf

        @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
            
        @endif

        @error('Titulo')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror
        <div class="mb-3">
            <label for="Titulo" class="form-label">Título de la Publicación</label>
            <input type="text" name="Titulo" class="form-control" value="{{$post->Titulo}}">
        </div>
        <div class="mb-3">
            <label for="Contenido" class="form-label">Contenido</label>
            <textarea class="form-control" rows="5" id="Contenido" name="Contenido">{{$post->Contenido}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Publicación</button>
    </form>
</div>
@endsection