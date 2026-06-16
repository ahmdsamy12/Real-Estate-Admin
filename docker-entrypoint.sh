#!/bin/sh
set -e

# Validate PORT is a plain positive integer; otherwise fall back to 8000.
case "$PORT" in
    ''|*[!0-9]*)
        echo "WARNING: PORT env var is missing or invalid ('$PORT'). Falling back to 8000."
        PORT=8000
        ;;
esac

export PORT

exec php artisan serve --host=0.0.0.0 --port="$PORT"