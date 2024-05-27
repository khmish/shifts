<?php

namespace App\Traits\Console;


trait Permissions
{
    public function getModels(): array
    {
        return [


            'user',
            'role',
            'permission',
            'department',
            'shift',
            'shift_assignment',
            'time_offRequest',
           
        ];
    }

    public function getModelsRelatableToUsers(): array
    {
        return [
            

        ];
    }

    public function actions(): array
    {
        return [
            'create',
            'update',
            'view',
            'view_any',
            'delete',
            'force_delete',
            'restore',
            'replicate',
        ];
    }

    public function relatableActions(): array
    {
        $actions = [];

        foreach ($this->actions() as $action) {
            $actions[] = $action.'_related';
        }

        return $actions;
    }

    public function otherActions(): array
    {
        return [
            'audit.view_any',
            'audit.view',
            'user.attach_any_request_type',
            'user.detach_request_type',
            'role.import_role_permissions',
            'user.import_users',
            'user.change_password',
            'user.change_password_related',
            'user.impersonate',
            'user.assign_role_to_user',
            'user.assign_role_to_user_related',
            
        ];
    }
}
