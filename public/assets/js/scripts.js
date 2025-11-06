$(function(){
// Calcula idade automática
$('#nascimento').on('change', function(){
const nasc = new Date($(this).val());
const hoje = new Date();
let idade = hoje.getFullYear() - nasc.getFullYear();
const m = hoje.getMonth() - nasc.getMonth();
if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
$('#idade').val(idade);
});


// Campos dinâmicos de experiência
let exp = 0;
$('#add-exp').click(function(e){
e.preventDefault();
const html = `<div class='border p-2 mb-2'>
<input class='form-control mb-1' name='experiencias[${exp}][cargo]' placeholder='Cargo'>
<input class='form-control mb-1' name='experiencias[${exp}][empresa]' placeholder='Empresa'>
<input class='form-control mb-1' name='experiencias[${exp}][periodo]' placeholder='Período'>
<textarea class='form-control' name='experiencias[${exp}][descricao]' placeholder='Descrição'></textarea>
</div>`;
$('#exp-container').append(html);
exp++;
});


// Campos dinâmicos de referência
let ref = 0;
$('#add-ref').click(function(e){
e.preventDefault();
const html = `<div class='border p-2 mb-2'>
<input class='form-control mb-1' name='referencias[${ref}][nome]' placeholder='Nome'>
<input class='form-control' name='referencias[${ref}][contato]' placeholder='Contato'>
</div>`;
$('#ref-container').append(html);
ref++;
});
});