<?php

//Captura as variaveis
//$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
//$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$id = isset($_POST['id']) ? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) : filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$aluno = filter_input(INPUT_POST, 'aluno', FILTER_SANITIZE_STRING);
$data_matricula = filter_input(INPUT_POST, 'data_matricula', FILTER_SANITIZE_STRING);
$status_pagamento = filter_input(INPUT_POST, 'status_pagamento', FILTER_VALIDATE_INT);
$salvar = filter_input(INPUT_POST, 'salvar', FILTER_VALIDATE_INT);

	
if(!$id)
{
	//CRIAR

	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$data_matricula){
			$mensagem['nome'] = 'Preencha a data da matricula';
		}elseif(!$status_pagamento){
			$mensagem['endereco'] = 'Informe o status do Pagamento';		
			//Abrir Conexão
		}else{
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');
			//Faz o Uso
			$query = "SELECT * FROM aulo where nome='$aluno'";
			$handle = mysqli_query($link, $query);
			$row = mysqli_fetch_assoc($handle);print_r($row);die();
			if(mysqli_num_rows($handle)>0)
			{
				$sql = "SELECT
							*
						FROM matriculas
						LEFT JOIN aluno ON (matriculas.id_aluno = aluno.id)
						LEFT JOIN cursos ON (matriculas.id_curso = cursos.id)
	   						";
				$resultado = mysqli_query($link, $sql);
			};
			//Inserindo os dados
			$sql = " insert into matriculas
			(
			data_matricula,
			status_pagamento,
			cursos
			)
			values
			(
			'$data_matricula',
			'$status_pagamento',
			'null'
			)";
			$resultado = mysqli_query($link, $sql);				
			//Fechei a conexao
			mysqli_close($link);
 

				
				
			$mensagem['sucesso'] = 'Registro inserido. Você já pode edita-lo.';
				
			header('location: index.php?pagina=matriculas&mensagem='.$mensagem['sucesso']);
				
		}

	}
}
else
{
	//EDITAR
	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$data_matricula){
			$mensagem['data_matricula'] = 'Preencha a data da matricula';
		}elseif(!$status_pagamento){
			$mensagem['status_pagamento'] = 'Informe o status do Pagamento';

			//Abrir Conexão
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');

			//Faz o Uso
			//Atualizando os dados
			$sql = "
			update aluno
			set
			nome= '$nome',
			endereco = '$endereco',
			cpf = '$cpf',
			email = '$email',
			data_nascimento = '$data_nascimento',
			responsavel = '$responsavel'
			
			where
			id = $id
			";
				
			$resultado = mysqli_query($link, $sql);
			//Fechei a conexao
			mysqli_close($link);

			$mensagem['sucesso'] = 'Registro Editado.';
			header('location: index.php?pagina=aluno&mensagem='.$mensagem['sucesso']);

		}

	}else{

		//Abrir Conexão
		$link = mysqli_connect('localhost','root','');
		$conexao = mysqli_select_db($link, 'maestro');

		//Faz o Uso
		//Buscar os dados
		$sql = "select id, nome, endereco, cpf, email, data_nascimento, responsavel from aluno where id = $id";

		$resultado = mysqli_query($link, $sql);

		$row = mysqli_fetch_row($resultado);

		$nome = $row[1];
		$endereco = $row[2];
		$cpf = $row[3];
		$email = $row[4];
		$data_nascimento = $row[5];
		$responsavel = $row[6];

		//Fechei a conexao
		mysqli_close($link);

	}
}
?>


<form method="post">
	<label>Aluno</label>
	<input type="text" name="aluno" value="<?php echo $aluno;?>" />
	<label>Data Matricula</label>
	<input type="text" name="data_matricula" value="<?php echo $data_matricula;?>" />
	<span><?=(isset($mensagem['usuario'])) ? $mensagem['usuario'] : '';?></span>
	<br/>
	<label>Status do Pagamento</label>
	<input type="text"  name="status_pagamento" value="<?php echo $status_pagamento;?>" />
	<br/>

	
	<button type="submit" name="salvar" value="1" class="btn btn-success">Salvar</button>
	
</form>