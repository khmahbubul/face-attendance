<table>
    <tr>
        <th>Date</th>
        <th>Attendance status</th>
    </tr>
    <tr>
        @foreach ($attendances as $attendance)
            @continue(empty($attendance->entry))
            <td>{{ date('M jS Y', strtotime($attendance->created_at)) }}</td>
            @if (strtotime(explode(' ', $attendance->entry)[1]) < strtotime($officeHour))
                <td style="background: #00FF00">On time</td>
            @else
                <td style="background: #FF0000">Late</td>
            @endif
        @endforeach
    </tr>
</table>
