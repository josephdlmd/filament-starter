---
name: dlhouse-finishes
description: "DLHouse rules for the look and language of a DLHouse app: the panel theme and its tokens on Filament's six color roles plus the Ledger extras, the Softer finish (zinc neutrals, near-black primary, blue only for focus), status shapes and pills, typography, density, numbers, print styles, language files with glossary terms, and WCAG 2.2 AA in light and dark. Use when touching the theme, colors, fonts, spacing, status display, screen text, print templates or accessibility."
---

> Scope (dlhouse/guidelines 0.2.2): in DL Group apps, Filament Storybook and the starter's themes govern screens and look. Use this skill only where Storybook is silent; where they disagree, Storybook wins. See "Scope" in the DLHouse core guideline.

# DLHouse finishes

The look changes only by token values in the panel theme, and every screen is readable in light, dark and grayscale. Screens use token names, never raw colors (F9); user-facing text comes only from language files using glossary terms (F7). This skill holds the token values and the checks; the Style Guide and the Glossary beside it hold the full tables and every term.

## When to use this skill

Creating or editing the Filament theme, registering colors, writing language files, styling a status, amount, table, print template or report, choosing type or spacing, or checking accessibility.

## How the tokens plug into Filament

Our colors fill Filament's six roles; the Ledger extras are CSS variables in the panel's custom theme (made with `make:filament-theme`, loaded through the panel's Vite theme). The gray role and the near-black primary are registered as hand-set palettes (50 to 950), not generated from one hex, so ground, gridline, text and the dark-mode near-white button appear exactly (T7). Corners, row-only lines and the rounded table panel are theme CSS, never view overrides. Confirm exact Filament APIs with Boost's Search Docs before use.

| Filament role | DLHouse token | Used for |
| --- | --- | --- |
| primary | Primary action (near-black) | Primary buttons, the active tab, checked controls |
| gray | Neutrals (zinc ground, surface, text, rules) and Status: draft | Everything that isn't a signal |
| info | Status: approved | Approved, waiting to post or release |
| success | Status: posted | Final and permanent |
| warning | Status: submitted; needs attention | Waiting on someone; alarms |
| danger | Status: voided; rejected; locks | Cancelled, refused, blocked |

Ledger extras: hairline rule, strong rule, double rule under totals, selected row and its blue bar, focus ring, link, control radius, panel radius.

## Color tokens (Softer finish, 0.5)

| Token | Light | Dark (charcoal) | Used for |
| --- | --- | --- | --- |
| Ground | #FFFFFF | #18181B | Page and cells |
| Header and zebra fill | #F4F4F5 | #212125 | Table header row, totals row, read-only cells |
| Gridline | #E4E4E7 | #3F3F46 | Row lines and the table panel border; no column lines |
| Field border | #84848D | #7A7A83 | Editable field outline |
| Text | #09090B | #FAFAFA | All body text and amounts |
| Muted text; Status: draft | #52525B | #B4B4BC | Labels, help text, draft |
| Strong rule | #3F3F46 | #A1A1AA | Under the header row and above totals |
| Primary action | #18181B | #FAFAFA | Primary buttons, active tab, checked controls |
| Text on primary button | #FAFAFA | #18181B | Primary button label |
| Link | Text color, underlined | Text color, underlined | Links in text and tables |
| Selected row | #EEEEF0 | #2E2E33 | The row being worked on, with a 2 px left bar in the focus ring color (T6) |
| Focus ring | #0B57D0 | #7CACF8 | 2 px outline, 2 px offset |
| Status: approved (info) | #0B6478 | #56C2D6 | Approved |
| Status: posted (success) | #116329 | #56D364 | Posted |
| Status: submitted; alarms (warning) | #7D4E00 | #E3B341 | Submitted; ▲ alarms |
| Status: voided; rejected; locks (danger) | #B42318 | #FF8A82 | Voided, rejected, ■ locks |
| Overlay behind dialogs | #09090B at 40% | #000000 at 60% | Dialogs and slide-overs |

Blue appears only as the focus ring and the selected-row bar. Links are text color and always underlined; the underline thickens to 2 px on hover; visited looks the same. Dark mode is charcoal; every token has both values; never style one mode only. Theme mode follows the device setting and users can switch in their profile (T1).

## Status display

Every status shows its word, its shape and its color role; color never carries meaning alone.

| Status | Shape | Role |
| --- | --- | --- |
| Draft | ○ hollow circle | gray |
| Submitted | ◐ half-filled circle | warning |
| Approved | ◕ three-quarter circle | info |
| Posted | ● filled circle | success |
| Voided | ⊘ circle with a slash | danger |

The pill: fully rounded, fill at 12% of its status color over whatever sits behind it, word and shape in the full status color, 12 px label weight 500, 20 px tall, no border. Events (Rejected ✕ danger, Recalled ↩ gray) appear only in history beside the reason. Progress states are plain muted text beside the pill, no shape, no fill. Alarms are a ▲ in warning with text; locks a ■ in danger with the rule in words; neither takes a pill. Shapes are drawn as icons in the build.

## Typography

Source Serif 4 for page titles only; IBM Plex Sans for everything else; both self-hosted with system fallbacks (Georgia; the system sans-serif). Desk base 13 px, tablet 16 px. Page title 22/24 px weight 600; section heading 15/17 px 600; body 13/16 px 400; label 12/14 px 500; small 12/13 px 400; amounts as body with tabular numerals, totals 600; the large amount on an approval decision 20/24 px 600. Line height 1.45 for text, 1.25 for table rows; nothing below 12 px; numbers never in the serif; uppercase only for short labels such as booklet serials.

## Spacing, density, corners and rules

Compact (desk): spacing 4, 8, 12, 16, 24 px; rows and fields 28 px; cell padding 6 px; section gap 16 px. Comfortable (tablet): spacing adds 32 px; rows and fields 44 px; cell padding 12 px; section gap 24 px; minimum touch target 44 × 44 px. Control radius 8 px (fields, buttons, menus, inputs); panel radius 10 px (panels, cards, dialogs, the table panel); pills fully rounded. The table sits inside one bordered panel; 1 px hairline between rows and around panels, no vertical column lines; strong rule 1 px under headers and above totals; double rule (two 1 px lines 2 px apart) under final totals only. One side panel for checks on forms, one per section on detail views, never nested. No shadows except dialogs and slide-overs.

## Numbers

Right-aligned, tabular numerals, two decimals, comma thousands separators: 1,411,200.00. Negatives in parentheses, never a minus sign or red alone. The peso sign sits in the column header ("Amount (₱)"), not in each cell; a lone amount in a sentence or on an approval card carries it: ₱1,140,000.00. Foreign amounts show the currency code and the rate: USD 20,000.00 at ₱56.00. Zero shows as 0.00, never a dash. Amounts never take status colors.

## Language

All user-facing text comes from Laravel language files, keyed so a rename is one edit, using Glossary 0.7 terms exactly: "Invoice Record" never bare "Invoice" for our document (F3); "acknowledgement receipt" not "official receipt"; "credit terms" not "payment terms"; "partner", "supplier" (not vendor), "customer" (not client); no abbreviations such as AR, AP, COGS, UOM, SKU, CAS in screens. Plain English, sentence case; name the rule when refusing an action. A term not in the glossary is added there before it appears on a screen: stop and ask.

## Print

Black text on white, no backgrounds or shadows; rules print as lines; status pills print as word and shape without fill. Every page carries the company name, "Internal management report" (CLS-09), the print date and time, the user, and page X of Y. Every external document except the Invoice carries the input-tax phrase conspicuously on page 1 (SAL-10); Invoice Records are never printed for or sent to customers (F4); their internal printouts carry the input-tax phrase and "Internal reference" (Glossary 0.7). A4 portrait by default, landscape for wide reports, 15 mm margins.

## Accessibility (WCAG 2.2 AA, both modes)

Every field has a label; every action is keyboard reachable; the focus ring is never removed; touch targets at least 44 px on tablets; color never alone. Text needs 4.5:1, meaningful lines and icons 3:1. Every pair in the Style Guide passes except the decorative gridline; the tightest are the voided pill on the light selected row (4.69) and the dark selected row (4.80). A new color pair is checked for contrast and added to the Style Guide's tables before use; any change to the selected row or the dark ground re-runs the tables. Filament's own buttons and badges use shades derived from these values, so the rendered showcase page is checked again before go/no-go (T3).

## Changing a token

A token value change is a Class A release when cosmetic, logged in the changelog with what moved and why. Add a token only when two screens need the same decision; prune tokens no screen uses. Never edit screens to change the look.

## References (in this folder)

- `references/DLHouse_Style_Guide_and_Tokens.md` (0.5): full token tables, contrast checks, decisions T1 to T8
- `references/DLHouse_Glossary.md` (0.7): every term, code name, "Printed as" and "Avoid" column
