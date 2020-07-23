<form wire:submit.prevent="submit">
    <div class="flex flex-wrap justify-between bg-gray-100 p-4 rounded-md shadow">

        <div class="flex flex-col w-full py-1">
            <label for="first_name" class="text-sm px-1">Athlete</label>
            <select wire:model="athlete_id" class="border-2 rounded-md px-2 h-10" required>
                <option value=""></option>
                @foreach($athletes as $athlete)
                    <option value="{{ $athlete->id }}">{{ $athlete->last_name }}, {{ $athlete->first_name }}</option>
                @endforeach
            </select>
            @error('athlete_id') <span class="text-xs text-red-600 font-semibold">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col w-full py-1">
            <label for="dob" class="text-sm px-1">Exam Date</label>
            <input wire:model="exam_date"
                   type="date"
                   min="2020-01-01"
                   class="border-2 rounded-md px-2 h-10"
                   required
            >
            @error('exam_date') <span class="text-xs text-red-600 font-semibold">{{ $message }}</span> @enderror
        </div>
        <div class="flex w-full text-sm py-1">Completed Forms</div>

        <div class="flex flex-col px-8">

                <div class="flex w-full py-1 items-center">
                    <input
                            type="checkbox"
                            value="evaluation_form"
                            wire:model="evaluation_form"
                            class="w-4 h-4">
                    <label for="evaluation_form" class="px-2">Evaluation Form</label>
                </div>

                <div class="flex w-full py-1 items-center">
                    <input
                            type="checkbox"
                            value="consent_form"
                            wire:model="consent_form"
                            class="w-4 h-4">
                    <label for="consent_form" class="px-2">Consent Form</label>
                </div>

                <div class="flex w-full py-1 items-center">
                    <input
                            type="checkbox"
                            value="concussion_form"
                            wire:model="concussion_form"
                            class="w-4 h-4">
                    <label for="concussion_form" class="px-2">Concussion Form</label>
                </div>

                <div class="flex w-full py-1 items-center">
                    <input
                            type="checkbox"
                            value="cardiac_form"
                            wire:model="cardiac_form"
                            class="w-4 h-4">
                    <label for="cardiac_form" class="px-2">Cardiac Form</label>
                </div>


            </div>
{{--            <span x-show="isChecked" @click="uncheck()" class="text-xl" style="color:green">--}}
{{--                <i class="fas fa-check-square"></i>--}}
{{--            </span>--}}
{{--            <span x-show="!isChecked" @click="check()" class="text-xl" style="color:lightgray">--}}
{{--                <i class="bg-white far fa-square"></i>--}}
{{--            </span>--}}


        <div class="flex flex-col w-full py-1">
            <label for="restrictions" class="text-sm px-1">Restrictions (if any)</label>
            <input wire:model="restrictions"
                   type="text"
                   class="border-2 rounded-md px-2 h-10"
            >
            @error('restrictions') <span class="text-xs text-red-600 font-semibold">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col w-full py-1">
            <label for="notes" class="text-sm px-1">Notes (optional)</label>
            <textarea wire:model="notes"
                   class="border-2 rounded-md px-2 h-10 py-1"
            >
            </textarea>
            @error('notes') <span class="text-xs text-red-600 font-semibold">{{ $message }}</span> @enderror
        </div>

        <div class="w-full pt-4 text-right">
            <button
                    type="submit"
                    class="bg-green-400 hover:bg-green-700 border-2 border-green-500 text-white px-2 py-1 rounded-md"
            >
                Add Physical
            </button>
        </div>
    </div>
</form>

<script>
    function consentForm() {
        return {
            consent_form: '',
            isChecked: false,
            check() {
                this.isChecked = true
                console.log(this.consent_form)
            },
            uncheck() {
                this.isChecked = false
                console.log(this.consent_form)
            }
        }
    }
</script>