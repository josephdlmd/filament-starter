# DLHouse Document Lifecycles 0.4

Oct 20, 2026 · @Joseph de Leon

Every document follows one five-status lifecycle; each chain below adds its own progress states, who acts at each step, what posts to the books, and the evidence and controls it leaves behind.

## About this document

- **Version and status:** 0.4, draft for review, October 20, 2026.
- **Precedence:** regulation, then the DLHouse Executive Summary (Revision 5), then this document. Terms follow Glossary 0.7; accounts follow Chart of Accounts 0.4.
- **Layer:** Layer 1, business guidance and truths (the floor plan: how documents move from room to room). The universal lifecycle and the controls are house defaults; which documents are full documents and which are references in the first app is app-specific.
- **In the first app (D1):** sales orders, delivery receipts, purchase orders and receiving reports are references (number, date, photo) until their own modules exist. Inventory is periodic.
- **Amounts:** every ₱50,000 line is a company setting.

## Best practices behind every lifecycle

These ten rules come from the COSO internal control framework, full PFRS and what external auditors test; every chain below applies them, and all are house defaults.

1. **Source document first.** Nothing posts to the books without a source document and its evidence attached.
2. **One state machine for every document.** The same five statuses everywhere, so staff learn it once and auditors read it once.
3. **Every transition is logged.** Who, when, from which status to which, and why for rejections, recalls and voids.
4. **Separate the four duties.** Authorizing, recording, holding cash and reconciling sit with different people; the app checks this on every transaction.
5. **Posted means permanent.** Corrections are new documents (a void in an open period, a reversing entry after close), never edits.
6. **Every number accounted for.** Numbers are assigned when a document leaves Draft; a numbered document that will never post is voided, not deleted.
7. **Match before you pay or close.** Purchase order, receiving report and supplier invoice agree before payment; collections are applied to specific Invoice Records; bank lines are matched every month.
8. **Cut-off at every month-end.** A transaction belongs to the period of its event (the signed delivery, the goods received), not the date someone typed it.
9. **Every document links to the one before and after.** Anyone can trace a peso from the bank line back to the delivery receipt and forward again.
10. **Approve by risk, not by volume.** Routine documents matched to their source flow straight to posting; approvers see only exceptions and amounts above the ₱50,000 line.

## The universal lifecycle

Every document in every app uses these five statuses; rejecting and recalling are logged events, not statuses, and each document type adds its own progress states on top.

&#91;embedded content: universal lifecycle · 5 statuses, 2 events\]

Posted is the line that matters: before it, a document can be fixed; after it, it can only be voided or reversed.

| Transition | Who | Guard | Logged |
| --- | --- | --- | --- |
| Submit: Draft to Submitted | Maker | Required fields and evidence attached; the number is assigned here | Yes |
| Approve: Submitted to Approved | Approver for the tier | Never the maker; a second approver at ₱50,000 or more | Yes |
| Reject: Submitted to Draft | Approver | Reason required | Yes, with the reason |
| Recall: Submitted to Draft | Maker | Only before any decision | Yes |
| Post: Approved to Posted, or Draft to Posted for routine matched entries | Accountant | Posting date in an open period; debits equal credits | Yes |
| Void: to Voided | Finance approver; then Final approver at ₱50,000 or more | Period open; reason required | Yes, with the reason |
| Delete | Maker | Draft only, so no number is ever lost | Yes |

## Sales chain: quotation to collection

Revenue posts through the Invoice Record, dated to the signed delivery receipt; in the first app, quotations, sales orders and delivery receipts are references until the sales module exists.

| # | Step | Who | Status and progress | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- | --- |
| 1 | Quotation | Sales (sales module) | Open, then Accepted, Expired or Lost | None | Discount tiers in settings (sales module) |
| 2 | Sales order | Sales; referenced in app 1 | Reference: number, date, photo | None | Credit limit check (sales module); overrides by the Final approver |
| 3 | Delivery receipt signed by the customer | Logistics; Encoder records the reference | Reference with photo of the signed copy | None by itself | Supplementary document with the input-tax phrase; revenue recognition point (D5) |
| 4 | Invoice issued | Billing, on the registered booklet | Outside the app | None by itself | Legal BIR invoice; handwritten |
| 5 | Invoice Record | Encoder prepares within 1 business day, capturing each line (item, quantity, unit price, tax code) and the buyer's TIN and address, linked to the delivery receipt and booklet serial; Accountant posts | Draft, then Posted (routine, matched to source) | Receivable, sales and output VAT, posting date = date of the signed delivery receipt | Photo of the Invoice copy; manual invoice register marks the serial as issued |
| 6 | Collection | See "Collection to deposit" | — | — | — |

