@extends('layouts.master')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <div class="card mt-5">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Todas Postagens

            <div>
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-success">Voltar</a>
            </div>
        </h5>

        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="" class="form-label">Imagem</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Titulo</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Categoria</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="">Selecione</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="" class="form-label">Descrição</label>
                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
