<?php
include_once '../includes/_dados.php';
include_once '_head.php';

if( isset($_GET['id']) || !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM categorias WHERE CategoriaID = ".$id;
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado, MYSQLI_ASSOC);

}else{
    $id = '';
    $dados['Nome'] = '';
    $dados['Descricao'] = '';
}
include_once '_menu.php';
?>
    <main>
        <h2>Administração das Categorias</h2>
        <a href="categoria-lista.php">Listagem</a>
        <hr>
        <form acion="categoria-processa.php" method="post" enctype="multipart/form-data">
            <input type="text" value="salvar" name="acao">
            <input type="text" name="id" value="<?php echo $id;?>"><br>
            <label for="name">Nome</label><br>
            <input type="text" id="nome" value="<?php echo $dados['Nome'];?>"><br>
            <label for="descricao">Descrição:</label><br>
            <textarea id="descricao" name="descricao"><?php echo $dados['Descricao']?></textarea><br>
            <label for="imagem">Imagem:</label><br>
            <?php
            if( !empty($dados['Imagem']) ){
            ?>
                <imh src="../Imagens/categorias/<?php echo $dados ['Imagem'];?>" width="150" />
            <?php   
            }
            ?>
            <input type="file" name="foto">
            <hr>
            <input type="submit" value="Enviar">
        </form>
    </main>
<?php
    include_once '_footer.php';
?>