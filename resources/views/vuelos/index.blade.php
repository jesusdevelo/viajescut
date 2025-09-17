@extends('/plantilla/base')

@section('titulo', 'vuelos')

@section('contenido')

    <a href="/vuelos/crear"><p>nuevo vuelo</p></a>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id vuelo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aerolinea
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Origen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destino
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Salida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Llegada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Costo
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vuelos as $item)
                    
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{$item->id_vuelo}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->aereolinea}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->origen}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->destino}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->salida}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->llegada}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->costo}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
