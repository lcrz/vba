@foreach ($cateorias as $item)
    <a
        href="#"
        role="menuitem"
        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:text-gray-400 dark:hover:text-light hover:text-gray-700"
        >
        {{ $item->nombre }}
    </a>
@endforeach