# DLHouse Worked Examples 0.3

Oct 20, 2026 · @Joseph de Leon

Eighteen worked examples, W1 to W18, walk one transaction each through the accounting app for a fictional general goods trading company; once the accountant verifies an example, it becomes a test in `dlhouse/rules`.

## About this document

- **Version and status:** 0.3, draft for the accountant session in the week of November 9, 2026.
- **Precedence:** regulation, then the DLHouse Executive Summary (Revision 5), then this document. Terms follow Glossary 0.7; chains follow Document Lifecycles 0.4; control IDs follow the Control Register 0.5; setting IDs follow the Settings Register 0.4.
- **Layer:** Layer 1, business guidance and truths. The format is a house default (see DLHouse Worked Examples: Best Practices 0.1); the scenarios are app-specific to the accounting app; the tax rules they prove graduate into `dlhouse/rules`.
- **Scope:** a general goods trader first. Medical-supply rules (batch, lot, expiry, FDA registration) are left out on purpose and get their own examples with the regulated goods module.
- **Tax figures:** every tax amount is marked ⚠️ and is "Verified: not yet" until the accountant signs it.
- **Accounts:** names are provisional until the chart of accounts exists.

**How to read each example:** the facts (Given and When), the document chain with its statuses, the journal entries, the control IDs it exercises, the alarms it should raise, what the app must refuse, and a Verified line for the accountant's initials and date.

## The cast and the starting position

Every example uses the same fictional group, partners and opening trial balance, dated during the parallel run (April to June 2027, the second quarter).

**Companies**

| Company | Code | VAT status | Trade |
| --- | --- | --- | --- |
| Sample Trading Corp. | STC | VAT-registered | General goods: paper, storage boxes, household and hardware items, sold to businesses and government |
| Sample Distribution Inc. | SDI | Non-VAT ⚠️ | Group retailer that buys from STC (W15 only) |
| Sample Property Holdings Inc. | SPH | VAT-registered | Property company: owns STC's warehouse and leases it to STC (W18 only) |

**Partners**

| Partner | Role | Notes |
| --- | --- | --- |
| Northbay Hardware Inc. | Business customer | Does not withhold tax |
| Eastgate Retail Corp. | Business customer | Withholds 1% on goods as a top withholding agent ⚠️ |
| Sample City Government | Government customer | Contract makes inspection and acceptance the transfer point |
| Metro Paper Supply Inc. | Local supplier | VAT-registered; issues VAT Invoices |
| Pacific Goods LLC | Foreign supplier | Bills in US dollars, FOB Los Angeles |
| Harbor Customs Brokerage | Customs broker | VAT-registered |
| Sample Realty Corp. | Landlord | VAT-registered; not a related party |
| Driver A | Employee | Receives cash advances |
| Swift Cargo Forwarding Inc. | Door-to-door forwarder | Importer of record on door-to-door shipments; VAT Invoice for its service fee only (W16) |

**People:** examples use role names only (Encoder, Accountant, Cashier, Finance approver, Final approver, second owner), so no real person's data sits in a test fixture.

**Opening trial balance, STC, April 1, 2027**

| Account | Debit (₱) | Credit (₱) |
| --- | --- | --- |
| Cash in bank | 3,000,000 |  |
| Petty cash fund | 10,000 |  |
| Inventory: bond paper, 4,000 reams at ₱200 | 800,000 |  |
| Inventory: other goods | 400,000 |  |
| Owners' equity |  | 4,210,000 |
| **Total** | **4,210,000** | **4,210,000** |

**Provisional accounts used:** Cash in bank, Petty cash fund, Accounts receivable, Due from affiliates, Creditable withholding tax receivable, Creditable VAT withheld receivable, Advances to employees, Goods in transit, Inventory, Input VAT, Accounts payable, Due to affiliates, Output VAT payable, Withholding tax payable (expanded), Unapplied collections, Owners' equity, Sales, Sales returns and allowances, Purchases, Cost of goods sold, Rent expense, Office supplies expense, Delivery expense, Bank charges, Forex gain or loss.

**Document numbers** follow S35, `CO-TYPE-YYYY-000001`, with provisional type codes: IR Invoice Record, COL collection, CM credit memo, SI supplier invoice, PV payment voucher, JE journal entry, LCS landed cost sheet, CA cash advance.

**Settings assumed**

| Setting | Value used |
| --- | --- |
| S02, S04, S05, S06 approval and release lines | ₱50,000, compared against the document total including VAT (H1) |
| S07 intercompany release line | ₱50,000 |
| S10 split-payment window | 7 days |
| S13 recording deadline | 1 business day |
| S15 close calendar | 5 business days |
| S18 cash advance liquidation | 5 business days |
| S19 credit terms | 30 days |
| S21 return window | 30 days from delivery |
| S25 petty cash single-payment limit | ₱1,000 |
| S28 VAT | 12% ⚠️ |
| S29 government withholding on goods | 5% creditable VAT plus 1% expanded ⚠️ |
| S30 payor withholding | Pending; examples use 1% on goods and 5% on rent ⚠️ |
| S31 exchange rate source | BSP reference rate; rates here are illustrative, not actual |
| S33 costing | Weighted average |

## W1. Credit sale to a business, collected in full

The clean baseline: one VAT Invoice, revenue at the signed delivery receipt, one collection, no withholding and no alarms.

**Facts**

- April 5, 2027: Northbay Hardware signs the delivery receipt for 500 reams of bond paper. The same day, Billing writes VAT Invoice serial 0501 for ₱112,000 (₱100,000 plus ₱12,000 VAT ⚠️), on 30-day terms.
- April 6: the Encoder records Invoice Record STC-IR-2027-000001, linked to the delivery receipt photo and serial 0501; the Accountant posts it.
- May 5: Northbay pays ₱112,000 by bank transfer. The Cashier issues an acknowledgement receipt; the Encoder records collection STC-COL-2027-000001 the same day and applies it to the Invoice Record; the Accountant posts it.

**Chain:** delivery receipt (reference) → Invoice (handwritten, outside the app) → Invoice Record: Draft → Posted → collection: Draft → Posted; progress Received → Deposited → Matched.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Apr 5 | Accounts receivable | 112,000 |  |
|  | Sales |  | 100,000 |
|  | Output VAT payable ⚠️ |  | 12,000 |
| May 5 | Cash in bank | 112,000 |  |
|  | Accounts receivable |  | 112,000 |

