<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\Console\Permissions as Permissionable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreatePermissions extends Command
{
    use Permissionable;
    protected $signature = 'permission:create';

    protected $description = 'Create Un Created Permissions';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = 0;
        $exists = 0;
        $created = 0;
        foreach ($this->getModels() as $model) {
            foreach ($this->actions() as $action) {
                $count++;
                if (!Permission::where('name', $model . "." . $action)->exists()) {
                    Permission::create(['name' => $model . "." . $action]);
                    $this->info($model . "." . $action . ' Created');
                    $created++;
                } else {
                    $this->line($model . "." . $action . ' Exists');
                    $exists++;
                }
            }
        }

        foreach ($this->getModelsRelatableToUsers() as $model) {
            foreach ($this->relatableActions() as $action) {
                $count++;
                if (!Permission::where('name', $model . "." . $action)->exists()) {
                    Permission::create(['name' => $model . "." . $action]);
                    $this->info($model . "." . $action . ' Created');
                    $created++;
                } else {
                    $this->line($model . "." . $action . ' Exists');
                    $exists++;
                }
            }
        }

        foreach ($this->otherActions() as $action) {
            $count++;
            if (!Permission::where('name', $action)->exists()) {
                Permission::create(['name' => $action]);
                $this->info($action . ' Created');
                $created++;
            } else {
                $this->line($action . ' Exists');
                $exists++;
            }
        }

        $this->info("$count Permissions, $exists Permissions Exists and $created Permissions Created");

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all()->pluck('name')->all());
        $this->info("All permissions granted to $admin->name");
        return Command::SUCCESS;

    }
}
