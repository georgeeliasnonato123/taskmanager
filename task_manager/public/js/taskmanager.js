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
 // Função para fechar a notificação
 function closeNotification(button) {
    const notification = button.parentElement;
    notification.style.display = 'none';
}

// Esconder a notificação após 5 segundos (ajuste conforme necessário)
document.addEventListener('DOMContentLoaded', function() {
    const notifications = document.querySelectorAll('.notification');
    notifications.forEach(function(notification) {
        setTimeout(function() {
            notification.style.display = 'none';
        }, 2500); // 5000 milissegundos = 5 segundos
    });
});