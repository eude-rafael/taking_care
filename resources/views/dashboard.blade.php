 



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
             


            <nav class="py-4 px-4 sm:px-6 lg:px-4 xl:px-6 text-sm font-medium">
                <ul class="flex space-x-3 m-b-0">
                    <li>
                        <div class="px-3 py-2 rounded-md dark:bg-transparent dark:text-slate-300  cursor-pointer js_list_link_action_hidden">
                            Links cadastrados
                        </div>
                    </li>
                    <li>
                        <div class="px-3 py-2 rounded-md bg-slate-50 cursor-pointer dark:bg-transparent dark:text-slate-300 dark:ring-1 dark:ring-slate-700 ">
                           Executar verificação
                        </div>
                    </li>
                    
                </ul>
            </nav>




            <nav class="frame_input_action_save_link_js py-4 px-4 sm:px-6 lg:px-4 xl:px-6 text-sm font-medium border-top-silver-1-px    js_action_cad_link">
                <input type="input" class="input_action_save_link_js rounded    sm:px-6 lg:px-4 xl:px-6 text-pink-500 border inputs_paddings" placeholder="http://www.link.com" />
                @csrf
                <button class="border inputs_paddings rounded action_save_link_js">Salvar link</button>
            </nav>

            <nav class="py-4 px-4 sm:px-6 lg:px-4 xl:px-6 text-sm font-medium border-top-silver-1-px    js_action_list_link">
                <ul class="list_link_body  space-x-3 m-b-0 line_link_space">
                     
                </ul>
            </nav>




            </div>
        </div>
    </div>
</x-app-layout>


<div class="tkidToken_JS" tkid="{{ $token }}"></div>