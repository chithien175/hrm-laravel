@foreach(config('media.libraries.javascript', []) as $js)
    <script src="{{ url($js) }}" type="text/javascript"></script>
@endforeach
