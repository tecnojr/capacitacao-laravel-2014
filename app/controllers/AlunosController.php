<?php

class AlunosController extends BaseController{
	
	public function getIndex(){
		$alunos = Aluno::all();

		return View::make("alunos.table")->withAlunos($alunos);
	}

	public function getTurmas($id){
		$aluno = Aluno::find($id);

		$turmas = $aluno->turmas()->lists("turma_id");

		return View::make("alunos.turmas", compact("aluno", "turmas"));
	}

	public function postTurmas($id){
		$aluno = Aluno::find($id);
		$aluno->turmas()->sync(Input::get("turmas", []));

		return Redirect::to("/alunos/edit/$id/turmas");
	}

	protected function formView($id=null){
		$aluno = Aluno::findOrNew($id);

		if($aluno->data_nasc){
			$aluno->data_nasc->setToStringFormat("Y-m-d");
		}

		return View::make("alunos.form")->withAluno($aluno);
	}

	protected function store($id=null){
		$aluno = Aluno::findOrNew($id); 

		$aluno->nome = Input::get("nome");
		$aluno->matricula= Input::get("matricula");
		$aluno->data_nasc= Input::get("data_nasc");

		if($aluno->save()){
			return Redirect::to("alunos");			
		} 
		else{
			dd("Erro!");
		}
	}


	public function getDelete($id){
		Aluno::find($id)->delete();

		return Redirect::to("alunos");	 
	}

}