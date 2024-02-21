<select
    id="countries"
    class="bg-gray-50 border w-28 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected>Sort By</option>
    <option
        wire:click="sortBy('asc')"
        value="asc">Newest
    </option>
    <option
        wire:click="sortBy('desc')"
        value="desc">Oldest
    </option>
</select>
