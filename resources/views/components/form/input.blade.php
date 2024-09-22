@props(['name', 'type' => 'text'])
<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <input type="{{$type}}" id="{{$name}}" class="form-control" required name="{{$name}}" value="{{old($name)}}">
    <x-error :name="$name"></x-error>
    <x-form.input-wrapper>