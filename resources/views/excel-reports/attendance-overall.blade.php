<table>
    <thead>
        <tr>
            <th>Date</th>
            @for ($i=1; $i<25; $i++)
                <th colspan="2">{{ ($i - 1) . ' - ' . ($i > 23 ? 0 : $i) }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach($attendances as $attendance)
            <tr>
                <td>{{ date('M jS Y', strtotime($attendance->created_at)) }}</td>
                @php
                    $attendanceLogs = App\Models\AttendanceLog::whereDate('created_at', '=', $attendance->created_at)->orderBy('id')->get();
                @endphp
                @for ($i=0; $i<24; $i++)
                    @php
                        $in = 0; $out = 0;
                    @endphp
                    @foreach ($attendanceLogs as &$attendanceLog)
                        @if (((int) date('H', strtotime($attendanceLog->created_at))) == $i)
                            @php
                                if($attendanceLog->type == 'in')
                                    $in++;
                                else
                                    $out++;
                                unset($attendanceLog);
                            @endphp
                        @endif
                    @endforeach
                    <td>{{ $in }} in</td>
                    <td>{{ $out }} out</td>
                @endfor
            </tr>
        @endforeach
    </tbody>
</table>