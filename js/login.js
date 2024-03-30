document.getElementById("login-form").addEventListener("submit", function(event) {
    event.preventDefault()
    const mail= document.getElementById("email").value
    const pass = document.getElementById("password").value
    const resp = document.getElementById("formBoxExtra")

    // Prepara as Informações para o envio
   const formData = new FormData()
   formData.append("mail", mail)
   formData.append("pass", pass)
   //efetuando a conexão com o php
   fetch("http://localhost:8080/Laurear/php/index.php",{
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
        document.location.href = "http://localhost:8080/Laurear/index.html";
    }, 3000)
   })
   .catch(error =>{
    console.log("Erro no processamento", error)
    resp.textContent = "Usuário não encontrado no sistema!";
   })
});