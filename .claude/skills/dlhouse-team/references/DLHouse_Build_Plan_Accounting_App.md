# DLHouse Build Plan 0.2: Accounting App

Oct 21, 2026 · @Joseph de Leon

A team of Claude Code agents builds the accounting app in five weeks, December 1, 2026 to January 15, 2027: one week of shared foundation, then modules in parallel, then integration and testing. The books open at December 31, 2026, run side by side with Excel from January to March, and go live on April 1, 2027; July 1, 2027 becomes the fallback.

## About this plan

- **Version and status:** 0.2, draft for review, October 21, 2026 (agent team; go-live April 1, 2027).
- **Precedence:** regulation, then the DLHouse Executive Summary (Revision 5), then this plan. Scope follows the executive summary's first-app section; rules follow the Control Register, Lifecycles, Chart of Accounts, Master Files and the BIR Readiness Map.
- **Layer:** all four. The method (vertical slices, tests from worked examples, a friction log) is a house default for every DLHouse app; the modules and dates are this app's.
- **What "built" means here:** working software on the live server's test environment, reviewed by the people who will use it. Code itself is written during the build, not in this plan.

## Best practices for the build

Ten practices keep parallel agents consistent and the money logic right; all are house defaults.

1. **Rulebook before agents.** `dlhouse/guidelines` (firm rules, glossary, patterns, tokens) is written and loaded through Laravel Boost before any agent starts; agents are only as consistent as what they read.
2. **Contracts first.** The lead defines the shared data model, status engine, numbering, posting-rule interface and screen conventions in Wave 0; module agents build against them and never change them on their own.
3. **Foundation alone, modules in parallel.** Wave 0 is built by one agent; parallel work starts only once it is merged.
4. **One module, one agent, one worktree.** Each module agent works in its own git worktree and branch, so parallel edits never collide.
5. **Tests first for money.** The test agent turns each worked example into an automated test before the module agent builds the feature; a module is done only when its examples pass.
6. **A reviewer before every merge.** The reviewer agent checks each change against the firm rules and the definition of done; then a human approves the merge.
7. **Rules stay out of Filament.** Business rules live in `dlhouse/rules` as plain Laravel.
8. **Show it every few days.** Short demos to the people who will use it; feedback goes into the backlog the same day.
9. **Keep a friction log.** What agents keep getting wrong becomes a guideline; what humans keep repeating becomes a command.
10. **Release like it's registered.** Every release is logged with its version and class (A, B, C) from day one.

## The agent team and the people

Five agents write the code; people decide, test and approve.

**The agent team (Claude Code, each in its own worktree)**

| Agent | Works on | Reads first |
| --- | --- | --- |
| Lead (orchestrator) | Splits the work, writes the contracts, merges approved branches | Executive Summary, this plan |
| Rules agent | `dlhouse/rules`: posting rules, tax, withholding, controls | Control Register, Chart of Accounts, Lifecycles, BIR Readiness Map |
| Screens agent | Filament screens, theme and language files | Screen Pattern Guide, Style Guide, Glossary |
| Test agent | Worked examples as automated tests; runs them on every change | Worked Examples, Lifecycles |
| Reviewer agent | Checks each branch against the firm rules and the definition of done | `dlhouse/guidelines` |

Module agents (one per module in Wave 1) are rules-and-screens pairs working from the same contracts.

**The people**

| Role | Person | In the build |
| --- | --- | --- |
| Driver and merge approver | Joseph de Leon | Runs the agents, answers their questions, approves every merge; about 15 to 25 hours a week |
| Acceptance tester | Leslie (Accountant) | Runs worked examples by hand on the test environment; signs off each module |
| User reviewers | Lorelai (Encoder); Margaret DL Laforteza (Finance approver) | Demos twice a week; try the screens they will use |
| Owner reviewer | Arielle de Leon (second owner) | Weekly tablet demo; decides the go/no-go with Joseph |
| Accounting checker | The external accountant | Reviews the ledger and tax rules mid-December and the full run in early January |
| Server backup | Jose Mahatma de Leon | Practices one restore before the parallel run |

**The rhythm:** each module's work is split into slices of a day or two; every slice ends with its tests green, a reviewer pass, Joseph's merge and a short demo.

