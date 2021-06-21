<table {{ $attributes }}>
@foreach ($rows as $row)
{{ $row->withAttributes(['class' => 'row'])->render() }}
@endforeach
</table>