<?php

use App\Enums\Role;
use Josephdlmd\FilamentStorybook\Livewire\StoryCanvas;
use Josephdlmd\FilamentStorybook\StoryRegistry;
use Livewire\Livewire;

beforeEach(function () {
    actingAsRole(Role::Admin);
});

it('renders every stories pattern', function () {
    foreach (app(StoryRegistry::class)->all() as $stories) {
        foreach (array_keys($stories->stories()) as $story) {
            Livewire::test(StoryCanvas::class, ['stories' => $stories::class, 'story' => $story])->assertOk();
        }
    }
});

it('shows the storybook page', function () {
    $this->get('/admin/storybook')->assertOk();
});
