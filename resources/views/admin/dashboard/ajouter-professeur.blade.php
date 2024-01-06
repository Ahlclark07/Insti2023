@extends("layouts.dashboard")

@section("page-content")
<div class="w-[80%] mx-[10%]">

    <h3 class="text-xl font-bold uppercase">Ajouter un ou des professeurs</h3>
    <div class="flex justify-end">
        <a href="#">
            <x-primary-button class="mt-5">
                <a href="{{route('admin.ajoutprofesseurs')}}">
                    {{ __('Utiliser un fichier excel') }}
                </a>
            </x-primary-button>
        </a>
    </div>

   <form method="POST" action="{{route('admin.savecompte')}}">
     <input type="hidden" name="type" value="{{$id}}">
    <x-inscription-form>

    </x-inscription-form>
   </form>
     <x-tableau>
        @section("Liste")

        @foreach ($professeurs as $prof)

        <tr class="border-b border-dashed last:border-b-0">
       <td class="p-3 pl-0">
         <div class="flex items-center">
           <div class="relative inline-block shrink-0 rounded-2xl me-3">
             <img src="https://raw.githubusercontent.com/Loopple/loopple-public-assets/main/riva-dashboard-tailwind/img/img-49-new.jpg" class="w-[50px] h-[50px] inline-block shrink-0 rounded-2xl" alt="">
           </div>
           <div class="flex flex-col justify-start">
             <a href="javascript:void(0)" class="mb-1 font-semibold transition-colors duration-200 ease-in-out text-lg/normal text-secondary-inverse hover:text-primary">{{$prof->name}} </a>
           </div>
         </div>
       </td>
       <td class="p-3 pr-0 text-end">
         <span class="font-semibold text-light-inverse text-md/normal">{{ $prof->profil?->filiere }}</span>
       </td>
       <td class="p-3 pr-0 text-end">
         <span class="text-center uppercase align-baseline inline-flex px-2 py-1 mr-auto items-center font-semibold text-base/none text-success bg-success-light rounded-lg">
          {{ $prof->profil?->annee }}
       </td>
       <td class="p-3 pr-12 text-end">
         <a href="#" class="bg-red-400 p-3 text-white rounded-xl">Supprimer</a>
       </td>
     </tr>
        @endforeach
        @endsection
   </x-tableau>
   @if ($professeurs)
       <div>
            {{$professeurs->links()}}
        </div>
   @endif



</div>
@endsection
