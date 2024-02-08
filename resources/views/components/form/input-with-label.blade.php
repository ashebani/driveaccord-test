@props(['name' => 'text', 'disabled' => false, 'placeholder' => 'Add a text here...', 'isInput' => true, '$defaultValue' => '', 'type' => 'text', 'value'=>'', 'inputErrors' => ''])

@php
    $mutualStyles = 'w-full border-gray-300 mt-1 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm'
@endphp

<div class="mt-4">
    {{--Label--}}
    <label
        for="{{$name}}"
        value="__('{{$name}}')"
        class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
        {{ ucfirst($name)}}
    </label>

    {{--Input--}}
    @if($isInput)
        <input
            required
            id="{{$name}}"
            type="{{$type}}"
            placeholder="{{$placeholder}}"
            name="{{$name}}"
            value="{{old($name) ?? $value}}"
            required
            autofocus
            {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $mutualStyles,
    ])!!} />
    @else
        <textarea
            placeholder="{{$placeholder}}"
            {{--            id="{{$name}}"--}}
            type="text"
            name="{{$name}}"
            {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $mutualStyles . "w-full min-h-24 max-h-96",])!!}>{{old($name)}}</textarea>
    @endif

    {{--Error--}}
    <x-form.input-error
        :messages="$inputErrors ?? $errors->get($name)"
        class="mt-2"/>
</div>


