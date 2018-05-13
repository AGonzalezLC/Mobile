@extends('app') 
@section('content')

<div id="crud" class="row">
    <div class="col-sm-12">
        <h1 class="page-header">CRUD Laravel & VUE</h1>
    </div>
    <div class="col-sm-7">
        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">Nuevo número</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID Usuario</th>
                    <th>Numero</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="mobile in mobiles">
                    <td width="10px"> @{{mobile.user_id}} </td>
                    <td width="10px"> @{{mobile.number}} </td>
                    <td width="10px">
                        <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editMobile(mobile)">Editar</a>
                    </td>
                    <td width="10px">
                        <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteTel(mobile)">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <nav>
            <ul class="pagination">
             <li v-if="pagination.current_page > 1" class="page-item"><a class="page-link" href="#" @click.prevent="changePage(pagination.current_page - 1)"><span>Atras</span></a></li>

             <li v-for="page in pagesNumber" class="page-item" v-bind:class="[ page == isActived ? 'active' : '']"><a class="page-link" href="" @click.prevent="changePage(page)"> @{{ page }} </a></li>
             
             <li class="page-item" v-if="pagination.current_page < pagination.last_page"><a class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)"><span>Siguiente</span></a></li>
        
            </ul>
        </nav>
        @include('create')
        @include('edit')
    </div>
    <div class="col-sm-5">
        <pre> @{{ $data }} </pre>
    </div>
</div>
@endsection