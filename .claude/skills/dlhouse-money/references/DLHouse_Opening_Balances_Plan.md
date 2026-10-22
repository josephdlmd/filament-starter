# DLHouse Opening Balances Plan 0.3

Oct 21, 2026 · @Joseph de Leon

Each of the five companies starts in the app from one opening trial balance at December 31, 2026, its year-end, with a schedule proving every balance; the January to March parallel run then proves the opening was right before go-live on April 1, 2027 (Build Plan 0.2).

## About this document

- **Version and status:** 0.3, draft for review, October 21, 2026. Small fixes to 0.2; the method and dates are unchanged.
- **Precedence:** regulation, then the Executive Summary (Revision 5), then this document. Accounts follow Chart of Accounts 0.4; master data follows Master Files 0.1; policies follow Company Policies 0.4; the governing control is CLS-08.
- **Layer:** Layer 1, business guidance and truths. The method is a house default for every DLHouse cutover; the dates and figures are company data.
- **People:** Leslie (Accountant) prepares; the external accountant reviews; each company's Final approver approves (Florence de Leon for Agno, Arielle de Leon for Arima and Merritmed, Jose Mahatma de Leon for Florminsons, Diana de Leon for Blasmorisson).

**Best practices for opening balances** (all house defaults; item 2 now names fixed assets):

1. **Every balance has a schedule.** No number enters the app without a list or document that adds up to it: receivables by Invoice, stock by count, cash by bank statement.
2. **Open items, not just totals.** Receivables, payables, advances, tax credits and fixed assets load as individual items, so aging, collections, 2307 tracking and depreciation work from day one.
3. **Third-party evidence where it exists.** Bank statements, loan confirmations, customer and supplier statements, and written owner confirmations beat internal spreadsheets.
4. **Both sides of every group balance agree** before either is loaded.
5. **No plugs.** An unexplained difference is investigated, never parked in a suspense or "opening balance" account.
6. **Loaded once, then locked.** The opening entry is approved, posted once and never edited; a correction is a reviewed adjusting entry in the open period (CLS-08).

## The approach

One opening per company at December 31, 2026, loaded once and proved by three months of side-by-side running.

| Step | Date | What happens |
| --- | --- | --- |
| Opening date | December 31, 2026 (year-end) | Each company's 2026 books are closed in Excel; cash and stock counted on December 29 or 30 and rolled to December 31; bank and wallet statements obtained |
| Opening load | By January 20, 2027 | The opening trial balance and open items load after review and approval; January's transactions are then caught up in the app |
| Parallel run | January 1 to March 31, 2027 | Every transaction goes into both; each month the app's trial balance is compared with Excel's |
| Exit check | Early April 2027 | A company passes when one full month closes with the app matching Excel exactly |
| Go-live | April 1, 2027 | Companies that pass continue in the app alone |

**Why year-end is the best opening date:** income and expense accounts start the year at zero, so only balance-sheet accounts load; 2026's profit is already in retained earnings; and the opening matches the year-end books the external accountant closes and audits anyway.

## The schedule behind every balance

Every account in each company's opening trial balance needs the schedule and evidence below; open items load individually so the app's alarms work from day one.

| Accounts (codes) | Schedule | Evidence |
| --- | --- | --- |
| Cash on hand, petty cash (1110, 1120) | Count sheet at December 31 | Count signed by the Cashier and a witness |
| Cash in bank (1130) | Bank reconciliation per account, with outstanding checks and deposits in transit listed | Bank statement; reconciliation signed off (CSH-07) |
| E-wallets (1150) | Balance per wallet | Wallet statement at December 31 |
| Accounts receivable, allowance (1210, 1220) | Open Invoice Records by customer: serial, date, amount, expected withholding, aging bucket; allowance by provision matrix | Invoice copies; customer statements for the largest balances |
| Due from and due to group companies (1230, 2140) | Open balances by company pair | Both companies' schedules agree to the peso (CLS-05) |
| Advances to employees and suppliers (1240, 1250) | Open advances by person or by proforma and purchase order | Advance documents; supplier statements for foreign advances |
| Due from and due to owners (1260, 2150) | Balance per owner or relative, both directions, never netted | Written confirmation signed by each person; loan agreements |
| Retention receivable, bid and performance securities (1280, 1470) | Per contract or bid, with the warranty end or release date | Agency documents; official receipts for securities posted |
| Inventory, goods in transit (1310, 1320) | Physical count at December 31 valued at weighted average cost; shipments not yet received | Count sheets signed by two counters; shipping documents |
| Input VAT, creditable withholding, prepaid income tax (1410 to 1450) | Input VAT carried forward per the last VAT return; unclaimed 2307s listed one by one; quarterly income tax paid | Filed returns; the 2307s themselves |
| Prepaid expenses, deposits (1460, 1610) | Item, period covered, remaining amount | Contracts and receipts |
| Property and equipment, depreciation (1510 to 1590) | The app's fixed-asset register (POL-16), rebuilt in early December 2026, one row per asset: tag, item, date bought, cost, useful life, accumulated depreciation; plus the custody list | Purchase documents; titles for land, buildings and vehicles |
| Accounts payable, accruals (2110 to 2130) | Open supplier invoices by supplier, USD balances at the December 31 rate; accruals itemized | Supplier statements for the largest balances |
| Taxes payable (2210 to 2230) | Each tax due at December 31 | The December and fourth-quarter returns and payment proofs |
| Unapplied collections, customer advances (2310, 2320) | By customer | Remittance advices |
| Loans payable (2410, 2420) | Per loan: principal, current and non-current split, interest accrued | Bank loan confirmations and amortization schedules |
| Equity (3110 to 3310) | Capital per SEC or DTI registration; retained earnings from the last audited statements rolled forward through the 2026 close (corrected in 0.3) | Registration documents; audited statements; the 2026 closing entries |
| Income and expenses (4000s to 8000s) | None: they start 2027 at zero | 2026 profit closed into retained earnings (3210) |

