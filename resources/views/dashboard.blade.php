@extends('app') 
@section('content')

<div id="crud" class="row">
    <div class="col-sm-12">
        <h1 class="page-header">CRUD Laravel & VUE</h1>
    </div>
    <div class="col-sm-7">
        <a href="#" class="btn btn-primary pull-right">Nueva Tarea</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="mobile in mobiles">
                    <td width="10px"> @{{mobile.number}} </td>
                    <td>  </td>
                    <td width="10px">
                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                    <td width="10px">
                        <a href="#" class="btn btn-danger btn-sm" v-on:click="deleteTel()">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-5">
        <pre> @{{ $data }} </pre>
    </div>
</div>
@endsection