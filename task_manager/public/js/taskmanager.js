    // mostrar form de vategorias
    document.getElementById('showNewCategoryField').addEventListener('click', function() {
        document.getElementById('newCategoryField').style.display = 'block';
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Adiciona um listener para o clique no botão "Excluir"
        document.querySelectorAll('.btn-show-modal').forEach(function(button) {
            button.addEventListener('click', function(event) {
            
                var targetModalId = this.getAttribute('data-target');
                
                var modalWrapper = document.getElementById(targetModalId);
                
                modalWrapper.style.display = 'block';
            });
        });
    });

    //função para fechar o modal
    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            modal.style.display = "none";
        }
    }
    // Função para fechar a notificação
    function closeNotification(button) {
        const notification = button.parentElement;
        notification.style.display = 'none';
    }

    // Esconder a notificação após 5 segundos 
    document.addEventListener('DOMContentLoaded', function() {
        const notifications = document.querySelectorAll('.notification');
        notifications.forEach(function(notification) {
            setTimeout(function() {
                notification.style.display = 'none';
            }, 2500);
        });
    });
    //função para mostrar o menu na tela mobile
    document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
    document.querySelector('nav').classList.toggle('hidden');
        });
    });

    //função do modal
    document.querySelectorAll('.edit-task').forEach(button => {
        //joga o id para o modal para conseguir dá um update
        button.addEventListener('click', function() {
            const taskId = this.getAttribute('data-taskid');
            const editTaskForm = document.getElementById('editTaskForm');
            editTaskForm.setAttribute('action', editTaskForm.getAttribute('action').replace('__TASK_ID__', taskId));
            document.getElementById('task_id').value = taskId;
    
            // Exibir o modal
            const editModal = document.getElementById('editModal');
            editModal.classList.remove('hidden');
            editModal.style.display = 'block'; 
        });
    });

    //função para ocultar o modal se clicar no x
    function closeEditModal() {
        var editModal = document.getElementById('editModal');
        editModal.style.display = "none";
    }
    
    $(document).ready(function(){
        // Abrir modal ao clicar no botão
        $('#openModalButton').click(function(){
            $('#editCategoryModal').removeClass('hidden');
        });
    
        // Fechar modal ao clicar no botão Cancelar
        $('#closeModalButton').click(function(){
            $('#editCategoryModal').addClass('hidden');
        });
    
        // Quando a seleção da categoria é alterada
        $('#editCategorySelect').change(function(){
            // Obtém o valor selecionado do select
            var selectedCategoryId = $(this).val();
            // Obtém o nome da categoria selecionada
            var selectedCategoryName = $(this).find(':selected').data('name');
            
            // Atualiza o valor da input de texto com o nome da categoria selecionada
            $('#editCategoryName').val(selectedCategoryName);
        });
    });
    // js para jogar o id da categoria para o controller
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('editCategorySelect').addEventListener('change', function() {
            var categoryId = this.value; 
            var formAction = document.getElementById('updateCategoryForm').getAttribute('data-action'); // Obtém a URL base do atributo data-action
            var updatedAction = formAction.replace(':id', categoryId); // Substitui o marcador de posição :id pelo ID selecionado
            document.getElementById('updateCategoryForm').setAttribute('action', updatedAction); // Define a URL atualizada como a ação do formulário
        });
    });
    //   codigo para pesquisa sincrona
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
    
        
