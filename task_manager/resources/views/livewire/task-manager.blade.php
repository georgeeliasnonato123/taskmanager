    @include('layouts.app')
    

    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <!-- Formulário para adicionar tarefa -->
            <form wire:submit.prevent="storeTask" action="{{ route('store.task') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Título da Tarefa:</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" id="title" type="text" placeholder="Título da Tarefa" wire:model.defer="title">
                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Descrição:</label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="description" id="description" wire:model.defer="description" placeholder="Descrição"></textarea>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="category">Categoria:</label>
                <div class="relative">
                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="category"  id="category" wire:model.defer="category">
                    <option disabled selected>Selecione uma categoria</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="absolute right-0 top-0 mt-3 mr-4" id="showNewCategoryField">
                        <i class="fas fa-plus-circle text-blue-500"></i>
                    </button>
                </div>
                @error('category') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Adicionar Tarefa</button>
        </form>
            <!-- Formulário para adicionar nova categoria -->
        <form wire:submit.prevent="storeCategory" id="newCategoryField" style="display: none;" action="{{ route('store.category') }}" method="POST">
            @csrf
            <div class="mb-4">
               <label class="block text-gray-700 text-sm font-bold mb-2" for="newCategory">Nova Categoria:</label>
               <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="newCategory" id="newCategory" type="text" placeholder="Digite o nome da nova categoria" wire:model.defer="newCategory">
                @error('newCategory') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Adicionar categoria</button>
            </form>

        </div>
    </div>


    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">Título</th>
                    <th class="px-4 py-2">Descrição</th>
                    <th class="px-4 py-2">Categoria</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td class="border px-4 py-2">{{ $task->title }}</td>
                        <td class="border px-4 py-2">{{ $task->description }}</td>
                        <td class="border px-4 py-2">{{ $task->category->name }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="editTask({{ $task->id }})" class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i> Editar</button>
                            <button class="btn btn-sm btn-danger btn-show-modal" data-target="modal{{$task->id}}"><i class="fas fa-trash"></i> Excluir</button>
                            <!-- Modal de confirmação de exclusão -->
                            <div class="modal-wrapper hidden" id="modal{{$task->id}}" style="display:none">
                                <input type="checkbox" class="modal-toggle" id="modal-toggle{{$task->id}}">
                                <label for="modal-toggle{{$task->id}}" class="modal-backdrop"></label>
                                <div class="modal-box">
                                    <p>Deseja realmente excluir esta tarefa?</p>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Confirmar</button>
                                    </form>
                                    <label class="modal-close" for="modal-toggle{{$task->id}}">&#10006;</label>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- java script -->
<script src="{{ asset('js/taskmanager.js') }}"></script>

