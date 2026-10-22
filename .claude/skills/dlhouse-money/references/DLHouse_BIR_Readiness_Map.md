# DLHouse BIR Readiness Map 0.1: CAS and E-Invoicing

Oct 20, 2026 · @Joseph de Leon

The first app is built so any group company can later register it with the BIR as a computerized accounting system (CAS) and issue e-invoices through the BIR's Electronic Invoicing System (EIS) without a rebuild. This map lists each requirement and the DLHouse feature or control that meets it.

## About this document

- **Version and status:** 0.1, draft for review, October 20, 2026.
- **Precedence:** regulation, then the DLHouse Executive Summary (Revision 5), then this document. Terms follow Glossary 0.7; controls follow the Control Register 0.5.
- **Layer:** building code. Registration-readiness is a house default for every DLHouse app; whether and when a company registers is its own decision.
- **Position today (agreed with the accountant, October 20, 2026):** no group company is covered by e-invoicing or needs to register the app, because Invoices stay handwritten and the app keeps no official books. Written memos per company are to be filed.
- **Replaces:** the planned "BIR requirements map from the current Annex B." When the accountant obtains the current Annex B (Standard Functional and Technical Requirements) from the RDO, its items are checked against this map line by line.
- **Every requirement here is our reading of public sources ⚠️** and is verified with the accountant before registration.

## What the rules require

CAS registration and e-invoicing are separate steps, but for us they come as a pair: a company that registers the app to issue invoices joins the mandatory e-invoicing group.

**CAS registration ⚠️**

- A taxpayer that wants to keep its books or issue invoices with a computerized system registers the system with its RDO and receives an **Acknowledgement Certificate**; the old Permit to Use and system demonstration are no longer required, though an RDO may still ask for a walkthrough.
- Typical documents: a sworn statement with the summary of system description, sample printouts of invoices and books of accounts, a printed audit trail, and the signed **Standard Functional and Technical Requirements (Annex B)**.
- Underlying rule (RR 9-2009): the electronic records must show an audit trail from each source document to the summarized accounts, and be usable with BIR audit software.
- Registration is per taxpayer: each group company registers separately.

**E-invoicing (EIS) ⚠️**

- RR 11-2025, as amended by RR 26-2025, and RMC 98-2026 (September 22, 2026) set the rules; the first covered groups must issue compliant e-invoices by December 31, 2026.
- Covered groups include e-commerce sellers (except micro), Large Taxpayers, and **taxpayers using a CAS or computerized books with accounting records and electronic invoicing or other invoicing software**.
- Before issuing, a **Permit to Issue (PTI) Electronic Invoice**; then **EIS Certification** within six months.
- An e-invoice is structured data the system issues and transmits to the buyer and to the BIR (in the BIR's JSON format); a printout or a Word or Excel invoice is not one.
- An issued e-invoice is never deleted or changed: decreases need a credit note, increases a new invoice.
- During downtime, a BIR-authorized manual invoice is issued, then replaced by an e-invoice that references it.
- Separate PTIs where different invoicing systems are used; electronic sales reporting rules come later.

**What this means for us:** today we are outside both. If a company registers the app to issue invoices, it must also hold a PTI, pass EIS Certification and transmit e-invoices, so the app must be ready for both at once.

## Design principles

Build the data and the controls the rules need now, while they are cheap; build the connections to the BIR only when a company decides to register.

1. **The data is shaped for registration from day one.** Invoice Records hold every field an e-invoice needs, line by line, even while the Invoice itself stays handwritten. History then converts cleanly if a company registers.
2. **The controls are already the BIR's controls.** Immutable posting, gap-free numbering, an append-only audit trail, role-based access and 10-year retention are house defaults, so registration changes paperwork, not behavior.
3. **Issuing is a module, switched off.** Invoice issuance and BIR transmission are designed now as a separate module ("Invoice issuance"), built and certified only when a company registers.
4. **One switch per company.** Registration status is a company setting: "internal control," "CAS registered" or "CAS registered with e-invoicing." Labels, reports and allowed actions follow the setting.
5. **Nothing official until registered.** Until a company registers, every report stays labeled an internal management report, and no app printout looks like an Invoice (CLS-09, SAL-10).
6. **Changes are logged as if registered.** The release log and version register run from day one, so a company that registers can show its full change history.
7. **The manual path stays.** Handwritten Invoices remain the fallback even after e-invoicing, as the rules require during downtime.

## CAS readiness map

Thirteen of fifteen requirements are met by what app 1 already builds; one is the document set prepared at registration, and one is the switched-off issuing module.

| # | Requirement ⚠️ | How DLHouse meets it | Status in app 1 |
| --- | --- | --- | --- |
| C1 | Audit trail from each source document to the summarized accounts (RR 9-2009) | Nothing posts without a source document (GL-01); the document chain and journal entry on every detail view (P2) | Built |
| C2 | Log of who entered or changed what, printable | Append-only, tamper-evident audit log (ITC-02) with an audit trail report | Built |
| C3 | Sequential, gap-free numbering | System numbers on leaving Draft, never reused; voids kept (GL-06, D3) | Built |
| C4 | No deletion or alteration of recorded entries | Posted means permanent; voids and reversing entries only (GL-02, H3) | Built |
| C5 | User access controls | Roles per company, no-own-work checks, MFA, lockout, sessions (GEN-01 to GEN-12, ITC-01) | Built |
| C6 | Books of accounts the BIR requires: general journal and ledger, sales and purchase journals, cash receipts and disbursements books, subsidiary ledgers ⚠️ | A "Books of accounts" report set in the BIR layouts, generated from posted entries and labeled internal management reports until registration | Built (labeled internal) |
| C7 | Reports reconcile to the general ledger without manual steps | Every report reads posted entries only; trial balance and subledgers tie at close (CLS-04) | Built |
| C8 | Electronic records usable by BIR audit software | Exports of journals, ledgers and books in open formats (CSV and Excel), logged | Built |
| C9 | Retention for 10 years; never hard-deleted; legal hold | S36; legal hold; backups kept 10 years (ITC-05) | Built |
| C10 | Backup, archiving and recovery procedures | 3-2-1 backups, quarterly restore test, written runbook (ITC-05) | Built; runbook written before go-live |
| C11 | Period locks and year-end close | Open, In close, Closed; only the Final approver closes or reopens (CLS-02, CLS-03) | Built |
| C12 | One registration per taxpayer, with exact registered name, TIN and branch code | Each company a separate taxpayer record (GEN-10); names copied from the Certificate of Registration | Built |
| C13 | Change control: major changes need a new application, minor ones a notice ⚠️ | Release classes A, B, C and a version register kept from day one (ITC-04) | Built |
| C14 | Registration papers: sworn statement, summary of system description, flowcharts, sample printouts, printed audit trail, signed Annex B | Drawn from the lifecycles, screen pattern guide, this map and sample reports | Prepared at registration |
| C15 | Invoices printed by the system follow the invoicing rules (RR 7-2024) | The Invoice issuance module | Designed; built at registration |

## E-invoicing readiness map

The data and the rules are ready in app 1; the connection to the BIR, delivery to buyers and certification are built only when a company registers.

| # | Requirement ⚠️ | How DLHouse meets it | Status in app 1 |
| --- | --- | --- | --- |
| E1 | Structured invoice data: seller's registered name, TIN, branch code and address; buyer's name, TIN and address; date and serial; each line's description, quantity, unit price and amount; VATable, exempt and zero-rated amounts; VAT; discounts; total | Invoice Records capture every field, line by line, from day one, with TIN validation (`TinInput`) and tax codes per line | Built (data captured) |
| E2 | Conversion to the BIR's JSON format and transmission to the EIS | An EIS connector in the Invoice issuance module, mapping Invoice Records to the BIR schema | Designed; built at registration |
| E3 | The e-invoice issued and delivered electronically to the buyer; a printed copy only on request | Delivery by email or a buyer link from the same module | Designed; built at registration |
| E4 | A Permit to Issue (PTI) before issuing; separate PTIs for distinct invoicing systems | One system for the group, one PTI per registering company | Prepared at registration |
| E5 | EIS Certification within six months of the PTI | Certification test cases drawn from the worked examples (W1 to W5, W10, W17) | Designed |
| E6 | An issued e-invoice is never deleted or changed; decreases by credit note, increases by a new invoice | Posted means permanent (GL-02); credit memos for decreases; for registered companies, increases switch from debit memos to new invoices | Built; rule switch by registration status |
| E7 | Downtime: a BIR-authorized manual Invoice, later replaced by an e-invoice that references it | The manual invoice register (SAL-03) stays; a link from each replacing e-invoice to its manual serial | Register built; link designed |
| E8 | Serial numbering controlled per system | Number series per company, type and year (S35), with an e-invoice type added at registration | Built |
| E9 | Proof of transmission | A transmission log storing each BIR response with the Invoice Record | Designed |
| E10 | Invoices made in Word, Excel or similar are invalid | The app never produces anything that looks like an Invoice until a company is registered (SAL-10) | Built |
| E11 | Electronic sales reporting (rules still to come) | Watched; designed once the BIR issues its rules | Watch |

## What changes in DLHouse now

Five changes make the app registration-ready; only the first adds daily work.

| Change | Why | Where it lands |
| --- | --- | --- |
| **Invoice Records capture each line** (item, quantity, unit price, tax code) and the buyer's TIN and address, not just totals | E-invoices are line-level data; history captured as totals can't be converted later | Screen Pattern Guide (P3 form), Lifecycles, Worked Examples; more encoding for the Encoder |
| **Registration status per company** (internal control; CAS registered; CAS registered with e-invoicing) | Labels, reports and allowed actions follow it (for example, debit memos become new invoices once e-invoicing starts) | New setting S45; Glossary |
| **A "Books of accounts" report set** in the BIR layouts, labeled internal until registration | Registration needs sample books; producing them from day one proves they tie | App 1 scope (Executive Summary) |
| **The Invoice issuance module** (issuing, delivery to buyers, EIS connector, transmission log) designed now, built only when a company decides to register | Keeps app 1 small while making registration a build of one module, not a rebuild | Roadmap; Lifecycles (sales chain branch) |
| **Two new controls** for registered companies: registration status gates invoice issuance and official labels (lock), and the transmission log is reviewed daily for rejected or unsent e-invoices (alarm) | E-invoices must reach the BIR; a silent failure is a compliance gap | Control Register 0.5 (ITC-11, ITC-12) |

**Glossary additions:** Permit to Issue (PTI), EIS Certification, Registration status.

## When to register

A company registers when one of five triggers occurs; the path takes roughly a quarter, most of it building and testing the Invoice issuance module.

**Triggers (reviewed yearly after go-live, and whenever the BIR issues new rules):**

1. We want the official books to come from the app instead of being kept separately.
2. The company starts selling online or through a platform (the e-commerce group is covered unless micro) ⚠️.
3. The company becomes a Large Taxpayer ⚠️.
4. The BIR expands coverage to the company's group (the Commissioner may add groups).
5. Lenders or customers require system-issued invoices.

**The path:**

1. The accountant confirms the decision in writing for that company.
2. Build and test the Invoice issuance module (designed now): issuing, buyer delivery, the EIS connector and the transmission log.
3. Register the CAS with the RDO and receive the Acknowledgement Certificate.
4. Apply for the Permit to Issue (PTI) Electronic Invoice.
5. Start issuing e-invoices; the handwritten booklet becomes the downtime fallback.
6. Complete EIS Certification within six months of the PTI.
7. Switch the company's registration status; official books now come from the app.

**Lead time:** plan about three months from the decision to the first e-invoice ⚠️ (an estimate to confirm once the BIR's current technical specifications are reviewed).

## Questions

Three for the accountant and one for us; each has a recommended answer.

| # | For | Question | Recommended answer |
| --- | --- | --- | --- |
| B1 | Accountant ⚠️ | Does RMC 98-2026 change our position for any company (for example, any online sales, or Large Taxpayer status)? Please reflect it in the written memos | Position unchanged; memos cite RMC 98-2026 |
| B2 | Accountant ⚠️ | Please obtain the current Annex B and the BIR's EIS technical specifications, so this map is checked against them | Before the build starts in December |
| B3 | Accountant ⚠️ | Which books of accounts must each company keep (C6), so the report set matches? | List per company |
| U1 | Us | Should Invoice Records capture each line item and the buyer's TIN and address from day one, even though it adds encoding time? | Decided October 20, 2026: yes, from day one |

## Sources

- RR 9-2009 (electronic records and audit trail): [Supreme Court E-Library](https://elibrary.judiciary.gov.ph/thebookshelf/showdocs/10/48854)
- RMC 98-2026 on electronic invoicing (September 22, 2026): [Grant Thornton Philippines tax alert](https://www.grantthornton.com.ph/technical-alerts/tax-alert/2026/bir-issues-guidelines-on-electronic-invoicing-retains-31-dec-2026-deadline/)
- RR 26-2025 deadline and covered groups: [Tribune](https://tribune.net.ph/2026/09/23/bir-sets-31-december-e-invoicing-deadline); [Aureada Law](https://www.aureadalaw.com/post/bir-extends-compliance-period-for-electronic-invoicing-what-businesses-need-to-know)
- CAS registration documents (Acknowledgement Certificate, Annex B): [Oojeema guide](https://oojeema.com/bir-cas-application-procedures/); [ANSI](https://ansi.ph/everything-you-need-to-know-about-being-bir-cas-compliant/)

These are secondary summaries; the accountant confirms against the BIR's own issuances ⚠️.

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.1 | October 20, 2026 | First draft: CAS and e-invoicing rules, design principles, CAS map (C1 to C15), e-invoicing map (E1 to E11), changes to DLHouse, registration triggers and path, questions B1 to B3 and U1. |
| 0.1 (update) | October 21, 2026 | Precedence line updated to the current versions of the Executive Summary and related documents; no content change. |
