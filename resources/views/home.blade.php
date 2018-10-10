@extends('layouts.app')

@section('content')
<div class="container">
     <button type="submit" class="btn btn-primary" onclick="window.location='{{ url("/wypozycz") }}'">
                                    {{ __('Wypozyczalnia') }}
                                </button>

                                   <button type="submit" class="btn btn-primary" onclick="window.location='{{ route('list') }}'">
                                    {{ __('Twoja lista wypozyczen') }}
                                </button>

                                   <button type="submit" class="btn btn-primary" onclick="window.location='{{ route('personal_show') }}'">
                                    {{ __('Biblioteczka personalna') }}
                                </button>
</div>
@endsection
	