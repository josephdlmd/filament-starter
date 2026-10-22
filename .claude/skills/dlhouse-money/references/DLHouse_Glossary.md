# DLHouse Glossary 0.7

Oct 20, 2026 · @Joseph de Leon

## About this version

Version 0.6 adds the business terms from Chart of Accounts 0.3 (imports, e-wallets, government retention, group companies). Version 0.5 added document type codes and "Delivered, awaiting acceptance" from Worked Examples 0.2. Version 0.4 folded in every decision approved on October 20, 2026, including the regulatory positions, the named roles and the lifecycle terms: statuses, numbering, roles, multi-company, revenue recognition, foreign currency, release classes, and the regulatory term check.

**Scope:** multicommodity trading to government agencies and businesses in the Philippines. First app: accounting and bookkeeping under PFRS for Small Entities, in one installation serving Merritmed Medical Supplies and the group's other trading companies.

**Precedence:** regulation first, then the DLHouse Executive Summary, then this glossary. Where a regulation names something, we copy its wording exactly. Where this glossary differs from the summary, the glossary is corrected.

**Language:** English only. "(proposed)" marks a term or rule not yet approved.

## How to use this glossary

Every term has one meaning, used the same way in conversations, screens, code, reports and AI guidelines.

- **Use the exact term.** If a term isn't here, add it before it appears in a screen or in code.
- **Only working terms.** A term earns an entry when it appears in a screen, in code or in a policy.
- **Columns:** Term (with the code name in `backticks`), Meaning (plain language, plus "Printed as" when paper shows a different title), Control, Source, and Avoid.
- **Control tags:** **lock** (the app enforces it), **alarm** (the app flags it), **habit** (a procedure done outside the app).
- **Source:** a regulation (e.g. RR 7-2024), PFRS for Small Entities, or House. Regulated entries say "Verified: not yet" until the accountant confirms them; then the name and date replace it.
- **Amounts are settings.** ₱50,000 and every other threshold is a company setting with a starting value, never hardcoded.
- **One source.** This glossary feeds the screen text (language files), status values and Boost guidelines. A rename happens here once and is logged in the changelog.

## 1. Core controls

Fourteen house controls apply in every app; the first five are the minimum control set from the executive summary.

1. **Two-person release in online banking** (habit, linked to a lock). No payment leaves the bank on one person's say.
2. **Deposit collections intact, daily** (habit plus alarm). Collections are matched to deposit slips and bank lines.
3. **No one approves their own work** (lock). The app checks this on every transaction.
4. **Monthly bank reconciliation** (habit). Done by someone who does not handle cash, and signed off by the second owner.
5. **Call-back verification for any bank-detail change** (habit plus lock).
6. **Every peso is traceable** (lock). Every amount links to a source document.
7. **Posted means permanent** (lock). Posted records are voided or reversed, never edited or deleted.
8. **Closed periods never change** (lock). Corrections go into the current open period.
9. **No gaps in numbering** (lock). The system numbers every internal document.
10. **Approve by risk, not by volume** (lock). Routine documented work flows through; approvers see the exceptions.
11. **Everything leaves a trail** (lock). The audit log is append-only. No one, including the admin, can edit it.
12. **Companies never mix** (lock). Every record belongs to one company; only owners' consolidated views combine them.
13. **Only an Invoice supports input VAT** (lock plus alarm). A supplier's delivery receipt or official receipt never does. Named exception: import VAT, supported by the import entry and customs receipt.
14. **Every external document except the Invoice carries the input-tax phrase** (lock).

## 2. Statuses, numbering and dates

Every document uses the same five lifecycle statuses; anything else that happens to it is an event or a progress state.

