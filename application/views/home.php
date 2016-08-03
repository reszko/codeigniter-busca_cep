<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Consulta CEP</title>

        <script src="//code.jquery.com/jquery-2.2.2.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <script>
            
            $(function(){
                $("#btn_consulta").click(function(){
                    var cep = $('#cep').val();
                    if (cep == '') {
                        alert('Informe o CEP antes de continuar');
                        $('#cep').focus();
                        return false;
                    }
                    $('#btn_consulta').html ('Aguarde...');
                    $.post('index.php/home/consulta',
                    {
                        cep : cep
                    }, 
                    function(dados){
                        $('#rua').val(dados.logradouro);
                        $('#bairro').val(dados.bairro);
                        $('#cidade').val(dados.localidade);
                        $('#estado').val(dados.uf);
                        $('#btn_consulta').html('Consultar');
                    }, 'json');
                });
            });
            
            
        </script>
        
    </head>
    <body>

        <div class="container">
            <h2>Buscador de endereço pelo CEP</h2>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Digite o CEP desejado
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cep">CEP:</label>
                            <input type="text" name="cep" id="cep" class="form-control" autofocus required placeholder="Somente os números do CEP" />
                        </div>
                        <div class="form-group">
                            <button id="btn_consulta" class="btn btn-success">Consultar</button>
                        </div>
                        <div class="form-group">
                            <label for="rua">Rua:</label>
                            <input type="text" name="rua" id="rua" class="form-control" disabled required />
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" name="bairro" id="bairro" class="form-control" disabled  required />
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" name="cidade" id="cidade" class="form-control"  disabled required />
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <input type="text" name="estado" id="estado" class="form-control"  disabled required size="2"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>