# DLHouse Settings Register and Staffing Grid 0.4

Oct 20, 2026 · @Joseph de Leon

The settings register is the fuse box: every threshold, rate and number of days the app reads, in one place, with its starting value and who may change it. The staffing grid is the key list: who holds which role, checked for conflicts on paper before anyone gets a login.

## About this document

- **Version and status:** 0.4, draft for review, October 20, 2026.
- **Precedence:** regulation, then the DLHouse Executive Summary (Revision 5), then this document. Terms follow Glossary 0.7; settings come from the Control Register 0.5 and Company Policies 0.4.
- **Layer:** Layer 1, business guidance and truths (the fuse box and key list). The structure is a house default; the values and names are company settings.
- **Scope:** every setting is kept per company unless marked "group."
- **Starting values:** recommendations to calibrate against the parallel-run data in June 2027.

## Best practices

These are house defaults for every DLHouse app.

**For settings:**

1. **One register, no hardcoding.** Every number the app uses to decide something lives here and in the app's settings, never in code or screen text.
2. **Each setting has an owner and an approver.** The owner proposes changes; a second person approves the ones that weaken a control.
3. **Changes are logged with an effective date and never applied backwards.** A new threshold applies from its date; past approvals stand.
4. **Values are checked against a safe range.** The app refuses a value outside the range (for example, an approval line of zero), so a typo can't switch a control off.
5. **Regulated values need written verification first.** A tax rate changes only after the accountant confirms it in writing, citing the rule.

**For staffing:**

1. **Map people to roles on paper before anyone gets a login.** Conflicts are cheaper to fix in a grid than in the app.
2. **Keep the four duties apart:** authorizing, recording, holding cash and reconciling. Where a small team can't, name the compensating control.
3. **Every role has a backup.** No step in the books depends on one person being at work.
4. **Mandatory leave.** Everyone who handles cash or records transactions takes at least 5 consecutive business days off each year while someone else does their work. This is one of the most effective fraud-detection controls, because schemes that need daily tending surface during the absence.
5. **Review the grid at every staffing change** and with the quarterly user-access review.

## Settings: approval and release lines

Every line starts at ₱50,000 but is a separate setting, so one can move without the others; lowering a line is always allowed, raising one needs the second owner. Every line compares the document total including VAT (decision H1).

| # | Setting | Starting value | Changed by | Approved by | Source |
| --- | --- | --- | --- | --- | --- |
| S01 | Manual journal entry line | ₱50,000 | Admin | Second owner | GL-03 |
| S02 | Payment voucher line | ₱50,000 | Admin | Second owner | PAY-01 |
| S03 | Purchase order line | ₱50,000 | Admin | Second owner | PUR-01 |
| S04 | Credit memo, debit memo, discount and stock write-off line | ₱50,000 | Admin | Second owner | SAL-05 |
| S05 | Void and reversing entry line | ₱50,000 | Admin | Second owner | GL-02 |
| S06 | Bank release line | ₱50,000 | Admin | Second owner | PAY-03 |
| S07 | Intercompany release line | ₱50,000 | Admin | Second owner | POL-14 |
| S08 | Alternate releaser's cap per payment | ₱250,000 (pending the second owner's written confirmation) | Admin | Second owner, in writing | PAY-07 |
| S09 | Alternate releaser's cap per absence | ₱1,000,000 (pending, as above) | Admin | Second owner, in writing | PAY-07 |
| S10 | Split-payment alarm window | 7 days | Admin | Second owner | PAY-05 |
| S11 | Tablet re-authentication for approvals | ₱50,000 or more | Admin | Second owner | POL-01 |
| S12 | Approval escalation | 2 business days | Admin | Finance approver | GEN-08 |

## Settings: timing, credit, cash, accounting, tax and security

Tax and accounting values change only after the accountant confirms them in writing; security values are group-wide.

| # | Setting | Starting value | Changed by | Approved by | Source |
| --- | --- | --- | --- | --- | --- |
| S13 | Invoice Record and collection recording | 1 business day | Admin | Finance approver | POL-03 |
| S14 | Supplier invoice recording | 3 business days | Admin | Finance approver | POL-03 |
| S15 | Close calendar | 5 business days (range 5 to 10; set after the parallel run) | Admin | Final approver | CLS-01 |
| S16 | Unapplied collection alarm | 30 days | Admin | Finance approver | CSH-05 |
| S17 | Outstanding-check flag | 90 days | Admin | Finance approver | CSH-07 |
| S18 | Cash advance liquidation | 5 business days after the activity | Admin | Finance approver | POL-09 |
| S19 | Standard credit terms | 30 days | Admin | Final approver | POL-04 |
| S20 | Credit hold for overdue business customers | Over 60 days past due | Admin | Final approver | POL-04 |
| S21 | Return window | 30 days from delivery | Admin | Finance approver | POL-06 |
| S22 | Bad-debt write-off age | Over 1 year past due | Admin | Final approver | POL-07 |
| S23 | Provision matrix rates (business and government) | To calibrate with the accountant | Accountant | Final approver | SAL-08 |
| S24 | Petty cash fund | ₱10,000 | Admin | Finance approver | POL-08 |
| S25 | Petty cash single-payment limit | ₱1,000 | Admin | Finance approver | POL-08 |
| S26 | Petty cash replenishment trigger | Below 30% of the fund, or month-end | Admin | Finance approver | POL-08 |
| S27 | High-value spot counts | Monthly | Admin | Finance approver | POL-13 |
| S28 | VAT rate | 12% ⚠️ | Accountant | Finance approver, after written verification | TAX-05 |
| S29 | Government withholding on goods | 5% creditable VAT plus 1% expanded ⚠️ | Accountant | Finance approver, after written verification | TAX-01 |
| S30 | Payor withholding rates | Pending the accountant ⚠️ | Accountant | Finance approver, after written verification | PAY-06 |
| S31 | Exchange rate source | BSP reference rate | Accountant | Final approver | CLS-07 |
| S32 | Reporting framework | PFRS for Small Entities | Accountant | Final approver | Summary |
| S33 | Costing method | Weighted average | Accountant | Final approver | D13 |
| S34 | Fiscal year | Calendar year | Accountant | Final approver | Summary |
| S35 | Number series | `CO-TYPE-YYYY-000001`, reset each fiscal year; type codes IR, COL, CM, DM, SI, PV, JE, LCS, CA | Admin | Final approver | D3 |
| S36 | Record retention | 10 years | Admin | Data Protection Officer and Final approver | POL-15 |
| S37 | Sign-in lockout (group) | 5 failed sign-ins, locked for 15 minutes | Admin | Second owner | ITC-01 |
| S38 | Idle logout (group) | 30 minutes on desks, 10 on tablets | Admin | Second owner | ITC-01 |
| S39 | Auditor account lifetime (group) | Up to 90 days per engagement | Admin | Second owner | GEN-09 |
| S40 | Backup restore test (group) | Quarterly | Server primary | Second owner | ITC-05 |
| S41 | E-wallet sweep interval | 7 days | Admin | Finance approver | CSH-09 |
| S42 | Supplier advance alarm | 60 days unmatched to a shipment | Admin | Finance approver | PAY-10 |
| S43 | Retention release alarm | 30 days after the warranty end date | Admin | Finance approver | SAL-12 |
| S44 | Company type | Operating, property, holding or services (one or more per company); sets the account profile | Accountant | Final approver | Chart of Accounts 0.4; GL-07 |
| S45 | Registration status | Internal control (all five companies); later "CAS registered" or "CAS registered with e-invoicing" | Admin | Second owner, after the accountant's written confirmation | BIR Readiness Map; ITC-11 |
| S46 | Capitalization threshold | ₱20,000; portable items below it go on the custody list | Accountant | Final approver | POL-16 |
| S47 | Useful lives by asset class | Vehicles 5 years; equipment 5; computers and tablets 3; furniture 5; buildings 25; leasehold improvements shorter of lease or 5; land none ⚠️ | Accountant | Final approver | POL-16 |

## How settings change

A setting change is a document like any other: proposed, approved by someone else, logged and dated.

1. The owner proposes the change with a reason and an effective date.
2. The approver in the register approves it; nobody approves a change they proposed.
3. The Admin enters it; the app checks it against its safe range and refuses anything outside it.
4. The change is logged with the old value, the new value, who proposed, who approved and the effective date, and the second owner is alerted.
5. The new value applies from its effective date; nothing already approved or posted is re-judged.

**Always:** a change that weakens a control (raising a line, lengthening a deadline, loosening security) needs the second owner, whatever the register says.

## Staffing grid

Five people are named; the Encoder, Accountant and Cashier are still to be named for each company.

| Person | App roles | Bank rights | Other duties | Conflict check |
| --- | --- | --- | --- | --- |
| Arielle de Leon (second owner) | Final approver | Releases ₱50,000 or more, new payees, related parties; signs off bank reconciliations | Quarterly access and admin reviews | Clear: never encodes |
| Josephus B. de Leon | Admin (admin login only) | Owner login releases routine payments below ₱50,000 | Server primary; design owner; Merritmed's sole proprietor; Agno treasurer; Arima officer | Clear under compensating controls GEN-06, ITC-03, ITC-09 |
| Margaret DL Laforteza | Finance approver | None | Owner of POL-03, POL-08 to POL-11, POL-13 | Clear if she never handles cash or prepares entries |
| Jose Mahatma de Leon | None | Alternate releaser within the cap; server backup (break-glass only) | — | Clear if he never prepares or approves payments |
| Arielle de Leon | None | None | Data Protection Officer | Clear: not the admin-owner |
| Lorelai (Agno employee; Encoder for all five companies, with a time-share contract with each) | Encoder | None | — | Must not be the Cashier |
| Leslie (Accountant for all five companies; CPA board exam pending) | Accountant | None; prepares bank transfers as maker | Bank and balance-sheet reconciliations; surprise petty cash counts | Must not be the Cashier or an approver |
| Per company: Agno, Merle Tapiador; Blasmorisson, Shie Raet; Merritmed, Jessa Palaca; Arima and Florminsons, none yet (bank transfers only until named) | Cashier | None | Petty cash custodian; blank-check custodian | Must not record or approve |
| External accountant | Auditor (read-only, time-limited) | None | Reviews opening balances | Clear |
| External auditor | Auditor (read-only, time-limited) | None | Reviews the control register yearly | Clear |

**Owners and approvers per company.** The group is a family group of separate companies, so owners, the Final approver and bank releasers are named per company, not once for the group. Names marked "to name" are due with the staff names by November 30, 2026.

| Company | Legal form | Owners | Final approver | Bank releasers | Joseph de Leon's role |
| --- | --- | --- | --- | --- | --- |
| Merritmed Medical Supplies | Sole proprietorship, VAT-registered; operating | Joseph de Leon | Arielle de Leon (second owner), under written authority from Joseph de Leon (not Joseph: his owner login holds no approver role, GEN-06) | Joseph de Leon releases; the Accountant prepares each transfer as maker. No second signatory for now: payments of ₱50,000 or more and Joseph's drawings are approved in the app by Arielle de Leon first | Sole proprietor; takes drawings, no salary |
| Agno Metal Trade Corp. | Corporation, VAT-registered; operating | Florence de Leon (President), Jose Mahatma de Leon (Vice President), Joseph de Leon (Treasurer), Margaret DL Laforteza, Gret DL Baltazar and Arielle de Leon; stockholdings to confirm | Recommended: Florence de Leon (President); never Joseph (GEN-06) | Recommended: Florence de Leon and Jose Mahatma de Leon; Joseph's owner login for routine payments below ₱50,000 | Treasurer (officer) |
| Arima Corporation | Corporation, VAT-registered; operating | Arielle de Leon (President), Margaret DL Laforteza (Treasurer, without cash custody), Joseph de Leon (officer); stockholdings to confirm | Recommended: Arielle de Leon (President) | Recommended: Arielle de Leon; Joseph's owner login for routine payments below ₱50,000; never Margaret DL Laforteza (Finance approver) | Officer |
| Holding and property company | Corporation (planned) | To decide | To decide | To decide | To decide |
| Florminsons Corp. | Corporation, VAT-registered; operating | Jose Mahatma de Leon and Arnold (co-owner outside the family; surname to add) | Recommended: Jose Mahatma de Leon | Recommended: Jose Mahatma de Leon and Arnold | None |
| Blasmorisson Commercial | Sole proprietorship, VAT-registered; operating | Diana de Leon (sole proprietor) | Diana de Leon, except her own drawings, which the Finance approver approves in the app | Diana de Leon releases; the Accountant prepares each transfer as maker. No second signatory for now | None |

**Confirmed October 20, 2026:** Joseph de Leon is Josephus B. de Leon, the admin-owner. Merritmed's Final approver is therefore someone else, Joseph's drawings go through a payment voucher approved by Arielle de Leon before he releases them (see the sole proprietorship decision below) (GEN-06, PAY-03, PAY-04).

**Cross-company roles to watch:**

- **Jose Mahatma de Leon** owns Florminsons and is Agno's Vice President, so he is no longer independent everywhere. As alternate releaser he acts only for companies where he holds no role and for payees that are not Florminsons; at Florminsons and Agno he acts in his own right.
- **Arielle de Leon** is Arima's President and the group's Data Protection Officer; the two roles do not conflict, since the Data Protection Officer only has to be separate from the Admin.
- **Payments between group companies are related-party payments** whoever co-owns them, including Florminsons with its co-owner outside the family; charges follow CLS-11 at market rates.
- **Resolved October 20, 2026:** Margaret DL Laforteza is the group Finance approver, Arima's Treasurer and an Agno stockholder. She stays Finance approver for every company; at Arima her Treasurer title stays, but custody of cash and checks goes to the Cashier and she does not release bank payments, because a Finance approver never handles cash.
- **Arielle de Leon is the second owner** (named October 20, 2026), as well as Arima's President and the Data Protection Officer. Because she releases Arima's payments, Arima's monthly bank reconciliation is signed off by Florence de Leon instead (CSH-07).
- **Sole proprietorships without a second signatory (decided October 20, 2026):** at Merritmed and Blasmorisson the owner is the only bank signatory for now. Two-person release still holds (the Accountant prepares as maker, the owner releases). Compensating controls: every payment of ₱50,000 or more and every owner drawing is approved in the app before release, and Arielle de Leon reviews each sole proprietorship's bank statement monthly against approved vouchers (PAY-08). Revisit when the credit lines are applied for.

## Conflicting role pairs

The app warns whenever one person is given a pair below; "never" pairs should not be accepted at all, and the rest need the named compensating control.

| Pair | Why it conflicts | Allowed? | If combined, compensate with |
| --- | --- | --- | --- |
| Cashier with Encoder or Accountant | Whoever holds the money could hide its theft in the records | Never | — |
| Cashier with any approver | Could take money and approve the cover | Never | — |
| Admin with any approver | Could change the system and approve money | Never (the builder's two logins solve this) | — |
| Alternate releaser with any app role | The stand-in stops being independent | Never | — |
| Data Protection Officer with Admin | Would judge breaches of their own system | Never | — |
| Encoder with Accountant | The same person prepares and posts | Allowed in a small team | Finance approver reviews a weekly list of entries the same person prepared and posted |
| Accountant with Finance approver | Prepares and approves | Avoid | The app still blocks approving own work; the second owner reviews a monthly list of that person's entries |
| Bank maker with bank releaser for the same payment | One person moves money alone | Never for the same payment | — |

## Coverage and mandatory leave

Every role has a backup who keeps the separation of duties intact; where no clean backup exists, the work waits or the external accountant steps in.

| Role | Backup | Limits while covering |
| --- | --- | --- |
| Encoder | Accountant | Entries the Accountant both prepares and posts go on the weekly review list |
| Accountant | External accountant, through a temporary account | Postings may wait up to 5 business days; longer absences use the external accountant |
| Cashier | Recommended rotation: Merle Tapiador covers Merritmed, Jessa Palaca covers Blasmorisson, Shie Raet covers Agno; each granted the Cashier role at the other company only for the cover dates | Never the Encoder or Accountant; deposits and counts continue daily |
| Finance approver | Second owner, as delegate | Below ₱50,000 only; items at ₱50,000 or more wait for the escalation period, and urgent ones are approved by the second owner and logged as exceptions |
| Final approver | No delegate in the app | Items wait; bank releases use the alternate releaser within the cap |
| Admin and server primary | Jose Mahatma de Leon, break-glass only: sealed credentials held by Arielle de Leon, every use logged and reported to her the same day; trained on the runbook with one practice restore before go-live | Emergency access only, logged and reported to the second owner |

**Mandatory leave:** the Encoder, Accountant and Cashier each take at least 5 consecutive business days off every year, during which their backup does the work. Schedule these so two of them are never away at once.

## Decisions on open questions

All five were decided on October 20, 2026; R1 and R3 are completed once the names are in the grid.

| # | Question | Decision | Status |
| --- | --- | --- | --- |
| R1 | Who are the Encoder, Accountant and Cashier at each company? | Named in the grid before the build starts in December 2026, so the conflict check runs on real people | Decided; names due by November 30, 2026 |
| R2 | Do staff serve more than one group company? | Allowed; roles are granted per company and the conflict check runs per company | Decided |
| R3 | Who covers the Cashier? | A staff member outside accounting, named in the grid | Decided; name due with R1 |
| R4 | Is mandatory leave acceptable to the team? | Yes, announced with the policies and scheduled at the start of each year | Decided |
| R5 | Are the safe ranges for each setting defined? | Written during the build, one per setting, reviewed by the second owner | Decided; during the build |

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.4 (update) | October 21, 2026 | Precedence line updated to the current versions of the Executive Summary and related documents; no content change. |
| 0.4 (update) | October 20, 2026 | Added S45 Registration status (BIR Readiness Map 0.1). |
| 0.4 (update) | October 20, 2026 | Added S44 Company type; recorded Joseph de Leon as the admin-owner and Merritmed's sole proprietor, with Merritmed's Final approver and second signatory as other people. |
| 0.4 | October 20, 2026 | From Chart of Accounts 0.3: added S41 e-wallet sweep (7 days), S42 supplier advance alarm (60 days), S43 retention release alarm (30 days after warranty end); added owners and approvers per company, with Joseph de Leon's roles. |
| 0.3 | October 20, 2026 | From Worked Examples 0.2: approval and release lines compare totals including VAT (H1); S35 lists the document type codes. |
| 0.2 | October 20, 2026 | R1 to R5 decided: staff names due by November 30, 2026, staff may serve several companies with per-company roles, a Cashier backup outside accounting, mandatory leave, safe ranges written during the build. |
| 0.1 | October 20, 2026 | First draft: 40 settings (S01 to S40), staffing grid, conflicting role pairs, coverage and mandatory leave, open questions R1 to R5. |