| Term | Meaning | Control | Source | Avoid |
| --- | --- | --- | --- | --- |
| **Draft** `draft` | Being prepared. Can be edited or deleted. Has no number and no effect on stock or the books. | — | House |  |
| **Submitted** `submitted` | Sent for approval. Used only when the approval matrix requires it. Locked until approved, rejected or recalled. | Lock | House |  |
| **Approved** `approved` | Accepted by the required approver or approvers. | Lock: never by the maker | House |  |
| **Posted** `posted` | Final. Affects the books and/or stock. Routine entries matched to source documents go from Draft to Posted by the Accountant. | Lock: never edited or deleted | House |  |
| **Voided** `voided` | Cancelled after posting, allowed only while its period is open. Keeps its number, stays visible, and its effects are reversed. | Lock: reason plus Finance approver | House | deleted, cancelled |
| **Rejected** (event) | An approver turns a document down. It returns to Draft with the reason logged. Not a status. | Lock: reason required | House |  |
| **Recalled** (event) | The maker pulls a submitted document back before any decision. It returns to Draft, logged. | — | House |  |
| **Progress state** | A document type's own steps beyond the lifecycle. Examples: a payment voucher goes Approved, Released, Matched; a quotation ends Accepted, Expired or Lost. | — | House | status |
| **Reversing entry** | A new entry, posted in the current open period, that undoes a posted entry from a closed period. The original stays untouched. | Lock: reason plus Finance approver | House | reversal (as a status) |
| **Document number** | Assigned when a document leaves Draft and never reused. Format: `CO-TYPE-YYYY-000001`. | Lock: no gaps | House; BIR sequencing, Verified: not yet |  |
| **Number series** | One sequence per company, document type and fiscal year, kept in settings. | Lock | House |  |
| **Document type code** | The short code for a document type inside a document number, as in STC-PV-2027-000008. Starting codes: IR Invoice Record, COL collection, CM credit memo, DM debit memo, SI supplier invoice, PV payment voucher, JE journal entry, LCS landed cost sheet, CA cash advance. | Lock: one code per type, kept in settings (S35) | House |  |
| **Document date** | The date on the document itself, such as the delivery date. | — | House |  |
| **Posting date** | The accounting date an entry belongs to. Must fall in an open period. | Lock | House; Verified: not yet |  |
| **Recorded at** | The system timestamp when someone saved or posted. Never editable. | Lock | House |  |

## 3. People and roles

Seven roles plus the owner terms; a small team may combine roles, but the app checks every transaction so no one approves their own work.

| Term | Meaning | Control | Source | Avoid |
| --- | --- | --- | --- | --- |
| **User** `User` | One real person who signs in. | Lock: accounts are never shared | House |  |
| **Owner** | A person who owns a group company: its sole proprietor, or a stockholder of a family corporation. Each company's owners are named in the staffing grid. A person attribute, not a role; owners act through roles. | — | House |  |
| **Second owner** | The owner who does not hold the system admin login. Releases large, new-payee and related-party bank payments and does the quarterly review. Holds the Final approver role. | — | House |  |
| **Admin-owner** | The builder: an owner who also holds system admin. Has two logins, admin with no financial rights and owner with no admin rights. Their owner login holds no approver role. | Compensating controls | House |  |
| **Encoder** | Prepares entries and Invoice Records, and captures evidence. | Lock: never approves or posts | House |  |
| **Accountant** | Reviews and posts routine entries. Prepares the opening trial balance. | Lock: never approves own work | House |  |
| **Finance approver** | Gives first-level approvals, including voids and reversals. Held by a senior finance staff member. | Lock: never handles cash | House |  |
| **Final approver** | Gives high-value and sensitive approvals, approves credit limit overrides and opening balances, and closes or reopens periods. | Lock: never encodes | House |  |
| **Cashier** | Holds cash and checks and makes deposits. | Lock: never records or approves | House |  |
| **Admin** | Manages users and settings. | Lock: no financial approval | House |  |
| **Auditor** `auditor` | Read-only access to all records and the audit log, for the external accountant and auditor. Time-limited account with its own MFA. | Lock: no changes; exports logged | House | shared auditor login |
| **Design owner** | The one named person who approves rung-5 screen exceptions. | Habit: exceptions logged | House |  |
| **Data Protection Officer** | The named person responsible for privacy compliance and breach response. Not the admin-owner. | Habit | Data Privacy Act; Verified: not yet |  |
| **Maker** | The person who prepared a document or entry. | — | House |  |
| **Checker** | The person who reviews and approves the maker's work. | Lock: never the maker | House |  |
| **Delegate** | A person temporarily given someone else's approval rights, for example during leave. | Lock: start and end dates, logged, cannot approve own work | House |  |
| **Escalation** | An approval waiting longer than the escalation setting moves to the next approver or a delegate. | Alarm | House |  |
| **Alternate releaser** | Jose Mahatma de Leon may release bank payments of ₱50,000 or more to existing verified payees, up to a cap the second owner sets in writing, when the second owner is unavailable. Never for related-party payments to the admin-owner. | Habit plus lock | House |  |
| **Small-team mode** | Roles combined in a small team, with the own-work check still applied to every transaction. | Alarm: conflicting roles warn; owner's acceptance logged | House |  |
| **Compensating control** | An extra check that makes up for a duty that can't be separated, such as the admin-owner's two logins and quarterly review. | — | House |  |
| **Review pack** | A plain-language summary for an owner, where each item is marked "Seen, OK" or "Ask about this." | Habit | House |  |

## 4. Companies and partners

One installation serves every group company, and every record belongs to exactly one of them.

