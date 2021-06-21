<blockquote {{ $attributes }}>
@foreach ($content as $component)
{{ $component->withAttributes(['class' => 'quote-data'])->render() }}
@endforeach
</blockquote>