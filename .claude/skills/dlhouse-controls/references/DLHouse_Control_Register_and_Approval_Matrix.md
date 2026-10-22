# DLHouse Control Register and Approval Matrix 0.5

Oct 20, 2026 · @Joseph de Leon

Every lock, alarm and habit from the executive summary, glossary and document lifecycles is gathered here as one numbered list, each control with the risk it addresses, its owner, how often it runs and the evidence it leaves; this is the document the external auditor reviews.

## About this document

- **Version and status:** 0.5, draft for review, October 20, 2026.
- **Precedence:** regulation, then the DLHouse Executive Summary (Revision 5), then this document. Terms follow Glossary 0.7; chains follow Document Lifecycles 0.4.
- **Layer:** Layer 1, business guidance and truths (the house laws). The controls are house defaults for every app; owners, names and amounts are company settings.
- **Who uses it:** the owners to see what protects the business, the accounting team to know what they must do and keep, the builder to know what the app must enforce, and the external auditor to review the design and test the key controls.
- **Amounts:** every ₱50,000 line is a separate company setting.

## Best practices for a control register

This register follows the risk-control matrix that auditors use under the COSO internal control framework; these eight practices are house defaults for every DLHouse app.

1. **Start from the risk, not the control.** Each control names the risk it addresses, so a control with no risk is removed and a risk with no control is visible.
2. **One control, one stable ID.** IDs never change or get reused, so audit evidence, app code and policies can point at them for years.
3. **Every control has an owner, a frequency and evidence.** If no one owns it, it doesn't run; if it leaves no evidence, it can't be proven to have run.
4. **Prefer preventive and automated.** A lock that stops an error beats an alarm that finds it, and an alarm beats a habit someone must remember. Habits stay where judgment or the bank is involved.
5. **Mark the key controls.** These are the few controls that, if they fail, let a material error or fraud through. The auditor tests these first; the rest support them.
6. **Separate the four duties.** Authorizing, recording, holding cash and reconciling sit with different people; where a small team can't separate them, a compensating control is named.
7. **Test design, then operation.** Design is checked by walking one real transaction through each chain during the parallel run; operation is checked by sampling evidence after go-live.
8. **Log every failure.** A control that didn't run or didn't work goes into the deficiency log with a fix, an owner and a date; nothing is quietly skipped.

## How to read the register

Each control is one row; the ID prefix says which area it protects.

| Column | What it holds |
| --- | --- |
| ID | Area prefix plus a number: GEN access and segregation, SAL sales and receivables, PUR purchasing, PAY payments, CSH cash and bank, GL general ledger, CLS period close, TAX tax and withholding, ITC IT, data and change |
| Control | What happens, in one sentence |
| Risk | What goes wrong without it |
| Type | **Lock** (the app enforces it), **alarm** (the app flags it) or **habit** (a person does it); preventive or detective; **key** if the auditor tests it first |
| Owner | The role, or the named person, who makes sure it runs |
| Frequency | Every transaction, daily, monthly, quarterly, yearly or on each change |
| Evidence | What proves it ran |

## Access and segregation (GEN)

These controls decide who may do what; they protect every other control in the register.

| ID | Control | Risk | Type | Owner | Frequency | Evidence |
| --- | --- | --- | --- | --- | --- | --- |
| GEN-01 | No one approves their own work | Errors or fraud pass unchecked | Lock, preventive, key | The app | Every transaction | Approval log showing maker and checker |
| GEN-02 | Assigning a conflicting role pair warns, and the owner's acceptance is logged | Incompatible duties combined unnoticed | Alarm, detective | Admin; second owner accepts | Each role assignment | Acceptance log |
| GEN-03 | Changes to financial roles are approved by the second owner; the Admin never grants roles to themselves | Someone grants themselves power | Lock, preventive, key | Admin; second owner | Each change | Access change log |
| GEN-04 | Every permission change alerts the second owner instantly | Silent privilege changes | Alarm, detective | The app; second owner | Each change | Alert log |
| GEN-05 | Quarterly user-access review | Leavers and stale rights stay active | Habit, detective, key | Second owner | Quarterly | Signed review pack |
| GEN-06 | The admin-owner has two logins: admin with no financial rights, owner with no approver role | The builder both controls the system and approves money | Lock, preventive, key | Admin-owner; reviewed by the second owner | Continuous | User list |
| GEN-07 | Delegations carry start and end dates, and a delegate can't approve their own work | Approval rights linger or are misused | Lock, preventive | Approver; Admin | Each delegation | Delegation log |
| GEN-08 | Approvals waiting more than 2 business days escalate | Work stalls; pressure to bypass approvals | Alarm, detective | The app | Each approval | Escalation log |
| GEN-09 | Auditor accounts are read-only, time-limited, with their own MFA; exports logged | Outside access left open or misused | Lock, preventive | Admin | Each engagement | Account and export log |
| GEN-10 | Every record belongs to one company; entries post only to the active company | Companies' books mix | Lock, preventive, key | The app | Every record | Data-layer scoping, tested |
| GEN-11 | The Encoder, Accountant and Cashier each take at least 5 consecutive business days of leave a year while their backup does the work | Schemes that need daily tending stay hidden | Habit, detective | Finance approver | Yearly | Leave schedule and backup's work log |
| GEN-12 | A person on more than one company's payroll is flagged, and their time shares must total no more than 100% (payroll module) | Ghost or duplicate pay; one company paying for another's work | Alarm, detective | The app; Finance approver | Each payroll | Employment contracts with time shares |

## Sales and receivables (SAL)

These controls make sure every delivery is invoiced, every Invoice is recorded once, and every receivable is real and collectible.

| ID | Control | Risk | Type | Owner | Frequency | Evidence |
| --- | --- | --- | --- | --- | --- | --- |
| SAL-01 | Each Invoice Record links to its signed delivery receipt and booklet serial | Revenue recorded without a delivery, or twice | Lock, preventive, key | Encoder; Accountant posts | Each Invoice | Photo of the Invoice copy and delivery receipt |
| SAL-02 | Invoice Records are recorded within 1 business day | Late or forgotten revenue | Alarm, detective | Encoder | Daily | SLA report |
| SAL-03 | Every booklet serial is accounted for as issued, spoiled or unused; gaps are flagged | Invoices issued off the books | Alarm, detective, key | Encoder; monthly sign-off by someone else | Monthly | Signed invoice register |
| SAL-04 | Delivered-not-invoiced items are accrued at month-end | Revenue in the wrong month | Alarm, detective, key | Accountant | Monthly | Cut-off list |
| SAL-05 | Credit and debit memos follow the ₱50,000 tiers | Receivables reduced to hide theft | Lock, preventive, key | Finance approver; Final approver | Each memo | Approval log |
| SAL-06 | New customers are approved; one record per TIN and branch code | Fake or duplicate customers | Lock, preventive | Finance approver | Each new customer | Approval log |
| SAL-07 | Credit limit changes and overrides need the Final approver | Sales to customers who can't pay | Lock, preventive | Final approver | Each change | Approval log (sales module) |
| SAL-08 | Allowance for doubtful accounts by provision matrix | Receivables overstated | Habit, detective | Accountant; reviewed by the Finance approver | Quarterly | Aging and matrix workpaper |
| SAL-09 | Bad-debt write-offs need the Final approver | Collections pocketed and written off | Lock, preventive, key | Final approver | Each write-off | Approval log |
| SAL-10 | Invoice Records are never printed for customers; every other external document carries the input-tax phrase | Customers claim input VAT on the wrong document | Lock, preventive | The app | Every print | Print templates |
| SAL-11 | An exempt or zero-rated Invoice Record needs the customer's valid exemption document on file | VAT assessed on sales wrongly treated as exempt | Lock, preventive, key | The app; Accountant | Each Invoice Record | Exemption document with its expiry date |
| SAL-12 | Retention money is tracked per contract to its warranty end date; release overdue raises an alarm | Retention never claimed back | Alarm, detective | Accountant | Monthly | Retention list |

## Purchasing and payments (PUR, PAY)

Payments carry the highest fraud risk in a trading company, so this area has the most key controls.

