@extends('layouts.admin-app')

@section('content')

    <div class="m-5">
        <form action="" method="post" class="">
            @csrf

            <label for="">Nome</label>
            <input type="text" placeholder="Digite o nome do cliente">

            <label for="">E-mail</label>
            <input type="text" placeholder="Digite seu Email">

            <select name="" id="">
                <option>Fisica</option>
                <option>Juridica</option>
            </select>

            <input type="text" Digite seu CPF>
        </form>
    </div>

@endsection
