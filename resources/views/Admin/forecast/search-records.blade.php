@extends('Admin.Layout.master')
@section('content')
    <div class="page-inner">
        <div class="page-header">
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <!--resources/views/Admin/your-view.blade.php -->
                    <div class="card-header">
                        <h4 class="card-title">Search records</h4>
                        <div class="filter-section mt-3">
                            <form method="GET" action="{{ url('admin/forecast/search-records') }}">
                                <div class="row">
                                    <div class="col-md-2">
                                        <select name="segment" class="form-control">
                                            <option value="" {{ request('segment') ? '' : 'selected' }}>
                                                Select Segment</option>
                                            @foreach ($segments as $segment)
                                                <option value="{{ $segment }}"
                                                    {{ request('segment') == $segment ? 'selected' : '' }}>
                                                    {{ $segment }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <select name="category" class="form-control">
                                            <option value="" {{ request('category') ? '' : 'selected' }}>
                                                Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category }}"
                                                    {{ request('category') == $category ? 'selected' : '' }}>
                                                    {{ $category }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <select name="revised_category" class="form-control">
                                            <option value="" {{ request('revised_category') ? '' : 'selected' }}>
                                                Select Revised Category</option>
                                            @foreach ($revisedCategories as $revised)
                                                <option value="{{ $revised }}"
                                                    {{ request('revised_category') == $revised ? 'selected' : '' }}>
                                                    {{ $revised }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <select name="country" class="form-control">
                                            <option value="" {{ request('country') ? '' : 'selected' }} disabled>
                                                Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country }}"
                                                    {{ request('country') == $country ? 'selected' : '' }}>
                                                    {{ $country }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                        <a href="{{ url('admin/forecast/all-records') }}"
                                            class="btn btn-secondary">Reset</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                          <table id="basic-datatables"
                                            class="display table table-striped table-hover dataTable" role="grid"
                                            aria-describedby="basic-datatables_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 242.688px;">Segment</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 366.578px;">Category</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 187.688px;">Revised Category</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 84.5px;">Country</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 184.234px;">Gp ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">Customer Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">Jan'25 A</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">FeF'25 A</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">Mar'25 A</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">Apr'25 A</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">May'25 A</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">Jun'25 A</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">FY 2025 H1</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">Jul'25 F2</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">Aug'25 F2</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">Sep'25 F2</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">Oct'25 F2</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">Nov'25 F2</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">Dec'25 F2</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">FY 2025 H2</th>
                                                    <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 156.312px;">FY 2025</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if (count($forecasts) >= 1)
                                                    @foreach ($forecasts as $record)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{ $record->segment }}</td>
                                                            <td>{{ $record->category }}</td>
                                                            <td>{{ $record->revised_category }}</td>
                                                            <td>{{ $record->country }}</td>
                                                            <td>{{ $record->gp_id }}</td>
                                                            <td>{{ $record->customer_name }}</td>
                                                            <td>{{ $record->jan_25_a }}</td>
                                                            <td>{{ $record->feb_25_a }}</td>
                                                            <td>{{ $record->mar_25_a }}</td>
                                                            <td>{{ $record->apr_25_a }}</td>
                                                            <td>{{ $record->may_25_a }}</td>
                                                            <td>{{ $record->jun_25_a }}</td>
                                                            <td>{{ $calculator->getRecordHalfYearTotal($record) }}</td>
                                                            <td>{{ $record->jul_25_f2 }}</td>
                                                            <td>{{ $record->aug_25_f2 }}</td>
                                                            <td>{{ $record->sep_25_f2 }}</td>
                                                            <td>{{ $record->oct_25_f2 }}</td>
                                                            <td>{{ $record->nov_25_f2 }}</td>
                                                            <td>{{ $record->dec_25_f2 }}</td>
                                                            <td>{{ $calculator->getRecordHalfYearTotalFromJuly($record) }}
                                                            </td>
                                                            <td>{{ $calculator->getFullYearTotaleachMonth($record) }}</td>
                                                        </tr>
                                                    @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="table-active">
                                                    <th colspan="6">Total (All Records)</th>
                                                    <th>{{ number_format($totals['jan']) }}</th>
                                                    <th>{{ number_format($totals['feb']) }}</th>
                                                    <th>{{ number_format($totals['mar']) }}</th>
                                                    <th>{{ number_format($totals['apr']) }}</th>
                                                    <th>{{ number_format($totals['may']) }}</th>
                                                    <th>{{ number_format($totals['jun']) }}</th>
                                                    <th>{{ number_format($fy_h1_total) }}</th>
                                                    <th>{{ number_format($totals['jul']) }}</th>
                                                    <th>{{ number_format($totals['aug']) }}</th>
                                                    <th>{{ number_format($totals['sep']) }}</th>
                                                    <th>{{ number_format($totals['oct']) }}</th>
                                                    <th>{{ number_format($totals['nov']) }}</th>
                                                    <th>{{ number_format($totals['dec']) }}</th>
                                                    <th>{{ number_format($fy_h2_total) }}</th>
                                                    <th>{{ number_format($getFullYearTotalAllRecords) }}
                                                    </th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                        @else
                                            <tr>
                                                <td colspan="7">No Record found</td>
                                            </tr>
                                            @endif
                                        </table>
                                        <div class="mt-4 d-flex justify-content-center">
                                            {{ $forecasts->appends(request()->query())->links('pagination::bootstrap-5') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
