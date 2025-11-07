
<?php ?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gerador de Currículos Simples</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"> 
</head>
<body>
<div class="container mt-5 mb-5">
<h2 class="mb-4 text-center text-primary"><i class="fas fa-file-alt"></i> Gerador de Currículos Simples</h2>
<form id="cv-form" method="post" action="save.php">
<div class="card shadow-sm mb-4">
<div class="card-body">
<h5 class="card-title text-success"><i class="fas fa-user"></i> Dados Pessoais</h5>
<hr>
<div class="mb-3">
<label class="form-label">Nome completo *</label>
<input required name="nome" class="form-control">
</div>
<div class="row g-3"> <div class="col-md-6 mb-3">
<label class="form-label">Data de nascimento</label>
<input type="date" name="nascimento" id="nascimento" class="form-control">
</div>
<div class="col-md-3 mb-3">
<label class="form-label">Idade</label>
<input type="text" name="idade" id="idade" class="form-control" readonly>
</div>
<div class="col-md-3 mb-3">
<label class="form-label">Telefone</label>
<input name="telefone" class="form-control" placeholder="(DD) 9XXXX-XXXX">
</div>
</div>
<div class="mb-3">
<label class="form-label">E-mail</label>
<input type="email" name="email" class="form-control" placeholder="seu.email@exemplo.com">
</div>
<div class="mb-3">
<label class="form-label">Resumo profissional</label>
<textarea name="resumo" class="form-control" rows="4" placeholder="Descreva suas qualificações e objetivos..."></textarea>
</div>
</div>
</div>


<div class="card shadow-sm mb-4">
<div class="card-body">
<div class="d-flex align-items-center justify-content-between mb-3">
<h5 class="card-title mb-0 text-success"><i class="fas fa-briefcase"></i> Experiências profissionais</h5>
<button id="add-exp" class="btn btn-sm btn-success">+</button>
</div>
<div id="exp-container"></div>
</div>
</div>

<div class="card shadow-sm mb-4">
  <div class="card-body">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <h5 class="card-title mb-0 text-success"><i class="fas fa-graduation-cap"></i> Formação / Escolaridade</h5>
      <button id="add-formacao" class="btn btn-sm btn-success">+</button>
    </div>
    <div id="formacao-container"></div>
  </div>
</div>

<div class="card shadow-sm mb-4">
<div class="card-body">
<div class="d-flex align-items-center justify-content-between mb-3">
<h5 class="card-title mb-0 text-success"><i class="fas fa-user-friends"></i> Referências</h5>
<button id="add-ref" class="btn btn-sm btn-success">+</button>
</div>
<div id="ref-container"></div>
</div>
</div>


<button type="submit" class="btn btn-success btn-lg w-100 mt-3 mb-5">Gerar Currículo</button>
</form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>