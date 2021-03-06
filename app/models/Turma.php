<?php

/**
 * Turma
 *
 * @property integer $id
 * @property integer $professor_id
 * @property integer $disciplina_id
 * @property string $codigo
 * @property-read \Disciplina $disciplina
 * @property-read \Professor $professor
 * @property-read \Illuminate\Database\Eloquent\Collection|\Aluno[] $alunos
 * @property-read mixed $descricao
 * @method static \Illuminate\Database\Query\Builder|\Turma whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Turma whereProfessorId($value)
 * @method static \Illuminate\Database\Query\Builder|\Turma whereDisciplinaId($value)
 * @method static \Illuminate\Database\Query\Builder|\Turma whereCodigo($value)
 */
class Turma extends Eloquent{
	use ValidationTrait;

	protected $table = "turmas";
	public $timestamps = false;

	protected $rules = [
		"disciplina_id" => "required|exists:disciplinas,id",
		"professor_id"  => "exists:professores,id",
		"codigo" 				=> "required|min:3"
	];

	protected $messages = [
		"disciplina_id.required" 	=> "Você deve escolher uma disciplina.",
		"disciplina_id.exists" 		=> "A disciplina selecionada não existe.",
		"professor_id.exists" 		=> "O professor selecionado não existe.",
		"codigo.required" 				=> "O código da turma é obrigatório.",
		"codigo.min" 							=> "O código da turma deve conter ao menos :min caracteres."
	];

	public function disciplina(){
		return $this->belongsTo("Disciplina");
	}

	public function professor(){
		return $this->belongsTo("Professor");
	}

	public function alunos(){
		return $this->belongsToMany("Aluno", "alunos_turmas");
	}

	public function getDescricaoAttribute(){
		return $this->disciplina->codigo." - ".$this->disciplina->descricao." ".$this->codigo;
	}

}