@extends('layouts.app')


@section('content')
<div class="container">

 <button type="submit" class="btn btn-primary" onclick="window.location='{{ url("/add_book") }}'">
                                    {{ __('Dodaj ksiazke') }}
                                </button>
     <button type="submit" class="btn btn-primary" onclick="window.location='{{ url("/show_book") }}'">
                                    {{ __('wyswietl ksiazki') }}
                                </button>


</div>


@endsection