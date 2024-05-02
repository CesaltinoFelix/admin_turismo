<?php
class BD_Usuario
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
    // public function getLogin($email, $senha)
    // {

    //     $query = "select * from tb_usuario where email = '$email' and senha = '$senha'";

    //     $result = mysqli_query($this->conn, $query);

    //     return mysqli_fetch_array($result);
    // }

    public function getLogin($email, $senha)
    {
        $query = "SELECT * FROM tb_usuario WHERE email = '$email'";

        $result = mysqli_query($this->conn, $query);

        // Verifica se encontrou um usuário com o email fornecido
        if ($result && mysqli_num_rows($result) > 0) {
            // Obtém os dados do usuário
            $usuario = mysqli_fetch_assoc($result);

            // Verifica se a senha fornecida corresponde ao hash armazenado
            if (password_verify($senha, $usuario['senha'])) {
                // Senha válida, retorna os dados do usuário
                return $usuario;
            } else {
                // Senha inválida
                return null;
            }
        } else {
            // Usuário não encontrado
            return null;
        }
    }


    // public function getLoginStatus($email, $senha)
    // {
    //     $query = "select * from tb_usuario where email = '$email' and senha = '$senha' and status = 1 ";

    //     $result = mysqli_query($this->conn, $query);

    //     return mysqli_fetch_array($result);
    // }

    public function getLoginStatus($email, $senha)
    {
        // Consulta SQL para obter o usuário com base no email, senha e status ativo (status = 1)
        $query = "SELECT * FROM tb_usuario WHERE email = '$email' AND status = 1";

        // Executa a consulta
        $result = mysqli_query($this->conn, $query);

        // Verifica se encontrou um usuário com o email fornecido e status ativo
        if ($result && mysqli_num_rows($result) > 0) {
            // Obtém os dados do usuário
            $usuario = mysqli_fetch_assoc($result);

            // Verifica se a senha fornecida corresponde ao hash armazenado
            if (password_verify($senha, $usuario['senha'])) {
                // Senha válida e status ativo, retorna os dados do usuário
                return $usuario;
            } else {
                // Senha inválida
                return null;
            }
        } else {
            // Usuário não encontrado ou status não ativo
            return null;
        }
    }

    public function getUsuario($id)
    {
        $query = "select * from tb_usuario where id = '$id'";

        $result = mysqli_query($this->conn, $query);

        return mysqli_fetch_array($result);
    }
    public function deleteUsuario($id)
    {
        $query = "delete from tb_usuario where id = '$id'";

        $result = mysqli_query($this->conn, $query);

        return $result;
    }
    public function bloquearOuDesbloquearUsuario($id, $valor)
    {
        $query = "UPDATE tb_usuario SET status = $valor where id = '$id'";

        $result = mysqli_query($this->conn, $query);

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

        return $usuarios;
    }

    public function postUsuario(Model_Usuario $usuario)
    {
        $senhaHash = password_hash($usuario->senha, PASSWORD_DEFAULT);
        $query = "INSERT INTO tb_usuario(email,nome,contacto,senha,is_admin,status) VALUES 
        ('$usuario->email','$usuario->nome','$usuario->contacto',
        '$senhaHash','$usuario->is_admin','$usuario->status')";

        $resultado = mysqli_query($this->conn, $query);

        return $resultado;
    }

    public function editarUsuario($id, $nome, $email, $contacto)
    {
        $query = "UPDATE tb_usuario SET nome = '$nome', email = '$email', contacto = '$contacto' WHERE id = '$id'";

        $resultado = mysqli_query($this->conn, $query);

        return $resultado;
    }


}
