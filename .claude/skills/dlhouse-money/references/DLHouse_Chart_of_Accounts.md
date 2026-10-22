# DLHouse Chart of Accounts 0.4

Oct 20, 2026 · @Joseph de Leon

About 80 accounts with four-digit codes cover our group: VAT-registered corporations and sole proprietorships trading goods with businesses, government and non-profits, importing (own-name and door-to-door, mostly paid before shipment), collecting through banks, checks, cash and e-wallets, and sharing vehicles and property within the group. Each account says in plain words what goes in it, and anything that only describes a sale or cost (customer type, product line, branch) is a tag, not another account.

## About this document

- **Version and status:** 0.4, draft for review, October 20, 2026.
- **Precedence:** regulation, then the DLHouse Executive Summary (Revision 5), then this document. Terms follow Glossary 0.7; controls follow the Control Register 0.5.
- **Layer:** Layer 1, business guidance and truths. The structure and numbering are a house default for every DLHouse app; which accounts each company switches on is a company setting.
- **Decided:** one shared group chart, the same code meaning the same thing in every company; each company activates the account profile of its type (operating, property, holding or services).
- **Tax content:** every tax account is marked ⚠️ and "Verified: not yet" until the accountant confirms it.
- **Account changes:** prepared by the Accountant, approved by the Finance approver; used accounts are deactivated, never deleted (GL-07).

## Five rules

1. **One meaning per account.** The name and "what goes here" say exactly what belongs in it; there is no "miscellaneous" account.
2. **Tags, not more accounts.** Company, branch, customer type and product category are tags on each entry, so the chart stays short and reports still slice any way.
3. **Each tax has its own account.** Input VAT, output VAT, taxes withheld from us and taxes we withhold are never mixed, so returns come straight from the books.
4. **Group-company items stay separate.** Sales, purchases and balances with group companies have their own accounts, so they can be matched and removed in the owners' combined view.
5. **Add only when needed; never delete.** A new account needs the Finance approver; a used account is deactivated, never deleted or renumbered (GL-07).

## How the codes work

The first digit tells you which part of the business the account is about; codes step by 10, so new accounts fit in between.

| First digit | Part | Plain meaning |
| --- | --- | --- |
| 1 | Assets | What we own |
| 2 | Liabilities | What we owe |
| 3 | Equity | What the owners put in and what we have kept |
| 4 | Revenue | What we earn from sales |
| 5 | Cost of sales | What the goods we sold cost us |
| 6 | Operating expenses | What we spend to run the business |
| 7 | Other income and expenses | Interest, forex and one-off gains or losses |
| 8 | Income tax | Tax on our profit |

**Sub-accounts** are used only where one account has several real-world counterparts: one per bank account, one per foreign currency.

**Tags on every entry:** company (always), branch, customer type (business, government, group company), product category and department. VAT category (VATable, exempt, zero-rated) is a tax code on each line, so it is reported separately without extra sales accounts (TAX-04).

## Company types and account profiles

One chart serves the whole group; each company is classified by type, and its type decides which accounts are switched on. A company may hold more than one type (a holding company that also owns property uses both profiles). Decided October 20, 2026.

| Type | What the company does | Group companies |
| --- | --- | --- |
| Operating | Buys and sells goods (trading) | Agno Metal Trade Corp., Arima Corporation, Florminsons Corp. (corporations); Blasmorisson Commercial, Merritmed Medical Supplies (sole proprietorships) |
| Property | Owns land and buildings and leases them | Planned |
| Holding | Owns shares in group companies | Planned (may combine with property) |
| Services | Sells services, such as logistics or shared services, with no inventory | None yet |

**Account profiles by type** (✓ switched on; — off unless requested)

