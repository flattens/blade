<th {{ $attributes }}>
@foreach ($content as $component)
{{ $component->withAttributes(['class' => 'table-header-data'])->render() }}
@endforeach
</th>