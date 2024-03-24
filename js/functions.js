function verifica(){
    const status = localStorage.setItem('usstat');
    if(status !== 'logado'){
        document.body.textContent = "É preciso estar logado para usar esse recusrso.";
        setTimeout(function(){
            document.location.href = "../../";
        }, 3500)
    }
}