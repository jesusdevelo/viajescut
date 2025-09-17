@extends('/plantilla/base')

@section('titulo', 'administradores')

@section('contenido')

    <a href="/admin/crear"><p>nuevo administradores</p></a>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id admin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Correo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Password
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Telefono
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($administradores as $item)
                    
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{$item->id_admin}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->correo}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->password}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->telefono}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
