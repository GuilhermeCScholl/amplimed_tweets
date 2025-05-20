<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-block bg-purple-600 hover:bg-purple-800 text-white font-semibold px-8 py-3 rounded-full shadow transition focus:outline-none focus:ring-2 focus:ring-purple-400']) }}>
    {{ $slot }}
</button>
