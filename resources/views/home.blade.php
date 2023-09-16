@extends('layouts.master')


@section('content')
    <main role="main" class="container">
        <div class="row my-5">
            @foreach ($posts as $post)
                <div class="col-md-3 mt-5">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-body text-dark">
                            <h4>{{ $post->title }}</h4>
                            <p>{{ $post->description }}</p>
                            @foreach ($post->tags as $tag)
                                <li>{{ $tag->name }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{--  <div class="col-md-3 mt-5">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-body text-dark">
                            <h4>{{ $category->title }}</h4>
                            <p>{{ $category->description }}</p>
                            <button class="btn btn-dark">{{ $category->category->name }}</button>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-3 mt-5">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-body text-dark">
                            <h4>{{ $address->user->name }}</h4>
                            <p>{{ $address->user->email }}</p>
                            <p class="card-text">{{ $address->address }}</p>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-md-3 mt-5">
                    <div class="card border-dark mb-3" style="max-width: 18rem;">
                        <div class="card-body text-dark">
                            <h4>{{ $user->name }}</h4>
                            <p>{{ $user->email }}</p>
                            <p class="card-text">{{ $user->address->address }}</p>
                        </div>
                    </div>
                </div> --}}
            @endforeach
        </div>
    </main>
@endsection
