<?php

namespace Botble\Media\Traits;

trait LoadAndPublishDataTrait
{
    /**
     * @var bool
     */
    protected $is_in_console = false;

    /**
     * @var string
     */
    protected $namespace = null;

    /**
     * @param $namespace
     * @return $this
     */
    public function setNamespace($namespace): self
    {
        $this->namespace = ltrim(rtrim($namespace, '/'), '/');
        return $this;
    }

    /**
     * @param $is_in_console
     * @return $this
     */
    public function setIsInConsole($is_in_console): self
    {
        $this->is_in_console = $is_in_console;
        return $this;
    }

    /**
     * Publish the given configuration file name (without extension) and the given module
     * @param $file_names
     * @return $this
     */
    public function loadAndPublishConfigurations($file_names): self
    {
        if (!is_array($file_names)) {
            $file_names = [$file_names];
        }
        foreach ($file_names as $file_name) {
            $this->mergeConfigFrom($this->getConfigFilePath($file_name), $this->getDotedNamespace() . '.' . $file_name);
            if ($this->is_in_console) {
                $this->publishes([$this->getConfigFilePath($file_name) => config_path($this->getDashedNamespace() . '.' . $file_name . '.php')], 'config');
            }
        }
        return $this;
    }

    /**
     * Publish the given configuration file name (without extension) and the given module
     * @param $file_names
     * @return $this
     */
    public function loadRoutes($file_names = ['web']): self
    {
        if (!is_array($file_names)) {
            $file_names = [$file_names];
        }
        foreach ($file_names as $file_name) {
            $this->loadRoutesFrom($this->getRouteFilePath($file_name));
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function loadAndPublishViews(): self
    {
        $this->loadViewsFrom($this->getViewsPath(), $this->getDotedNamespace());
        if ($this->is_in_console) {
            $this->publishes([$this->getViewsPath() => resource_path('views/vendor/' . $this->getDotedNamespace())], 'views');
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function loadAndPublishTranslations(): self
    {
        $this->loadTranslationsFrom($this->getTranslationsPath(), $this->getDotedNamespace());
        if ($this->is_in_console) {
            $this->publishes([$this->getTranslationsPath() => resource_path('lang/vendor/' . $this->getDotedNamespace())], 'lang');
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function loadMigrations(): self
    {
        if ($this->is_in_console) {
            $this->loadMigrationsFrom($this->getMigrationsPath());
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function publishAssetsFolder(): self
    {
        if ($this->is_in_console) {
            $this->publishes([$this->getAssetsPath() => resource_path('assets/' . $this->getDashedNamespace())], 'assets');
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function publishPublicFolder(): self
    {
        if ($this->is_in_console) {
            $path = str_contains($this->getDotedNamespace(), 'plugins.') ? 'vendor/core/' . $this->getDashedNamespace() : 'vendor/core';
            $this->publishes([$this->getPublicPath() => public_path($path)], 'public');
        }
        return $this;
    }

    /**
     * Get path of the give file name in the given module
     * @param string $file
     * @return string
     */
    protected function getConfigFilePath($file)
    {
        return base_path($this->getDashedNamespace()) . '/config/' . $file . '.php';
    }

    /**
     * @param $file
     * @return string
     */
    protected function getRouteFilePath($file)
    {
        return base_path($this->getDashedNamespace()) . '/routes/' . $file . '.php';
    }

    /**
     * @return string
     */
    protected function getViewsPath()
    {
        return base_path($this->getDashedNamespace()) . '/resources/views/';
    }

    /**
     * @return string
     */
    protected function getTranslationsPath()
    {
        return base_path($this->getDashedNamespace()) . '/resources/lang/';
    }

    /**
     * @return string
     */
    protected function getMigrationsPath()
    {
        return base_path($this->getDashedNamespace()) . '/database/migrations/';
    }

    /**
     * @return string
     */
    protected function getAssetsPath()
    {
        return base_path($this->getDashedNamespace()) . '/resources/assets/';
    }

    /**
     * @return string
     */
    protected function getPublicPath()
    {
        return base_path($this->getDashedNamespace()) . '/public/';
    }

    /**
     * @return mixed
     */
    protected function getDotedNamespace()
    {
        return str_replace('/', '.', $this->namespace);
    }

    /**
     * @return mixed
     */
    protected function getDashedNamespace()
    {
        return str_replace('.', '/', $this->namespace);
    }

    /**
     * @return mixed
     */
    protected function getModuleName()
    {
        return array_last(explode('/', $this->getDashedNamespace()));
    }
}