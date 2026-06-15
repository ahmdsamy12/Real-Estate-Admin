#!/usr/bin/env bash
set -e

echo ""
echo "╔══════════════════════════════════════════╗"
echo "║   Real Estate Admin — Setup Script       ║"
echo "╚══════════════════════════════════════════╝"
echo ""

# ── Step 1: PHP dependencies (no dev packages, bypasses ext-xml requirement)
echo "▶  Installing PHP dependencies..."
composer install --ignore-platform-reqs --no-dev

# ── Step 2: Environment file
if [ ! -f .env ]; then
    echo "▶  Creating .env..."
    cp .env.example .env
fi

# ── Step 3: App key (requires ext-xml for artisan output rendering)
#    If this fails with DOMDocument error, set the key manually (see README)
echo "▶  Generating application key..."
php artisan key:generate --no-ansi 2>/dev/null || {
    echo "   ⚠  artisan key:generate failed (likely missing ext-xml)."
    echo "   ⚠  Setting key via openssl instead..."
    KEY="base64:$(openssl rand -base64 32)"
    if grep -q "^APP_KEY=" .env; then
        sed -i "s|^APP_KEY=.*|APP_KEY=${KEY}|" .env
    else
        echo "APP_KEY=${KEY}" >> .env
    fi
    echo "   ✓  APP_KEY set in .env"
}

# ── Step 4: Node dependencies
echo "▶  Installing Node dependencies..."
npm install

# ── Step 5: Build assets
echo "▶  Building frontend assets..."
npm run build

echo ""
echo "✅  Setup complete!"
echo "   Run:  php artisan serve"
echo "   Open: http://localhost:8000"
echo ""
