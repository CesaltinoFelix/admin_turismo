<?php
function estabelecerConexao()
  {
      $servername = "localhost"; // endereço do servidor MySQL
      $username = "root"; // nome de usuário do banco de dados
      $password = ""; // senha do banco de dados
      $database = "turismo"; // nome do banco de dados

      // Criar conexão
      $conn = new mysqli($servername, $username, $password, $database);

      // Verificar conexão
      if ($conn->connect_error) {
          die("Falha na conexão: " . $conn->connect_error);
      }

      return $conn;
  }
