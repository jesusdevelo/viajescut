@extends('/plantilla/base')

@section('titulo', 'clientes')

@section('contenido')

     <a href="/clientes/crear" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">nuevo cliente</h5>
    </a>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id_cliente
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Telefono
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Direccion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Historial
                    </th>
                    <th scope="col" class="px-6 py-3">
                        estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        editar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        borrar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $item)
                    
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{$item->id_cliente}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->correo}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->telefono}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->direccion}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->historial}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->estado}}
                    </td>
                     <td> <a href="/clientes/{{ $item->id_cliente }}/editar">editar</a>
                    </td>
                    <td><a href="/clientes/{{ $item->id_cliente }}/mostrar">inhabilitar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