| Account group (codes) | Operating | Property | Holding | Services |
| --- | --- | --- | --- | --- |
| Cash in bank, petty cash (1120, 1130) | ✓ | ✓ | ✓ | ✓ |
| Undeposited collections, e-wallets (1110, 1150) | ✓ | — | — | ✓ |
| Customer receivables and allowance (1210, 1220) | ✓ | ✓ | — | ✓ |
| Group and owner balances (1230, 1260, 2140, 2150) | ✓ | ✓ | ✓ | ✓ |
| Advances to employees (1240) | ✓ | — | — | ✓ |
| Advances to suppliers; import VAT (1250, 1420) | ✓ | — | — | — |
| Government sales items (1280, 1440, 1470) | ✓ | — | — | — |
| Inventory and goods in transit (1310 to 1330) | ✓ | — | — | — |
| Input VAT, withholding receivable, prepayments (1410, 1430, 1450, 1460) | ✓ | ✓ | ✓ | ✓ |
| Own-use property and equipment (1510 to 1550, 1590, 1610) | ✓ | — | — | ✓ |
| Investment property, construction in progress (1570, 1560) | — | ✓ | — | — |
| Investments in subsidiaries (1650) | — | — | ✓ | — |
| Supplier payables (2110) | ✓ | — | — | ✓ |
| Other payables, accruals, taxes payable (2120 to 2230) | ✓ | ✓ | ✓ | ✓ |
| Unapplied collections, customer advances (2310, 2320) | ✓ | — | — | ✓ |
| Tenant deposits (2330) | — | ✓ | — | — |
| Loans payable (2410, 2420) | ✓ | ✓ | ✓ | ✓ |
| Equity (3110 to 3310) | ✓ | ✓ | ✓ | ✓ |
| Sales of goods, returns (4110, 4120, 4210) | ✓ | — | — | — |
| Rent and services to group companies (4130) | ✓ | ✓ | ✓ | ✓ |
| Rent from outside tenants (4160) | — | ✓ | — | — |
| Services to outside customers (4170) | — | — | — | ✓ |
| Cost of goods sold (5110 to 5220) | ✓ | — | — | — |
| Cost of services (5310) | — | — | — | ✓ |
| People, premises and office costs (6110 to 6240, 6410 to 6460, 6510) | ✓ | ✓ | ✓ | ✓ |
| Selling and delivery (6310 to 6350) | ✓ | — | — | ✓ |
| Bad debts (6520) | ✓ | ✓ | — | ✓ |
| Interest, other income and losses (7110, 7130, 7210, 7220) | ✓ | ✓ | ✓ | ✓ |
| Forex (7120) | ✓ | — | — | — |
| Dividend income (7140) | — | — | ✓ | — |
| Income tax (8110) | ✓ | ✓ | ✓ | ✓ |

**Legal form also matters:**

| Account | Corporations | Sole proprietorships (Blasmorisson Commercial, Merritmed Medical Supplies) |
| --- | --- | --- |
| 3110 Capital | Share capital | Owner's capital |
| 3310 Drawings or dividends | Dividends declared | Owner's drawings, including the owner's own income tax and SSS paid from business funds ⚠️ |
| 1260 Due from owners and related parties | Advances to owners, with a written agreement | Off: money to the owner is drawings |
| 1450, 2230, 8110 Income tax accounts | On | Off: the owner's income tax is personal ⚠️ |
| 6130 Officers' and directors' fees | On when paid | Off |

## 1. What we own (assets)

Twenty-nine accounts; the ones marked "minus" reduce the account above them.

| Code | Account | What goes here |
| --- | --- | --- |
| 1110 | Undeposited collections | Cash and checks received but not yet deposited; back to zero after each daily deposit |
| 1120 | Petty cash fund | The fixed ₱10,000 fund for small expenses |
| 1130 | Cash in bank | One sub-account per bank account (all in pesos) |
| 1150 | E-wallets | GCash and Maya business accounts, one sub-account each; swept to the bank at least weekly ⚠️ |
| 1210 | Accounts receivable | What customers owe on Invoices |
| 1220 | Allowance for doubtful accounts | Minus: our estimate of what customers won't pay |
| 1230 | Due from group companies | What other group companies owe us |
| 1240 | Advances to employees | Cash advances not yet liquidated |
| 1250 | Advances to suppliers | Payments made before goods arrive; sub-accounts for local and foreign suppliers (most imports are paid before shipment) |
| 1260 | Due from owners and related parties | Advances to owners or their relatives (corporations only), each with a written agreement |
| 1280 | Retention receivable | Warranty retention withheld by government agencies (1% to 5%), released after the warranty period |
| 1310 | Inventory | Goods on hand, at weighted average cost |
| 1320 | Goods in transit | Own-name import costs gathered until the landed cost sheet posts |
| 1330 | Allowance for inventory write-down | Minus: stock worth less than it cost |
| 1410 | Input VAT ⚠️ | VAT on VAT Invoices in our name; never from a commercial invoice |
| 1420 | Input VAT on imports ⚠️ | VAT paid to customs on own-name imports, with the import entry and customs receipt |
| 1430 | Creditable withholding tax receivable ⚠️ | Tax customers withheld from their payments to us, backed by 2307s |
| 1440 | Creditable VAT withheld receivable ⚠️ | The 5% VAT government agencies withheld, backed by 2307s |
| 1450 | Prepaid income tax ⚠️ | Quarterly income tax already paid (corporations only) |
| 1460 | Prepaid expenses | Insurance, rent or subscriptions paid ahead |
| 1470 | Bid and performance securities | Cash posted with government agencies until returned |
| 1510 | Delivery vehicles | Trucks and vans, each titled to one company |
| 1520 | Warehouse and office equipment | Racks, forklifts, computers, tablets, furniture |
| 1530 | Leasehold improvements | Fit-out of rented space |
| 1540 | Land | Owned land; not depreciated |
| 1550 | Building | Owned buildings used by the company itself |
| 1570 | Investment property ⚠️ | Buildings the property or holding company owns to rent out, at cost |
| 1590 | Accumulated depreciation | Minus: wear on buildings, vehicles, equipment and improvements; one sub-account each |
| 1610 | Deposits | Rental and utility deposits |

## 2. What we owe (liabilities)

Twelve accounts; every tax we collect or withhold has its own line, and owner balances are never netted against advances to owners.

| Code | Account | What goes here |
| --- | --- | --- |
| 2110 | Accounts payable: suppliers | What we owe for goods; a USD sub-account for the occasional balance paid after arrival |
| 2120 | Accounts payable: other | Rent, services and utilities billed to us |
| 2130 | Accrued expenses | Goods received or services used but not yet billed; reversed automatically next month |
| 2140 | Due to group companies | What we owe other group companies, including rent and vehicle charges |
| 2150 | Due to owners and related parties | Loans from owners or their relatives, each with a written agreement |
| 2210 | Output VAT payable ⚠️ | VAT on our sales |
| 2220 | Withholding tax payable ⚠️ | Tax we withheld from suppliers, landlords and directors' fees, to pay to the BIR |
| 2230 | Income tax payable ⚠️ | Income tax still due for the year (corporations only) |
| 2310 | Unapplied collections | Customer money not yet matched to an Invoice |
| 2320 | Customer advances | Payments received before delivery, including government advance payments (up to 15%) |
| 2410 | Loans payable: current | Bank loans due within 12 months; one sub-account per loan or credit line |
| 2420 | Loans payable: non-current | The part of bank loans due after 12 months |

## 3. What the owners put in and what we kept (equity)

Four accounts; the names follow each company's legal form (see "Which accounts each company uses").

| Code | Account | What goes here |
| --- | --- | --- |
| 3110 | Capital | Share capital (corporation) or owner's capital (sole proprietorship) |
| 3210 | Retained earnings | Profits kept in the business from past years |
| 3220 | Current year profit | This year's profit so far; calculated by the app, never typed |
| 3310 | Drawings or dividends | Dividends declared (corporation) or owner's drawings (sole proprietorship) |

## 4 and 5. What we earn and what the goods cost (revenue and cost of sales)

Ten accounts. One sales account covers every outside customer: the tag tells business from government, and the tax code tells VATable, exempt and zero-rated apart. An exempt or zero-rated sale needs the customer's exemption document on file ⚠️.

| Code | Account | What goes here |
| --- | --- | --- |
| 4110 | Sales | Sales to outside customers, posted from Invoice Records |
| 4120 | Sales to group companies | Goods sold to other group companies, removed in the owners' combined view |
| 4130 | Rental and service income from group companies | Rent, vehicle usage and other charges to group companies, removed in the owners' combined view |
| 4210 | Sales returns, discounts and deductions | Minus: credit memos for returns and discounts, and liquidated damages deducted by agencies ⚠️ |
| 5110 | Purchases | Goods bought locally, own-name imports (landed cost) and door-to-door imports (all-in cost) |
| 5120 | Purchases from group companies | Goods bought from other group companies |
| 5130 | Purchase returns and discounts | Minus: goods sent back and supplier discounts |
| 5140 | Freight-in | Local delivery of goods to our warehouse |
| 5210 | Cost of goods sold | The month-end inventory valuation entry |
| 5220 | Inventory write-downs and losses | Damaged, expired, missing or slow stock |

## 6. What we spend to run the business (operating expenses)

Nineteen accounts, grouped as people, premises, selling and delivery, and office. Charges from group companies post to the normal account with the group-company tag.

| Code | Account | What goes here |
| --- | --- | --- |
| 6110 | Salaries and benefits | Sub-accounts: salaries, 13th month, government contributions, benefits (matching the income tax return lines ⚠️); each company pays its own share of shared staff |
| 6130 | Officers' and directors' fees | Directors' fees and per diems by board resolution, with expanded withholding (corporations only) ⚠️ |
| 6210 | Rent | Warehouse and office rent, including rent from the property or holding company |
| 6220 | Utilities and communication | Power, water, phone, internet |
| 6230 | Repairs and maintenance | Buildings, equipment and vehicles |
| 6240 | Insurance | Property, stock and vehicle insurance |
| 6310 | Delivery costs | Fuel, tolls, upkeep of our own vehicles, usage charges for group vehicles, and installation or assembly done for customers at no separate charge |
| 6320 | Freight and courier to customers | Third-party delivery to customers |
| 6330 | Bidding and security costs | Bid documents and fees, surety bond premiums and bank guarantee fees |
| 6340 | Advertising | Marketing and promotion |
| 6350 | Representation ⚠️ | Client meals and entertainment; kept apart because the tax deduction is capped |
| 6410 | Office supplies | Paper, toner and small office items |
| 6420 | Professional fees | Accountant, auditor, lawyer, customs broker |
| 6430 | Taxes and licenses ⚠️ | Business permits, real property tax, documentary stamp tax, registration fees |
| 6440 | Transportation and travel | Staff travel other than deliveries |
| 6450 | Software and subscriptions | Software, hosting and online services |
| 6460 | Bank and payment fees | Transfer fees, e-wallet fees, returned-check fees |
| 6510 | Depreciation | Yearly wear on buildings, vehicles, equipment and improvements |
| 6520 | Bad debts | Provision matrix charge and approved write-offs |

## 7 and 8. Other items and income tax

Six accounts keep interest, forex and one-offs below operating profit, so they never blur the trading result.

| Code | Account | What goes here |
| --- | --- | --- |
| 7110 | Interest income | Bank interest, recorded before final tax ⚠️ |
| 7120 | Forex gain or loss | Only for the occasional USD balance paid after arrival; sub-accounts for realized and unrealized. Advances paid in pesos are not revalued ⚠️ |
| 7130 | Other income | Named one-offs such as scrap sales or recoveries |
| 7210 | Interest expense | Interest on bank loans and credit lines |
| 7220 | Other losses | Named one-offs such as asset disposals or lost tax credits |
| 8110 | Income tax expense ⚠️ | Tax on the year's profit (corporations only) |

## Add when needed

Defined now so the codes stay consistent, but switched on only when a company needs them.

| Code | Account | Switch on when |
| --- | --- | --- |
| 1160 | Short-term deposits | A company places time deposits of 3 months or less |
| 1170 | Restricted cash: guarantee margins | A bank holds cash behind a guarantee or surety arrangement |
| 1560 | Construction in progress | A company builds or fits out a site |
| 1620 | Software (intangible asset) ⚠️ | The accountant says to capitalize it |
| 1650 | Investments in subsidiaries ⚠️ | A holding company owns shares in group companies |
| 2250 | VAT payable ⚠️ | The accountant wants VAT closed to one account at each return |
| 2260, 2270 | Compensation withholding payable; Government contributions payable | The payroll module goes live |
| 4140, 4150 | Sales: VAT-exempt; Sales: zero-rated ⚠️ | A company makes such sales regularly enough to need its own line |
| 7140 | Dividend income ⚠️ | A holding company receives dividends from group companies |
| 8120 | Deferred income tax ⚠️ | Deferred taxes are switched on (agenda 4.2) |
| 2330 | Tenant deposits | A property company takes security deposits from tenants (property profile) |
| 4160 | Rental income: outside tenants ⚠️ | A property company leases to anyone outside the group (property profile) |
| 4170 | Service income: outside customers | A services company sells to customers outside the group (services profile) |
| 5310 | Cost of services | A services company's direct costs: drivers, fuel and vehicle costs of the services it sells (services profile) |

## Mapping from the worked examples

Every provisional account in Worked Examples 0.2 maps to one code; four examples change slightly once the codes are applied.

