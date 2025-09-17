@extends('/plantilla/base')

@section('titulo', 'paquetes')

@section('contenido')

    <a href="/paquetes/crear"><p>nuevo paquete</p></a>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id paquete
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre del paquete
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descricion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        duracion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        destino
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paquetes as $item)
                    
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{$item->id_paquete}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->nombre_paquete}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->descripcion}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->precio}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->fechas}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->cupo}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
