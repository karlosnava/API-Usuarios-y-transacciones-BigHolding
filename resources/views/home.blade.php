@extends('app.master')

@section('title', 'Inicio - Usuarios')

@section('content')
    <h1 class="text-3xl text-gray-600 font-bold">Listado de usuarios | Carlos Rodriguez</h1>
    <div class="text-gray-500 my-5">Listando {{ count($users) }} registros.</div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 text-xs">
      @foreach ($users as $user)
          <a href="{{route('user.show', $user['user_id'])}}" class="border rounded-md p-3 hover:bg-gray-100">
            <div class="flex items-center justify-between font-semibold">
              <div>Creación: {{$user["created_at"]}}</div>
              <span class="bg-green-100 text-green-500 font-semibold rounded-md px-3">{{$user["user_id"]}}</span>
            </div>
            <hr class="my-2">
            <div class="text-gray-500">
              <div>Documento: {{$user["identification_number"]}}</div>
              <div>Número: {{$user["mobile_number"]}}</div>
            </div>
          </a>
      @endforeach
    </div>
@endsection
