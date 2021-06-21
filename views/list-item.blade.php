<li {{ $attributes }}>
@foreach ($content as $component)
{{ $component->withAttributes(['class' => 'item-value'])->render() }}
@endforeach
</li>