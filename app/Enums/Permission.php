<?php

namespace App\Enums;

class Permission
{
    const PERMISSION_MANAGEMENT_USER = "user_management";
    const PERMISSION_MANAGEMENT_CATEGORY = "category_management";
    const PERMISSION_MANAGEMENT_POST = "post_management";
    const PERMISSION_CREATE_POST = "create_post";
    const PERMISSION_VIEW_POST = "view_post";
    const PERMISSION_EDIT_POST = "edit_post";
    const PERMISSION_DELETE_POST = "delete_post";
    const PERMISSION_MANAGEMENT_COMMENT = "comment_management";
    const PERMISSION_DELETE_COMMENT = "delete_comment";
    const PERMISSION_CREATE_COMMENT = "create_comment";
    const PERMISSION_MANAGEMENT_ROLE = "role_management";
}
