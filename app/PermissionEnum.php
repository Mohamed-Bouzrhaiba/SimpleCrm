<?php

namespace App;

enum PermissionEnum : string
{
    case MANAGE_USERS = 'manage_users';
    case DELETE_PROJECTS = 'delete_projects';
    case DELETE_CLIENTS = 'delete_clients';
    case DELETE_TASKS = 'delete_tasks';
}
