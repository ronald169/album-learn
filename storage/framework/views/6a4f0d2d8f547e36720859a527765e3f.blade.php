    <div>
        <!-- Label -->
        @if($label)
            <label for="{{ $uuid }}" class="pt-0 label label-text font-semibold">
                <span>
                    {{ $label }}

                    @if($attributes->get('required'))
                        <span class="text-error">*</span>
                    @endif
                </span>
            </label>
        @endif

        <!-- Range -->
        <input
            type="range"
            min="{{ $min }}"
            max="{{ $max }}"
            {{ $attributes->merge(["class" => "range", "id" => $uuid])->except('label', 'hint', 'min', 'max') }}
        />

        <!-- ERROR -->
        @if(!$omitError && $errors->has($errorFieldName()))
            @foreach($errors->get($errorFieldName()) as $message)
                @foreach(Arr::wrap($message) as $line)
                    <div class="{{ $errorClass }}" x-classes="text-red-500 label-text-alt p-1">{{ $line }}</div>
                    @break($firstErrorOnly)
                @endforeach
                @break($firstErrorOnly)
            @endforeach
        @endif

        <!-- HINT -->
        @if($hint)
            <div class="label-text-alt text-gray-400 p-1 pb-0">{{ $hint }}</div>
        @endif
    </div>