| ID | Control | Risk | Type | Owner | Frequency | Evidence |
| --- | --- | --- | --- | --- | --- | --- |
| PUR-01 | Purchase orders follow the ₱50,000 tiers (references in app 1) | Unauthorized purchases | Habit plus lock, preventive | Finance approver; Final approver | Each order | Order reference with approver |
| PUR-02 | Three-way match: purchase order, receiving report and supplier invoice agree before a payment voucher | Paying for goods never ordered or received | Lock, preventive, key | The app; Accountant | Each supplier invoice | Match record |
| PUR-03 | Input VAT only from a supplier's VAT Invoice; import VAT only with the import entry and customs receipt | Disallowed VAT claims and penalties | Lock plus alarm, preventive, key | The app | Each supplier invoice | Attached evidence |
| PUR-04 | Received-not-invoiced items are accrued at month-end | Costs in the wrong month | Alarm, detective | Accountant | Monthly | Cut-off list |
| PAY-01 | Payment vouchers follow the ₱50,000 tiers | Unauthorized payments | Lock, preventive, key | Finance approver; Final approver | Each voucher | Approval log |
| PAY-02 | New payees and bank-detail changes need Finance approver approval and call-back verification to a number on file | Payments redirected to a fraudster's account | Habit plus lock, preventive, key | Finance approver | Each change | Call-back record |
| PAY-03 | Two-person release at the bank following the release matrix; nobody releases a payment they prepared | One person moves money alone | Habit linked to lock, preventive, key | Owners; second owner | Each payment | Bank portal log; voucher number in the bank's reference field |
| PAY-04 | No one approves or releases a payment to themselves; related-party payments are released by the second owner only, except payments to the second owner or their relatives, which the Finance approver approves, the admin-owner releases, and the quarterly review pack lists | Self-dealing | Lock, preventive, key | The app; second owner | Each payment | Approval and release log |
| PAY-05 | Split-payment alarm: two or more payments to one payee within 7 days that together reach ₱50,000 | Splitting payments to dodge the higher tier | Alarm, detective | Finance approver reviews | Continuous | Alarm log |
| PAY-06 | Payor withholding is computed on every payment voucher | Under-withholding and penalties | Lock, preventive | The app | Each voucher | Voucher |
| PAY-07 | Each use of the alternate releaser is reported to the second owner the same day; existing verified payees only, within the cap | The stand-in becomes a loophole | Habit, detective | Jose Mahatma de Leon; second owner | Each use | Same-day report |
| PAY-08 | Every bank debit is matched to an approved payment voucher; unmatched debits raise an alarm | Payments made outside the app | Alarm, detective, key | Accountant | Monthly, at bank reconciliation | Reconciliation |
| PAY-09 | An advance to a supplier needs the supplier's proforma invoice and an approved purchase order attached before its payment voucher is submitted | Money paid out for goods never ordered | Lock, preventive, key | The app | Each advance | Proforma invoice; purchase order |
| PAY-10 | Advances not matched to a shipment within 60 days are flagged | Goods paid for but never received | Alarm, detective | Finance approver reviews | Continuous | Advances aging list |

## Cash, collections and bank (CSH)

These controls keep the person who holds money away from the records of it, and prove every peso reaches the bank.

| ID | Control | Risk | Type | Owner | Frequency | Evidence |
| --- | --- | --- | --- | --- | --- | --- |
| CSH-01 | The Cashier holds money and never records or approves; the Encoder records collections | Theft hidden in the records | Lock, preventive, key | The app (role rules) | Every collection | Role setup; posting log |
| CSH-02 | An acknowledgement receipt is issued for every collection received | Collections taken without a trace | Habit, preventive | Cashier | Each collection | Receipt copy |
| CSH-03 | Collections are deposited intact daily and matched to the deposit slip and bank line | Lapping or skimming of collections | Habit plus alarm, detective, key | Cashier; Accountant matches | Daily | Photo of the stamped deposit slip |
| CSH-04 | Collections are recorded within 1 business day and applied to specific Invoice Records | Misapplied payments; wrong aging | Alarm, detective | Encoder | Daily | SLA report |
| CSH-05 | Unapplied collections are held as a liability, with an alarm after 30 days | Overpayments hidden or misused | Alarm, detective | Accountant | Monthly | Unapplied list |
| CSH-06 | Post-dated checks are held on a due-date list; a bounced check reverses the collection | Checks lost or never deposited; overstated cash | Alarm, detective | Cashier; Accountant | Daily | Due-date list |
| CSH-07 | Monthly bank reconciliation by someone who doesn't handle cash, reviewed by the Finance approver and signed off by the second owner; outstanding checks older than 90 days flagged | Errors and theft go unnoticed | Habit, detective, key | Accountant; Finance approver; second owner | Monthly | Signed reconciliation |
| CSH-08 | Petty cash runs on a fixed fund; cash advances are liquidated and approved by someone other than the employee, with an alarm when overdue | Small, frequent leaks | Habit plus alarm, detective | Finance approver; Cashier as custodian (POL-08, POL-09) | As used | Liquidation report |
| CSH-09 | E-wallets are company business accounts used for collections only; the only outflow is a sweep to the company's bank at least weekly; each collection carries the wallet reference; reconciled monthly by someone without the login | Collections diverted to personal wallets or spent from the wallet | Habit plus alarm, detective, key | Cashier holds the login; Accountant reconciles | Weekly sweep; monthly reconciliation | Wallet statement; sweep transfers |

