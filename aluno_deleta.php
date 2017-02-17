<?php
$id=filter_input(INPUT_GET, 'id' , FILTER_VALIDATE_INT);

if($id)
{
	$buffer=array();

	$ponteiroArquivo=fopen('arquivo_aluno.txt','r');
	while (!feof($ponteiroArquivo) )
	{
		$linha= fgets($ponteiroArquivo, 1024);
		$linhaAtual = explode(';',$linha);
		if($linhaAtual[0]!=$id)
		{
			$buffer[]=$linha;
		}
	}
	fclose($ponteiroArquivo);
	
	$ponteiroArquivo1 =fopen('arquivo_aluno.txt','w');
	foreach ($buffer as $linha1)
	{
		fwrite($ponteiroArquivo1,$linha1);
	}
	fclose($ponteiroArquivo1);
	
	$mensagem='Exclusão realizada com sucesso ';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");

}else{
	$mensagem='Informe um id para deletar';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");
}