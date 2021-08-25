@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Portafolio del Sistema Cronos Day
                    <a class="btn btn-success" href="{{ route('article.create') }}">Crear</a>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Recuerda este material dara vista a los visitantes de App CronosDay
                </div>
                <div class="container-fruid">
                    <table id="article" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Titulo</th>
                                  <th>Categoria</th>
                                  <th>Fecha del Proyecto</th>
                                  <th>Creador</th>
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                      <td>{{ $article->id }}</td>
                                      <td>{{ $article->title }}</td>
                                      <td>{{ $article->category->name }}</td>
                                      <td>{{ $article->fechaProyecto }}</td>
                                      <td>{{ $article->user->name }}</td>
                                      <td><a class="btn btn-danger" href="{{ route('article.show',$article->id) }}" onclick="return confirm('Eliminar articulo?')">
                                                <i class="fa fa-trash-o fa-lg"></i> Delete</a></td>
                                      <td><a class="btn btn-warning" href="{{ route('article.edit',$article->id) }}" onclick="return confirm('¿Editar articulo?')">
                                                <i class="fa fa-files-o -o fa-lg"></i> Editar</a></td>
                     
                                    </tr>
                                        
                                @endforeach
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                  <th>ID</th>
                                  <th>Titulo</th>
                                  <th>Categoria</th>
                                  <th>Fecha del Proyecto</th>
                                  <th>Creador</th>
                                  <th>&nbsp;</th>
                                  <th>&nbsp;</th>
                                </tr>
                            </tfoot>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#article').DataTable();
        } );
    </script>
@endsection