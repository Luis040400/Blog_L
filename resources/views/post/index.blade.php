@extends('app');

@section('content')
<div class="container d-flex justify-content-between mt-5 mb-5">
    <h2>Crea tus publicaciones</h2>
    <a href="{{route('post.crear')}}" class="btn btn-primary" role="button">Crear Publicación</a>
</div>


@if (session('success'))
        <h6 class="alert alert-success text-center">{{session('success')}}</h6>

        @endif

        @error('Titulo')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror

<div class="d-block  text-center ml-5 mr-5">
@foreach ($post as $p)
@if (Auth::user()->role=='admin')

@if ($p->Visible == 'N')
<div class="jumbotron">
  <div class="container">
    <h1 class="display-4"><a href="{{route('post.detalles', ['id' => $p->id])}}">{{$p->Titulo}}</a></h1>
    <div style="">{{$p->Contenido}}</div>
    <h6>{{$p->user->name}}</h6>

  <div class='d-flex flex-row-reverse '>

      <form action="{{route('post.state',[$p->id])}}" method="POST">
        @method('PATCH')
                          @csrf
        <button type="button" class="btn btn-secondary btn-sm" disabled>Oculto</button>
        <button type="submit" class="btn btn-primary btn-sm">Mostrar</button>
       </form>
  </div>
  </div>
</div>

@else
@if (Auth::user()->id === $p->user_id)
<div class="jumbotron">
  <div class="container">
    <h1 class="display-4"><a href="{{route('post.detalles', ['id' => $p->id])}}">{{$p->Titulo}}</a></h1>
    <div style="">{{$p->Contenido}}</div>
    <h6>{{$p->user->name}}</h6>

  <div class="d-flex flex-row-reverse">

            <div>
            <a class="btn btn-primary btn-sm" href="{{route('post.edit', ['id' => $p->id])}}">Editar</a>
            </div>
                  <form action="{{route('post.delete',[$p->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>



                   <form action="{{route('post.state',[$p->id])}}" method="POST">
                     @method('PATCH')
                     @csrf
                     <button type="submit" class="btn btn-dark btn-sm">Ocultar</button>
                   </form>

  </div>
  </div>
</div>
@else
<div class="jumbotron">
  <div class="container">
    <h1 class="display-4"><a href="{{route('post.detalles', ['id' => $p->id])}}">{{$p->Titulo}}</a></h1>
    <div style="">{{$p->Contenido}}</div>
    <h6>{{$p->user->name}}</h6>
  <div class='d-flex flex-row-reverse '>
                   <form action="{{route('post.state',[$p->id])}}" method="POST">
                     @method('PATCH')
                     @csrf
                     <button type="submit" class="btn btn-dark btn-sm">Ocultar</button>
                   </form>
  </div>
  </div>
</div>
@endif
@endif

@else
  @if (Auth::user()->id === $p->user_id)
  @if ($p->Visible == 'N')

  @else
  <div class="jumbotron">
  <div class="container">
    <h1 class="display-4"><a href="{{route('post.detalles', ['id' => $p->id])}}">{{$p->Titulo}}</a></h1>
    <div style="">{{$p->Contenido}}</div>
    <h6>{{$p->user->name}}</h6>

  <div class='d-flex flex-row-reverse '>
                   <div>
                       <a class="btn btn-primary btn-sm" href="{{route('post.edit', ['id' => $p->id])}}">Editar</a>
                   </div>

                   <form action="{{route('post.delete',[$p->id])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>

  </div>
  </div>
</div>
  @endif
  @else
  @if ($p->Visible == 'N')

  @else
  <div class="jumbotron">
  <div class="container">
    <h1 class="display-4"><a href="{{route('post.detalles', ['id' => $p->id])}}">{{$p->Titulo}}</a></h1>
    <p class="lead">{{$p->Contenido}}</p>
    <h6>{{$p->user->name}}</h6>
  </div>
</div>
  @endif
  @endif
@endif
@endforeach
</div>


@endsection