**Government sales:** where the contract makes inspection and acceptance the transfer point, step 5 posts on the date of the agency's inspection and acceptance report, and the report is attached as evidence.

**Month-end cut-off:** signed delivery receipts with no Invoice Record by month-end appear on a "delivered, not invoiced" alarm, and the Accountant accrues them. Government deliveries whose contract makes inspection and acceptance the transfer point go on a separate "delivered, awaiting acceptance" list instead and are not accrued (decision H4). Output VAT timing follows the accountant's answer (agenda 5.5), which may differ from revenue timing.

**Branches:** a credit memo or debit memo goes Draft, Submitted, Approved (Finance approver below ₱50,000; then Final approver at ₱50,000 or more), Posted. A sales return produces a credit memo. A spoiled handwritten Invoice never becomes an Invoice Record; the register marks the serial as spoiled.

## Purchase to payment

No payment voucher can be approved until the purchase order, receiving report and supplier invoice agree, and money leaves only through two gates: approval in the app, then a two-person release at the bank.

| # | Step | Who | Status and progress | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- | --- |
| 1 | Purchase order | Encoder prepares; approved per tier; referenced in app 1 | Reference: number, date, approver, photo | None | Finance approver below ₱50,000; then Final approver at ₱50,000 or more; input-tax phrase |
| 2 | Receiving report | Warehouse; referenced in app 1 | Reference: number, date, photo | None (periodic inventory) | Quantities checked against the purchase order |
| 3 | Supplier invoice | Encoder records; Accountant posts | Draft, then Posted (routine, three-way match passed) | Purchases, input VAT and accounts payable | Photo of the supplier's Invoice; input VAT only from a VAT Invoice (lock plus alarm); mismatches block step 4 |
| 4 | Payment voucher | Accountant prepares | Draft, Submitted, Approved | None until released | Finance approver below ₱50,000; then Final approver at ₱50,000 or more; payor withholding computed (lock); call-back for new payees; no one approves a payment to themselves |
| 5 | Bank release | Maker prepares the transfer; releaser per the bank release rules | Progress: Released; the voucher posts on the release date | Accounts payable, cash in bank, withholding tax payable | Voucher number in the bank's reference field; nobody releases a payment they prepared; 2307 issued to the supplier |
| 6 | Matching | Bank reconciliation | Progress: Matched | None | Bank debit matched to the voucher; unmatched debits raise an alarm |

**Month-end cut-off:** goods received with no supplier invoice by month-end appear on a "received, not invoiced" list, and the Accountant accrues them.

**Branches:** a purchase return produces a purchase debit memo; a supplier credit memo reduces the payable. The split-payment alarm flags two or more payments to one payee within 7 days that together reach ₱50,000.

## Collection to deposit

The Cashier holds the money and the Encoder records it, so no one both receives and records a collection; every collection is recorded within 1 business day and deposited intact the same or next business day.

| # | Step | Who | Status and progress | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- | --- |
| 1 | Money received (check, transfer or cash) | Cashier | Outside the app | None | Acknowledgement receipt issued, with the input-tax phrase |
| 2 | Collection recorded and applied to Invoice Records | Encoder prepares; Accountant posts | Draft, then Posted; progress: Received | Cash in bank, creditable withholding receivable, accounts receivable; any excess to unapplied collections | Copy of the acknowledgement receipt and remittance advice; expected withholding computed per customer type |
| 3 | Deposit | Cashier | Progress: Deposited | None | Deposited intact, daily; photo of the stamped deposit slip |
| 4 | 2307 received | Encoder records the evidence | Progress per 2307: Expected, Received, Claimed | None | "2307 not yet received" alarm; quarterly reconciliation of expected, received and claimed |
| 5 | Matching | Bank reconciliation | Progress: Matched | None | Deposit matched to the bank credit line |

**Government collections:** the 5% creditable VAT and 1% expanded withholding are booked as separate receivables, each supported by a 2307.

**Post-dated checks:** recorded on receipt with progress Held, deposited on their date, and listed on a due-date alarm. A bounced check reverses the collection, reopens the customer's balance and raises an alarm.

