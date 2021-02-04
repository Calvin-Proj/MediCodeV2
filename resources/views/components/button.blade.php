<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex-auto justify-items-center px-12 py-4 bg-secondary rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-highlight hover:text-black transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
