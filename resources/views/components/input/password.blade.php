@props(['name' => 'password', 'label' => null])

<x-acme::input :name="$name" :label="$label" component="password">
    <div x-data="{visible:false}">
        <input :type="visible?'text':'password'" :id="$id('input')" name="{{ $name }}" x-ref="input" {{ $attributes }} />
        <button type="button" tabindex="-1" @click.prevent.stop="visible=!visible;$refs.input.focus()">
            <i class="bi-eye-slash" x-cloak x-show="!visible"></i>
            <i class="bi-eye" x-cloak x-show="visible"></i>
        </button>
    </div>
</x-acme::input>
