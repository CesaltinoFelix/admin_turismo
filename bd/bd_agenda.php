<?php

class BD_Agenda
{
    private $conn;

    public function __construct()
    {
        $this->conn = estabelecerConexao();
    }
    public function getAgenda($id)
    {
        $query = "SELECT * FROM disponiblidade_reserva WHERE id = '$id'";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function getAllPostagens()
    {
        $query = "SELECT * FROM disponiblidade_reserva";
        $result = $this->conn->query($query);

        $postagens = array();

        while ($row = $result->fetch_assoc()) {
            $postagens[] = $row;
        }

        return $postagens;
    }

    public function insertAgenda($provincia, $data, $valor, $vaga_total)
    {
        // Use prepared statements para evitar injeção de SQL
        $stmt = $this->conn->prepare("INSERT INTO disponiblidade_reserva (provincia, data, valor, vaga_total) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $provincia, $data, $valor, $vaga_total);

        if ($stmt->execute()) {
            return true;
        } else {
            
            return false;
        }
    }

    public function updateAgenda($id, $provincia, $data, $valor, $vaga_total)
    {
        $stmt = $this->conn->prepare("UPDATE disponiblidade_reserva SET provincia = ?, data = ?, valor = ?, vaga_total = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $provincia, $data, $valor, $vaga_total, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAgenda($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM disponiblidade_reserva WHERE id = ?");
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