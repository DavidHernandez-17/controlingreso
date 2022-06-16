@extends('Shared.base')

@section('content')
<div class=" text-center mt-3">
    <div>
        <h4><i class="fa-solid fa-pen-to-square"></i> Editar colaborador</h4>
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

    <form action="/employees/{{ $Employee->id }}" method="POST" class="container">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
            <label class="text-primary" >Identificación</label>
            <input type="number" readonly name="identification" id="identification" class="form-control text-center" value="{{ $Employee->identification }}" value="{{ old('identification') }}">
        </div>
        <div class="form-group mt-3">
            <label class="text-primary">Nombre completo</label>
            <input type="text" name="fullname" id="fullname" class="form-control text-center" value="{{ $Employee->fullname }}" value="{{ old('fullname') }}">
        </div>
        <div class="form-group mt-3">
            <label class="text-primary">Área</label>
            <input type="text" name="area" id="area" class="form-control text-center" value="{{ $Employee->area }}" value="{{ old('area') }}">
        </div>
        <div class="form-group mt-3">
            <label class="text-primary">Sede</label>
            <input type="text" name="site" id="site" class="form-control text-center" value="{{ $Employee->site }}" value="{{ old('site') }}">
        </div>

        <button type="submit" class="btn btn-outline-primary mt-3"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        <a class="btn btn-outline-secondary mt-3" href="/employees"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
    </form>

</div>

@endsection