| Term | Meaning | Control | Source | Avoid |
| --- | --- | --- | --- | --- |
| **Company** `Company` | One legal taxpayer with its own TIN, books, number series and BIR registration. VAT status is a per-company setting. | Lock: every record belongs to one company | House; registration per company, Verified: not yet | entity |
| **Branch** | A BIR-registered branch of a company, identified by its branch code. | — | BIR; Verified: not yet |  |
| **Active company** | The company a user is working in, shown prominently on every screen. | Lock: entries post only to the active company | House |  |
| **Intercompany transaction** | A transaction between two group companies, recorded on both sides as a linked pair. Either owner may release payments below ₱50,000. Balances are reconciled monthly and must net to zero. | Lock: both sides recorded | House |  |
| **Partner** `Partner` | Any outside business, government agency or person we deal with. Customer, supplier and payee are roles; one partner can hold several. | Lock: one record per TIN and branch code | House |  |
| **Customer** | A partner we sell to: a business or a government agency. | — | House | client |
| **Government customer** | A government agency customer. Different withholding rules apply (see Tax). | — | House |  |
| **Supplier** | A partner we buy goods from. | — | House | vendor |
| **Payee** | Anyone we pay money to. | — | House |  |
| **Verified payee** | A payee whose bank details have passed call-back verification. | Lock | House |  |
| **Related party** | An owner, an owner's relative, or an affiliated company. | Lock: payments released by the second owner only, except under the intercompany rule | House; Verified: not yet |  |
| **Call-back verification** | Phoning a known number on file, never the number in the request, to confirm a new payee or a bank-detail change. | Habit plus lock | House |  |
| **TIN** | Taxpayer Identification Number plus branch code. Sensitive personal information when it belongs to an individual. | Lock: format validated; encrypted at rest | BIR, Data Privacy Act; Verified: not yet |  |
| **Credit limit** | The most a customer may owe us at one time. | Lock: overrides need the Final approver | House |  |
| **Credit terms** | How many days a customer has to pay, for example "30 days." | — | House | payment terms |
| **Property company** | A group company that owns land and buildings and leases them to group companies at market rent. Passive: no trading or logistics. | Habit: written lease (CLS-11) | House; Verified: not yet | holding company (unless it also owns shares) |
| **Holding company** | A corporation that owns shares in the group's operating companies. A sole proprietorship cannot sit under it unless incorporated first. | — | SEC; Verified: not yet |  |
| **Group-company charge** | Rent, vehicle use or another service one group company bills another, under a written agreement at market rates, invoiced monthly. | Habit (CLS-11) | House | sharing (without charges) |
| **Company type** | What a group company does for chart purposes: operating (trading goods), property, holding or services. A company may hold more than one type. | Setting (S44) | House |  |
| **Account profile** | The set of accounts from the shared chart switched on for a company type; anything outside it needs an approved request. | Lock (GL-07) | House |  |

## 5. Sales chain

The chain runs Quotation, Sales order, Delivery receipt, Invoice (handwritten, recorded as an Invoice Record), then Collection. In the first app, sales orders and delivery receipts are references (number, date, photo) until the sales module exists.

