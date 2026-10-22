# DLHouse Agent Guidelines 0.2 (dlhouse/guidelines)

Oct 21, 2026 · @Joseph de Leon

`dlhouse/guidelines` ships one short always-loaded guideline with the firm rules, plus six on-demand skills for money, screens, finishes, controls, testing and team work, so every agent reads the same rulebook before December 1, 2026.

## About this document

- **Version and status:** 0.2, structure and decisions accepted, October 21, 2026. Due loaded and tested by November 30, 2026 (paper phase close).
- **Precedence:** regulation, then the Executive Summary (Revision 5), then the Layer 1 documents (Glossary 0.7, Lifecycles 0.4, Control Register 0.5, Chart of Accounts 0.4, Worked Examples 0.3), then Screen Pattern Guide 0.2 and Style Guide 0.5, then this document. A guideline never restates a rule differently; it points to the source document and control ID.
- **Layer:** Layer 4, guidelines. Everything here is a house default for every DLHouse app, except the project rules each app records for itself.
- **House metaphor:** the site rules pinned at the door. Builders read them on arrival (the guideline), pull the right manual off the shelf for each job (the skills), and the foreman notes this house's quirks on the job board (project rules).
- **What this document is:** the paper source. Its sections become the package's files at build time; the wording here is what the files will say.

## How Boost loads guidelines

Boost offers three channels, and DLHouse uses each for one job: a package guideline for the firm rules, package skills for detailed how-to, and project rules for one app's own conventions. Checked against the [Laravel Boost docs](https://laravel.com/docs/boost) on October 21, 2026; re-check at build time.

| Channel | How Boost loads it | Where it lives | DLHouse use | House default? |
| --- | --- | --- | --- | --- |
| Guidelines | Upfront, always present when the agent starts | A package's `resources/boost/guidelines/core.blade.php`; an app's `.ai/guidelines/*` (`.blade.php` or `.md`) | The firm rules and where to look next, kept short | Yes |
| Skills | On demand, when the task matches; a folder with a `SKILL.md` (YAML `name` and `description`, then Markdown) | A package's `resources/boost/skills/{skill-name}/SKILL.md`; an app's `.ai/skills/{skill-name}/SKILL.md` | Detailed patterns: money, screens, finishes, controls, testing, team | Yes |
| Project rules | Through `.ai/rules/index.md`, which maps file globs to rule files; agents consult it before editing a matching file | The app's `.ai/rules`, committed to source control; recorded with Boost's `record-rule` tool | One app's conventions and decisions, from the friction log | No, per app |

**Three facts that shape the design:**

- Boost installs a package's guideline and skills when the app runs `php artisan boost:install`, and `boost:update` refreshes them. So `dlhouse/guidelines` is a Composer package, and an app picks up a new version by updating it.
- Generated agent files (`CLAUDE.md`, `AGENTS.md`) are rewritten by Boost inside its own block only, and Boost's docs say they may be git-ignored because they are regenerated. So nothing DLHouse needs lives only in those files.
- Boost tells agents to use its Search Docs tool, which covers Filament 5.x and Livewire 4.x. Our guideline adds: check that tool before stating any Filament or Livewire API.

## File layout

One guideline and six skills, each skill named for the job an agent is doing, so Boost loads only what the task needs.

| File | Loaded | Covers | Main sources |
| --- | --- | --- | --- |
| `resources/boost/guidelines/core.blade.php` | Always | The eleven firm rules, the source documents, "stop and ask" triggers, and which skill to open for which job; target under 150 lines | Executive Summary, Layer 4 |
| `resources/boost/skills/dlhouse-money/SKILL.md` | Writing posting rules, amounts, tax, withholding, statuses, numbering | `dlhouse/rules` boundaries and money rules | Lifecycles 0.4, Chart of Accounts 0.4, BIR Readiness Map 0.1 |
| `resources/boost/skills/dlhouse-screens/SKILL.md` | Building or changing any Filament screen | Patterns P1 to P6 and the custom screen ladder | Screen Pattern Guide 0.2 |
| `resources/boost/skills/dlhouse-finishes/SKILL.md` | Theme, colors, type, language files, accessibility | Tokens only, glossary terms, WCAG 2.2 AA in both modes | Style Guide 0.5, Glossary 0.7 |
| `resources/boost/skills/dlhouse-controls/SKILL.md` | Anything touching approval, permissions, periods, evidence or reports | Locks, alarms and the approval matrix, by control ID | Control Register 0.5, Settings Register 0.4 |
| `resources/boost/skills/dlhouse-testing/SKILL.md` | Writing or running tests | Worked examples as tests first; what a passing module means | Worked Examples 0.3 |
| `resources/boost/skills/dlhouse-team/SKILL.md` | Starting, finishing or reviewing a branch | Worktrees, contracts, the reviewer checklist, definition of done, friction log | Build Plan 0.2 |

**Reference files:** each skill may carry the source document it summarizes as a reference file beside its `SKILL.md`, exported from the doc as Markdown, so an agent can read the full rule when the summary isn't enough.

**Per app, not in the package:** `.ai/rules` holds one app's own conventions, recorded with Boost's `record-rule` tool as the friction log finds them. If a rule turns up in a second app, it graduates into a skill (rule of three).

## Firm rules

The always-loaded guideline states these eleven rules word for word; each has a source and a check the reviewer agent runs before any merge.

| # | Firm rule (as the guideline says it) | Why | Source | How the reviewer checks it |
| --- | --- | --- | --- | --- |
| F1 | Never delete a posted or numbered document. Void it or reverse it whole, then re-record. | History can't be rewritten; numbering has no gaps | GL-02, GL-06, H3 | No delete action, route or query on posted or numbered records; a test proves delete is refused |
| F2 | Never edit production data directly. Every change goes through the app and its audit log. Boost's database tools are for development data only. | The audit trail is the evidence | Executive Summary, Layer 4 | Boost is a dev dependency only; no migration or seeder changes posted rows |
| F3 | "Invoice" alone means only the BIR invoice. Our internal document is always "Invoice Record." | Customers and the BIR must never confuse the two | Glossary 0.7 | Search the language files and code for a bare "Invoice" label |
| F4 | Invoice Records never go to customers: no print, email or export addressed to a customer. | Customers could claim input VAT on the wrong document | SAL-10 | No customer-facing output path for Invoice Records |
| F5 | Every other external document carries the input-tax phrase, conspicuous on page 1. | Same reason | SAL-10, Style Guide print styles | A test renders each external template and finds the phrase |
| F6 | Every app report and export is labeled "Internal management report." | App reports must never pass as official books | CLS-09 | A test renders each report and export and finds the label |
| F7 | Screen text comes only from language files, using glossary terms. | One vocabulary; nothing hard-coded | Definition of done 3 | No literal user-facing strings in screens, tables, forms or notifications |
| F8 | Every screen uses exactly one of the six patterns and says which. | Users learn each pattern once | Screen Pattern Guide 0.2 | Each screen names its pattern (P1 to P6); none mixes two |
| F9 | Colors only through tokens. No hex values or raw color utilities in screens. | One edit changes the look everywhere; contrast stays checked | Style Guide 0.5 | No hex or color utility outside the theme file |
| F10 | Follow the custom screen ladder; stop at the first rung that works. Rung 5 needs the design owner's approval, logged. | Stay on Filament's plumbing for safe upgrades | Executive Summary, Screen Pattern Guide | The branch notes the rung used; any view override cites its approval |
| F11 | Never install a third-party UI kit, or load its agent guidelines, into a DLHouse app. | Their instructions would compete with ours | Executive Summary, Layer 3 and 4 | No UI-kit package in Composer or npm; no foreign agent files |

**Stop and ask the driver (Joseph de Leon) before going on when:**

