@extends('Shared.base')

@section('content')

<div class="text-center mt-3 grid">
    <div class="d-flex" style="height: 100px;">
        <div class="vr"></div>
    </div>
    <div>
        <h4>Colaborador: <strong>{{ $Employee->fullname }}</strong></h4>
    </div>
    <div>
        <h5>¿ Estás seguro de eliminar ?</h5>
    </div>

    <form action="/employees/{{ $Employee->id }}" method="POST">
        @csrf
        @method('delete')

        <button type="submit" class="btn btn-outline-danger mt-2"><i class="fa-solid fa-circle-exclamation"></i> Si</button>
        <a href="/employees/" class="btn btn-outline-primary mt-2"><i class="fa-solid fa-ban"></i> No</a>
    </form>
</div>

@endsection