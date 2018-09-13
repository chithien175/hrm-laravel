<?php

namespace Botble\Media\Providers;

use Botble\Media\Events\SessionStarted;
use Botble\Media\Supports\Helper;
use Botble\Media\Traits\LoadAndPublishDataTrait;
use Botble\Media\Facades\RvMediaFacade;
use Botble\Media\Models\MediaFile;
use Botble\Media\Models\MediaFolder;
use Botble\Media\Models\MediaSetting;
use Botble\Media\Repositories\Caches\MediaFileCacheDecorator;
use Botble\Media\Repositories\Caches\MediaFolderCacheDecorator;
use Botble\Media\Repositories\Caches\MediaSettingCacheDecorator;
use Botble\Media\Repositories\Eloquent\MediaFileRepository;
use Botble\Media\Repositories\Eloquent\MediaFolderRepository;
use Botble\Media\Repositories\Eloquent\MediaSettingRepository;
use Botble\Media\Repositories\Interfaces\MediaFileInterface;
use Botble\Media\Repositories\Interfaces\MediaFolderInterface;
use Botble\Media\Repositories\Interfaces\MediaSettingInterface;
use Botble\Support\Services\Cache\Cache;
use Event;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

/**
 * Class MediaServiceProvider
 * @package Botble\Media
 * @author Sang Nguyen
 * @since 02/07/2016 09:50 AM
 */
class MediaServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    /**
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * @author Sang Nguyen
     */
    public function register()
    {
        if (config('media.cache.enable', false)) {
            $this->app->singleton(MediaFileInterface::class, function () {
                return new MediaFileCacheDecorator(new MediaFileRepository(new MediaFile()), new Cache($this->app['cache'], MediaFileRepository::class));
            });

            $this->app->singleton(MediaFolderInterface::class, function () {
                return new MediaFolderCacheDecorator(new MediaFolderRepository(new MediaFolder()), new Cache($this->app['cache'], MediaFolderRepository::class));
            });

            $this->app->singleton(MediaSettingInterface::class, function () {
                return new MediaSettingCacheDecorator(new MediaSettingRepository(new MediaSetting()), new Cache($this->app['cache'], MediaSettingRepository::class));
            });
        } else {
            $this->app->singleton(MediaFileInterface::class, function () {
                return new MediaFileRepository(new MediaFile());
            });

            $this->app->singleton(MediaFolderInterface::class, function () {
                return new MediaFolderRepository(new MediaFolder());
            });

            $this->app->singleton(MediaSettingInterface::class, function () {
                return new MediaSettingRepository(new MediaSetting());
            });
        }

        Helper::autoload(__DIR__ . '/../../helpers');

        AliasLoader::getInstance()->alias('RvMedia', RvMediaFacade::class);
    }

    /**
     * Boot the service provider.
     * @author Sang Nguyen
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/media.php', 'media');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'media');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'media');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->setIsInConsole($this->app->runningInConsole())
            ->setNamespace('thienpham/media')
            ->loadAndPublishConfigurations(['permissions']);

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

            $this->publishes([__DIR__ . '/../../resources/views' => resource_path('views/vendor/media')], 'views');
            $this->publishes([__DIR__ . '/../../resources/lang' => resource_path('lang/vendor/media')], 'lang');
            $this->publishes([__DIR__ . '/../../config/media.php' => config_path('media.php')], 'config');
            $this->publishes([__DIR__ . '/../../resources/assets' => resource_path('assets/thienpham/media')], 'assets');
            $this->publishes([__DIR__ . '/../../public/assets' => public_path('vendor/thienpham/media'),], 'public');
        }

        Event::listen(SessionStarted::class, function () {
            dashboard_menu()->registerItem([
                'id' => 'cms-core-media',
                'priority' => 995,
                'parent_id' => null,
                'name' => trans('media::media.menu_name'),
                'icon' => 'fa fa-picture-o',
                'url' => route('media.index'),
                'permissions' => ['media.index'],
            ]);
        });
    }
}
