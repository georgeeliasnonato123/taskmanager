    //função para mostrar o menu na tela mobile
    $(document).ready(function() {
        $('#mobile-menu-button').click(function() {
            $('nav').toggleClass('hidden');
        });
    });
    
    // mostrar form de vategorias
    document.getElementById('showNewCategoryField').addEventListener('click', function() {
        document.getElementById('newCategoryField').style.display = 'block';
    });
    // Adiciona um listener para o clique no botão excluir task
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-show-modal').forEach(function(button) {
            button.addEventListener('click', function(event) {
            
                var targetModalId = this.getAttribute('data-target');
                
                var modalWrapper = document.getElementById(targetModalId);
                
                modalWrapper.style.display = 'block';
            });
        });
    });

    //função para fechar o modal de exclusão da task
    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "none";
        }
    }

    //função do modal edit task
    document.querySelectorAll('.edit-task').forEach(button => {
        //joga o id para o modal para conseguir dá um update
        button.addEventListener('click', function() {
            const taskId = this.getAttribute('data-taskid');
            const editTaskForm = document.getElementById('editTaskForm');
            editTaskForm.setAttribute('action', editTaskForm.getAttribute('action').replace('__TASK_ID__', taskId));
            document.getElementById('task_id').value = taskId;
    
            const editModal = document.getElementById('editModal');
            editModal.classList.remove('hidden');
            editModal.style.display = 'block'; 
        });
    });
    

    //função para ocultar o modal de editar se clicar no x
    function closeEditModal() {
        var editModal = document.getElementById('editModal');
        editModal.style.display = "none";
    }
    // função para o modal de edição de categoria
    $(document).ready(function(){
        $('#openModalButton').click(function(){
            $('#editCategoryModal').removeClass('hidden');
        });
    
        $('#closeModalButton').click(function(){
            $('#editCategoryModal').addClass('hidden');
        });
        // pega o valor do id da categoria 
        $('#editCategorySelect').change(function(){
            var selectedCategoryId = $(this).val();
            var selectedCategoryName = $(this).find(':selected').data('name');
            
            // Atualiza o valor da input de texto com o nome da categoria selecionada
            $('#editCategoryName').val(selectedCategoryName);
        });
    });

    // js para jogar o id da categoria para o controller
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('editCategorySelect').addEventListener('change', function() {
            var categoryId = this.value; 
            var formAction = document.getElementById('updateCategoryForm').getAttribute('data-action'); 
            var updatedAction = formAction.replace(':id', categoryId); 
            document.getElementById('updateCategoryForm').setAttribute('action', updatedAction); 
        });
    });

    // js para jogar o id da categoria para o controller na exclusão
    document.getElementById('editCategorySelect').addEventListener('change', function() {
        var categoryId = this.value; 
        var formAction = document.getElementById('deleteCategoryForm').getAttribute('data-action'); 
        var updatedAction = formAction.replace(':id', categoryId); 
        document.getElementById('deleteCategoryForm').setAttribute('action', updatedAction); 
    });

    //   js para pesquisa sincrona do search
    $(document).ready(function () {
        $('#pesquisa').on('keyup', function () {
            var textoPesquisa = $(this).val().toLowerCase();
            
            $('tbody tr').each(function () {
                var linha = $(this).text().toLowerCase();
                
                if (linha.indexOf(textoPesquisa) === -1) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    });
    
        
