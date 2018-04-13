<table class="striped responsive-table">
            <caption> 
                <h5 class="center"> Records For {{ $year }}</h5>
            </caption>
            <tr>
                <th> Month </th>
                <th> Reading </th>
                <th colspan="2" class="center noPrint"> Options </th>
            </tr>
            @forelse ($records as $record)
                <tr>
                    <td>{{ monthToText($record->month) }}</td>
                    <td>{{ $record->reading }}</td>
                    <td class="noPrint">
                        <a href="#edit_record_{{ $record->id }}"><i class="fa fa-pencil blue-text"></i></a>
                    </td>
                    <td class="noPrint"><a href="#delete_record_{{ $record->id }}"><i class="fa fa-trash red-text"></i></a></td>
                </tr>
            @empty
                <tr><td colspan="4" class="center"> There are no results yet. </td></tr>
            @endforelse
        </table> 