**Controls:** SAL-01, SAL-02, SAL-03, SAL-10, TAX-04, CSH-01, CSH-02, CSH-03, CSH-04, GL-01, GL-05, GL-06, GEN-01, GEN-10, CLS-09.

**Expected alarms:** none. Expected withholding for this customer is ₱0, so the difference check passes.

**The app must refuse:**

- An Invoice Record without the signed delivery receipt photo or a booklet serial.
- A second Invoice Record for serial 0501.
- A posting date other than the delivery date (April 5).
- Printing the Invoice Record for the customer.
- The Encoder posting, or the Cashier recording the collection.

**Verified:** not yet. Output VAT timing follows agenda question 5.5 and may differ from revenue timing.

## W2. Credit sale to a business that withholds tax

The customer pays 1% less than the Invoice, and the gap becomes a tax credit only once its 2307 arrives.

**Facts**

- April 8, 2027: Eastgate Retail signs for 1,000 storage boxes; VAT Invoice serial 0502 for ₱224,000 (₱200,000 plus ₱24,000 VAT ⚠️). Invoice Record STC-IR-2027-000002 is posted with an April 8 posting date.
- May 10: Eastgate pays ₱222,000, withholding 1% of the ₱200,000 base, or ₱2,000 ⚠️. Collection STC-COL-2027-000002 is posted; the 2307 progress is Expected.
- May 20: the 2307 for ₱2,000 arrives; the Encoder attaches it and the progress moves to Received.

**Chain:** Invoice Record: Draft → Posted → collection: Draft → Posted (Received, Deposited, Matched) → 2307: Expected → Received → Claimed (at the quarterly return).

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Apr 8 | Accounts receivable | 224,000 |  |
|  | Sales |  | 200,000 |
|  | Output VAT payable ⚠️ |  | 24,000 |
| May 10 | Cash in bank | 222,000 |  |
|  | Creditable withholding tax receivable ⚠️ | 2,000 |  |
|  | Accounts receivable |  | 224,000 |
| May 20 | No entry; evidence attached |  |  |

**Controls:** TAX-01, TAX-02, TAX-03, SAL-01, CSH-03, CSH-04, GL-01, GL-05.

**Expected alarms:**

- "2307 not yet received" for ₱2,000 from May 10 until May 20.
- Variant: if Eastgate withholds ₱2,240 (1% of the VAT-inclusive amount), the expected-withholding check flags a ₱240 difference for the Accountant to resolve with the customer.

**The app must refuse:**

- Moving a 2307 to Received without the 2307 attached.
- Marking a credit Claimed before it is Received.
- A collection where cash plus withholding does not equal the amount applied, unless the excess goes to unapplied collections.

**Verified:** not yet. The 1% rate and its base (net of VAT) are for the accountant to confirm.

## W3. Sale to a government agency, collected net of 5% and 1%

Revenue waits for inspection and acceptance, and the agency's two withholdings become two separate tax credits.

**Facts**

- April 12, 2027: STC delivers 2,500 reams to Sample City Government against its agency purchase order; the agency signs the delivery receipt. The contract makes inspection and acceptance the transfer point.
- April 20: the agency signs its inspection and acceptance report. VAT Invoice serial 0503 (written April 12, at delivery) for ₱560,000 (₱500,000 plus ₱60,000 VAT ⚠️). Invoice Record STC-IR-2027-000005 waits in Draft until acceptance, then posts with an April 20 posting date, with the report attached.
- June 15: the agency pays ₱530,000 by check after withholding 5% creditable VAT (₱25,000) and 1% expanded withholding (₱5,000) on the ₱500,000 base ⚠️. The check is deposited the same day.
- June 25: both 2307s arrive and are attached.

**Chain:** agency purchase order and delivery receipt (references) → inspection and acceptance report (evidence) → Invoice Record: Draft → Posted → collection: Draft → Posted (Received, Deposited, Matched) → two 2307s: Expected → Received.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Apr 20 | Accounts receivable | 560,000 |  |
|  | Sales |  | 500,000 |
|  | Output VAT payable ⚠️ |  | 60,000 |
| Jun 15 | Cash in bank | 530,000 |  |
|  | Creditable VAT withheld receivable ⚠️ | 25,000 |  |
|  | Creditable withholding tax receivable ⚠️ | 5,000 |  |
|  | Accounts receivable |  | 560,000 |

**Controls:** SAL-01, SAL-02, TAX-01, TAX-02, TAX-03, TAX-04, CSH-03, CSH-04, GL-01.

**Expected alarms:**

- "2307 not yet received" for ₱25,000 and ₱5,000 from June 15 until June 25.
- Variant: delivered April 28, accepted May 3. Revenue belongs to May. The April cut-off list should show it as "delivered, awaiting acceptance" rather than "delivered, not invoiced," so it is not accrued (decision H4).

**The app must refuse:**

- Posting revenue on the delivery date when the customer's contract is flagged "inspection and acceptance."
- Posting the Invoice Record without the inspection and acceptance report attached.
- Booking both withholdings to one account.

**Verified:** not yet. Rates follow S29, pending written confirmation.

## W4. Same as W3, but the 2307s are missing at quarter-end

The credits stay on the books as receivables, the app keeps them unclaimable, and the quarterly reconciliation shows the gap.

**Facts**

- Same as W3 up to the June 15 collection.
- June 30, 2027 (end of the second quarter): neither 2307 has arrived. The Accountant chased the agency on June 20 and June 27 and logged both follow-ups.
- July 5: the quarterly withholding reconciliation for April to June is prepared.

**Chain:** as W3; both 2307s remain at Expected.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Jun 15 | As W3 |  |  |
| Jun 30 | No entry: both receivables stay open |  |  |
| Later, only if the accountant rules a credit lost | Loss on unclaimed tax credits (manual journal entry) ⚠️ | 5,000 |  |
|  | Creditable withholding tax receivable |  | 5,000 |

**Quarterly reconciliation, April to June (TAX-03)**

| Credit | Expected (₱) | Received (₱) | Claimed (₱) |
| --- | --- | --- | --- |
| Creditable VAT withheld | 25,000 | 0 | 0 |
| Expanded withholding | 5,000 | 0 | 0 |

**Controls:** TAX-02, TAX-03, CLS-04, GL-03 (if a loss entry is ever needed).

**Expected alarms:**

- "2307 not yet received" lists both, ageing from June 15.
- The quarter's reconciliation shows ₱30,000 expected and not received, for the Finance approver's review.

