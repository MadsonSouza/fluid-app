@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div>
    @endif
    <h2 class="display-5">Clientes</h2>    
    <div>
        <a style="margin: 19px;" href="{{ route('clientes.create')}}" class="btn btn-primary">Novo Cliente</a>
    </div>  
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nome</td>
          <td>Email</td>
          <td>Telefone</td>
          <td>Endereço</td>
          <td>CEP</td>
          <td>CPF</td>
          <td colspan = 2> - </td>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $contact)
        <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->first_name}} {{$contact->last_name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->job_title}}</td>
            <td>{{$contact->city}}</td>
            <td>{{$contact->country}}</td>
            <td>
                <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Apagar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection