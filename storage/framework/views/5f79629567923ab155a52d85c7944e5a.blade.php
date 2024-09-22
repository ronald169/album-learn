    <div>
        <label
            for="{{ $uuid }}"
            x-data="{
                theme: $persist(window.matchMedia('(prefers-color-scheme: dark)').matches ? '{{ $darkTheme }}' : '{{ $lightTheme }}').as('mary-theme'),
                init() {
                    if (this.theme == '{{ $darkTheme }}') {
                        this.$refs.sun.classList.add('swap-off');
                        this.$refs.sun.classList.remove('swap-on');
                        this.$refs.moon.classList.add('swap-on');
                        this.$refs.moon.classList.remove('swap-off');
                    }
                    this.setToggle()
                },
                setToggle() {
                    document.documentElement.setAttribute('data-theme', this.theme)
                    document.documentElement.setAttribute('class', this.theme)
                    this.$dispatch('theme-changed', this.theme)
                },
                toggle() {
                    this.theme = this.theme == '{{ $lightTheme }}' ? '{{ $darkTheme }}' : '{{ $lightTheme }}'
                    this.setToggle()
                }
            }"
            @mary-toggle-theme.window="toggle()"
            {{ $attributes->class("swap swap-rotate") }}
        >
            <input id="{{ $uuid }}" type="checkbox" class="theme-controller opacity-0" @click="toggle()" :value="theme" />
            <x-mary-icon x-ref="sun" name="o-sun" class="swap-on" />
            <x-mary-icon x-ref="moon" name="o-moon" class="swap-off"  />
        </label>
    </div>
    <script>
        document.documentElement.setAttribute("data-theme", localStorage.getItem("mary-theme")?.replaceAll("\"", ""))
        document.documentElement.setAttribute("class", localStorage.getItem("mary-theme")?.replaceAll("\"", ""))
    </script>