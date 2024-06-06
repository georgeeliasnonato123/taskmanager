<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TaskManagerController extends Controller
{
        public function index()
        {
            $tasks = Task::all();
            $categories = Category::all();

            return view('livewire.task-manager', compact('tasks', 'categories'));
        }
        public function storeCategory(Request $request)
        {
        $request->validate([
            'newCategory' => 'required|string|max:255|unique:categories,name',
        ]);

        try {
            Category::create([
                'name' => $request->newCategory,
            ]);
            
            return redirect()->back()->with('success', 'Categoria criada com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao criar categoria: ' . $e->getMessage());
        }
        }
    public function updateCategories(Request $request, $id)
    {
        try {
            // Validação dos dados recebidos
            $validator = Validator::make($request->all(), [
                'editCategoryName' => 'required|string|max:255',
            ]);

            // Verifica se houve erro na validação
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $category = Category::findOrFail($id);
            $category->name = $request->input('editCategoryName');
            $category->save();

            return redirect()->back()->with('success', 'Categoria atualizada com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar a categoria: ' . $e->getMessage());
        }
    }

    public function destroyCategory($id)
    {
        try {
            // Validação dos dados recebidos
            $validator = Validator::make(['id' => $id], [
                'id' => 'required|exists:categories,id',
            ]);

            // Verifica se houve erro na validação
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->back()->with('success', 'Categoria removida com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao remover a categoria: ' . $e->getMessage());
        }
    }

    public function storeTask(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|exists:categories,id',
        ]);

        try {
            Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category,
            ]);

            return redirect()->back()->with('success', 'Tarefa criada com sucesso.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Erro ao criar tarefa: ' . $e->getMessage());
        }
    }
    public function updateTask(Request $request, Task $task)
    {
        try {
            $request->validate([
                'editTitle' => 'required|string|max:255',
                'editDescription' => 'nullable|string',
                'editCategory' => 'required|exists:categories,id',
            ]);
            
            $task->update([
                'title' => $request->editTitle,
                'description' => $request->editDescription,
                'category_id' => $request->editCategory,
            ]);

            return redirect()->back()->with('success', 'Tarefa atualizada com sucesso.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar tarefa: ' . $e->getMessage());
        }
    }

    public function destroyTask(Task $task)
    {
        try {
            $task->delete();

            return redirect()->back()->with('success', 'Tarefa excluída com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir tarefa: ' . $e->getMessage());
        }
    }



}
