<script>
$(document).ready(function() {
  App.init();
  Dashboard.init();
});
/* ============== PESQUISA AUTOCOMPLETE ============== */
$(document).ready(function() {
  $('#pesquisar').autocomplete({
    source: "<?= base_url('secretaria/aluno/search/?'); ?>"
  });
});
/* ============== MASCARA ============== */
$(document).ready(function() {
  var options = {
    translation: {
      'A': {
        pattern: /[A-Z]/
      },
      'a': {
        pattern: /[a-z]/
      },
      'S': {
        pattern: /[A-Z0-9]/
      },
      'T': {
        pattern: /[M,T,N]/
      },
      'N': {
        pattern: /[9]/
      },
      'X': {
        pattern: /[0-9]/
      },
      '6': {
        pattern: /[0-6]/
      },
    }
  }
  /* ============== FORMULARIO [CADASTRO DE ALUNO] ============== */
  $("#contacto_aluno").mask("(+244) N00 000 000", options);
  $("#num_processo").mask("0000000");
  $("#nome_turma").mask("6A-T", options);
  $("#numero_sala").mask("00");
  $("#ano_let").mask("0000");
  $("#num_doc").mask("");
  /* ============== FORMULARIO [CADASTRO DE ENCARREGADO] ============== */
  $("#telemovel_encarregado").mask("(+244) N00 000 000", options);
  /* ============== FORMULARIO [CADASTRO DE FUNCIONARIO] ============== */
  $("#telemovel_funcionario").mask("(+244) N00 000 000", options);
  $("#bi_funcionario").mask("000000000AA000", options);
});
/* ============== PLACEHOLDERS ============== */
$(document).ready(function() {
  $("#contacto_aluno").attr({
    placeholder: "900 000 000"
  });
  $("#num_processo").attr({
    placeholder: "0000000"
  });
  $("#endereco_aluno").attr({
    placeholder: "Digite o endereço"
  });
});
/* ============== RADIOBUTO (MOSTRAR E OCULTAR CAMPOS) ============== */
$(document).ready(function() {
  $(".input-label, .user-password, #num_bi, #num_cedula, #num_passaporte, #label ")
    .hide();
});
/* ============== CHECKBOX [ SELECIONAR TODOS ] ============== */
$("#checkTodos").click(function() {
  $('.disciplinas').not(this).prop('checked', this.checked);
});
/* ============== MOSTRAR E OCULTAR CAMPOS NO. DOCUMENTO [FORM CRIAR NOVO ALUNO] ============== */
jQuery(function($) {
  $('.cpf-cnpj').change(function() {
    var options = {
      translation: {
        'A': {
          pattern: /[A-Z]/
        },
        'a': {
          pattern: /[a-z]/
        },
        'S': {
          pattern: /[A-Z0-9]/
        },
        'T': {
          pattern: /[M,T,N]/
        },
      }
    }
    var campo = $(this).val();
    if (campo == "B.I") {
      $("#InputTipo-doc").val('');
      $("#label-tipo-doc").html('Nº do Bilhete');
      $("#InputTipo-doc").mask("000000000AA000", options);
      $("#InputTipo-doc").removeAttr('disabled');
      $("#InputTipo-doc").attr({
        placeholder: "000000000LA000"
      });
    } else if (campo == "Cédula Pessoal") {
      $("#InputTipo-doc").val('');
      $("#label-tipo-doc").html('Nº da Cédula');
      $("#InputTipo-doc").mask("0000");
      $("#InputTipo-doc").removeAttr('disabled');
      $("#InputTipo-doc").attr({
        placeholder: "0000"
      });
    } else if (campo == "Passaporte") {
      $("#InputTipo-doc").val('');
      $("#label-tipo-doc").html('Nº do Passaporte');
      $("#InputTipo-doc").mask("A0000000", options);
      $("#InputTipo-doc").removeAttr('disabled');
      $("#InputTipo-doc").attr({
        placeholder: "N0000000"
      });
    }
  });
});
/* ============== ================== VALIDAÇÃO DE FORMULARIO ==================  ============== */
/* ============== VALIDAÇÃO CAMPO DATA DE NASCIMENTO ALUNO ============== */
function validadata_aluno() {
  var data = document.getElementById("nascimento_aluno").value; // pega o valor do input
  data = data.replace(/\//g, "-"); // Substitui eventuais barras (ex. IE) "/" por hífen "-"
  var data_array = data.split("-"); // Quebra a data em array
  // Para o IE onde será inserido no formato dd/MM/yyyy
  if (data_array[0].length != 4) {
    data = data_array[2] + "-" + data_array[1] + "-" + data_array[
      0]; // remonto a data no formato yyyy/MM/dd
  }
  // Compara as datas e calcula a idade
  var hoje = new Date();
  var nasc = new Date(data);
  var idade = hoje.getFullYear() - nasc.getFullYear();
  var m = hoje.getMonth() - nasc.getMonth();
  if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
  /* ============== IDADE MENO QUE  ============== */
  if (idade < 0) {
    alert("Selecione uma data de nascimento válida!");
    return false;
  }
  if (idade >= 0 && idade < 5) {
    alert("O candidato tem de ser maior de 5 anos!");
    return false;
  }
  /* ==============  ============== */
  if (idade >= 5 && idade <= 99) {
    //alert("Maior de 5, pode se cadastrar.");
    return true;
  }
  // Se for maior que 50 !
  //return false;
}
/* ============== VALIDAÇÃO CAMPO DATA DE NASCIMENTO ALUNO ============== */
function validadata_aluno_doc() {
  var data = document.getElementById("data_emissao_doc").value; // pega o valor do input
  data = data.replace(/\//g, "-"); // Substitui eventuais barras (ex. IE) "/" por hífen "-"
  var data_array = data.split("-"); // Quebra a data em array
  // Para o IE onde será inserido no formato dd/MM/yyyy
  if (data_array[0].length != 4) {
    data = data_array[2] + "-" + data_array[1] + "-" + data_array[
      0]; // remonto a data no formato yyyy/MM/dd
  }
  // Compara as datas e calcula a idade
  var hoje = new Date();
  var nasc = new Date(data);
  var idade = hoje.getFullYear() - nasc.getFullYear();
  var m = hoje.getMonth() - nasc.getMonth();
  if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
  /* ============== IDADE MENO QUE  ============== */
  if (idade < 0) {
    alert("Selecione uma data do documento válida!");
    return false;
  }
}
/* ============== VALIDAÇÃO CAMPO DATA DE NASCIMENTO FUNCIONARIO ============== */
function validadata_funcionario() {
  var data = document.getElementById("nascimento_funcionario").value; // pega o valor do input
  data = data.replace(/\//g, "-"); // Substitui eventuais barras (ex. IE) "/" por hífen "-"
  var data_array = data.split("-"); // Quebra a data em array
  // Para o IE onde será inserido no formato dd/MM/yyyy
  if (data_array[0].length != 4) {
    data = data_array[2] + "-" + data_array[1] + "-" + data_array[
      0]; // remonto a data no formato yyyy/MM/dd
  }
  // Compara as datas e calcula a idade
  var hoje = new Date();
  var nasc = new Date(data);
  var idade = hoje.getFullYear() - nasc.getFullYear();
  var m = hoje.getMonth() - nasc.getMonth();
  if (m < 0 || (m === 0 && hoje.getDate() < nasc.getDate())) idade--;
  /* ============== IDADE MENOR QUE  ============== */
  if (idade < 0) {

    alert("Selecione uma data de nascimento válida!");
    return false;
  }
  if (idade >= 0 && idade < 18) {

    alert("O candidato tem de ser maior de 18 anos!");
    return false;
  }
  /* ==============  ============== */
  if (idade >= 18 && idade <= 65) {

    //alert("Maior de 65, pode se cadastrar.");
    return true;
  }
  // Se for maior que 50 !
  // alert("O funcionario está acima da idade permitida!");
  // return false;
}
/* ============== VALIDAR CAMPO PESQUISAR AUTO COMPLETE ============== */
function validar_pesquisa() {
  var pesquisar = form_pesquisar.pesquisar.value;
  if (pesquisar == "") {
    return false;
  }
}
/* ============== FORMULARIO LOGIN ============== */
$(document).ready(function() {
  $('#form_login').validate({
    rules: {
      nome_user: {
        required: true
      },
      password: {
        required: true
      }
    }
  });
});
/* ============== FORMULARIO ANO LECTIVO ============== */
$(document).ready(function() {
  $('#form_anolectivo').validate({
    rules: {
      ano_let: {
        required: true
      }
    }
  });
});
/* ============== VALIIDAÇÃO DE FORMULARIO UTILIZADOR ============== */
$(document).ready(function() {
  $('#form_utilizador').validate({
    rules: {
      nome_user: {
        required: true,
        minlength: 2,
        minWords: 2
      },
      password: {
        required: true,
        minlength: 6
      },
      confirm_password: {
        required: true,
        equalTo: "#password"
      }
    }
  });
});
/* ============== VALIIDAÇÃO DE FORMULARIO ALTERAR PASSWORD ============== */
$(document).ready(function() {
  $('#form_password').validate({
    rules: {
      password_old: {
        required: true,
        minlength: 6
      },
      password_new: {
        required: true,
        minlength: 6
      },
      confirm_password: {
        required: true,
        equalTo: "#password_new"
      }
    }
  });
});
/* ============== VALIIDAÇÃO DE FORMULARIO GUIA DE TRANSFERENCIA ============== */
$(document).ready(function() {
  $('#form_guia_transferencia').validate({
    rules: {
      num_escola: {
        required: true,
        minlength: 4,
        maxlength: 4
      },
      provincia: {
        required: true
      },
      municipio: {
        required: true
      }
    }
  });
});
/* ============== VALIIDAÇÃO DE FALTA FUNCIONARIO ============== */
$(document).ready(function() {
  $('#falta_funcionario').validate({
    rules: {
      presenca_ausencia: {
        required: true
      },
      mes: {
        required: true
      }
    }
  });
});
/* ============== VALIIDAÇÃO DE ADD TURMA ============== */
$(document).ready(function() {
  $('#form_add_turma').validate({
    rules: {
      anolectivo: {
        required: true
      },
      turma_id: {
        required: true
      }
    }
  });
});
/* ============== VALIIDAÇÃO DE ADD LISTAGEN ============== */
$(document).ready(function() {
  $('#form_listagem').validate({
    rules: {
      anolectivo: {
        required: true
      },
      turma_id: {
        required: true
      }
    }
  });
});
/* ============== FORMULARIO ENCARREGADO ============== */
$(document).ready(function() {
  $('#form_encarregado').validate({
    rules: {
      anolectivo: {
        required: true
      },
      nome_encarregado: {
        required: true,
        minlength: 3,
        minWords: 2
      },
      parentesco: {
        required: true
      },
      telemovel_encarregado: {
        required: true
      },
      email_encarregado: {
        email: true
      }
    }
  });
});
/* ============== FORMULARIO MATRICULA ============== */
$(document).ready(function() {
  $('#form_matricula').validate({
    rules: {
      anolectivo: {
        required: true
      },
      classe_id: {
        required: true
      },
      turma_id: {
        required: true
      },
      curso_id: {
        required: true
      }
    }
  });
});
/* ============== FORMULARIO DISCIPLINA ============== */
$(document).ready(function() {
  $('#form_disciplina').validate({
    rules: {
      classe: {
        required: true
      },
      disciplina: {
        required: true
      }
    }
  });
});
/* ============== FORMULARIO NOVA DISCIPLINA ============== */
$(document).ready(function() {
  $('#form_disciplinas').validate({
    rules: {
      nome_disciplina: {
        required: true
      },
      sigla_disciplina: {
        required: true
      },
      classe: {
        required: true
      }
    }
  });
});
/* ============== FORMULARIO PROFESSOR ============== */
$(document).ready(function() {
  $('#form_professor').validate({
    rules: {
      departamento: {
        required: true
      },
      funcionario: {
        required: true
      }
    }
  });
});
/* ============== FORMULARIO PROFESSOR ============== */
$(document).ready(function() {
  $('#form_turma').validate({
    rules: {
      nome_turma: {
        required: true
      },
      numero_sala: {
        required: true
      },
      nome_classe: {
        required: true
      },
      nome_periodo: {
        required: true
      }
    }
  });
});
/* ============== FORMULARIO LANÇAR NOTAS ============== */
$(document).ready(function() {
  $('#form_notas_1').validate({
    rules: {
      cap_1: {
        required: true,
        minlength: 1,
        maxlength: 4
      },
      cpe_1: {
        minlength: 1,
        maxlength: 4
      }
    }
  });
});
$(document).ready(function() {
  $('#form_notas_2').validate({
    rules: {
      cap_2: {
        required: true,
        minlength: 1,
        maxlength: 4
      },
      cpe_2: {
        minlength: 1,
        maxlength: 4
      }
    }
  });
});
$(document).ready(function() {
  $('#form_notas_3').validate({
    rules: {
      cap_3: {
        required: true,
        minlength: 1,
        maxlength: 4
      },
      cpe_3: {
        minlength: 1,
        maxlength: 4
      }
    }
  });
});
/* ============== FORMULARIO NOVO ALUNO ============== */
$(document).ready(function() {
  $('#form_novo_aluno').validate({
    rules: {
      nome: {
        required: true,
        minlength: 3,
        minWords: 2
      },
      genero_aluno: {
        required: true
      },
      nascimento_aluno: {
        required: true
      },
      tipo_documento: {
        required: true
      },
      num_documento: {
        required: true
      },
      data_emissao_doc: {
        required: true
      },
      pais: {
        required: true
      },
      provincia: {
        required: true
      },
      municipio: {
        required: true
      },
      nome_pai: {
        minlength: 3,
        minWords: 2
      },
      nome_mae: {
        minlength: 3,
        minWords: 2
      },
      endereco_aluno: {
        required: true,
        minlength: 3,
        minWords: 2
      }
    }
  });
});
/* ============== FORMULARIO NOVO ALUNO ============== */
$(document).ready(function() {
  $('#form_edit_aluno').validate({
    rules: {
      nome: {
        required: true,
        minlength: 3,
        minWords: 2
      },
      genero_aluno: {
        required: true
      },
      nascimento_aluno: {
        required: true
      },
      num_documento: {
        required: true
      },
      num_processo: {
        required: true
      },
      pais: {
        required: true
      },
      provincia: {
        required: true
      },
      municipio: {
        required: true
      },
      nome_pai: {
        minlength: 3,
        minWords: 2
      },
      nome_mae: {
        minlength: 3,
        minWords: 2
      },
      endereco_aluno: {
        required: true,
        minlength: 3,
        minWords: 2
      },
      contacto_aluno: {
        required: true
      }
    }
  });
});
/* ============== SELECT DINAMICO |PAIS | PROVINCIA | MUNICIPIO ============== */
$(document).ready(function() {
  $('#pais').change(function() {
    var pais_id = $('#pais').val();
    if (pais_id != '') {
      $.ajax({
        url: "<?php echo base_url();?>secretaria/aluno/busca_provincia",
        method: "POST",
        data: {
          pais_id: pais_id
        },
        success: function(data) {
          $('#provincia').html(data);
          $('#provincia').removeAttr("disabled");
          $("#provincia").val("");
          $("#municipio").val("");
        }
      })
    } else {
      $('#provincia').html('<option value="">Selecione a Provincia 00</option>');
      $('#municipio').html('<option value="">Selecione o Municipio</option>');
    }
  });
  $('#provincia').change(function() {
    var provincia_id = $('#provincia').val();
    if (provincia_id != '') {
      $.ajax({
        url: "<?php echo base_url();?>secretaria/aluno/busca_municipio",
        method: "POST",
        data: {
          provincia_id: provincia_id
        },
        success: function(data) {
          $('#municipio').html(data);
          $('#municipio').removeAttr("disabled");
          $("#municipio").val("");
        }
      })
    }
  });
});
/* ============== SELECT DINAMICO | CLASSE | DISCIPLINA ============== */
$(document).ready(function() {
  $('#classe').change(function() {
    var classe_id = $('#classe').val();
    if (classe_id != '') {
      $.ajax({
        url: "<?php echo base_url();?>secretaria/matricula/busca_disciplina",
        method: "POST",
        data: {
          classe_id: classe_id
        },
        success: function(data) {
          $('#disciplina').html(data);
          $('#disciplina').removeAttr("disabled");
          $("#disciplina").val("");
        }
      })
    } else {
      $('#disciplina').html('<option value=""> Selecione a discplina 001 </option>');
    }
  });
});
/* ============== SELECT DINAMICO | DEPARTAMENTO | PROFESSOR ============== */
$(document).ready(function() {
  $('#departamento').change(function() {
    var departamento_id = $('#departamento').val();
    if (departamento_id != '') {
      $.ajax({
        url: "<?php echo base_url();?>secretaria/professor/busca_departamento",
        method: "POST",
        data: {
          departamento_id: departamento_id
        },
        success: function(data) {
          $('#funcionario').html(data);
          $('#funcionario').removeAttr("disabled");
          $("#funcionario").val("");
        }
      })
    } else {
      $('#funcionario').html('<option value="">Selecione o funcionário</option>');
    }
  });
});
/* ============== IMAGEM CAMERA  ============== */
// Configure a few settings and attach camera
function configure() {
  Webcam.set({
    width: 120,
    height: 90,
    image_format: 'jpeg',
    jpeg_quality: 90
  });
  Webcam.attach('#my_camera');
}

function preview_snapshot() {
  // freeze camera so user can preview pic
  Webcam.freeze();
  // swap button sets
  document.getElementById('pre_take_buttons').style.display = 'none';
  document.getElementById('post_take_buttons').style.display = '';
}

function cancel_preview() {
  // cancel preview freeze and return to live camera feed
  Webcam.unfreeze();
  // swap buttons back
  document.getElementById('pre_take_buttons').style.display = '';
  document.getElementById('post_take_buttons').style.display = 'none';
}

function save_photo() {
  // actually snap photo (from preview freeze) and display it
  Webcam.snap(function(data_uri) {
    $("#upload_image").val(data_uri);
    // display results in page
    // document.getElementById('results').innerHTML =
    //     '<img src="' + data_uri + '"/>';
    // swap buttons back
    document.getElementById('pre_take_buttons').style.display = '';
    document.getElementById('post_take_buttons').style.display = 'none';
  });
  // Webcam.reset();
}
</script>
</body>

</html>
