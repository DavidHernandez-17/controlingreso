@extends('Shared.base')

@section('content')
<div class="mt-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-orange">
                    <div class="card-header">
                        <h3 class="card-title text-light"><i class="fa-solid fa-key"></i> Cambiar contraseña del usuario: <strong> {{ $User->name }} </strong></h3>
                    </div>

                    @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if( isset($Message) )
                        <li class="alert alert-danger mt-3">{{ $Message }}</li>
                    @endif


                    <form action="/users/{{ $User->id }}/edit/password_confirm" method="POST" class="container">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label class="text-primary">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="*******">
                            </div>
                            <div class="form-group">
                                <label class="text-primary">Confirmar contraseña</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="*******">
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Cambiar</button>
                            <a class="btn btn-secondary" href="/users"><i class="fa-solid fa-ban"></i> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection