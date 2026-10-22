<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

## Foundational Context

This application is a Laravel application running on PHP 8.5. Always use the APIs that match the installed major version of each package — do not assume a version.

Before relying on a package's API, confirm its installed version:
- PHP packages: run `composer show --direct` to list direct dependencies with versions, or `composer show <vendor/package>` for a single package.
- JS packages: check `package.json` for the installed versions.

## Skills Activation

This project has domain-specific skills available in `**/skills/**`. You MUST activate the relevant skill whenever you work in that domain—don't wait until you're stuck.

## Conventions

- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, and naming.
- Use descriptive names for variables and methods. For example, `isRegisteredForDiscounts`, not `discount()`.
- Check for existing components to reuse before writing a new one.

## Verification Scripts

- Do not create verification scripts or tinker when tests cover that functionality and prove they work. Unit and feature tests are more important.

## Application Structure & Architecture

- Stick to existing directory structure; don't create new base folders without approval.
- Do not change the application's dependencies without approval.

## Frontend Bundling

- If a frontend change doesn't show in the UI or you get a "Unable to locate file in Vite manifest" error, run `npm run build` or ask the user to run `npm run dev` or `composer run dev`.

## Documentation Files

- You must only create documentation files if explicitly requested by the user.

=== boost rules ===

# Laravel Boost

## Tools

- Laravel Boost is an MCP server with tools designed specifically for this application. Prefer Boost tools over manual alternatives like shell commands or file reads.
- Use `database-query` to run read-only queries against the database instead of writing raw SQL in tinker.
- Use `database-schema` to inspect table structure before writing migrations or models.
- Use `get-absolute-url` to resolve the correct scheme, domain, and port for project URLs. Always use this before sharing a URL with the user.
- Use `browser-logs` to read browser logs, errors, and exceptions. Only recent logs are useful, ignore old entries.

## Searching Documentation (IMPORTANT)

- Use `search-docs` before changes that depend on Laravel ecosystem APIs, behavior, configuration, or version-specific syntax. Skip it for copy-only edits and other changes where package documentation is irrelevant. Reuse sufficient results already in context instead of searching again.
- Pass a `packages` array to scope results when you know which packages are relevant.
- Use multiple broad, topic-based queries: `['rate limiting', 'routing rate limiting', 'routing']`. Expect the most relevant results first.
- Do not add package names to queries because package info is already shared. Use `test resource table`, not `filament 4 test resource table`.

### Search Syntax

1. Use words for auto-stemmed AND logic: `rate limit` matches both "rate" AND "limit".
2. Use `"quoted phrases"` for exact position matching: `"infinite scroll"` requires adjacent words in order.
3. Combine words and phrases for mixed queries: `middleware "rate limit"`.
4. Use multiple queries for OR logic: `queries=["authentication", "middleware"]`.

## Project Rules

- This project contains committed, area-grouped rules in `.ai/rules` when that directory exists, including path-scoped framework guidelines under `.ai/rules/boost`. Before you enter plan mode or create/edit any file, you MUST first: open @.ai/rules/index.md (it maps file globs to rule files), read every rule file whose globs cover the path(s) in scope, and run `grep -rin 'keyword' .ai/rules` to catch what a path match alone misses. Do not write code until you have read and are following every matching rule. If `.ai/rules` does not exist, continue without it.

## Artisan

- Run Artisan commands directly via the command line (e.g., `php artisan route:list`). Use `php artisan list` to discover available commands and `php artisan [command] --help` to check parameters.
- Inspect routes with `php artisan route:list`. Filter with: `--method=GET`, `--name=users`, `--path=api`, `--except-vendor`, `--only-vendor`.
- Read configuration values using dot notation: `php artisan config:show app.name`, `php artisan config:show database.default`. Or read config files directly from the `config/` directory.

## Tinker

- Execute PHP in app context for debugging and testing code. Do not create models without user approval, prefer tests with factories instead. Prefer existing Artisan commands over custom tinker code.
- Always use single quotes to prevent shell expansion: `php artisan tinker --execute 'Your::code();'`
  - Double quotes for PHP strings inside: `php artisan tinker --execute 'User::where("active", true)->count();'`