- a tax, BIR, customs, FDA or privacy question isn't answered in the Layer 1 documents; never guess a rate or a rule;
- a change would touch a Wave 0 contract (data model, status engine, numbering, posting-rule interface, screen conventions);
- a posting rule would change (GL-08 needs the accountant's approval and a Class B release);
- two source documents disagree; name both and the conflict;
- the only way forward is rung 5 of the ladder.

## Skill: dlhouse-money

Money logic lives only in `dlhouse/rules`, as plain Laravel, and every figure on a screen comes from it. The skill says:

**Boundaries**

- `dlhouse/rules` never imports Filament, Livewire or Boost classes. Screens call the rules; they never compute VAT, withholding, totals or postings themselves.
- Every record belongs to exactly one company; nothing reads or writes across companies except the intercompany flows in Lifecycles 0.4 (GEN-10).
- The company type and its account profile decide which accounts and features are switched on (Chart of Accounts 0.4). Never add an account in code; accounts follow GL-07.

**Statuses and posting**

- Five statuses only: Draft, Submitted, Approved, Posted, Voided. Events (Rejected, Recalled) and progress states (Held, Released, Matched and others) are recorded separately and never replace a status (Lifecycles 0.4).
- Only the transitions in Lifecycles 0.4 exist. A new transition is a contract change: stop and ask.
- Posting checks, in order: a source document with its evidence (GL-01); debits equal credits and the posting date is in an open period (GL-05); then the entry is written once and never changed (GL-02).
- Numbers are issued per company and document type without gaps (GL-06). A failed save never consumes a number.

**Tax and settings**

- Input VAT only from a supplier's VAT Invoice, never from a commercial invoice; door-to-door imports only from the forwarder's VAT Invoice ⚠️ (pending written confirmation).
- Exempt and zero-rated sales need their exemption document (SAL-11). The tax code is set per line.
- Withholding and VAT are computed by the rules and can't be typed over; a difference from what the partner states raises a warning, never a silent change.
- Peso advances to foreign suppliers are not revalued ⚠️ (pending written confirmation).
- Thresholds and periods are settings from the Settings Register (S01 to S44), never constants in code: the ₱50,000 approval tier, the ₱20,000 capitalization threshold, the 90-day check age, the 60-day advance flag.

**When a test and the code disagree,** the worked example wins; if the worked example looks wrong, stop and ask, because the accountant verified it.

## Skill: dlhouse-screens

Every screen starts by naming its pattern and the lowest ladder rung that builds it; the skill carries the pattern table and the ladder, and points to the guide for anatomy.

| Pattern | Use when | Lowest rung |
| --- | --- | --- |
| P1 List | Find, scan, filter or compare many records of one type | 1, resource list page |
| P2 Detail | Open any numbered document, including posted and voided ones | 1, resource view page; chain strip, evidence and history as house components if needed |
| P3 Two-column form | Prepare a Draft at a desk | 1, resource create and edit pages |
| P4 Approval inbox | An approver decides submitted items, tablet first | 2, custom page |
| P5 Evidence capture | Attach paper evidence away from the desk | 2, custom page |
| P6 Matching | Two lists must tie out | 2 at best; likely 4 after the December spike (S1) |

**Rules every screen follows** (Screen Pattern Guide, shared rules):

- The header shows title, document number, status (word and shape), active company and the one primary action, always in the same place.
- Show only actions this user may take now; the server re-checks every action, and the screen is never the control.
- A lock explains itself in plain words naming the rule ("Input VAT needs the supplier's VAT Invoice"), never a code.
- Compact on desks, comfortable on tablets; the order and meaning never change between them.
- Never: delete from a list, bulk-approve, show another company's records, or let a computed amount be typed over.

**The custom screen ladder:** (1) a resource page; (2) a custom page from Filament schemas, tables, actions and widgets; (3) a Blade view using only Filament and DLHouse components; (4) a new DLHouse Blade component using tokens only; (5) raw markup or a view override, approved by the design owner and logged. Stop at the first rung that works, and say in the branch which rung you used.

**Before using any Filament or Livewire API,** check it with Boost's Search Docs tool for Filament 5.x and Livewire 4.x; never rely on memory of older versions.

**House components** (`dlhouse/ui`): the document chain strip (S2) and, if the spike says so, the matching component (S1). Build them once in `dlhouse/ui`, never inside an app.

## Skill: dlhouse-finishes

The look changes only by token values in the panel theme, and every screen is readable in light, dark and grayscale; the skill holds the token list and the checks.

**Tokens**

- Colors fill Filament's six roles (primary, gray, info, success, warning, danger) plus the Ledger extras in the theme file: hairline, strong and double rules, selected row and its blue bar, focus ring, link, control and panel radius (Style Guide 0.5).
- Order of preference: configuration, then theme CSS, then a wrapped component; a view override only through rung 5.
- Blue appears only as the focus ring and the selected-row bar. Links are text color and always underlined.
- Dark mode is charcoal (ground #18181B). Every token has both values; never style one mode only.

**Statuses and numbers**

- Every status shows its word, its shape and its color role; color never carries meaning alone.
- Amounts: right-aligned, tabular numerals, two decimals, negatives in parentheses, the peso sign in the column header, a double rule under final totals, zero as 0.00.

**Language**

- All user-facing text comes from language files, using Glossary 0.7 terms; the glossary is attached to this skill as a reference file.
- Write in plain English, sentence case; name the rule when refusing an action.

**Accessibility (WCAG 2.2 AA, both modes)**

- Every field has a label; every action is keyboard reachable; the focus ring is never removed; touch targets are at least 44 px on tablets.
- A new color pair is checked for contrast (4.5:1 text, 3:1 meaningful lines and icons) and added to the Style Guide's contrast tables before use.

## Skill: dlhouse-controls

Every control in Control Register 0.5 is a lock, an alarm or a habit; agents build locks and alarms, each with a test named by its control ID, and never decide a regulated rule themselves.

| Control type | What the agent builds | Test |
| --- | --- | --- |
| Lock (preventive) | The server refuses the action and explains the rule in plain words; the screen also hides it | Proves the refusal, named for the control, such as `GL-02 posted record can't be edited` |
| Alarm (detective) | A flag on the record and in its list view, plus the alarm list at close | Proves the alarm is raised and cleared |
| Habit (people) | Only the report or checklist the habit needs, labeled internal (CLS-09) | Proves the report renders with its label |

**Controls every module touches**

- **GEN-01:** no one approves their own work, including through a delegation (GEN-07).
- **GEN-06:** the admin-owner's two logins never merge; the admin login has no financial rights.
- **GEN-08:** approvals waiting more than 2 business days escalate.
- **GL-01 to GL-08:** evidence before posting, no edits after posting, manual entries approved by someone else, balanced entries in open periods, gap-free numbering, controlled new accounts, controlled posting-rule changes.
- **Approval tiers** come from the approval matrix and Settings Register; re-authentication for ₱50,000 or more on tablets (S11). Never hard-code an approver or a limit.

**Regulated rules ⚠️:** VAT, withholding, BIR invoicing, CAS and e-invoicing readiness, customs, FDA and privacy follow the BIR Readiness Map 0.1 and the accountant's written answers. An item marked ⚠️ is built as a setting that can change, and the agent says so in the branch. If the documents don't answer it, stop and ask.

## Skills: dlhouse-testing and dlhouse-team

Tests come from the worked examples before the feature, and no branch merges without the reviewer's checklist and a human approval (Build Plan 0.2).

**dlhouse-testing**

- The test agent turns each worked example (W1 to W18) into an automated test before the module agent builds it; the test is named for its example, such as `W2 credit sale with withholding`.
- A money test checks every journal line to the centavo, the status after each step, and each control the example touches.
- A module is done only when its examples pass and Leslie has run them by hand.
- Never change a worked example's expected figures to make a test pass.

**dlhouse-team**

| Role | Works in | Never does |
| --- | --- | --- |
| Lead agent | Wave 0 contracts and the walking skeleton | Starts parallel work before Wave 0 is merged |
| Rules agent | `dlhouse/rules` | Imports Filament or Livewire |
| Screens agent | Filament screens, theme, language files | Computes money on a screen |
| Test agent | Tests from worked examples | Edits expected figures |
| Reviewer agent | Every branch before merge | Approves its own changes |
| Module agents (Wave 1) | One module, one worktree, one branch each | Changes a contract on their own |

**Reviewer checklist,** run on every branch: firm rules F1 to F11, then the seven points of the definition of done (worked examples pass; controls enforced and tested; language files and glossary terms; pattern and tokens in light and dark; permissions and own-work re-checked; shown at a Friday demo; release logged with version and class). Then Joseph de Leon approves the merge.

**Friction log:** when an agent makes the same mistake twice, record it as a project rule with Boost's `record-rule` tool; when the same rule appears in a second app, move it into a skill here.

## Decisions on open questions

All five were decided on October 21, 2026, as recommended; G1 to G3 become Wave 0 contracts, and G5's dry run is due by November 30, 2026.

| # | Question | Decision |
| --- | --- | --- |
| G1 | How are peso amounts stored? | Whole centavos as integers, behind one money type in `dlhouse/rules`; never floating point |
| G2 | How does a screen say which pattern it uses (F8)? | One searchable declaration per screen, such as a PHP attribute naming P1 to P6; the lead agent fixes its exact form in Wave 0 |
| G3 | Which test framework? | Pest, which Boost supports with its own guidelines and skill |
| G4 | Where does the `dlhouse/guidelines` package live? | A private Git repository installed through Composer, versioned like any release (Class A for wording) |
| G5 | How do we prove agents follow it before December 1? | A dry run by November 30: a scratch Laravel app with the package installed, and Claude Code asked to draft one P1 screen and the W1 test; the reviewer checklist must pass with no reminders |

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.2 | October 21, 2026 | Structure accepted (one guideline, six skills, per-app project rules); G1 to G5 decided as recommended. |
| 0.1 | October 21, 2026 | First draft: Boost channels checked against current docs; one guideline and six skills; firm rules F1 to F11 with checks; stop-and-ask triggers; money, screens, finishes, controls, testing and team skills; open questions G1 to G5. |
