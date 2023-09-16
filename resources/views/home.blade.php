@extends('layouts.master')


@section('content')
    <main role="main" class="container">
        <div class="row justify-content-md-center align-items-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-dark" role="alert" style="border-radius:0;">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach
                    @endif
                    <div class="card-body">
                        <form action="{{ route('upload-file') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label for="" class="form-label">Upload</label>
                                    <div class="col-md-3">
                                        <img src="{{ asset('storage/images/new_image.jpg') }}" class="img-thumbnail"
                                            alt="">
                                            <a href="{{ route('download') }}" class="text-muted text-decoration-none">Baixar imagem</a>
                                    </div>
                                </div>
                                <input type="file" class="form-control" name="image" id="" placeholder=""
                                    aria-describedby="fileHelpId">
                            </div>
                            <button type="submit" class="btn btn-outline-dark">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
@endsection
