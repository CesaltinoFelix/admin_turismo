<?php
class BD_Estatisticas
{
    private $conn;
    public function __construct()
    {
        $this->conn = estabelecerConexao();
    }

    public function __destruct()
    {
        $this->conn->close();
    }

    public function getTotalUsuarios()
    {
        $query = "SELECT COUNT(*) AS total FROM tb_usuario";

        $result = mysqli_query($this->conn, $query);
        $total = mysqli_fetch_assoc($result)['total'];

        mysqli_free_result($result);
        return $total;
    }
    public function getTotalReservas()
    {
        $query = "SELECT COUNT(*) AS total FROM tb_usuario";

        $result = mysqli_query($this->conn, $query);
        $total = mysqli_fetch_assoc($result)['total'];

        mysqli_free_result($result);
        return $total;
    }
    public function getTotalHoteis()
    {
        $query = "SELECT COUNT(*) AS total FROM tb_usuario";

        $result = mysqli_query($this->conn, $query);
        $total = mysqli_fetch_assoc($result)['total'];

        mysqli_free_result($result);
        return $total;
    }
    public function getTotalClientes()
    {
        $query = "SELECT COUNT(*) AS total FROM tb_usuario";

        $result = mysqli_query($this->conn, $query);
        $total = mysqli_fetch_assoc($result)['total'];

        mysqli_free_result($result);
        return $total;
    }
}
