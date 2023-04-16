@php
/** @var string $name */
/** @var string $value */
@endphp
<input type="text" class="form-control {{ $class }}" name="filters[{{ $name }}]" value="{{ $value }}" role="grid-view-filter-item">
