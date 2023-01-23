<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Intranet') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="border-collapse border border-slate-500 w-full">
                        <tr class="border">
                            <th class="border border-slate-600">NRO EXPEDIENTE</th>
                            <th class="border border-slate-600">TIPO DOC</th>
                            <th class="border border-slate-600">NRO DOCUMENTO</th>
                            <th class="border border-slate-600">ENTIDAD</th>
                            <th class="border border-slate-600">EMAIL</th>
                            <th class="border border-slate-600">AREA</th>
                            <th class="border border-slate-600">ESTADO</th>
                            <th class="border border-slate-600">ARCHIVO</th>
                            <th class="border border-slate-600">ACCION</th>
                        </tr>
                        @foreach ($registros as $expediente)
                        <tr>
                            <td class="border border-slate-600">{{$expediente->nroexpediente}}</td>
                            <td class="border border-slate-600">{{$expediente->tipodocumento}}</td>
                            <td class="border border-slate-600">{{$expediente->nrodocumento}}</td>
                            <td class="border border-slate-600">{{$expediente->entidad}}</td>
                            <td class="border border-slate-600">{{$expediente->email}}</td>
                            <td class="border border-slate-600">{{$expediente->area}}</td>
                            <td class="border border-slate-600">{{$expediente->estado}}</td>
                            <td class="border border-slate-600"><a href="{{asset('archivos/'.$expediente->archivo)}}">{{$expediente->archivo}}</a></td>
                            <td class="border border-slate-600">
                                <a href="{{route('mesapartes.derivar', $expediente->id)}}" title="Derivar"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>&nbsp;&nbsp;
                                <a href="{{route('mesapartes.destroy', $expediente->id)}}" class="eliminar" title="Eliminar"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <br>
                    {{$registros->links()}}
                </div>
            </div>
        </div>
    </div>
    


</x-app-layout>
