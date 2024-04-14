function verifica(){
    const status = localStorage.setItem('usstat');
    if(status !== 'logado'){
        document.body.textContent = "É preciso estar logado para usar esse recusrso.";
        setTimeout(function(){
            document.location.href = "http://localhost/Laurear/login.html";
        }, 3500)
    }
}