## General ledger and period close (GL, CLS)

These controls keep the books complete, permanent and closed on time.

| ID | Control | Risk | Type | Owner | Frequency | Evidence |
| --- | --- | --- | --- | --- | --- | --- |
| GL-01 | Nothing posts without a source document and its evidence | Entries with no basis | Lock, preventive, key | The app | Every posting | Attachments |
| GL-02 | Posted records are never edited or deleted; only voided or reversed | History rewritten | Lock, preventive, key | The app | Every posted record | Audit log |
| GL-03 | Manual journal entries need an explanation, an attachment and tier approval by someone other than the maker | Fraud through the ledger | Lock, preventive, key | Finance approver; Final approver | Each entry | Approval log |
| GL-04 | Journal-entry alarms (weekend or holiday postings, round amounts, unusual users, rarely used accounts) are reviewed at close | Unusual entries go unseen | Alarm, detective, key | Finance approver | Monthly | Signed alarm review |
| GL-05 | Debits equal credits, and the posting date falls in an open period | Unbalanced or misdated books | Lock, preventive | The app | Every posting | System check |
| GL-06 | Every internal document is numbered without gaps; numbered documents are voided, never deleted | Missing documents hide transactions | Lock, preventive, key | The app | Every document | Number series report |
| GL-07 | New accounts are prepared by the Accountant and approved by the Finance approver; used accounts are deactivated, never deleted | A hidden account to park fraud | Lock, preventive | Accountant; Finance approver | Each account | Approval log |
| GL-08 | Posting rule changes need the accountant's approval and a Class B release | Every future entry posts wrongly | Lock plus habit, preventive | Accountant; server primary | Each change | Release log |
| CLS-01 | Each month closes within the close calendar, from a checklist | Late or incomplete books | Habit, preventive | Accountant | Monthly | Completed checklist |
| CLS-02 | In close, only the Accountant posts, and only adjusting entries | Routine postings change figures under review | Lock, preventive | The app | Monthly | Period state log |
| CLS-03 | Only the Final approver closes or reopens a period; reopening needs a reason and alerts the second owner | Closed figures changed quietly | Lock, preventive, key | Final approver | Monthly; each reopening | Period log |
| CLS-04 | Every balance-sheet account is reconciled monthly, with support and a second person's review | Errors hide in balances | Habit, detective, key | Accountant; Finance approver | Monthly | Signed reconciliations |
| CLS-05 | Intercompany balances are reconciled monthly and net to zero | Group companies' books disagree | Habit, detective | Accountant | Monthly | Reconciliation |
| CLS-06 | Inventory valuation and cost of goods sold monthly; net realizable value check and physical count at year-end | Stock and margins misstated | Habit, detective, key | Accountant | Monthly; yearly | Valuation sheet; count sheets |
| CLS-07 | Open foreign balances are revalued at month-end at the BSP reference rate; rates are never edited once used | Forex misstated | Lock plus habit, detective | Accountant | Monthly | Rate table |
| CLS-08 | Opening balances have a supporting schedule, the external accountant's review and the Final approver's approval, and are entered once | The new books start wrong | Lock, preventive, key | Accountant; Final approver | Once, at cutover | Schedules and approval |
| CLS-09 | Every app report is labeled an internal management report | App reports mistaken for official books | Lock, preventive | The app | Every report | Report templates |
| CLS-10 | The owners receive a monthly review pack, each item marked "Seen, OK" or "Ask about this" | Owners lose sight of the business | Habit, detective | Accountant prepares; owners review | Monthly | Marked review pack |
| CLS-11 | Charges between group companies (rent, vehicle use) follow a written agreement at market rates and are invoiced monthly | Profits shifted between companies; tax adjustments | Habit, preventive | Accountant; second owner approves the agreements | Monthly; yearly review of rates | Agreements; monthly invoices |
| CLS-12 | Fixed assets are kept in the app's register and depreciated monthly; fixed assets and custody items are counted against the register at year-end by two people; disposals need the Final approver | Assets missing, misstated or disposed of without approval | Lock plus habit, detective | Accountant; Finance approver reviews | Monthly depreciation; yearly count | Register; signed count sheets; disposal approvals |

