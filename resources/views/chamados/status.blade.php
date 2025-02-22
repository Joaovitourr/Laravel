@extends('index.app')

@section('content')
    <div class="container">
        <h1>Chamados {{ ucfirst($status) }}</h1>

        @if ($chamados->isEmpty())
            <p>Não há chamados com o status "{{ ucfirst($status) }}" no momento.</p>
        @else
            <ul>
                @foreach ($chamados as $chamado)
                    <li>
                        <strong>{{ $chamado->titulo }}</strong> - Status: {{ $chamado->status }}
                        <p>{{ $chamado->descricao }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection