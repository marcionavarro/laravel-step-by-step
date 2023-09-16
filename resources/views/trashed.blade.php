@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Todas Postagens da Lixeira

            <div>
                <a href="{{ route('posts.index') }}" class="btn btn-sm btn-success">Posts</a>
            </div>
        </h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Publicado em:</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td><img src="{{ asset($post->image) }}" alt="" width="80" height="40"></td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('posts.restore', $post->id) }}"
                                            class="btn btn-sm btn-success">Restaurar</a>
                                        <form action="{{ route('posts.force_delete', $post->id) }}" method="POST" class="mx-2">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Exluir</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="alert alert-primary m-2" role="alert">
                                        Não existem post na lixeira, no momento!
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
