@extends('layouts.app')

@section('title', 'Editar Tarefa')

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold mb-4">Editar Tarefa</h2>
        <a href="{{ route('tasks.index') }}" class="text-teal-600 hover:underline">← Voltar para lista</a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Título</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500" required>
            </div>
            
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Descrição</label>
                <textarea name="description" id="description" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">{{ $task->description }}</textarea>
            </div>
            
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 font-medium mb-2">Categoria</label>
                <select name="category_id" id="category_id" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                    <option value="">Selecione uma categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="completed" value="1" {{ $task->completed ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-blue-600">
                    <span class="ml-2 text-gray-700">Marcar como concluída</span>
                </label>
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="bg-red-900 text-white px-4 py-2 rounded hover:bg-red-800">Atualizar Tarefa</button>
            </div>
        </form>
    </div>
@endsection
