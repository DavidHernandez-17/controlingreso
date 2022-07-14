@extends('Shared.base')

@section('content')

<div class="text-center mt-3 grid">
    
    <div class="d-flex" style="height: 100px;">
        <div class="vr"></div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title"><strong>Colaborador: </strong> {{ $Employee->fullname }}</h3><br>
                        <h3 class="card-title"><strong>Identificación: </strong> {{ $Employee->identification }}</h3><br>
                        <h3 class="card-title"><strong>Área: </strong> {{ $Employee->area }}</h3><br>
                        <h3 class="card-title"><strong>Sede: </strong> {{ $Employee->site }}</h3><br>
                        <h3 class="card-title"><strong>Correo electrónico: </strong> {{ $Employee->email }}</h3><br>
                        <h3 class="card-title"><strong>Apodo: </strong> {{ $Employee->nickname }}</h3><br>
                    </div>

                    <form action="/employees/{{ $Employee->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="card-body">
                            <div>
                                <h4 class="text-danger">El usuario será eliminado definitivamente</h4>
                                <h5>¿ Estás seguro de eliminar ?</h5>
                            </div>

                            <button type="submit" class="btn btn-danger mt-2"><i class="fa-solid fa-circle-exclamation"></i> Si</button>
                            <a href="/employees/" class="btn btn-primary mt-2"><i class="fa-solid fa-ban"></i> No</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection