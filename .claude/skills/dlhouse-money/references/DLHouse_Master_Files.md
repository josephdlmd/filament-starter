# DLHouse Master Files 0.1

Oct 20, 2026 · @Joseph de Leon

One shared list of partners and one shared product catalog serve all five companies; each company switches on what it uses and keeps its own terms, prices, stock and balances. This document sets what every record holds and who may change it.

## About this document

- **Version and status:** 0.1, draft for review, October 20, 2026.
- **Precedence:** regulation, then the DLHouse Executive Summary (Revision 5), then this document. Terms follow Glossary 0.7; controls follow the Control Register 0.5; accounts follow the Chart of Accounts 0.4.
- **Layer:** Layer 1, business guidance and truths. The structure is a house default for every DLHouse app; the actual partners, products and categories are company data.
- **Scope:** the master files app 1 needs: partners (customers, suppliers, payees), products, units of measure, tax codes, bank and e-wallet accounts, and employees for cash advances. Price lists and discount tiers come with the sales module; item-level stock with the inventory module.

## Best practices for master data

Master data is where fraud and errors start quietly, so these seven practices are house defaults.

1. **One record per real thing.** One partner per TIN and branch code; one product per item. Duplicates split balances and hide fake suppliers.
2. **Shared identity, local terms.** Who a partner is (name, TIN, address, bank details) is kept once; what each company agrees with them (credit limit, terms, prices) is kept per company.
3. **Facts copied from the source.** Registered names and TINs come from the partner's BIR certificate or Invoice, never typed from memory; real data only, never placeholders.
4. **Changes approved and logged.** New partners and bank-detail changes are approved by someone other than the person entering them; every change keeps the old value.
5. **Codes that never change meaning.** Codes are short and permanent; a renamed or recategorized item keeps its code.
6. **Deactivate, never delete.** A used record is deactivated so history still reads correctly.
7. **Review regularly.** Inactive, duplicate-looking and incomplete records are reviewed quarterly.

## Decisions so far

Six decisions made on October 20, 2026 shape every record below.

| # | Decision | Effect |
| --- | --- | --- |
| MF1 | One shared partner list for the group, with company-specific settings | A customer or supplier exists once; each company keeps its own credit limit, terms, status and balance; bank details verified once protect every company |
| MF2 | One shared product catalog with one coding system; each company switches on its own items | Stock, cost and prices stay per company; intercompany sales use the same product code on both sides |
| MF3 | Catch weight (selling by actual weighed kilograms) is an Agno-only feature of the future inventory module, not a separate app | App 1 Invoice Records record quantity and unit exactly as invoiced; no conversions |
| MF4 | Anonymous walk-in buyers use one shared "Walk-in customers" record with no TIN, cash or e-wallet only, never credit | VAT-registered buyers of ₱1,000 or more, repeat buyers, credit buyers, government and non-profits always get their own record |
| MF5 | No placeholder TINs (such as 100-000-000-000) anywhere in the app | A "no TIN" flag instead; reports insert whatever filler a BIR format requires at output time, as the accountant prescribes ⚠️ |
| MF6 | Products grouped in two levels, product line then category, used as the product-category tag | Margins by line and category without extra accounts |

## Partners

A partner is anyone we deal with; its identity is kept once for the group, and each company adds its own settings.

**Shared identity (one per partner)**

| Field | Required | Notes |
| --- | --- | --- |
| Partner code | Yes | System-assigned, permanent (P-000001) |
| Registered name | Yes | Exactly as on the BIR certificate or the partner's Invoice |
| TIN and branch code | Yes, unless flagged "no TIN" | Validated by `TinInput`; placeholders refused (MF5); unique with the branch code |
| Registered address | Yes | PSGC address fields |
| Partner type | Yes | Business, government agency, non-profit, group company, individual, or walk-in |
| Roles | Yes | Customer, supplier, payee (one or more) |
| VAT status | Yes | VAT-registered or non-VAT; affects input VAT checks |
| Withholding agent status | For customers | Whether the customer withholds from us, and at what rate ⚠️; drives expected withholding (TAX-01) |
| Exemption document | When exempt or zero-rated | Document, reference and validity date (SAL-11) |
| Related party | Yes | Owners, their relatives and group companies; drives PAY-04 and CLS-11 |
| Bank details | For payees | Each change needs call-back verification and approval (PAY-02); encrypted (ITC-06) |
| Contacts | Recommended | Name, phone and email for billing and call-back |

**Per-company settings**

| Setting | Notes |
| --- | --- |
| Active for this company | A company sees only its active partners |
| Credit limit and credit terms | Customers; Final approver for changes (SAL-07); 30 days to start (S19) |
| Revenue transfer point | Delivery receipt or inspection and acceptance (government contracts) |
| Default tax code | VATable, exempt or zero-rated; exempt needs the exemption document |
| Payor withholding rate | Suppliers and landlords we withhold from (PAY-06) ⚠️ |

**Duplicates:** a second partner with the same TIN and branch code is refused; for "no TIN" partners, a name-and-address match warns before saving.

**The walk-in customer (MF4):** one shared record, type "walk-in," no TIN, cash or e-wallet only. Alarms: any balance left at day-end, and any walk-in Invoice Record of ₱1,000 or more that shows a buyer TIN.

## Products

One catalog with permanent codes; each company switches on its own items, and each item carries the line and category used for margin reports.

| Field | Required | Notes |
| --- | --- | --- |
| Product code | Yes | System-assigned, permanent (PR-000001); meaning lives in the fields, not the code, so recategorizing never changes it |
| Name and description | Yes | As it should appear on Invoice Record lines |
| Product line and category | Yes | Two-level grouping (MF6) |
| Base unit | Yes | The unit stock and cost are kept in (piece, box, kg, meter) |
| Other units | Optional | Fixed conversions for buying or selling (bundle = 10 pieces) |
| Sold by actual weight | Later | Agno items only, with the inventory module (MF3) |
| Default tax code | Yes | VATable unless the item itself is exempt ⚠️ |
| Regulated item | Optional | Flags medical items needing FDA registration details later ⚠️ |
| Active per company | Yes | A company sells and buys only its active items |

**Product lines and categories (to complete)**

| Company | Product line | Categories |
| --- | --- | --- |
| Agno Metal Trade Corp. | Metals; hardware; industrial supplies | For example: bars, sheets and plates, pipes and tubes, structural shapes (to confirm) |
| Merritmed Medical Supplies | Medical supplies; safety; hygiene | For example: consumables, equipment, protective equipment (to confirm) |
| Arima Corporation | General consumables; office consumables (more lines may follow) | To list (for example: office, cleaning, janitorial, packaging) |
| Florminsons Corp. | Machinery (more lines may follow) | To list; units may need serial numbers for warranty (inventory module, like MF3) |
| Blasmorisson Commercial | Office furniture (more lines may follow) | To list (for example: desks, chairs, storage, partitions) |

A line may be shared by several companies; the catalog lists it once. All five companies sell goods only: installation or assembly is done at no separate charge and its cost is an expense (6310), so no company takes the services profile (decided October 20, 2026).

## Other master lists

Four short lists complete what app 1 needs.

| List | What it holds | Scope |
| --- | --- | --- |
| Units of measure | Piece, box, bundle, kg, meter, liter and others, with fixed conversions per product | Group |
| Tax codes | VATable 12%, VAT-exempt, zero-rated; withholding codes and rates from the signed tax matrix ⚠️ | Group, rates per the tax matrix (TAX-05) |
| Bank and e-wallet accounts | Each company's bank accounts and GCash and Maya business accounts, each linked to its sub-account (1130, 1150) | Per company |
| Employees | Name and company, for cash advances and liquidations (not payroll) | Per company |

## Who creates and approves master data

The person who enters a record never approves it; the riskiest changes, bank details, need a call-back too.

| Change | Prepared by | Approved by | Control |
| --- | --- | --- | --- |
| New customer or supplier | Encoder | Finance approver | SAL-06 |
| New payee or bank-detail change | Encoder | Finance approver, after call-back to a number on file | PAY-02 |
| Credit limit or terms | Accountant | Company's Final approver | SAL-07 |
| Exemption document or withholding status | Encoder | Accountant | SAL-11, TAX-01 |
| New product or category | Encoder | Accountant | Recommended (new) |
| Deactivation | Accountant | Finance approver | GL-07 pattern |
| Quarterly review of inactive, duplicate-looking and incomplete records | Accountant | Finance approver | Recommended (new) |

## Cutover: loading master data from Excel

Master data is cleaned before it is loaded, never after; the clean-up runs in December 2026, alongside the build, so it is loaded by mid-January for the January to March parallel run.

1. **Gather** each company's customer, supplier and product lists from Excel and recent Invoices.
2. **Merge duplicates** across the five companies into one partner per TIN and branch code, and one product per item.
3. **Correct names and TINs** from Invoices and certificates; remove placeholder TINs such as 100-000-000-000 and flag those buyers "no TIN" (MF5).
4. **Verify bank details** of every payee by call-back before loading (PAY-02).
5. **Assign lines and categories** to every product.
6. **Load through the app's import screen,** with the same approvals as new records, and keep the clean-up workbook as evidence.
7. **Tie to opening balances:** every customer and supplier with an opening balance must exist first (CLS-08).

## Questions

Two for us and two for the accountant; each has a recommended answer.

| # | For | Question | Recommended answer |
| --- | --- | --- | --- |
| Q1 | Us | What are the product lines and categories for each company? | A rough list per company now; refined during the February clean-up |
| Q2 | Us | Should new products need the Accountant's approval, and should the quarterly master-data review become controls? | Yes to both, as new controls in the next Control Register version |
| Q3 | Accountant ⚠️ | Has 100-000-000-000 been used in any filed sales list, and what does the current format require for buyers without a TIN? | Treat past filings as advised; filler inserted at report time only |
| Q4 | Accountant ⚠️ | Buyer-information rules for sales below ₱1,000 and to non-VAT buyers | Confirm against RR 7-2024 and RMC 77-2024 |
| Q5 | Accountant ⚠️ | When machinery or furniture is installed at no separate charge, is revenue still recognized at the signed delivery receipt, or only once installation is complete? | At delivery when installation is minor; at completion when the customer accepts only an installed unit |

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.1 | October 20, 2026 | First draft: seven best practices; decisions MF1 to MF6; partner and product records; other lists; approvals; Excel cutover steps; questions Q1 to Q4. |
