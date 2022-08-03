<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST">
                                <div class="form-row">
                                    <div class="col-sm-3">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="email" name="email" class="form-control" placeholder="Correo" value="{{ old('email')}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                    </div>
                                    <div class="col-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>
                            </form>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error )
                                  - {{ $error }} <br>  
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <table class="table">
                    <th>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>
                    </th>
                    <tbody>
                        @foreach ($users as $user )
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{-- Todo valor amodificar va dentro de un formulario--}}
                                    {{--Usamos el helper route--}}
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        {{--Usamos el helper method@  --}}
                                        @method('DELETE')
                                        {{--Helper que le indica a laravel que es un form nuestro mediante un token--}}
                                        @csrf
                                        <input  
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn btn-danger btn-sm" 
                                            onclick="return confirm('¿Desea eliminar...?')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