| Term | Meaning | Control | Source | Avoid |
| --- | --- | --- | --- | --- |
| **Quotation** `Quotation` | A price offer with a validity date. No effect on the books. | — | House |  |
| **Sales order** `SalesOrder` | A customer's confirmed order. | Lock: checked against the credit limit (sales module) | House |  |
| **Delivery receipt** `DeliveryReceipt` | Proof the customer received the goods. Revenue is recognized when it is signed. A supplementary document. | Habit plus lock: signed copy photographed as evidence | RR 7-2024; Verified: not yet |  |
| **Invoice** | The legal BIR invoice and the only primary sales document. Handwritten on registered booklets for now. Printed as: the exact title on our registered booklets (to record). | Firm rule: "Invoice" alone means only this document | EOPT Act, RR 7-2024; Verified: not yet | receipt, bill, official receipt |
| **VAT Invoice** | An Invoice issued by a VAT-registered company. Basis of our output VAT and the customer's input VAT. | — | RR 7-2024; Verified: not yet |  |
| **Non-VAT Invoice** | An Invoice issued by a non-VAT company. Basis of percentage tax where it applies. | — | RR 7-2024; Verified: not yet |  |
| **Invoice Record** `InvoiceRecord` | The app's internal record of a handwritten Invoice, linked to its sales order and delivery receipt. The one deliberate use of "Invoice" inside another name. | Lock: never printed for or sent to customers; internal printouts carry the input-tax phrase and "Internal reference" | House |  |
| **Invoice booklet** | A registered booklet of pre-numbered Invoices, tracked by its serial range. | Habit | BIR; Verified: not yet |  |
| **Spoiled invoice** | A handwritten Invoice cancelled or damaged before being issued. | Lock: recorded with a reason; original copies kept | BIR; Verified: not yet |  |
| **Manual invoice register** `InvoiceRegister` | Every booklet serial number and what happened to it: issued (with its Invoice Record), spoiled, or unused. | Alarm: gaps and unaccounted serials | House |  |
| **Statement of account** `StatementOfAccount` | A summary of what a customer owes, sent to prompt payment. Always supplementary; never converted into a Billing Invoice. | Lock: carries the input-tax phrase | RR 7-2024; Verified: not yet | billing invoice, bill |
| **Supplementary document** | Any document that supports a sale or payment but is not an Invoice: delivery receipts, statements of account, credit and debit memos, acknowledgement receipts, purchase orders. Cannot support an input VAT claim. | Lock: carries the input-tax phrase | RR 7-2024; Verified: not yet |  |
| **Input-tax phrase** | "THIS DOCUMENT IS NOT VALID FOR CLAIM OF INPUT TAX," printed conspicuously on every external document except the Invoice. | Lock | RR 7-2024; Verified: not yet |  |
| **Collection** `Collection` | Money received from a customer, applied to specific Invoice Records. | Habit plus alarm: deposited intact and daily, matched to the deposit slip and bank line | House | payment |
| **Unapplied collection** | Money received before invoicing or beyond what is owed, held until applied. | Alarm: unapplied after 30 days | House |  |
| **Acknowledgement receipt** | The supplementary document given when a collection is received; proof of payment. Wording still to confirm. | Lock: carries the input-tax phrase | RR 7-2024; Verified: not yet | official receipt, collection receipt, "acknowledgment" spelling |
| **Credit memo** `CreditMemo` | Reduces what a customer owes: returns, discounts, corrections. | Lock: Finance approver below ₱50,000; then Final approver at ₱50,000 or more | House |  |
| **Debit memo** `DebitMemo` | Increases what a customer owes, such as an undercharge correction. | Lock: same tiers as credit memos | House |  |
| **Sales return** `SalesReturn` | Goods coming back from a customer. Creates a credit memo. | — | House |  |
| **Delivered, not invoiced** | Signed delivery receipts with no Invoice Record by month-end; the Accountant accrues them. | Alarm | House |  |
| **Delivered, awaiting acceptance** | Goods delivered to a government customer whose contract makes inspection and acceptance the transfer point, not yet accepted at month-end. Tracked on its own list and not accrued as revenue. | Alarm: listed at cut-off | House; Verified: not yet | delivered, not invoiced (for these deliveries) |
| **Exemption document** | The customer's certificate or BIR ruling proving its purchases are VAT-exempt or zero-rated, with its validity date. | Lock (SAL-11) | BIR; Verified: not yet | non-profit (as a reason for exemption) |

## 6. Purchasing, payments and cash

Money leaves through two gates: a payment voucher approved in the app, then a two-person release at the bank.

| Term | Meaning | Control | Source | Avoid |
| --- | --- | --- | --- | --- |
| **Purchase order** `PurchaseOrder` | Our approved order to a supplier. A supplementary document. Approval tiers: open. | Lock: carries the input-tax phrase | House |  |
| **Receiving report** `ReceivingReport` | Records the goods actually received, checked against the purchase order. | — | House | RR (also means Revenue Regulations) |
| **Supplier invoice** `SupplierInvoice` | The legal Invoice a supplier issues to us. Creates a payable. Supports input VAT only if it is a VAT Invoice. | Lock plus alarm: input VAT from a supplier's delivery or official receipt is blocked | RR 7-2024; Verified: not yet | bill |
| **Three-way match** | Purchase order, receiving report and supplier invoice must agree before payment. | Lock: a mismatch blocks the payment voucher | House |  |
| **Purchase return** `PurchaseReturn` | Goods we send back to a supplier. | — | House |  |
| **Supplier credit memo** `SupplierCreditMemo` | A supplier's document that reduces what we owe them. | — | House |  |
| **Purchase debit memo** `PurchaseDebitMemo` | Our document to a supplier that reduces what we owe, for example after a purchase return. | Lock: carries the input-tax phrase | House | debit memo (customer-side term) |
| **Payment voucher** `PaymentVoucher` | Approval in the app to pay a payee; the first gate. Progress: Approved, Released, Matched. | Lock: Finance approver below ₱50,000; then Final approver at ₱50,000 or more; new payee adds call-back; number goes in the bank's reference field | House |  |
| **Bank release** | The second gate: releasing the payment in the bank portal, which takes two people. Routine below ₱50,000 to a verified payee: either owner. ₱50,000 or more, new payees or changed bank details: second owner. Related parties: second owner only. | Habit plus lock: nobody releases a payment they prepared | House |  |
| **Split-payment alarm** | Flags two or more payments to one payee within the alarm window (starting value: 7 days) that together reach ₱50,000. | Alarm | House |  |
| **Payment** `Payment` | Money we pay out. Bank debits are matched to approved payment vouchers. | Lock | House | collection |
| **Check** | A paper check we issue or receive. Custody policy: open. | Habit | House | cheque |
| **Post-dated check** | A check dated in the future, held and not deposited until its date. | Alarm: due-date list | House |  |
| **Bounced check** | A deposited check the bank returned unpaid. Reverses the collection and reopens the customer's balance. | Alarm | House |  |
| **Deposit slip** | The bank's stamped proof of a deposit, attached as evidence. | Habit | House |  |
| **Petty cash** | A small cash fund for minor expenses, replenished against receipts. Policy: open. | Habit | House |  |
| **Cash advance** | Cash given to an employee before an expense, such as delivery costs. | Alarm: unliquidated past a set number of days | House |  |
| **Liquidation** | The employee's accounting for a cash advance, with receipts and any returned change. | Lock: approved by someone other than the employee | House |  |
| **Received, not invoiced** | Goods received with no supplier invoice by month-end; the Accountant accrues them. | Alarm | House |  |
| **Proforma invoice** | A foreign supplier's quotation-style invoice requesting payment before shipment. Supports an advance, never a purchase or input VAT. | Lock (PAY-09) | House |  |
| **Advance to supplier** | Money paid before goods arrive, held as an asset until the goods ship; paid in pesos and never revalued. | Lock plus alarm (PAY-09, PAY-10) | PFRS for Small Entities; Verified: not yet | deposit, down payment (in screens) |
| **E-wallet** | A company business account with GCash or Maya used only to receive collections, swept to the company's bank at least weekly. | Habit plus alarm (CSH-09) | House | personal wallet |

