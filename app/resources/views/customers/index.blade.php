@extends('layouts.app')
@section('title', 'Customers')

@section('content')
  <div class="container-fluid mt-5 table-responsive">
    <table class="table table-striped table-sm">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Nascimento</th>
          <th scope="col">CPF</th>
          <th scope="col">Rua</th>
          <th scope="col">Número</th>
          <th scope="col">Complemento</th>
          <th scope="col">Bairro</th>
          <th scope="col">Cidade</th>
          <th scope="col">CEP</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($customers as $customer)
          <tr>
            <th scope="row">{{ $customer->id }}</th>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->birth_date }}</td>
            <td>{{ $customer->cpf }}</td>
            <td>{{ $customer->address }}</td>
            <td>{{ $customer->number }}</td>
            <td>{{ $customer->complement }}</td>
            <td>{{ $customer->neighborhood }}</td>
            <td>{{ $customer->city }}</td>
            <td>{{ $customer->cep }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
