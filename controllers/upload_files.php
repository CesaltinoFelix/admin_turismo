<?php
function uploadImagem($file)
{
    // Diretório onde as imagens serão armazenadas
    $targetDir = "./../uploads/";

    // Obtém a extensão do arquivo
    $fileExtension = pathinfo($file["name"], PATHINFO_EXTENSION);

    // Nome único para o arquivo baseado na data atual
    $fileName = 'imagem_' . date('Y-m-d_H-i-s') . '.' . $fileExtension;

    // Caminho completo do arquivo
    // $targetFilePath = $targetDir . $fileName;
    $targetFilePath = $targetDir . $fileName;

    // Verifica se é uma imagem real
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        return false; // Retorna falso se não for uma imagem
    }

    // Verifica se o arquivo já existe
    if (file_exists($targetFilePath)) {
        return false; // Retorna falso se o arquivo já existir
    }

    // Verifica o tamanho do arquivo (nesse exemplo, limitado a 5MB)
    if ($file["size"] > 5000000) {
        return false; // Retorna falso se o arquivo for muito grande
    }

    // Move o arquivo para o diretório de destino
    if (!move_uploaded_file($file["tmp_name"], $targetFilePath)) {
        return false; // Retorna falso se houver um erro ao mover o arquivo
    }

    // Retorna o caminho completo do arquivo após o upload bem-sucedido
    return $fileName;
}