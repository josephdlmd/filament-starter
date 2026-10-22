# DLHouse Screen Pattern Guide 0.2

Oct 20, 2026 · @Joseph de Leon

Six screen patterns carry every chain in the accounting app: list, detail, form, approval inbox, evidence capture, and matching. This guide is the floor plan for each one: what it is for, how it is laid out, and what it must never let a user do.

## About this document

- **Version and status:** 0.2, draft for review, October 20, 2026.
- **Precedence:** regulation, then the DLHouse Executive Summary (Revision 5), then this document. Terms follow Glossary 0.7; chains follow Document Lifecycles 0.4; controls follow the Control Register 0.5; finishes follow Style Guide and Tokens 0.5.
- **Layer:** Layer 3, design system (`dlhouse/ui`): the floor plans for rooms. The patterns are house defaults for every DLHouse app; which screens use which pattern is app-specific.
- **Scope:** the six patterns the accounting app needs first. Wizard, settings, dashboard, quick create (slide-over) and owner review follow in 0.2 without blocking the build.
- **Foundations:** layouts borrow Shopify Polaris usage guidance (patterns only, not its components) and are built with Filament v5. Filament v5 has the same features as v4; the only change is Livewire 4 support ([source](https://filamentphp.com/content/danharrin-filament-v5-blueprint)), so v4's schemas, tables and actions are the building blocks. Specific Filament APIs are confirmed against the docs at build time.
- **Finishes are not here:** colors, type and spacing come from the Style Guide and Tokens (week of November 23).

## Best practices for screen patterns

These ten practices come from mature design systems (Polaris, GOV.UK, Carbon) and from how auditors read screens; all are house defaults.

1. **A small, named set.** Every screen declares one pattern. A screen that fits none is a design question for the design owner, not a one-off.
2. **Describe the job, not the widget.** Each pattern starts from what the person is trying to get done, with "use when" and "don't use when," so the choice is obvious.
3. **The status is always visible.** Every document screen shows its lifecycle status (text plus shape) and its number at the top, so no one acts on the wrong version.
4. **Primary action, one per screen.** One clearly primary button, placed the same way on every screen; destructive or irreversible actions are never primary and always confirm.
5. **Show only actions the user may take.** Buttons a user can't use are hidden, and the server re-checks every action anyway; the screen is never the control.
6. **Errors prevented, then explained.** Locks stop the action with a plain message that names the rule ("Input VAT needs the supplier's VAT Invoice"), never a code.
7. **Every peso traceable on screen.** From any amount, a click reaches the source document and its evidence; from any document, the chain before and after.
8. **Same pattern, two densities.** Compact on desks (28 px rows), comfortable on tablets (44 px targets); the pattern's order and meaning never change between them (Style Guide T5).
9. **Accessible and dark-mode ready from the first draft.** Keyboard reachable, labelled, color never alone, contrast checked in both modes.
10. **Configuration before customization.** Each pattern names the lowest rung of the custom screen ladder that builds it, so we stay on Filament's plumbing.

## Rules every pattern shares

These apply on every screen, so each pattern below lists only what is particular to it.

| Area | Rule |
| --- | --- |
| Page header | Title, document number, status (text plus shape), active company, and the one primary action, always in the same place |
| Active company | Shown on every screen; a company switch reloads the screen and clears unsaved work after a warning (GEN-10) |
| Density | Compact on desks, comfortable on touch screens, detected by input type, user can override; tablets get no hover-only information |
| Amounts | Right-aligned, tabular numerals, negatives in parentheses, peso sign in the column header, a double rule under final totals |
| Dates | One format everywhere; document date and posting date labelled separately whenever both exist |
| Statuses | Draft, Submitted, Approved, Posted, Voided, each with its own shape; progress states (Held, Released, Matched) shown beside, never instead |
| Locks | The action is hidden or disabled with the rule in plain words; the server re-checks every action |
| Evidence | Any record with an attachment shows a thumbnail count; one tap opens it |
| Screen text | Only from language files, using glossary terms |
| Internal label | Every printed or exported report carries "Internal management report" (CLS-09) |
| Accessibility | WCAG 2.2 AA as the target: keyboard reachable, visible focus ring, labels on every field, touch targets at least 44 px on tablets |
| Dark mode | Every pattern reviewed in both modes before it is approved |

**Custom screen ladder (from the executive summary):** stop at the first rung that works. (1) A resource page; (2) a custom page from Filament schemas, tables, actions and widgets; (3) a Blade view using only Filament and DLHouse components; (4) a new DLHouse Blade component using tokens only; (5) raw markup or a view override, approved by the design owner and logged.

## P1. List and data table

The front door of every document type: find a record, see its status and amount at a glance, and open it.

**Use when** people need to find, scan, filter or compare many records of one type: Invoice Records, collections, supplier invoices, payment vouchers, journal entries.

**Don't use** for approving (P4), for reconciling two lists against each other (P6), or for a single record's details (P2).

**Anatomy, top to bottom**

1. Page header with the primary action ("New Invoice Record").
2. Saved views as tabs: All, Draft, Submitted, Posted, Voided, and the type's own views ("2307 not yet received", "Held checks").
3. Search, then filters (date range, partner, status, amount range), with active filters shown as removable chips.
4. The table: document number, document date, partner, status, then amounts last and right-aligned. A totals row for the filtered set.
5. Alarm column: an icon with text where a record is flagged (overdue, unmatched, missing evidence).
6. Empty state that says why it is empty and offers the primary action.

**Desk and tablet:** desks show all columns with compact rows and keyboard row navigation. Tablets drop to number, partner, status and amount, with the rest one tap away; rows are tall enough to tap.

**Always:** sort by document date, newest first; keep the filter when returning from a record; export carries the internal-report label and is logged.

**Never:** delete from the list (GL-02, GL-06); bulk-approve (approvals happen one by one in P4); show records of another company (GEN-10).

**Built with:** rung 1, a resource list page with Filament table columns, filters, tabs and actions.

**Used in:** every worked example; the 2307 views in W2 to W4; held checks in W10.

## P2. Detail view

One document on one page: what it says, where it stands, what it posted, what proves it, and what came before and after.

**Use when** someone opens any numbered document, including posted and voided ones; this is also the auditor's main screen.

**Don't use** for entering or changing a Draft (P3) or for deciding an approval (P4, which embeds a short version of this page).

**Anatomy, top to bottom**

1. Page header: number, status, document date and posting date, and only the actions this user may take now (Submit, Post, Void, Reverse).
2. Document chain: a strip of linked documents before and after (delivery receipt → Invoice Record → collection → deposit), each showing its status; one click opens it.
3. Summary: partner, amounts with VAT and withholding shown separately, and an alarm banner if the record is flagged.
4. Lines: items or accounts, with totals.
5. Journal entry: the debits and credits this document posted, or will post.
6. Evidence: thumbnails of every attachment, with who added them and when.
7. History: every status change and event (rejected, recalled, voided) with who, when and why, read from the audit log.

**Desk and tablet:** desks show the chain and summary side by side. Tablets stack every section in the same order, with history collapsed by default.

**Always:** a voided document stays fully readable, marked Voided, with its reason and a link to its replacement; a reversed document links to its reversing entry (W14).

**Never:** edit fields on a posted document (GL-02); hide the journal entry or the history from anyone who can see the document.

**Built with:** rung 1, a resource view page with schema sections; lines as a table-layout repeatable entry; chain, evidence and history as DLHouse components (rung 4) if the plain schema can't show them.

**Used in:** every worked example; especially W14 (void and reversal) and W15 (the linked intercompany pair).

## P3. Two-column form

Fast, keyboard-first entry for the Encoder and Accountant: the main fields on the left, the running totals and checks on the right, so mistakes show before Submit.

**Use when** preparing a Draft: Invoice Records, collections, supplier invoices, payment vouchers, credit memos, manual journal entries, liquidations.

**Don't use** on tablets for encoding (tablets don't encode, per the summary), for settings (a settings pattern, 0.2), or for documents with three or more steps that depend on each other (a wizard, 0.2).

**Anatomy**

1. Left column, the document: partner, document date, references (booklet serial, delivery receipt, purchase order), then a lines grid that moves cell to cell with Tab and Enter.
2. Right column, the checks: totals with VAT and withholding computed by `dlhouse/rules`, the journal entry preview, the required evidence checklist, and live warnings ("Expected withholding ₱2,000; entered ₱2,240").
3. Action bar fixed at the bottom: Save draft, then the one primary action (Submit, or Post for routine matched entries).

**Always:** computed amounts (VAT, withholding, totals) come from `dlhouse/rules` and can't be typed over; a field's lock explains itself in plain words; unsaved changes warn before leaving; amount fields take numbers only.

**Never:** let Submit through with missing evidence or a failing check (GL-01, PUR-02, PUR-03); let the maker approve (GEN-01); let a posting date fall in a closed period (GL-05).

**Built with:** rung 1, resource create and edit pages with schema grids and the DLHouse fields (`PesoInput`, `TinInput`); the checks panel as a schema section reading `dlhouse/rules`.

**Used in:** W1 to W3 and W10 (Invoice Records and collections), W5 (credit memo), W6 to W9 (supplier invoices and vouchers), W11 (liquidation), W13 and W14 (journal entries).

## P4. Approval inbox

The approver's one screen, built for a tablet away from the desk: what is waiting, why it needs me, and a decision in under a minute with everything needed to decide on one page.

**Use when** the Finance approver or Final approver decides submitted items: payment vouchers, credit and debit memos, manual journal entries, voids and reversals, landed cost sheets, liquidations, new payees.

**Don't use** for browsing history (P1) or for the second owner's quarterly review (owner review pattern, 0.2).

**Anatomy**

1. The queue: items waiting for me, oldest first, each card showing type, number, partner, amount, maker, days waiting, and why it is here ("₱50,000 or more", "new payee", "void").
2. The decision page: a short detail view (P2) with the amount large, the alarm banner if any, the evidence thumbnails, the journal entry, and for vouchers the three-way match result and withholding.
3. The decision bar, fixed at the bottom: Approve (primary) and Reject (requires a reason); no other actions.
4. After deciding, the next item opens automatically.

**Desk and tablet:** tablet-first, comfortable density, single column. On desks the queue and the decision page sit side by side.

**Always:** re-authenticate for approvals of ₱50,000 or more on tablets (S11); show "also needs Final approver" when a second approval follows; escalate items waiting more than 2 business days (GEN-08); a delegate sees the delegation's end date.

**Never:** bulk approve; show an item the user made (GEN-01) or one beyond their tier; approve from a notification without opening the decision page.

**Built with:** rung 2, a custom page from Filament tables, schemas and actions; the decision bar as a DLHouse component if Filament's action layout can't fix it to the bottom on tablets.

**Used in:** W5, W7 to W9, W11 and W14, plus the landed cost sheet in W6.

## P5. Evidence capture

Photograph a paper document and attach it to the right record in three taps, so no peso posts without proof.

**Use when** paper arrives away from the desk: 2307s, signed delivery receipts, inspection and acceptance reports, deposit slips, spoiled-invoice copies, liquidation receipts, return slips.

**Don't use** for importing files in bulk (data import pattern, later) or for entering the document's figures (P3).

**Anatomy**

1. Choose what it is for: search by document number or partner, or pick from "waiting for evidence" (2307s expected, delivery receipts without photos, deposits not yet slipped).
2. Choose the evidence type from a short list for that record ("2307", "Signed delivery receipt").
3. Take the photo, or several pages, with a crop and readability check before saving.
4. Confirm: thumbnail, record number, type; Save. The record's progress updates where the type drives it (a 2307 moves from Expected to Received).

**Desk and tablet:** tablet-first with the camera. On desks the same steps take a file upload or a scanner.

**Always:** store the original image unaltered with who, when and from which device; keep images on the server, never on the tablet (summary: no business data stored on the device); a wrong attachment is marked superseded with a reason, never deleted.

**Never:** attach to a record of another company; mark a 2307 Received or a delivery receipt as signed without its image; allow evidence capture to change any amount.

**Built with:** rung 2, a custom page with Filament file upload and actions; the guided three-step flow as a DLHouse component if the plain form feels slow on tablets.

**Used in:** W1 (signed delivery receipt), W2 to W4 (2307s), W3 (inspection and acceptance report), W5 (return slip), W6 (import entry and customs receipt), W10 and W11 (deposit slips, receipts), W12 (spoiled copies).

## P6. Matching and reconciliation

Two lists side by side that must agree; the app pairs what it can, and the person explains only what is left.

**Use when** two sources must tie out: bank statement lines against collections and vouchers (CSH-07, PAY-08), a collection against open Invoice Records (CSH-04), purchase order, receiving report and supplier invoice (PUR-02), intercompany balances (CLS-05), the quarterly withholding reconciliation (TAX-03).

**Don't use** for a single list (P1) or for approving the result (the reconciliation goes to P4 for review).

**Anatomy**

1. Header: what is being reconciled, the period, both totals and the difference, large. The difference must reach ₱0.00, or every remaining item must be explained.
2. Left list and right list, with matched pairs folded away and a count ("142 matched").
3. Unmatched items stay visible, each with its next step: match manually, create the missing entry (bank charges as a journal entry), or mark as a reconciling item with a reason (an outstanding check).
4. Reconciling items aged; outstanding checks past 90 days flagged (S17).
5. Action bar: Save draft, Submit for review.

**Desk and tablet:** desk only for doing the work; the reviewer reads the submitted result on a tablet.

**Always:** auto-match on exact references first (voucher number in the bank's reference field), then amount and date, never on amount alone; every manual match logs who and why; the signed result is kept as evidence.

**Never:** let the Cashier reconcile (CSH-01, CSH-07); force a match to hide a difference; post an unknown bank debit as anything but an alarm until explained (PAY-08).

**Built with:** rung 2 at best, two Filament tables on a custom page (tables can now be backed by custom data, useful for statement lines); more likely rung 4, a DLHouse matching component, since Polaris and Filament have no pattern for this.

**Used in:** W1 to W3 and W10 (collections and deposits), W4 (withholding reconciliation), W7 to W9 (bank debits to vouchers), W8 (three-way match), W15 (intercompany).

## Pattern map

Every accounting document uses the same three core screens (list, detail, form); the other three appear where its chain needs approval, evidence or matching.

| Document | P1 List | P2 Detail | P3 Form | P4 Approval | P5 Evidence | P6 Matching |
| --- | --- | --- | --- | --- | --- | --- |
| Invoice Record | Yes | Yes | Yes | No (routine, posted) | Delivery receipt, Invoice copy | Collections applied |
| Collection | Yes | Yes | Yes | No | Acknowledgement receipt, deposit slip, 2307 | Bank lines, Invoice Records |
| Credit and debit memo | Yes | Yes | Yes | Yes | Return slip | No |
| Supplier invoice | Yes | Yes | Yes | No (routine, posted) | Supplier's VAT Invoice | Three-way match |
| Payment voucher | Yes | Yes | Yes | Yes | Bank advice | Bank lines |
| Manual journal entry | Yes | Yes | Yes | Yes | Support | No |
| Landed cost sheet | Yes | Yes | Yes | Yes | Import entry, customs receipt | No |
| Cash advance and liquidation | Yes | Yes | Yes | Yes | Receipts | No |
| Manual invoice register | Yes | Yes | No | Monthly sign-off | Spoiled copies | Serials against Invoice Records |
| Bank reconciliation | Yes | Yes | No | Review and sign-off | Statement | Yes |
| Withholding reconciliation | Yes | Yes | No | Review | 2307s | Yes |
| Void or reversing entry | Through the original | Yes | Yes | Yes | Reason | No |

## Decisions on open questions

All four were decided on October 20, 2026, as recommended.

| # | Question | Decision |
| --- | --- | --- |
| S1 | Should P6 (matching) be built as a DLHouse component from the start, rather than first trying two Filament tables? | Try two tables in one afternoon spike in December; move to a component if auto-match and folding feel clumsy |
| S2 | Should the document chain strip (P2) be a house component used in every app? | Yes: it is the on-screen form of "every peso is traceable" |
| S3 | Who tests the patterns with real users before the build? | The Encoder and the Finance approver, on paper sketches, in the week of November 16; the second owner tries P4 on a tablet |
| S4 | Is WCAG 2.2 AA the right accessibility target? | Yes, as the house default; checked by the design owner on the showcase page |

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.1 | October 20, 2026 | First draft: ten best practices, shared rules, patterns P1 to P6, the pattern map, open questions S1 to S4. |
| 0.2 | October 20, 2026 | S1 to S4 decided: a December spike before building the matching component; the document chain strip as a house component; paper tests with the Encoder, Finance approver and second owner in the week of November 16; WCAG 2.2 AA as the target. |
| 0.2 (update) | October 21, 2026 | Precedence line updated to the current versions of the Executive Summary and related documents; no content change. |