**The app must refuse:**

- Marking either credit Claimed without its 2307.
- Writing off either receivable without a manual journal entry, an explanation, an attachment and the Finance approver's approval.

**Verified:** not yet. Whether a 2307 received after quarter-end can still be claimed, and in which return, is for the accountant.

## W5. Credit memo of ₱60,000 for returned goods

A return above the ₱50,000 line needs two approvers before it can reduce what the customer owes.

**Facts**

- April 14, 2027: Northbay Hardware signs for 1,000 storage boxes; VAT Invoice serial 0504 for ₱224,000 (₱200,000 plus ₱24,000 VAT ⚠️), posted as STC-IR-2027-000004.
- April 26 (within the 30-day return window, S21): Northbay returns 300 damaged boxes worth ₱60,000 before VAT. The warehouse counts them back in and photographs the return slip.
- April 26: the Encoder prepares credit memo STC-CM-2027-000001 for ₱67,200 (₱60,000 plus ₱7,200 VAT ⚠️) and submits it.
- April 27: the Finance approver approves; the Final approver approves on a tablet after re-authenticating (S11). The Accountant posts it.

**Chain:** sales return (evidence) → credit memo: Draft → Submitted → Approved (Finance approver) → Approved (Final approver) → Posted. Returned stock needs no entry under periodic inventory; the month-end count picks it up.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Apr 14 | Accounts receivable | 224,000 |  |
|  | Sales |  | 200,000 |
|  | Output VAT payable ⚠️ |  | 24,000 |
| Apr 27 | Sales returns and allowances | 60,000 |  |
|  | Output VAT payable ⚠️ | 7,200 |  |
|  | Accounts receivable |  | 67,200 |

Northbay's open balance on Invoice 0504 is now ₱156,800.

**Boundary tests:** a credit memo totalling ₱49,999 needs only the Finance approver; one totalling exactly ₱50,000 needs both.

**Controls:** SAL-05, GEN-01, GEN-08, GL-01, GL-06, SAL-10.

**Expected alarms:**

- Escalation if either approval waits more than 2 business days (S12).
- Variant: a return after the 30-day window is flagged for the approvers (POL-06).

**The app must refuse:**

- Posting after only the Finance approver's approval.
- The Encoder approving their own memo, or one person giving both approvals.
- A credit memo larger than the Invoice Record's open balance.
- Sending the credit memo without the input-tax phrase.

**Verified:** not yet. The documentary requirements for reducing output VAT on a return are for the accountant.

## W6. Import in US dollars with freight, insurance, duties and brokerage

Every cost of the shipment gathers in goods in transit, each at its own rate, and one landed cost sheet moves the total into purchases: ₱1,376,300 for 10,000 boxes, or ₱137.63 each.

**Facts**

- April 6, 2027: Pacific Goods invoices USD 20,000 for 10,000 storage boxes, FOB Los Angeles. Our rate that day (S31): ₱56.00 per USD.
- April 8: the forwarder bills ocean freight of USD 1,800 and insurance of USD 200, payable in pesos at ₱56.00: ₱112,000 ⚠️ (treated as zero-rated international freight).
- April 20: customs entry. Customs uses its own rate of ₱56.50 on a dutiable value of USD 22,000 (cost, insurance and freight) = ₱1,243,000. Duty at 10% ⚠️ = ₱124,300. Import VAT at 12% on ₱1,367,300 (dutiable value plus duty, simplified) ⚠️ = ₱164,076. STC pays ₱288,376 online and attaches the import entry and customs receipt.
- April 21: Harbor Customs Brokerage issues a VAT Invoice for ₱22,400 (₱20,000 plus ₱2,400 VAT ⚠️).
- April 22: the boxes arrive; the Accountant prepares landed cost sheet STC-LCS-2027-000001 and the Finance approver approves it (any amount, decision C2).

**Chain:** foreign supplier invoice: Draft → Posted → forwarder and broker invoices: Draft → Posted → customs payment: Draft → Posted → landed cost sheet: Draft → Submitted → Approved → Posted.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Apr 6 | Goods in transit | 1,120,000 |  |
|  | Accounts payable, Pacific Goods (USD 20,000) |  | 1,120,000 |
| Apr 8 | Goods in transit | 112,000 |  |
|  | Accounts payable, forwarder |  | 112,000 |
| Apr 20 | Goods in transit (duty) ⚠️ | 124,300 |  |
|  | Input VAT (import) ⚠️ | 164,076 |  |
|  | Cash in bank |  | 288,376 |
| Apr 21 | Goods in transit (brokerage) | 20,000 |  |
|  | Input VAT ⚠️ | 2,400 |  |
|  | Accounts payable, broker |  | 22,400 |
| Apr 22 | Purchases | 1,376,300 |  |
|  | Goods in transit |  | 1,376,300 |

**Controls:** PUR-03 (the import VAT exception), CLS-07, GL-01, GL-05, TAX-05, GEN-01. Allocation is by value by default; with one product, all costs fall on the boxes.

**Expected alarms:** none. The customs rate (₱56.50) differs from ours (₱56.00); both are recorded and neither is an error.

**The app must refuse:**

- Import VAT without both the import entry and the customs receipt attached.
- Editing the April 6 rate once it has been used.
- Posting the landed cost sheet while a cost component lacks its document.
- Adding import VAT to inventory cost for a VAT-registered company.

**Verified:** not yet. Duty rate, import VAT base and the freight's VAT treatment are for the accountant and the broker.

## W7. Advance paid before shipment

Our usual import pattern: the supplier is paid in pesos before it ships, so the cost is fixed on the payment day and nothing is revalued.

**Facts**

- April 1, 2027: Pacific Goods sends a proforma invoice for 10,000 storage boxes, USD 20,000, payable before shipment. The purchase order is approved by the Finance approver, then the Final approver.
- April 3: the Accountant prepares payment voucher STC-PV-2027-000002 with the proforma invoice and purchase order attached (PAY-09). Finance approver, then Final approver. The second owner releases the transfer; the bank converts at ₱56.20 and charges a ₱500 fee.
- April 6: the boxes ship; Pacific Goods issues its commercial invoice for USD 20,000. The advance moves into goods in transit at the same peso amount.

