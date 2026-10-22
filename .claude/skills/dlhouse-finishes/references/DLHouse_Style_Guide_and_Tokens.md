# DLHouse Style Guide and Tokens 0.5

Oct 21, 2026 · @Joseph de Leon

Version 0.5 gives DLHouse a softer finish on ledger density: zinc neutrals, a near-black primary action, 8 px corners, row-only lines and tinted status pills, while rows stay at 28 px on desks. Every color passes WCAG 2.2 AA in light and dark.

## About this document

- **Version and status:** 0.5, draft for review, October 21, 2026.
- **Precedence:** regulation, then the DLHouse Executive Summary (Revision 5), then this document. Terms follow Glossary 0.7; patterns follow the Screen Pattern Guide 0.2.
- **Layer:** Layer 3, design system (`dlhouse/ui`): the finishes. Tokens are house defaults; a later app may choose another style, but only by swapping token values, never by editing screens.
- **What a token is:** a named decision, such as "Status: posted," with its light and dark value. Screens use the name, never the raw color, so a change is one edit.
- **What changed in 0.5:** T4 is revised from "spreadsheet neutral" to "Softer finish, ledger density." Colors, corners, table chrome and the status badge change; densities, typography, status shapes and roles, numbers and print do not.
- **Where the look came from:** the Slate Blade UI kit (shadcn style) was used as a visual reference only. No Slate code or tokens are used; all values here are our own. House default (decided October 21, 2026): third-party UI kits are reference only; anything borrowed enters \`dlhouse/ui\` as our own component, uses DLHouse tokens only, passes the light and dark contrast checks, and records its source license.
- **Filament facts used here** come from the current Filament documentation (v4 docs, which v5 shares); exact APIs are confirmed again at build time.

## Best practices for design tokens

These eight practices follow the W3C Design Tokens Community Group's approach and mature systems such as Polaris and Carbon; all are house defaults. Unchanged from 0.4.

1. **Name by role, not by look.** "Status: posted," not "green"; a role survives a rebrand, a color name doesn't.
2. **Two tiers.** A small set of raw values, then role tokens that point at them; screens only ever use role tokens.
3. **Light and dark together.** Every token is defined in both modes at the same time, so dark mode is never an afterthought.
4. **Contrast is checked, not eyeballed.** Text at least 4.5:1, large text and meaningful lines or icons at least 3:1 (WCAG 2.2 AA), recorded per pair.
5. **Color never carries meaning alone.** Every status has text and a shape, so it survives color blindness, grayscale printing and a bad screen.
6. **Few tokens.** Add one only when two screens need the same decision; prune any token no screen uses.
7. **Use the framework's slots first.** Map onto Filament's roles before inventing variables, so Filament's own components pick up our finishes.
8. **Version and log changes.** A token change is a Class A release when cosmetic; the changelog says what moved and why.

## How the tokens plug into Filament

Our colors fill Filament's six roles; the Ledger extras sit beside them in the panel's theme file. Decided October 20, 2026; in 0.5 the blue moves out of primary and survives only as the focus ring, a Ledger extra.

**What Filament does (from its docs):** it ships six colors used everywhere (primary, success, warning, danger, info, gray) and uses CSS variables for them. A registered color is a full palette of shades from 50 to 950 in OKLCH, which Filament can generate from a single hex value. Filament picks the shade per component and applies contrast rules suited to each one ([colors docs](https://filamentphp.com/docs/4.x/styling/colors)). Extra CSS lives in a custom theme made with `make:filament-theme` and loaded through the panel's Vite theme ([styling docs](https://filamentphp.com/docs/4.x/styling)).

| Filament role | DLHouse token | Used for |
| --- | --- | --- |
| primary | Primary action (near-black) | Primary buttons, the active tab, checked controls |
| gray | Neutrals (zinc ground, surface, text, rules) and Status: draft | Everything that isn't a signal |
| info | Status: approved | Approved, waiting to post or release |
| success | Status: posted | Final and permanent |
| warning | Status: submitted; needs attention | Waiting on someone; alarms |
| danger | Status: voided; rejected; locks | Cancelled, refused, blocked |

**Ledger extras** (theme CSS variables, not Filament colors): hairline rule, strong rule, double rule under totals, selected row, focus ring, link color, control radius, panel radius.

**Consequences:**

- Because Filament derives shades, our exact hex values appear on our own elements (text, rules, badges we style), while Filament's buttons and badges use the nearest shade of our palette. The showcase page shows both, and contrast is checked on the rendered result.
- The gray role is a hand-set zinc palette (50 to 950) rather than generated, so ground, gridline and text values appear exactly.
- A near-black primary must be registered as a hand-set palette too; a generated palette from #18181B may not give dark mode its near-white button; the owner confirmed the hand-set palette works (T7).
- Corners, row-only lines and the rounded table panel are theme CSS, not view overrides; Filament's default table already sits in a rounded container, so this is mostly a value change.

## Color tokens

Seventeen tokens in the Softer finish (decided October 21, 2026): zinc neutrals do the structure, near-black does every action, one blue marks focus and the selected row, and status colors appear only in status pills and shapes.

| Token | Light | Dark (charcoal) | Used for | Change from 0.4 |
| --- | --- | --- | --- | --- |
| Ground | #FFFFFF | #18181B | Page and cells | Dark is charcoal zinc |
| Header and zebra fill | #F4F4F5 | #212125 | Table header row, totals row, read-only cells | Zinc |
| Gridline | #E4E4E7 | #3F3F46 | Row lines and the table panel border; no column lines | Zinc; rows only |
| Field border | #84848D | #7A7A83 | Editable field outline (meets 3:1 on every background) | Zinc |
| Text | #09090B | #FAFAFA | All body text and amounts | Zinc |
| Muted text; Status: draft | #52525B | #B4B4BC | Labels, help text, draft | Zinc; dark lightened for the charcoal ground |
| Strong rule | #3F3F46 | #A1A1AA | Under the header row and above totals | Zinc |
| Primary action | #18181B | #FAFAFA | Primary buttons, the active tab, checked controls | Was blue |
| Text on primary button | #FAFAFA | #18181B | Primary button label | Inverted to match |
| Link | Text color, underlined | Text color, underlined | Links in text and tables | New |
| Selected row | #EEEEF0 | #2E2E33 | The row being worked on, with a 2 px left bar in the focus ring color | Neutral fill plus a blue left bar; was a blue tint |
| Focus ring | #0B57D0 | #7CACF8 | 2 px outline, 2 px offset | Unchanged; blue now used only here and on the selected-row bar |
| Status: approved (info) | #0B6478 | #56C2D6 | Approved, waiting to post or release | Unchanged |
| Status: posted (success) | #116329 | #56D364 | Final and permanent | Unchanged |
| Status: submitted; alarms (warning) | #7D4E00 | #E3B341 | Waiting on someone; ▲ alarms | Unchanged |
| Status: voided; rejected; locks (danger) | #B42318 | #FF8A82 | Cancelled, refused, blocked | Dark lightened from #FF7B72 for the charcoal ground |
| Overlay behind dialogs | #09090B at 40% | #000000 at 60% | Dialogs and slide-overs | Zinc |

The light field border is #84848D, slightly darker than the #8A8A93 in the October 21 mockup, so it also passes 3:1 on the selected row.

## Status display

Each lifecycle status is a pill with its word, its shape and its color role; the shape alone tells them apart in grayscale or for a color-blind reader, and it fills up as a document moves toward permanent.

| Status | Shape | Role | Reading |
| --- | --- | --- | --- |
| Draft | ○ hollow circle | gray | Being prepared; editable |
| Submitted | ◐ half-filled circle | warning | Waiting on an approver |
| Approved | ◕ three-quarter circle | info | Approved, waiting to post or release |
| Posted | ● filled circle | success | Final and permanent |
| Voided | ⊘ circle with a slash | danger | Cancelled; still visible, effects reversed |

**The pill (new in 0.5):** a fully rounded badge whose fill is its status color at 12% over whatever sits behind it, with the word and shape in the full status color, 12 px label weight 500, 20 px tall. No border. Every pill passes 4.5:1 on the ground, the header fill and the selected row (see the contrast checks).

**Events** (Rejected, Recalled) never show as statuses; they appear in the history with a ✕ (rejected, danger) or ↩ (recalled, gray) beside the reason.

**Progress states** (Held, Released, Matched, Expected, Received, Claimed, In close) show as a plain text tag beside the status pill, in muted text, with no shape and no fill, so they never compete with the status.

**Alarms** use a ▲ triangle in the warning role with text ("2307 not yet received"); locks use a ■ square in the danger role with the rule in words. Neither takes a pill.

Shapes are drawn as icons in the build; the characters here only show the idea.

## Typography

Unchanged from 0.4: Source Serif 4 for page titles only, IBM Plex Sans for everything else, on a 13 px base on desks (16 px on tablets) with tabular numerals for every amount.

| Token | Family | Size, desk (px) | Size, tablet (px) | Weight | Used for |
| --- | --- | --- | --- | --- | --- |
| Page title | Source Serif 4 | 22 | 24 | 600 | One per screen |
| Section heading | IBM Plex Sans | 15 | 17 | 600 | Sections within a page |
| Body | IBM Plex Sans | 13 | 16 | 400 | Fields, table cells, text |
| Label | IBM Plex Sans | 12 | 14 | 500 | Field labels, column headers, status pills |
| Small | IBM Plex Sans | 12 | 13 | 400 | Help text, timestamps |
| Amount | IBM Plex Sans, tabular | as body | as body | 400; totals 600 | Every peso figure |
| Large amount | IBM Plex Sans, tabular | 20 | 24 | 600 | The amount on an approval decision (P4) |

**Rules:** line height 1.45 for text and 1.25 for table rows; no text below 12 px; numbers never in the serif; uppercase only for short labels like booklet serials; fonts are self-hosted with system fallbacks (Georgia for the serif; the system sans-serif for Plex).

## Spacing, density, corners and rules

Density is unchanged from 0.4; corners soften to 8 px on controls and 10 px on panels, and tables lose their column lines.

| Token | Compact (desk) | Comfortable (tablet) |
| --- | --- | --- |
| Spacing scale | 4, 8, 12, 16, 24 px | 4, 8, 12, 16, 24, 32 px |
| Table row height | 28 px | 44 px |
| Field height | 28 px | 44 px |
| Cell padding | 6 px | 12 px |
| Section gap | 16 px | 24 px |
| Minimum touch target | — | 44 × 44 px |

| Token | Value | Change from 0.4 |
| --- | --- | --- |
| Control radius | 8 px on fields, buttons, menus and inputs | Was 4 px |
| Panel radius | 10 px on panels, cards, dialogs and the table panel | Was 4 px; tables were 0 |
| Pill radius | Fully rounded, status pills only | New |
| Table chrome | The table sits inside one bordered panel (gridline, 10 px radius); cells stay square inside it | Was a free-standing grid |
| Hairline (gridline token) | 1 px between table rows and around panels; no vertical column lines | Column lines removed |
| Strong rule | 1 px under table headers and above totals | Unchanged |
| Double rule | Two 1 px lines 2 px apart, under final totals only | Unchanged |
| Panels | One side panel for checks on forms and one per section on detail views; never nested | Unchanged |
| Shadows | None, except dialogs and slide-overs | Unchanged |

**Density** (T5, decided October 21, 2026, unchanged): desks keep the first layout (labeled fields stacked in a grid, a checks panel beside forms, hairline rows) with 28 px rows; tablets stay comfortable at 44 px. Density is detected by input type and the user can override it; the pattern's order and content never change.

**Column alignment without column lines:** amounts stay right-aligned with tabular numerals, so columns still read as a ledger; the cell padding keeps a clear gap between columns.

## Numbers, focus, links and print

Amounts read like a ledger, the keyboard focus is always visible in blue, links are always underlined, and every printout is plain black on white with the internal-report label.

**Numbers** (unchanged)

- Right-aligned, tabular numerals, two decimals, comma thousands separators: 1,411,200.00.
- Negatives in parentheses, (12,600.00), never a minus sign or red alone.
- The peso sign sits in the column header ("Amount (₱)"), not in each cell; a lone amount in a sentence or on an approval card carries it: ₱1,140,000.00.
- Foreign amounts show the currency code and the rate used: USD 20,000.00 at ₱56.00.
- Zero shows as 0.00, never a dash, so a blank cell always means "no value."

**Focus ring**

- A 2 px outline in the focus ring token with a 2 px offset, on every focusable element, in both modes; never removed.
- Blue appears only on the focus ring and the selected row's left bar; the ring is a 2 px outline around one element and the bar a fixed 2 px edge on one row, so the two never look alike, and neither looks like a primary button (near-black).
- It passes 3:1 against every background (see the contrast checks).

**Links** (new in 0.5)

- Links take the text color and are always underlined, in text and in tables; the underline is the cue now that no accent color marks them.
- On hover the underline thickens to 2 px; visited links look the same, because records are revisited all day.

**Print styles** (unchanged)

- Black text on white, no backgrounds, no shadows; rules print as lines.
- Status pills print as their word and shape, without fill or color.
- Every page carries the company name, "Internal management report" (CLS-09), the print date and time, the user, and page X of Y.
- Input-tax phrase on every external document except the Invoice, conspicuous on page 1 (SAL-10).
- A4 portrait by default, landscape for wide reports; 15 mm margins.

## Contrast checks

Every text token and every status pill passes 4.5:1, and every meaningful line passes 3:1, in both modes; only the gridline falls below, which is allowed because it is decorative. Ratios computed with the WCAG 2.2 formula on October 21, 2026.

**Text tokens (need 4.5:1)**

| Token | Light on ground | Light on header fill | Light on selected row | Dark on ground | Dark on header fill | Dark on selected row |
| --- | --- | --- | --- | --- | --- | --- |
| Text and links | 19.90 | 18.10 | 17.17 | 16.97 | 15.37 | 12.94 |
| Muted text; draft | 7.73 | 7.03 | 6.67 | 8.60 | 7.79 | 6.56 |
| Approved (info) | 6.76 | 6.15 | 5.83 | 8.51 | 7.70 | 6.49 |
| Posted (success) | 7.39 | 6.73 | 6.38 | 9.19 | 8.33 | 7.01 |
| Submitted (warning) | 7.09 | 6.45 | 6.12 | 9.10 | 8.24 | 6.94 |
| Voided (danger) | 6.57 | 5.98 | 5.67 | 7.77 | 7.04 | 5.92 |
| Text on primary button | 16.97 |  |  | 16.97 |  |  |

**Status pills (need 4.5:1, word on its own 12% fill)**

| Pill | Light on ground | Light on header fill | Light on selected row | Dark on ground | Dark on header fill | Dark on selected row |
| --- | --- | --- | --- | --- | --- | --- |
| Draft | 6.43 | 5.92 | 5.59 | 6.85 | 6.11 | 5.16 |
| Approved | 5.62 | 5.16 | 4.89 | 6.89 | 6.15 | 5.13 |
| Posted | 6.11 | 5.63 | 5.32 | 7.39 | 6.60 | 5.51 |
| Submitted | 5.91 | 5.41 | 5.15 | 7.23 | 6.45 | 5.43 |
| Voided | 5.40 | 4.92 | 4.69 | 6.34 | 5.67 | 4.80 |

**Lines, controls and focus (need 3:1 where they carry meaning)**

| Token | Light on ground | Light on header fill | Light on selected row | Dark on ground | Dark on header fill | Dark on selected row | Result |
| --- | --- | --- | --- | --- | --- | --- | --- |
| Primary button fill | 17.72 | 16.12 | 15.29 | 16.97 | 15.37 | 12.94 | Pass |
| Strong rule | 10.44 | 9.50 | 9.01 | 6.91 | 6.26 | 5.27 | Pass |
| Focus ring and selected-row bar | 6.39 | 5.81 | 5.51 | 7.69 | 6.96 | 5.86 | Pass |
| Field border | 3.71 | 3.37 | 3.20 | 4.17 | 3.77 | 3.18 | Pass everywhere |
| Gridline | 1.27 | 1.15 | 1.10 | 1.70 | 1.54 | 1.29 | Decorative only |

The tightest pairs are the voided pill on the light selected row (4.69) and on the dark selected row (4.80); any change to the selected row or the dark ground must re-run these tables. Filament's own buttons and badges use shades derived from these values, so the showcase page is checked again on the rendered screens before go-live.

## Decisions on open questions

T1 to T3 were decided on October 20, 2026; T5 on October 21, 2026; T4 was revised on October 21, 2026, after the owner compared both finishes side by side. T6 was decided on October 21, 2026, as recommended; T7 was confirmed by the design owner and T8 decided on October 21, 2026.

| # | Question | Decision |
| --- | --- | --- |
| T1 | Should the default theme mode follow the device setting, or start in light? | Follow the device, as Filament does by default; users can switch in their profile |
| T2 | Should the posted status use green, given green often means "money in" to non-accountants? | Keep green for posted: it reads as "done," and amounts never take status colors |
| T3 | Who signs off the rendered showcase page against these tokens? | The design owner (Josephus B. de Leon), in Wave 2, before go/no-go on January 15, 2027 (Build Plan 0.2; was "before April 1, 2027" until D14 was revised) |
| T4 | Which color direction? | Softer finish on ledger density: zinc neutrals, near-black primary, blue focus ring only, 8 px and 10 px corners, row-only lines, tinted status pills. Revised October 21, 2026; replaces spreadsheet neutral (0.3 to 0.4) |
| T5 | How dense should desk screens be? | The first layout (stacked labeled fields, checks panel, hairline rows) with desk rows at 28 px; tablets keep 44 px. Decided October 21, 2026 |
| T6 | Should the selected row also get a 2 px left bar in the focus blue, since the neutral grey is subtle on desks? | Yes: a 2 px left bar in the focus ring color on the selected row, in both modes and both densities. Decided October 21, 2026 |
| T7 | Can a near-black primary be registered as a hand-set Filament palette that gives dark mode a near-white button? | Yes, confirmed by the design owner on October 21, 2026; the rendered result is still checked on the showcase page under T3 |
| T8 | How dark should dark mode be? | Charcoal: ground #18181B instead of near-black #09090B, with muted text and voided red lightened to keep AA. A dimmer ground (#232327) was set aside because its tightest pill fell to 4.53:1. Decided October 21, 2026 |

## Changelog

| Version | Date | Changes |
| --- | --- | --- |
| 0.5 (update) | October 21, 2026 | T8: dark mode moves to charcoal (ground #18181B, header fill #212125, selected row #2E2E33, gridline #3F3F46, field border #7A7A83, muted text #B4B4BC, voided #FF8A82); dark contrast tables re-run. Light mode unchanged. |
| 0.5 | October 21, 2026 | T4 revised to the Softer finish: zinc neutrals, near-black primary, blue kept only for focus, underlined links, neutral selected row, 8 px controls and 10 px panels, table in a rounded panel with row lines only, tinted status pills; light field border set to #84848D to pass 3:1 on the selected row; contrast tables re-run and pill table added; T6 decided (2 px blue left bar on the selected row); T7 confirmed (near-black primary works as a hand-set Filament palette); the UI-kit reference-only house default recorded. Density, typography, shapes, numbers and print unchanged. |
| 0.4 | October 21, 2026 | T5 revised after review: the first layout returns (stacked fields, checks panel, 4 px corners, 13 px base) with desk rows at 28 px; the spreadsheet palette from 0.3 stays. |
| 0.3 | October 21, 2026 | T4 and T5: spreadsheet-neutral palette (16 tokens, all re-checked for contrast) and spreadsheet density on desks (24 px rows, 12 px base, gridlines, no cards, 0 radius on cells); typography sizes reduced on desks. |
| 0.2 | October 20, 2026 | T1 to T3 decided: theme follows the device setting; green stays for posted; the design owner signs off the showcase page before April 1, 2027. |
| 0.1 | October 20, 2026 | First draft: tokens mapped onto Filament's six roles; token fixes applied; status shapes; typography; spacing and density; contrast checks; open questions T1 to T3. |
