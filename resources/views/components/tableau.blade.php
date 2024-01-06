<!-- component -->

<div class="flex flex-wrap -mx-3 mb-5">
  <div class="w-full max-w-full px-3 mb-6  mx-auto">
    <div class="relative flex-[1_auto] flex flex-col break-words min-w-0 bg-clip-border rounded-[.95rem] bg-white m-5">
      <div class="relative flex flex-col min-w-0 break-words border border-dashed bg-clip-border rounded-2xl border-stone-200 bg-light/30">
        <!-- card header -->
        <div class="px-9 pt-5 flex justify-between items-stretch flex-wrap min-h-[70px] pb-0 bg-transparent">
          <h3 class="flex flex-col items-start justify-center m-2 ml-0 font-medium text-xl/tight text-dark">
            <span class="mr-3 font-semibold text-dark">Projects Deliveries</span>
            <span class="mt-1 font-medium text-secondary-dark text-lg/normal">All projects from the Loopple team</span>
          </h3>
          <div class="relative flex flex-wrap items-center my-2">
            <a href="javascript:void(0)" class="inline-block text-[.925rem] font-medium leading-normal text-center align-middle cursor-pointer rounded-2xl transition-colors duration-150 ease-in-out text-light-inverse bg-light-dark border-light shadow-none border-0 py-2 px-5 hover:bg-secondary active:bg-light focus:bg-light"> See other projects </a>
          </div>
        </div>
        <!-- end card header -->
        <!-- card body  -->
        <div class="flex-auto block py-8 pt-6 px-9">
          <div class="overflow-x-auto">
            <table class="w-full my-0 align-middle text-dark border-neutral-200">
              <thead class="align-bottom">
                <tr class="font-semibold text-[0.95rem] text-secondary-dark">
                    @if (request()->is('ajouter-etudiant'))
                    <th class="pb-3 uppercase text-start min-w-[175px]">étudiant</th>
                    <th class="pb-3 uppercase text-end min-w-[100px]">filière</th>
                    <th class="pb-3 uppercase text-end min-w-[100px]">année d'étude</th>
                    <th class="pb-3 uppercase pr-12 text-end min-w-[175px]">Actions</th>
                    @else
                    <th class="pb-3 uppercase text-start min-w-[175px]">Professeur</th>
                    <th class="pb-3 uppercase text-end min-w-[100px]">Grade</th>
                    <th class="pb-3 uppercase text-end min-w-[100px]">Spécia</th>
                    <th class="pb-3 uppercase pr-12 text-end min-w-[175px]">Actions</th>

                    @endif
                </tr>
              </thead>
              <tbody>
                @yield("Liste")

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
