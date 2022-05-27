<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <Style>
        *{
            font-family: Arial, Times;
        }
        body{
            background-image: linear-gradient(to bottom, white, #D1FDEB);
            background-attachment: fixed;
        }
        .tabelinha, td, th{
            border: 1px solid black;
            border-collapse: collapse;
        }
        td, th{
            padding: 5px 10px; /* Primeiro parametro para top e bottom, e o segundo para left and right */
        }
        th{
            background-color: #C92B1C;
            color: white;
            border-radius: 5px 5px 0px 0px;
            text-align-last: center;
        }
        table tr:nth-child(odd) {
            background-color:#DFBFBD;
        }
        table tr:nth-child(even){
            background-color:white;
        }
        button{
            padding: 8px 20px;
            background-color: #c44940;
            border-radius: 4px;
            box-shadow: 4px 4px 8px #5e4a3ed3;
            color: white;
            cursor: pointer;
        }
        .botao:hover {
            background: #e05f56ef;
            box-shadow: inset 2px 2px 2px rgb(0 0 0 / 20%);
            text-shadow: none;
        }
        fieldset.grupo .campo {
        float:  left;
        }
        fieldset{
            border: 0;
        }
    </Style>
<fieldset class="grupo">
    <form action="" method="post">
        <div class="campo">
            <button type="submit" class="botao" style="margin-right: 1em; margin-left:785px;">Mostre todos os cadastros</button>
        </div>
        </form>
        <div class="campo">
            <a href="cadastro_e_listagem.html"><button class="botao">Voltar</button></a>
        </div>
    </fieldset> 
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $conn = new mysqli("localhost", "root", "", "bancolegal");

    if($conn->connect_errno){
        echo "Houve um erro. " . $conn->connect_error;
        exit;
    }
    $resultado = $conn->query("SELECT * FROM pessoa ORDER BY idpessoa");
    echo "<center><table class='tabelinha' border='1' style='position: absolute;
    top: 18%;
    left: 0;
    margin:0;
    transform: translate(37%, 0%);'>";
    echo "   <tr>";
    echo "       <th>#ID</th>";
    echo "       <th>Nome</th>";
    echo "       <th>Email</th>";
    echo "       <th>Celular</th>";
    echo "       <th>Telefone</th>";
    echo "       <th>Data de nascimento</th>";
    echo "       <th>CPF</th>";
    echo "       <th>CEP</th>";
    echo "       <th>Faculdade</th>";
    echo "   </tr>";
    while($linha = $resultado->fetch_assoc()){
        echo "   <tr> ";

        echo "       <td>";
        echo $linha['idpessoa'];
        echo "       </td>";

        echo "       <td>";
        echo $linha['nome'];
        echo "       </td>";

        echo "       <td>";
        echo $linha['email'];
        echo "       </td>";

        echo "       <td>";
        echo $linha['celular'];
        echo "       </td>";

        echo "       <td>";
        echo $linha['telefone'];
        echo "       </td>";
        
        echo "       <td>";
        echo $linha['data_de_nascimento'];
        echo "       </td>";

        echo "       <td>";
        echo $linha['CPF'];
        echo "       </td>";

        echo "       <td>";
        echo $linha['Cep'];
        echo "       </td>";

        echo "       <td>";
        echo $linha['faculdade'];
        echo "       </td>";

        echo "   </tr> ";
        }               

        echo " </table></center>";



        $resultado->close();
        $conn->close();
    }
    ?>
</body>