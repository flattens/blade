<td {{ $attributes }}>
@foreach ($content as $component)
{{ $component->withAttributes(['class' => 'table-data'])->render() }}
@endforeach
</td>