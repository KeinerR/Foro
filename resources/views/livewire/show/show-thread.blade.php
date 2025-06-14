<div class="mx-w-4xl mx-auto px-4 sm:px-6 lg:px-8  gap-10 py-12">
    



      

      <div class=" rounded-md bg-gradient-to-r from-slate-800 to-slate-900  mb-4">

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

            <p class=" mb-4 text-blue-600 font-semibold text-xs">
                {{ $threads->user->name }}

                <span class="text-white/90">{{$threads->created_at->diffForHumans()}}</span>


            </p>
            <p>
                {{ $threads->content }}
            </p>
          </div>
        </div>
      </div>

      <div wire:key="replies-list" wire:on="refresh-replies">
    @foreach($replies as $reply)
        @livewire('show-reply', ['reply' => $reply], key($reply->id))
    @endforeach
</div>

     <form wire:submit="postReply">
        
      <input type="text"
      placeholder="escriber una respuesta"
      class=" bg-slate-800  border-0 rounded-md w-full p-3 text-white/60 text-xs "
      wire:model.defer='body'
      >
     </form>
      <!---- formulario ----->

</div>