## Timeline

Guidelines and the server come first in November; three waves build the app by January 15; the books open at year-end and the first quarter of 2027 runs side by side with Excel.

&#91;embedded content: build timeline · 3 waves, gate, parallel run, go-live\]

No build work is planned from December 24 to January 1. January's transactions are entered in Excel as usual and caught up in the app once the opening balances load on January 20.

## Waves, modules and their acceptance tests

Wave 0 is built alone because everything depends on it; Wave 1 runs six module agents in parallel; Wave 2 joins them and proves them. Each module is done only when its worked examples pass as tests and Leslie has run them by hand.

| Wave and module | Dates | Delivers | Acceptance tests |
| --- | --- | --- | --- |
| Wave 0 Foundation (one agent) | Dec 1 to 7 | Walking skeleton on the real server; contracts (data model, status engine, numbering, posting-rule interface, screen conventions); MFA sign-in; roles per company with the own-work check; company scoping; append-only audit log; settings register; theme tokens; release log | GEN-01 to GEN-12, ITC-01 to ITC-04; numbers never reused |
| Wave 1 M1 Master data and chart | Dec 8 to 23 | Shared partners with company settings; products and units; tax codes; bank and e-wallet accounts; chart with company types and profiles; import screen | Master Files MF1 to MF6; placeholder TINs refused; call-back for bank details |
| Wave 1 M2 Ledger and periods | Dec 8 to 23 | Journal entries and posting rules; Open, In close, Closed; trial balance; voids and reversing entries; accruals; opening load with schedule checks | W14; opening refused until schedules tie |
| Wave 1 M3 Sales and collections | Dec 8 to 23 | Line-level Invoice Records; invoice register; collections by bank, check, cash and e-wallet; walk-in customer; checks; memos; withholding and 2307s; retention | W1 to W5, W10, W12, W17 |
| Wave 1 M4 Purchases and payments | Dec 8 to 23 | Supplier invoices; three-way match; payment vouchers; payor withholding; bank release matching; advances; landed cost; door-to-door; forex | W6, W7, W7b, W8, W9, W16 |
| Wave 1 M5 Cash, close and assets | Dec 8 to 23 | Bank and e-wallet reconciliation (from the matching spike); petty cash; cash advances; group charges; fixed assets; close checklist; inventory valuation; alarms | W11, W13, W15, W18 |
| Wave 1 M6 Tablet and reports | Dec 8 to 23 | Approval inbox and evidence capture; review pack; books of accounts set labeled internal; aging; statements | Paper-test scripts on the real screens; ITC-11 labels |
| Wave 2 Integration and testing | Jan 4 to 15 | Modules joined; full W1 to W18 run by Leslie; accountant review; showcase sign-off (T3); security review; restore practice | Every worked example passes; restore succeeds; showcase signed |

## Week by week

Each week ends with something reviewers can click; the right-hand column is that week's demo or result.

| Week of | Work | Demo or result |
| --- | --- | --- |
| Nov 16, 2026 | Paper tests; guidelines for agents written | Findings fixed in the Screen Pattern Guide |
| Nov 23 | Guidelines loaded through Laravel Boost; server set up; repository and CI ready | A hello-world release on the real server |
| Nov 30 | Wave 0: contracts and foundation | Sign in with MFA, switch company, a document moves Draft to Posted, the maker cannot approve it, the audit log shows it |
| Dec 7 | Wave 1 starts: six module agents in parallel; matching spike in M5 on day one | Partners and products by company; first worked examples green |
| Dec 14 | Wave 1; accountant reviews ledger and tax rules | Invoice Records, collections, payment vouchers and the ledger working together; W1 to W10 green |
| Dec 21 (short week) | Wave 1 finishes; Merritmed opening practice run on November 30 figures | All W1 to W18 tests green; practice opening ties |
| Dec 28 | Holiday break; December 31 year-end counts | Cash and stock counted; bank statements requested |
| Jan 4, 2027 | Wave 2: integration, Leslie's full W1 to W18 run, accountant review, showcase, security review | Issues fixed daily |
| Jan 11 | Wave 2 ends; restore practice; go/no-go on January 15 | Gate decision |
| Jan 18 | Opening balances reviewed and loaded by January 20 | Each company's opening locked |
| Jan 25 to Mar 31 | Parallel run: catch up January, then every transaction in both | Monthly comparison with Excel; one full month must match exactly |
| Apr 1 | Go-live | The app alone |

