var formGerado = false;

function funcao() {
  if(formGerado){
      document.getElementById("dinamico").remove();
  }
  
  formGerado = true;

  var selectCargo = document.getElementById("cargo");
  var divSelectCargo = document.getElementById("cargos");
  var valorCargo = selectCargo.value;
  var supervisores = ["Joao Vidotti", "Carlos Tibério"];
  var gerentes = ["Fernando Donizete", "Marcelo Chisté"];


  if (valorCargo == 4) {
    mostraDropDown(divSelectCargo, supervisores,"supervisor");
    mostraDropDown(divSelectCargo, gerentes,"gerente");

  } else if (valorCargo == 3) 
  {
    mostraDropDown(divSelectCargo, supervisores,"supervisor");
  } else if (valorCargo == 2) {
    mostraDropDown(divSelectCargo, gerentes,"gerente");
  }

} 

function mostraDropDown(divSelectCargo, funcionario,cargo) {
  var select = document.createElement("select");
  select.className = "form-control";
  select.name = cargo;
  
  var div = document.createElement("div");
  div.className = "form-group";
  div.id = "dinamico";

  var label = document.createElement("label");
  label.textContent = "Qual o seu supervisor:";

  divSelectCargo.appendChild(div);
  div.appendChild(label);
  div.appendChild(select);

  for (var i = 0; i < funcionario.length; i++) {
    var option = document.createElement("option");
    option.value = funcionario[i];
    option.text = funcionario[i];
    select.appendChild(option);

  }
}


document.getElementById("cargo").addEventListener("change", funcao);