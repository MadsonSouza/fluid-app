@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
  <h2 class="display-">Adicionar Cliente</h2>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('clientes.store') }}">
          @csrf
          <div class="form-group">    
              <label for="first_name">Nome:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="cpf">CPF:</label>
              <input type="text" class="form-control" name="cpf" id="cpf"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          
          <div class="form-group">
              <label for="country">Senha:</label>
              <input type="text" class="form-control" name="country"/>
          </div>

          <div class="form-group">
              <label for="cep">CEP:</label>
              <input type="text" class="form-control" name="cep" id="cep"/>
          </div>

          <div class="form-group">
              <label for="rua">Rua:</label>
              <input type="text" class="form-control" name="rua" id="rua"/>
          </div>

          <div class="form-group">
              <label for="rua">Cidade:</label>
              <input type="text" class="form-control" name="cidade" id="cidade"/>
          </div>
          
          <div class="form-group">
              <label for="estado">Estado:</label>
              <input type="text" class="form-control" name="uf" id="uf"/>
          </div>

          <div class="form-group">
              <label for="rua">Bairro:</label>
              <input type="text" class="form-control" name="bairro" id="bairro"/>
          </div>

          <div class="form-group">
              <label for="country">N°:</label>
              <input type="text" class="form-control" name="country"/>
          </div>
          
          <div class="form-group">
              <label for="country">Telefone:</label>
              <input type="text" class="form-control" name="country"/>
          </div>

          <div class="form-group">
              <label for="data de nascimento">Data de Nascimento:</label>
              <input type="text" class="form-control" name="dt_nasc" id="dt_nasc"/>
          </div>

          <div class="form-group">
            <label for="country">Gênero:</label>
            <br>
            <input type="radio" id="male" name="gender" value="m">
            <label for="male">Masculino</label><br>
            <input type="radio" id="female" name="gender" value="f">
            <label for="female">Feminino</label><br>
            <input type="radio" id="other" name="gender" value="o">
            <label for="other">Outro</label>  
          </div>
         
          <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
  </div>
</div>
</div>
<script>
//scripts de maskinput
$(document).ready(function(){
  $('#cpf').mask('999.999.999-99');
  $('#cep').mask('99999-999');
  $('#dt_nasc').mask('99/99/9999');
});

// ajax request para api cep
$('#cep').on('change', function(){

  var cep = $(this).val().replace('-','');

//if(cep.length && cep.length % 8 == 0){
  $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) { 
      
    if (!("erro" in dados)) {
        //Atualiza os campos com os valores da consulta.
        console.log(dados);
        $("#rua").val(dados.logradouro);
        $("#cidade").val(dados.localidade);
        $("#bairro").val(dados.bairro);
        $("#uf").val(dados.uf);        
    } 
    else {
        $("#cep").val("");
        alert("CEP não encontrado.");
    }
    
  });

});
</script>
@endsection