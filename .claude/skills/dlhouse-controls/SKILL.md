---
name: dlhouse-controls
description: "DLHouse rules for internal controls in a DLHouse app: the 84 controls in Control Register 0.5 as locks, alarms and habits, the approval matrix and ₱50,000 tiers, the bank release matrix, segregation of duties, roles and conflicting pairs, the settings register S01 to S47, security (MFA, lockout, encryption, audit log), registration status and report labels. Use when anything touches approval, permissions, roles, periods, evidence, settings, reports, exports or security."
---

# DLHouse controls

Every control in Control Register 0.5 is a lock, an alarm or a habit. Agents build locks and alarms, each with a test named by its control ID, and never decide a regulated rule themselves. The register beside this file is the full list with risk, owner, frequency and evidence; the Settings Register holds every value; Company Policies say how people are expected to behave around the controls.

## When to use this skill

Anything that grants, checks or changes a permission; any approval, release, void, close or reopen; any evidence requirement; any setting; any report, export or print; any sign-in, session, encryption or audit-log concern.

## What the agent builds, by control type

| Type | What the agent builds | Test |
| --- | --- | --- |
| Lock (preventive) | The server refuses the action and explains the rule in plain words; the screen also hides or disables it | Proves the refusal, named for the control, such as `GL-02 posted record can't be edited` |
| Alarm (detective) | A flag on the record and in its list view, plus the alarm list at close | Proves the alarm is raised and cleared |
| Habit (people) | Only the report or checklist the habit needs, labeled "Internal management report" (CLS-09) | Proves the report renders with its label |

The server re-checks every action; the screen is never the control.

## Roles

Seven roles, granted per company: Encoder, Accountant, Finance approver, Final approver, Cashier, Admin, Auditor. Owners are a person attribute, not a role; they act through roles. The second owner holds Final approver and is the independent check on the admin-owner. The admin-owner has two logins: admin with no financial rights, owner with no admin rights and no approver role anywhere (GEN-06). Names of who holds which role in which company are company settings (Settings Register 0.4 staffing grid), never code.

| Role | Prepare | Post | Approve | Hold cash | Reconcile | Manage users |
| --- | --- | --- | --- | --- | --- | --- |
| Encoder | Yes | No | No | No | No | No |
| Accountant | Yes | Routine entries only | No | No | Yes | No |
| Finance approver | No | No | First level | No | Reviews | No |
| Final approver | No | No | High value, periods | No | Signs off | No |
| Cashier | Receipts only | No | No | Yes | No | No |
| Admin | No | No | No | No | No | Yes |
| Auditor | No | No | No | No | No | No |

Conflicting pairs the app warns about on assignment (GEN-02), with the owner's acceptance logged: never Cashier with Encoder or Accountant, Cashier with any approver, Admin with any approver, alternate releaser with any app role, Data Protection Officer with Admin, bank maker with releaser for the same payment; allowed with compensating review, Encoder with Accountant; avoid, Accountant with Finance approver.

## Controls every module touches

- GEN-01: no one approves their own work, including through a delegation (GEN-07); no one approves or releases a payment to themselves (PAY-04). Always a lock.
- GEN-03, GEN-04: changes to financial roles need the second owner; the Admin never grants roles to themselves; every permission change alerts the second owner instantly.
- GEN-07: delegations carry start and end dates. GEN-08: approvals waiting more than 2 business days escalate (S12).
- GEN-09: auditor accounts are read-only, time-limited (S39), own MFA; exports logged.
- GEN-10: every record belongs to one company; entries post only to the active company; tested at the data layer.
- GL-01 to GL-08: evidence before posting; posted records never edited or deleted; manual entries explained, attached and approved by someone else; journal-entry alarms (weekend or holiday postings, round amounts, unusual users, rarely used accounts) reviewed at close; balanced entries in open periods; gap-free numbering; new accounts approved, used ones deactivated; posting-rule changes need the accountant and a Class B release.
- CLS-02, CLS-03: In close restricts posting to the Accountant's adjusting entries; only the Final approver closes or reopens, with a reason and an alert to the second owner.
- CLS-09: every report and export labeled internal. ITC-11: registration status (S45) gates invoice issuance and official labels.

## Approval matrix

One line at ₱50,000 runs through the matrix: below it the Finance approver decides; at or above it the Final approver also approves. Each line is a separate company setting (S01 to S07) compared against the document total including VAT (H1); lowering a line is always allowed, raising one needs the second owner. Never hard-code an approver, a name or a limit.

| Action | Below ₱50,000 | ₱50,000 or more | Also required |
| --- | --- | --- | --- |
| Routine entries matched to a source document | None; the Accountant posts | None; the Accountant posts | Source document attached |
| Manual journal entries | Finance approver | Finance, then Final approver | Explanation and attachment |
| Payment vouchers | Finance approver | Finance, then Final approver | Three-way match; call-back for new payees |
| Purchase orders | Finance approver | Finance, then Final approver | — |
| Credit memos, debit memos, discounts, stock write-offs | Finance approver | Finance, then Final approver | — |
| Voids and reversing entries | Finance approver | Finance, then Final approver | Reason required |
| Landed cost sheets | Finance approver | Finance approver | Every cost component evidenced (C2) |
| Bad-debt write-offs | Final approver | Final approver | Provision matrix support |
| New customers and suppliers | Finance approver | Finance approver | One record per TIN and branch code |
| New payees and bank-detail changes | Finance approver | Finance approver | Call-back verification (PAY-02) |
| Credit limit changes and overrides | Final approver | Final approver | — |
| New accounts | Finance approver | Finance approver | Prepared by the Accountant |
| Posting rule changes | Accountant | Accountant | Class B release |
| Financial-role access changes | Second owner | Second owner | Made by the Admin, never for themselves |
| Opening balances | Final approver | Final approver | External accountant's review first |
| Closing or reopening a period | Final approver | Final approver | Reason to reopen |
| Discount authority at quotation | Percentage tiers in settings | Percentage tiers in settings | Set with the sales module |

