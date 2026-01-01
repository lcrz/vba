@foreach ($cateorias as $item)
    <a
        href="#"
        role="menuitem"
        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md hover:text-gray-700"
        >
        {{ $item->nombre }}
    </a>
@endforeach