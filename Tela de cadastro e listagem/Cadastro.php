<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $telefone = $_POST['telefone'];
    $data_de_nascimento = $_POST['data_de_nascimento'];
    $CPF = $_POST['CPF'];
    $CEP = $_POST['CEP'];
    $faculdade = $_POST['faculdade'];

    $connect=new mysqli("localhost", "root", '', "bancolegal");

    if($connect->connect_errno){
        echo "Houve um erro. " . $connect->connect_error;
    }
    else {
        echo "conexão estabelecida";
    }
    $result = $connect->query("SELECT nome FROM pessoa WHERE nome = '$nome'");
    
    /* Aqui a solução que tentei aplicar para as máscaras, mas sem resultado efetivo

    function limpatelefone($telefone){
        $telefone = trim($telefone);
        $telefone = str_replace("(","", $telefone);
        $telefone = str_replace(")","", $telefone);
        $telefone = str_replace("-","", $telefone);
        return $telefone;
       }
    $telefone = limpatelefone($telefone);
    $celular = str_replace("(","", $celular);
    $celular2 = str_replace(")","", $celular);*/
    

    $logarray = array();

    while($linha = $result->fetch_assoc()){
        $logarray = $linha['nome'];
    }

    $stmt = $connect->prepare("INSERT INTO pessoa (nome, email, celular, telefone, data_de_nascimento, CPF, Cep, faculdade) VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss",$nome, $email, $celular, $telefone, $data_de_nascimento, $CPF, $CEP, $faculdade);
    $inseriu = $stmt->execute();
    $connect->close();

    if($inseriu){
        echo "<script language='javascript' type='text/javascript'> 
        alert('Cadastro realizado com sucesso!');
        window.location.href='cadastro_e_listagem.html';
        </script>";
    }else{
        echo "<script language='javascript' type='text/javascript'> 
        alert('Ouve um erro ao incluir no cadstro, Tente novamente !!');
        window.location.href='cadastro_e_listagem.html';
        </script>";
        }
?>