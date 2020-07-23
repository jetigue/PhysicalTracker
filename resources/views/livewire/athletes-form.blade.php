<form wire:submit.prevent="submit">
    <div class="flex flex-wrap justify-between bg-gray-100 p-4 rounded-md shadow">

        <div class="flex flex-col w-full py-1">
            <label for="first_name" class="text-sm px-1">First Name</label>
            <input wire:model="first_name"
                   type="text"
                   class="border-2 rounded-md px-2 h-10"
            >
            @error('first_name') <span class="text-xs text-red-600 font-semibold">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col w-full py-1">
            <label for="last_name" class="text-sm px-1">Last Name</label>
            <input wire:model="last_name"
                   type="text"
                   class="border-2 rounded-md px-2 h-10"
            >
            @error('last_name') <span class="text-xs text-red-600 font-semibold">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col w-full py-1">
            <label for="sex" class="text-sm px-1">Sex</label>
            <select wire:model="sex"
                    class="px-2 h-10 py-2 border-2 rounded-md">
                <option selected="selected"></option>
                <option value="m">Male</option>
                <option value="f">Female</option>
            </select>
             @error('sex') <span class="text-xs text-red-600 font-semibold">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col w-full py-1">
            <label for="grad_year" class="text-sm px-1">Class of...</label>
            <input wire:model="grad_year"
                   type="number"
                   min="2000"
                   max="2030"
                   class="border-2 rounded-md px-2 h-10"
            >
            @error('grad_year') <span class="text-xs text-red-600 font-semibold">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col w-full py-1">
            <label for="dob" class="text-sm px-1">Date of Birth</label>
            <input wire:model="dob"
                   type="date"
                   min="2000-01-01"
                   class="border-2 rounded-md px-2 h-10"
            >
            @error('dob') <span class="text-xs text-red-600 font-semibold">{{ $message }}</span> @enderror
        </div>

        <div class="w-full pt-4 text-right">
            <button
                    type="submit"
                    class="bg-green-400 hover:bg-green-700 border-2 border-green-500 text-white px-2 py-1 rounded-md"
            >
                Add Athlete
            </button>
        </div>






    </div>

</form>