## Go/no-go on January 15, 2027

Joseph de Leon and Arielle de Leon decide, on Leslie's sign-off; "go" needs all five.

| # | Criterion | Evidence |
| --- | --- | --- |
| G1 | Every worked example (W1 to W18) passes as a test and by Leslie's hand | Test report; Leslie's sign-off |
| G2 | The external accountant has reviewed the ledger, sales, purchases and tax entries | Her written comments, all closed |
| G3 | The live server runs with backups, and one restore has been tested | Restore log |
| G4 | The year-end counts and statements are in hand, and the practice opening tied | Count sheets; practice run results |
| G5 | Master data is clean and loaded for all five companies | Clean-up workbook; import results |

**If "no-go":** the original schedule takes over: opening at March 31, parallel run April to June, go-live July 1, 2027. If that also slips, January 1, 2028 remains the last fallback.

## Definition of done

A feature counts as done only when all seven are true.

1. Its worked examples pass as automated tests in `dlhouse/rules`.
2. Its controls are enforced: locks refuse, alarms raise, and each has a test.
3. Screen text comes from the language files using glossary terms only.
4. It follows its screen pattern and the Style Guide tokens, in light and dark.
5. Every action re-checks permissions and the own-work rule.
6. It was shown at a Friday demo and the feedback is closed or logged.
7. Its release is logged with version and class.

## Risks and how we handle them

The biggest risks move from build speed to December itself: year-end, holidays, and how much one person can review.

| Risk | Effect | How we handle it |
| --- | --- | --- |
| One human reviews everything the agents produce | Merges queue up; mistakes slip through | Reviewer agent and tests catch most issues first; slices kept small; Leslie shares acceptance testing |
| Agents drift from the rules | Inconsistent screens or logic | Guidelines written before Wave 0; contracts owned by the lead; the friction log turns repeated mistakes into guidelines |
| Parallel modules collide | Slow, risky merges | One worktree per module; contracts frozen after Wave 0; merges daily, not at the end |
| December is year-end and holiday season | Fewer reviewer hours; counts on busy days | Counts scheduled now; demos kept short; nothing planned December 24 to January 1 |
| Token costs multiply with parallel agents | Higher AI spend for a few weeks | Budgeted as a build cost; agents stopped when idle |
| Accountant not available in December and January | Tax logic unchecked at the gate | Book her two review windows now |
| Master data not clean by mid-January | Opening load delayed | Clean-up starts in December, alongside Wave 1 |
| Framework updates during the build | Breakage mid-wave | Versions pinned in Wave 0; upgrades only after go-live |
| Double encoding in the parallel run | Lorelai overloaded January to March | Paper-test timing (K1) sizes the load; a helper is arranged if needed |

## Questions

Four to settle in November; each has a recommended answer.

| # | Question | Recommended answer |
| --- | --- | --- |
| B1 | Can Joseph de Leon give 15 to 25 hours a week from December 1 to January 15 to drive the agents and approve merges? | Yes, blocked on the calendar |
| B2 | Who sets up the live server, and by when? | Joseph with Jose Mahatma de Leon as backup, ready by November 30 |
| B3 | Can the external accountant review in mid-December and again January 4 to 15, and review the openings by January 18? | Yes, booked now |
| B4 | Can the year-end counts happen on December 29 or 30 and be rolled to December 31? | Yes, with each company's Cashier and two counters |

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.1 | October 21, 2026 | First draft: eight best practices; team and weekly rhythm; timeline; modules M0 to M7 with acceptance tests from W1 to W18; week-by-week demos; go/no-go criteria G1 to G5; definition of done; risks; questions B1 to B4. |
| 0.2 | October 21, 2026 | Rebuilt around an agent team (lead, rules, screens, test and reviewer agents in worktrees): Wave 0 Dec 1 to 7, Wave 1 in parallel Dec 8 to 23, Wave 2 Jan 4 to 15; go/no-go January 15; opening at December 31, 2026; parallel run January to March; go-live April 1, 2027; July 1, 2027 becomes the fallback. |
