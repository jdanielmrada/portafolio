@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Portafolio del Sistema Cronos Day
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Recuerda no podras editar las imagenes ni agregar App CronosDay</p>
                    <p>Recuerda escoger de nuevo la categoria delproyecto  para agregar App CronosDay</p>
                </div>
                <div class="container-fruid">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('upDate',$article)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        

                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="#">Titulo</label>
                                <input type="text" value="{{ $article->title }}" name="title" class="form-control" id="#">
                              </div>
                            </div>

                            <div class="col-md-12">
                              <label for="#">Selecciona una categoria</label>
                              <select class="form-control form-control-lg" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                
                              </select>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="exampleFormControlTextarea1">Contenido</label>
                                <input name="content" value="{{ $article->content }}" class="form-control">
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="#">Fecha del proyecto</label>
                                <input type="date" name="fechaProyecto" value="{{ $article->fechaProyecto }}" class="form-control" id="#">
                              </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Editar
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('plugines/multifile-master/jquery.MultiFile.js') }}"></script>
@endsection