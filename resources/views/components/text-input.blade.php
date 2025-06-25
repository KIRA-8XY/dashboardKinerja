@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-cyan-400 focus:ring-cyan-400 rounded-md shadow-sm']) }}>
