@props(['name'])

<label
    for="{{$name}}"
    value="__('{{$name}}')"
    class='block font-medium text-sm text-gray-700 dark:text-gray-300'>
    {{ ucfirst($name)}}
</label>
