@extends('Shared.base')

@section('content')
<div class="mt-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa-solid fa-circle-plus"></i> Nuevo Colaborador</h3>
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

                    <form action="/employees" method="POST" class="container">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input type="number" name="identification" id="identification" class="form-control" placeholder="Identificación" value="{{ old('identification') }}" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Nombre completo" value="{{ old('fullname') }}">
                            </div>

                            <div class="form-group">
                                <select name="area" id="area" class="form-control text-secondary">
                                    <option value="">Área</option>
                                    @foreach( $areas as $area )
                                        <option value="{{ $area->area }}">{{ $area->area }}</option>
                                    @endforeach
                                </select>
                            </div>                            

                            <div class="form-group">
                                <select name="site" id="site" class="form-control text-secondary">
                                    <option value="">Sede</option>
                                    @foreach( $sites as $site )
                                        <option value="{{ $site->site }}">{{ $site->site }}</option>
                                    @endforeach
                                </select>
                            </div> 

                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Apodo" value="{{ old('nickname') }}">
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                            <a class="btn btn-secondary" href="/employees"><i class="fa-solid fa-rotate-left"></i> Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection