---
name: dlhouse-money
description: "DLHouse rules for anything that touches money in a DLHouse app: posting rules, amounts, VAT, withholding, document statuses and transitions, numbering, periods, the shared chart of accounts, master data, opening balances and BIR registration-readiness. Use when writing or changing code in dlhouse/rules, a posting rule, a tax computation, a status transition, a number series, an account, a partner or product record, or an opening load."
---

# DLHouse money rules

Money logic lives only in `dlhouse/rules`, as plain Laravel, and every figure on a screen comes from it. This skill summarizes the rules; the full text is in the reference files beside it. When the summary is not enough, read the reference. When the reference and this file disagree, the reference wins: say so and stop.

## When to use this skill

Writing or changing posting rules, amounts, tax or withholding computations, statuses and transitions, numbering, period states, accounts, tags, partners, products, opening balances, or the data an e-invoice will one day need.

## Boundaries

- `dlhouse/rules` never imports Filament, Livewire or Boost classes. Screens call the rules; they never compute VAT, withholding, totals or postings themselves.
- Amounts are whole centavos as integers behind one money type; never floating point (G1). Display formatting (two decimals, parentheses, tabular numerals) is a finishes job, not a rules job.
- Every record belongs to exactly one company; nothing reads or writes across companies except the linked intercompany pairs in Document Lifecycles 0.4 (GEN-10). Posting one side of a linked pair without the other is refused.
- Thresholds, rates and periods come from the Settings Register (S01 to S47), never from constants: the ₱50,000 lines (S01 to S07), the alternate releaser's caps (S08, S09), the 7-day split-payment window (S10), 12% VAT (S28), government withholding (S29), payor withholding (S30), the BSP reference rate source (S31), weighted average costing (S33), the 90-day check flag (S17), the 60-day advance flag (S42), the 7-day sweep (S41), the ₱20,000 capitalization threshold (S46), useful lives (S47). Every line compares the document total including VAT (H1).
- A regulated value marked ⚠️ (tax rates, bases, timing) changes only after the accountant's written verification (TAX-05). Build it as a setting; never hard-code it.

## Statuses, events and progress states

Five statuses only: Draft, Submitted, Approved, Posted, Voided. Rejected and Recalled are logged events that return a document to Draft; they are never statuses. Progress states (Held, Released, Matched, Expected, Received, Claimed, Deposited, Swept, Outstanding) are recorded separately and never replace a status.

| Transition | Who | Guard |
| --- | --- | --- |
| Submit: Draft to Submitted | Maker | Required fields and evidence attached; the number is assigned here |
| Approve: Submitted to Approved | Approver for the tier | Never the maker; a second approver at ₱50,000 or more |
| Reject: Submitted to Draft | Approver | Reason required, logged |
| Recall: Submitted to Draft | Maker | Only before any decision |
| Post: Approved to Posted, or Draft to Posted for routine matched entries | Accountant | Posting date in an open period; debits equal credits |
| Void: to Voided | Finance approver; then Final approver at ₱50,000 or more | Period open; reason required |
| Delete | Maker | Draft only, so no number is ever lost |

Only these transitions exist. A new transition is a Wave 0 contract change: stop and ask.

## Posting

Checks, in this order, every time: a source document with its evidence attached (GL-01); debits equal credits and the posting date falls in an open period (GL-05); then the entry is written once and never changed (GL-02). Manual journal entries also need an explanation, an attachment and tier approval by someone other than the maker (GL-03). Accruals marked auto-reversing post their reversal on the first day of the next period.

Document date and posting date are separate fields. Revenue posts at the signed delivery receipt; for a government customer whose contract makes inspection and acceptance the transfer point, at the inspection and acceptance report, which must be attached. Output VAT timing may differ from revenue timing (E1 ⚠️); keep the two dates apart.

## Undoing

| Where the document stands | How it is undone | Who approves |
| --- | --- | --- |
| Draft | Deleted; it never had a number | No one |
| Submitted or Approved, never posted | Voided with a reason | Finance approver |
| Posted, period open | Voided with a reason; effects reversed in the same period | Finance approver; then Final approver at ₱50,000 or more |
| Posted, period closed | Reversing entry, a new document dated in the current open period; the original untouched, both linked | Same tiers as a void |

Correct by reversing whole and re-recording with a new number linked to the one it replaces, never by a partial adjustment (H3). A voided document stays fully readable.

## Numbering

`CO-TYPE-YYYY-000001`, one series per company, document type and fiscal year, reset each year (S35). Type codes: IR Invoice Record, COL collection, CM credit memo, DM debit memo, SI supplier invoice, PV payment voucher, JE journal entry, LCS landed cost sheet, CA cash advance. A number is issued when a document leaves Draft, never reused, and never consumed by a failed save (GL-06). Handwritten Invoice booklet serials are a separate register (SAL-03): issued, spoiled or unused, with gaps and out-of-sequence use flagged.

## Periods