## Tax and withholding (TAX)

Every rule here is verified with the accountant before it is built (see the accountant meeting agenda).

| ID | Control | Risk | Type | Owner | Frequency | Evidence |
| --- | --- | --- | --- | --- | --- | --- |
| TAX-01 | Expected withholding is computed on every collection from the customer type; differences are flagged | Under- or over-withheld amounts go unnoticed | Alarm, detective | The app; Accountant | Each collection | Difference list |
| TAX-02 | A "2307 not yet received" list is chased before each quarterly return | Lost tax credits | Alarm, detective | Accountant | Monthly | 2307 list |
| TAX-03 | Quarterly withholding reconciliation: expected against received against claimed | Credits unclaimed or claimed twice | Habit, detective, key | Accountant; Finance approver | Quarterly | Signed reconciliation |
| TAX-04 | VATable, VAT-exempt and zero-rated sales are kept separate | Wrong VAT returns | Lock, preventive | The app | Every Invoice Record | Sales report |
| TAX-05 | Tax rates and government values live in the settings register and change only after written verification | A wrong rate applied everywhere | Habit plus lock, preventive | Accountant; Admin | Each change | Settings change log |

## IT, data and change (ITC)

These controls protect the system itself, including from its own builder.

| ID | Control | Risk | Type | Owner | Frequency | Evidence |
| --- | --- | --- | --- | --- | --- | --- |
| ITC-01 | MFA for every user; lockout after 5 failed sign-ins for 15 minutes; idle logout after 30 minutes on desks and 10 on tablets | Stolen or shared passwords | Lock, preventive | Admin | Every sign-in | Sign-in log |
| ITC-02 | The audit log is append-only, tamper-evident and copied off the server daily | Evidence altered or lost | Lock, preventive, key | The app; server primary | Continuous; daily copy | Log chain check |
| ITC-03 | Production data changes only through the app; direct database access is emergency-only and logged | The builder edits records directly | Habit plus lock, detective, key | Josephus B. de Leon; reviewed by the second owner | Each access; quarterly review | Emergency access log |
| ITC-04 | Releases are tested before going live, classed A, B or C, and logged with their version | Untested changes corrupt the books | Habit, preventive | Josephus B. de Leon | Each release | Release log |
| ITC-05 | Backups follow the 3-2-1 rule with one immutable copy; a restore is tested quarterly | Data lost for good | Habit, detective, key | Server primary; server backup | Daily; quarterly test | Restore test record |
| ITC-06 | TINs, bank details and government IDs are encrypted in the database | Data breach | Lock, preventive | The app | Continuous | Configuration review |
| ITC-07 | Tablets are company-owned and managed; a lost tablet's sessions are revoked first, then it is wiped | Data on a lost device | Habit, preventive | Admin | Each device; each loss | Device list; incident log |
| ITC-08 | A Data Protection Officer and a breach response plan are in place | Privacy breaches handled late or badly | Habit, preventive | Arielle de Leon | Yearly review; each incident | Plan; incident log |
| ITC-09 | Quarterly plain-language review of admin activity by the second owner | The builder's access goes unchecked | Habit, detective, key | Second owner | Quarterly | Marked review pack |
| ITC-10 | Automatic security updates, dependency checks in CI, and alerts for disk, uptime and failed sign-ins | Known vulnerabilities exploited | Habit plus alarm, preventive | Server primary | Continuous | Alert log |
| ITC-11 | Each company's registration status gates invoice issuance and official labels: until registered, nothing prints as an Invoice or an official book | App output mistaken for official invoices or books | Lock, preventive | The app; second owner changes the status | Every print and export | Setting S45 change log |
| ITC-12 | For companies issuing e-invoices: the transmission log is reviewed daily, and rejected or unsent e-invoices are fixed the same day | E-invoices that never reach the BIR | Alarm, detective, key | Accountant | Daily, once registered | Transmission log |

