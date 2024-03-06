<?php

class BD_Postagem
{
    private $conn;

    public function __construct()
    {
        $this->conn = estabelecerConexao();
    }
    public function getPostagem($id)
    {
        $query = "SELECT * FROM tb_post WHERE id = '$id'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function getAllPostagens()
    {
        $query = "SELECT * FROM tb_post";
        $result = $this->conn->query($query);

        $postagens = array();

        while ($row = $result->fetch_assoc()) {
            $postagens[] = $row;
        }

        return $postagens;
    }

    public function insertPostagem($titulo, $data, $resumo, $descricao, $img_capa, $texto_enfase)
    {
        // Use prepared statements para evitar injeção de SQL
        $stmt = $this->conn->prepare("INSERT INTO tb_post (titulo, data, resumo, descricao, img_capa, texto_enfase) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $titulo, $data, $resumo, $descricao, $img_capa, $texto_enfase);

        if ($stmt->execute()) {
            return true;
        } else {
            
            return false;
        }
    }

    public function updatePostagem($id, $titulo, $data, $resumo, $descricao, $img_capa, $texto_enfase)
    {
        $stmt = $this->conn->prepare("UPDATE tb_post SET titulo = ?, data_actualizacao = ?, resumo = ?, descricao = ?, img_capa = ?, texto_enfase = ? WHERE id = ?");
        $stmt->bind_param("ssssssi", $titulo, $data, $resumo, $descricao, $img_capa, $texto_enfase, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePostagem($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM tb_post WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function __destruct()
    {
        // Feche a conexão quando o objeto for destruído
        $this->conn->close();
    }
}