@extends('layouts.master')


@section('content')
    <main role="main" class="container">
        <h1 class="mt-5 text-danger">Home</h1>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus architecto perspiciatis quae. Veniam quo
        laborum dignissimos, doloribus hic molestiae eveniet ipsam eos totam omnis saepe sapiente exercitationem numquam
        cupiditate cum.

        <div class="row my-5">
            @forelse ($blogs as $blog)
                @if ($blog['status'])
                    <div class="col-md-4">
                        <div class="card border-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header">{{ $blog['title'] }}</div>
                            <div class="card-body text-dark">
                                <h5 class="card-title">Dark card title</h5>
                                <p class="card-text">{{ $blog['body'] }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-4">
                        <div class="card border-warning mb-3" style="max-width: 18rem;">
                            <div class="card-header">{{ $blog['title'] }}</div>
                            <div class="card-body text-dark">
                                <h5 class="card-title">Dark card title</h5>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-outline-warning btn-sm">
                                        Pendente!
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="alert alert-dark" role="alert">
                    Não existem posts no momento!
                </div>
            @endforelse
        </div>
    </main>
@endsection
