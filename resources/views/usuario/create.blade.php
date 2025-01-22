@extends('layouts.base')

@section('title', 'Cadastrar Usuario')
@section('card-title', 'Cadastro de Usuários')
@section('content')

    <form>
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha">
        </div>

        <div class="mb-3">
            <label for="senha_confirmation" class="form-label">Confirmação de Senha</label>
            <input type="password" class="form-control" id="senha_confirmation">
        </div>


        <div class="d-flex justify-content-end mt-5">
            <button id="submit" type="button" class="btn btn-primary">Salvar</button>
        </div>
    </form>


    <script>
        $('#submit').on("click", function() {
            $('#alerts').empty();
            $('#email').removeClass('is-invalid')
            $('#nome').removeClass('is-invalid')
            $('#senha').removeClass('is-invalid')
            $('#senha_confirmation').removeClass('is-invalid')

            let data = [{
                "nome": $('#nome').val(),
                "email": $('#email').val(),
                "senha": $('#senha').val(),
                "senha_confirmation": $('#senha_confirmation').val()
            }];

            $.ajax({
                type: "POST",
                data: {
                    "nome": $('#nome').val(),
                    "email": $('#email').val(),
                    "senha": $('#senha').val(),
                    "senha_confirmation": $('#senha_confirmation').val()
                },
                url: "/api/usuario",
                success: function(retorno) {
                    $('#nome').val(''),
                    $('#email').val(''),
                    $('#senha').val(''),
                    $('#senha_confirmation').val('')
                    $('#alerts').append(
                            '<div id="success" class="alert alert-success alert-dismissible fade show" role="alert">' +
                            '<strong>Sucesso! </strong> Usuário cadastrado!'+
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>'
                        );

                },
                error: function(request, status, error) {

                    var data = JSON.parse(request.responseText);
                    var dados = data.data;

                    Object.entries(dados).forEach((entry) => {
                        const [key, value] = entry;
                        switch (key) {
                            case 'email':
                                $('#email').addClass('is-invalid');
                                break;
                            case 'nome':
                                $('#nome').addClass('is-invalid')
                                break
                            case 'senha':
                                $('#senha').addClass('is-invalid')
                                $('#senha_confirmation').addClass('is-invalid')
                                $('#senha_confirmation').val('');
                                $('#senha').val('');
                        }

                        if (key == 'email') {
                            $('#email').addClass('is-invalid')
                        }
                        $('#alerts').append(
                            '<div id="danger" class="alert alert-danger alert-dismissible fade show" role="alert">' +
                            '<strong>Alerta! </strong>' + value +
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                            '</div>'
                        );
                    });
                }
            });
        });
    </script>
@endsection