## Approval matrix

One line at ₱50,000 runs through the whole matrix: below it the Finance approver decides, and at or above it the Final approver also approves; each line is a separate company setting.

| Action | Below ₱50,000 | ₱50,000 or more | Also required |
| --- | --- | --- | --- |
| Routine entries matched to a source document | None; the Accountant posts | None; the Accountant posts | Source document attached |
| Manual journal entries | Finance approver | Finance approver, then Final approver | Explanation and attachment |
| Payment vouchers | Finance approver | Finance approver, then Final approver | Three-way match passed; call-back for new payees |
| Purchase orders | Finance approver | Finance approver, then Final approver | — |
| Credit memos, debit memos, discounts, stock write-offs | Finance approver | Finance approver, then Final approver | — |
| Voids and reversing entries | Finance approver | Finance approver, then Final approver | Reason required |
| Landed cost sheets | Finance approver | Finance approver | Every cost component evidenced |
| Bad-debt write-offs | Final approver | Final approver | Provision matrix support |
| New customers and suppliers | Finance approver | Finance approver | One record per TIN and branch code |
| New payees and bank-detail changes | Finance approver | Finance approver | Call-back verification |
| Credit limit changes and overrides | Final approver | Final approver | — |
| New accounts in the chart of accounts | Finance approver | Finance approver | Prepared by the Accountant |
| Posting rule changes | Accountant | Accountant | Released as Class B |
| User access changes to financial roles | Second owner | Second owner | Made by the Admin, never for themselves |
| Opening balances | Final approver | Final approver | After the external accountant's review |
| Closing or reopening a period | Final approver | Final approver | Reason required to reopen |
| Discount authority at quotation | Percentage tiers in settings | Percentage tiers in settings | Set with the sales module |

**Always (lock):** no one approves their own work, and no one approves or releases a payment to themselves.

## Bank release matrix

Every payment is prepared by one person and released by another in the bank portal, with the payment voucher number in the bank's reference field.

| Payment | Who releases | Never |
| --- | --- | --- |
| Routine, existing verified payee, below ₱50,000 | Either owner | The person who prepared it |
| ₱50,000 or more | Second owner | The person who prepared it |
| New payee or changed bank details | Second owner | Before call-back verification |
| To the admin-owner or a related party | Second owner only | Anyone else, including the alternate releaser |
| To the second owner or their relatives | Admin-owner, after the Finance approver's approval; listed in the quarterly review pack | The second owner |
| Linked intercompany payment below ₱50,000 | Either owner | Without both sides recorded |
| ₱50,000 or more while the second owner is away | Jose Mahatma de Leon, existing verified payees only, within the cap | Above the cap (recommended ₱250,000 per payment, ₱1,000,000 per absence); unreported |

The bank's own maker and approver rights must match this matrix; that is on the open list for the bank.

## Segregation of duties

No role both holds money and records it, and no role approves what it prepared; the app warns when one person is given a conflicting pair.

| Role | Prepare | Post | Approve | Hold cash | Reconcile | Manage users |
| --- | --- | --- | --- | --- | --- | --- |
| Encoder | Yes | No | No | No | No | No |
| Accountant | Yes | Routine entries only | No | No | Yes | No |
| Finance approver | No | No | First level | No | Reviews | No |
| Final approver | No | No | High value, periods | No | Signs off | No |
| Cashier | Receipts only | No | No | Yes | No | No |
| Admin | No | No | No | No | No | Yes |
| Auditor | No | No | No | No | No | No |

