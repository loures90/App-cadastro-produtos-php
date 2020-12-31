<?
    session_start();

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    $arquivo = fopen('../../app_help_desk/arquivo.hd', 'a');


    $texto = $_SESSION['id'] .'#'. $_POST['titulo'] .'#'. $_POST['categoria'] .'#'. $_POST['descricao']. PHP_EOL;
    $texto = str_replace('#',' - ', $texto);
    echo $texto;

    fwrite($arquivo, $texto);
    fclose($arquivo);
    header('Location: abrir_chamado.php');

?>