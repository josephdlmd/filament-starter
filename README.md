# filament-starter

The starting point for every internal Laravel + Filament app.

## What's inside

| Area | What you get |
|---|---|
| Framework | Laravel 13, PHP 8.5, SQLite by default, Pest 5 |
| Admin panel | Filament 5 at `/admin`, the locked Storybook look (Filament's **Compact** theme), profile page, optional app-based **2FA** with recovery codes |
| Access control | `spatie/laravel-permission` with `Admin` / `Staff` / `Viewer` roles (`App\Enums\Role`) and permissions (`App\Enums\Permission`). Policies check **permissions**, never roles. Users without a role cannot enter the panel. |
| Audit trail | `spatie/laravel-activitylog` on users, role changes and settings, with a read-only **Activity log** in the panel |
| Spatie plugins | Media Library (user avatars), Tags (user tags), Settings (`GeneralSettings`, whose site name is the panel brand) |
| AI tooling | Laravel Boost (MCP server, `AGENTS.md`, skills), Filament Blueprint (`planning-filament`, `reviewing-filament-plans`, `filament-security-audit`) and [Filament Storybook](https://github.com/josephdlmd/filament-storybook): approved UI patterns as stories in `app/Stories`, at `/admin/storybook` (not in the menu, blocked in production), served to agents as `storybook-list` / `storybook-show` |
| Quality | Pint, Larastan level 5, Pest architecture tests, strict Eloquent outside production, GitHub Actions CI |
| Time | Stored in UTC, displayed in `APP_DISPLAY_TIMEZONE` (default `Asia/Manila`) |

The Users resource and the Settings page are working examples of each plugin. Keep, change or delete them per app.

## Requirements

- PHP 8.5, Composer, Node 26, the `gh` CLI (logged in)
- A Filament license in your global Composer auth (`composer config --global home` → `auth.json`, host `packages.filamentphp.com`). Blueprint and Compact are paid packages.

## Create a new app

```bash
new-filament-app my-app          # private GitHub repo from this template → ~/Projects/my-app
new-filament-app my-app --local  # local copy only, no GitHub
```

The script (`bin/new-filament-app`, symlinked into `~/.local/bin`):

1. Creates the repo from this template and clones it.
2. Renames the Composer package and `APP_NAME`.
3. Runs `composer run setup`: install, `.env`, key, SQLite, migrate and seed, build assets.
4. Refreshes Boost guidelines and skills.
5. Sets the `FILAMENT_USERNAME` / `FILAMENT_LICENSE_KEY` / `DLHOUSE_GUIDELINES_TOKEN` CI secrets from your Composer auth.
6. Commits and pushes.

### After creating an app

- [ ] Log in as `test@example.com` / `password`, then change the site name under **System → Settings**.
- [ ] Review `App\Enums\Role` and `App\Enums\Permission`. Add your app's permissions and re-run `php artisan db:seed --class=RolesAndPermissionsSeeder`.
- [ ] Decide whether to keep the demo avatar and tags on Users.
- [ ] Plan the first feature: *"Using the planning-filament skill, create a Blueprint for … and write it to `blueprints/<name>.md`."*

## Everyday commands

```bash
composer run dev     # app, queue, logs and Vite
composer check       # pint --test, larastan, tests (what CI runs)
composer analyse     # larastan only
```

## Keeping the starter current

Changes here reach **new** apps only. Existing apps are yours to update on their own.

```bash
composer update && npm update
php artisan boost:update
npm run build && composer check
```

Commit, push, and the next `new-filament-app` picks it up.

## CI secrets for this repo

```bash
php -r 'echo json_decode(file_get_contents(getenv("HOME")."/.config/composer/auth.json"), true)["http-basic"]["packages.filamentphp.com"]["username"];' | gh secret set FILAMENT_USERNAME
php -r 'echo json_decode(file_get_contents(getenv("HOME")."/.config/composer/auth.json"), true)["http-basic"]["packages.filamentphp.com"]["password"];' | gh secret set FILAMENT_LICENSE_KEY
php -r 'echo json_decode(file_get_contents(getenv("HOME")."/.config/composer/auth.json"), true)["github-oauth"]["github.com"];' | gh secret set DLHOUSE_GUIDELINES_TOKEN
```

`DLHOUSE_GUIDELINES_TOKEN` is a fine-grained GitHub token with read-only Contents on `josephdlmd/dlhouse-guidelines` (the private DL House rules package), stored once with `composer config --global github-oauth.github.com <token>`.
