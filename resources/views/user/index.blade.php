@extends('layouts.app')

@section('content')
    <h1>Bienvenido {{ Auth::user()->name }}!</h1>
    <p>Tu rol es: {{ Auth::user()->role->name }}</p>
@endsection