## 7. Inventory and imports

The first app keeps inventory in total (periodic), valued monthly by the accountant; item-level stock movements arrive with the inventory module.

| Term | Meaning | Control | Source | Avoid |
| --- | --- | --- | --- | --- |
| **Product** `Product` | Any item we buy and sell. Multicommodity; no batch or lot tracking for now. | — | House | item, SKU (in screens) |
| **Unit of measure** | The unit we count and sell in, such as piece, box or case. | — | House | UOM (in screens) |
| **Stock** | Goods on hand. Kept in total only in the first app. | — | House |  |
| **Inventory valuation** | The monthly value of stock on hand, prepared by the accountant. Basis for cost of goods sold in the first app. | Habit | House; periodic method, Verified: not yet |  |
| **Cost of goods sold** | The cost of the goods sold in a period. | — | PFRS for Small Entities | COGS (in screens) |
| **Weighted average cost** | A product's cost averaged over everything in stock. The house costing method, decided pending accountant confirmation. | — | PFRS for Small Entities; Verified: not yet | average cost |
| **Landed cost** | The full cost of an imported item: purchase price plus freight, insurance, duties, taxes and brokerage. | Lock: every component links to a source document | House; Verified: not yet |  |
| **Incoterms** | The trade term that sets who pays and carries risk for each leg of a shipment, such as FOB or CIF. | — | ICC Incoterms |  |
| **HS/AHTN code** | The tariff classification code that sets an imported item's duty rate. | — | Customs; Verified: not yet |  |
| **Customs exchange rate** | The rate the Bureau of Customs uses to compute duties. May differ from our accounting rate; landed cost records both. | — | Bureau of Customs; verify with broker |  |
| **Landed cost sheet** | One sheet per import shipment that gathers every cost and allocates it to the items, by value by default. | Lock: approved by the Finance approver before posting | House |  |
| **Net realizable value** | What stock will sell for, less the costs to sell it. Stock is written down when this falls below cost. | Habit: checked at least at year-end | PFRS for Small Entities; Verified: not yet |  |
| **Commercial invoice** | A foreign supplier's invoice for imported goods. Supports the purchase and the payable; never input VAT. Not an "Invoice" in our sense. | Lock: input VAT set to zero | Customs; Verified: not yet | invoice (alone) |
| **Own-name import** | An import where our company is the importer of record; costs gather in goods in transit and post through a landed cost sheet; import VAT claimable with customs documents. | Lock (PUR-03) | Customs; Verified: not yet |  |
| **Door-to-door import** | An import where the forwarder is the importer of record and bills us an all-in cost; input VAT only from the forwarder's VAT Invoice in our name. | Lock (PUR-03) | Customs; Verified: not yet |  |

## 8. Accounting

Each company reports under PFRS for Small Entities in pesos, and every entry traces back to a source document.

