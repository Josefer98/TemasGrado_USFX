@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Temas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif


                    <form action="{{ route('blogs.update',$blog->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="titulo">Título</label>
                                   <input type="text" name="titulo" class="form-control" value="{{ $blog->titulo }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="area">Area</label>
                                   <input type="text" name="area" class="form-control" value="{{ $blog->area }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="palabras_clave">palabras_clave</label>
                                   <input type="text" name="palabras_clave" class="form-control" value="{{ $blog->palabras_clave }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label>Estado</label>
                                    <select class="form-control" name="estado">
                                        <option value="libre" {{ $blog->estado == 'libre' ? 'selected' : '' }}>Libre</option>
                                        <option value="asignado" {{ $blog->estado == 'asignado' ? 'selected' : '' }}>Asignado</option>
                                        <option value="terminado" {{ $blog->estado == 'terminado' ? 'selected' : '' }}>Terminado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <div class="form-floating">
                                <label for="descripcion">descripcion</label>
                                <textarea class="form-control" name="descripcion" style="height: 100px">{{ $blog->descripcion }}</textarea>
                                </div>
                            <br>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
