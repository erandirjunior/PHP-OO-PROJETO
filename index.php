<?php  
require_once 'config.php';
// Cadastrar
if(isset($_POST['cadastrar'])):
	// Pegar os campos do formulario
	$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
	$texto  = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_MAGIC_QUOTES);
	// Cadastro no banco
	$post = new \app\models\Post();
	$attributes = [
		'post_titulo' => $titulo,
		'post_conteudo' => $texto
	];
	$cadastrar = $post->cadastrar($attributes);
	if($cadastrar):
		$msg = "Sucesso ao cadastrar";
	else:
		$msg = "Erro ao cadastrar";
	endif;
endif;
if(isset($_GET['ac'])):
	// Deleta do banco
	if ($_GET['ac'] == 'del'):
	$id = (int) $_GET['id'];
	$post = new \app\models\Post();
	$post->deletar($id);
	// Atualiza o dado
	elseif ($_GET['ac'] == 'at'):
		$id = (int) $_GET['id'];
		$post = new \app\models\Post();
		$postEncontrado = $post->pegarPeloId('post_id', $id);
		$titulo_update = $postEncontrado->post_titulo;
		$texto_update = $postEncontrado->post_conteudo;
		if(isset($_POST['atualizar'])):
			
			$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
			$texto  = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_MAGIC_QUOTES);
			$attributes = [
				'post_titulo' => $titulo,
				'post_conteudo' => $texto
			];
			$post->atualizar($id, $attributes);
			
		endif;
	endif;
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Projeto do Curso de PHP Orientado a Objetos</title>
	<link rel="stylesheet" type="text/css" href="vendor/twitter/bootstrap/dist/css/bootstrap.css">
</head>
<body> 
	<form action="" method="post">

		<label for="">Post</label>
		<input type="text" name="titulo" value="<?php echo isset($titulo_update) ? $titulo_update : ''; ?>" />

		</br>

		<label>Texto</label>
		<textarea name="texto"><?php echo isset($texto_update) ? $texto_update : ''; ?></textarea>

		</br>

		<label></label>
		<input type="submit" name="<?php echo isset($titulo_update) ? 'atualizar' : 'cadastar'; ?>" value="<?php echo isset($titulo_update) ? 'atualizar' : 'cadastar'; ?>">
	</form>
	<?php 
	echo isset($msg) ? $msg : '';
	// Exibindo os dados do Banco de dados
	$posts = new \app\models\Post();
	$postsCadastrados = $posts->listar();
	$posts = new ArrayIterator($postsCadastrados);
	while($posts->valid()):
	?>

	<p>	<?php echo $posts->current()->post_titulo."<br/>"; ?> | <a href="?ac=at&id=<?php echo $posts->current()->post_id; ?>">Atualizar</a> | <a href="?ac=del&id=<?php echo $posts->current()->post_id; ?>">Deletar</a>
	</p>
			
	<?php
		$posts->next();
	endwhile;
	?>
</body>
</html>