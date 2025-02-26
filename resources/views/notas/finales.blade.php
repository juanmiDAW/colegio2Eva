<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver notas finales
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Denominacion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nota final
                                </th>
                        </thead>
                        <tbody>
                            @php
                            $calificacion = [
                                'Lengua' => 0, 'Matematicas' => 0, 'Música' => 0, 
                                'Religion' => 0, 'Plastica y visual' => 0
                            ];
                            $contador = [
                                'Lengua' => 0, 'Matematicas' => 0, 'Música' => 0, 
                                'Religion' => 0, 'Plastica y visual' => 0
                            ];
                        @endphp
                        
                        @foreach ($notas as $nota)
                            @php
                                $nombreAsignatura = $nota->asignatura->denominacion;
                                
                                if (isset($calificacion[$nombreAsignatura])) {
                                    $calificacion[$nombreAsignatura] += $nota->nota;
                                    $contador[$nombreAsignatura]++;
                                }
                            @endphp
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $nota->asignatura->denominacion }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $nota->nota }}
                                </td>
                            </tr>
                        @endforeach
                        
                        {{-- Mostrar la media de cada asignatura --}}
                        @foreach ($calificacion as $asignatura => $sumaNotas)
                            @php
                                $media = $contador[$asignatura] > 0 ? $sumaNotas / $contador[$asignatura] : 0;
                            @endphp
                            <p>Media de {{ $asignatura }}: {{ number_format($media, 2) }}</p>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $nota->asignatura->denominacion }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $nota->nota }}
                                </td>
                            </tr>
                        @endforeach
                {{-- <div class="flex flex-col py-3">
                            <a href="{{route('ejemplares.index',['id'=>$libro->id])}}">

                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                    ID del ejemplar
                                </dt>
                                <dd class="text-lg font-semibold">
                                    @foreach ($libro->ejemplares as $libros)
                                    {{ $libros->id }},
                                    @endforeach
                                </dd>
                            </a>
                        </div> --}}
                </dl>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
