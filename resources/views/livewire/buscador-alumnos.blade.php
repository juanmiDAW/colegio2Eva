<div class=" w-screen h-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead
        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
            </thead>
            <tbody>
    <input type="text" wire:model.live="query" placeholder="Buscar alumno..." class="border p-2 w-full">

    @if (!empty($resultados))
        @foreach ($resultados as $alumno)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $alumno->id }}
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('alumnos.show', $alumno) }}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        {{ $alumno->nombre }}
                    </a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('alumnos.edit', $alumno) }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Editar alumno
                    </a>
                </td>
                <td class="px-6 py-4">
                    <form method="POST" action="{{ route('alumnos.destroy', $alumno) }}">
                        @method('DELETE')
                        @csrf
                        <a href="{{ route('alumnos.destroy', $alumno) }}"
                            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800"
                            onclick="event.preventDefault(); if (confirm('¿Está seguro?')) this.closest('form').submit();">
                            Eliminar
                        </a>
                    </form>
                </td>
            </tr>
        @endforeach
        @endif


        
</div>
