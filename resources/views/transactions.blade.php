@extends('app.master')

@section('title', 'Transacciones - Usuarios')

@section('content')
    @empty(!$transactions)
        <h1 class="text-3xl text-gray-600 font-bold mb-10">Listando {{ count($transactions) }} transacciones.</h1>
    @endempty   

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        @forelse ($transactions as $transaction)
            <div class="border rounded-md p-5">
                <div class="text-xs mb-1">
                    <div class="flex items-center justify-between text-gray-500 mb-3">
                        <div>Creado: {{$transaction["created_at"]}}</div>
                        <div>Actualizado: {{$transaction["updated_at"]}}</div>
                    </div>

                    <span title="Transaction ID" class="bg-gray-100 text-gray-500 font-semibold rounded-md px-3">TID: {{$transaction["id"]}}</span>
                    <span title="User ID" class="bg-gray-100 text-gray-500 font-semibold rounded-md px-3 mx-1">UID: {{$transaction["client_id"]}}</span>
                    <span class="bg-indigo-100 text-indigo-500 text-xs rounded-full px-4">{{$transaction["month"]}}/{{$transaction["year"]}}</span>
                </div>
                <div>
                    <div class="font-bold text-2xl text-gray-700">${{$transaction["amount"]}}</div>
                    <p class="my-2 text-xs text-gray-600">{{$transaction["transaction_detail"]}}</p>
                </div>
            </div>

        @empty
            <div class="text-center col-span-2">
                <img src="https://img.freepik.com/free-vector/empty-concept-illustration_114360-1233.jpg" class="w-80 mx-auto">
                <h1 class="font-bold text-xl text-gray-600">Buscamos por todas partes pero no encontramos nada...</h1>
                <p class="mb-8 text-gray-500">Parece que este usuario todavía no ha hecho su primera transacción.</p>
                <a href="{{ route('home') }}" class="bg-emerald-500 rounded-full text-xl font-bold text-white px-10 py-1 hover:bg-emerald-600">Regresar</a>
            </div>
        @endforelse
    </div>
@endsection
