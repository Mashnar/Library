@extends('layouts.app')


@section('content')


  <form method="POST" action="{{ route('submit') }}">
                        @csrf


 <div class="form-group row">
    <label for="text" class="col-sm-2 col-form-label">Nazwa Ksiazki</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Nazwa">
    </div>
  </div>
  <div class="form-group row">
    <label for="text" class="col-sm-2 col-form-label">Autor</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="author" name="author" placeholder="Autor">
    </div>
  </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1">Opis</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="description" name="description"></textarea>
    <br>
    <center>
    <button type="submit" class="btn btn-primary">Dodaj</button>
</center>
  </div>




@endsection