<?php 
    session_start();
    include_once('config.php');
    if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
        
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    
    //$logado2 = $_SESSION['nome'];
    $logado = $_SESSION['email'];
    $sql = "SELECT * FROM dados_investimento ORDER BY id DESC;";
    $result = $conexao->query($sql);
    
    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../assets/images/ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/styles/portfolioAcoes.css">
    <script src="../assets/scripts/redirecionar.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <title>Portfólio de Ações</title>
</head>
<body>
    <header>
        <div class="menu-navegacao">
            <img id="logo-site" src="../assets/images/gateOption.png" alt="Logo do projeto e do site">
            <button class="botoes-menu-navegacao" onclick="irParaInvestir()">Investir</button>
            <a href="login.php" class="botoes-menu-navegacao"><button class="botoes-menu-navegacao" onclick="irParaLogin()">Sair</button></a>
            <!--<button class="botoes-menu-navegacao" onclick="irParaInvestir()">?></button>-->

        <div>
    </header>
    <main>
        <h1>Seja bem vindo ao seu Menu de Investimentos!</h1>
        <table>
            <caption class="grade-de-cotacoes">Grade de Cotações</caption>
            <thead>
                <tr>
                    <th scope="col"  id="ponta-superior-esquerda">#</th>
                    <th scope="col" >Empresa</th>
                    <th scope="col" >Seu Investimento</th>
                    <th scope="col" >Ações</th>
                    <th scope="col" >Saldo Atual</th>
                    <th  scope="col" id="ponta-superior-direita">Tempo (Mês)</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>" . $user_data['id']."</td>";
                        echo "<td>". $user_data['empresa']."</td>";
                        echo "<td>" . "R$ " . $user_data['investir']."</td>";
                        echo "<td>" . $user_data['minhasacoes']."</td>";
                        echo "<td>" . "R$ " . $user_data['lucromensal']."</td>";
                        echo "<td>" . $user_data['tempo']."</td>";
                    }
                ?>
                <!--<tr>
                    <td>1</td>
                    <td>ITUB3</td>
                    <td>R$27,70</td>
                    <td class="variacao-positiva">1.69%</td>
                    <td>R$291.75 Bi</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>PETR4</td>
                    <td>R$38,42</td>
                    <td class="variacao-positiva">0.58%</td>
                    <td>R$515,27 Bi</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>BBAS3</td>
                    <td>R$27,63</td>
                    <td class="variacao-positiva">1.25%</td>
                    <td>R$158,59 Bi</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>VALE3</td>
                    <td>R$61,14</td>
                    <td class="variacao-positiva">1.28%</td>
                    <td>R$278,10 Bi</td>
                </tr>
                <tr>
                    <td id="ponta-inferior-esquerda">5</td>
                    <td>META34</td>
                    <td>R$92,33</td>
                    <td class="variacao-negativa">1.51%</td>
                    <td id="ponta-inferior-direita">U$1,25 Tri</td>
                </tr>-->
            </tbody>
        </table>
    </main>
</body>
</html>