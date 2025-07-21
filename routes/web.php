<?php

use Illuminate\Support\Facades\Route;
use HoaVi\GlideLaravel\GlideController;

Route::get('image/{path}', [GlideController::class, 'show'])
    ->where('path', '.*');
