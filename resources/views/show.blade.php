@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Postagem #{{ $post->id }}

            <div>
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-success">Voltar</a>

            </div>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle"">
                        <tbody>
                            <tr>
                                <td>Imagem</td>
                                <td><img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-thumbnail"
                                        width="150"></td>
                            </tr>
                            <tr>
                                <td>Titulo</td>
                                <td>{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <td>Categoria</td>
                                <td>{{ $post->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Descrição</td>
                                <td>{{ $post->description }}</td>
                            </tr>
                            <tr>
                                <td>Publicado E:</td>
                                <td>{{ date('d-m-Y', strtotime($post->description)) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
