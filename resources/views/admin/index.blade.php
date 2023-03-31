@extends('layouts.app')

@section('content')
    <h1>Panel de administración</h1>
    <p>Bienvenido {{ Auth::user()->name }}!</p>
@endsection