| Term | Meaning | Control | Source | Avoid |
| --- | --- | --- | --- | --- |
| **Reporting framework** | The accounting standard a company reports under. Default: PFRS for Small Entities; a per-company setting. | — | SEC; Verified: not yet |  |
| **Accounting policy** | A choice allowed within the framework, such as the costing method. Set per company, with the accountant. | Habit | PFRS for Small Entities |  |
| **Functional currency** | Philippine peso, for every company. | — | PFRS for Small Entities; Verified: not yet |  |
| **Exchange rate** | The rate on a transaction's date from one named source (default: BSP reference rate). | Lock: never edited once used | House; Verified: not yet | forex rate |
| **Forex gain or loss** | The difference when a foreign-currency balance settles at a rate other than the one recorded. Month-end treatment of open balances: open. | — | PFRS for Small Entities; Verified: not yet |  |
| **Revenue recognition point** | Revenue is recognized when the customer signs the delivery receipt; for government sales, at inspection and acceptance where the contract makes that the transfer point. Separate from output VAT timing. | Lock | PFRS for Small Entities; Verified: not yet |  |
| **Chart of accounts** `Account` | The master list of accounts. Each account carries reporting-category tags. | Lock: used accounts are deactivated, never deleted | House |  |
| **Journal entry** `JournalEntry` | The accounting record of a business event, usually created automatically from a source document. | Lock: debits equal credits | House |  |
| **Posting rule** `PostingRule` | The recipe that turns a business event into a journal entry. A change is a Class B release. | Lock: changed only with the accountant's approval | House |  |
| **Manual journal entry** | A journal entry typed directly. | Lock: Finance approver below ₱50,000; then Final approver at ₱50,000 or more | House |  |
| **Source document** | The document that proves a transaction happened. | — | House |  |
| **Evidence** | A photo or scan attached to a record: a 2307, a signed delivery receipt, a deposit slip. | — | House |  |
| **Period** | One month of accounting. | — | House |  |
| **Period close** | Finishing a period: reconcile, review, lock. | Lock: only the Final approver closes or reopens; reopening needs a reason | House |  |
| **Closed period** | A period that has been closed. Corrections go into the current open period as reversing entries. | Lock: never changes | House |  |
| **Trial balance** | A list of all account balances, proving total debits equal total credits. | — | House |  |
| **Books of accounts** | The system-generated books the BIR requires. | — | BIR; Verified: not yet |  |
| **Accounts receivable** | What customers owe us. | — | House | AR (in screens) |
| **Accounts payable** | What we owe suppliers. | — | House | AP (in screens) |
| **Aging** | Unpaid balances grouped by lateness: current, 1–30, 31–60, 61–90 and over 90 days. | — | House |  |
| **Bank reconciliation** | Matching our records to the bank statement, monthly. | Habit: by someone who does not handle cash, signed off by the second owner | House |  |
| **Opening balance** | Balances on the cutover date. The accountant prepares the opening trial balance, the external accountant reviews it, and the Final approver approves it. | Lock: entered once | House |  |
| **Audit log** | The permanent record of who did what, and when. | Lock: append-only; no one, including the admin, can edit it | House |  |
| **Cut-off** | A transaction belongs to the period of its event (the signed delivery, the goods received), not the date it was typed. | Alarm: delivered-not-invoiced and received-not-invoiced lists | House |  |
| **In close** | The period state between Open and Closed: only the Accountant may post, and only adjusting entries. | Lock | House | soft close |
| **Auto-reversing accrual** | An accrual the app reverses automatically on the first day of the next period. | Lock | House |  |
| **Close calendar** | The fixed number of business days (5 to 10) in which each month is closed, run from a checklist. | Habit | House |  |
| **Balance-sheet reconciliation** | Proving each balance-sheet account's balance with support, monthly, reviewed by a second person. | Habit | House |  |
| **Intercompany reconciliation** | Matching balances between group companies monthly; they must net to zero. | Habit | House |  |
| **Journal-entry alarm** | A flag on a risky manual entry: weekend or holiday posting, round amount, unusual user, rarely used account. | Alarm: reviewed at close | House |  |
| **Provision matrix** | The allowance for doubtful accounts set as a percentage per aging bucket, reviewed quarterly. | Habit | PFRS for Small Entities; Verified: not yet |  |
| **Internal management report** | Any report the app produces. Labeled as such and never filed with the BIR as books of accounts. | Lock: label printed on every report | House | books (for app reports) |
| **Fixed-asset register** | The app's list of every fixed asset with its tag, cost, date, useful life and depreciation to date; the source for accounts 1510 to 1590. | Lock plus habit (CLS-12) | PFRS for Small Entities; Verified: not yet |  |
| **Capitalization threshold** | The cost (starting at ₱20,000) at or above which an item used for more than a year becomes a fixed asset instead of an expense. | Setting (S46) | House |  |
| **Custody list** | Portable or theft-prone items below the threshold, expensed but tagged, each with the person responsible; counted yearly. | Habit (CLS-12) | House |  |

## 9. Tax

Every entry in this section needs the accountant's verification before anything is built on it.

