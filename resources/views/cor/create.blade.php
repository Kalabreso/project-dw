@extends('templates.main')

@section('content')

<form action="{{route('cor.store')}}" method="POST">
  @csrf
  <label class="mt-3">Nome</label>
  <input type="text" name="name" class="form-control "/>
  </textarea>
  <input type="submit" value="Salvar" class="btn btn-danger mt-1">
</form>

@endsection