**Unapplied collections:** held as a liability until applied to Invoice Records; alarm after 30 days.

## Manual journal entry

Manual entries carry the highest fraud risk in any ledger, so every one needs an explanation, attached support and an approver who is not the maker.

| # | Step | Who | Status and progress | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- | --- |
| 1 | Draft with explanation and support | Accountant | Draft | None | Lock: cannot submit without an explanation and an attachment |
| 2 | Approval | Finance approver below ₱50,000; then Final approver at ₱50,000 or more | Submitted, then Approved | None | Maker never approves; reject or recall returns it to Draft with a reason |
| 3 | Posting | Accountant | Posted | Debits equal credits (lock); posting date in an open period (lock) | — |
| 4 | Review at close | Finance approver | — | — | Journal-entry alarms: weekend or holiday postings, round amounts, unusual users, rarely used accounts |

**Accruals** are marked auto-reversing: the app posts the reversal on the first day of the next period, so accruals never linger.

## Void and reversal

How a document is undone depends only on where it stands: drafts are deleted, numbered documents are voided, and anything in a closed period is corrected by a reversing entry.

| Where the document stands | How it is undone | Who approves | What remains |
| --- | --- | --- | --- |
| Draft | Deleted | No one | Nothing; it never had a number |
| Submitted or Approved, never posted | Voided with a reason | Finance approver | The number, marked Voided |
| Posted, period still open | Voided with a reason; the app reverses its effects in the same period | Finance approver below ₱50,000; then Final approver at ₱50,000 or more | The original, visible and marked Voided |
| Posted, period closed | Reversing entry, a new document dated in the current open period | Same tiers as a void | The original untouched; both linked |

**Correcting after a void or reversal:** prepare a new document with a new number, linked to the one it replaces. A wrong posting is always voided or reversed whole and re-recorded, never partly adjusted (house default, decision H3).

**Issued handwritten Invoices:** cancelling one follows the accountant's guidance (agenda 3.6); all copies are kept.

## Period close

Each month closes within a fixed number of business days (5 to 10; the exact number is set after the parallel run), run from this checklist; the day numbers below assume a 5-day close.

A period moves through three states: **Open**, **In close** (only the Accountant may post, and only adjusting entries) and **Closed** (no postings; corrections by reversing entry in the next open period).

| Business day | Task | Who | Evidence |
| --- | --- | --- | --- |
| 1 | Cut-off: accrue delivered-not-invoiced and received-not-invoiced; confirm all collections are recorded and deposited | Accountant | Cut-off lists |
| 1 | Move the period to In close | Accountant | Logged |
| 2 | Bank reconciliations for every account | Accountant (never the Cashier) | Signed reconciliation |
| 2 | Intercompany reconciliation: balances between group companies net to zero | Accountant | Reconciliation |
| 3 | Inventory valuation and cost of goods sold (periodic); forex revaluation of open foreign balances at the BSP reference rate | Accountant | Valuation sheet; rate source |
| 3 | Allowance for doubtful accounts by provision matrix (quarterly); net realizable value check (year-end) | Accountant | Aging and matrix |
| 4 | Balance-sheet reconciliations for every account | Accountant prepares; Finance approver reviews | Reconciliation with support |
| 4 | Review journal-entry alarms, unapplied collections, 2307 status and the invoice register sign-off | Finance approver | Signed review |
| 5 | Trial balance review, then close the period | Final approver | Close logged; management reports labeled internal |
| 5 | Review pack to the owners | Accountant | Review pack |

**Reopening** a closed period needs the Final approver and a reason; the second owner is alerted.

**Quarterly additions:** withholding reconciliation, user-access review by the second owner, provision matrix review. **Year-end:** net realizable value check and a physical inventory count.

## Bank reconciliation

Every bank account is reconciled monthly by someone who does not handle cash, reviewed by the Finance approver and signed off by the second owner.

| # | Step | Who | Status and progress | Evidence and controls |
| --- | --- | --- | --- | --- |
| 1 | Load the bank statement lines | Accountant | Draft | Statement attached as evidence |
| 2 | Match automatically | The app | Draft | Payment voucher numbers in the bank's reference field; deposits matched to collections |
| 3 | Investigate what is left | Accountant | Draft | Unknown debits raise an alarm (possible unauthorized payment); unknown credits go to unapplied collections; bank charges and interest become journal entries |
| 4 | Review | Finance approver | Submitted, then Approved | Reconciling items listed and aged; outstanding checks older than 90 days flagged |
| 5 | Second owner's sign-off | Second owner | Progress: Signed off | Sign-off logged |

