<form action={{route('update.profil')}} method="post" class="flex justify-center mt-10 mb-10" enctype="multipart/form-data">
    @csrf
    <div>
        <h2 class="text-3xl font-bold text-center">Modifier mon profil</h2>
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-8">


            <div class="sm:col-span-8">
              <label for="nom" class="block text-sm font-medium leading-6 text-gray-900">Nom</label>
              <div class="mt-2">
                <input required id="nom" name="nom"  autocomplete="nom" value="{{auth()->user()->profil?->nom ?? auth()->user()->name}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
              @error('nom')
                    <span class="text-red-700">{{ $message }}</span>
              @enderror
            </div>
            <div class="sm:col-span-8">
                <label for="prenoms" class="block text-sm font-medium leading-6 text-gray-900">Prénoms</label>
                <div class="mt-2">
                  <input required id="prenoms" value="{{auth()->user()->profil?->prenom ?? auth()->user()->name}}" name="prenoms" autocomplete="prenoms" class=" block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            @error('prenoms')
                <span class="text-red-700">{{ $message }}</span>
            @enderror
            </div>
            @if (auth()->user()->roles()->contains('enseignant') && $grades)
                <div class="sm:col-span-8">
                    <label for="grade" class="block text-sm font-medium leading-6 text-gray-900">Grade</label>
                        <div class="mt-2 w-full">
                            <select required id="grade" name="grade" autocomplete="grade" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @foreach ($grades as $grade)
                                    <option value="{{$grade->id}}" @selected(auth()->user()->grade?->last()->grade == $grade->grade)>{{$grade->grade}}</option>
                                @endforeach
                            </select>
                        </div>
                    @error('grade')
                        <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            @endif


            <div @class(['sm:col-span-4', 'hidden' => !auth()->user()->roles()->contains('enseignant')])>
                <label for="specialite" class="block text-sm font-medium leading-6 text-gray-900">Spécialité</label>
                <div class="mt-2">
                  <input required id="specialite" name="specialite" value="{{auth()->user()->profil?->specialite}}" autocomplete="specialite" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                </div>
                @error('specialite')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>

            <div @class(['sm:col-span-4', 'hidden' => !auth()->user()->roles()->contains('etudiant')])>
                <label for="filiere" class="block text-sm font-medium leading-6 text-gray-900">Filière</label>
                <div class="mt-2">
                  <select required id="filiere" name="filiere" autocomplete="filiere" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option @selected(auth()->user()->profil?->filiere =="GEI")>GEI</option>
                    <option @selected(auth()->user()->profil?->filiere =="GE")>GE</option>
                    <option @selected(auth()->user()->profil?->filiere =="MS")>MS</option>
                    <option @selected(auth()->user()->profil?->filiere ==="GMP")>GMP</option>
                    <option @selected(auth()->user()->profil?->filiere =="GC")>GC</option>
                  </select>
                </div>
                @error('filiere')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
                @error('date_de_naissance')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
            <div class="sm:col-span-4">
                <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Date de naissance</label>
                <div class="mt-2">
                    <input required value="{{auth()->user()->profil?->date_de_naissance}}" id="date" name="date_de_naissance" type="date" autocomplete="date" class=" block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-8">
                <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Photo</label>
                <div class="mt-2 flex items-center justify-center gap-x-3">
                  <img
                  src="{{asset('storage/usersImages/'. (auth()->user()->profil?->photo ?? 'userProfile.png'))}}"
                  alt="Avatar user"
                  class="previewImage h-10 w-10 md:w-16 md:h-16 rounded-full"
                  />
                  <label for="profil-image-input" class="cursor-pointer rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Changer photo de profil</label>
                  <input id="profil-image-input" type="file" name="photo_de_profil" class="hidden rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                </div>
                @error('photo_de_profil')
                    <span class="text-red-700">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mt-6 w-full self-center flex items-center justify-center">
            {{-- <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 w-full">Modifier mon profil</button> --}}
            <input type="submit" onclick="fix()" value="Modifier" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        </div>
    </div>
</form>
