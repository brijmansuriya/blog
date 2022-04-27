<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table id="{{ $dataTableId }}" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                @foreach ($dateTableFields as $field)
                                    <th>
                                        {{ $field['title'] }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
