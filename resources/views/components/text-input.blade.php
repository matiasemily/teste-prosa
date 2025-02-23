@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-cyan-500 focus:ring-cyan-500 rounded-md shadow-sm']) }}>
