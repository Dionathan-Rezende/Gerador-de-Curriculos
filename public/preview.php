<?php
$file = isset($_GET['file']) ? basename($_GET['file']) : '';
$path = __DIR__ . '/../data/cvs/' . $file;
if (!file_exists($path)) {
echo '<p>Arquivo não encontrado.</p><a href="index.php">Voltar</a>';
exit;
}
$data = json_decode(file_get_contents($path), true);
function e($v){return htmlspecialchars($v ?? '', ENT_QUOTES,'UTF-8');}
?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Currículo - <?php echo e($data['nome']); ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
@media print {
    .no-print { display: none }
    body { font-size: 10pt; }
    .container { max-width: 100%; padding: 0 !important; }
}
h5 { border-bottom: 2px solid #0d6efd; padding-bottom: 5px; margin-top: 1.5rem; color: #0d6efd; }
</style>
</head>
<body>
<div class="container mt-4 mb-5 p-4 border shadow-sm" style="max-width: 850px;">
<div class="d-flex justify-content-between align-items-center pb-3 border-bottom mb-3">
<h2 class="mb-0 text-primary"><?php echo e($data['nome']); ?></h2>
<button class="btn btn-primary no-print" onclick="window.print()"><i class="fas fa-print"></i> Imprimir</button>
</div>

<p class="small text-muted mb-4">
    <i class="fas fa-envelope me-2"></i><strong>E-mail:</strong> <?php echo e($data['email']); ?> 
    <span class="mx-3">|</span> 
    <i class="fas fa-phone me-2"></i><strong>Telefone:</strong> <?php echo e($data['telefone']); ?> 
    <span class="mx-3">|</span> 
    <i class="fas fa-birthday-cake me-2"></i><strong>Idade:</strong> <?php echo e($data['idade']); ?> anos
</p>

<h5><i class="fas fa-id-card-alt me-2"></i> Resumo</h5>
<p class="text-secondary"><?php echo nl2br(e($data['resumo'])); ?></p>


<h5><i class="fas fa-briefcase me-2"></i> Experiências</h5>
<?php foreach ($data['experiencias'] as $exp): ?>
<div class="mb-3">
    <p class="mb-1">
        <strong class="text-dark"><?php echo e($exp['cargo']); ?></strong> 
        <small class="text-muted"> - <?php echo e($exp['empresa']); ?> (<?php echo e($exp['periodo']); ?>)</small>
    </p>
    <p class="small text-secondary ps-3 border-start border-3 border-success"><?php echo nl2br(e($exp['descricao'])); ?></p>
</div>
<?php endforeach; ?>

<h5><i class="fas fa-graduation-cap me-2"></i> Formação / Escolaridade</h5>
<?php foreach ($data['formacoes'] as $f): ?>
  <p class="mb-2">
    <strong class="text-dark"><?php echo e($f['curso']); ?></strong> - 
    <?php echo e($f['instituicao']); ?> 
    <span class="badge bg-primary ms-2"><?php echo e($f['ano']); ?></span>
  </p>
<?php endforeach; ?>

<h5><i class="fas fa-user-friends me-2"></i> Referências</h5>
<?php foreach ($data['referencias'] as $ref): ?>
<p class="mb-2">
    <strong class="text-dark"><?php echo e($ref['nome']); ?></strong> - 
    <span class="text-info"><?php echo e($ref['contato']); ?></span>
</p>
<?php endforeach; ?>
</div>
</body>
</html>