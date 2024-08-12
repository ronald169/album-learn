        <div>
            <label for="{{ $uuid }}" class="flex gap-3 items-center cursor-pointer">
                @if($right)
                    <span @class(["flex-1" => !$tight])>
                        {{ $label}}
                    </span>
                @endif

                <input
                    type="checkbox"
                    {{ $attributes->whereDoesntStartWith('class') }}
                    {{ $attributes->merge(["id" => $uuid])->class(['checkbox checkbox-primary']) }}  />

                @if(!$right)
                    {{ $label}}
                @endif
            </label>

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
                <div class="label-text-alt text-gray-400 py-1 pb-0">{{ $hint }}</div>
            @endif
        </div>