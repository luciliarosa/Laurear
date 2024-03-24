document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    let mail= document.getElementById('email').value;
    let pass = document.getElementById('password').value;
    let resp = document.getElementById('formBoxExtra').value;

    // Prepara as Informações para o envio
   const formData = new FormData()
   formData.append("mail", mail)
   formData.append("pass", pass)
   //efetuando a conexão com o php
   fetch("http://localhost/loginphp/api/login/",{
    method: "POST",
    mode: "no-cors",
    body: formData
   })
   .then(response => response.json())
   .then(data => {
    //console.log(data)
    localStorage.setItem('usstat', data.logd)
    localStorage.setItem('userid', data.usid)
    localStorage.setItem('usname', data.usnm)
    localStorage.setItem('usmail', data.mail)
    resp.textContent = data.msgn + " Carregando...";
    setTimeout(function(){
        document.location.href = "./app/home";
    }, 3000)
   })
   .catch(error =>{
    console.log("Erro no processamento", error)
    resp.textContent = "Usuário não encontrado no sistema!";
   })
});