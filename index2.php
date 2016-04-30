<?php  

// Formas diferentes de se ter o autoload
#require_once 'autoload.php';
#require_once 'vendor/autoload.php';

require_once 'config.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Projeto do Curso de PHP Orientado a Objetos</title>
</head>
<body>
	<?php 
		
		/* Exibindo os dados da classe Pessoa() */
		// $pessoa = new \app\classes\Pessoa();
		// $pessoa->nome();

		// ============================

		// Exibindo os dados do banco fazendo a listagem na criação do bjeto
		//$postsEncontrados = \app\models\Post::find('all'); // Metodo estatico find que retorna os dados;

		// Exibindo os dados
		// foreach($postsEncontrados as $posts){
		// 	echo $posts->post_titulo;
		// }

		// ============================

		/* Exibindo os dados do banco com um método da classe */
		//$post = new \app\models\Post();
		//$postsEncontrados = $post->listar();

		// Exibindo os dados
		// $listarPost = new ArrayIterator($postsEncontrados);
		// while($listarPost->valid()):
		// 	echo $listarPost->current()->post_titulo."<br />";
		// 	$listarPost->next();
		// endwhile;

		// ============================

		/* Retornando um ou mais valores com determinados parametros */

		// $post = new \app\models\Post();
		// $postsEncontrados = $post->pegarPeloId('post_id', '1', 'single');

		// print_r($postsEncontrados);

		// $listarPost = new ArrayIterator($postsEncontrados);
		// while($listarPost->valid()):
		// 	echo $listarPost->current()->post_titulo."<br />";
		// 	$listarPost->next();
		// endwhile;

		// ============================

		/* Cadastrando no banco */

		// $post = new \app\models\Post();

		// $attribtes = array( 
		// 	'post_titulo' => 'testeando',
		// 	'post_categoria' => 5, 
		// 	'post_data' => '2016-08-08',
		// 	'post_conteudo' => 'testando isso aqui', 
		// 	'post_autor' => 0
		// 	);

		// try{
		// 	$post->cadastrar($attribtes);
		// } catch(\ActiveRecord\ActiveRecordException $e) {
		// 	echo $e->getMessage();
		// }

		// ============================

		/* Atualizando dados do Banco */

		// $post = new \app\models\Post();

		// $attributes = array( 
		// 	'post_titulo' => 'teste2',
		// 	'post_categoria' => '4',
		// 	);

		// try{
		// 	$post->atualizar('6', $attributes);
		// } catch(\ActiveRecord\ActiveRecordException $e) {
		// 	echo $e->getMessage();
		// }

		// ============================

		/* Deletando dados do Banco */

		$post = new \app\models\Post();
		$post->deletar('7');
		
	?>
</body>
</html>