| Provisional account in the examples | Code | Change in the examples |
| --- | --- | --- |
| Cash in bank; Petty cash fund | 1130; 1120 | — |
| Accounts receivable | 1210 | — |
| Due from / due to affiliates | 1230 / 2140 | Renamed "group companies" |
| Advances to employees | 1240 | — |
| Inventory; Goods in transit | 1310; 1320 | — |
| Input VAT | 1410; 1420 for imports | W6: import VAT to 1420 |
| Creditable withholding tax receivable; Creditable VAT withheld receivable | 1430; 1440 | — |
| Accounts payable | 2110 suppliers; 2120 other | W9: rent payable to 2120 |
| Output VAT payable; Withholding tax payable (expanded) | 2210; 2220 | — |
| Unapplied collections | 2310 | — |
| Owners' equity | 3110 | — |
| Sales; Sales returns and allowances | 4110; 4210 | W15: STC's sale to SDI to 4120 |
| Purchases; Cost of goods sold | 5110; 5210 | W15: SDI's purchase to 5120 |
| Rent; Delivery; Office supplies; Bank charges | 6210; 6310; 6410; 6460 | — |
| Forex gain or loss | 7120 | W7: rewritten as an advance paid in pesos (1250), the current version kept as a variant using 7120's sub-accounts |
| Loss on unclaimed tax credits | 7220 | — |

## Questions

Ten for the accountant and advisors; each has a recommended answer. The ten business questions behind this version were answered on October 20, 2026.

| # | For | Question | Recommended answer |
| --- | --- | --- | --- |
| A1 | Accountant ⚠️ | How does each company's current Excel chart map onto this one? | Bring the current charts and trial balances to the session (agenda section 8) |
| A2 | Accountant ⚠️ | Do these accounts roll up cleanly to the PFRS for Small Entities statements and the income tax return schedules? | Adjust names and 6110 sub-accounts to match |
| A3 | Accountant ⚠️ | Should VAT be closed to one VAT payable account (2250) at each return? | Yes, so the ledger shows what was filed |
| A4 | Accountant ⚠️ | For Merritmed, does the owner's income tax and SSS paid from business funds go to drawings? May a sole proprietorship use the income-tax basis instead of PFRS for Small Entities? | Drawings; framework per your advice |
| A5 | Accountant ⚠️ | Do advances to foreign suppliers paid in pesos stay at their peso amount (no revaluation)? | Yes |
| A6 | Accountant ⚠️ | Are e-wallet balances cash and cash equivalents? | Yes, reconciled monthly like a bank |
| A7 | Accountant ⚠️ | Which non-profit customers are exempt, zero-rated or VATable, what document proves it, and must input VAT be split? | Classify each customer; document on file before invoicing |
| A8 | Accountant ⚠️ | For door-to-door imports, is input VAT claimable only from the forwarder's VAT Invoice in our name? | Yes; otherwise VAT is part of cost |
| A9 | Tax advisor ⚠️ | Holding and property company: tax-free transfer of existing property and shares, incorporating Merritmed, and investment property treatment | Put new property in the new company first; decide transfers with written advice |
| A10 | Compliance and transport advisors ⚠️ | Warranty period for our goods under RA 12009; whether charging group companies for vehicle use needs a franchise | Confirm before the first charge |
| C1 | Us | One shared group chart, or a separate chart per company? | Decided October 20, 2026: one shared chart, with each company classified as operating, property, holding or services and switched on by its type's account profile |

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.1 | October 20, 2026 | First draft: ten best practices, five-digit structure with dimensions, about 120 accounts across assets, liabilities, equity, revenue, cost of sales, operating expenses, other items and income tax; mapping from Worked Examples 0.2; questions A1 to A6 and C1 to C2. |
| 0.2 | October 20, 2026 | Simplified: four-digit codes; about 70 core accounts plus an "add when needed" list; plain section headings; one "what goes here" column instead of normal balance and reporting line; ten practices cut to five rules; questions cut to six. |
| 0.3 | October 20, 2026 | Fitted to our business from ten questions: corporations and sole proprietorships, all VAT; occasional exempt sales; own-name and door-to-door imports paid mostly before shipment; e-wallets; government retention and securities; own and third-party delivery; owned and rented premises; bank loans and owner balances; separate pay for shared staff; group rent and vehicle charges. Added 1150, 1260, 1280, 1540, 1550, 1570, 2420, 4130, 6130 to the core; removed the USD bank account; added a per-company-type table; holding company accounts added to "add when needed"; questions A1 to A10. |
| 0.4 | October 20, 2026 | C1 decided: one shared chart with company types (operating, property, holding, services) and an account profile per type; added 2330 Tenant deposits, 4160 Rental income: outside tenants, 4170 Service income: outside customers, 5310 Cost of services to "add when needed." |
| 0.4 (update) | October 21, 2026 | Precedence line updated to the current versions of the Executive Summary and related documents; no content change. |