**Who holds what today:**

| Person | Role or duty |
| --- | --- |
| Margaret DL Laforteza | Finance approver for every company; Arima Treasurer without cash custody or bank release; Agno stockholder |
| Arielle de Leon (second owner) | Final approver; bank release for ₱50,000 or more, new payees and related parties; quarterly reviews |
| Josephus B. de Leon | Admin (admin login); owner login for routine bank release only; server primary; design owner; Merritmed's sole proprietor (never its Final approver); Agno treasurer; Arima officer |
| Jose Mahatma de Leon | Alternate releaser; holds no app role |
| Arielle de Leon | Data Protection Officer |
| Encoder, Accountant, Cashier | To be named in the staffing grid |

## Testing, review and deficiencies

Controls are proven twice: once that they are designed right, and again, regularly, that they actually run.

| When | What | Who |
| --- | --- | --- |
| Parallel run (April to June 2027) | Walk one real transaction through each chain and confirm every control fires and leaves its evidence | Accountant; Josephus B. de Leon |
| Every month-end | Collect the close evidence: reconciliations, alarm reviews, register sign-off | Accountant; Finance approver |
| Every quarter | User access, admin activity, withholding reconciliation and restore test, in the owner's review pack | Second owner |
| Every year | The external auditor reviews this register's design and samples the key controls; the register is updated and versioned | External auditor; owners |

**Deficiency log:** any control that didn't run or didn't work is logged here with a fix, an owner and a due date, and reviewed in the quarterly review pack.

| Date | Control ID | What happened | Impact | Fix | Owner | Due | Status |
| --- | --- | --- | --- | --- | --- | --- | --- |
| Example | CSH-03 | Monday's collections deposited on Wednesday | None found; all amounts matched | Reminder; deposits added to the daily checklist | Cashier | Next week | Closed |

## Decisions on open questions

All five were decided on October 20, 2026; C4 and C5 are confirmed by the external auditor at the first review.

| # | Question | Decision | Status |
| --- | --- | --- | --- |
| C1 | CSH-08 depends on policies not yet written: petty cash, cash advances and check custody. | Written alongside this register, in the company policies document | Done: Company Policies 0.2 |
| C2 | Should landed cost sheets follow the ₱50,000 tiers? | No: the Finance approver at any amount, since each cost was already approved when it was recorded | Decided |
| C3 | Which owner signs off the monthly bank reconciliation (CSH-07)? | The second owner, as the owner independent of the system | Decided |
| C4 | Which controls are key? | The ones marked here are the starting list; the external auditor confirms | Decided, pending auditor |
| C5 | How should deficiencies be graded? | The external auditor's grading: deficiency, significant deficiency, material weakness | Decided, pending auditor |

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.5 (update) | October 21, 2026 | Precedence line updated to the current versions of the Executive Summary and related documents; no content change. |
| 0.5 (update) | October 20, 2026 | Added CLS-12 fixed assets and custody items (84 controls), from POL-16. |
| 0.5 | October 20, 2026 | From BIR Readiness Map 0.1: added ITC-11 registration status gate and ITC-12 e-invoice transmission review (83 controls); named Arielle de Leon as second owner and Margaret DL Laforteza's roles. |
| 0.4 | October 20, 2026 | From Chart of Accounts 0.3: added GEN-12 shared-staff check, SAL-11 exemption documents, SAL-12 retention tracking, PAY-09 and PAY-10 supplier advances, CSH-09 e-wallets, CLS-11 group-company charges (81 controls). PAY-04 and the bank release matrix now cover payments to the second owner. |
| 0.3 | October 20, 2026 | Added GEN-11 mandatory leave (74 controls); CSH-08 owner set by Company Policies 0.2. |
| 0.2 | October 20, 2026 | C1 to C5 decided: policies written with the company policies document, landed cost sheets by the Finance approver at any amount, bank reconciliation signed off by the second owner, key controls and deficiency grading confirmed by the external auditor. |
| 0.1 | October 20, 2026 | First draft: 73 controls in nine areas, the approval matrix, the bank release matrix, segregation of duties, testing and the deficiency log, open questions C1 to C5. |
