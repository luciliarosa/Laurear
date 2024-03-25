document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;

    // Faz a requisição POST para o arquivo PHP de login
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/login.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Redireciona para a página de sucesso ou exibe mensagem de erro
            let response = JSON.parse(xhr.responseText);
            if (response.status === 'success') {
                window.location.href = 'index.html'; // Redirecionar para a página principal
            } else {
                alert('Usuário ou senha inválidos!');
            }
        }
    };
    xhr.send('username=' + encodeURIComponent(username) + '&password=' + encodeURIComponent(password));
});