Adjusting entries found during the reconciliation follow the manual journal entry lifecycle.

## Import landed cost

An import's full cost is gathered on one landed cost sheet per shipment, approved and posted once every cost is in, with each foreign amount recorded at its own rate.

| # | Step | Who | Status and progress | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- | --- |
| 1 | Foreign supplier invoice | Encoder records; Accountant posts | Draft, then Posted | Purchases in transit and accounts payable, at the exchange rate on the invoice date | Supplier invoice; Incoterms recorded; rate source logged |
| 2 | Freight and insurance | Encoder records; Accountant posts | Draft, then Posted | Added to the shipment's costs | Bill of lading, insurance documents |
| 3 | Customs entry: duties, taxes and brokerage | Encoder records; Accountant posts | Draft, then Posted | Duties and brokerage to the shipment; import VAT to input VAT | Import entry and customs receipts; customs exchange rate recorded beside our rate; HS/AHTN code |
| 4 | Landed cost sheet | Accountant prepares; Finance approver approves | Draft, Submitted, Approved, Posted | Costs moved into inventory cost | Allocation basis stated per shipment (by value by default; by weight or volume when freight is weight-driven) |
| 5 | Paying the foreign supplier | Purchase-to-payment chain | — | Difference between the invoice rate and the payment rate to forex gain or loss | Bank advice with the rate used |

