    @include('layouts.app')
    
    <div class="container mx-auto mt-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <!-- Form para adicionar tarefa -->
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
                </div>
                    <div class="mb-4 flex items-center">
                        <div class="relative flex-1">
                            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="category" id="category" wire:model.defer="category">
                                <option disabled selected>Selecione uma categoria</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>   
                            <button type="button" class="absolute right-0 top-0 mt-3 mr-4" id="showNewCategoryField">
                                <i class="fas fa-plus-circle text-blue-500"></i>
                            </button>
                            @error('category') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    <div class="w-1/10 ml-4">
                            <button type="button" class="bg-gray-200 text-gray-700 font-bold py-2 px-4 rounded inline-flex items-center" alt="Editar Categoria" id="openModalButton">
                                <i class="fas fa-edit"></i>
                                <span class="ml-2 hidden" title="Editar Categoria">Editar Categoria</span>
                            </button>
                    </div>
                </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Adicionar Tarefa</button>
            </form>
                <!-- modal de editar categorias -->
                    <div id="editCategoryModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span> 
                            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <form action="{{ route('categories.update', ['id' => ':id']) }}" method="POST" id="updateCategoryForm" class="w-full" data-action="{{ route('categories.update', ['id' => ':id']) }}">
                                                @csrf
                                                @method('POST') 
                                                <input type="hidden" name="category_id" id="category_id"> <!-- Campo oculto para enviar o ID -->
                                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">Editar Categoria</h3>
                                                <div class="mt-2">
                                                    <div>
                                                        <label for="editCategorySelect" class="block text-sm font-medium text-gray-700">Selecione a categoria:</label>
                                                        <select id="editCategorySelect" name="editCategorySelect" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                                            <option value="">Selecione uma categoria</option>
                                                            @foreach($categories as $category)
                                                                <option value="{{ $category->id }}" data-name="{{ $category->name }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <label for="editCategoryName" class="block text-sm font-medium text-gray-700">Novo nome da categoria:</label>
                                                    <input type="text" name="editCategoryName" id="editCategoryName" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                </div>
                                        
                                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" id="updateCategoryButton">
                                                        Atualizar Categoria
                                                    </button>
                                                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" id="closeModalButton">
                                                        Cancelar
                                                    </button>
                                                </div>
                                            </form> 
                                            <form action="{{ route('categories.destroy', ['id' => ':id']) }}" method="POST" id="deleteCategoryForm" class="mt-3 w-full" data-action="{{ route('categories.destroy', ['id' => ':id']) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm" id="deleteCategoryButton">
                                                    Excluir Categoria
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                <!-- Form para adicionar nova categoria -->
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
            <div class="flex items-center mb-4">
                <input id="pesquisa" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Pesquise pelo titulo da tarefa, descrição ou categoria">
            </div>
            <div class="overflow">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Título da Tarefa</th>
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
                                <td class="border px-4 py-2">{{ optional($task->category)->name ?? 'Categoria não encontrada' }}</td>
                                <td class="border px-4 py-2">
                                    <button class="btn btn-sm btn-primary mr-2 edit-task" data-taskid="{{ $task->id }}"><i class="fas fa-edit"></i> Editar</button>
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
                                            <label class="modal-close" for="modal-toggle{{$task->id}}" onclick="closeModal('modal{{$task->id}}')">&#10006;</label>
                                        </div>
                                    </div>
                                    <!-- Modal mini de edição da tarefa-->
                                    <div class="modal-wrapper hidden" id="editModal" style="display:none">
                                        <div class="modal-box">
                                            <span class="modal-close" onclick="closeEditModal()">&#10006;</span>
                                            <p>Editando Tarefa ID: <span id="taskId"></span></p>
                                            <form id="editTaskForm" action="{{ route('update.task', ['task' => '__TASK_ID__']) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="task_id" id="task_id">
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="editTitle">Título da Tarefa:</label>
                                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="editTitle" id="editTitle" type="text" placeholder="Título da Tarefa" value="{{ $task->title }}">
                                                    @error('editTitle') <span class="text-red-500">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="editDescription">Descrição:</label>
                                                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="editDescription" id="editDescription" placeholder="Descrição">{{ $task->description }}</textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="editCategory">Categoria:</label>
                                                    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="editCategory" id="editCategory">
                                                        <option disabled selected>Selecione uma categoria</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('editCategory') <span class="text-red-500">{{ $message }}</span> @enderror
                                                </div>
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Salvar Alterações</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

<!-- arquivo java script -->
<script src="{{ asset('js/taskmanager.js') }}"></script>

