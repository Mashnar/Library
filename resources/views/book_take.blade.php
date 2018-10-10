@extends('layouts.app')




@section('content')



<table class="table">
  <thead>
    <tr>
      <th scope="col">##</th>
      <th scope="col">Nazwa Ksiazki</th>
      <th scope="col">Autor</th>
      <th scope="col">Opis</th>
     
      <th scope="col">Wypozycz</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    	@foreach($book as $books)
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$books->name}}</td>
      <td>{{$books->author}}</td>
      <td>{{$books->description}}</td>
      
      <td><a href="{{route('update', ['id' => $books->id])}}">Kliknij</a>
    </tr>
    
    @endforeach
  </tbody>
</table>


  <button type="submit" class="btn btn-primary" onclick="window.location='{{ url("/home") }}'">
                                    {{ __('Powrot') }}
                                </button>
@endsection