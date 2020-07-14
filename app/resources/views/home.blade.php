@extends('layouts.app')
@section('title', 'Home')

@section('content')
  <div class="container mt-5">
    <form action="{{ route('customers.import') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <input type="file" class="form-control-file border" name="file" id="file" required>
        <br>
        <input type="submit" value="Importar" class="btn btn-primary">
      </div>
    </form>
  </div>
@endsection
