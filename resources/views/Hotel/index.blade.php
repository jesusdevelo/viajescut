@extends('/plantilla/base')

@section('titulo', 'hoteles')

@section('contenido')

    <a href="/hoteles/crear"><p>nuevo hotel</p></a>



    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id hotel
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre Hotel
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ubicacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Puntuacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Disponibilidad
                    </th>
                </tr>
            </thead>
           <tbody>
                @foreach ($hoteles as $item)
                    
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{$item->id_hotel}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->ubicacion}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->categoria}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->precio}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->disponibilidad}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
