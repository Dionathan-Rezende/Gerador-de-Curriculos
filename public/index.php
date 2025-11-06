<?php ?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gerador de Currículos Simples</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container mt-4">
<h2 class="mb-3">Gerador de Currículos</h2>
<form id="cv-form" method="post" action="save.php">
<div class="card mb-3">
<div class="card-body">
<h5 class="card-title">Dados Pessoais</h5>
<div class="mb-3">
<label class="form-label">Nome completo *</label>
<input required name="nome" class="form-control">
</div>
<div class="row g-2">
<div class="col-md-6 mb-3">
<label class="form-label">Data de nascimento</label>
<input type="date" name="nascimento" id="nascimento" class="form-control">
</div>
<div class="col-md-3 mb-3">
<label class="form-label">Idade</label>
<input type="text" name="idade" id="idade" class="form-control" readonly>
</div>
<div class="col-md-3 mb-3">
<label class="form-label">Telefone</label>
<input name="telefone" class="form-control">
</div>
</div>
<div class="mb-3">
<label class="form-label">E-mail</label>
<input type="email" name="email" class="form-control">
</div>
<div class="mb-3">
<label class="form-label">Resumo profissional</label>
<textarea name="resumo" class="form-control" rows="4"></textarea>
</div>
</div>
</div>


<div class="card mb-3">
<div class="card-body">
<div class="d-flex align-items-center mb-2">
<h5 class="card-title mb-0">Experiências profissionais</h5>
<button id="add-exp" class="btn btn-sm btn-outline-primary ms-3">+</button>
</div>
<div id="exp-container"></div>
</div>
</div>


<div class="card mb-3">
<div class="card-body">
<div class="d-flex align-items-center mb-2">
<h5 class="card-title mb-0">Referências</h5>
<button id="add-ref" class="btn btn-sm btn-outline-primary ms-3">+</button>
</div>
<div id="ref-container"></div>
</div>
</div>


<button type="submit" class="btn btn-success">Gerar Currículo</button>
</form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>