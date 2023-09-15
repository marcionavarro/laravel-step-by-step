@extends('layouts.master')

@section('content')
    <div class="container d-flex justify-content-center align-items-center bg-dark mt-5 p-2 rounded">
        <div class="card">
            <div class="row g-0">
                <div class="col">
                    <div class="card-body">
                        <h5 class="card-title">Faça seu Login:</h5>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        <strong>{{ $error }}</strong>
                                    </div>
                                    
                            @endforeach
                        @endif

                        <form action="{{ route('login.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Nome</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName"
                                    aria-describedby="emailHelp">
                                <div id="nameHelp" class="form-text">Nunca compartilharemos seu nome com mais ninguém..
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com mais ninguém.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-outline-dark">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <img src="./login.jpg" class="img-fluid img-thumbnail" alt="...">
                </div>
            </div>
        </div>
    </div>
@endsection
