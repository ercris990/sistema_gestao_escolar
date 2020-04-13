$("#aluno").change(function() {
    var matricula = $("#aluno").val();
    $.ajax({
        url: "secretaria/matricula/guardar",
        type: "POST",
        data: { aluno: aluno },
        success: function(data) {
            $("requestAnimationFramecao feita com sucesso").val(data);
        }
    });
});