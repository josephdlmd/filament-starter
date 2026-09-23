<?php

arch('no debugging calls are left behind')
    ->expect(['dd', 'ddd', 'dump', 'ray', 'var_dump', 'print_r'])
    ->not->toBeUsed();

arch('models extend Eloquent')
    ->expect('App\Models')
    ->toExtend('Illuminate\Database\Eloquent\Model');

arch('enums are enums')
    ->expect('App\Enums')
    ->toBeEnums();

arch('policies are plain classes named *Policy')
    ->expect('App\Policies')
    ->toBeClasses()
    ->toHaveSuffix('Policy');

arch()->preset()->php();

arch()->preset()->security();

// Filament names panel providers *PanelProvider by convention.
arch()->preset()->laravel()->ignoring('App\Providers\Filament');