=== php rules ===

# PHP

- Always use curly braces for control structures, even for single-line bodies.
- Use PHP 8 constructor property promotion: `public function __construct(public GitHub $github) { }`. Do not leave empty zero-parameter `__construct()` methods unless the constructor is private.
- Use explicit return type declarations and type hints for all method parameters: `function isAccessible(User $user, ?string $path = null): bool`
- Use TitleCase for Enum keys: `FavoritePerson`, `BestLake`, `Monthly`.
- Prefer PHPDoc blocks over inline comments. Only add inline comments for exceptionally complex logic.
- Use array shape type definitions in PHPDoc blocks.

=== deployments rules ===

# Deployment

- Laravel can be deployed using [Laravel Cloud](https://cloud.laravel.com/), which is the fastest way to deploy and scale production Laravel applications.

=== tests rules ===

# Test Enforcement

- Add or update tests for behavior and logic changes when a test provides meaningful regression coverage.
- Pure copy, styling, and layout-only changes do not require new or updated tests.
- When test coverage applies, run the affected tests and ensure they pass.
- Test the changed behavior and its important failure modes, but do not add tests beyond them.
- Read the `testing-best-practices` skill before writing tests.

=== laravel/core rules ===

# Do Things the Laravel Way

- Use `php artisan make:` commands to create new files (i.e. migrations, controllers, models, etc.). You can list available Artisan commands using `php artisan list` and check their parameters with `php artisan [command] --help`.
- If you're creating a generic PHP class, use `php artisan make:class`.
- Pass `--no-interaction` to all Artisan commands to ensure they work without user input. You should also pass the correct `--options` to ensure correct behavior.

### Model Creation

- When creating new models, create useful factories and seeders for them too. Ask the user if they need any other things, using `php artisan make:model --help` to check the available options.

## APIs & Eloquent Resources

- For APIs, default to using Eloquent API Resources and API versioning unless existing API routes do not, then you should follow existing application convention.

## URL Generation

- When generating links to other pages, prefer named routes and the `route()` function.

## Testing

- When creating models for tests, use the factories for the models. Check if the factory has custom states that can be used before manually setting up the model.
- Faker: Use methods such as `$this->faker->word()` or `fake()->randomDigit()`. Follow existing conventions whether to use `$this->faker` or `fake()`.
- When creating tests, make use of `php artisan make:test [options] {name}` to create a feature test, and pass `--unit` to create a unit test. Most tests should be feature tests.

=== pint/core rules ===

# Laravel Pint Code Formatter

- If you have modified any PHP files, you must run `vendor/bin/pint --dirty --format agent` before finalizing changes to ensure your code matches the project's expected style.
- Do not run `vendor/bin/pint --test --format agent`, simply run `vendor/bin/pint --format agent` to fix any formatting issues.

=== pest/core rules ===

# Pest

- This project uses Pest. Create tests with `php artisan make:test --pest {name}`.
- Do not include the test suite directory in `{name}`. Use `SomeFeatureTest`, not `Feature/SomeFeatureTest`.
- Read the `testing-best-practices` skill for guidance on coverage, naming, structure, dependency isolation, and review.
- Do not delete tests or test files without approval. They are part of the application.

## Running Tests

- Run the narrowest set of tests that covers the change. Pass a file path or `--filter=testName` to `php artisan test --compact`.
- Rerun a test after each change to it.
- Run `vendor/bin/pest` to call the test runner directly. It accepts the same file path and `--filter=testName` arguments.
- After the feature tests pass, ask the user to run the complete suite with `php artisan test --compact`.

=== josephdlmd/filament-storybook/core rules ===

## Filament Storybook (josephdlmd/filament-storybook)

This app's approved UI patterns are PHP stories: classes extending `Josephdlmd\FilamentStorybook\Stories` in `app/Stories` (app patterns) and in the package (shared patterns). Each public method returns one configured Filament component.

- **Never guess Filament UI:** before writing any resource table or form, field, column, infolist entry, action, notification or dashboard widget, or a document's totals, posting, voiding, payments or printing, call `storybook-list`, then `storybook-show` for each matching pattern. Pick the Screen first (list, View page, create or edit form, report, dashboard, settings, sign-in: patterns that take a `Table` or `Schema`), then fill it with field, column and action patterns. Copy each snippet and its imports, change only field names and labels, and pass only the arguments its API section shows. Call the package classes it lists (`DocumentTotals` and the like); copy only the examples it prints in full. Do not read vendor source to answer this.
- **No pattern fits:** say so, build it from native Filament components, and add a story for it in `app/Stories` in the same change. Call `storybook-instructions` first. Never write a custom component (a subclass of a field, column or entry, a widget with its own view, a Blade component): a real gap goes to the owner as an extension proposal.
- **Changing a shared standard** (a shared pattern or a rule in `docs/rules.md`): change the josephdlmd/filament-storybook repo and release it, never `vendor/`. The owner can add standards; UI rules need a current source, business facts come from the owner.
- **Self-check:** after building or changing a resource screen, run `storybook-audit` with that resource (and its `panel`, if it is not the main one); after adding or changing a story, run `storybook-test`. Every finding fails: fix each one, and run it again until none remain. Never add an entry to `config/storybook-exceptions.php` yourself; only the owner settles an exception.

=== dlhouse/guidelines/core rules ===

# DLHouse house rules (dlhouse/guidelines 0.2.2, built from Agent Guidelines 0.2)

You are building a DLHouse app: a De Leon business app for goods distribution and trading in the Philippines, on the TALL stack with Filament v5 (Livewire 4). Filament is the plumbing and wiring; DLHouse replaces its defaults with ours: our screen patterns, our tokens, our business rules, our controls. These rules are always in force. Pull the matching DLHouse skill before each kind of job (table at the end).

## Scope: every DL Group app, split by area

These rules guide every DL Group app built from the filament-starter, not only apps named DL House (owner's decision, October 22, 2026).

- Business rules: DLHouse governs. Money, statuses, numbering, posting, tax, controls, roles, settings, glossary terms, tests and team process follow this file, its source documents and the dlhouse-money, dlhouse-controls, dlhouse-testing and dlhouse-team skills.
- Screens and look: Filament Storybook (`josephdlmd/filament-storybook`) and the starter's themes govern. Where F8, F9, F10 or F11, the Screen Pattern Guide, the Style Guide and Tokens, or the dlhouse-screens and dlhouse-finishes skills disagree with Storybook or the starter's themes, Storybook and the starter win; use the DLHouse screen documents only where Storybook is silent. The starter's themes and Storybook are not third-party UI kits under F11.
- F3 to F6 are business rules and hold on every screen, print and export, whatever Storybook pattern renders them.

## Precedence

Regulation first, then the DLHouse Executive Summary (Revision 5), then the Layer 1 documents (Glossary 0.7, Document Lifecycles 0.4, Control Register 0.5, Chart of Accounts 0.4, Settings Register 0.4, Company Policies 0.4, Master Files 0.1, Worked Examples 0.3, Opening Balances Plan 0.3, BIR Readiness Map 0.1), then the Screen Pattern Guide 0.2 and Style Guide and Tokens 0.5 (subject to the scope split above), then these guidelines. The Build Plan 0.2 sets the waves, modules and dates. A guideline never restates a rule differently; it points to the source document and the control ID. If this file and a source document disagree, the document wins: say so and stop.

The source documents ship as reference files inside the DLHouse skills. Read the one a job touches before writing code.

## The eleven firm rules

The reviewer agent checks every one of these before any merge. They are not preferences.

- F1. Never delete a posted or numbered document. Void it or reverse it whole, then re-record. (GL-02, GL-06, H3)
- F2. Never edit production data directly. Every change goes through the app and its audit log. Boost's database tools are for development data only. (Executive Summary, Layer 4; ITC-03)
- F3. "Invoice" alone means only the BIR invoice. Our internal document is always "Invoice Record." (Glossary 0.7)
- F4. Invoice Records never go to customers: no print, email or export addressed to a customer. (SAL-10)
- F5. Every other external document carries the input-tax phrase, conspicuous on page 1. (SAL-10; the phrase is THIS DOCUMENT IS NOT VALID FOR CLAIM OF INPUT TAX)
- F6. Every app report and export is labeled "Internal management report." (CLS-09)
- F7. Screen text comes only from language files, using glossary terms. (Definition of done 3)
- F8. Every screen uses exactly one of the six patterns and says which. (Screen Pattern Guide 0.2, G2)
- F9. Colors only through tokens. No hex values or raw color utilities in screens. (Style Guide 0.5)
- F10. Follow the custom screen ladder; stop at the first rung that works. Rung 5 needs the design owner's approval, logged. (Executive Summary; Screen Pattern Guide 0.2)
- F11. Never install a third-party UI kit, or load its agent guidelines, into a DLHouse app. (Executive Summary, Layers 3 and 4)

## Wave 0 contracts every agent builds against

- Money is whole centavos as integers behind the one money type in `dlhouse/rules`; never floating point. (G1)
- Five document statuses only: Draft, Submitted, Approved, Posted, Voided. Rejected and Recalled are logged events; Held, Released, Matched and the like are progress states shown beside the status, never instead of it. Only the transitions in Document Lifecycles 0.4 exist.
- Document numbers follow `CO-TYPE-YYYY-000001` per company, type and fiscal year, issued when a document leaves Draft, never reused, never consumed by a failed save. (S35, GL-06)
- Every record belongs to exactly one company; nothing reads or writes across companies except the linked intercompany pairs in Lifecycles 0.4. (GEN-10)
- Every threshold, rate and number of days is a setting from the Settings Register (S01 to S47), never a constant: the ₱50,000 approval and release lines, the ₱20,000 capitalization threshold, 12% VAT, the 90-day check age, the 60-day advance flag, the 7-day sweep. Lines compare the document total including VAT. (H1, TAX-05)
- `dlhouse/rules` is plain Laravel and never imports Filament, Livewire or Boost classes. Screens call the rules; they never compute VAT, withholding, totals or postings. Business rules are tested with Pest, from the worked examples, before the feature. (G3)
- Each screen declares its pattern once, in the searchable form the lead agent fixed in Wave 0. (G2)

## Before touching any Filament or Livewire API

Check it with Boost's Search Docs tool for Filament 5.x and Livewire 4.x first. Never rely on memory of older versions; v5 keeps v4's schemas, tables and actions and adds Livewire 4.

## Stop and ask the driver (Joseph de Leon) before going on when

- a tax, BIR, customs, FDA or privacy question is not answered in the Layer 1 documents; never guess a rate or a rule;
- a change would touch a Wave 0 contract: the data model, status engine, numbering, posting-rule interface or screen conventions;
- a posting rule would change (GL-08: the accountant's approval and a Class B release);
- two source documents disagree; name both and the conflict;
- the only way forward is rung 5 of the ladder.

Anything marked ⚠️ in a source document is awaiting written confirmation: build it as a setting that can change, and say so in the branch.

## Which skill to open

| Job | Skill |
| --- | --- |
| Posting rules, amounts, tax, withholding, statuses, numbering, chart of accounts, master data, opening balances, BIR readiness | dlhouse-money |
| Building or changing any Filament screen, page, table, form or action | Storybook first; dlhouse-screens only where Storybook is silent |
| Theme, colors, type, spacing, status display, language files, print, accessibility | Storybook and the starter's themes first; dlhouse-finishes only where they are silent |
| Anything touching approval, permissions, roles, periods, evidence, settings, reports, security | dlhouse-controls |
| Writing or running tests | dlhouse-testing |
| Starting, finishing or reviewing a branch; agent roles; waves; definition of done; friction log | dlhouse-team |

Per-app conventions live in `.ai/rules` (index at `.ai/rules/index.md`); consult it before editing a matching file, and record a repeated mistake with Boost's `record-rule` tool rather than hand-writing a rule file.

</laravel-boost-guidelines>
