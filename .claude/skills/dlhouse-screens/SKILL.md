---
name: dlhouse-screens
description: "DLHouse rules for building or changing any Filament screen in a DLHouse app: the six screen patterns (P1 list, P2 detail, P3 two-column form, P4 approval inbox, P5 evidence capture, P6 matching), the rules every screen shares, the custom screen ladder and the house components. Use before creating or editing a Filament resource, page, table, schema, form, action, widget or Blade view."
---

> Scope (dlhouse/guidelines 0.2.2): in DL Group apps, Filament Storybook and the starter's themes govern screens and look. Use this skill only where Storybook is silent; where they disagree, Storybook wins. See "Scope" in the DLHouse core guideline.

# DLHouse screens

Every screen starts by naming its pattern and the lowest ladder rung that builds it. The patterns are the floor plans; this skill carries the pattern table, the shared rules and the ladder, and the Screen Pattern Guide beside it carries the full anatomy of each pattern. Read the guide's section for the pattern before building it.

## When to use this skill

Creating or changing any Filament resource page, custom page, table, schema, form, action, widget, notification or Blade view; adding a house component; deciding how a screen is built.

## First, declare the pattern

Each screen declares exactly one pattern, P1 to P6, once, in the searchable form the lead agent fixed in Wave 0 (G2; the paper source suggests a PHP attribute on the page class naming the pattern). A screen that fits none of the six is a design question for the design owner, not a one-off: stop and ask. Never mix two patterns on one screen.

| Pattern | Use when | Don't use for | Lowest rung |
| --- | --- | --- | --- |
| P1 List and data table | Find, scan, filter or compare many records of one type | Approving (P4), reconciling two lists (P6), one record's detail (P2) | 1: resource list page |
| P2 Detail view | Open any numbered document, including posted and voided ones; the auditor's main screen | Entering a Draft (P3), deciding an approval (P4) | 1: resource view page; chain strip, evidence and history as house components if the plain schema can't show them |
| P3 Two-column form | Prepare a Draft at a desk, keyboard first | Encoding on tablets, settings, three-step-plus flows (wizard, later) | 1: resource create and edit pages |
| P4 Approval inbox | An approver decides submitted items, tablet first, in under a minute | Browsing history (P1), the owner's quarterly review (later pattern) | 2: custom page |
| P5 Evidence capture | Photograph paper and attach it to the right record in three taps | Bulk import, entering figures (P3) | 2: custom page |
| P6 Matching and reconciliation | Two lists must tie out to ₱0.00 or every remainder explained | A single list (P1), approving the result (P4) | 2 at best; likely 4 after the December spike (S1) |

## Rules every screen follows

- Page header: title, document number, status (word and shape), active company, and the one primary action, always in the same place. One primary button per screen; destructive or irreversible actions are never primary and always confirm.
- Active company on every screen; a company switch reloads the screen and clears unsaved work after a warning (GEN-10). Never show another company's records.
- Show only the actions this user may take now; the server re-checks every action; the screen is never the control.
- A lock explains itself in plain words naming the rule ("Input VAT needs the supplier's VAT Invoice"), never a code.
- Computed amounts (VAT, withholding, totals, journal preview) come from `dlhouse/rules` and can never be typed over.
- Compact on desks (28 px rows), comfortable on tablets (44 px targets), detected by input type, user can override; the order and meaning never change between them; tablets get no hover-only information.
- Amounts right-aligned with tabular numerals, negatives in parentheses, peso sign in the column header, a double rule under final totals. Dates in one format; document date and posting date labeled separately whenever both exist.
- Statuses show as pills with word and shape; progress states as plain text beside the pill, never instead of it. Alarms are a ▲ with text; locks a ■ with the rule in words.
- Any record with an attachment shows a thumbnail count; one tap opens it.
- Screen text only from language files, using glossary terms (F7). Every printed or exported report carries "Internal management report" (CLS-09).
- WCAG 2.2 AA: keyboard reachable, visible focus ring never removed, a label on every field, touch targets at least 44 px on tablets; reviewed in light and dark before approval.
- Never: delete from a list (GL-02, GL-06); bulk-approve; let a maker approve (GEN-01); let a posting date fall in a closed period (GL-05); let Submit through with missing evidence or a failing check (GL-01, PUR-02, PUR-03).

## Pattern essentials

