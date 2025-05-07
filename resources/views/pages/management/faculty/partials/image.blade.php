<section>
 <div>
     <div class="flex justify-between">
         <div class="bg-white shadow-sm sm:rounded-lg cursor-pointer mb-4" >
             <img src="{{asset('/images/dept_image.png')}}" alt="Faculty Image"  >
         </div>

         <span><i class="fa fa-pencil text-blue-800 cursor-pointer"></i></span>
     </div>

     <div class="flex justify-between">
         <div class="space-y-3">
             <div class="flex my-5">
                 <h2 class="font-bold"><x-input-label for="files" :value="__('Name')" /> {{$faculty->name}}</h2>

             </div>
             <div class="flex my-5">
                 <h2 class="font-bold"><x-input-label for="files" :value="__('Email')" />{{$faculty->email}}</h2>

             </div>
             <div class="flex my-5">
                 <h2 class="font-bold"><x-input-label for="telephone" :value="__('Telephone')" />{{$faculty->telephone}}</h2>

             </div>
         </div>

         <div>
             <x-primary-button x-data=""
                               x-on:click.prevent="$dispatch('open-modal', 'edit-faculty')">
                 Edit <span class="space-x-3"><i class="fa fa-pencil text-blue-800 cursor-pointer"></i></span>
             </x-primary-button>
         </div>
     </div>
 </div>

    @include('pages.management.faculty.partials.edit-faculty-form')
</section>
