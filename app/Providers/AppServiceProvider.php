<?php

namespace App\Providers;

use App\Models\Developer;
use App\Models\Module;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \View::composer('admin.dashboard',function ($view){

          $total = [
              'developer_count'=>Developer::all()->count(),
              'project_count'=>Project::all()->count(),
              'module_count'=>Module::all()->count(),
              'task_count'=>Task::all()->count(),
          ];

          $view->with('total',$total);
        });
    }
}
