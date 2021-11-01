@extends('app');

@section('content')
<div class="container w-100 border p-4 mt-4">
    <form action="{{route('post')}}" method="POST">
        @csrf
        @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>

        @endif

        @error('Titulo')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror

        <div class="mb-3">
            <label for="Titulo" class="form-label">Título de la Publicación</label>
            <input type="text" name="Titulo" class="form-control">
        </div>
        <div class="mb-3">
            <label for="Contenido" class="form-label">Contenido</label>
            <textarea class="form-control" rows="5" id="Contenido" name="Contenido"></textarea>
        </div>
        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
        <button type="submit" class="btn btn-primary">Crear Publicación</button>
    </form>
</div>
@endsection
