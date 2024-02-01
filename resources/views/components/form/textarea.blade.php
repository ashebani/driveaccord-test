@props(['name' => 'text', 'disabled' => false, 'placeholder' => 'Add a text here...', 'isInput' => true, '$defaultValue' => ''])

@php
    $mutualStyles = 'w-full border-gray-300 mt-1 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm'
@endphp

<textarea
    placeholder="{{$placeholder}}"
    id="{{$name}}"
    required
    type="text"
    name="{{$name}}"
    {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $mutualStyles . "w-full min-h-24 max-h-96",])!!}>{{old($name) ?? $slot}}</textarea>



