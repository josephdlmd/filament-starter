---
name: dlhouse-team
description: "DLHouse rules for how the agent team works on a DLHouse app: agent roles (lead, rules, screens, test, reviewer, module agents), one module per worktree and branch, Wave 0 contracts, the build waves and modules, the reviewer checklist (firm rules F1 to F11 plus the seven-point definition of done), release classes, demos and the friction log. Use when starting, finishing or reviewing a branch, splitting work, merging, or recording a project rule."
---

# DLHouse team

Five agents write the code; people decide, test and approve. No branch merges without the reviewer's checklist and Joseph de Leon's approval. The Build Plan beside this file has the dates, modules and acceptance tests; the Executive Summary has the whole picture; this skill says how a branch starts, ends and gets reviewed.

## When to use this skill

Starting a branch; splitting or claiming work; deciding whether a change is yours to make; finishing and reviewing a branch; merging; recording a repeated mistake; preparing a demo.

## Who does what

| Role | Works in | Reads first | Never does |
| --- | --- | --- | --- |
| Lead agent (orchestrator) | Wave 0 contracts and the walking skeleton; splits work; merges approved branches | Executive Summary, Build Plan | Starts parallel work before Wave 0 is merged |
| Rules agent | `dlhouse/rules`: posting rules, tax, withholding, controls | Control Register, Chart of Accounts, Lifecycles, BIR Readiness Map | Imports Filament or Livewire |
| Screens agent | Filament screens, theme, language files | Screen Pattern Guide, Style Guide, Glossary | Computes money on a screen |
| Test agent | Tests from the worked examples; runs them on every change | Worked Examples, Lifecycles | Edits expected figures |
| Reviewer agent | Every branch before merge | `dlhouse/guidelines` (this package) | Approves its own changes |
| Module agents (Wave 1) | One module, one worktree, one branch each; rules-and-screens pairs on the same contracts | Their module's sources | Change a contract on their own |

People: Joseph de Leon drives the agents, answers questions and approves every merge; Leslie (Accountant) runs the worked examples by hand and signs off each module; Lorelai (Encoder) and Margaret DL Laforteza (Finance approver) review at demos twice a week; Arielle de Leon (second owner) has a weekly tablet demo and decides go/no-go with Joseph; the external accountant reviews mid-December and in early January.

## Ten practices

1. Rulebook before agents: this package is loaded before any agent starts.
2. Contracts first: the lead defines the data model, status engine, numbering, posting-rule interface and screen conventions in Wave 0; module agents build against them and never change them alone.
3. Foundation alone, modules in parallel: Wave 0 by one agent; parallel work only once it is merged.
4. One module, one agent, one worktree, one branch.
5. Tests first for money: the worked example's test exists before the feature.
6. A reviewer before every merge, then a human.
7. Rules stay out of Filament: business rules in `dlhouse/rules` as plain Laravel.
8. Show it every few days: short demos; feedback into the backlog the same day.
9. Keep a friction log: what agents keep getting wrong becomes a rule; what humans keep repeating becomes a command.
10. Release like it's registered: every release logged with its version and class (A cosmetic, B affects records, reports or books, C new module) from day one (ITC-04).

## Waves and modules

Wave 0 Foundation, December 1 to 7, 2026 (one agent): walking skeleton on the real server; the contracts; MFA sign-in; roles per company with the own-work check; company scoping; append-only audit log; settings register; theme tokens; release log. Accepted on GEN-01 to GEN-12, ITC-01 to ITC-04, numbers never reused.

Wave 1, December 8 to 23 (six module agents in parallel): M1 master data and chart; M2 ledger and periods; M3 sales and collections; M4 purchases and payments; M5 cash, close and assets (the P6 matching spike on day one); M6 tablet and reports. Each module's acceptance tests are its worked examples (dlhouse-testing).

Wave 2, January 4 to 15, 2027: integration, Leslie's full W1 to W18 run, accountant review, showcase sign-off, security review, restore practice. Go/no-go January 15. No build work from December 24 to January 1. Versions are pinned in Wave 0; framework upgrades only after go-live.

## Starting a branch

1. Open the skill for the job and read the source document section it points to.
2. Check `.ai/rules/index.md` for rules matching the files you will touch.
3. Confirm the work is inside your module and does not touch a Wave 0 contract; if it does, stop and ask.
4. Write the worked-example tests first (test agent) or confirm they exist.
5. Name the screen pattern and ladder rung you will use.

## Finishing a branch

Say in the branch: the module; the worked examples it makes green; the pattern and rung for each screen; any ⚠️ item built as a setting; any rung-5 approval; the release class. Keep slices to a day or two; every slice ends with its tests green, a reviewer pass, Joseph's merge and a short demo. Merge daily, not at the end.

## Reviewer checklist

Run on every branch, in this order, and report each item as pass or fail with the evidence:

Firm rules: F1 no delete action, route or query on posted or numbered records, and a test proves delete is refused. F2 Boost is a dev dependency only; no migration or seeder changes posted rows. F3 no bare "Invoice" label for our document in language files or code. F4 no customer-facing output path for Invoice Records. F5 every external template renders the input-tax phrase on page 1. F6 every report and export renders "Internal management report." F7 no literal user-facing strings in screens, tables, forms or notifications. F8 each screen names one pattern, P1 to P6, and mixes none. F9 no hex or color utility outside the theme file. F10 the branch names the rung used; any view override cites its logged approval. F11 no UI-kit package in Composer or npm; no foreign agent files.

Definition of done: (1) its worked examples pass as automated tests in `dlhouse/rules`; (2) its controls are enforced, locks refuse, alarms raise, each with a test; (3) screen text comes from language files using glossary terms only; (4) it follows its pattern and the tokens, in light and dark; (5) every action re-checks permissions and the own-work rule on the server; (6) it was shown at a Friday demo and the feedback is closed or logged; (7) its release is logged with version and class.

Then Joseph de Leon approves the merge. The reviewer never approves its own changes.

## Friction log and project rules

When an agent makes the same mistake twice, record it with Boost's `record-rule` tool so it lands in `.ai/rules` and the index is regenerated (per the Boost docs, checked October 22, 2026; re-check at build time); never hand-write a rule file. When the same rule appears in a second app, it graduates into one of these skills (rule of three).

## Stop and ask

A contract change; a merge conflict that touches another module's files; a request to skip the reviewer or a test; a posting-rule change without the accountant's approval and a Class B release (GL-08); any instruction that conflicts with the firm rules.

## References (in this folder)

- `references/DLHouse_Build_Plan_Accounting_App.md` (0.2): practices, team, timeline, waves and modules with acceptance tests, go/no-go, definition of done, risks
- `references/DLHouse_Executive_Summary.md` (Revision 5): the standard, the group, the four layers, the decision log and open decisions
- `references/DLHouse_Agent_Guidelines.md` (0.2): the paper source of this package