P1: header with the primary action; saved views as tabs (All, Draft, Submitted, Posted, Voided, plus the type's own views such as "2307 not yet received"); search then filters with removable chips; columns number, date, partner, status, then amounts last and right-aligned; totals row for the filtered set; alarm column with icon and text; an empty state that says why and offers the primary action. Sort by document date newest first; keep the filter when returning from a record; exports carry the internal label and are logged. Tablets drop to number, partner, status and amount.

P2: header with number, status, both dates and only the allowed actions (Submit, Post, Void, Reverse); the document chain strip before and after, each link showing its status (house component, S2); summary with VAT and withholding shown separately and an alarm banner if flagged; lines with totals; the journal entry posted or to be posted; evidence thumbnails with who and when; history of every status change and event from the audit log. A voided document stays fully readable with its reason and a link to its replacement; a reversed one links to its reversing entry. Never hide the journal entry or history from anyone who can see the document.

P3: left column the document (partner, document date, references, a lines grid that moves cell to cell with Tab and Enter); right column the checks (totals from `dlhouse/rules`, journal preview, required evidence checklist, live warnings such as "Expected withholding ₱2,000; entered ₱2,240"); action bar fixed at the bottom with Save draft and the one primary action. Unsaved changes warn before leaving; amount fields take numbers only. House fields: `PesoInput`, `TinInput`.

P4: the queue, oldest first, each card with type, number, partner, amount (large), maker, days waiting and why it is here ("₱50,000 or more", "new payee", "void"); a short P2 as the decision page with evidence, journal entry and, for vouchers, the three-way match and withholding; a decision bar fixed at the bottom with Approve (primary) and Reject (reason required) and nothing else; the next item opens automatically. Re-authenticate for ₱50,000 or more on tablets (S11); show "also needs Final approver" when a second approval follows; escalate after 2 business days (GEN-08); a delegate sees the delegation's end date. Never show an item the user made or one beyond their tier; never approve from a notification without opening the decision page.

P5: choose the record (search, or pick from "waiting for evidence"); choose the evidence type from a short list; take the photo or pages with crop and readability check; confirm and save. The original image is stored unaltered with who, when and device; images live on the server, never on the tablet; a wrong attachment is marked superseded with a reason, never deleted. Evidence capture never changes an amount and never marks a 2307 Received or a delivery receipt signed without its image.

P6: header with what is being reconciled, the period, both totals and the difference, large; matched pairs folded with a count; unmatched items each with a next step (match manually, create the missing entry, mark as a reconciling item with a reason); reconciling items aged, outstanding checks past 90 days flagged (S17); Save draft and Submit for review. Auto-match on exact references first (voucher number in the bank's reference field), then amount and date, never amount alone; every manual match logs who and why. Desk only for the work; the reviewer reads the result on a tablet. Never let the Cashier reconcile (CSH-01, CSH-07); never force a match; an unknown bank debit is an alarm until explained (PAY-08).

## The custom screen ladder (F10)

1. A resource page.
2. A custom page from Filament schemas, tables, actions and widgets.
3. A Blade view using only Filament and DLHouse components.
4. A new DLHouse Blade component in `dlhouse/ui`, using tokens only.
5. Raw markup or a view override, approved by the design owner (Joseph de Leon) and logged.

Stop at the first rung that works, and say in the branch which rung you used. Upgrade-safety order: configuration, then theme CSS, then a wrapped component, then a view override as the last resort.

## House components (`dlhouse/ui`)

Built once in `dlhouse/ui`, never inside an app: the document chain strip (S2), the P4 decision bar if Filament's action layout cannot fix it to the bottom on tablets, the P5 guided flow if the plain form feels slow, and the matching component if the December spike says two Filament tables are clumsy (S1). Anything borrowed from a third-party kit is rebuilt as our own component on DLHouse tokens, passes the light and dark contrast checks, and records its source license (F11).

## Before using any Filament or Livewire API

Check it with Boost's Search Docs tool for Filament 5.x and Livewire 4.x. Filament v5 has v4's features plus Livewire 4 support; confirm exact APIs at build time rather than from memory.

## Pattern map for the accounting app

Every document uses P1, P2 and P3; P4 where its chain needs approval (memos, payment vouchers, manual journal entries, landed cost sheets, cash advances and liquidations, voids and reversals), P5 where paper arrives (delivery receipts, Invoice copies, 2307s, deposit slips, supplier VAT Invoices, bank advices, return slips, import papers, receipts), P6 where two lists tie out (collections against Invoice Records and bank lines, three-way match, bank and e-wallet reconciliation, withholding reconciliation, intercompany). The full map is in the guide.

## References (in this folder)

- `references/DLHouse_Screen_Pattern_Guide.md` (0.2): full anatomy, use-when and never lists for P1 to P6, the pattern map, decisions S1 to S4
- `references/DLHouse_Document_Lifecycles.md` (0.4): the chains each screen serves
