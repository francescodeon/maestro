<html>
<head>
<title>Maestro</title>
<link rel="stylesheet" href="./css/bootstrap.css" />
<link rel="stylesheet" href="./css/style.css" />
<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="./js/bootstrap.js"></script>
</head>

<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-lg-4" id="logo">
					<img src="./img/maestro.png" alt="Logo do Sistema" />
				</div>
				<div class="col-lg-8 " id="menu">
					<ul class="nav nav-pills pull-right">
						<li role="presentation"
							class="<?php (isset($_GET['menu']) && $_GET['menu']=='dashboard')?'active':'';?>"><a
							href="aluno_lista.php?menu=dashboard">Dashboard</a></li>
						<li role="presentation"
							class="<?=(isset($_GET['menu']) &&$_GET['menu']=='aluno')?'active':'';?>"><a
							href="aluno_lista.php?menu=aluno&formulario=0">Alunos</a></li>
						<li role="presentation"
							class="<?=(isset($_GET['menu']) &&$_GET['menu']=='professor')?'active':'';?>"><a
							href="aluno_lista.php?menu=professor&formulario=0">Professores</a></li>
						<li role="presentation"
							class="<?=(isset($_GET['menu']) &&$_GET['menu']=='coordenador')?'active':'';?>"><a
							href="aluno_lista.php?menu=coordenador&formulario=0">Coordenadores</a></li>
						<li role="presentation"
							class="<?=(isset($_GET['menu']) &&$_GET['menu']=='sair')?'active':'';?>"><a
							href="aluno_lista.php?menu=sair">Sair</a></li>
					</ul>
				</div>
			</div>

		</div>
	</header>

	<div id="content">
		<div class="container">
		<?php
		if (isset ( $_GET ['menu'] ) && $_GET ['menu'] == 'aluno') {?>
			<div class="row ">
				<h1>Dashboard</h1>
				<ol class="breadcrumb">
					<li><a href="#">Maestro</a></li>
					<li><a href="#">Alunos</a></li>
				</ol>
			</div>
			<?php if(isset ( $_GET ['formulario'] ) && $_GET['formulario'] == 0) { ?>
				<div class="row">
				<a href="aluno_lista.php?menu=aluno&formulario=1" class="btn btn-success">Adicionar</a>
				<table class="table table-striped table-bordered  table-hover">
					<tr>
						<td>ID</td>
						<td>Usuario</td>
						<td>Funções</td>
					</tr>
					<tr>
						<td>123</td>
						<td>Juares</td>
						<td><a href="#" class="btn btn-default btn-info">Editar</a> <a
							href="#" class="btn btn-default btn-danger">Deletar</a></td>
					</tr>
					<tr>
						<td>123</td>
						<td>Juares</td>
						<td><a href="#" class="btn btn-default btn-info">Editar</a> <a
							href="#" class="btn btn-default btn-danger">Deletar</a></td>
					</tr>
					<tr>
						<td>123</td>
						<td>Juares</td>
						<td><a href="#" class="btn btn-default btn-info">Editar</a> <a
							href="#" class="btn btn-default btn-danger">Deletar</a></td>
					</tr>
				</table>
			</div>
			<?php }else{?>
			
					<?=(isset($_GET['msg']))?$_GET['msg']:'';?>
					
						<form method="post" action="aluno_valida.php">
								<h1>Formulário</h1>
								<label for="id" class="labelform">ID</label>
								<input name="id" id="id<?php echo'oi';?>" type="text"class="inputform" />
								<label for="nome"class="labelform">Nome</label>
								<input name ="nome" type="text" id="nome" class="inputform" />
								<label for="email" class="labelform">E-Mail</label>
								<input name="email" type="text" id="email"class="inputform" />
								<input type="submit"value="Salvar"/>
			
						</form>
			<?php }
		}
		
		if (isset ( $_GET ['menu'] ) && $_GET ['menu'] == 'dashboard') {
			?>
			<div class="row ">
				<h1>Dashboard</h1>
				<ol class="breadcrumb">
					<li><a href="aluno_lista.php">Maestro</a></li>
					<li><a href="aluno_lista.php">Dashboard</a></li>
				</ol>
			</div>
			<?php
		}
		
		if (isset ( $_GET ['menu'] ) && $_GET ['menu'] == 'professor') {?>
			<div class="row ">
				<h1>Dashboard</h1>
				<ol class="breadcrumb">
					<li><a href="aluno_lista.php">Maestro</a></li>
					<li><a href="aluno_lista.php">Professores</a></li>
				</ol>
			</div>
			<?php if(isset ( $_GET ['formulario'] ) && $_GET['formulario'] == 0) {?>
			<div class="row">
				<a href="aluno_lista.php?menu=aluno&formulario=1" class="btn btn-success">Adicionar</a>
				<table class="table table-striped table-bordered  table-hover">
					<tr>
						<td>ID</td>
						<td>Usuario</td>
						<td>Funções</td>
					</tr>
					<tr>
						<td>123</td>
						<td>Juares</td>
						<td><a href="#" class="btn btn-default btn-info">Editar</a> <a
							href="#" class="btn btn-default btn-danger">Deletar</a></td>
					</tr>
					<tr>
						<td>123</td>
						<td>Juares</td>
						<td><a href="#" class="btn btn-default btn-info">Editar</a> <a
							href="#" class="btn btn-default btn-danger">Deletar</a></td>
					</tr>
					<tr>
						<td>123</td>
						<td>Juares</td>
						<td><a href="#" class="btn btn-default btn-info">Editar</a> <a
							href="#" class="btn btn-default btn-danger">Deletar</a></td>
					</tr>
				</table>
			</div>
			<?php }else{ ?>
						<form method="post">
								<h1>Formulário</h1>
								<label for="id" class="labelform">ID</label>
								<input name="id" id="id" type="text"class="inputform" />
								<label for="nome"class="labelform">Nome</label>
								<input name ="nome" type="text" id="nome" class="inputform" />
								<label for="e-mail" class="labelform">E-Mail</label>
								<input name="e-mail" type="text" id="email"class="inputform" />
								<input type="submit"value="Salvar"/>
			
						</form>
			<?php }
		}
		if (isset ( $_GET ['menu'] ) && $_GET ['menu'] == 'coordenador') {?>
			<div class="row ">
				<h1>Dashboard</h1>
				<ol class="breadcrumb">
					<li><a href="aluno_lista.php">Maestro</a></li>
					<li><a href="aluno_lista.php">Coordenadores</a></li>
				</ol>
			</div>
			<?php if(isset ( $_GET ['formulario'] ) && $_GET['formulario'] == 0) { ?>
			<div class="row">
				<a href="aluno_lista.php?menu=aluno&formulario=1" class="btn btn-success">Adicionar</a>
				<table class="table table-striped table-bordered  table-hover">
					<tr>
						<td>ID</td>
						<td>Usuario</td>
						<td>Funções</td>
					</tr>
					<tr>
						<td>123</td>
						<td>Juares</td>
						<td><a href="#" class="btn btn-default btn-info">Editar</a> <a
							href="#" class="btn btn-default btn-danger">Deletar</a></td>
					</tr>
					<tr>
						<td>123</td>
						<td>Juares</td>
						<td><a href="#" class="btn btn-default btn-info">Editar</a> <a
							href="#" class="btn btn-default btn-danger">Deletar</a></td>
					</tr>
					<tr>
						<td>123</td>
						<td>Juares</td>
						<td><a href="#" class="btn btn-default btn-info">Editar</a> <a
							href="#" class="btn btn-default btn-danger">Deletar</a></td>
					</tr>
				</table>
			</div>
			<?php }else{ ?>
						<form method="post">
								<h1>Formulário</h1>
								<label for="id" class="labelform">ID</label>
								<input name="id" id="id" type="text"class="inputform" />
								<label for="nome"class="labelform">Nome</label>
								<input name ="nome" type="text" id="nome" class="inputform" />
								<label for="email" class="labelform">E-Mail</label>
								<input name="email" type="text" id="email"class="inputform" />
								<input type="submit"value="Salvar"/>
			
						</form>
				<?php }		
		}
		if (isset ( $_GET ['menu'] ) && $_GET ['menu'] == 'sair') {?>
			<div class="row ">
				<h1>Dashboard</h1>
				<ol class="breadcrumb">
					<li><a href="aluno_lista.php">Maestro</a></li>
					<li><a href="aluno_lista.php">Sair</a></li>
				</ol>
			</div>
			<div>
				<form>
					<h1>Você deseja realmente sair ?</h1>
					<br /> <input type="submit" value="sim" />
				</form>
			</div>			
		<?php
		}	
		?>

		
			</div>


	</div>

	<footer>
		<div class="container">
			<div class="col-lg-12 text-center">
				<p>Sistema Maestro. Versão 1.0.0.1</p>
			</div>
		</div>

	</footer>

</body>
</html>
