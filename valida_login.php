<?
    $valida_senha = false;
    $usuarioId = null;
    $usuarioPerfilId = null;

    session_start();
    $_SESSION['autenticado'] = 'NAO'; 
    echo '<hr>';

    // print_r($_POST);
    // echo '<br/>';
    // echo $_POST['email'];
    // echo '<br/>';
    // echo $_POST['senha'];
    // echo '<br/>';

    $perfilUsuario = array(1 => 'administrativo', 2 => 'usuario');


    $usuarioApp = array(
        array('id'=> 1,'email'=> 'adm@teste.com', 'senha'=> '12345', 'perfil'=>1),
        array('id'=> 2,'email'=> 'teste@teste.com', 'senha'=> '123456','perfil'=>2),
    );
    // echo '<pre>';
    // print_r($usuarioApp);
    // echo '</pre>';

    foreach($usuarioApp as $user){
       if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
           $valida_senha = true;
           $usuarioId = $user['id'];
           $usuarioPerfilId = $user['perfil'];
        //    print_r($usuarioId);
       }
    }
    if($valida_senha){
        // echo 'usuário autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuarioId;
        $_SESSION['perfil'] = $usuarioPerfilId;
        header('Location: home.php');

    }else{
        header('Location: index.php?login=erro');
        $_SESSION['autenticado'] = 'NAO';
    }

?>