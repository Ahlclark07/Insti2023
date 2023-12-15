@csrf

<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Ajouter un fichier</label>
<input name="fichierExcel" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">

 <x-primary-button class="mt-5">
                {{ __('Ajouter le compte') }}
            </x-primary-button>
