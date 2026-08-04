#!/usr/bin/env bash
#
# Sopal SQLite backup — nightly-safe, uses sqlite3 .backup (online-safe).
set -euo pipefail

cd "$(dirname "$0")"

SRC="database/database.sqlite"
DEST_DIR="storage/backups"
mkdir -p "$DEST_DIR"

STAMP="$(date +%Y%m%d_%H%M%S)"
DEST="$DEST_DIR/database-$STAMP.sqlite"

if command -v sqlite3 >/dev/null 2>&1; then
    sqlite3 "$SRC" ".backup '$DEST'"
else
    cp "$SRC" "$DEST"
fi

chmod 600 "$DEST"

# keep last 14 backups
ls -1t "$DEST_DIR"/database-*.sqlite 2>/dev/null | tail -n +15 | xargs -r rm -f

echo "Backup created: $DEST"
echo "Retention: 14 days"
