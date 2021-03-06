<?php $select2 = true ?>

@extends("layouts.bootstrap")

@section("content")

<h1> Turmas do aluno {{$aluno->nome}}</h1>
	
{{Form::open(["class" => "form-horizontal"])}}
	
	<p>
		{{Form::select(
			"turmas[]", 
			[null => ""]+Turma::get()->lists("descricao", "id"), 
			$turmas, 
			["class"=>"form-control select2", "multiple" => true, "data-placeholder" => "Selecione a turma"]
 		)}}
	</p>
	
	<p>
		{{Form::submit("Salvar", ["class" => "btn btn-primary"])}}
		{{Form::reset("Resetar", ["class" => "btn btn-warning"])}}
		{{HTML::link("alunos", "Cancelar", ["class" => "btn btn-danger"])}}
	</p>
 		

{{Form::close()}}

@endsection