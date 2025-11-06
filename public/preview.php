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
<style>@media print {.no-print{display:none}}</style>
</head>
<body>
<div class="container mt-3">
<div class="d-flex justify-content-between mb-3">
<h3><?php echo e($data['nome']); ?></h3>
<button class="btn btn-primary no-print" onclick="window.print()">Imprimir</button>
</div>
<p><strong>E-mail:</strong> <?php echo e($data['email']); ?> | <strong>Telefone:</strong> <?php echo e($data['telefone']); ?> | <strong>Idade:</strong> <?php echo e($data['idade']); ?></p>


<h5>Resumo</h5>
<p><?php echo nl2br(e($data['resumo'])); ?></p>


<h5>Experiências</h5>
<?php foreach ($data['experiencias'] as $exp): ?>
<p><strong><?php echo e($exp['cargo']); ?></strong> - <?php echo e($exp['empresa']); ?> (<?php echo e($exp['periodo']); ?>)<br><?php echo nl2br(e($exp['descricao'])); ?></p>
<?php endforeach; ?>

<h5>Formação / Escolaridade</h5>
<?php foreach ($data['formacoes'] as $f): ?>
  <p><strong><?php echo e($f['curso']); ?></strong> - <?php echo e($f['instituicao']); ?> (<?php echo e($f['ano']); ?>)</p>
<?php endforeach; ?>

<h5>Referências</h5>
<?php foreach ($data['referencias'] as $ref): ?>
<p><strong><?php echo e($ref['nome']); ?></strong> - <?php echo e($ref['contato']); ?></p>
<?php endforeach; ?>
</div>
</body>
</html>