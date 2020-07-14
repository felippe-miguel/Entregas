@extends('layouts.app')
@section('title', 'Customers')

@section('content')
  <div class="container-fluid mt-5 table-responsive">
    <table class="table table-striped table-sm">
      <thead class="thead-light">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Rua</th>
          <th scope="col">Bairro</th>
          <th scope="col">Cidade</th>
          <th scope="col">CEP</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($customers as $customer)
          <tr>
            <th scope="row">{{ $customer->id }}</th>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->neighborhood }}</td>
            <td>{{ $customer->city }}</td>
            <td>{{ $customer->cep }}</td>
            <td>
              <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-primary btn-sm">Ver</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
