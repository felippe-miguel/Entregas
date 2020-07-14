@extends('layouts.app')
@section('title', 'Customer - '.$customer->id)

@section('content')
  <div class="container mt-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Ficha completa do cliente {{ $customer->name }}</h5>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td>{{ $customer->id }}</th>
              </tr>
              <tr>
                <th scope="row">Nome</th>
                <td>{{ $customer->name }}</td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td>{{ $customer->email }}</td>
              </tr>
              <tr>
                <th scope="row">Data de nascimento</th>
                <td>{{ $customer->birth_date }}</td>
              </tr>
              <tr>
                <th scope="row">CPF</th>
                <td>{{ $customer->cpf }}</td>
              </tr>
              <tr>
                <th scope="row">Logradouro</th>
                <td>{{ $customer->address }}</td>
              </tr>
              <tr>
                <th scope="row">Número</th>
                <td>{{ $customer->number }}</td>
              </tr>
              <tr>
                <th scope="row">Complemento</th>
                <td>{{ $customer->complement }}</td>
              </tr>
              <tr>
                <th scope="row">Bairro</th>
                <td>{{ $customer->neighborhood }}</td>
              </tr>
              <tr>
                <th scope="row">Cidade</th>
                <td>{{ $customer->city }}</td>
              </tr>
              <tr>
                <th scope="row">CEP</th>
                <td>{{ $customer->cep }}</td>
              </tr>
              <tr>
                <th scope="row">Latitude</th>
                <td>{{ $customer->lat }}</td>
              </tr>
              <tr>
                <th scope="row">Longitude</th>
                <td>{{ $customer->lng }}</td>
              </tr>
              <tr>
                <th scope="row">ID do endereço</th>
                <td>{{ $customer->place_id }}</td>
              </tr>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
