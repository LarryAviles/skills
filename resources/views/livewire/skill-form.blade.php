<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <p class="text-blue font-extrabold text-5xl p-4">
                    {{ $skillId ? 'Ver Habilidad' : 'Crear Habilidad' }}
                </p>
                <form class="flex flex-col p-24"
                      wire:submit.prevent="save">
                    <div class="mb-4">
                        <label for="name" class="block font-bold">Nombre de la habilidad</label>
                        <input class="px-4 py-2 w-80 border border-blue-400" type="text" id="name" name="name"
                               wire:model.defer="name">
                    </div>
                    <div class="mb-4">
                        <label for="percentage" class="block font-bold">Porcentaje</label>
                        <input type="range" min="0" max="100" wire:model="percentage" id="percentage">
                        <span class="text-gray-600">{{ $percentage ?: 50 }}%</span>
                    </div>
                    <div class="mb-4 flex space-x-4">
                        <div>
                            <label for="color" class="block font-bold">Color</label>
                            <input type="color" wire:model="color" id="color" class="w-16 h-16">
                        </div>
                        <div>
                            <label for="public" class="block font-bold">Público</label>
                            <input type="checkbox" wire:model="public" id="public" class="mr-2">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="img" class="block font-bold">Imagen (Opcional)</label>
                        <input type="file" wire:model="img" id="img">
                        @if ($img && !$skillId)
                            <img src="{{ $img->temporaryUrl() }}" alt="Skill Image" class="mt-2 max-w-xs">
                        @endif
                        @if ($img && $skillId)
                            <img src="{{ asset('storage/'.$img) }}" alt="Skill Image" class="mt-2 max-w-xs">
                        @endif
                    </div>
                    @if($skillId)
                    @else
                        <button class="px-5 py-3 mt-5 w-80 bg-green-400 hover:bg-green-600 justify-center text-white rounded-full">
                            <span class="animate-spin" wire:loading wire:target="save">&#9696;</span>
                            <span wire:loading.remove wire:target="save">Guardar</span>
                        </button>
                    @endif
                    <a href="{{ route('dashboard') }}" class="px-5 py-3 mt-5 w-80 bg-blue-400 hover:bg-blue-600
                     text-center text-white rounded-full">
                        Regresar
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
