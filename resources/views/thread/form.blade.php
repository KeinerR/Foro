


   <div>
          <select 
                name="category_id"
                class=" bg-slate-800  border-1 border-slate-800 rounded-md w-full p-3 text-white/60 text-xs mb-4 "
                 >
                <option value="">Selecciona una categoria</option>
                 @foreach ($categories as $category )
                     <option 
                        value="{{ $category->id }}"
                        @if (old('category_id',$thread->category_id)  == $category->id)
                            selected
                        @endif
                        >{{$category->name}}</option>
                 @endforeach

            </select>

                @error('category_id')
                    <span class=" bg-white text-red-800 mb-4 py-3 px-2 rounded-md">{{$message}}</span>
                @enderror
            <input 
                type="text"
                name="title"
                placeholder="escribe un titulo" 
                value="{{ old('title',$thread->title)}} "
                class="bg-slate-800  border-1 border-slate-800 rounded-md w-full p-3 text-white/60 text-xs mb-4"
                >
                @error('title')
                    <span class=" bg-white text-red-800 mb-4 py-3 px-2 rounded-md">{{$message}}</span>
                @enderror
            <textarea 
                name="content"
                rows="10"
                class="bg-slate-800  border-1 border-slate-800 rounded-md w-full p-3 text-white/60 text-xs mb-4"
                placeholder="Escribe el contenido de la pregunta">
                {{old('content', $thread->content) }}

            </textarea>  
                @error('content')
                        <span class=" bg-white text-red-800 mb-4 py-3 px-2 rounded-md">{{$message}}</span>
                @enderror  
   </div>

