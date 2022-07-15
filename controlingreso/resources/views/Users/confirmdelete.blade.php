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
                        <h3 class="card-title"><strong>Usuario: </strong> {{ $User->name }}</h3><br>
                        <h3 class="card-title"><strong>Correo electrónico: </strong> {{ $User->email }}</h3><br>
                        <h3 class="card-title"><strong>Área: </strong> {{ $User->area }}</h3><br>
                    </div>

                    <form action="/users/{{ $User->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <div class="card-body">
                            <div>
                                <h4 class="text-danger">El usuario será eliminado definitivamente</h4>
                                <h5>¿ Estás seguro de eliminar ?</h5>
                            </div>

                            <button type="submit" class="btn btn-danger mt-2"><i class="fa-solid fa-circle-exclamation"></i> Si</button>
                            <a href="/users" class="btn btn-primary mt-2"><i class="fa-solid fa-ban"></i> No</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection