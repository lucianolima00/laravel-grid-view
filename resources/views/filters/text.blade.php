@php
/** @var string $name */
/** @var string $value */
@endphp
<input id="{{ $name }}_filter" type="text" class="form-control grid-filter-input {{ $class }}" name="filters[{{ $name }}]" value="{{ $value }}" role="grid-view-filter-item" style="{{ $style }}">