Open foreign payables are revalued at every month-end close at the BSP reference rate. Import VAT is the one named exception to the input VAT lock: it is allowed only with the import entry and customs receipt attached (pending the accountant's confirmation).

## Supplier advance

Money paid before goods ship is held as an asset until the shipment is matched; no advance leaves without a proforma invoice and an approved purchase order.

| # | Step | Who | Status and progress | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- | --- |
| 1 | Proforma invoice and purchase order | Encoder records; PO approved per tier | Reference | None | Proforma invoice; approved PO (PUR-01) |
| 2 | Payment voucher for the advance | Accountant prepares | Draft, Submitted, Approved (Finance approver; then Final approver at ₱50,000 or more) | None until released | Proforma and PO attached or Submit is refused (PAY-09) |
| 3 | Bank release | Releaser per company; never the preparer | Progress: Released, then Posted | Advances to suppliers (1250); cash in bank; bank fee (6460) | Bank advice with the rate; voucher number in the bank reference (PAY-03) |
| 4 | Shipment matched | Accountant | Advance progress: Matched | Own-name import: to goods in transit (1320); door-to-door: to purchases (5110); same peso amount, never revalued ⚠️ | Commercial invoice; alarm if unmatched after 60 days (PAY-10, S42) |

## Door-to-door import

When the forwarder is the importer of record, there is no landed cost sheet: the goods' cost is the advance plus the forwarder's all-in bill, and only the forwarder's own VAT Invoice gives input VAT.

| # | Step | Who | Status and progress | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- | --- |
| 1 | Advance to the foreign supplier | As in "Supplier advance" | As above | Advances to suppliers (1250) | Proforma; PO; purchase tagged "door-to-door" |
| 2 | Goods received | Warehouse; Encoder records the reference | Reference | Advance moves to purchases (5110) | Receiving report |
| 3 | Forwarder's bill | Encoder records; Accountant posts | Draft, then Posted | Purchases (5110) for freight, duties and taxes; input VAT (1410) only from the VAT Invoice part; accounts payable (2110) | Forwarder's VAT Invoice and statement; input VAT on imports (1420) and landed cost sheets refused for door-to-door (PUR-03) |
| 4 | Payment | Accountant prepares; releaser per company | Draft, Submitted, Approved, Released, Posted | Accounts payable; withholding on the forwarder's fee (2220) ⚠️; cash | Withholding computed (PAY-06) |

## E-wallet collection and weekly sweep

GCash and Maya collections are recorded gross with their fee, swept to the bank at least weekly, and reconciled monthly by someone without the wallet login.

| # | Step | Who | Status and progress | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- | --- |
| 1 | Customer pays the company's official QR or number | Customer; Cashier confirms receipt | Outside the app | None | Wallet notification; payments to personal wallets never accepted (CSH-09) |
| 2 | Collection recorded and applied to Invoice Records | Encoder prepares; Accountant posts | Draft, then Posted; progress: Received | E-wallets (1150) for the net; fee (6460); accounts receivable cleared in full | Wallet transaction reference required |
| 3 | Weekly sweep to the bank | Cashier transfers; Encoder records | Draft, then Posted; progress: Swept | Cash in bank (1130); transfer fee (6460); e-wallets (1150) | The only allowed outflow; alarm if not swept within 7 days (S41) |
| 4 | Monthly wallet reconciliation | Accountant prepares; Finance approver reviews | Submitted, then Approved | None | Wallet statement; never by the login holder (CSH-09) |

## Walk-in cash sale

Anonymous buyers paying on the spot are recorded to the shared "Walk-in customers" record with no TIN, and the record must be back to zero at day-end.

| # | Step | Who | Status and progress | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- | --- |
| 1 | Invoice written; payment taken in cash or e-wallet | Billing; Cashier | Outside the app | None | Buyer's name, address and TIN written when the buyer gives them, and always for VAT-registered buyers of ₱1,000 or more ⚠️ |
| 2 | Invoice Record to "Walk-in customers" | Encoder prepares; Accountant posts | Draft, then Posted | Accounts receivable; sales; output VAT | Buyer details on the Invoice Record lines; alarm if ₱1,000 or more shows a buyer TIN (MF4) |
| 3 | Collection the same day | Encoder records; Accountant posts | Posted; Deposited | Undeposited collections or e-wallets; accounts receivable cleared | Alarm if "Walk-in customers" has any balance at day-end |

## Government securities and retention

Cash posted with an agency and retention it withholds are tracked per contract until they come back; bonds and guarantees are an expense, not an asset.

| # | Step | Who | Status and progress | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- | --- |
| 1 | Bid security posted in cash | Accountant prepares a payment voucher; releaser per company | Approved, Released, Posted; progress: Outstanding | Bid and performance securities (1470); cash | Bid documents; agency receipt |
| 2 | Award; performance security | Accountant | As step 1 if cash | Cash: 1470. Surety bond or bank guarantee: fee to bidding and security costs (6330) | Notice of award; bond or guarantee; 5% of the contract (RA 12009 IRR) ⚠️ |
| 3 | Delivery, inspection and acceptance, Invoice Record | As the sales chain | As the sales chain | Accounts receivable; sales; output VAT | Inspection and acceptance report |
| 4 | Collection net of withholding and retention | Encoder prepares; Accountant posts | Posted | Cash; 2307 receivables (1430, 1440); retention receivable (1280); accounts receivable cleared | Retention recorded with the contract's warranty end date (SAL-12) |
| 5 | Release of retention and return of securities | Accountant requests from the agency; Encoder records the receipt | Posted; progress: Released | Cash; 1280 and 1470 cleared | Alarm 30 days after warranty end or expected return (S43) |

## Fixed assets

An asset enters the register when bought, depreciates itself monthly, is counted yearly, and leaves only with the Final approver's approval (POL-16).

| # | Step | Who | Status and progress | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- | --- |
| 1 | Purchase of an item of ₱20,000 or more | As the purchase-to-payment chain | As that chain | Property and equipment (1510 to 1550); input VAT; payable | Supplier's VAT Invoice; registration papers or title in the company's name |
| 2 | Asset record and tag | Encoder creates; Accountant approves | Draft, then Active | None | Tag number, class, life from S47, person responsible; items below ₱20,000 that are portable go on the custody list instead |
| 3 | Monthly depreciation | The app, at month-end close | Posted automatically | Depreciation (6510); accumulated depreciation (1590) | Straight-line from the month after purchase |
| 4 | Transfer of location or person | Encoder records | Logged event | None | Register history |
| 5 | Yearly count | Two people per company | Count submitted, then approved by the Finance approver | Differences investigated; adjustments only by approved entry | Signed count sheets (CLS-12) |
| 6 | Sale, scrapping or write-off | Accountant prepares | Draft, Submitted, Approved (company's Final approver), Posted | Cost and accumulated depreciation removed; proceeds; gain (7130) or loss (7220) | Buyer's payment or scrapping evidence; sale needs an Invoice |

## Group-company charges

Rent, vehicle use and goods between group companies follow a written agreement, are invoiced monthly, recorded on both sides as a linked pair, and net to zero at close.

| # | Step | Who | Status and progress | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- | --- |
| 1 | Written agreement at market rates | Accountant drafts; both companies' Final approvers sign; second owner approves | Reference, reviewed yearly | None | Lease or usage agreement (CLS-11) |
| 2 | Monthly Invoice and Invoice Record (charging company) | Billing; Encoder; Accountant posts | Draft, then Posted | Due from group companies (1230); rent and service income (4130) or sales to group companies (4120); output VAT | Handwritten VAT Invoice |
| 3 | Linked supplier invoice (receiving company) | Encoder; Accountant posts | Draft, then Posted; linked to step 2 | Rent (6210), delivery costs (6310) or purchases from group companies (5120) with the group tag; input VAT; due to group companies (2140) | Posting one side without the other is refused |
| 4 | Settlement | Payment voucher in the receiving company; releasers per the intercompany rules | Approved, Released, Posted | Withholding where it applies (rent 5%) ⚠️; balances cleared on both sides | 2307 to the charging company |
| 5 | Month-end reconciliation | Accountant | Submitted, then Approved | None | Balances net to zero (CLS-05) |

## Owner drawings, advances and loans

Money between a company and its owners always passes through a payment voucher or a collection, is approved by someone other than the owner, and is never netted.

| # | Flow | Who approves and releases | Books effect | Evidence and controls |
| --- | --- | --- | --- | --- |
| 1 | Drawings from a sole proprietorship | Merritmed: Arielle de Leon approves, Joseph de Leon releases. Blasmorisson: the Finance approver approves, Diana de Leon releases | Drawings (3310); cash. The owner's own income tax and SSS paid from the business also go here ⚠️ | Payment voucher of type "drawings"; monthly bank statement review by Arielle de Leon |
| 2 | Advance to an owner or relative from a corporation | Finance approver, then the company's Final approver; released by the second owner (or, for the second owner herself, by the admin-owner) | Due from owners and related parties (1260); cash | Written agreement with repayment terms (PAY-04) ⚠️ |
| 3 | Loan from an owner or relative to a company | Recorded on receipt; repayments approved as in flow 2 | Cash; due to owners and related parties (2150) | Written loan agreement; interest and withholding per the accountant ⚠️ |
| 4 | Monthly owner balance review | Accountant prepares; second owner reviews | None | Each person's 1260 and 2150 balances shown separately, never netted |

## Decisions on open questions

All five were decided on October 20, 2026; L1 and L4 still need the accountant's written confirmation.

| # | Question | Decision | Status |
| --- | --- | --- | --- |
| L1 | Import VAT is supported by customs documents, not a supplier's VAT Invoice. Is that an allowed exception to the input VAT lock? | Yes, as a named exception: import VAT only with the import entry and customs receipt attached | Decided, pending accountant |
| L2 | Should the first app own purchase orders and receiving reports, or keep them as references? | References in app 1; the Accountant checks the three-way match against them; full documents come with the purchasing module | Decided |
| L3 | How quickly must Invoice Records and collections be recorded? | Within 1 business day, tracked under the SLA with the in-house team | Decided |
| L4 | After how long is an outstanding check "old" in the bank reconciliation? | Flagged at 90 days | Decided, pending accountant on the stale-check period |
| L5 | Does the In close state suit a 3–4 person team? | Yes: it stops new routine postings while adjustments are made | Decided |

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.4 (update) | October 21, 2026 | Precedence line updated to the current versions of the Executive Summary and related documents; no content change. |
| 0.4 | October 20, 2026 | Added eight chains: supplier advance, door-to-door import, e-wallet collection and sweep, walk-in cash sale, government securities and retention, fixed assets, group-company charges, and owner drawings, advances and loans. Invoice Records capture each line. |
| 0.3 | October 20, 2026 | From Worked Examples 0.2: corrections void or reverse whole and re-record (H3); a "delivered, awaiting acceptance" list for government contracts (H4). |
| 0.2 | October 20, 2026 | L1 to L5 decided: import VAT exception, purchase orders and receiving reports as references, 1-business-day recording, 90-day outstanding-check flag, In close state. |
| 0.1 | October 20, 2026 | First draft: ten best practices, the universal lifecycle, eight chains, open questions L1 to L5. |
