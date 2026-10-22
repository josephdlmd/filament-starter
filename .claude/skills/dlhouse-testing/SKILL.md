---
name: dlhouse-testing
description: "DLHouse rules for writing and running tests in a DLHouse app: worked examples W1 to W18 become Pest tests before the feature, every journal line checked to the centavo, every control named by its ID, \"the app must refuse\" lists become refusal tests, and expected figures are never changed to make a test pass. Use when writing, changing or running any test, or deciding what \"done\" means for a module."
---

# DLHouse testing

Tests come from the worked examples before the feature. The test agent turns each worked example into an automated Pest test before the module agent builds it; a module is done only when its examples pass as tests and Leslie (the Accountant) has run them by hand. The Worked Examples document beside this file is the specification; this skill says how to turn it into tests.

## When to use this skill

Writing or changing any test; running the suite; judging whether a module or branch is done; adding a test for a control.

## Framework and placement

Pest (G3), with Boost's own Pest guidelines and skill alongside this one. Worked-example and control tests live in `dlhouse/rules`, where the logic lives (definition of done 1). Screen checks (pattern declared, actions hidden, language keys, labels printed) belong with the screens. Money is asserted in `dlhouse/rules`, not through a screen, since screens never compute it.

## From worked example to test

Each example W1 to W18 (W7 has a W7b variant) becomes one test file named for its example, such as `W2 credit sale with withholding`, built from the example's own sections:

- **Facts (Given and When)** become the fixture: the cast (Sample Trading Corp. and partners), the opening trial balance at April 1, 2027, and the assumed settings table at the top of the document. Role names only, never a real person's data.
- **Chain** becomes assertions on the status after each step and on every progress state (Received, Deposited, Matched, Expected, Claimed, Held, Released).
- **Journal entries** become assertions on every line: account code, debit and credit to the centavo, posting date, company. A money test checks every journal line, not totals.
- **Controls** become one named assertion per control ID the example lists; the test proves the lock refused or the alarm fired.
- **Expected alarms** become assertions that the alarm is raised when stated and absent otherwise, including the variants.
- **The app must refuse** becomes one refusal test per bullet, asserting the server refuses and that the message names the rule in plain words.
- **Boundary tests** stated in an example (W5: ₱49,999 versus ₱50,000; W14: ₱56,000) are always written, following W5's pattern of one case just below the line and one exactly on it.
- **Verified: not yet** does not change the test. Assert the figures as written. Where a figure depends on a ⚠️ value (a rate, a base, a fee), read it from the setting the example names so the test follows the setting, not a constant in the test.

Never change an expected figure to make a test pass. If the figure looks wrong, stop and ask; the accountant verified it. If a test and the code disagree, the worked example wins.

## What each example covers

| Example | Proves | Module |
| --- | --- | --- |
| W1 | Credit sale, revenue at the signed delivery receipt, collection in full, no withholding | M3 |
| W2 | 1% customer withholding; 2307 Expected to Received; the ₱240 difference variant | M3 |
| W3 | Government sale at inspection and acceptance; 5% and 1% to two receivables; "delivered, awaiting acceptance" (H4) | M3 |
| W4 | 2307s missing at quarter-end; credits stay open; quarterly reconciliation (TAX-03) | M3 |
| W5 | Credit memo at ₱67,200 needs two approvers; boundary at ₱49,999 and ₱50,000; return window | M3 |
| W6 | Own-name import: each cost at its own rate; import VAT with customs papers; landed cost sheet | M4 |
| W7, W7b | Advance paid in pesos before shipment, not revalued; the USD balance variant with revaluation and settlement forex | M4 |
| W8 | Three-way match; 1% withholding on goods; split-payment variant (PAY-05) | M4 |
| W9 | Monthly rent, 5% withholding, two approvals each month (H2); related-party release variant | M4 |
| W10 | Post-dated check Held, posted on its date, bounced as a new event | M3 |
| W11 | Cash advance and liquidation with change returned; own-liquidation refused | M5 |
| W12 | Spoiled booklet serial in the register; gap and out-of-sequence alarms | M3 |
| W13 | Periodic inventory valuation at weighted average; posting during In close | M5 |
| W14 | Void in an open period versus reversing entry after close (H3); boundary at ₱56,000 | M2 |
| W15 | Intercompany sale as a linked pair; non-VAT buyer; nets to zero (CLS-05) | M5 |
| W16 | Door-to-door import; input VAT only from the forwarder's VAT Invoice; no landed cost sheet | M4 |
| W17 | GCash collection gross with fee; weekly sweep; sweep alarm | M3 |
| W18 | Group rent on both sides; 5% withholding; combined view cancels | M5 |

Wave 0 is accepted on GEN-01 to GEN-12 and ITC-01 to ITC-04 and "numbers never reused"; M1 on Master Files MF1 to MF6 (placeholder TINs refused, call-back for bank details); M2 on W14 and "opening refused until schedules tie" (CLS-08); M6 on the paper-test scripts run on the real screens and ITC-11 labels.

## Control tests

Every lock and alarm has a test named for its control ID (`GL-02 posted record can't be edited`, `GEN-01 maker cannot approve`, `PAY-05 split payments within 7 days`). Every habit has a test that its report renders with the "Internal management report" label (CLS-09). Threshold tests read the setting and assert both sides of the line. Permission tests assert the server refuses even when the screen would have hidden the action.

## Screen and finish tests

Each screen names its pattern (F8); no literal user-facing string outside language files (F7); no hex or color utility outside the theme file (F9); each external template renders the input-tax phrase on page 1 (F5); no customer-facing output path for Invoice Records, and their internal printouts carry the input-tax phrase and "Internal reference" (F4, Glossary 0.7); each report and export renders the internal label (F6); no delete action, route or query on posted or numbered records (F1); no UI-kit package in Composer or npm and no foreign agent files (F11). These are the reviewer's mechanical checks; make them tests so the reviewer runs them, not reads for them.

## Done

A module is done only when: its worked examples pass as automated tests in `dlhouse/rules`; its controls are enforced and each has a test; Leslie has run the examples by hand on the test environment and signed off; and the rest of the definition of done (dlhouse-team) holds. Tests run on every change; a red suite blocks the merge.

## Stop and ask

An example whose figures look wrong; a step the lifecycles do not allow; a control the example lists that the register does not define; a ⚠️ value with no setting to read it from.

## References (in this folder)

- `references/DLHouse_Worked_Examples.md` (0.3): W1 to W18 in full, the cast, opening trial balance, assumed settings, questions E1 to E12 and decisions H1 to H4
- `references/DLHouse_Document_Lifecycles.md` (0.4): the chains and transitions each example walks