| Term | Meaning | Control | Source | Avoid |
| --- | --- | --- | --- | --- |
| **VAT** | Value-added tax at 12%, kept in settings. | — | Tax Code; Verified: not yet |  |
| **Output VAT** | VAT we charge on sales. | — | Tax Code; Verified: not yet |  |
| **Input VAT** | VAT suppliers charge us, or VAT paid on imports. Claimed only from a supplier's VAT Invoice; for imports, from the import entry and customs receipt. | Lock plus alarm | RR 7-2024; Verified: not yet |  |
| **VATable sales** | Sales subject to 12% VAT. Shown separately on Invoices and reports. | — | BIR; Verified: not yet | VAT-able |
| **VAT-exempt sales** | Sales not subject to VAT. Shown separately. | — | BIR; Verified: not yet |  |
| **Zero-rated sales** | Sales taxed at 0% VAT. Shown separately. | — | BIR; Verified: not yet |  |
| **Creditable withholding tax** | Tax a customer withholds from what they pay us, supported by BIR Form 2307. | — | BIR; Verified: not yet |  |
| **BIR Form 2307** | Certificate of Creditable Tax Withheld at Source. Use the full name once in a document, then "2307." | — | BIR; Verified: not yet |  |
| **Government withholding** | On sales of goods to government agencies: 5% creditable VAT withholding plus 1% expanded withholding, both supported by 2307s. | — | BIR; Verified: not yet |  |
| **Expected withholding** | The withholding the app expects on a collection, based on the customer type. | Alarm: differences flagged | House |  |
| **2307 not yet received** | Collections where withholding was deducted but the 2307 has not been received and filed as evidence. | Alarm | House |  |
| **Payor withholding** (proposed name) | Tax we withhold from what we pay suppliers, landlords and professionals, for which we issue 2307s. Rates and filings: to confirm. | — | BIR; Verified: not yet |  |
| **Structured e-invoice** | An Invoice issued electronically in a machine-readable format for the BIR's Electronic Invoicing System (EIS). Not covered: Invoices stay handwritten and the app is not a registered system (pending the accountant's written confirmation). | — | RR 11-2025, RR 26-2025; Verified: not yet | PDF invoice, e-receipt |
| **Record retention** | Keep financial records for 10 years and never hard-delete them. Decided, pending accountant confirmation. | Lock | BIR; Verified: not yet |  |
| **Legal hold** | A flag that blocks archiving or disposal of records during an audit or dispute. | Lock | House |  |

## 10. Government sales

These terms support selling to government agencies: their rules live in `dlhouse/rules`, and any bidding workflow belongs to a future government-sales app. All entries need verification with a compliance advisor against the current government procurement law (RA 12009).

| Term | Meaning | Control | Source | Avoid |
| --- | --- | --- | --- | --- |
| **Approved budget for the contract** | The agency's ceiling price for a procurement. | — | RA 12009; Verified: not yet | budget ceiling |
| **Notice of award** | The agency's formal notice that we won a bid. | — | RA 12009; Verified: not yet |  |
| **Agency purchase order** | The agency's binding order or contract after award. Takes the place of our sales order as the customer's commitment. | — | RA 12009; Verified: not yet |  |
| **Inspection and acceptance** | The agency's inspection and formal acceptance of delivered goods, recorded on its inspection and acceptance report. Often the point when we can collect, and possibly recognize revenue. | Habit: report photographed as evidence | RA 12009; Verified: not yet |  |
| **Bid security** | A deposit or guarantee submitted with a bid, returned afterwards. Recorded as an asset while outstanding. | Alarm: unreturned past a set number of days | RA 12009; Verified: not yet |  |
| **Performance security** | A guarantee posted after award, held until our delivery and warranty obligations are met. | Alarm: release date tracked | RA 12009; Verified: not yet |  |
| **Retention money** | Warranty security an agency withholds from payments for goods (1% to 5%, or 1% by default), released after the warranty period if the goods are free from defects. | Alarm (SAL-12) | RA 12009 IRR; Verified: not yet |  |
| **Liquidated damages** | A penalty an agency deducts for late delivery; recorded as a reduction of revenue with the agency's computation as evidence. | — | RA 12009 IRR; Verified: not yet | penalty expense |

## 11. System registration and change control

The accounting app is built registration-ready but not registered yet: every change is classified and logged now, and reported to the BIR only after registration.

