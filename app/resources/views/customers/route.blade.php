@extends('layouts.app')
@section('title', 'Customers')

@section('content')
  <div class="container">
    @foreach ($route->legs as $key => $leg)
      <div class="card my-3 bg-light font-weight-lighter">
        <div class="card-header font-weight-bold">
          @if ($loop->last)
            Volta à base
          @else
            {{($key+1).'ª'}} Entrega
          @endif
        </div>
        <h6 class="px-3 pt-3 text-muted">
          <strong>
            Endereço de saída:
          </strong>
          <span class="text-muted">
            {{ $leg->start_address }}
          </span>
        </h6>
        <h6 class="px-3 text-muted">
          <strong>
            Endereço final:
          </strong>
          <span class="text-muted">
            {{ $leg->end_address }}
          </span>
        </h6>
        <ul class="list-group list-group-flush">
          @foreach ($leg->steps as $k => $step)
            <li class="list-group-item">
              <strong>Passo {{ $k+1 }}:</strong> {!! $step->html_instructions !!}
            </li>
          @endforeach
        </ul>
      </div>
    @endforeach
  </div>
@endsection
