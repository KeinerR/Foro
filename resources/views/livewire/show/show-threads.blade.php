<div class="mx-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex gap-10 py-12">
    
<div class="w-64">

    <a href=""  class="block w-full py-4 mb-10  bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white/90 font-bold text-center test-center rounded-md ">Preguntar</a>

    <ul>

        @foreach ($categories as $itemsCategories )
            
        
        <li class="mb-2">
            <a href="" wire:click.prevent="filterByCategory({{ $itemsCategories->id }})" class=" p-2 rounded-md  flex  bg-slate-800 items-center gap-2 text-white/60 hover:text-white font-semibold text-xs capitalize">
                <span class="w-2 h-2 rounded-full" style="background-color: {{ $itemsCategories->color }}";></span>
                {{ $itemsCategories->name }}
            </a>
        </li>
        @endforeach
         <li>
            <a href="" wire:click.prevent="filterByCategory(null)" class=" p-2 rounded-md  flex  bg-slate-800 items-center gap-2 text-white/60 hover:text-white font-semibold text-xs ">
                <span class="w-2 h-2 rounded-full" style="background-color: #000";></span>
                todos los resultados
            </a>
        </li>
    </ul>
</div>

<div class="w-full">

      <form class="mb-4">
        <input  type="search" placeholder=" #"
         class=" bg-slate-800  border-0 rounded-md w-1/3 p-3 text-white/60 text-xs "
         wire:model.live="search"
         />
      </form>
    @foreach ($threads as $threads )

    <div class=" rounded-md bg-gradient-to-r from-slate-800 to-slate-900 hover:to-slate-800 mb-4">

        <div class="p-4 flex gap-4">
          <div> 
            <img src="{{ $threads->user->avatar() }}" alt="{{ $threads->user->name }}" class="rounded-md">
            </div>
          <div class="w-full">
            <h2 class="mb-4 flex items-start justify-between">
                <a href="{{ route('thread',$threads) }}" class=" text-xl font-semibold text-white/90">{{ $threads->title }}</a>
               <span class=" rounded-full text-xs py-2 px-4 capitalize " style="color: {{ $threads->category->color }}; border:1px solid {{ $threads->category->color }}"> 
                {{ $threads->category->name }}
               </span>
            </h2>

            <p class="flex items-center justify-between w-full text-xs">
                <span class="text-blue-600 font-semibold">
                    {{ $threads->user->name }}
                    <span class="text-white/90">{{$threads->created_at->diffForHumans()}}</span>
                </span>

                <span  class=" flex items-center gap-1 text-slate-700">
                    <svg class="h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                     </svg>

                    {{ $threads->replies_count }}
                    Respuesta{{ $threads->replies_count  !== 1 ? 's':'' }}
                    | <a href="" class="hover:text-white">Editar</a>  </span>
            </p>
          </div>
        </div>
    </div>
    @endforeach
</div>

</div>