| Term | Meaning | Control | Source | Avoid |
| --- | --- | --- | --- | --- |
| **Computerized accounting system** | Our accounting app once registered with the BIR. Not yet: the first app runs as an internal-control system until we choose to register. | — | BIR; Verified: not yet | CAS (in screens) |
| **Acknowledgement Certificate** | The BIR's confirmation that a system is registered; needed only once we register. | — | BIR; Verified: not yet | Permit to Use (older term) |
| **Release** | A version of an app put into the live system. | Lock: logged with its version and class | House | deploy (in policies) |
| **Release class A** | Cosmetic change with no effect on records, reports or books. | Habit: logged only | House |  |
| **Release class B** | A change that affects records, reports or books. | Habit: logged; reported to the BIR as required after registration | House; Verified: not yet |  |
| **Release class C** | A new module. | Habit: logged; registration updated once registered | House; Verified: not yet |  |
| **Release log** | Every release with its version, class, date and approver. | Lock | House |  |
| **Version register** | The BIR-facing record of modules and versions, kept from day one; must match the release log; filed only after registration. | Habit | BIR; Verified: not yet |  |
| **Environment** | Development, test or live. Only tested releases reach live. | Habit | House |  |
| **Settings register** | Every configurable threshold with its starting value and owner. | Lock: changes logged | House |  |
| **Parallel run** | Excel and the app run side by side before cutover. Exit rule: one full month closed with a trial balance matching Excel exactly. | Habit | House |  |
| **Go/no-go checkpoint** | January 15, 2027: if the app isn't ready (Build Plan criteria G1 to G5), the parallel run moves to April to June and go-live to July 1, 2027; January 1, 2028 is the last fallback. | Habit | House |  |
| **Cutover** | Switching from Excel to the app at the start of a quarter. Target April 1, 2027, with the opening at December 31, 2026. | — | House | go-live date (in policies) |
| **Registration status** | A company's standing with the BIR for this app: internal control, CAS registered, or CAS registered with e-invoicing. Labels, reports and allowed actions follow it. | Lock (ITC-11); setting S45 | House |  |
| **Permit to Issue (PTI)** | The BIR's permit to issue electronic invoices from a given invoicing system; needed before the first e-invoice. Use the full name once, then "PTI." | — | RMC 98-2026; Verified: not yet |  |
| **EIS Certification** | The BIR's certification that a system transmits e-invoices correctly to its Electronic Invoicing System; due within six months of the PTI. | — | RMC 98-2026; Verified: not yet |  |
| **Invoice issuance module** | The future module that issues e-invoices, delivers them to buyers and transmits them to the BIR. Designed now, built only when a company registers. | — | House |  |

Starting values in the settings register: ₱50,000 for every approval and release line; split-payment window 7 days; lockout after 5 failed sign-ins for 15 minutes; idle logout 30 minutes on desks and 10 minutes on tablets; escalation after 2 business days; re-authentication on tablets for approvals of ₱50,000 or more.

## 12. Business health measures

These are the dashboard warning lights; each threshold is a company setting.

| Term | Meaning | Source |
| --- | --- | --- |
| **Gross margin** | (Sales − cost of goods sold) ÷ sales. | House |
| **Days sales outstanding** | How many days, on average, customers take to pay. | House |
| **Days payable outstanding** | How many days, on average, we take to pay suppliers. | House |
| **Days inventory** | How many days, on average, stock sits before it sells. | House |
| **Cash coverage** | Cash available compared with payments due in the next 30 days. | House |

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.7 (update) | October 20, 2026 | Added Fixed-asset register, Capitalization threshold and Custody list (POL-16). |
| 0.7 | October 20, 2026 | From BIR Readiness Map 0.1: added Registration status, Permit to Issue (PTI), EIS Certification and Invoice issuance module. |
| 0.6 (update) | October 20, 2026 | Added Company type and Account profile (Chart of Accounts 0.4). |
| 0.6 | October 20, 2026 | From Chart of Accounts 0.3: Owner redefined per company; added property company, holding company, group-company charge, exemption document, proforma invoice, advance to supplier, e-wallet, commercial invoice, own-name import, door-to-door import, retention money, liquidated damages. |
| 0.5 | October 20, 2026 | From Worked Examples 0.2 (decisions H1 to H4): added Document type code and Delivered, awaiting acceptance. |
| 0.4 | October 20, 2026 | E-invoicing not covered; system registration not yet, with change-control terms marked "after registration." Named roles: second owner as Final approver, Finance approver, alternate releaser. Alternate releaser, intercompany, unapplied collections, opening balances and settings values no longer proposed. Import VAT exception added. New terms: cut-off, delivered not invoiced, received not invoiced, In close, auto-reversing accrual, provision matrix, net realizable value, close calendar, balance-sheet reconciliation, intercompany reconciliation, journal-entry alarm, landed cost sheet, internal management report. |
| 0.3 | October 20, 2026 | Entries now show Control, Source and "Verified"; regulation takes precedence. Added companies, events, numbering and dates, owner roles, supplier-side memos, cash items, inventory and imports, government sales, and change control. Renamed Payment terms to Credit terms, VAT-able to VATable, Average cost to Weighted average cost. Added Statement of account, the input-tax phrase rule, and input VAT only from VAT Invoices. Invoice Record is never printed for customers. |
| 0.2 | October 20, 2026 | Aligned with the revised executive summary: handwritten Invoices with Invoice Records and a manual invoice register, the role model, lock/alarm/habit tags, the ₱50,000 line, bank release rules, government withholding and 2307 tracking, PFRS for Small Entities. |
| 0.1 | October 20, 2026 | First draft. |
