<?php 

namespace app\models;

abstract class appModel extends \ActiveRecord\Model implements \app\interfaces\iSql {

	public function pegarPeloId($campo, $valor, $tipo = null) {

		// Retorna um único valor
		//return parent::find('first', array('conditions' => array($campo.'=?', $valor)));

		// Retorna um ou mais valores
		$tipoListagem = ($tipo == null) ? 'first' : 'all';

		// find(qual será o retorno, campo a ser pesquisado, o valor)
		return parent::find($tipoListagem, array('conditions' => array($campo.'=?', $valor)));
		

	}

	public function cadastrar($attributes) {
		if(is_array($attributes)){
			// Chama o metodo de inserção de dados do php-activerecord passado os dados para serem inseridos
			return parent::create($attributes);
		}else{
			throw new \ActiveRecord\ActiveRecordException("Valor passado deve ser um array");
			
		}
	}

	public function atualizar($id, $attributes) {
		if(is_array($attributes)){
			$atualizar = parent::find($id);
			$atualizar->update_attributes($attributes);

		}else{
			throw new \ActiveRecord\ActiveRecordException("Valor passado deve ser um array");
			
		}
	}

	public function deletar($id) {
		$deletar = parent::find($id);
		$deletar->delete();
	}

	public function listar(){
		return parent::find('all');// Metodo estatico find que retorna os dados
	}

}