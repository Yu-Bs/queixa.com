$(document).ready(function() {
    $('#formCadastro').submit(function(e) {
        e.preventDefault();
        
        $.ajax({
            url: 'insertLoginUsuario.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if(response.status === 'success') {
                    alert(response.msg); // Ou exiba em um modal
                    window.location.href = 'loginEmpCon.php';
                } else {
                    alert('Erro: ' + response.msg);
                }
            },
            error: function(xhr, status, error) {
                alert('Erro na requisição: ' + error);
            }
        });
    });
});