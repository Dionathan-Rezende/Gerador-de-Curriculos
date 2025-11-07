// scripts.js
$(function(){
// 1. Calcula idade automática
$('#nascimento').on('change', function(){
const nasc = new Date($(this).val());
const hoje = new Date();
let idade = hoje.getFullYear() - nasc.getFullYear();
const m = hoje.getMonth() - nasc.getMonth();
if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
$('#idade').val(idade);
});


// 2. Campos dinâmicos de experiência
let exp = 0;
$('#add-exp').click(function(e){
e.preventDefault();
const html = `<div class='border p-2 mb-2 dynamic-field'>
<div class="d-flex justify-content-end mb-1">
    <button class='btn btn-danger btn-sm remove-field'>-</button>
</div>
<input class='form-control mb-1' name='experiencias[${exp}][cargo]' placeholder='Cargo'>
<input class='form-control mb-1' name='experiencias[${exp}][empresa]' placeholder='Empresa'>
<input class='form-control mb-1' name='experiencias[${exp}][periodo]' placeholder='Período'>
<textarea class='form-control' name='experiencias[${exp}][descricao]' placeholder='Descrição'></textarea>
</div>`;
$('#exp-container').append(html);
exp++;
});

// 3. Campos dinâmicos de formação
let formacao = 0;
$('#add-formacao').click(function(e){
  e.preventDefault();
  const html = `<div class='border p-2 mb-2 dynamic-field'>
    <div class="d-flex justify-content-end mb-1">
        <button class='btn btn-danger btn-sm remove-field'>-</button>
    </div>
    <input class='form-control mb-1' name='formacoes[${formacao}][curso]' placeholder='Curso / Formação'>
    <input class='form-control mb-1' name='formacoes[${formacao}][instituicao]' placeholder='Instituição'>
    <input class='form-control mb-1' name='formacoes[${formacao}][ano]' placeholder='Ano de Conclusão'>
  </div>`;
  $('#formacao-container').append(html);
  formacao++;
});

// 4. Campos dinâmicos de referência
let ref = 0;
$('#add-ref').click(function(e){
e.preventDefault();
const html = `<div class='border p-2 mb-2 dynamic-field'>
<div class="d-flex justify-content-end mb-1">
    <button class='btn btn-danger btn-sm remove-field'>-</button>
</div>
<input class='form-control mb-1' name='referencias[${ref}][nome]' placeholder='Nome'>
<input class='form-control' name='referencias[${ref}][contato]' placeholder='Contato'>
</div>`;
$('#ref-container').append(html);
ref++;
});

// 5. Lógica para remover o campo pai
$(document).on('click', '.remove-field', function(e) {
    e.preventDefault();
    $(this).closest('.dynamic-field').remove();
});

// ------------------------------------
// 6. Validação do Formulário ao Enviar
// ------------------------------------
$('#cv-form').on('submit', function(e) {
    let isValid = true;
    
    // Resetar estilos de erro e mensagens
    $('.is-invalid').removeClass('is-invalid');
    $('.error-message').remove();

    // 6.1. Validar Nome (obrigatório)
    const nome = $('input[name="nome"]');
    if (nome.val().trim() === '') {
        nome.addClass('is-invalid');
        nome.after('<div class="invalid-feedback error-message">O nome completo é obrigatório.</div>');
        isValid = false;
    }

    // 6.2. Validar Email (formato)
    const email = $('input[name="email"]');
    const emailValue = email.val().trim();
    if (emailValue !== '') {
        // Regex simples para formato de e-mail (user@dominio.extensao)
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailValue)) {
            email.addClass('is-invalid');
            email.after('<div class="invalid-feedback error-message">Por favor, insira um e-mail válido.</div>');
            isValid = false;
        }
    }

    if (!isValid) {
        e.preventDefault(); // Impede o envio
        // Pode remover o alert se quiser depender apenas do feedback visual do Bootstrap
        alert('Por favor, corrija os campos destacados antes de gerar o currículo.'); 
    }
});
});