<div>

    <div class=" rounded-md bg-gradient-to-r from-slate-800 to-slate-900  hover-slate-800 mb-4">

        <div class="p-4 flex gap-4">
            <div>
                <img src="{{ $reply->user->avatar() }}" alt="{{ $reply->user->name }}" class="rounded-md">
            </div>
            <div class="w-full">


                <p class=" mb-2 text-blue-600 font-semibold text-xs">
                    {{ $reply->user->name }}



                </p>
                
                @if ($is_editing)
                  
                <form wire:submit="updatePost" class="mt-4">

                    <input type="text" placeholder="escriber una respuesta"
                        class=" bg-slate-800  border-1 border-slate-800 rounded-md w-full p-3 text-white/60 text-xs "
                        wire:model.defer='body'>
                </form>
                @else
                <p class="text-white/60 text-xs">
                    {{ $reply->content }}
                </p>
                @endif

                @if ($is_creating)
                  
                <form wire:submit="postChiald" class="mt-4">

                    <input type="text" placeholder="escriber una respuesta"
                        class=" bg-slate-800  border-1 border-slate-800 rounded-md w-full p-3 text-white/60 text-xs "
                        wire:model.defer='body'>
                </form>
                

                @endif
                <p class="mt-4 text-white/60 text-xs flex gap-2 justify-end">
                   @if (is_null($reply->reply_id))
                     <a href="#" wire:click.prevent="$toggle('is_creating')">responder</a>
                   @endif 

                   @can('update',$this->reply)
                     
                   <a href="#" wire:click.prevent="$toggle('is_editing')">editar</a>
                   @endcan
                </p>
            </div>
        </div>
    </div>

    <div wire:key="replies-list" wire:on="refresh-replies">
        @foreach ($reply->replies as $item)
            <div class="ml-8">
                @livewire('show-reply', ['reply' => $item], key($item->id))
            </div>
        @endforeach
    </div>

</div>
