@extends('Shared.base')

@section('content')

<?php
    header("Refresh:180");
?>

<div class="mt-3">
    <div class="d-flex" style="height: 100px;">
        <div class="vr"></div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card card-orange">
                    <div class="card-header">
                        <h3 class="card-title text-light"><i class="fa-solid fa-id-card"></i> Registro de usuarios</h3>
                    </div>
                    <form action="/register/done" method="POST" class="container">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="register" id="register" class="form-control" autofocus>
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fa-regular fa-circle-check"></i> Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection