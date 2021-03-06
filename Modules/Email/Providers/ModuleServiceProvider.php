<?php
namespace Modules\Email\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'email');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'email');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->registerBindings();
    }

    private function registerBindings()
    {

      $this->app->bind('Modules\Email\Services\BreakLineServiceContract', 'Modules\Email\Services\BreakLineService');

      $this->app->bind('Modules\Email\Services\MailRuleServiceContract', 'Modules\Email\Services\MailRuleService');

      /*$this->app->bind('Modules\Email\Services\Mailbox\MailboxServiceContract', 'Modules\Email\Services\Mailbox\MailboxService');*/
      // add bindings
    }


}
