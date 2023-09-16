@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <h5 class="card-header d-flex justify-content-between align-items-center">
            Todas Postagens

            <div>
                <a href="{{ route('posts.create') }}" class="btn btn-sm btn-success">Criar</a>
                <a href="{{ route('posts.trashed') }}" class="btn btn-sm btn-warning">Lixeira</a>
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
                                        <a href="{{ route('posts.show', $post->id) }}"
                                            class="btn btn-sm btn-success">Ver</a>
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="btn btn-sm btn-primary mx-2">Editar</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
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
                                        Não existem dados cadastrados no momento!
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