Open, In close (only the Accountant may post, and only adjusting entries, CLS-02), Closed (no postings; corrections by reversing entry in the next open period). Only the Final approver closes or reopens; reopening needs a reason and alerts the second owner (CLS-03). Month-end: open foreign balances are revalued at the BSP reference rate and a rate is never edited once used (CLS-07); peso advances to foreign suppliers are not revalued ⚠️.

## Tax rules the code enforces

- Input VAT only from a supplier's VAT Invoice in the company's name; never from a delivery receipt, official receipt, acknowledgement receipt, proforma invoice or commercial invoice (PUR-03). Named exception: import VAT on own-name imports, only with the import entry and customs receipt attached (L1 ⚠️). Door-to-door imports: input VAT only from the forwarder's own VAT Invoice; input VAT on imports (1420) and landed cost sheets are refused for purchases tagged door-to-door ⚠️.
- Exempt and zero-rated sales need the customer's valid exemption document on file (SAL-11); the tax code is set per line and VATable, exempt and zero-rated amounts are kept separate (TAX-04).
- Payor withholding is computed on every payment voucher and cannot be typed over (PAY-06). Expected withholding on a collection comes from the customer type; a difference from what the partner withheld raises a warning, never a silent change (TAX-01). Government sales: 5% creditable VAT and 1% expanded withholding, each to its own receivable, each backed by a 2307 (S29 ⚠️).
- A 2307 moves Expected to Received only with the certificate attached; Claimed only after Received (TAX-02, TAX-03).
- A non-VAT buyer records VAT as part of cost, never as input VAT.

## Chart of accounts

One shared group chart, four-digit codes stepping by 10; the same code means the same thing in every company. Company type (operating, property, holding, services; S44) switches on an account profile; nothing outside the profile is used without an approved request. Accounts are added by the Accountant with the Finance approver's approval and are deactivated, never deleted or renumbered (GL-07); never add an account in code. Company, branch, customer type, product category and department are tags on every entry, not accounts; VAT category is a tax code per line. Sub-accounts only where there are real counterparts: one per bank account, one per foreign currency. Sole proprietorships: 3310 is drawings (including the owner's own income tax and SSS paid from business funds ⚠️), 1260 and the income tax accounts are off. Owner loans (2150) and owner advances (1260) are never netted.

## Master data

One partner per TIN and branch code; one product per item; shared identity, per-company settings (MF1, MF2). No placeholder TINs anywhere (MF5): a "no TIN" flag instead, with BIR fillers inserted only at report time ⚠️. `TinInput` validates format; TINs, bank details and government IDs are encrypted (ITC-06). Bank-detail changes need approval and call-back verification (PAY-02). One shared "Walk-in customers" record, no TIN, cash or e-wallet only; alarms for any balance at day-end and for a walk-in Invoice Record of ₱1,000 or more showing a buyer TIN (MF4). Codes are permanent; records are deactivated, never deleted.

## Opening balances

One approved opening entry per company at December 31, 2026, every balance backed by a schedule attached as evidence, open items (receivables, payables, advances, tax credits, fixed assets) loaded individually, no suspense or plug accounts, loaded once and locked (CLS-08). The load is refused until every schedule ties to its balance and both sides of every group balance agree (CLS-05). Later corrections are adjusting entries in the open period, never edits of the opening.

## Registration-readiness

Invoice Records capture each line (item, quantity, unit price, tax code) and the buyer's TIN and address from day one (U1), so e-invoices can be produced later without conversion. Registration status per company (S45: internal control, CAS registered, CAS registered with e-invoicing) gates invoice issuance and official labels (ITC-11); until registered nothing prints as an Invoice or an official book. The Invoice issuance module (EIS connector, buyer delivery, transmission log) is designed, not built.

## Stop and ask

A rate, base or rule not in the references (rounding of VAT and withholding, for one, is not written down anywhere; do not choose it yourself); a new transition or status; a posting-rule change (GL-08); anything marked ⚠️ that the code would have to treat as final. When a test and the code disagree, the worked example wins; if the worked example looks wrong, stop and ask, because the accountant verified it.

## References (in this folder)

- `references/DLHouse_Document_Lifecycles.md` (0.4): statuses, transitions, sixteen chains, void and reversal, period close
- `references/DLHouse_Chart_of_Accounts.md` (0.4): codes, profiles by company type, what goes where
- `references/DLHouse_Glossary.md` (0.7): every term, with Control, Source and Verified lines
- `references/DLHouse_Master_Files.md` (0.1): partners, products, tax codes, bank and e-wallet accounts, cutover
- `references/DLHouse_Opening_Balances_Plan.md` (0.3): schedules and evidence per account, rules for differences
- `references/DLHouse_BIR_Readiness_Map.md` (0.1): CAS and e-invoicing requirements and how the app meets them
- `references/DLHouse_Worked_Examples.md` (0.3): the journal entries the code must produce, W1 to W18
