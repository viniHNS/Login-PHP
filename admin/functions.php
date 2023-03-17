<?php 

    //Configuração basica do XAMPP
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "cadastro";

    // Conecta ao banco de dados
    $connect = mysqli_connect($host, $user, $pass, $db) or die("Erro ao conectar ao banco de dados");

    function login($connect){

        if(isset($_POST['acessar']) and !empty($_POST['email']) and !empty($_POST['senha'])){

            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = sha1($_POST['senha']);

            $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
            $result = mysqli_query($connect, $sql);

            $return = mysqli_fetch_assoc($result);

            if(!empty($return['email'])){

                session_start();
                $_SESSION['nome'] = $return['nome'];
                $_SESSION['id'] = $return['id'];
                $_SESSION['ativa'] = TRUE;
                header("location: index.php");

            } else {
                echo "Usuário não encontrado";
            }

           
        }
    }

    function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("location: login.php");
    }
    // Função para listar apenas um resultado, ID de referencia 
    function buscaUnica($connect, $tabela, $id){
        $sql = "SELECT * FROM $tabela WHERE id = " . (int) $id; 
        $result = mysqli_query($connect, $sql); 
        $return = mysqli_fetch_assoc($result);
        return $return;
    }

    // Função para listar todos os resultados
    function buscar($connect, $tabela, $where = 1, $order = ""){
        if(!empty($order)){
            $order = "ORDER BY $order";
        } 
        $sql = "SELECT * FROM $tabela WHERE $where $order";
        $result = mysqli_query($connect, $sql);
        $returns = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $returns;

    }

    function inserirUsuario($connect){
        if(isset($_POST['cadastrar']) and !empty($_POST['nome']) and !empty($_POST['email']) and !empty($_POST['senha'])){
           
            $erros = array();
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $nome = mysqli_real_escape_string($connect, $_POST['nome']);
            $senha = sha1($_POST['senha']);

            if($_POST['senha'] != $_POST['repetesenha']){
                $erros[] = "As senhas não conferem";
            }
            $sqlEmail = "SELECT email FROM usuarios WHERE email = '$email' ";
            $resultEmail = mysqli_query($connect, $sqlEmail);
            $verifyEmail = mysqli_num_rows($resultEmail);

            if($verifyEmail > 0){
                $erros[] = "E-mail já cadastrado";
            }

            if(empty($erros)){
                $sql = "INSERT INTO usuarios (nome, email, senha, data_nascimento, data_cadastro) VALUES ('$nome', '$email', '$senha', '$_POST[datanascimento]', NOW())";
                $result = mysqli_query($connect, $sql);
                if($result){
                    echo "Usuário cadastrado com sucesso";
                } else {
                    echo "Erro ao cadastrar usuário";
                }
            } else {
                foreach($erros as $erro){
                    echo $erro . "<br>";
                }
            }

        }
    }

    function deletar($connect, $tabela, $id){

        if(!empty($id)){
            $sql = "DELETE FROM $tabela WHERE id =" . (int) $id;
            $result = mysqli_query($connect, $sql);
            if($result){
                echo "Deletado com sucesso";
            } else {
                echo "Erro ao deletar";
            }
        }

        
    }

    function updateUser($connect){
        if(isset($_POST['atualizar']) and !empty($_POST['nome']) and !empty($_POST['email'])){
            
            $erros = array();
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $nome = mysqli_real_escape_string($connect, $_POST['nome']);
            $senha = "";
            $data = mysqli_real_escape_string($connect, $_POST['datanascimento']);

            if(empty($data)){
                $erros[] = "Data de nascimento não pode ser vazia";
            }

            if(strlen($nome) < 4){
                $erros[] = "Preencha o nome completo";
            }

            if(empty($email)){
                $erros[] = "Preencha o e-mail corretamente";
            }

            if(!empty($_POST['senha'])){
                if($_POST['senha'] == $_POST['repetesenha']){
                    $senha = sha1($_POST['senha']);
                    
                } else {
                    $erros[] = "As senhas não conferem";
                }
            }
            $sqlEmailAtual = "SELECT email FROM usuarios WHERE id = $id ";
            $resultEmailAtual = mysqli_query($connect, $sqlEmailAtual);
            $verifyEmailAtual = mysqli_fetch_assoc($resultEmailAtual);
            $verifyEmailAtual['email'];

            $sqlEmail = "SELECT email FROM usuarios WHERE email = '$email' AND email <> '" .$verifyEmailAtual['email']. "' ";
            $resultEmail = mysqli_query($connect, $sqlEmail);
            $verifyEmail = mysqli_num_rows($resultEmail);

            if($verifyEmail > 0){
                $erros[] = "E-mail já cadastrado";
            }

            if(empty($erros)){
                if(!empty($senha)){
                    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', data_nascimento = '$data' WHERE id = $id";
                } else {
                    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', data_nascimento = '$data' WHERE id = $id";
                }
                $result = mysqli_query($connect, $sql);

                if($result){
                    
                    echo "<script> verificaSucesso(); </script>";
                    
                    //header("location: editUser.php?id={$_POST['id']}");

                } else {
                    echo "Erro ao atualizar usuário";
                }
            } else {
                foreach($erros as $erro){
                    echo $erro . "<br>";
                }
            }


            

        }
    }

?>