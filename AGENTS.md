# AGENTS.md

## Project Overview
小米/红米路由器 SSH 密码计算器 - A web-based tool for calculating SSH passwords for Xiaomi/Redmi routers.

## Project Type
- Static web application (HTML/CSS/JavaScript)
- PHP CLI utility for password calculation

## Key Files
- `index.html` - Main web interface for SSH password calculation
- `ssh_get_password.php` - PHP CLI script for password calculation
- `logo.png` - Project logo
- `thumbnail.webp` - Thumbnail image for social media sharing

## Technology Stack
- Frontend: HTML5, CSS3, JavaScript (vanilla)
- External Dependencies: blueimp-md5 (CDN) for MD5 hashing
- Backend Alternative: PHP CLI script

## Password Calculation Algorithm
The SSH password is calculated using:
1. Determine salt based on SN format:
   - SN without '/' → R1D model salt
   - SN with '/' → Other models (salt needs reversal)
2. Combine SN + salt
3. Apply MD5 hash
4. Take first 8 characters

## Code Conventions
- Chinese language comments in PHP
- Inline CSS in HTML (no external CSS files)
- Semantic HTML5 structure
- No build process required - static files served directly

## Development Notes
- No package.json or npm scripts
- No linting or typecheck commands configured
- Changes can be tested by opening index.html in browser
- PHP script can be run: `php ssh_get_password.php <SN>`

## Deployment
- Static hosting only (GitHub Pages, Netlify, etc.)
- No build step required
- Ensure CDN dependencies are accessible