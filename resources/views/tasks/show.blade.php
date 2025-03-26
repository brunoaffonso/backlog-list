@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-6">
        <h2 class="text-2xl font-bold mb-4">Detalhes da Tarefa</h2>
        <a href="{{ route('tasks.index') }}" class="text-blue-600 hover:underline">← Voltar para lista</a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-6">
            <h3 class="text-xl font-bold mb-2">{{ $task->title }}</h3>
            <div class="flex items-center mb-4">
                <span class="mr-4 text-gray-600">
                    Categoria: {{ $task->category->name ?? 'Sem categoria' }}
                </span>
                <span class="inline-block px-2 py-1 text-sm {{ $task->completed ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} rounded">
                    {{ $task->completed ? 'Concluída' : 'Pendente' }}
                </span>
            </div>
            
            @if ($task->description)
                <div class="mt-4">
                    <h4 class="text-lg font-medium mb-2">Descrição:</h4>
                    <p class="text-gray-700">{{ $task->description }}</p>
                </div>
            @endif
            
            <div class="mt-4 text-sm text-gray-500">
                <p>Criada em: {{ $task->created_at->format('d/m/Y H:i') }}</p>
                <p>Última atualização: {{ $task->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
        
        <div class="flex space-x-4">
            <a href="{{ route('tasks.edit', $task) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Editar Tarefa
            </a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Excluir Tarefa
                </button>
            </form>
        </div>
    </div>
@endsection
