@extends('layouts.app')

@section('content')
   @foreach (auth()->user()->likes as $likes)
       
   <h2>{{ $likes->title }}</h2>

   @endforeach
@endsection
