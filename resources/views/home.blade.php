@extends('layout.app')

@section('titulo')
    Principal
@endsection

@section('contenido')

    {{-- @forelse ($posts as $post)
        <h1> {{ $post -> titulo }} </h1>
    @empty
        <p>No tiene posts</p>
    @endforelse --}}

    <x-listar-post :posts="$posts" />

@endsection