<?php

require_once(__DIR__."/../Model/RoleModel.php");

$roleModel = new RoleModel();

$roles = $roleModel->getAllRoles();