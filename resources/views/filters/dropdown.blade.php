@php
    /** @var string $name */
    /** @var array $data */
    /** @var mixed $value */
@endphp
<select id="{{ $name }}_filter" class="form-control grid-filter-input {{ $class }}" name="filters[{{ $name }}]" role="grid-view-filter-item" style="min-width: fit-content;">
    <option value="">{!! trans('grid_view::grid.select') !!}</option>
    @foreach($data as $key => $val)
        <option value="{!! $key !!}" @if($value !== null && $value == $key) selected="selected" @endif >{!! $val !!}</option>
    @endforeach
</select>
