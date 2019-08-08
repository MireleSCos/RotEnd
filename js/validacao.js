
function validar(){
	var nome = document.getElementById("nome").value;
	var cpf = document.getElementById("cpf").value;
	var endereco = document.getElementById("endereco").value;
	var telefone = document.getElementById("telefone").value;
	var email = document.getElementById("email").value;
	//Definir como vai ser a senha!

	var Reg_nome = /[a-z]\s[a-z]/gi;
		
	if(Reg_nome.test(nome)){
		alert = ('Seu nome está certo!');
	}
	else{
		alert = ('Nome errado!');
	}
	
	var Reg_cpf = /[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}/g;
	if(Reg_cpf.test(cpf)){
		alert=('CPF válido!');
	}
	else{
		alert = ('CPF inválido!');
	}
	
	var Reg_endereco = /^[a-z],?[0-9]{0,5}/ig;
	if(Reg_endereco.test(endereco)){
		alert=('Endereço válido!');
	}
	else{
		alert = ('Endereço inválido!');
	}

	var Reg_telefone = 	/^\([0-9]{2}\) [0-9]{4,5}-?[0-9]{4}$/;
	if(Reg_telefone.test(telefone)){
		alert=('Seu telefone está certo!');
	}
	else{
		alert = ('telefone errado!');
	}

	var Reg_email = 	/^([\w\-]+\.)*[\w\- ]+@([\w\- ]+\.)+([\w\-]{2,3})$/gi;
	if(Reg_email.test(email)){
		alert=('Email certo!');
	}
	else{
		alert = ('Email errado!');
	}	

	//senha aqui!

l}