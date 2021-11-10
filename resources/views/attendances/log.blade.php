<div class="table-responsive">
    <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Date</th>
                <th scope="col">In/Out</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendanceLogs as $attendanceLog)
                <tr>
                    <td>{{ $attendanceLog->id }}</td>
                    <td>{{ date('d-m-Y H:i:s', strtotime($attendanceLog->created_at)) }}</td>
                    <td>{{ $attendanceLog->type ? $attendanceLog->type : '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
