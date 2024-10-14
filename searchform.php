<form role="search" method="get" class="w-full max-w-72 rounded-3xl mx-auto overflow-hidden hidden md:block" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="flex">
        <div class="relative w-full">
            <input type="search" placeholder="<?php echo esc_attr_x( 'Поиск…', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Ищем:', 'label' ); ?>" id="voice-search"
                   class="bg-neutral-200 text-gray-900 text-sm w-full p-2.5 border-none focus:outline-none" required />
            <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-rose-500">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Поиск</span>
            </button>
        </div>
    </div>
</form>
