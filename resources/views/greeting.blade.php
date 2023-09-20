@extends('layouts.master')

@section('content')
    <div>
        <div class="mb-5">
            <a href="{{ route('greeting', 'en') }}" class="btn btn-primary">Portugues</a>
            <a href="{{ route('greeting', 'hi') }}" class="btn btn-danger">Hindi</a>
        </div>

        <div class="display-3">{{ __('frontend.Bem-vindo ao nosso aplicativo!') }}</div>
        <p>{{ __('frontend.A localização no Laravel permite definir traduções para várias strings de idioma em sua aplicação.') }}
        </p>

        <div class="row">
            <ul class="row">
                <li>{{ __('frontend.Home') }}</li>
                <li>{{ __('frontend.Sobre') }}</li>
                <li>{{ __('frontend.Contato') }}</li>
                <li>{{ __('frontend.Mais') }}</li>
            </ul>
        </div>
    </div>
@endsection
