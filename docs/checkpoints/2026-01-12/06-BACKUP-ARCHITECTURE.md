# Backup Architecture

## Primary
- AWS S3
- Daily sync
- Lifecycle rules (30d standard, glacier optional)

## Secondary
- Google Drive
- Encrypted archive
- Weekly snapshot

## What Is Backed Up
- WordPress uploads
- Ops portal data
- Employee records
- Generated assets
- Configuration files

## Restore Goal
- One-command restore via Ansible

