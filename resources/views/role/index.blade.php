@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>Lista de Roles</h2></div>

                <div class="card-body">

                  <a href="{{ route('role.create') }}" class="btn btn-success float-right">Crear Rol</a>
                  <br>
                  <br>

                    @include('custom.message')


                    <table class="table table-hover">
                        <thead>
                         <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acceso-Total</th>
                            <th colspan="3"></th>
                          </tr>
                          </thead>
                         <tbody>
                            
                          @foreach($roles as $role)
                            <tr>
                              <td scope="row">{{ $role->id  }}</td>
                              <td>{{ $role->name  }}</td>
                              <td>{{ $role->slug  }}</td>
                              <td>{{ $role->description  }}</td>
                              
                              <td class="">{{ $role['full-access']  }}</td>
                              <td><a class="btn btn-secondary col" href="{{ route('role.show', $role->id) }}">Show</a></td>
                              <td><a class="btn btn-primary col" href="{{ route('role.edit', $role->id) }}">Editar</a></td>
                              <td>
                                <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger">
                                    Eliminar
                                  </button>
                                </form>
                                </td>
                            </tr>
                          @endforeach
                         
                        </tbody>
                    </table>
                      {{ $roles->links()  }}

                     
                </div>
                  
            </div>
        </div>
    </div>
</div>
@endsection