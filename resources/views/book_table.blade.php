@extends('layouts.app')




@section('content')



<table class="table">
  <thead>
    <tr>
      <th scope="col">##</th>
      <th scope="col">Nazwa Ksiazki</th>
      <th scope="col">Autor</th>
      <th scope="col">Opis</th>
      <th scope="col">Liczba wypozyczen</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    	@foreach($book as $books)
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$books->name}}</td>
      <td>{{$books->author}}</td>
      <td>{{$books->description}}</td>
      <td>{{$books->count_borrow}}
    </tr>
    
    @endforeach
  </tbody>
</table>


  <button type="submit" class="btn btn-primary" onclick="window.location='{{ url("/admin") }}'">
                                    {{ __('Powrot') }}
                                </button>
@endsection