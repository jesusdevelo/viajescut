@extends('/plantilla/base')

@section('titulo', 'administradores')

@section('contenido')

    <p>esta es la vista de administradores editar</p>



    <form action="/admin/{{$admin->id_admin}}/inhabilitar" method="POST" class="max-w-md mx-auto">
        @csrf
        <ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <li class="w-full px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">correo: {{$admin->correo}}</li>
            <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">nombre : {{$admin->nombre}}</</li>
            <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">Phone number : {{$admin->telefono}}</li>
        </ul>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">inhabilitar datos</button>
    </form>



@endsection
