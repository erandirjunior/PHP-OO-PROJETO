<?php 

namespace app\interfaces;

interface iSql {

	public function pegarPeloId($campo, $valor);
	public function cadastrar($attributes);
	public function atualizar($id, $attributes);
	public function deletar($id);
	public function listar();
	
}