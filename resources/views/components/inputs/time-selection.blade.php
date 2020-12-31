@props([
'hour',
'minute',
'for'
])
<div class="rounded-md shadow-sm">
    <select class="inline-block" id="{{ $for }}-hour" name="{{ $for }}-hour">
        @foreach(range(0, 23) as $hour_value)
            <option {{ $hour == "$hour_value" ? "selected" : "" }} value={{ $hour_value }}>{{ sprintf("%02d", $hour_value) }}</option>
        @endforeach
    </select>

    <div class="inline-block">:</div>
    <select class="inline-block" id="{{ $for }}-minute" name="{{ $for }}-minute">
        @foreach(range(0, 59) as $minute_value)
            <option {{ $minute == "$minute_value" ? "selected" : "" }} value={{ $minute_value }}>{{ sprintf("%02d", $minute_value) }}</option>
        @endforeach
    </select>

    @error("{{ $for }}-hour", "{{ $for }}-minute")
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
