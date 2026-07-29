# QRMENU_SITE

QRMENU_SITE is a legacy Laravel 8 prototype for QR-menu and ordering
workflows. It is being preserved and reviewed incrementally; it should not be
treated as a production-ready deployment.

## Local setup

The declared application requirements are PHP `^7.3` or `^8.0`, Composer, a
database supported by the configured Laravel driver, and Node.js when frontend
assets need to be rebuilt.

Create a local environment file from the tracked template:

```bash
cp .env.example .env
composer install
php artisan key:generate
```

Set the local database and integration values in `.env`, then prepare the
schema:

```bash
php artisan migrate
php artisan serve
```

Do not run seeders against valuable data until their behavior has been
reviewed for the intended environment. Frontend assets can be installed and
built separately:

```bash
npm ci
npm run development
```

The commands above document the expected workflow. PHP and Composer were not
available in the hygiene-review environment, so the application test suite and
PHP syntax checks still need to run in a clean, supported environment before a
release claim is made.

## Configuration boundary

- `.env` is local-only and must never be committed.
- `.env.example` contains variable names and safe defaults or placeholders,
  not deployable credentials.
- Generate a unique `APP_KEY` for every installation.
- Keep provider keys, mail credentials, database passwords, administrative
  credentials, and contact data outside Git.
- Runtime databases, logs, sessions, cache files, and debugbar captures are
  local artifacts. They can contain request, authentication, or user data and
  must not be used as portfolio evidence.

The ignore rules prevent newly created local artifacts from being added
accidentally. Ignore rules do not remove files that Git already tracks.

## Security and history boundary

This repository has tracked local configuration and runtime artifacts. Some
tracked artifacts remain in the local cleanup branch until an owner-approved
remediation can be completed without reproducing their contents in a public
diff. Deleting a file from the current tree does not erase it from prior
commits, forks, caches, or existing clones.

Treat any credential that was ever committed as exposed. Revoke or rotate it
before relying on a cleaned working tree. A complete historical cleanup
requires an owner-approved plan covering the default branch, other branches,
tags, GitHub caches and alerts, and coordination with anyone holding a clone.
This local hygiene patch does not rewrite history and makes no claim that old
objects have been purged.

Do not publish a normal pull request whose deletion diff would reproduce
sensitive historical text. Complete credential rotation and agree on the
history-remediation procedure first.

## Verification before sharing

Before presenting the repository as portfolio-grade:

1. Run dependency installation, PHP syntax checks, migrations, and the test
   suite in a disposable environment.
2. Confirm that no real credentials, personal data, runtime logs, sessions,
   debug captures, or local databases are tracked.
3. Capture only reproducible demonstrations built from synthetic data.
4. Review provenance and licensing for application code, bundled packages,
   fonts, images, and other assets.
5. Record the exact verification commands and results without including
   secrets or personal data.
