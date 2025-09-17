@extends('/plantilla/base')

@section('titulo', 'Tours')

@section('contenido')

    <a href="/tours/crear"><p>nuevo tour</p></a>


    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id tour
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre del tour
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Destino
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Duracion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cupo maximo
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Tours as $item)
                    
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{$item->id_tour}}
                    </th>
                    <td class="px-6 py-4">
                        {{$item->nombre}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->destino}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->duracion}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->precio}}
                    </td>
                    <td class="px-6 py-4">
                        {{$item->lugares}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection
