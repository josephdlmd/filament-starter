# DLHouse Executive Summary, Revision 5

Oct 20, 2026 · @Joseph de Leon

DLHouse is the De Leon standard for building business apps for goods distribution and trading in the Philippines. Revision 5 fits the standard to our actual group: five trading companies, one shared chart of accounts with account profiles by company type, and named people for every approval and custody role.

## Executive summary

**What it is:** the De Leon standard for building a suite of business apps for goods distribution and trading in the Philippines. Laravel and Filament provide the engineering underneath; DLHouse defines our design, our rules, our controls and our business guidance on top.

**Why:** Filament's plumbing is excellent, but its default look is bare and its defaults are generic. We want every app to share one well-architected design, one business vocabulary, PH-ready rules and auditable internal controls, without rebuilding foundations each time.

**Core idea:** DLHouse does not reinvent anything. It is a set of structured decisions layered on proven foundations, overriding Filament's defaults with ours. The guiding question for every decision: *"Is that a house default?"*

**What changed in Revision 5:**

- **The group is named:** Agno Metal Trade Corp., Arima Corporation and Florminsons Corp. (corporations); Blasmorisson Commercial and Merritmed Medical Supplies (sole proprietorships); all VAT-registered and trading goods. A holding and property company is planned.
- **People are named per company:** Arielle de Leon as second owner; Final approvers, bank releasers, Encoder, Accountant and Cashiers per company; Joseph de Leon confirmed as the admin-owner and Merritmed's sole proprietor.
- **Chart of Accounts 0.4:** one shared chart of about 80 accounts, with company types (operating, property, holding, services) and an account profile for each.
- **Fitted to how we do business:** own-name and door-to-door imports paid mostly before shipment, e-wallet collections, government retention and securities, owner loans and advances, shared staff with separate pay, and group charges for vehicles and property.
- **Documents updated:** Control Register 0.5 (84 controls), Glossary 0.7, Settings Register 0.4 (S01 to S44), Worked Examples 0.3 (W1 to W18).
- **Unchanged:** the two regulatory positions (not covered by e-invoicing; internal-control system, not yet registered), both still awaiting the accountant's written confirmation.

## The group

Five VAT-registered trading companies share one installation, one chart of accounts and one set of house rules; each keeps its own books, number series, bank accounts and approvers.

| Company | Legal form | Type | Final approver | Bank releasers | Cashier |
| --- | --- | --- | --- | --- | --- |
| Agno Metal Trade Corp. | Corporation | Operating | Florence de Leon (President) | Florence de Leon, Jose Mahatma de Leon; Joseph de Leon below ₱50,000 | Merle Tapiador |
| Arima Corporation | Corporation | Operating | Arielle de Leon (President) | Arielle de Leon; Joseph de Leon below ₱50,000 | None yet: bank transfers only |
| Florminsons Corp. | Corporation | Operating | Jose Mahatma de Leon | Jose Mahatma de Leon, Arnold (co-owner) | None yet: bank transfers only |
| Blasmorisson Commercial | Sole proprietorship (Diana de Leon) | Operating | Diana de Leon, except her own drawings | Diana de Leon | Shie Raet |
| Merritmed Medical Supplies | Sole proprietorship (Joseph de Leon) | Operating | Arielle de Leon, under Joseph's written authority | Joseph de Leon, after app approval for ₱50,000 or more | Jessa Palaca |
| Holding and property company | Corporation (planned) | Holding and property | To decide | To decide | — |

**Group roles**

| Role | Person |
| --- | --- |
| Second owner | Arielle de Leon (also Arima's President and the Data Protection Officer) |
| Admin-owner, server primary, design owner | Joseph de Leon (also Agno's Treasurer and an Arima officer) |
| Finance approver, every company | Margaret DL Laforteza (Arima's Treasurer without cash custody) |
| Encoder, every company | Lorelai (Agno employee, with time-share contracts) |
| Accountant, every company | Leslie (CPA board exam pending) |
| Alternate releaser; server backup (break-glass) | Jose Mahatma de Leon (only where he holds no other role) |
| Arima bank reconciliation sign-off | Florence de Leon (since Arielle releases Arima's payments) |

Detail, cross-company conflicts and compensating controls are in the Settings Register and Staffing Grid 0.4.

## Foundations

We build on the TALL stack with Filament v5 and replace only its face, never its plumbing.

- **Stack:** TALL (Tailwind, Alpine.js, Laravel, Livewire 4) with **Filament v5**, which has the same features as v4 plus Livewire 4 support.
- **AI tooling:** Laravel Boost (guidelines + MCP), Filament Blueprint (purchased), Claude Code as the main builder.
- **Approach:** use Filament as plumbing and wiring; replace its face with our own design system.
- **Base design system:** Shopify Polaris, patterns and usage guidance only (not its components).
- **Language:** English only. All screen text comes from Laravel's language files, fed by the glossary, so a rename is one edit.

| Concept | Meaning | Owning document |
| --- | --- | --- |
| Plumbing & wiring | Filament's engine: forms, tables, validation, actions, relationships | — |
| Floor plan | Screen layouts, UX patterns and document lifecycles | Screen Pattern Guide; Document Lifecycles |
| Furniture size and finishes | Density, colors, typography, spacing | Style Guide and Tokens |
| Instruction booklet | Guidelines that override Filament's standard instructions | `dlhouse/guidelines` |
| House laws | Business rules and policies we choose | Control Register; Company Policies; Settings Register |
| Building code | Rules from outside: BIR, SEC/PFRS, NPC, our external auditor | Accountant Meeting Agenda; Glossary |
| Rooms and labels | How every peso is classified | Chart of Accounts |
| Test fit-out | Worked transactions proving the rules before the build | Worked Examples |

## The four layers

Each layer now has documents that own its detail; this summary keeps the headlines.

### Layer 1: business guidance and truths

- **Glossary 0.7:** every term defined once, with Source and Verified lines; now includes commercial invoice, proforma invoice, e-wallet, own-name and door-to-door imports, retention money, company type and account profile.
- **Document Lifecycles 0.4:** five statuses (Draft, Submitted, Approved, Posted, Voided); events and progress states; corrections void or reverse whole and re-record (H3).
- **Chart of Accounts 0.4:** one shared chart of about 80 accounts in four-digit codes, plain "what goes here" descriptions, tags instead of extra accounts, and an account profile per company type (operating, property, holding, services).
- **Company Policies 0.4:** POL-01 to POL-18, with named owners per company; including fixed assets (₱20,000 threshold, custody list, yearly count), government contracts and securities (POL-17), and imports and foreign currency (POL-18).
- **Accounting policies (per company):** PFRS for Small Entities; revenue at the signed delivery receipt (government at inspection and acceptance where the contract says so); weighted average cost; periodic inventory in app 1; net realizable value at year-end; month-end forex revaluation only for the occasional USD balance (peso advances are not revalued ⚠️); provision matrix; deferred taxes off if allowed.
- **Control Register 0.5:** 84 controls, each a lock, alarm or habit, with owner, frequency and evidence.
- **Settings Register 0.4:** S01 to S44, the staffing grid and owners and approvers per company.
- **Worked Examples 0.3:** W1 to W18, including advances before shipment, door-to-door imports, e-wallet collections and group rent.

### Layer 2: business rules (`dlhouse/rules`)

Pure Laravel, independent of Filament: PH localization (VAT, TIN, PSGC, withholding, 2307), importation (both import kinds, landed cost, rates), multi-company with company types and account profiles, the controls engine (statuses, numbering, immutable posting, period locks, not-your-own-work checks, audit log), document rules (input-tax phrase; input VAT only from VAT Invoices, never commercial invoices; exemption documents for exempt sales), withholding, payments, journal-entry alarms, settings not code, and tests first from the worked examples.

### Layer 3: design system (`dlhouse/ui`)

- **Screen Pattern Guide 0.2:** six patterns first (list, detail, two-column form, approval inbox, evidence capture, matching); the document chain strip as a house component.
- **Style Guide and Tokens 0.5:** tokens on Filament's six color roles plus Ledger extras; the Softer finish on ledger density (zinc neutrals, near-black primary, blue only for focus and the selected-row bar, 8 px and 10 px corners, tinted status pills); status shapes; WCAG 2.2 AA in light and dark; showcase signed off in Wave 2, before go/no-go on January 15, 2027 (T3, Build Plan 0.2).
- **Third-party UI kits are reference only:** anything borrowed enters `dlhouse/ui` as our own component, uses DLHouse tokens only, passes the light and dark contrast checks, and records its source license.

### Layer 4: guidelines (`dlhouse/guidelines`)

Agent Guidelines 0.2, shipped as a Composer package through Laravel Boost's three channels: one short always-loaded guideline with the firm rules; six on-demand skills (money, screens, finishes, controls, testing, team); and per-app project rules recorded from the friction log. Amounts are stored as whole centavos; tests use Pest; a dry run proves the package before December 1. Firm rules: never delete posted documents; never edit production data directly; "Invoice" alone means only the BIR invoice; Invoice Records never go to customers; the input-tax phrase on every other external document; app reports labeled internal; screen text only from language files; one pattern per screen; colors only through tokens; follow the custom screen ladder; never install a third-party UI kit, or load its agent guidelines, into a DLHouse app.

## Building code: compliance and internal controls

Every app must be inspectable by the BIR, the SEC, the NPC and our external auditor. All points below are our best understanding and must be verified in writing ⚠️.

### Regulatory baseline

| Area | What applies to us |
| --- | --- |
| BIR system registration | **Not yet.** The first app is an internal-control system; each company's official books stay as they are. Built to Annex B so registering later is paperwork. Written confirmation pending. |
| E-invoicing (EIS) | **Not covered** (our determination): Invoices stay handwritten; written confirmation per company pending. |
| Invoicing (EOPT Act, RR 7-2024) | Handwritten Invoices on registered booklets; internal Invoice Records; the input-tax phrase on every other external document; input VAT only from VAT Invoices in our name, never from a commercial invoice. |
| VAT-exempt and zero-rated sales | Occasional; allowed only with the customer's exemption document on file (SAL-11). |
| Record retention | 10 years, never hard-delete, legal hold. Pending accountant confirmation. |
| Reporting framework | PFRS for Small Entities per company; whether the sole proprietorships may use the income-tax basis is for the accountant. |
| Government sales | 5% VAT and 1% expanded withholding with 2307s; warranty retention of 1% to 5% (1% by default) released after the warranty period; 5% performance security; advance payments up to 15% against a bank guarantee (RA 12009 IRR). |
| Data privacy | TINs and government IDs are sensitive personal information; NPC registration or a sworn exemption. Data Protection Officer: Arielle de Leon. |

### Roles

Seven roles (Encoder, Accountant, Finance approver, Final approver, Cashier, Admin, Auditor), granted per company; owners act through roles. The **second owner** (Arielle de Leon) is the independent check on the admin-owner: permission alerts, financial-role access approvals, quarterly reviews and bank reconciliation sign-off. The **admin-owner** (Joseph de Leon) has two logins; his owner login holds no approver role anywhere and releases routine payments below ₱50,000.

### Approval thresholds (₱50,000 line)

Below ₱50,000 the Finance approver decides; at or above it, the company's Final approver also approves. Every line is a separate setting and compares the document total including VAT (H1). Bad-debt write-offs, credit limits, opening balances and period close always need the Final approver; landed cost sheets need only the Finance approver; financial-role access changes need the second owner. Recurring contract payments keep two approvals each month (H2). **Always:** no one approves their own work or a payment to themselves.

### Bank release rules

Every payment passes two gates: approval in the app (a payment voucher) and release in the bank portal by someone other than its preparer, with the voucher number in the bank's reference field. Who releases is named per company in the table under "The group."

| Payment | Who releases |
| --- | --- |
| Routine, existing verified payee, below ₱50,000 | The company's releasers, or Joseph de Leon's owner login |
| ₱50,000 or more; new payee or changed bank details | The company's senior releaser (Florence or Jose Mahatma at Agno, Arielle at Arima, Jose Mahatma or Arnold at Florminsons); at the sole proprietorships, the owner after app approval |
| To the admin-owner or a related party | Arielle de Leon (second owner) only |
| To the second owner or her relatives | Approved by the Finance approver, released by the admin-owner, listed in the quarterly review pack |
| Linked intercompany payment below ₱50,000 | Either of the company's releasers, with both sides recorded |
| A payment you prepared | Never you |

**Sole proprietorships (decided):** Merritmed and Blasmorisson have one bank signatory for now. The Accountant prepares as maker and the owner releases; payments of ₱50,000 or more and owner drawings are approved in the app first, and Arielle reviews their bank statements monthly. Revisit when applying for credit lines.

**Alternate releaser:** Jose Mahatma de Leon, within the second owner's written cap (recommended ₱250,000 per payment, ₱1,000,000 per absence), only at companies where he holds no other role and never for payments to Florminsons. Split-payment alarm: two or more payments to one payee within 7 days that together reach ₱50,000.

### Controls

The top five: two-person release in online banking; collections deposited intact daily; no one approves their own work; monthly bank reconciliation by someone who doesn't handle cash, signed off by the second owner (Florence de Leon for Arima); call-back verification for any bank-detail change. The full set of 84, including the newer controls for exemption documents, retention, supplier advances, e-wallets, group-company charges and shared staff, is in the Control Register 0.5.

### Admin-owner safeguards

Two separate logins (admin with no financial rights; owner with no admin rights and no approver role); production changes only through the app; permission changes alert the second owner; the audit log can't be edited by anyone; every release logged with its version and class; quarterly plain-language review by the second owner. Because the admin-owner also owns Merritmed, Merritmed's Final approver is Arielle de Leon under his written authority.

### Hosting and security

Own server: HTTPS only, administration over VPN with SSH keys; MFA for every user, lockout after 5 failed sign-ins for 15 minutes, idle logout 30 minutes on desks and 10 on tablets; full-disk and field encryption for TINs, bank details and IDs; append-only, tamper-evident audit log copied off-site daily; 3-2-1 backups with a quarterly restore test; company-managed tablets; named server primary (Joseph de Leon) and break-glass backup (Jose Mahatma de Leon, credentials sealed with Arielle de Leon); physical security; a breach response plan with the Data Protection Officer ⚠️.

## First app: accounting and bookkeeping

An internal-control accounting system under PFRS for Small Entities for all five companies, built registration-ready but not registered with the BIR; every later module posts into it.

- **Scope (D1):** journal entries, supplier invoices (local VAT Invoices and foreign commercial invoices), payment vouchers including advances to suppliers, collections (bank, check, cash and e-wallet), Invoice Records and the manual invoice register, 2307 tracking, government retention and securities, landed cost for own-name imports, bank and e-wallet reconciliation, intercompany charges and period close. Sales orders, delivery receipts, purchase orders and receiving reports are references until their modules exist. Inventory is periodic.
- **Companies (D10):** Agno Metal Trade Corp., Arima Corporation, Florminsons Corp., Blasmorisson Commercial and Merritmed Medical Supplies in one installation, each with its own TIN, books, number series and account profile. The planned holding and property company is added when formed.
- **Official books:** unchanged until we register; app reports are internal management reports.
- **Users:** Lorelai (Encoder) and Leslie (Accountant) across all companies; Margaret DL Laforteza (Finance approver); Final approvers and Cashiers per company; owners through their roles.
- **Out of scope:** payroll, a separate module later; shared staff are paid separately by each company under time-share contracts.
- **Replaces:** Excel; opening balances as an opening trial balance per company with supporting schedules, reviewed by the external accountant and approved by each company's Final approver.
- **Cutover (D14):** calendar fiscal year; built by an agent team December 1, 2026 to January 15, 2027 (Build Plan 0.2); go/no-go January 15, 2027; opening at December 31, 2026; parallel run January 1 to March 31, 2027; go-live April 1, 2027; fallbacks July 1, 2027, then January 1, 2028. Exit rule: one full month closed with a trial balance matching Excel exactly, per company.
- **Devices:** desk computers for encoding, posting, reconciling and closing; company-owned tablets for approving (P4), looking up and capturing evidence (P5). Device type is never a security control; role permissions are.
- **Registration-ready (BIR Readiness Map 0.1):** Invoice Records capture each line and the buyer's TIN and address from day one; a "Books of accounts" report set in BIR layouts, labeled internal; registration status per company (S45, ITC-11). The Invoice issuance module (e-invoices, buyer delivery, EIS connector) is designed now and built only when a company registers, since registering the app to issue invoices brings mandatory e-invoicing (RMC 98-2026) ⚠️.
- **Fixed-asset register (POL-16):** every asset of ₱20,000 or more kept in the app and depreciated monthly; a custody list for portable items below that; existing assets rebuilt into the register in early December 2026 and loaded individually in the December 31, 2026 opening (Opening Balances Plan, Company Policies Q1).

## The CLI approach

Start with existing tools (Composer, Artisan, Filament generators, Claude Code); our own `dlhouse:` commands are harvested from real work. **Graduation ladder:** done by hand with Claude Code → written down in guidelines → Claude Code command → Artisan command with fixed templates → enforced by `dlhouse:check`. **Rule of three:** do it once, notice it twice, automate it the third time; keep a friction log and prune unused commands. **Envisioned commands (to be earned):** `dlhouse:install`, `dlhouse:screen {Name} --pattern=...`, `dlhouse:add {feature}`, `dlhouse:check`, `dlhouse:sync`.

## Roadmap

Phase 0 is done and Phase 1's documents are drafted; the paper phase closes on November 30, 2026.

| Milestone | Date | Gate |
| --- | --- | --- |
| Accountant session | Done, October 2026 | Agreed to M1 to M5; signed memos and tax matrices to file |
| Screen pattern paper tests | Week of November 16, 2026 | Lorelai, Margaret DL Laforteza, Arielle de Leon |
| Paper phase closes; guidelines for agents written | November 30, 2026 | Guidelines loaded; server ready |
| Wave 0 Foundation | December 1 to 7, 2026 | Contracts and walking skeleton |
| Wave 1 Modules in parallel | December 8 to 23, 2026 | All worked examples green |
| Books open | December 31, 2026 | Year-end counts and statements |
| Wave 2 Integration and testing | January 4 to 15, 2027 | Leslie's full run; accountant review; showcase |
| Go/no-go | January 15, 2027 | G1 to G5 in the Build Plan |
| Opening balances loaded | January 20, 2027 | Each company's opening locked |
| Parallel run | January 1 to March 31, 2027 | One full month matching Excel |
| Go-live | April 1, 2027 | The app alone |
| Fallbacks | July 1, 2027, then January 1, 2028 | Only if the gate fails |

Later phases: 3 Extract (move proven pieces into `dlhouse/rules`, `dlhouse/ui`, `dlhouse/guidelines`), 4 Validate (a second, different app), 5 Harden (tests, showcase, `dlhouse:check`, documentation).

## Guiding principles

- **Extract, don't invent;** keep business rules independent of Filament, Livewire and Boost.
- **Upgrade safety order:** configuration → CSS theming → wrapped components → view overrides (last resort).
- **Accessibility and dark mode** at WCAG 2.2 AA for every style.
- **Test business rules first,** from worked examples verified with the accountant.
- **Get regulatory answers in writing,** from professionals, citing the rule.
- **Registration-ready, registered when we choose.**
- **Approve by risk, not by volume;** every review screen readable by a non-technical owner.
- **Correct by reversing whole, never by patching** (H3).
- **One chart, many companies:** the same code means the same thing everywhere; company type decides what is switched on.
- **Start as a modular monolith.**

## Further considerations

- **Group structure ⚠️:** the holding and property company, transfers into it, and whether to incorporate the sole proprietorships for limited liability, all with the tax advisor before any move.
- **Change management:** development, test and live environments; release classes A, B and C; emergency database access logged; BIR reporting of releases only after registration.
- **Compliance:** FDA licensing for medical supplies (to check), Data Privacy Act, EOPT invoicing, RA 12009 for government sales.
- **Devices, performance, distribution, licensing:** test on iPad Safari, Android Chrome and desktop; server-searched selects for large datasets; private package hosting; Source Serif 4 and IBM Plex Sans are open source.
- **People and time:** budget for extraction and hardening, double encoding while the official books stay separate, and AI usage costs.

## Decision log

Revision 5's decisions come first; all were made on October 20, 2026. "Pending" means decided, awaiting written confirmation ⚠️.

| Decision | Outcome |
| --- | --- |
| Group companies | Agno Metal Trade Corp., Arima Corporation, Florminsons Corp. (corporations); Blasmorisson Commercial, Merritmed Medical Supplies (sole proprietorships); all VAT-registered, all operating |
| Shared chart (C1) | One chart for the group; company types (operating, property, holding, services) with an account profile each (Chart of Accounts 0.4) |
| VAT-exempt and zero-rated sales | Occasional; tax code per line; exemption document required (SAL-11) |
| Imports | Own-name and door-to-door; commercial invoices support cost, never input VAT; door-to-door input VAT only from the forwarder's VAT Invoice (pending) |
| Paying foreign suppliers | Mostly before shipment, in pesos converted by the bank; advances need a proforma and approved purchase order (PAY-09) and are flagged after 60 days (PAY-10); not revalued (pending) |
| Collections | Bank transfer, check, cash, GCash and Maya; e-wallets as company business accounts, collections only, swept weekly (CSH-09) |
| Government sales | Cash bid and performance securities; surety bonds and guarantees being explored; warranty retention tracked to release (SAL-12) |
| Delivery | Own vehicles and third parties; each vehicle titled to one company, others pay usage charges (CLS-11) |
| Premises | Some owned, some rented; no branches |
| Financing | Bank loans now, credit lines sought; owner loans (2150) and owner advances (1260 in corporations; drawings in sole proprietorships), never netted |
| Shared staff | Separate pay by each company under time-share contracts; flagged across payrolls (GEN-12) |
| Property and holding companies | A passive property company leasing at market rent is the recommended direction; logistics stays out of it; a holding company may combine with property; all transfers only with the tax advisor (pending) |
| Second owner | Arielle de Leon |
| Admin-owner | Joseph de Leon (Josephus B. de Leon), also Merritmed's sole proprietor; never a Final approver |
| Final approvers | Agno: Florence de Leon; Arima: Arielle de Leon; Florminsons: Jose Mahatma de Leon; Blasmorisson: Diana de Leon (not her own drawings); Merritmed: Arielle de Leon under written authority |
| Finance approver | Margaret DL Laforteza for every company; no cash custody or bank release anywhere |
| Payments to the second owner | Finance approver approves, admin-owner releases, quarterly review lists them (PAY-04) |
| Sole proprietorship signatories | One signatory for now, with compensating controls; revisit with the credit lines |
| Staff | Encoder Lorelai and Accountant Leslie for all companies; Cashiers Merle Tapiador (Agno), Shie Raet (Blasmorisson), Jessa Palaca (Merritmed), rotating as each other's backup; Arima and Florminsons take bank transfers only until named |
| Server backup | Jose Mahatma de Leon, break-glass only |
| Earlier decisions | D1 to D14, the regulatory positions, H1 to H4, S1 to S4, T1 to T3, L1 to L5, C1 to C5 (controls) and R1 to R5 stand as recorded in Revision 4, which is kept as the record |
| Accountant session | The accountant agreed to every recommended answer in M1 to M5; signed memos and tax matrices per company to file |
| Registration-ready design | Build to CAS and e-invoicing requirements now (BIR Readiness Map 0.1); register per company only on a trigger; line-level Invoice Records from day one (U1) |
| Master files | Shared partners and products with company-specific settings; walk-in customers with no TIN; no placeholder TINs; two-level product grouping; goods only, installation expensed (Master Files 0.1) |
| Opening balances | Built from evidence at December 31, 2026 (D14 revised; Opening Balances Plan 0.3), with every balance backed by a schedule and no plug accounts (equity from registration papers and retained earnings rolled forward; any difference still unexplained gets the external accountant's written treatment by January 18); practice run on Merritmed's November 30 figures; loaded by January 20, 2027; March 31, 2027 only if go/no-go fails; re-opened at June 30 only if a company fails the exit check |
| Fixed assets | ₱20,000 capitalization threshold, straight-line lives (S46, S47), custody list, yearly count (CLS-12) |
| Finishes (T4 revised, T5 to T8; October 21, 2026) | Softer finish on ledger density: zinc neutrals, charcoal dark mode (ground #18181B), near-black primary, blue focus ring and selected-row bar, 8 px controls and 10 px panels, row-only lines, tinted status pills; desk rows 28 px, tablets 44 px; T7 confirmed: the near-black primary works as a hand-set Filament palette (Style Guide and Tokens 0.5) |
| Third-party UI kits (October 21, 2026) | Reference only; the Slate Blade kit was reviewed and not adopted as a dependency; borrowed ideas are rebuilt in `dlhouse/ui` on our tokens with the source license recorded |
| Policies (Q1, Q2, P5; October 21, 2026) | Fixed-asset register rebuilt in early December 2026, every asset loaded in the opening (Q1, reversed the same day from class totals); no petty cash for Arima and Florminsons until a Cashier is named; starting values reviewed in April 2027 (Company Policies 0.4) |
| Agent guidelines (G1 to G5, October 21, 2026) | One guideline plus six skills through Laravel Boost, per-app project rules; amounts in whole centavos behind one money type; each screen declares its pattern; Pest; private Git repository via Composer; dry run by November 30 (Agent Guidelines 0.2) |
| Critical path (D14 revised, October 21, 2026) | Agent-team build December 1, 2026 to January 15, 2027; opening at December 31, 2026; parallel run January to March; go-live April 1, 2027; fallbacks July 1, 2027 and January 1, 2028 (Build Plan 0.2) |

## Open decisions

The accountant session is done (M1 to M5 agreed); the accountant items below close as her signed memos and tax matrices arrive; the rest are names, paperwork and advisors.

**For the accountant ⚠️ (written confirmations; Worked Examples E1 to E12; Chart of Accounts A1 to A8):**

- [ ] Written confirmation: not covered by e-invoicing; no registration needed for internal-control use
- [ ] Loose-leaf books printed from the app's data, or not
- [ ] Framework per company, including the income-tax basis for the sole proprietorships; deferred taxes
- [ ] Provision-matrix method and starting rates
- [ ] Payor withholding status and rates; returns the system must support; output VAT timing
- [ ] Import VAT for both import kinds; peso advances not revalued; e-wallets as cash
- [ ] Exemption classification for non-profit customers
- [ ] Map each company's Excel chart to Chart of Accounts 0.4; sign off W1 to W18

**For other advisors ⚠️:**

- [ ] Tax advisor: holding and property company transfers; incorporating the sole proprietorships
- [ ] Compliance advisor: warranty periods under RA 12009; FDA licensing
- [ ] Transport lawyer: charging group companies for vehicle use
- [ ] Labor advisor: officers' employee status; multiple employers
- [ ] Corporate secretary: moving cash custody from Arima's Treasurer to its Cashier
- [ ] Privacy advisor: retention versus data minimization; NPC registration
- [ ] Bank: approval limits matching our tiers; credit lines

**Ours:**

- [ ] Arnold's surname; Cashiers for Arima and Florminsons once operating; who holds Agno's and Arima's shares
- [ ] Written authority from Joseph de Leon for Arielle de Leon as Merritmed's Final approver
- [ ] Time-share contracts for Lorelai with the four other companies
- [ ] Vehicle usage agreements and titles
- [ ] Second owner confirms the alternate releaser's cap in writing
- [ ] Approve the SAL-04 wording for "delivered, awaiting acceptance"
- [ ] Discount percentages (with the sales module)

## Documentation plan

Fifteen documents are drafted; what remains is verification with people and three build prerequisites.

| # | Document | House metaphor | Layer | Status |
| --- | --- | --- | --- | --- |
| 1 | Glossary 0.7 | Labels on the floor plan | 1 | Drafted; regulated terms verified with the accountant |
| 2 | Accountant Meeting Agenda | Building inspector's checklist | Building code | Used; session done, October 2026 (M1 to M5 agreed) |
| 3 | Executive Summary, Revision 5 | Master plan | All | This document; Revisions 3 and 4 kept as the record |
| 4 | Document Lifecycles 0.4 | Floor plan: how documents move | 1 | Drafted, with 16 chains including advances, door-to-door imports, e-wallets, fixed assets, group charges and owner flows |
| 5 | Control Register and Approval Matrix 0.5 | House laws | 1 | Drafted (84 controls); external auditor review |
| 6 | Worked Examples 0.3 (with Best Practices 0.2) | Test fit-out | 1 → 2 | Drafted (W1 to W18); verified with the accountant |
| 7 | Screen Pattern Guide 0.2 | Floor plans for rooms | 3 | Drafted (six patterns); paper tests, week of November 16 |
| 8 | Style Guide and Tokens 0.5 | Finishes | 3 | Drafted (Softer finish); showcase sign-off in Wave 2, by January 15, 2027 |
| 9 | Company Policies 0.4 | House laws | 1 | Drafted; names and newer controls folded in; Q1 and Q2 decided |
| 10 | Settings Register and Staffing Grid 0.4 | Fuse box and key list | 1 | Drafted (S01 to S44, people per company) |
| 11 | Chart of Accounts 0.4 | Rooms and labels | 1 | Drafted; mapped to each company's Excel chart with the accountant |
| 12 | BIR Readiness Map 0.1: CAS and E-Invoicing | Building inspector's future checklist | Building code | Drafted; checked against the current Annex B and EIS specifications once the accountant obtains them |
| 13 | Master Files 0.1 | Inventory of the house | 1 | Drafted; product categories completed in the master-data clean-up, starting December alongside Wave 1 and clean by mid-January (Build Plan 0.2) |
| 14 | Opening Balances Plan 0.3 | Moving-in list | 1 | Drafted for the December 31, 2026 opening: practice run on Merritmed's November 30 figures, load by January 20, 2027; March 31 stays as the no-go fallback |
| 15 | Agent Guidelines 0.2 (`dlhouse/guidelines`) | Site rules pinned at the door | 4 | Drafted; dry run by November 30, 2026 |

**Still due before the build:** the agent-guidelines package built from Agent Guidelines 0.2 and its dry run by November 30; the line-by-line check of the BIR Readiness Map against the current Annex B. Master files and the opening plan are drafted; the master-data clean-up itself runs in December.

**Conventions on every document:** a header with version, date, author and status; the precedence line; glossary terms only; Verified lines for regulated content; a changelog; a layer tag. Draft as a doc, then export to Markdown for project knowledge and later the repository.

## Changelog

| Revision | Date | Changes |
| --- | --- | --- |
| 5 (update) | October 21, 2026 | Review pass: opening-balances row restated without a plug (equity from evidence, differences treated in writing by January 18); changelog sorted newest first. |
| 5 (update) | October 21, 2026 | Corrected: the Opening Balances Plan was already at the December 31, 2026 opening (now 0.3 with small fixes); Company Policies Q1 reversed to the plan's December register rebuild. |
| 5 (update) | October 21, 2026 | Company Policies Q1, Q2 and P5 decided: fixed assets as class totals at opening with the register by February 28, 2027; no petty cash before a Cashier; starting-value review in April 2027. |
| 5 (update) | October 21, 2026 | Company Policies 0.4: owners named, newer controls linked, POL-17 Government contracts and POL-18 Imports added; P5 review moved to April 2027. |
| 5 (update) | October 21, 2026 | Agent Guidelines 0.2 added (document 15): Layer 4 now ships one guideline, six skills and per-app project rules through Laravel Boost; G1 to G5 decided (centavo amounts, pattern declaration, Pest, private Composer package, dry run by November 30). |
| 5 (update) | October 21, 2026 | Accountant session confirmed done; the November 9 agenda references removed; accountant items now close on her signed memos and tax matrices. |
| 5 (update) | October 21, 2026 | Dates aligned to D14 revised: showcase sign-off (T3) by go/no-go January 15, 2027; opening balances at December 31, 2026 with a November 30 practice run; master-data clean-up from December; "Still due before the build" refreshed. |
| 5 (update) | October 21, 2026 | Style Guide and Tokens 0.5: T4 revised to the Softer finish on ledger density, T6 decided (blue selected-row bar), T7 confirmed by the design owner, T8 charcoal dark mode; new house default and firm rule: third-party UI kits are reference only. Layer 3, Layer 4, decision log, open decisions and documentation plan updated. |
| 5 (update) | October 21, 2026 | D14 revised: agent-team build, opening at December 31, 2026, go-live April 1, 2027 (Build Plan 0.2); roadmap and first-app cutover updated. |
| 5 (update) | October 20, 2026 | Accountant agreed to M1 to M5; added the registration-ready design (BIR Readiness Map 0.1) to app 1 scope, the decision log and the documentation plan; Control Register 0.5 (83 controls), Glossary 0.7. |
| 5 | October 20, 2026 | Added "The group" (five companies, types, people per company); Chart of Accounts 0.4 with company types and account profiles; business decisions on imports, advances, e-wallets, government retention, financing, shared staff, group charges and the planned property and holding company; second owner Arielle de Leon; admin-owner confirmed as Joseph de Leon; Finance approver renamed Margaret DL Laforteza; sole-proprietorship signatory decision; bank release rules per company; documents updated to Control Register 0.4, Glossary 0.6, Settings Register 0.4, Worked Examples 0.3. Earlier decisions summarized with a pointer to Revision 4. |
| 4 | October 20, 2026 | All ten paper documents drafted; H1 to H4, S1 to S4, T1 to T3, token mapping. Kept as the record. |
| 3 | October 20, 2026 | D1 to D14; regulatory positions; document rules. Kept as the record. |
