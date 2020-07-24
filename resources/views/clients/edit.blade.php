@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h2 class="display-5">Editar Cliente</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('clientes.update', $client->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="nome">Nome:*</label>
                <input type="text" class="form-control" name="name" value="{{ $client->name }}" />
            </div>

            <div class="form-group">
                <label for="cpf">CPF:*</label>
                <input type="text" class="form-control" name="cpf"  id="cpf" value="{{ $client->cpf }}" />
            </div>

            <div class="form-group">
                <label for="email">Email:*</label>
                <input type="text" class="form-control" name="email" value="{{ $client->email }}" />
            </div>
            <div class="form-group">
                <label for="password">Senha:*</label>
                <input type="text" class="form-control" name="password" value="{{ $client->password }}" readonly />
            </div>

            <div class="form-group">
                <label for="cep">CEP*:</label>
                <input type="text" class="form-control" name="cep" id="cep" value="{{ $client->cep }}" />
            </div>

            <div class="form-group">
                <label for="rua">Rua*:</label>
                <input type="text" class="form-control" name="street" value="{{ $client->street }}" />
            </div>

            <div class="form-group">
                <label for="cidade">Cidade*:</label>
                <input type="text" class="form-control" name="city" value="{{ $client->city }}" />
            </div>

            <div class="form-group">
                <label for="estado">Estado*:</label>
                <input type="text" class="form-control" name="uf" value="{{ $client->uf }}" />
            </div>

            <div class="form-group">
                <label for="bairro">Bairro*:</label>
                <input type="text" class="form-control" name="neigh" value="{{ $client->neigh }}" />
            </div>

            <div class="form-group">
                <label for="numero">N°*:</label>
                <input type="text" class="form-control" name="number" value="{{ $client->number }}" />
            </div>

            <div class="form-group">
                <label for="telefone">Telefone°*:</label>
                <input type="text" class="form-control" name="phone" value="{{ $client->phone }}" />
            </div>            

            <div class="form-group">
                <label for="data de nascimento">Data de Nascimento*:</label>
                <input type="text" class="form-control" name="birth_date" id="dt_nasc" value="{{ date('d/m/Y', strtotime($client->birth_date)) }}" />
            </div>
            
            <div class="form-group">
                <label for="country">Gênero:*</label>
                <br>
                <input type="radio" id="male" name="gender" value="m" @if($client->gender == "m") checked @endif >
                <label for="male">Masculino</label><br>
                <input type="radio" id="female" name="gender" value="f" @if($client->gender == "f") checked @endif >
                <label for="female">Feminino</label><br>
                <input type="radio" id="other" name="gender" value="o" @if($client->gender == "o") checked @endif>
                <label for="other">Outro</label>  
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
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
      $("#rua").val(dados.logradouro).prop('readonly', true);;
      $("#cidade").val(dados.localidade).prop('readonly', true);;
      $("#bairro").val(dados.bairro).prop('readonly', true);;
      $("#uf").val(dados.uf).prop('readonly', true);;        
  } 
  else {
      alert("CEP não encontrado!");
  }
  
});

});
</script>
@endsection