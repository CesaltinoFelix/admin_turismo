<?php
// Verifica se o parâmetro de consulta 'r' está presente
if (isset($_GET['r'])) {
    // Verifica o valor do parâmetro 'r' e inclui o arquivo correspondente
    switch ($_GET['r']) {
        case 'login':
            include 'login.php';
            break;
        case 'cadastrar-usuario':
            include 'cad_usuario.php';
            break;
        case 'lista-usuario':
            include 'lista_usuario.php';
            break;
        case 'editar-usuario':
            include 'edit_usuario.php';
            break;
        case 'cadastrar-post':
            include 'cad_post.php';
            break;
        case 'lista-post':
            include 'lista_post.php';
            break;
        case 'lista-agenda':
            include 'lista_agenda.php';
            break;
        case 'editar-post':
            include 'edit_post.php';
            break;
        case 'agendar-passeio':
            include 'agendar_passeio.php';
            break;
        default:
            // Se o valor do parâmetro 'pagina' não corresponder a nenhuma rota definida, inclui a página 404
            include 'pages/404-page.html';
            break;
    }
} else {
    // Se o parâmetro 'pagina' não estiver presente, inclui a página inicial
    include 'home.php';
}
?>