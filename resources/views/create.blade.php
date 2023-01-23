<x-guest-layout>
<style>
    /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>

    <form method="POST" action="{{ route('mesapartes.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="">
            <x-input-label for="tipodocumento" :value="__('Tipo de Documento')" />
            <select name="tipodocumento" id="tipodocumento" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                <option value="DNI">DNI</option>
                <option value="RUC">RUC</option>
            </select>
            <x-input-error :messages="$errors->get('tipodocumento')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="nrodocumento" :value="__('Nro Documento')" />
            <x-text-input id="nrodocumento" class="block mt-1 w-full" type="number" name="nrodocumento" :value="old('nrodocumento')" placeholder="00000000" required autofocus maxlength="11" />
            <x-input-error :messages="$errors->get('nrodocumento')" class="mt-2" />
        </div>        
        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="entidad" :value="__('Entidad / Apellidos y Nombres')" />
            <x-text-input id="entidad" class="block mt-1 w-full" type="text" name="entidad" :value="old('entidad')" required autofocus placeholder="Entidad" />
            <x-input-error :messages="$errors->get('entidad')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="micorreo@correo.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- celular -->
        <div class="mt-4">
            <x-input-label for="celular" :value="__('Celular')" />
            <x-text-input id="celular" class="block mt-1 w-full" type="number" name="celular" :value="old('celular')" required autofocus placeholder="000000000" maxlength="9" />
            <x-input-error :messages="$errors->get('celular')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="area" :value="__('Area')" />
            <select name="area" id="area" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                @foreach ($areas as $item)
                    <option value="{{$item->nombre}}">{{$item->nombre}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('area')" class="mt-2" />
        </div> 
        <!-- asunto -->
        <div class="mt-4">
            <x-input-label for="asunto" :value="__('Asunto')" />
            <textarea name="asunto" id="asunto" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" placeholder="Asunto"></textarea>
            <x-input-error :messages="$errors->get('asunto')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="archivo" :value="__('Archivo')" />
            <x-text-input id="archivo" class="block mt-1 w-full" type="file" name="archivo" :value="old('archivo')" required autofocus 
            accept=".pdf" />
            <x-input-error :messages="$errors->get('archivo')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
