<div>
    <input type="text" wire:model.live="query" placeholder="Buscar alumno..." class="border p-2 w-full">

    @if (!empty($resultados))

        <div class="mt-2 border p-2 border-black">
            @foreach ($resultados as $alumno)
                <p class="p-1 border-b">{{ $alumno->nombre }}</p>
            @endforeach
        </div>
    @endif
</div>
