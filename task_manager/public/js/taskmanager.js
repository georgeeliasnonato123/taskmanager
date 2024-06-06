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
    
    