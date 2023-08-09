<div class="p-6 text-gray-900 dark:text-gray-100"
     x-data="{
            showDeleted: @entangle('showDeleted'),
        }">
    <div>
        <p class="text-center text-2xl text-gray-600 font-extrabold mb-6 border-y border-red-300 py-5">
            Habilidades
        </p>
    </div>
    <div class="px-8 flex items-start space-x-8">
        <a href="{{ route('skills.create') }}"
           class="px-4 py-2 bg-green-400 hover:bg-green-600 justify-center text-white rounded-full">
            Agregar +
        </a>
        <input type="text" class="px-4 py-2 rounded-lg border border-gray-300 mb-4 w-1/3"
               placeholder="Buscar Habilidades"
               wire:model="search">
    </div>

    <div class="px-8">

        @if($skills->isEmpty())
            <div class="flex w-full bg-red-100 p-5 rounded-lg">
                <p class="text-red-400">No hay habilidades registradas</p>
            </div>
        @else
            <div class="w-full">
                @foreach($skills as $skill)
                    <div class="mb-4">
                        @if($skill->img)
                            <img class="block mx-auto h-12 rounded-full sm:mx-0 sm:shrink-0" src="{{ asset('storage/'.$skill->img) }}">
                        @endif
                        <p class="font-bold">{{ $skill->name }} <span class="float-right">{{ $skill->percentage }}%</span></p>
                        <div class="w-full bg-gray-300">
                            <div class="h-6 transition-all"
                                 style="width: {{ $skill->percentage }}%; background-color: {{ $skill->color }};">
                            </div>
                        </div>
                        <div class="flex space-x-2 mt-2">
                            <a href="{{ route('skills.edit', $skill->id) }}"
                               class="px-2 py-1 bg-blue-400 hover:bg-blue-600 text-white rounded-lg">
                                Ver
                            </a>
                            <button class="px-2 py-1 bg-red-400 hover:bg-red-600 text-white rounded-lg"
                            wire:click="delete({{ $skill->id }})">
                                Eliminar
                            </button>
                        </div>
                    </div>
                @endforeach
                <div class="mt-4">
                    {{ $skills->links() }}
                </div>
            </div>

        @endif
    </div>
</div>

