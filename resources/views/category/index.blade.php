@extends('layouts.app')

@section('title', 'Lista de Categorias')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-red-900">Categorias</h2>
        <a href="{{ route('categories.create') }}" class="bg-red-900 text-white px-4 py-2 rounded hover:bg-red-800">
            Adicionar Categoria
        </a>
    </div>

    <table class="table-auto w-full bg-white shadow-md rounded-lg">
        <thead class="text-left">
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Nome</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $category->name }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('categories.edit', $category) }}" class="text-blue-600 mr-4 hover:underline"><i class="fa-solid fa-pencil"></i></a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 mr-4 hover:underline"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
