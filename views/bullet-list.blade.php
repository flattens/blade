<ul {{ $attributes }}>
@foreach ($items as $item)
{{ $item->withAttributes(['class' => 'item'])->render() }}
@endforeach
</ul>