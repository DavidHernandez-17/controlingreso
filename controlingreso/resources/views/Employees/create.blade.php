@extends('Shared.base')

@section('content')
<div class=" text-center mt-3">
    <div>
        <h4><i class="fa-solid fa-circle-plus"></i> Nuevo colaborador</h4>
    </div>  

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/employees" method="POST" class="container">
        @csrf
        <div class="form-group mt-3">
            <input type="number" name="identification" id="identification" class="form-control text-center" placeholder="Identificación" value="{{ old('identification') }}">
        </div>
        <div class="form-group mt-3">
            <input type="text" name="fullname" id="fullname" class="form-control text-center" placeholder="Nombre completo" value="{{ old('fullname') }}">
        </div>
        <div class="form-group mt-3">
            <input type="text" name="area" id="area" class="form-control text-center" placeholder="Área" value="{{ old('area') }}">
        </div>
        <div class="form-group mt-3">
            <input type="text" name="site" id="site" class="form-control text-center" placeholder="Sede" value="{{ old('site') }}">
        </div>

        <button type="submit" class="btn btn-outline-primary mt-3"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        <a class="btn btn-outline-secondary mt-3" href="/employees"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
    </form>

</div>

@endsection