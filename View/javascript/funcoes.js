function mascara(i) {

  var v = i.value;

  if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
    i.value = v.substring(0, v.length - 1);
    return;
  }

  i.setAttribute("maxlength", "14");
  if (v.length == 3 || v.length == 7) i.value += ".";
  if (v.length == 11) i.value += "-";
}

const handlePhone = (event) => {
  let input = event.target
  input.value = phoneMask(input.value)
}

const phoneMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g, '')
  value = value.replace(/(\d{2})(\d)/, "($1) $2")
  value = value.replace(/(\d)(\d{4})$/, "$1-$2")
  return value
}

const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')

if (toastTrigger) {
  const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
  toastTrigger.addEventListener('click', () => {
    toastBootstrap.show()
  })
}



function checkPasswords() {
  var password = document.forms["cadastro"]["password"].value;
  var conPassword = document.forms["cadastro"]["con-password"].value;

  if (password !== conPassword) {
    alert("As senhas não coincidem. Por favor, tente novamente.");
    return false;
  }

  alert("Cadastro concluido.");

  setTimeout(() => {
    window.location.href = 'login.html';
  }, 10);

  return true;
}

function checkReclamacao() {
  var textoR = document.forms["reclamacao"]["reclamacaoTxt"].value;
  // var emailR = document.forms["reclamacao"]["reclamacaoEmail"].value;

  if (!textoR) {
    alert("Preencha a reclamação");
    return false;
  }

  alert("Reclamação cadastrada.");

  setTimeout(() => {
    location.reload(true)
  }, 10);

  return true;
}

function requestLogin() {
  setTimeout(() => {
    window.location.href = "login";
  }, 400);

}

function apenasNumeros(event) {
  var tecla = event.which || event.keyCode;

  if ((tecla >= 48 && tecla <= 57) || (tecla >= 96 && tecla <= 105)) {
    return true;
  } else if (tecla === 8 || tecla === 37 || tecla === 39 || tecla === 46) {
    return true;
  } else {
    event.preventDefault();
    return false;
  }
}

function formatMonthAndYear(input) {
  var dateValue = input.value;
  var formattedValue = dateValue.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

  if (formattedValue.length > 6) {
      formattedValue = formattedValue.substr(0, 6); // Limita o valor a no máximo 6 dígitos (2 dígitos para o mês + 4 dígitos para o ano)
  }

  if (formattedValue.length >= 2) {
      var month = formattedValue.substr(0, 2);
      var year = formattedValue.substr(2);
      formattedValue = month + '/' + year;
  }

  input.value = formattedValue;
}