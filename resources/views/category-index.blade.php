@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Categoria del Sistema Cronos Day
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#datoformurario">
                      Crear
                    </button>

                </div>
                <!-- Modal -->
                <div class="modal fade" id="datoformurario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrar Categoria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('category.store') }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Registrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Cada categoria que registres sera una opcion en la creacion de un post en App CronosDay
                </div>
                <div class="container-fruid">
                    <table id="category" class="table table-striped table-bordered" style="width:100%">
                            <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                            
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        
                                        <td><a class="btn btn-danger" href="{{ route('category.destroy', $category->id) }}" onclick="return confirm('¿Eliminar categoria?')">ELIMINAR</a></td>
                                    </tr>
                                        
                                @endforeach
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    
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
            $('#category').DataTable();
        } );
    </script>
@endsection