function validarCampos() {
  const usuario = document.getElementById("usuario");
  const senha = document.getElementById("senha");
  const mensagem = document.getElementById("mensagem");
  

  // Validação básica (adicione mais regras conforme necessário)
  if (usuario.value.length < 5) {
    mensagem.textContent = "O nome de usuário deve ter pelo menos 5 caracteres.";
    return false;
  }

  if (senha.value.length < 8) {
    mensagem.textContent = "A senha deve ter pelo menos 8 caracteres.";
    return false;
  }

  // Aqui você pode adicionar mais validações, como:
  // - Verificar se a senha contém letras maiúsculas, minúsculas e números
  // - Verificar se a senha não contém o nome de usuário
  // - Chamar uma função para verificar a existência do usuário no servidor

  mensagem.textContent = "Campos válidos!";
  return true;
}