Recurring contract payments such as rent keep two approvals each month (H2). Re-authentication on tablets for approvals of ₱50,000 or more (S11).

## Payments and bank release

Two gates: approval in the app (a payment voucher), then release in the bank portal by someone other than the preparer, with the voucher number in the bank's reference field (PAY-03). The release matrix (routine below ₱50,000: the company's releasers or the admin-owner's owner login; ₱50,000 or more, new payee or changed bank details: the company's senior releaser or second owner; to the admin-owner or a related party: the second owner only; to the second owner or her relatives: Finance approver approves, admin-owner releases, listed in the quarterly pack; a linked intercompany payment below ₱50,000: either of the company's releasers, with both sides recorded; ₱50,000 or more while the second owner is away: the alternate releaser, existing verified payees only, within the cap; a payment you prepared: never you) is configured per company from the Settings Register, not coded. The app records the release (progress Released) and matches bank debits to vouchers; unmatched debits raise an alarm (PAY-08). Split-payment alarm: two or more payments to one payee within 7 days (S10) that together reach ₱50,000 (PAY-05). Alternate releaser use is reported the same day and capped (S08, S09; PAY-07). Advances to suppliers need the proforma invoice and an approved purchase order attached or Submit is refused (PAY-09), and are flagged after 60 days unmatched (PAY-10, S42).

## Cash

The Cashier holds money and never records or approves; the Encoder records collections (CSH-01). Collections deposited intact daily and matched to the deposit slip and bank line (CSH-03); recorded within 1 business day (S13) and applied to specific Invoice Records (CSH-04); unapplied collections are a liability with a 30-day alarm (S16). Post-dated checks on a due-date list; a bounce reverses the collection (CSH-06). Bank reconciliation monthly by someone who doesn't handle cash, reviewed by the Finance approver, signed off by the second owner, outstanding checks past 90 days flagged (CSH-07, S17). Petty cash is a fixed fund with a single-payment limit (S24 to S26); cash advances liquidated within 5 business days (S18) and approved by someone other than the employee (CSH-08). E-wallets are company accounts for collections only; the only outflow is a sweep to the company's bank at least weekly (S41); reconciled monthly by someone without the login (CSH-09).

## Sales, purchases, tax, close

SAL-01 to SAL-12 (Invoice Record links to delivery receipt and booklet serial; register of every serial; delivered-not-invoiced accrual; memo tiers; approved customers; credit limits by the Final approver; provision matrix; write-offs by the Final approver; input-tax phrase; exemption documents; retention tracked to warranty end). PUR-01 to PUR-04 (purchase order tiers; three-way match before a voucher; input VAT only from a VAT Invoice or customs papers; received-not-invoiced accrual). TAX-01 to TAX-05 (expected withholding; 2307 chase; quarterly reconciliation; VAT categories kept separate; rates in settings changed only after written verification). CLS-01 to CLS-12 (close calendar; In close; period lock; balance-sheet reconciliations; intercompany nets to zero; inventory valuation and year-end count; forex revaluation with rates never edited; opening balances once; internal label; owners' review pack; group charges under written agreements; fixed-asset register, monthly depreciation, yearly count, disposals by the Final approver).

## Security and data (ITC)

MFA for every user; lockout after 5 failed sign-ins for 15 minutes (S37); idle logout 30 minutes on desks and 10 on tablets (S38) (ITC-01). The audit log is append-only, tamper-evident, copied off-site daily, and no one, including the admin, can edit it (ITC-02). Production data changes only through the app (ITC-03). Releases are classed A (cosmetic), B (affects records, reports or books), C (new module) and logged with their version (ITC-04). TINs, bank details and government IDs are encrypted in the database (ITC-06). Records are kept 10 years, never hard-deleted, with a legal hold flag (S36). Device type is never a security control; role permissions are.

## Settings

Every number the app uses to decide something lives in the settings register (S01 to S47) with an owner, an approver, a safe range the app enforces (R5), an effective date, and a log of old value, new value, who proposed, who approved; changes never apply backwards; the second owner is alerted. A change that weakens a control needs the second owner whatever the register says. Nobody approves a change they proposed. Regulated values change only after written verification. The full table of starting values is in the Settings Register reference.

## Stop and ask

A control the register does not cover; a regulated rule not answered in the Layer 1 documents; any item marked ⚠️ that the code would have to treat as settled; any change to the approval or release matrices; any report that could be mistaken for official books.

## References (in this folder)

- `references/DLHouse_Control_Register_and_Approval_Matrix.md` (0.5): all 84 controls with risk, type, owner, frequency and evidence; approval and bank release matrices; segregation of duties
- `references/DLHouse_Settings_Register_and_Staffing_Grid.md` (0.4): S01 to S47 with starting values, owners and approvers; staffing grid; conflicting pairs; coverage
- `references/DLHouse_Company_Policies.md` (0.4): POL-01 to POL-18, what people are expected to do around each control
- `references/DLHouse_Executive_Summary.md` (Revision 5): the group, roles, thresholds, bank release rules, hosting and security
