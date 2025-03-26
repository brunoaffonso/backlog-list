@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold mb-4">Editar Categoria</h2>
        <a href="{{ route('categories.index') }}" class="text-teal-600 hover:underline">← Voltar para lista</a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nome da Categoria</label>
                <input type="text" name="name" id="name" value="{{ $category->name }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500" required>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="bg-red-900 text-white px-4 py-2 rounded hover:bg-red-800">
                    Atualizar Categoria
                </button>
            </div>
        </form>
    </div>
@endsection
