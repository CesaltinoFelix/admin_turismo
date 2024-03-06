<?php
class BD_Usuario
{
    private $conn;
    public function __construct()
    {
        $this->conn = estabelecerConexao();
    }

    public function getLogin($email, $senha)
    {
        $query = "select * from tb_usuario where email = '$email' and senha = '$senha'";

        $result = mysqli_query($this->conn, $query);

        $this->conn->close();

        return mysqli_fetch_array($result);
    }
    public function getUsuario($id)
    {
        $query = "select * from tb_usuario where id = '$id'";

        $result = mysqli_query($this->conn, $query);

        $this->conn->close();

        return mysqli_fetch_array($result);
    }
    public function deleteUsuario($id)
    {
        $query = "delete from tb_usuario where id = '$id'";

        $result = mysqli_query($this->conn, $query);

        $this->conn->close();

        return $result;
    }
    public function getUsuarios()
    {
        $query = "SELECT * FROM tb_usuario";

        $result = mysqli_query($this->conn, $query);

        $usuarios = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $usuarios[] = $row;
        }

        $this->conn->close();

        return $usuarios;
    }

    public function postUsuario(Model_Usuario $usuario)
    {
        $query = "INSERT INTO tb_usuario(email,nome,contacto,senha,is_admin,status) VALUES 
        ('$usuario->email','$usuario->nome','$usuario->contacto',
        '$usuario->senha','$usuario->is_admin','$usuario->status')";

        $resultado = mysqli_query($this->conn, $query);

        $this->conn->close();

        return $resultado;
    }

    public function editarUsuario($id, $nome, $email, $contacto)
    {
        $query = "UPDATE tb_usuario SET nome = '$nome', email = '$email', contacto = '$contacto' WHERE id = '$id'";

        $resultado = mysqli_query($this->conn, $query);

        $this->conn->close();

        return $resultado;
    }


}