**Memo items, not balances:** post-dated checks held, booklet serials used and unused, and exemption documents on file are loaded as lists, since they don't sit in any account yet.

## Steps and timeline

The work runs alongside the build in December, so each company's opening is approved and locked by January 20, 2027.

| When | Step | Who |
| --- | --- | --- |
| Early December 2026 | Clean and load master data: partners, products, bank and e-wallet accounts (Master Files 0.1) | Lorelai prepares; Leslie checks; Margaret DL Laforteza approves new partners |
| Early December 2026 | Map each company's Excel accounts to Chart of Accounts 0.4; rebuild the fixed-asset register and custody list (POL-16) | Leslie, with the external accountant |
| December 14 to 18 | Send confirmation requests: banks, lenders, owners and relatives, the largest customers and suppliers | Leslie prepares; each company's Final approver signs |
| December 21 to 23 | Practice run: Merritmed's opening on November 30 figures | Leslie |
| December 29 or 30 | Cash and stock counts, rolled to December 31; booklet serial check | Cashiers count with a witness; two counters per stock count |
| January 4 to 12, 2027 | Close 2026 in Excel; build each opening trial balance with its schedules; agree group and owner balances on both sides | Leslie; differences settled with each company's Final approver |
| By January 18 | Review of each opening and its schedules, including the treatment of any difference still unexplained | External accountant |
| By January 20 | Approve, load once and lock | Each company's Final approver approves; Leslie loads; the app locks the opening (CLS-08) |
| January 20 to 31 | Catch up January's transactions in the app; first monthly comparison with Excel | Lorelai and Leslie |

## Rules for differences and the load

The opening loads only when every schedule ties to its balance; anything that doesn't tie is fixed in Excel first, never forced in.

- **Schedule versus balance:** each schedule must equal its trial balance account exactly. A difference is traced and corrected in the 2026 Excel books before loading.
- **No suspense or plug accounts.** A difference still unexplained at the external accountant's review (by January 18, 2027) gets a written treatment from her and is posted to a named account with that memo attached. (Corrected in 0.3: the deadline was April 15, which fell after the load.)
- **Group and owner balances agree on both sides** before either company loads (CLS-05).
- **The opening is one approved entry per company,** with every schedule attached as evidence (GL-01).
- **Once posted, it is locked.** A later correction is an adjusting entry in the open period, approved on the normal tiers, never an edit of the opening (GL-02, CLS-08).
- **The exit check proves it:** if the app's trial balance matches Excel at each month-end of the parallel run, the opening was right.

## Fallback and re-opening

A company that fails the exit check, or a "no-go" on January 15, 2027, falls back to the original schedule; nothing about the method changes, only the dates.

| Trigger | What happens | New dates |
| --- | --- | --- |
| A company fails the exit check in early April 2027 | Re-opened from its corrected Excel books at March 31, 2027 | Parallel run April to June; go-live July 1, 2027 |
| "No-go" at the January 15, 2027 gate (Build Plan 0.2) | Every company opens at March 31, 2027 instead | Parallel run April to June; go-live July 1, 2027 |
| The July fallback also slips | Last fallback | Go-live January 1, 2028 |

A re-opening follows this same plan: schedules, review, one approved entry, locked.

## Questions

Two for the accountant and one for us, unchanged from 0.2; each has a recommended answer.

| # | For | Question | Recommended answer |
| --- | --- | --- | --- |
| O1 | Accountant ⚠️ | Is December 31, 2026 workable as the opening date for all five companies, given the 2026 year-end close and the annual returns? | Yes; 2026 returns and statements still come from Excel and the official books |
| O2 | Accountant ⚠️ | Can the year-end counts be taken on December 29 or 30 and rolled forward to December 31? | Yes, with movements between the count and year-end listed |
| O3 | Us | Who are the two counters at each company for the year-end stock count? | Named by December 1 |

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.3 | October 21, 2026 | Small fixes: version line corrected; equity row now rolls retained earnings forward through the 2026 close (was "plus 2027 to date"); unexplained differences settled at the external accountant's review by January 18 (was April 15, after the load); fixed assets named as open items; fallback section added from Build Plan 0.2. Method and dates unchanged. |
| 0.2 | October 21, 2026 | Opening moved to December 31, 2026 (year-end) for the April 1, 2027 go-live: no year-to-date income loads; December timeline with a practice run on November 30 figures; load by January 20; questions updated. |
| 0.1 | October 20, 2026 | First draft: six best practices; one opening at March 31, 2027 proved by the parallel run; the schedule and evidence behind every balance; steps and timeline with named people; rules for differences; questions O1 to O3. |
