@extends('Shared.base')

@section('content')

<div class="text-center mt-3 grid">
    <div class="d-flex" style="height: 100px;">
        <div class="vr"></div>
    </div>
    <div>
        <h4 class="mb-3"><i class="fa-solid fa-id-card"></i><strong> Registro de usuarios</strong></h4>
    </div>

    <form action="/register/done" method="POST" class="container">
        @csrf
        <div>
            <input type="text" name="register" id="register" class="form-control text-center" autofocus>
        </div>

        <button type="submit" class="btn btn-outline-success mt-3"><i class="fa-regular fa-circle-check"></i> Registrar</button>
    </form>
</div>

@endsection