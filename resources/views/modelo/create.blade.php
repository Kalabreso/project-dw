@extends('templates.main')

@section('content')

<form action="{{route('modelo.store')}}" method="POST">
  @csrf
  <label class="mt-3">Nome</label>
  <input type="text" name="name" class="form-control "/>
  <select name="marca_id" class="form-control mt-2">
    @foreach ($marcas as $item)
    <option value="{{ $item->id }}">{{$item->name}}</option>
      @endforeach
  </select>
  <input type="submit" value="Salvar" class="btn btn-danger mt-2">
</form>

@endsection