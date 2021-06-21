<tr {{ $attributes }}>
@foreach ($cells as $cell)
{{ $cell->render() }}
@endforeach
</tr>