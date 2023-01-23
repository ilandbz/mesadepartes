<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DERIVAR EXPEDIENTE') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-lg font-bold" style="font-weight: bold">NRO DE EXPEDIENTE : <span>{{$registro->nroexpediente}}</span> &nbsp; {{$registro->tipodocumento.' : '.$registro->nrodocumento}} &nbsp; ENTIDAD : {{$registro->entidad}} &nbsp; EMAIL : {{$registro->email}} &nbsp; CELULAR : {{$registro->celular}}</h2>
                    <h2 class="text-lg font-bold" style="font-weight: bold">ASUNTO : <span>{{$registro->asunto}}</span> &nbsp; ESTADO : {{$registro->estado}} &nbsp; AREA : {{$registro->area}} </h2>
<br><br>
                    <form action="{{route('mesapartes.update', $registro)}}" method="POST">
                        @csrf
                        @method('put')
                        <x-input-label for="estado" value="ESTADO" />

                            <select name="estado" id="estado" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-24">
                                <option value="REGISTRADO">REGISTRADO</option>
                                <option value="DERIVADO" selected>DERIVADO</option>
                                <option value="RECHAZADO">RECHAZADO</option>
                                <option value="ARCHIVADO">ARCHIVADO</option>
                            </select>
                            <x-input-error :messages="$errors->get('estado')" class="mt-2" /> 
                            <x-input-label for="area" :value="__('Area')" class="mt-2 w-24" />
                            <select name="area" id="area" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-24">
                                @foreach ($areas as $item)
                                    <option value="{{$item->nombre}}">{{$item->nombre}}</option>
                                @endforeach
                            </select>
                        <x-input-error :messages="$errors->get('area')" class="mt-2" />
                            <x-primary-button class="ml-4">
                                {{ __('Guardar') }}
                            </x-primary-button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    


</x-app-layout>
