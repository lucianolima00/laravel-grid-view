@php
    /** @var \Lucianolima00\GridView\Columns\BaseColumn[] $columnObjects */
    /** @var \Illuminate\Pagination\LengthAwarePaginator $paginator */
    /** @var boolean $useFilters */
    $checkboxesExist = false;
@endphp
<style>
    .table-bordered tfoot tr td {
        border-width: 0;
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="col-6 d-flex justify-content-end ms-auto">
            @if ($useFilters)
                <button id="grid_view_reset_button" type="button" class="{{ $resetButtonClass }}" style="{{ $resetButtonStyle }}">{{ $resetButtonLabel }}</button>
            @endif
        </div>
    </div>
    <div class="card-body" style="overflow-x: scroll;">
        <table class="table @if($tableBordered) table-bordered @endif @if($tableStriped) table-striped @endif @if($tableHover) table-hover @endif @if($tableSmall) table-sm @endif">
            <thead>
            <tr>
                @if ($countColumn)
                    <th width="5%">#</th>
                @endif
                @foreach($columnObjects as $column_obj)
                    <th {!! $column_obj->buildHtmlAttributes() !!}>

                        @if($column_obj->getSort() === false || $column_obj instanceof \Lucianolima00\GridView\Columns\ActionColumn)
                            {{ $column_obj->getLabel() }}

                        @elseif($column_obj instanceof \Lucianolima00\GridView\Columns\CheckboxColumn)
                            @php($checkboxesExist = true)
                            @if($useFilters)
                                {{ $column_obj->getLabel() }}
                            @else
                                <input type="checkbox" id="grid_view_checkbox_main" class="form-control form-control-sm" @if($paginator->count() == 0) disabled="disabled" @endif />
                            @endif

                        @else
                            <a class="text-nowrap" href="{{ \Lucianolima00\GridView\Helpers\SortHelper::getSortableLink(request(), $column_obj) }}">{{ $column_obj->getLabel() }}</a>
                        @endif

                    </th>
                @endforeach
            </tr>
            @if ($useFilters)
                <tr>
                    <form action="{{ $filtersFormAction }}" method="get" id="grid_view_filters_form">
                        @if ($countColumn)
                            <td></td>
                        @endif
                        @foreach($columnObjects as $column_obj)
                            <td>
                                @if($column_obj instanceof \Lucianolima00\GridView\Columns\CheckboxColumn)
                                    <input type="checkbox" id="grid_view_checkbox_main" class="form-control form-control-sm" @if($paginator->count() == 0) disabled="disabled" @endif />
                                @else
                                    {!! $column_obj->getFilter()->render() !!}
                                @endif
                            </td>
                        @endforeach
                        <input type="submit" class="d-none">
                    </form>
                </tr>
            @endif
            </thead>

            <form action="{{ $rowsFormAction }}" method="post" id="grid_view_rows_form">
                <tbody>
                @foreach($paginator->items() as $key => $row)
                    <tr>
                        @if ($countColumn)
                            <td class="align-middle px-2 text-nowrap">{{ ($paginator->currentPage() - 1) * $paginator->perPage() + $key + 1 }}</td>
                        @endif
                        @foreach($columnObjects as $column_obj)
                            <td class="px-2 {{ $column_obj->getClassName() }}">{!! $column_obj->render($row) !!}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                    <td colspan="{{ count($columnObjects) + 1 }}">
                        <div class="mx-1">
                            <div class="row">
                                <div class="col-12 col-xl-8 text-center text-xl-left">
                                    {{ $paginator->render('grid_view::pagination') }}
                                </div>
                                <div class="col-12 col-xl-4 text-center text-xl-right d-flex px-1 justify-content-end">
                                    @if (($checkboxesExist || $useSendButtonAnyway) && $paginator->count() > 0)
                                        <button type="submit" class="btn btn-danger">{{ $sendButtonLabel }}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tfoot>
                <input type="hidden" value="{!! csrf_token() !!}" name="_token">
            </form>
        </table>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <span>
                @if ($paginator->onFirstPage())
                        {!! trans('grid_view::grid.page-info', [
                            'start' => '<b>1</b>',
                            'end' => '<b>' . $paginator->perPage() . '</b>',
                            'total' => '<b>' . $paginator->total() . '</b>',
                        ]) !!}
                    @elseif ($paginator->currentPage() == $paginator->lastPage())
                        {!! trans('grid_view::grid.page-info', [
                            'start' => '<b>' . (($paginator->currentPage() - 1) * $paginator->perPage() + 1) . '</b>',
                            'end' => '<b>' . $paginator->total() . '</b>',
                            'total' => '<b>' . $paginator->total() . '</b>',
                        ]) !!}
                    @else
                        {!! trans('grid_view::grid.page-info', [
                            'start' => '<b>' . (($paginator->currentPage() - 1) * $paginator->perPage() + 1) . '</b>',
                            'end' => '<b>' . (($paginator->currentPage()) * $paginator->perPage()) . '</b>',
                            'total' => '<b>' . $paginator->total() . '</b>',
                        ]) !!}
                    @endif
                </span>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var delayTimer;

    document.addEventListener("DOMContentLoaded", function() {
        $('#grid_view_checkbox_main').click(function (event) {
            $('input[role="grid-view-checkbox-item"]').prop('checked', event.target.checked);
        });

        $('.grid-filter-input').on('input', function () {
            clearTimeout(delayTimer);

            delayTimer = setTimeout(function() {
                $('#grid_view_filters_form').submit();
            }, 800);
        });

        $('#grid_view_reset_button').click(function () {
            $('input[role="grid-view-filter-item"]').val('');
            $('select[role="grid-view-filter-item"]').prop('selectedIndex', 0);
            $('#grid_view_filters_form').submit();
        });
    });
</script>
