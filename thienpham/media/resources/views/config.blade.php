<script>
    RV_MEDIA_URL = {!! json_encode(RvMedia::getUrls()) !!};
    RV_MEDIA_CONFIG = {!! json_encode([
        'permissions' => RvMedia::getPermissions(),
        'translations' => trans('media::media.javascript'),
        'pagination' => [
            'paged' => config('media.pagination.paged'),
            'posts_per_page' => config('media.pagination.per_page'),
            'in_process_get_media' => false,
            'has_more' =>  true,
        ],
    ]) !!}
</script>