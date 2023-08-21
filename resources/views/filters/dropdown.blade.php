@php
    /** @var string|null $name */
    /** @var array|null $data */
    /** @var mixed|null $value */
@endphp
<select id="{{ $name }}_filter" class="form-control grid-filter-input {{ $class }}" name="filters[{{ $name }}]" role="grid-view-filter-item" style="min-width: fit-content;">
    <option value="">{!! trans('grid_view::grid.select') !!}</option>
    @if($data)
        @foreach($data as $key => $val)
            <option value="{!! $key !!}" @if($value !== null && $value == $key) selected="selected" @endif >{!! $val !!}</option>
        @endforeach
    @endif
</select>
