<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">

                {{-- Ahora si puedo publicar los componentes de livewire --}}
                {{-- php artisan vendor:publish --tag=jetstream-views esto esta sacado de la pagina de jetstream --}}
                {{-- esto crea el views/vendor/jetstream --}}


                {{-- ahora si creamos el formulario --}}
                <form action="{{ route('messages.store') }}" method="POST">

                    @csrf
                    <div class="mb-4">
                        <x-jet-label>
                            Asunto
                        </x-jet-label>
                        <x-jet-input type="text" class="w-full" placeholder="Ingrese el asunto" name="subject" value="{{ old('subject') }}" />

                        {{-- componente jestream para mostrar errores, lo unico que le paso es el nombre del campo que ha fallado --}}
                        <x-jet-input-error for="subject"/>

                    </div>

                    <div class="mb-4">

                        <x-jet-label>
                            Mensaje
                        </x-jet-label>
                        <textarea class="form-control w-full" 
                            name="body"
                            placeholder="Escriba su mensaje" 
                            rows="4">{{ old('body') }}</textarea>
                        <x-jet-input-error for="body"/>


                    </div>

                    <div class="">
                        <x-jet-label>
                            Destinatario
                        </x-jet-label>

                        <select name="to_user_id" class="form-control w-full">
                            <option value="" {{ old('to_user_id') ? '' : 'seleted'}} disabled >Seleccione un usuario</option>
                            @foreach ($users as $user)
                            <option {{ old('to_user_id') == $user->id ? 'selected' : '' }} value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="to_user_id"/>

                    </div>

                    {{-- incluyo un boton con jetstream --}}
                    <x-jet-button class="mt-4"> 
                        Enviar
                    </x-jet-button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>