**Chain:** purchase order (reference) → payment voucher: Draft → Submitted → Approved → Approved → Released → Posted → advance matched to the commercial invoice → goods in transit (then W6's landed cost sheet).

| Date | Account (code) | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Apr 3 | Advances to suppliers: foreign (1250) | 1,124,000 |  |
|  | Bank and payment fees (6460) | 500 |  |
|  | Cash in bank (1130) |  | 1,124,500 |
| Apr 6 | Goods in transit (1320) | 1,124,000 |  |
|  | Advances to suppliers: foreign (1250) |  | 1,124,000 |

**Effect on W6:** goods in transit starts at ₱1,124,000 instead of ₱1,120,000, so the landed cost becomes ₱1,380,300, or ₱138.03 a box.

**Controls:** PAY-09, PAY-10, PAY-01, PAY-03, PAY-04, PUR-03, GEN-01.

**Expected alarms:** none on the main path. Variant: if the boxes haven't shipped by June 2 (60 days, S42), the unmatched-advance alarm fires.

**The app must refuse:**

- A payment voucher for an advance without the proforma invoice and an approved purchase order.
- Revaluing the advance at month-end.
- Input VAT on the proforma or commercial invoice.
- Moving more than the advance into goods in transit unless the extra is recorded as a USD balance payable (W7b).

**Verified:** not yet. That a peso advance is not revalued is for the accountant (Chart of Accounts question A5).

## W7b. Variant: a USD balance paid after arrival

The peso weakens twice, so the USD 20,000 payable costs ₱20,000 more than recorded: ₱8,000 recognized at the April revaluation and ₱12,000 at payment.

**Facts**

- April 30, 2027 (month-end close): the BSP reference rate is ₱56.40. The open USD 20,000 payable is revalued from ₱1,120,000 to ₱1,128,000.
- May 18: the Accountant prepares payment voucher STC-PV-2027-000010 for USD 20,000. The Finance approver approves, then the Final approver (₱50,000 or more).
- May 20: the second owner releases the transfer in the bank portal, with the voucher number in the bank's reference field. The bank converts at ₱57.00: ₱1,140,000.

**Chain:** payment voucher: Draft → Submitted → Approved (Finance approver) → Approved (Final approver) → Released → Posted → Matched at the May bank reconciliation.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Apr 30 | Forex gain or loss (revaluation) | 8,000 |  |
|  | Accounts payable, Pacific Goods |  | 8,000 |
| May 20 | Accounts payable, Pacific Goods | 1,128,000 |  |
|  | Forex gain or loss (settlement) | 12,000 |  |
|  | Cash in bank |  | 1,140,000 |

**Controls:** CLS-07, PAY-01, PAY-03, PAY-04, PAY-06, PAY-08, GEN-01.

**Expected alarms:**

- None on the main path.
- Variant: if the second owner is away and the alternate releaser releases it, ₱1,140,000 exceeds the ₱250,000 cap (S08), so it must wait.

**The app must refuse:**

- Approving with only the Finance approver.
- The Accountant who prepared the transfer releasing it.
- Editing the April 30 or May 20 rate once used.
- Posting the payment without the bank advice showing the rate applied.

**Verified:** not yet. Whether foreign goods suppliers attract our withholding (assumed none here) ⚠️, and whether month-end revaluations should auto-reverse, are for the accountant.

## W8. Local supplier invoice through three-way match, paid with withholding

No payment voucher exists until the order, the receipt of goods and the supplier's VAT Invoice agree, and the voucher withholds tax automatically.

**Facts**

- April 2, 2027: purchase order to Metro Paper Supply for 6,000 reams at ₱210, ₱1,260,000 before VAT, ₱1,411,200 in total. Approved by the Finance approver, then the Final approver (reference in app 1).
- April 9: the receiving report counts 6,000 reams. Metro Paper's VAT Invoice is for ₱1,411,200 (₱1,260,000 plus ₱151,200 VAT ⚠️). The Encoder records supplier invoice STC-SI-2027-000005; the match passes; the Accountant posts it.
- May 6: the Accountant prepares payment voucher STC-PV-2027-000008. The app computes 1% withholding on goods ⚠️, ₱12,600, so the net payment is ₱1,398,600. Finance approver, then Final approver.
- May 9: the second owner releases the transfer; the 2307 for ₱12,600 is issued to Metro Paper.

**Chain:** purchase order (reference) → receiving report (reference) → supplier invoice: Draft → Posted → payment voucher: Draft → Submitted → Approved → Approved → Released → Posted → Matched.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Apr 9 | Purchases | 1,260,000 |  |
|  | Input VAT ⚠️ | 151,200 |  |
|  | Accounts payable, Metro Paper |  | 1,411,200 |
| May 9 | Accounts payable, Metro Paper | 1,411,200 |  |
|  | Withholding tax payable (expanded) ⚠️ |  | 12,600 |
|  | Cash in bank |  | 1,398,600 |

**Controls:** PUR-01, PUR-02, PUR-03, PAY-01, PAY-03, PAY-04, PAY-06, PAY-08, GEN-01.

**Expected alarms:**

- None on the main path.
- Variant: two payments to Metro Paper of ₱30,000 each within 7 days reach ₱60,000 and trigger the split-payment alarm (PAY-05).

**The app must refuse:**

- A payment voucher if the receiving report shows 5,900 reams, until a supplier credit memo or a corrected invoice settles the difference.
- A voucher that pays the gross ₱1,411,200 with no withholding.
- Input VAT from Metro Paper's delivery receipt or official receipt.
- Release by the person who prepared the transfer.

**Verified:** not yet. Whether STC is a top withholding agent, and the 1% rate on goods (S30), are for the accountant.

## W9. Monthly rent paid with withholding and a 2307 issued

Rent is a recurring payment above the ₱50,000 line, so every month it needs two approvers and withholds 5% before release.

**Facts**

- April 1, 2027: Sample Realty issues its VAT Invoice for April rent: ₱112,000 (₱100,000 plus ₱12,000 VAT ⚠️). The Encoder records supplier invoice STC-SI-2027-000003 against the lease contract (evidence); the Accountant posts it.
- April 3: payment voucher STC-PV-2027-000004. The app withholds 5% of ₱100,000 ⚠️, ₱5,000; net ₱107,000. Finance approver, then Final approver.
- April 5: the second owner releases the transfer; a 2307 for ₱5,000 is issued to Sample Realty.

**Chain:** lease contract (evidence) → supplier invoice: Draft → Posted → payment voucher: Draft → Submitted → Approved → Approved → Released → Posted → Matched.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Apr 1 | Rent expense | 100,000 |  |
|  | Input VAT ⚠️ | 12,000 |  |
|  | Accounts payable, Sample Realty |  | 112,000 |
| Apr 5 | Accounts payable, Sample Realty | 112,000 |  |
|  | Withholding tax payable (expanded) ⚠️ |  | 5,000 |
|  | Cash in bank |  | 107,000 |

**Controls:** PUR-03, PAY-01, PAY-03, PAY-04, PAY-06, PAY-08, GL-01, GEN-01.

**Expected alarms:**

- None on the main path.
- Variant: if the landlord is an owner or an owner's relative, the payee is a related party and only the second owner may release (PAY-04).

**The app must refuse:**

- Input VAT if the landlord gives only an acknowledgement receipt or an official receipt.
- A voucher with no withholding.
- Paying a different bank account than the one verified for Sample Realty, until call-back verification (PAY-02).

**Verified:** not yet. The 5% rate on rent and the 2307 timing (monthly or quarterly) are for the accountant.

## W10. Post-dated check received, deposited on its date, then bounced

A post-dated check is not cash until its date, and a bounce is a new event recorded when it happens, never a void of May's collection.

**Facts**

- May 3, 2027: Northbay signs for goods; VAT Invoice serial 0520 for ₱56,000 (₱50,000 plus ₱6,000 VAT ⚠️), posted as STC-IR-2027-000006.
- May 10: Northbay hands over a check dated May 31 for ₱56,000. The Cashier issues an acknowledgement receipt; the Encoder records collection STC-COL-2027-000012 with progress Held. Nothing posts to the books.
- May 31: the Cashier deposits the check; the collection posts.
- June 3: the bank returns the check for insufficient funds and charges ₱500.

**Chain:** collection: Draft (Held) → Posted on May 31 (Deposited) → bounced-check entry: Draft → Posted on June 3; the Invoice Record reopens.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| May 3 | Accounts receivable | 56,000 |  |
|  | Sales |  | 50,000 |
|  | Output VAT payable ⚠️ |  | 6,000 |
| May 10 | No entry: check held |  |  |
| May 31 | Cash in bank | 56,000 |  |
|  | Accounts receivable |  | 56,000 |
| Jun 3 | Accounts receivable | 56,000 |  |
|  | Cash in bank |  | 56,000 |
| Jun 3 | Bank charges | 500 |  |
|  | Cash in bank |  | 500 |

**Controls:** CSH-01, CSH-02, CSH-03, CSH-06, CSH-07, GL-02, GL-05.

**Expected alarms:**

- The post-dated check appears on the due-date list from May 10, due May 31.
- A bounced-check alarm on June 3, with Northbay's balance reopened at ₱56,000.

**The app must refuse:**

- Posting the collection or depositing the check before May 31.
- Voiding May's collection to record the bounce, since May may already be In close or closed.
- Deleting the held collection once it has a number.

**Verified:** not yet. Whether to recover the ₱500 charge from the customer is a policy question for us.

## W11. Cash advance to a driver, liquidated with change returned

The driver spends ₱4,200 of a ₱5,000 advance, returns ₱800, and someone other than the driver approves the liquidation.

**Facts**

- May 12, 2027: Driver A needs ₱5,000 for fuel and tolls on a delivery run. That exceeds the ₱1,000 petty cash limit (S25), so the Accountant prepares cash advance voucher STC-CA-2027-000002; the Finance approver approves; it is paid by transfer.
- May 14: Driver A liquidates with a fuel VAT Invoice in STC's name and TIN for ₱3,360 (₱3,000 plus ₱360 VAT ⚠️), toll receipts for ₱840, and ₱800 change handed to the Cashier, who deposits it the same day.
- May 14: the Finance approver approves the liquidation; the Accountant posts it, within the 5 business days of S18.

**Chain:** cash advance voucher: Draft → Submitted → Approved → Released → Posted → liquidation: Draft → Submitted → Approved → Posted.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| May 12 | Advances to employees, Driver A | 5,000 |  |
|  | Cash in bank |  | 5,000 |
| May 14 | Delivery expense (fuel) | 3,000 |  |
|  | Input VAT ⚠️ | 360 |  |
|  | Delivery expense (tolls) | 840 |  |
|  | Cash in bank (change deposited) | 800 |  |
|  | Advances to employees, Driver A |  | 5,000 |

**Controls:** CSH-08, CSH-03, PUR-03, GEN-01, GL-01, PAY-01.

**Expected alarms:**

- None on the main path.
- Variant: if not liquidated by May 19 (5 business days), the unliquidated-advance alarm fires (S18).

**The app must refuse:**

- Driver A approving their own liquidation.
- Input VAT on the toll receipts, or on a fuel receipt not in STC's name and TIN.
- A liquidation where receipts plus change differ from the advance, unless the shortage is recorded as a receivable from the employee.
- Paying the ₱5,000 from petty cash.

**Verified:** not yet. The VAT treatment of tolls and fuel receipts is for the accountant; whether a second advance is blocked while one is open is for POL-09.

## W12. A spoiled invoice in the booklet

A spoiled Invoice never reaches the books, but its serial is still accounted for in the register, with every copy kept.

**Facts**

- Booklet 11 holds serials 0501 to 0550.
- April 15, 2027: Billing writes the wrong customer name on serial 0512, marks every copy "CANCELLED" and keeps all of them. The correct Invoice is written on serial 0513.
- April 15: the Encoder marks 0512 as spoiled in the manual invoice register, with the reason and a photo of all copies.
- April 30: the Accountant (not the Encoder) signs off the April register: 0501 to 0513 issued or spoiled, 0514 to 0550 unused.

**Chain:** register line for 0512: Spoiled (no Invoice Record) → monthly sign-off. Serial 0513 follows the W1 chain.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Apr 15 | No entry for serial 0512 |  |  |

**April register, booklet 11**

| Serials | Status |
| --- | --- |
| 0501 to 0511 | Issued, each linked to its Invoice Record |
| 0512 | Spoiled: wrong customer name; all copies kept |
| 0513 | Issued |
| 0514 to 0550 | Unused |

**Controls:** SAL-03, SAL-01, GL-06, GEN-01.

**Expected alarms:**

- Variant: if 0512 is never marked, the register shows a gap at month-end.
- Variant: if 0515 is used before 0514, an out-of-sequence alarm fires.

**The app must refuse:**

- An Invoice Record that uses serial 0512.
- Marking a serial spoiled without a reason and a photo of the copies.
- Marking spoiled a serial that already has an Invoice Record; that is a cancellation of an issued Invoice (agenda 3.6).
- Deleting a register line, or the Encoder signing off their own register.

**Verified:** not yet. What to keep and report for spoiled invoices and unused booklets follows the accountant's answer to agenda 3.6.

## W13. Month-end inventory valuation and cost of goods sold

With periodic inventory, April's cost of bond paper sold is what was available less what the count found: ₱1,442,000, at a weighted average of ₱206 a ream.

**Facts**

- Bond paper only (other goods are valued the same way on their own sheets).
- April 1, 2027: 4,000 reams on hand at ₱200, ₱800,000 (opening trial balance).
- April purchases: 6,000 reams at ₱210, ₱1,260,000 (W8).
- April 30: the physical count, signed by two counters, finds 3,000 reams.
- May 4 (business day 3 of the close, period In close): the Accountant prepares the valuation sheet and posts the adjusting entry.

**Valuation sheet**

| Line | Reams | Amount (₱) |
| --- | --- | --- |
| Beginning inventory | 4,000 | 800,000 |
| Purchases | 6,000 | 1,260,000 |
| Available for sale | 10,000 | 2,060,000 |
| Weighted average cost per ream |  | 206 |
| Ending inventory (count × ₱206) | 3,000 | 618,000 |
| Cost of goods sold | 7,000 | 1,442,000 |

**Chain:** count sheets (evidence) → valuation sheet (evidence) → adjusting journal entry: Draft → Posted by the Accountant while the period is In close.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Apr 30 | Cost of goods sold | 2,060,000 |  |
|  | Inventory (beginning, bond paper) |  | 800,000 |
|  | Purchases (bond paper) |  | 1,260,000 |
| Apr 30 | Inventory (ending, bond paper) | 618,000 |  |
|  | Cost of goods sold |  | 618,000 |

**Controls:** CLS-06, CLS-02, CLS-04, GL-01, GL-05.

**Expected alarms:** none by the app. The Finance approver reviews gross margin in the close pack; a large swing prompts a recount.

**The app must refuse:**

- Posting the valuation without the count sheets and the valuation sheet attached.
- Anyone but the Accountant posting while the period is In close.
- Posting into April once April is Closed.

**Verified:** not yet. Periodic inventory with weighted average cost (D13) is pending the accountant; the net realizable value check runs at year-end, not here.

## W14. An error voided in an open period, and the same error after close

The same mistake is undone two ways depending only on the period: voided while May is open, reversed in June once May is closed. Either way the wrong record stays visible and a new, correct one replaces it.

**Facts (both cases)**

- May 20, 2027: the Encoder records a supplier VAT Invoice from Metro Paper for office supplies, ₱11,200 (₱10,000 plus ₱1,200 VAT ⚠️), as STC-SI-2027-000040, but charges it to Rent expense. The Accountant posts it. It is not yet paid.
- **Case A:** the Accountant spots it on May 25; May is Open.
- **Case B:** it is spotted on June 10; May closed on June 7.

**Case A: void in the open period**

Chain: SI-000040 Posted → void submitted with a reason → Approved by the Finance approver (below ₱50,000) → Voided; the app reverses its effects in May. A new supplier invoice, STC-SI-2027-000041, is recorded correctly and linked to the voided one.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| May 20 | Rent expense (error) | 10,000 |  |
|  | Input VAT ⚠️ | 1,200 |  |
|  | Accounts payable, Metro Paper |  | 11,200 |
| May 25 | Accounts payable, Metro Paper (void, posted by the app) | 11,200 |  |
|  | Rent expense |  | 10,000 |
|  | Input VAT ⚠️ |  | 1,200 |
| May 25 | Office supplies expense (SI-000041) | 10,000 |  |
|  | Input VAT ⚠️ | 1,200 |  |
|  | Accounts payable, Metro Paper |  | 11,200 |

**Case B: reversing entry after close**

Chain: SI-000040 stays Posted and untouched in closed May → reversing entry STC-JE-2027-000052, dated June 10, with a reason → Approved by the Finance approver → Posted → new SI-000041 with document date May 20 and posting date June 10, linked to both.

| Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| Jun 10 | Accounts payable, Metro Paper (reversing entry) | 11,200 |  |
|  | Rent expense |  | 10,000 |
|  | Input VAT ⚠️ |  | 1,200 |
| Jun 10 | Office supplies expense (SI-000041) | 10,000 |  |
|  | Input VAT ⚠️ | 1,200 |  |
|  | Accounts payable, Metro Paper |  | 11,200 |

May's closed figures still show the ₱10,000 in rent; June shows the correction.

**Boundary test:** the same error at ₱56,000 needs the Finance approver, then the Final approver, for the void or the reversing entry.

**Controls:** GL-02, GL-05, GL-06, CLS-03, GL-04, GEN-01.

**Expected alarms:** the reversing entry appears in the June journal-entry review at close. If anyone instead reopens May, the second owner is alerted (CLS-03).

**The app must refuse:**

- Editing or deleting SI-000040 at any time.
- Voiding SI-000040 in Case B, while May is closed.
- Dating the reversing entry in May.
- Reopening May without the Final approver and a reason.

**Verified:** not yet. If the quarterly VAT return was already filed, whether input VAT needs an amended return is for the accountant.

## W15. Sale between two group companies

One sale is recorded twice as a linked pair, once in each company's books, and the two sides must net to zero at close. The non-VAT buyer adds the VAT to its cost instead of claiming it.

**Facts**

- June 8, 2027: STC delivers 300 storage boxes to SDI; SDI signs the delivery receipt. VAT Invoice serial 0531 for ₱44,800 (₱40,000 plus ₱4,800 VAT ⚠️), priced at STC's normal price to outside retailers.
- June 9: STC's Encoder records Invoice Record STC-IR-2027-000031; SDI's Encoder records the linked supplier invoice SDI-SI-2027-000012. Each Accountant posts in their own company.
- June 30: SDI pays ₱44,800. Below the ₱50,000 intercompany line (S07), so either owner may release, with both sides recorded.

**Chain:** STC: Invoice Record Draft → Posted → collection Posted. SDI: supplier invoice Draft → Posted → payment voucher Approved → Released → Posted. Each document links to its pair.

| Company | Date | Account | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- | --- |
| STC | Jun 8 | Due from affiliates, SDI | 44,800 |  |
| STC |  | Sales |  | 40,000 |
| STC |  | Output VAT payable ⚠️ |  | 4,800 |
| SDI | Jun 8 | Purchases (VAT included in cost) ⚠️ | 44,800 |  |
| SDI |  | Due to affiliates, STC |  | 44,800 |
| SDI | Jun 30 | Due to affiliates, STC | 44,800 |  |
| SDI |  | Cash in bank |  | 44,800 |
| STC | Jun 30 | Cash in bank | 44,800 |  |
| STC |  | Due from affiliates, SDI |  | 44,800 |

**June intercompany reconciliation (CLS-05):** due from SDI ₱0 against due to STC ₱0, netting to zero.

**Controls:** GEN-10, CLS-05, PAY-03, PAY-04, SAL-01, PUR-03, GEN-01.

**Expected alarms:**

- None on the main path.
- Variant: if SDI records ₱40,000 (leaving out the VAT), the reconciliation shows a ₱4,800 difference at close.
- Variant: a ₱56,000 intercompany payment needs the second owner to release.

**The app must refuse:**

- Posting one side without its linked pair.
- Input VAT in SDI's books, since SDI is non-VAT.
- A user posting SDI's side while STC is the active company.
- Release by the person who prepared the payment.

**Verified:** not yet. SDI's VAT status, and arm's-length pricing for related-party sales, are for the accountant.

## W16. Door-to-door import

When the forwarder is the importer of record, the duties and import VAT it paid become part of our cost; only its own service fee, on its VAT Invoice, gives us input VAT.

**Facts**

- May 5, 2027: advance to Pacific Goods for 2,000 storage bins, USD 5,000, paid in pesos at ₱56.50 = ₱282,500 plus a ₱500 bank fee (as in W7).
- May 25: Swift Cargo Forwarding, the importer of record, delivers the bins to our warehouse. No landed cost sheet: there are no customs papers in our name.
- May 26: Swift Cargo bills ₱84,000: a VAT Invoice for its ₱20,000 service fee plus ₱2,400 VAT ⚠️, and a statement for ₱61,600 of duties and taxes it paid in its own name.
- June 2: payment voucher for ₱84,000 less 2% withholding on the service fee ⚠️ (₱400) = ₱83,600. Finance approver, then Final approver; the second owner releases.

**Chain:** advance (W7 pattern) → goods received → forwarder's bill: Draft → Posted → payment voucher: Draft → Submitted → Approved → Approved → Released → Posted → Matched.

| Date | Account (code) | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| May 5 | Advances to suppliers: foreign (1250) | 282,500 |  |
|  | Bank and payment fees (6460) | 500 |  |
|  | Cash in bank (1130) |  | 283,000 |
| May 25 | Purchases (5110) | 282,500 |  |
|  | Advances to suppliers: foreign (1250) |  | 282,500 |
| May 26 | Purchases (5110): service fee ₱20,000 and duties and taxes ₱61,600 ⚠️ | 81,600 |  |
|  | Input VAT (1410) ⚠️ | 2,400 |  |
|  | Accounts payable: suppliers (2110) |  | 84,000 |
| Jun 2 | Accounts payable: suppliers (2110) | 84,000 |  |
|  | Withholding tax payable (2220) ⚠️ |  | 400 |
|  | Cash in bank (1130) |  | 83,600 |

The 2,000 bins cost ₱364,100, or ₱182.05 each.

**Controls:** PUR-03, PAY-09, PAY-10, PAY-01, PAY-03, PAY-06, GEN-01.

**Expected alarms:** none on the main path.

**The app must refuse:**

- Input VAT on the ₱61,600 statement or on the commercial invoice; only the ₱2,400 on the forwarder's VAT Invoice qualifies.
- Input VAT on imports (1420) or a landed cost sheet for a purchase tagged door-to-door.
- A forwarder payment voucher without withholding on its service fee.

**Verified:** not yet. Whether duties and import VAT paid by the forwarder are simply cost to us, and the withholding rate on the forwarder's fee, are for the accountant (Chart of Accounts question A8).

## W17. GCash collection and weekly sweep

A wallet collection is recorded gross, the fee shown as an expense, and the balance swept to the bank within a week; the wallet never pays anyone else.

**Facts**

- May 10, 2027: Northbay signs for goods; VAT Invoice serial 0525 for ₱33,600 (₱30,000 plus ₱3,600 VAT ⚠️), posted as an Invoice Record.
- May 12: Northbay pays ₱33,600 to STC's GCash business account through the official QR printed on its statement of account. GCash deducts a fee, illustrated here at 1% ⚠️, so ₱33,264 lands in the wallet. The Encoder records the collection with GCash's transaction reference.
- May 16: the Cashier sweeps the wallet balance to STC's bank account; the transfer fee is illustrated at ₱15 ⚠️.
- May 31: the Accountant, who has no wallet login, reconciles the GCash statement.

**Chain:** Invoice Record: Draft → Posted → collection: Draft → Posted (Received in wallet) → sweep: Draft → Posted → reconciliation.

| Date | Account (code) | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- |
| May 10 | Accounts receivable (1210) | 33,600 |  |
|  | Sales (4110) |  | 30,000 |
|  | Output VAT payable (2210) ⚠️ |  | 3,600 |
| May 12 | E-wallets: GCash (1150) | 33,264 |  |
|  | Bank and payment fees (6460) | 336 |  |
|  | Accounts receivable (1210) |  | 33,600 |
| May 16 | Cash in bank (1130) | 33,249 |  |
|  | Bank and payment fees (6460) | 15 |  |
|  | E-wallets: GCash (1150) |  | 33,264 |

**Controls:** CSH-09, CSH-01, CSH-04, CSH-07, GEN-01.

**Expected alarms:** variant: if the wallet isn't swept by May 19 (7 days, S41), the sweep alarm fires.

**The app must refuse:**

- A wallet collection without the wallet's transaction reference.
- Any wallet outflow other than a transfer to the company's own bank account.
- Recording as a collection a payment the customer sent to a staff member's personal wallet.
- Netting the fee: the receivable is cleared at the full ₱33,600 and the fee shown separately.

**Verified:** not yet. Actual GCash and Maya business fees, and whether e-wallet balances are cash and cash equivalents, are for the accountant (Chart of Accounts question A6).

## W18. Rent from the property company

Group rent is a real, invoiced, market-rate charge recorded on both sides; the trading company withholds 5%, and the two companies' balances net to zero at close.

**Facts**

- June 1, 2027: under a written lease at market rent (CLS-11), Sample Property Holdings issues its VAT Invoice to STC for June warehouse rent: ₱168,000 (₱150,000 plus ₱18,000 VAT ⚠️).
- June 3: STC prepares payment voucher STC-PV-2027-000031: ₱168,000 less 5% withholding on ₱150,000 (₱7,500 ⚠️) = ₱160,500. Finance approver, then Final approver; at ₱50,000 or more, the second owner releases the intercompany payment (S07).
- June 5: payment released; STC issues a 2307 for ₱7,500 to SPH.

**Chain:** SPH: Invoice Record: Draft → Posted → collection Posted. STC: supplier invoice: Draft → Posted → payment voucher: Draft → Submitted → Approved → Approved → Released → Posted. Each linked to its pair.

| Company | Date | Account (code) | Debit (₱) | Credit (₱) |
| --- | --- | --- | --- | --- |
| SPH | Jun 1 | Due from group companies: STC (1230) | 168,000 |  |
| SPH |  | Rental and service income from group companies (4130) |  | 150,000 |
| SPH |  | Output VAT payable (2210) ⚠️ |  | 18,000 |
| STC | Jun 1 | Rent (6210), group-company tag | 150,000 |  |
| STC |  | Input VAT (1410) ⚠️ | 18,000 |  |
| STC |  | Due to group companies: SPH (2140) |  | 168,000 |
| STC | Jun 5 | Due to group companies: SPH (2140) | 168,000 |  |
| STC |  | Withholding tax payable (2220) ⚠️ |  | 7,500 |
| STC |  | Cash in bank (1130) |  | 160,500 |
| SPH | Jun 5 | Cash in bank (1130) | 160,500 |  |
| SPH |  | Creditable withholding tax receivable (1430) ⚠️ | 7,500 |  |
| SPH |  | Due from group companies: STC (1230) |  | 168,000 |

**June intercompany reconciliation (CLS-05):** SPH's due from STC ₱0 against STC's due to SPH ₱0. In the owners' combined view, the ₱150,000 of rent income and rent expense cancel out.

**Controls:** CLS-05, CLS-11, PAY-01, PAY-03, PAY-06, PUR-03, GEN-10.

**Expected alarms:** variant: if STC records rent without SPH's matching Invoice Record, the reconciliation shows ₱168,000 unmatched at close.

**The app must refuse:**

- Posting either side without its linked pair.
- A group rent charge without the lease agreement attached.
- Input VAT at STC if SPH gives anything other than a VAT Invoice.
- Release by the person who prepared the payment.

**Verified:** not yet. Market rent support, documentary stamp tax on the lease and the 5% rate are for the accountant and tax advisor (Chart of Accounts question A9).

## Questions these examples raise

Twelve questions go to the accountant with this document, each with a recommended answer; our four house questions were decided on October 20, 2026.

**For the accountant ⚠️**

| # | Question | Examples | Recommended answer |
| --- | --- | --- | --- |
| E1 | Does output VAT follow the revenue date, or the Invoice or collection date (agenda 5.5)? | W1–W3 | Follow your ruling; the app keeps the two dates separate |
| E2 | Is STC a top withholding agent, and are 1% on goods and 5% on rent the right payor rates (S30)? | W8, W9 | Confirm per company, citing the rule |
| E3 | Can a 2307 received after quarter-end still be claimed, and when is an unclaimed credit written off? | W4 | Claim in the quarter it arrives; write off only on your advice |
| E4 | What must a credit memo show to reduce output VAT on a return? | W5 | List the required fields |
| E5 | Import VAT base, duty computation, and the VAT treatment of international freight | W6 | Confirm with the broker; the app records each component separately |
| E6 | Should month-end forex revaluations auto-reverse on the first day of the next month? | W7 | No: revalue from the carrying amount each month |
| E7 | Are foreign goods suppliers subject to our withholding? | W7 | Assumed none |
| E8 | Input VAT on fuel and toll receipts paid through cash advances | W11 | Only from VAT Invoices in the company's name and TIN |
| E9 | Rules for spoiled invoices and unused booklets (agenda 3.6) | W12 | Keep all copies; report as you advise |
| E10 | After a correction in a later quarter, is an amended VAT return needed? | W14 | Follow your ruling, per case |
| E11 | A non-VAT group company buying from a VAT one: confirm SDI's status and arm's-length pricing | W15 | Price as to outside customers; record SDI's VAT in cost |
| E12 | Should post-dated checks stay off the books until their date? | W10 | Yes: a memo record only, on the due-date list |

**Decided by us, October 20, 2026**

| # | Question | Examples | Decision |
| --- | --- | --- | --- |
| H1 | Do the ₱50,000 lines compare the total including VAT? | W5, W7–W9 | Yes: the amount that leaves or is forgiven is what carries the risk |
| H2 | Should recurring payments under an approved contract (rent) keep needing two approvals each month? | W9 | Yes; reviewed after the parallel run, with a standing contract approval as the alternative |
| H3 | Correct a wrong posting by reversing it whole and re-recording, never by a partial adjustment? | W14 | Yes, as a house default: each document stays whole and traceable |
| H4 | For government contracts with an acceptance transfer point, a separate "delivered, awaiting acceptance" list instead of the accrual? | W3 | Yes, so they are tracked but not accrued |

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.1 | October 20, 2026 | First draft: W1 to W15 for a fictional general goods trader (Sample Trading Corp., with Sample Distribution Inc. for W15), the cast, opening trial balance and assumed settings, questions E1 to E12 for the accountant and H1 to H4 for us. |
| 0.2 | October 20, 2026 | H1 to H4 decided as recommended: lines compare totals including VAT; recurring contract payments keep two approvals for now; corrections reverse whole and re-record; a "delivered, awaiting acceptance" list for government contracts. |
| 0.3 | October 20, 2026 | Fitted to our business (Chart of Accounts 0.3): new W7 (advance paid before shipment), with the old W7 kept as W7b; added W16 (door-to-door import), W17 (GCash collection and sweep), W18 (rent from the property company); added SPH and Swift Cargo to the cast. New examples show account codes; W1 to W15 move to codes in the next version. |
| 0.3 (update) | October 21, 2026 | Precedence line updated to the current versions of the Executive Summary and related documents; no content change. |
