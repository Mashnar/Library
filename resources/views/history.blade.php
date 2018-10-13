@extends('layouts.app')




@section('content')


<table class="table">
  <thead>
    <tr>
      <th scope="col">##</th>
      
      <th scope="col">Wypozyczona przez: </th>
      <th scope ="col">Data wypozyczenia</th>
</tr>
       </thead>
  <tbody>
<tr>
  	@foreach ($book->history as $user) 
<th scope="row">{{$loop->iteration}}</th>
           
            <td>{{$user->name}}</td>
            <td>{{$user->pivot->created_at}}</td>
            </tr>
        @endforeach


  	 </tbody>
</table>

  <button type="submit" class="btn btn-primary" onclick="window.location='{{ url("/admin") }}'">
                                    {{ __('Powrot') }}
                                </button>

@endsection