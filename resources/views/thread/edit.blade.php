<x-layouts.app>
    <div class="mx-w-4xl mx-auto px-4 sm:px-6 lg:px-8  gap-10 py-12">

        <div class=" rounded-md bg-gradient-to-r from-slate-800 to-slate-900  mb-4">

            <div class="p-4 ">

                <div class="w-full">
                    <h2 class="mb-4  text-xl font-semibold text-white/90">
                        Editar pregunta
                    </h2>

                    <form action="{{ route('threadView.update', $thread) }}" method="POST">
                        @csrf
                        @method('PUT')

                        

                        @include('thread.form')

                        <button type="submit"
                            class="block w-full py-4 mb-10 bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white/90 font-bold text-center rounded-md transition-colors duration-300">
                            Actualizar pregunta
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>

    </div>
</x-layouts.app>
