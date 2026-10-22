<?php

// Boost merges this over its own config. CLAUDE.md is a one-line @AGENTS.md import,
// so Claude Code's guidelines must be written to AGENTS.md, not into CLAUDE.md.
return [
    'agents' => [
        'claude_code' => [
            'guidelines_path' => 'AGENTS.md',
        ],
    ],
];
