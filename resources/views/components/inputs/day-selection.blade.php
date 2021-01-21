@props([
'value' => '1',
'for'
])
<div class="rounded-md shadow-sm">
    <select id="{{ $for }}" name="{{ $for }}">
        @foreach(range(1, 7) as $day)
        <option {{ $value == "$day" ? "selected" : "" }} value={{ $day }}>@lang("app.days.{$day}")</option>
        @endforeach
    </select>
    @error("{{ $for }}")
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
