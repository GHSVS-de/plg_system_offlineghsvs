# plg_system_offlineghsvs

- Joomla-System-Plugin.
- Select a template style that will be used to display the offline page in frontend.

## Deutsche Beschreibung
[Template-Stil für Joomla-Offline-Modus umswitchen](https://ghsvs.de/programmierer-schnipsel/joomla/376-template-stil-fuer-joomla-offline-modus-umswitchen)

-----------------------------------------------------

# My personal build procedure (WSL 1, Debian, Win 10)

- Prepare/adapt `./package.json`.
- `cd /mnt/z/git-kram/plg_system_offlineghsvs`

## node/npm updates/installation
- `npm install` (if never done before)

### Update dependencies
- `npm run updateCheck` or (faster) `npm outdated`
- `npm run update` (if needed) or (faster) `npm update --save-dev`

## Build installable ZIP package
- `node build.js`
- New, installable ZIP is in `./dist` afterwards.
- All packed files for this ZIP can be seen in `./package`. **But only if you disable deletion of this folder at the end of `build.js`**.

### For Joomla update and changelog server
- Create new release with new tag.
  - See and copy and complete release description in `dist/release_no-changelog.txt`.
- Extracts(!) of the update XML for update servers are in `./dist` as well. Copy/paste and make necessary additions.
