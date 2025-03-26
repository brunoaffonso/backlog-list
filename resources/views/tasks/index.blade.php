@extends('layouts.app')

@section('title', 'Lista de Tarefas')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-red-900">Tarefas</h2>
        <a href="{{ route('tasks.create') }}" class="bg-orange-900 text-white px-4 py-2 rounded hover:bg-orange-800">
            Adicionar Tarefa
        </a>
    </div>
    <table class="table-auto w-full bg-white shadow-md rounded-lg">
        <thead class="text-left">
            <tr class="bg-gray-200">
                <th class="px-4 py-2">Título</th>
                <th class="px-4 py-2">Categoria</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $task->title }}</td>
                    <td class="px-4 py-2">{{ $task->category->name ?? 'Sem Categoria' }}</td>
                    <td class="px-4 py-2">{{ $task->completed ? 'Concluída' : 'Pendente' }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 mr-4 hover:underline"><i class="fa-solid fa-pencil"></i></a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?')">
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
